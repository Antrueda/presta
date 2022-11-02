@if(session()->has('info'))
	<script>toastr.success("{{ session('info') }}")</script>
@endif
@if(isset($errors) && count($errors))
    @foreach($errors->all() as $error)
    	<script>toastr.error("{{ $error }}")</script>
    @endforeach
@endif