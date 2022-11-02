<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-9">
        {{-- ventanas --}}
        @include('layouts.components.perfilNNAJ.card')
        {{-- ventanas --}}
      </div>
	  <div class="col-md-3">
        {{--  Info Basica --}}
        @include('layouts.components.perfilNNAJ.infoBase')
	  </div>
    </div>
  </div>
</section>

@endsection