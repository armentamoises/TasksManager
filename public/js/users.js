$(document).ready(function(){

    if(lang == 'en'){
        $('#users-table').DataTable({});
    }
    else if(lang == 'es'){
        $('#users-table').DataTable({
       
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
        $('#users-table').DataTable({});   
    }
        
    $('[data-toggle="tooltip"]').tooltip(); 

    setTimeout(function() {
        $(".msg").fadeOut('slow'); 
    },3000); 

    $('.sorting_asc').trigger('click');

    $( document ).on( "submit", "#form-new-user", function() {
            
        if(validate_form('#form-new-user')){
            return true;
        }
        else{
            return false;
        };
    });

    function validate_form(form){

        $(form).validate({
            rules: {
                name:       { required: true },
                lastname:   { required: true },
                email:      { required: true, email: true },
                role_id:    { required: true },
                image:      { required: true }
            }, 
             errorElement: 'span',
             errorClass: 'has-error',
             errorPlacement: function (error, element) { // render error placement for each input type
                
                    error.insertAfter(element);
                  
             }
            
        }).form();
        return($(form).validate().valid());
    }

    
    $( document ).on( "submit", "#form-edit-user", function() {
        
        if(validate_edit_form('#form-edit-user')){
            return true;
        }
        else{
         return false;
        };
    });

    function validate_edit_form(form){

        $(form).validate({
            rules: {
                name:       { required: true },
                lastname:   { required: true },
                email:      { required: true, email: true },
                role_id:    { required: true },
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
                $('#users-modal div.draw-modal').html(result);
                
                $('.due_date').datepicker({
                    format: "yyyy-mm-dd"
                });

                $('.due_date').datepicker().on('changeDate', function(ev)
                {                 
                     $('.datepicker').hide();
                });
            }
        });
    });


}); 