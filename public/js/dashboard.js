$(document).ready(function(){

    $( ".dashboard-element" ).hover(
      function() {
        $(this).closest('div').find('i').css('color','#b1b2b3');
        $(this).closest('div').find('.huge').css('color','#b1b2b3');
      }, function() {
        $(this).closest('div').find('i').css('color','#fff');
        $(this).closest('div').find('.huge').css('color','#fff');
      }
    );

}); 