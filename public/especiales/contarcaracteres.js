$(function(){
    var f_contardor=function(thisxxxx){
        var atributo=$('#'+thisxxxx.attr('contador'));// en el atributo contador esta el id del contador
        var maximoxx=thisxxxx.attr('maxlength');// encontrar el maximo cual es el maximo que se requiere   
        atributo.html(thisxxxx.val().length+"/"+maximoxx);// se muestar la cantidad de caracters digitados con respecto al máximo
        if(parseInt(thisxxxx.val().length)>maximoxx){ // si se sobrepasa
            thisxxxx.val(thisxxxx.val().substring(0,thisxxxx.val().length-1));//se deja la camtidad establecida de los caracteres
            atributo.html(maximoxx+"/"+maximoxx); // se muestar la cantidad de caracters digitados con respecto al máximo
        }
    }

    /**
     * para que esta funcionalidad se active, el elemento en que se esté digitando debe cumplir las siguientes condiciones:
     * 1 una clase llamada: contarcaracteres
     * 2 un atributo llamado: contador que contendrá el nombre del id del elmento que sirve como contador ejemplo:
     * {{ Form::textarea('s_descripcion', null, 
     *  ['class' => $errors->first('s_descripcion') ? 'form-control form-control-sm is-invalid contarcaracteres' : 
     * 'form-control form-control-sm contarcaracteres', 'rows' => 4, 'cols' => 80, 'style' => 'resize:none', 
     * 'id' => 's_descripcion', 'maxlength' => '6000','contador'=>'agtallercontador']) }}
     * <p id="agtallercontador">0/6000</p>
     */
    $('.contarcaracteres').keyup(function(){
        f_contardor($(this))
    });
});