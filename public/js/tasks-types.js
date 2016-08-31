$(document).ready(function(){

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