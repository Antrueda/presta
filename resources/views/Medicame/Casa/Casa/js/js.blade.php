<script>
  $(function(){
   $('.select2').select2({
      language: "es",
      theme: 'bootstrap4'
    });
    $("#casa").keyup(function () {
      $(this).val($(this).val().toUpperCase())
    });
    $('[data-toggle="tooltip"]').tooltip();


    });
</script>
