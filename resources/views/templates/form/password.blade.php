<label class="{{ $class ?? null }}">
  <span> {{ $label ?? $input ?? "ERROR" }} </span>
  <!--blade laravelcollective Form::
      example: <input name="" value="" ... > -->
  {!! Form::password($input, $attributes) !!}
</label>
