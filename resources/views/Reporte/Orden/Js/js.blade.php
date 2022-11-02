<script>
  $(function(){
   $('.select2').select2({
      language: "es",
      theme: 'bootstrap4'
    });
    $("#clinica").keyup(function () {
      $(this).val($(this).val().toUpperCase())
    });
    $("#telefono").keyup(function () {
      if (this.value.length > 10)
        this.value = this.value.slice(0, 10);
    });
    $("#nitxxxxx").keyup(function () {
      this.value = this.value.replace(/[^0-9]/g, '');
      if (this.value.length > 11)
        this.value = this.value.slice(0, 11);
      $.ajax({
        url: "{{route('clinica.dv')}}",
        type: 'GET',
        data: {
          nitxxxxx: $("#nitxxxxx").val()
        },
        dataType: 'json',
        success: function (json) {
          $("#digiveri").val(json.digitoxx);
        },
        error: function (xhr, status) {
          alert('Disculpe, existió un problema');
        },

      });
    });
    $("#fechnaci,#registro").datepicker({
      dateFormat: "yy-mm-dd",
      changeMonth: true,
      changeYear: true,
      maxDate:'+0',
      yearRange: "-100:+0",
    });

    var f_ajax = function (fechnaci) {
      $('#edad').empty();
      if (fechnaci != '') {
        $.ajax({
          url: "{{url('api/paciente/calcularedad')}}",
          type: 'GET',
          data: {
            fechnaci: fechnaci
          },
          dataType: 'json',
          success: function (json) {
            $("#edad").text(json.edadxxxx)
          },
          error: function (xhr, status) {
            alert('Disculpe, existió un problema');
          }
        });
      }
    }
    $("#fechnaci").change(function () {
      f_ajax($(this).val())
    });
    f_ajax($("#fechnaci").val());
    var f_municipios=function(dataxxxx){
      $("#municipio_id").empty();
      $.ajax({
        url: "{{url('api/paciente/municipios')}}",
        type: 'GET',
        data: {
          departam: dataxxxx.departam
        },
        dataType: 'json',
        success: function (json) {
          $.each(json,function(i,d){
            var selected='';
            if(d.valuexxx==dataxxxx.selected){
              selected='selected';
            }
            $("#municipio_id").append('<option '+selected+' value='+d.valuexxx+'>'+d.optionxx+'</option>');
          });
        },
        error: function (xhr, status) {
          alert('Disculpe, existió un problema');
        }
      });
   }
    @if(old('departamento_id')!=null)
      f_municipios({departam:'{{old("departamento_id")}}',selected:'{{old("municipio_id")}}'});
    @endif
    $("#departamento_id").change(function(){
      f_municipios({departam:$(this).val(),selected:''});
    })

  });
</script>
