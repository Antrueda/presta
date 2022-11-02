

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

    var f_combo=function(dataxxxx){
      $('#'+dataxxxx.campoxxx).empty();
      $.ajax({
        url : "{{ url('api/medicame/minvimaajax') }}",
        data : dataxxxx.dataxxxx,
        type : 'GET',
        dataType : 'json',
        success : function(json) {
            $.each(json,function(i,d){
              var selected='';
              if(d.valuexxx==dataxxxx.selected){
                selected='selected';
              }
              $('#'+dataxxxx.campoxxx).append('<option '+selected+' value="'+d.valuexxx+'">'+d.optionxx+'</option>');
            });
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
      });
    }
    @if(old('mmarca_id')!=null)
    f_combo({dataxxxx:{padrexxx:'{{old("mmarca_id")}}'},
      campoxxx:'minvima_id',selected:'{{old("minvima_id")}}'
    })
    @endif
  $('#mmarca_id').change(function(){ 
    f_combo({dataxxxx:{padrexxx:$(this).val()},
      campoxxx:'minvima_id',selected:''
    });
  });

});


</script>