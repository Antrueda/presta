<script>
  $(function(){
    $('.select2').select2({
      language: "es",
      theme: 'bootstrap4',
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
        url: "{{route('clinicax.dv')}}",
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


    });
</script>
