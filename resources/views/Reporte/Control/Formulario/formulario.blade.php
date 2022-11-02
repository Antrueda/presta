<div class="form-row">
    <div class="form-group col-md-4">
        {{ Form::label('ordeprod', 'Orden de producto', ['class' => 'control-label']) }}
        {{ Form::text('ordeprod', null, ['class' => $errors->first('ordeprod') ? 'form-control form-control-sm is-invalid' : 'form-control form-control-sm', 'readonly']) }}
     </div>
    <div class="form-group col-md-4">
        {{ Form::label('observac', 'Observación', ['class' => 'control-label']) }}
        {{ Form::text('observac',  null, ['class' => $errors->first('observac') ? 'form-control form-control-sm is-invalid' : 'form-control form-control-sm']) }}
    
    </div>
</div>
