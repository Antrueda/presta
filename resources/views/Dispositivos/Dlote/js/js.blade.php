<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script>
  function filterFloat(evt, input) {
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;
    var chark = String.fromCharCode(key);
    var tempValue = input.value + chark;
    if (key >= 48 && key <= 57) {
      if (filter(tempValue) === false) {
        return false;
      } else {
        return true;
      }
    } else {
      if (key == 8 || key == 13 || key == 0) {
        return true;
      } else if (key == 46) {
        if (filter(tempValue) === false) {
          return false;
        } else {
          return true;
        }
      } else {
        return false;
      }
    }
  }
  function filter(__val__) {
    var preg = /^([0-9]+\.?[0-9]{0,2})$/;
    if (preg.test(__val__) === true) {
      return true;
    } else {
      return false;
    }
  }
  $(document).ready(function () {
    $('.select2').select2({
      language: "es",
      theme: 'bootstrap4'
    });
    $("#nombcome,#marcaxxx").keyup(function () {
      $(this).val($(this).val().toUpperCase())
    });

    $("#fechvenc").datepicker({
      dateFormat: "yy-mm-dd",
      changeMonth: true,
      changeYear: true,
      minDate:'+1',
      yearRange: "+0:+50",
    });



});


</script>
