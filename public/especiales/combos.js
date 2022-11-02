var getCombo=function(dataxxxx,json){
    $('#'+json.comboxxx).empty();
    $.each(json.dataxxxx,function(i,d){
        var selected='';
        if(dataxxxx.psalecte==d.valuexxx){
            selected='selected';
        }
        $('#'+json.comboxxx).append('<option '+selected+' value="'+d.valuexxx+'">'+d.optionxx+'</option>');
    });
}