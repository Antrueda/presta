<div class="{{$dataxxxx['classdiv']}}">
  {{ Form::label($dataxxxx['campoxxx'], $dataxxxx['descripc'], ['class' => $dataxxxx['claslabe']]) }}
  {{ Form::file($dataxxxx['campoxxx'], ['accept' => $dataxxxx['acceptxx'],'class'=>$dataxxxx['clasinpu']]) }}
  @if($errors->has($dataxxxx['campoxxx']))
  <div class="invalid-feedback d-block">
    {{ $errors->first($dataxxxx['campoxxx']) }}
  </div>
  @endif
  <span>{{$dataxxxx['tipoarch']}}</span>
</div>

