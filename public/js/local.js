
//NECEASARIO PARA SUAR LA FUNIONALIDAD TOOLTIP
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

//NECEASARIO PARA SUAR LA FUNIONALIDAD POPOVER
$(function () {
    $('[data-toggle="popover"]').popover()
});

$('.your-checkbox').prop('indeterminate', true)

function llamarNotyBasic(type,msg,layout){
    new Noty({
        type: type,
        theme: 'mint',
        text: msg,
        killer: true,
        layout: layout
    }).show();
}

function callNotyTime(type,msg,layout,timeout){
    new Noty({
        text: msg,
        type: type,
        layout: layout,
        theme: 'mint',
        killer: true,
        progressBar: true,
        timeout: timeout
    }).show();
}

function callNotyLoadProcess(){
    var msg='<center><div class="spinner-border" role="status"> <span class="sr-only">Cargando...</span></div><br>Procesando la solicitud</center>';
    new Noty({
        text: msg,
        type: 'info',
        layout: 'center',
        theme: 'mint',
        killer: true,
        progressBar: true,
        //timeout: 2000
    }).show();
}

function callForNecessaryInputs(){
    var msg='<center><p><i class="far fa-file-alt fa-3x"></i></p>Datos pendientes por diligenciar en el formulario</center>';
    new Noty({
        text: msg,
        type: 'error',
        layout: 'topRight',
        theme: 'mint',
        killer: true,
        progressBar: true,
        timeout: 2000
    }).show();
}

$('#myTable').DataTable( {

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
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }

    },
    "scrollX": true
} );


