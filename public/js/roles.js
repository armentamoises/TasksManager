$(document).ready(function(){

    if(lang == 'en'){
        $('#roles-table').DataTable({});
    }
    else if(lang == 'es'){
        $('#roles-table').DataTable({
       
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
        $('#roles-table').DataTable({});   
    }
        
    $('[data-toggle="tooltip"]').tooltip(); 

    setTimeout(function() {
        $(".msg").fadeOut('slow'); 
    },3000); 

    $('.sorting_asc').trigger('click');

    $( document ).on( "submit", "#form-new-role", function() {
            
        if(validate_form('#form-new-role')){
            return true;
        }
        else{
            return false;
        };
    });

    $( document ).on( "submit", "#form-edit-role", function() {
        
        if(validate_form_edit('#form-edit-role')){
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
                description:{ required: true },
                "permissions[]":{ required: true }
            },
            messages: {
                'permissions[]': {
                    required: "You must check at least 1 box"
                }
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
                description:{ required: true },
                status:     { required: true },
                "permissions[]":{ required: true }
            },
            messages: {
                'permissions[]': {
                    required: "You must check at least 1 box"
                }
            }, 
             errorElement: 'span',
             errorClass: 'has-error',
             errorPlacement: function (error, element) { // render error placement for each input type
                
                    error.insertAfter(element); 
             }
            
        }).form();
        return($(form).validate().valid());
    }

    $( document ).on( "click", "#all_permissions", function() {
      if(this.checked) {
          // Iterate each checkbox
          $(':checkbox').each(function() {
              this.checked = true;
          });
      }
      else {
        $(':checkbox').each(function() {
              this.checked = false;
          });
      }
    });

    
    $('.load-ajax-modal').click(function(){

        //console.log($(this).data('path'));
        $.ajax({
            type : 'GET',
            url : $(this).data('path'),

            success: function(result) {
                //console.log(result);
                $('#roles-modal div.draw-modal').html(result);
                $('[data-toggle="roles-help"]').tooltip();
            }
        });
    });

    $( document ).on( "change", "#status", function() {
        var status = $('#status').val();
        if (status != '') {
            if (status == 0) {
                $('#help-warning').show();
            }
            else{
                $('#help-warning').hide();
            }
        }
        else{
            $('#help-warning').hide();
        }

    });


}); 