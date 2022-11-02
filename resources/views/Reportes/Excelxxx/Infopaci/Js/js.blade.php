<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script>
    $(function() {
        $('.select2').select2({
            language: "es",
            theme: 'bootstrap4'
        });
        $( "#fechdesd" ).datepicker({
            dateFormat: 'yy-mm-dd'
        });
        $( "#fechasta" ).datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
</script>
