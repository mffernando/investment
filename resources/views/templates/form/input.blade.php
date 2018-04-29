@php
  $attributes['placeholder'] = $attributes['placeholder'] ?? $label;
@endphp

  <label class="{{ $class ?? null }}">
  <span> {{ $label ?? $input ?? "ERROR" }} </span>
  <!--blade laravelcollective Form::
      example: <input name="" value="" ... > -->
  {!! Form::text($input, $value ?? null, $attributes) !!}
</label>
