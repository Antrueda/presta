<script>
  $(function(){
   $('.select2').select2({
      language: "es",
      theme: 'bootstrap4'
    });
    $("#servicio").keyup(function () {
      $(this).val($(this).val().toUpperCase())
    });
  });
</script>
