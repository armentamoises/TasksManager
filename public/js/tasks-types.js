$(document).ready(function(){

    if(lang == 'en'){
        $('#types-table').DataTable({});
    }
    else if(lang == 'es'){
        $('#types-table').DataTable({
       
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                }
            }
        });
    }
    else{
        $('#types-table').DataTable({});   
    }
        
    $('[data-toggle="tooltip"]').tooltip(); 

    setTimeout(function() {
        $(".msg").fadeOut('slow'); 
    },3000); 

    $('.sorting_asc').trigger('click');

    $( document ).on( "submit", "#form-new-type", function() {
            
        if(validate_form('#form-new-type')){
            return true;
        }
        else{
            return false;
        };
    });

    $( document ).on( "submit", "#form-edit-type", function() {
        
        if(validate_form_edit('#form-edit-type')){
            return true;
        }
        else{
            return false;
        };
    });

    function validate_form(form){

        $(form).validate({
            rules: {
                name:       { required: true }
            }, 
             errorElement: 'span',
             errorClass: 'has-error',
             errorPlacement: function (error, element) { // render error placement for each input type
                
                    error.insertAfter(element); 
             }
            
        }).form();
        return($(form).validate().valid());
    }

    function validate_form_edit(form){

        $(form).validate({
            rules: {
                name:       { required: true },
                status:     { required: true }
            }, 
             errorElement: 'span',
             errorClass: 'has-error',
             errorPlacement: function (error, element) { // render error placement for each input type
                
                    error.insertAfter(element); 
             }
            
        }).form();
        return($(form).validate().valid());
    }
    
    $('.load-ajax-modal').click(function(){

        //console.log($(this).data('path'));
        $.ajax({
            type : 'GET',
            url : $(this).data('path'),

            success: function(result) {
                //console.log(result);
                $('#types-modal div.draw-modal').html(result);
            }
        });
    });


}); 