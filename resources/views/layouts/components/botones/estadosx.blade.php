
    <div class="text-center" style="width: 100%">
        @if($queryxxx->sis_esta_id == 1)
        <span class="fas fa-check text-success" aria-hidden="true"></span>
        @else
        <span class="fas fa-times text-danger" aria-hidden="true"></span>
        @endif
        {{$queryxxx->s_estado}}
    </div>