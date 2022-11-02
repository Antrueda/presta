
    <div class="text-center" style="width: 100%">
        <?php 
           $tipoxxxx='ACTIVAR';
           $classxxx='success'; 
           if($sis_esta_id == 1){
                $tipoxxxx='INACTIVAR'; 
                $classxxx='danger';
           }
        ?>
        <button type="button" class="btn btn-{{ $classxxx }} btn-sm accionxx" id="{{ $userarea }}">
            {{ $tipoxxxx }}
        </button>
        
    </div>