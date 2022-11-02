<script>

  $(document).ready(function () {
   $('.select2').select2({
      language: "es",
      theme: 'bootstrap4'
    });

    $('.dato-number').on('keyup', function () {
      //this.value = this.value.replace(/[^0-9]/g, '');
    })
    $("#nombgene").keyup(function () {
      $(this).val($(this).val().toUpperCase())
    });

  });
</script>
