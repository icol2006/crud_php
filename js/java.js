$(document).ready( function () {
    $('#myTable').dynamicTable();

    
} );

function funcPrincipal(){
    $("#btnAgregarNuevo").on('click', funcAgregarNuevo);
    $(".btn-danger").on('click',funcEliminarFila);

}

function funcEliminarFila(){
    console.log($(this));
}


function funcAgregarNuevo() {

    $("#tablaNuevaNomina")
    .append
    (
        $('<tr>')
        .append
        (
            $('<td>')
            .append
            (
                $('<input>').attr('type', 'text').addClass('form-control')
            )
        )
        .append
        (
            $('<td>')
            .append
            (
                $('<input>').attr('type', 'text').addClass('form-control')
            )
        )
        .append
        (
            $('<td>').addClass('text-center')
            .append
            (
                $('<div>').addClass('btn btn-primary').text('Guardar')
            )
            .append
            (
                $('<div>').addClass('btn btn-danger').text('Eliminar')
            )
        )
    );
}



