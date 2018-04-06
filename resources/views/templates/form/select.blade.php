<label class="{{ $class ?? null }}">
<span> {{ $label ?? select ?? "ERROR" }} </span>
  {!! Form::select($select, $data ?? []) !!}
</label>
