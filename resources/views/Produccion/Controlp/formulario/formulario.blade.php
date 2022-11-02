<div class="form-group row">
<div class="form-group col-md-12">
        {{ Form::label('cformula_id', 'Lote:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('cformula_id', $todoxxxx['cformula'], $todoxxxx['modeloxx']->cformula_id, ['class' => 'form-control-plaintext','id'=>'cformula_id']) }}
        @else
        {{ Form::select('cformula_id', $todoxxxx['cformula'], null, ['class' => $errors->first('cformula_id') ?
        'form-control is-invalid select2' : 'form-control select2','id'=>'cformula_id']) }}
        @endif
        @if($errors->has('cformula_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('cformula_id') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('','Coloración Normal') }}
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input"
                name="coloraci" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->coloraci == 1) ? 'checked' : ''; ?> value="1">SI
            </label>
        </div>
        <div class="form-check disabled">
            <label class="form-check-label">
                <input type="radio" class="form-check-input {{$errors->first('coloraci') ? ' is-invalid' : ''}}"
                name="coloraci" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->coloraci == 2) ? 'checked' : ''; ?> value="2">NO
            </label>
        </div>
        @if($errors->has('coloraci'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('coloraci') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('','Ausencia de Partículas') }}
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="ausepart" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->ausepart == 1) ? 'checked' : ''; ?> value="1">SI
            </label>
        </div>
        <div class="form-check disabled">
            <label class="form-check-label">
                <input type="radio" class="form-check-input {{$errors->first('ausepart') ? ' is-invalid' : ''}}"
                name="ausepart" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->ausepart == 2) ? 'checked' : ''; ?> value="2">NO
            </label>
        </div>
        @if($errors->has('ausepart'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('ausepart') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('','Ausencia de Fugas') }}
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="ausefuga" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->ausefuga == 1) ? 'checked' : ''; ?> value="1">SI
            </label>
        </div>
        <div class="form-check disabled">
            <label class="form-check-label">
                <input type="radio" class="form-check-input {{$errors->first('ausefuga') ? ' is-invalid' : ''}}"
                name="ausefuga" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->ausefuga == 2) ? 'checked' : ''; ?> value="2">NO
            </label>
        </div>
        @if($errors->has('ausefuga'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('ausefuga') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('','Ausencia de Miscelas/Integridad en Emulsión') }}
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="ausemise" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->ausemise == 1) ? 'checked' : ''; ?> value="1">SI
            </label>
        </div>
        <div class="form-check disabled">
            <label class="form-check-label">
                <input type="radio" class="form-check-input {{$errors->first('ausemise') ? ' is-invalid' : ''}}"
                name="ausemise" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->ausemise == 2) ? 'checked' : ''; ?> value="2">NO
            </label>
        </div>
        @if($errors->has('ausemise'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('ausemise') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-12">
        {{ Form::label('sis_esta_id', 'Estado:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], null, ['class' => $errors->first('sis_esta_id') ?
        'form-control is-invalid select2' : 'form-control select2','id'=>'sis_esta_id']) }}
        @if($errors->has('sis_esta_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sis_esta_id') }}
        </div>
        @endif
    </div>
</div>
