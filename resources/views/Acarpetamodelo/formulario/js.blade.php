<script>
   $(function(){
    $('.select2').select2({
      language: "es",
      theme: 'bootstrap4'
    });


    var f_campos=function(dataxxxx){
      $("#fos_tse_id").empty();
            $.ajax({
                url : "{{ route('fossubtipo.tiposeg') }}",
                data : {
                    padrexxx:dataxxxx.valuexxx,
                },
                type : 'GET',
                dataType : 'json',
                success : function(json) {
                  $.each(json,function(i,d){
                    var selected='';
                    if(dataxxxx.selected==d.valuexxx){
                      selected='selected';
                    }
                    $("#fos_tse_id").append('<option '+selected+' value="'+d.valuexxx+'">'+d.optionxx+'</option>');
                  });

                },
                error : function(xhr, status) {
                    alert('Disculpe, existió un problema');
                },
            });

        }

        @if(old('area_id')!=null)
          f_campos({valuexxx:{{ old('area_id') }},selected:{{old('fos_tse_id')}}});
        @endif
        $("#area_id").change(function(){
            f_campos({valuexxx:$(this).val(),selected:''});
        });
    });
</script>
