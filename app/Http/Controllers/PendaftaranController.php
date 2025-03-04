<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pendaftaran;
use App\Models\Validasi;
use App\Models\Jurusan;
use App\Models\FormField;
use App\Helpers\EnumHelper;

class PendaftaranController extends Controller
{
    public function exportPdf($id)
    {
        $data = Pendaftaran::findOrFail($id);
        $pdf = Pdf::loadView('pdf.pendaftaran', compact('data'));
        return $pdf->download("pendaftaran-{$id}.pdf");
    }

    public function create()
    {
        // Ambil data jurusan
        $jurusans = Jurusan::pluck('nama_jurusan', 'jurusan_id')->toArray();

        // Ambil enum dari database untuk jenis_pendaftaran dan agama
        $jenisPendaftaran = EnumHelper::getEnumValues('pendaftarans', 'jenis_pendaftaran');
        $agama = EnumHelper::getEnumValues('pendaftarans', 'agama');

        // Definisi fields secara dinamis
        $fields = [
            ['name' => 'nama_lengkap', 'label' => 'Nama Lengkap', 'tipe' => 'text'],
            ['name' => 'email', 'label' => 'Email', 'tipe' => 'email'],
            [
                'name' => 'jurusan_id',
                'label' => 'Pilih Jurusan',
                'tipe' => 'select',
                'options' => $jurusans,
                'option_key' => 'jurusan_id',
                'option_value' => 'nama_jurusan'
            ],
            [
                'name' => 'jenis_pendaftaran',
                'label' => 'Jenis Pendaftaran',
                'tipe' => 'select',
                'options' => $jenisPendaftaran
            ],
            [
                'name' => 'agama',
                'label' => 'Agama',
                'tipe' => 'select',
                'options' => $agama
            ]
        ];

        return view('pendaftaran.create', compact('fields'));
    }

    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        // Kembalikan kuota jika jurusan ada
        if ($pendaftaran->jurusan_id) {
            Jurusan::where('jurusan_id', $pendaftaran->jurusan_id)->increment('kuota');
        }

        $pendaftaran->delete();
        return back()->with('success', 'Pendaftaran berhasil dihapus dan kuota dikembalikan.');
    }

    public function index()
    {
        $pendaftaran = Pendaftaran::with('validasi')->get();
        return view('admin.pendaftaran.index', compact('pendaftaran'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'jurusan_id' => 'required|exists:jurusans,jurusan_id'
        ]);

        $fields = FormField::all();
        $data = [];

        foreach ($fields as $field) {
            $name = $field->field_name;

            if ($field->field_type === 'file' && $request->hasFile($name)) {
                $data[$name] = $request->file($name)->store('uploads', 'public');
            } else {
                $data[$name] = $request->input($name);
            }
        }

        $pendaftaran = Pendaftaran::create($data);

        // Kurangi kuota jurusan
        Jurusan::where('jurusan_id', $request->jurusan_id)->decrement('kuota');

        return redirect()->route('pendaftaran.create')->with('success', 'Pendaftaran berhasil!');
    }
}
