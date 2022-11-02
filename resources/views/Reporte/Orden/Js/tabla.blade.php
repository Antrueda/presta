<script>
$(function(){
    f_reaload=function(tablaxxx){
        tablaxxx.ajax.reload()
    }
    var f_asingnar=function(dataxxxx){
        $.ajax({
            url: "{{url('api/clinica/asignarpaciente')}}",
            type: 'GET',
            data: dataxxxx,
            dataType: 'json',
            success: function (json) {
                f_reaload(tablacpaciente)
                f_reaload(tablapaciente)
                //tablaxxx.ajax.reload();
            },
            error: function (xhr, status) {
            alert('Disculpe, existió un problema');
            },
        });
    }
    $('#tablacpaciente tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('btn-success') ) {
            $(this).removeClass('btn-success');
        }
        else { 
            var d = tablacpaciente.row( this ).data().id;
            tablacpaciente.$('tr.btn-success').removeClass('odd btn-success');
            $(this).addClass('btn-success');
        }
    } );
   
    @can($todoxxxx['permisox'].'-asiganar')
        $('#medicamentos tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('btn-success') ) {
                $(this).removeClass('btn-success');
            }
            else { 
                var d = tablapaciente.row( this ).data().id; 
                tablacpaciente.$('tr.btn-success').removeClass('odd btn-success');
                f_asingnar({medicame:d,clinicax:'{{$todoxxxx["clinicax"]}}'});
                $(this).addClass('btn-success');
            }
        });
    @endcan
});
</script>