<script>
    $(function() {
        $('.select2').select2({
            language: "es",
            theme: 'bootstrap4',
        });
        $("#sucursal").keyup(function() {
            $(this).val($(this).val().toUpperCase())
        });

        var f_ajax = function(dataxxxx) {
            $('#municipio_id').empty()
            $.ajax({
                url: "{{route('sisclini.municipi')}}",
                type: 'GET',
                data: dataxxxx.dataxxxx,
                dataType: 'json',
                success: function(json) {
                    $.each(json, function(i, d) {
                        var selected = '';
                        if (dataxxxx.selected == d.valuexxx) {
                            selected = 'selected';
                        }
                        $('#municipio_id').append('<option ' + selected + ' value="' + d.valuexxx + '">' + d.optionxx + '</option>');
                    });
                },
                error: function(xhr, status) {
                    alert('Disculpe, existió un problema');
                },

            });
        }
        $("#departamento_id").change(function() {
            f_ajax({
                dataxxxx: {
                    departam: $(this).val()
                },
                selected: ''
            });
        });
        @if(old("municipio_id") !== null)
        f_ajax({
            dataxxxx: {
                departam: $("#departamento_id").val()
            },
            selected: '{{old("municipio_id")}}'
        });
        @endif
    });
</script>
