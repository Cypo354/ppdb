<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_field',
        'label',
        'tipe',
        'opsi',
        'wajib',
    ];

    protected $casts = [
        'field_options' => 'array', // Supaya bisa menyimpan JSON untuk select dropdown
    ];
}
