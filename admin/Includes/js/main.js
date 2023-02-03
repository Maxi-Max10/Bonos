
$(document).ready(function() {
    $('#tabla_personal').DataTable( {
        columnDefs: [
            { orderable: false, targets: 3 },
            { orderable: false, targets: 4 },
            { orderable: false, targets: 5 },
            { orderable: false, targets: 6 },
            { orderable: false, targets: 7 },
            { orderable: false, targets: 8 },
          ],
        destroy: true,
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.2/i18n/es-ES.json'
        }
    } );
} );
