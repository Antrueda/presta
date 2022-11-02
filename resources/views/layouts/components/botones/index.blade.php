<div class="form-group card-footer text-muted text-center">
    @if($accionxx!='Ver')
        {{ Form::submit($accionxx, ['class'=>'btn btn-sm btn-primary']) }}
    @endif
    @if($accionxx!='Crear')
        <a href="{{route($rutaxxxx.'.nuevo')}}" class="btn btn-sm btn-primary" role="button">Nuevo {{ ucfirst ( $rutaxxxx )  }}</a>
    @endif
    <a href="{{route($rutaxxxx)}}" class="btn btn-sm btn-primary" role="button">Volver a {{ $volverax }}</a>
</div>