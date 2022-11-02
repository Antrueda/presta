<script>
  $(function(){
   $('.select2').select2({
      language: "es",
      theme: 'bootstrap4'
    });
    var f_condicio=function(dataxxxx){
      $('#condicio_id').empty();
      $.ajax({
        url: "{{url('api/clinica/condicio')}}",
        type: 'GET',
        data: {
          clinicax: '{{$todoxxxx["clinicax"]}}',
          crangoxx:dataxxxx.crangoxx
        },
        dataType: 'json',
        success: function (json) {
          $.each(json,function(i,d){
            var selected='';
            if(dataxxxx.selected==d.valuexxx){
              selected='selected';
            }
            $('#condicio_id').append('<option '+selected+' value="'+d.valuexxx+'">'+d.optionxx+'</option>')
          });
        },
        error: function (xhr, status) {
          alert('Disculpe, existió un problema');
        },

      });
    }
    $("#rango_id").change(function () {
      f_condicio({selected:'',crangoxx:$(this).val()})

    });


    });
</script>
