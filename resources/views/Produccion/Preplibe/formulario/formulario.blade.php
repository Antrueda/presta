<div class="form-group row">

    <div class="form-group col-md-6">
        {{ Form::label('userevis_id', 'Revisor:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('userevis_id', $todoxxxx['quimfarm'], null, ['class' => $errors->first('userevis_id') ? 'form-control is-invalid select2' : 'form-control select2','id'=>'userevis_id']) }}
        @if($errors->has('userevis_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('userevis_id') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('userprep_id', 'Preparador:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('userprep_id', $todoxxxx['quimfarm'], null, ['class' => $errors->first('userprep_id') ? 'form-control is-invalid select2' : 'form-control select2','id'=>'userprep_id']) }}
        @if($errors->has('userprep_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('userprep_id') }}
        </div>
        @endif
    </div>
</div>
