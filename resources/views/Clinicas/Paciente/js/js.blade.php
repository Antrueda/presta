<script>
    $(function() {
        $('.select2').select2({
            language: "es",
            theme: 'bootstrap4'
        });
        $("#nombres,#apellidos,#cama").keyup(function() {
            $(this).val($(this).val().toUpperCase())
        });


        $("#fechnaci,#registro").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            maxDate: '+0',
            yearRange: "-100:+0",
        });

        var f_ajax = function(fechnaci) {
            $('#edad').empty();
            if (fechnaci != '') {
                $.ajax({
                    url: "{{route('paciente.edadxxxx')}}",
                    type: 'GET',
                    data: {
                        fechnaci: fechnaci
                    },
                    dataType: 'json',
                    success: function(json) {
                        $("#edad").text(json.edadxxxx)
                    },
                    error: function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    }
                });
            }
        }
        $("#fechnaci").change(function() {
            f_ajax($(this).val())
        });
        @if($todoxxxx['accionxx']!= 'Destroy')
        f_ajax($("#fechnaci").val());
        @endif

        var f_municipios = function(dataxxxx) {
            $("#municipio_id").empty();
            $.ajax({
                url: "{{route('paciente.municipio')}}",
                type: 'GET',
                data: {
                    departam: dataxxxx.departam
                },
                dataType: 'json',
                success: function(json) {
                    $.each(json, function(i, d) {
                        var selected = '';
                        if (d.valuexxx == dataxxxx.selected) {
                            selected = 'selected';
                        }
                        $("#municipio_id").append('<option ' + selected + ' value=' + d.valuexxx + '>' + d.optionxx + '</option>');
                    });
                },
                error: function(xhr, status) {
                    alert('Disculpe, existió un problema');
                }
            });
        }
        @if(old('departamento_id') != null)
        f_municipios({
            departam: '{{old("departamento_id")}}',
            selected: '{{old("municipio_id")}}'
        });
        @endif
        $("#departamento_id").change(function() {
            f_municipios({
                departam: $(this).val(),
                selected: ''
            });
        })

    });
</script>
