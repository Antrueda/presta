$(document).ready(function () { 
    var f_tooltip=function(dataxxxx){  
        var propieda=dataxxxx.thisxxxx.attr('propiedad');
        var elemento=$("#"+propieda+' option:selected').val();
        $.ajax({
            url :  "{{route('api/tooltip/tooltip')}}",
            data : { idxxxxxx : elemento,casosxxx: propieda},
            type : 'GET',
            dataType : 'json',
            success : function(json) {
                dataxxxx.thisxxxx.attr('data-original-title',json.idxxxxxx)
            },
            error : function(xhr, status) {
                alert('Disculpe, existió un problema');
            },
        });
        
        
        dataxxxx.thisxxxx.tooltip();
    }

    $(".mouseover").hover(function () {
        f_tooltip({'thisxxxx':$(this)});
    });
  
});