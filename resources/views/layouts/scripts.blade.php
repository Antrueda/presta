<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery-confirm.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->

<!-- Sparkline -->
<script src="{{ asset('adminlte/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
{{-- <script src="{{ asset('adminlte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jqvmap/maps/jquery.vmap.world.js') }}"></script> --}}
<!-- jQuery Knob Chart -->
{{-- <script src="{{ asset('adminlte/plugins/jquery-knob/jquery.knob.min.js') }}"></script> --}}
<!-- daterangepicker -->
{{-- <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script> --}}
{{-- <script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script> --}}
<!-- Tempusdominus Bootstrap 4 -->
{{-- <script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script> --}}
<!-- Summernote -->
{{-- <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script> --}}
<!-- overlayScrollbars -->
{{-- <script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script> --}}
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
{{-- <script src="{{ asset('adminlte/plugins/chart.js/chart.js') }}"></script> --}}
{{-- <script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script> --}}
<script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>
{{-- <script src="{{ asset('adminlte/dist/js/pages/dashboard3.js') }}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ asset('adminlte/dist/js/pages/dashboard.js') }}"></script> --}}
<!-- AdminLTE for demo purposes -->

<script src="{{ asset('adminlte/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/mask/jquery.mask.js') }}"></script>
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/select2/js/i18n/es.js') }}"></script>
<!-- <script src="{{ asset('especiales/contarcaracteres.js') }}"></script>
<script src="{{ asset('especiales/fechas.js') }}"></script>
<script src="{{ asset('especiales/combos.js') }}"></script> -->
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "showDuration": "5000",
        "hideDuration": "3000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    $('bbody').click(function() {




        var f_ajax = function() {
            $('#alertas').empty();
            $.ajax({
                url: "{{route('clinicax.getAlertas')}}",
                type: 'POST',
                data: {
                    _token: $("input[name='_token']").val(),
                },
                dataType: 'json',
                success: function(json) {

                    $('#campana').text(json.totalxxx)
                    $('#totalnotifi').text(json.notifica)
                    $.each(json.dataxxxx, function(i, d) {

                        var alerta = '';
                        alerta += '<div class="dropdown-divider"></div>';
                        alerta += '<div class="dropdown-item">';
                        alerta += '<i class="fas ' + d.encabeza.iconoxxx + ' mr-2"></i>';
                        alerta += d.encabeza.tituloxx;
                        alerta += '<div class="list-group">';
                        $.each(d.dataxxxx, function(i, m) {
                            if (i < 2) {
                                alerta += '<a href="' + m.linkxxxx + '" class="list-group-item list-group-item-action">';
                                alerta += m.titulink;
                                alerta += '<span class="float-right text-muted text-sm">';
                                alerta += m.fechorax;
                                alerta += '</span>';
                                alerta += '</a> ';
                            }
                        })

                        alerta += '</div> </div>';
                        $('#alertas').append(alerta);


                    });

                },
                error: function(xhr, status) {
                    alert('Disculpe, existió un problema');
                }
            });

        }
        if ($("#alertas").length > 0) {
            f_ajax();
        }
    });
</script>
@include('layouts.mensaje')
@yield('scripts')
