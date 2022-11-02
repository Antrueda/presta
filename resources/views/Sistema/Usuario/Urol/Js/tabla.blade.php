<script>
$(function(){
    @foreach ($todoxxxx['tablasxx'] as $tablasxx)
    {{ $tablasxx["tablaxxx"] }} =  $('#{{ $tablasxx["tablaxxx"] }}').DataTable({
        "serverSide": true,
        "lengthMenu":				[[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50]],
        "ajax": {
            url:"{{ url($tablasxx['urlxxxxx'])  }}",
            @if(isset($tablasxx['dataxxxx']))
                data:{
                    @foreach($tablasxx['dataxxxx'] as $dataxxxx)
                    {{$dataxxxx['campoxxx']}}:"{{$dataxxxx['dataxxxx']}}",
                    @endforeach
                }
            @endif
        },
        "columns":[
            @foreach($tablasxx['columnsx'] as $columnsx)
                {data:'{{ $columnsx["data"] }}',name:'{{ $columnsx["name"] }}'},
            @endforeach
        ],
        "language": {
            "url": "{{ url('/adminlte/plugins/datatables/Spanish.lang') }}"
        }
    });
  @endforeach
    f_reaload=function(tablaxxx){
        tablaxxx.ajax.reload()
    }
    var f_asingnarQuitar=function(dataxxxx){
        $.ajax({
            url: '{{route($todoxxxx["routxxxx"].".asignarol")}}',
            type: 'GET',
            data: dataxxxx,
            dataType: 'json',
            success: function (json) {
                f_reaload(tablaroles)
                f_reaload(tablauroles)
            },
            error: function (xhr, status) {
            alert('Disculpe, existió un problema');
            },
        });
    }
    $('#tablauroles tbody').on( 'click', '.btn-danger', function () {
        f_asingnarQuitar({rolxxxxx:$(this).prop('id'),padrexxx:'{{$todoxxxx["padrexxx"]}}',asigquit:2});
    } );

    $('#tablaroles tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('btn-success') ) {
            $(this).removeClass('btn-success');
        }
        else {
            var rolxxxxx = tablaroles.row( this ).data().id;
            tablaroles.$('tr.btn-success').removeClass('odd btn-success');
            f_asingnarQuitar({rolxxxxx:rolxxxxx,padrexxx:'{{$todoxxxx["padrexxx"]}}',asigquit:1});
            $(this).addClass('btn-success');
        }
    });

});
</script>
