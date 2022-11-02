<div class="form-row">
    <div class="form-group col-md-6">
        <label for="fechdesd" class="control-label col-form-label-sm">Fecha Desde<strong> (<i>YYYY-MM-DD</i>)</strong>:</label>
        {{ Form::text('fechdesd', null, ['class' => $errors->first('fechdesd') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Fecha Desde','readonly', 'id'=>'fechdesd','maxlength' => '120','autocomplete'=>'off']) }}
        @if($errors->has('fechdesd'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('fechdesd') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        <label for="fechasta" class="control-label col-form-label-sm">Fecha Hasta<strong> (<i>YYYY-MM-DD</i>)</strong>:</label>
        {{ Form::text('fechasta', null, ['class' => $errors->first('fechasta') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Fecha Hasta','readonly', 'id'=>'fechasta','maxlength' => '120','autocomplete'=>'off']) }}
        @if($errors->has('fechasta'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('fechasta') }}
        </div>
        @endif
    </div>
</div>
