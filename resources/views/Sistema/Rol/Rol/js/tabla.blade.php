<script>
$(function(){    
    $('#tablaroles tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('btn-success') ) {
            $(this).removeClass('btn-success');
        }
        else { 
            var d = tablaroles.row( this ).data().id;
            tablaroles.$('tr.btn-success').removeClass('odd btn-success');
            $(this).addClass('btn-success');
        }
    } );
});
</script>