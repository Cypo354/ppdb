<div>
    <label for="{{ $row->field }}">{{ $row->display_name }}</label>
    <input type="text" class="form-control" name="{{ $row->field }}" value="{{ old($row->field, $dataTypeContent->{$row->field} ?? '') }}">
</div>