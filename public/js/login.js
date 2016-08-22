$(document).ready(function(){

   
    $( document ).on( "submit", ".form-login", function() {
            
        if(validate_form('.form-login')){
            return true;
        }
        else{
            return false;
        };
    });

    function validate_form(form){

        $(form).validate({
            rules: {
                email:       { required: true },
                password:   { required: true }
            }, 
             errorElement: 'span',
             errorClass: 'has-error',
             errorPlacement: function (error, element) { // render error placement for each input type
                
                error.insertAfter(element);
                  
             }
            
        }).form();
        return($(form).validate().valid());
    }

    $( document ).on( "submit", "#form-new-password", function() {
        
        if(validate_form_password('#form-new-password')){
            return true;
        }
        else{
            return false;
        };
    });

    function validate_form_password(form){

        $(form).validate({
            rules : {
                
                password : {
                    minlength : 5,
                    required : true
                },
                password_confirmation : {
                    required : true,
                    minlength : 5,
                    equalTo : "#password"
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

    $( document ).on( "submit", "#form-request-reset", function() {
        
        if(validate_form_password('#form-request-reset')){
            return true;
        }
        else{
            return false;
        };
    });

    function validate_form_password(form){

        $(form).validate({
            rules : {
                
                email : {
                    required : true,
                    email: true
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

    


}); 