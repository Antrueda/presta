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

  $(function(){
   $('.select2').select2({
      language: "es",
      theme: 'bootstrap4'
    });
    $(".numerico").keyup(function () {
      var id = $(this).prop('id');
      $.ajax({
        url: "{{route('concilia.esnumerico')}}",
        type: 'POST',
        data: {_token: $("input[name='_token']").val(),
          cantsobr: $(this).val(),
          idcancon: id,
          cantalis: $('#' + id.replace("_dif", "")).text()
        },
        dataType: 'json',
        success: function (json) {
          if (json.cantmayo) {
            alert('la cantidad sobrante no puede ser mayor a la alistada')
            $('#' + json.idiferen).val(json.cantalis);
            $('#' + json.idcancon).text(0);
          } else {
            $('#' + json.idcancon).text(json.diferenc);
          }
        },

        error: function (xhr, status) {
          alert('Disculpe, existió un problema');
        },

      });
    });

  });
</script>
