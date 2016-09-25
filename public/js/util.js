$(document).ready(function(){

    var export_cols = [];

    switch(table) {
        case 'tasks':
            export_cols = [0,1,2,3,4,5];
            break;
        case 'types':
            export_cols = [0,1,2];
            break;
        case 'users':
            export_cols = [0,2,3,4,5];
            break;
        case 'roles':
            export_cols = [0,1,2,3,4];
            break;
        default:
            export_cols = [0,1,2];
    }

    var translation = {};
    
    if(lang == 'es'){
        var translation = {
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
                },
                "buttons": {
                    'copy': 'Copiar',
                    'print': 'Imprimir'
                }
        };
    }

    $('.my-data-table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend:'pdfHtml5',
                text:'PDF',
                orientation:'landscape',
                customize : function(doc){
                    var colCount = new Array();
                    $('.my-data-table').find('tbody tr:first-child td').each(function(){
                        if($(this).attr('colspan')){
                            for(var i=1;i<=$(this).attr('colspan');$i++){
                                colCount.push('*');
                            }
                        }else{ colCount.push('*'); }
                    });
                    doc.content[1].table.widths = colCount;
                },
                exportOptions: {
                    columns: export_cols
                }
            },
            /*{
                extend: 'pdf',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }
            },  */
            {
                extend: 'csv',
                exportOptions: {
                    columns: export_cols
                }
            },
            {
                extend: 'copy',
                exportOptions: {
                    columns: export_cols
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: export_cols
                }
            }
        ],
        "language": translation
    });



    $('[data-toggle="tooltip"]').tooltip(); 

    setTimeout(function() {
        $(".msg").fadeOut('slow'); 
    },3000); 

}); 