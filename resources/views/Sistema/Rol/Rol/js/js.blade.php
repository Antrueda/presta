<script>
  $(function(){
   $('.select2').select2({
      language: "es",
      theme: 'bootstrap4'
    });
    $("#name").keyup(function () {
      $(this).val($(this).val().toUpperCase())
    });
  });
</script>
