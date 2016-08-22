$(document).ready(function(){

    if(lang == 'en'){
        $('#tasks-table').DataTable({});
    }
    else if(lang == 'es'){
        $('#tasks-table').DataTable({
       
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
        $('#tasks-table').DataTable({});   
    }
        
    $('[data-toggle="tooltip"]').tooltip(); 

    setTimeout(function() {
        $(".alert").fadeOut('slow'); 
    },3000); 

    $('.sorting_asc').trigger('click');

    $( document ).on( "submit", "#form-new-task", function() {

        if(validate_form('#form-new-task')){
            return true;
        }
        else{
            return false;
        };
    });

    $( document ).on( "submit", "#form-edit-task", function() {
        
        if(validate_form('#form-edit-task')){
            return true;
        }
        else{
            return false;
        };
    });

    $( document ).on( "submit", "#form-assign-task", function() {

        if(validate_scaleup('#form-assign-task')){
            return true;
        }
        else{
            return false;
        };
    });

    function validate_form(form){

        $(form).validate({
            rules: {
                task:{
                    required: true
                },
                description:{
                    required: true,
                    rangelength: [20, 250]
                },
                project_id:{
                    required: true
                },
                priority:{
                    required: true
                },
               "task_types[]":{
                    required: true
                }
            },
            messages: {
                'task_types[]': {
                    required: "You must check at least 1 box"
                }
            }, 
            errorElement: 'div',
            errorClass: 'has-error',
            errorPlacement: function (error, element) { // render error placement for each input type
                
                    error.insertAfter(element); 
            }
            
        }).form();
        return($(form).validate().valid());
    }

    function validate_scaleup(form){

        $(form).validate({
            rules: {
                supervisor:{
                    required: true
                },
                developer:{
                    required: true
                },
                due_date:{
                    required: true
                }
            },
            
            errorElement: 'div',
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
                $('#tasks-modal div.draw-modal').html(result);
                
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