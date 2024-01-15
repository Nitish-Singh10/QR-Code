<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.8/css/dataTables.jqueryui.min.css">

<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.js"></script>

<script>
$(document).ready(function() {
    $.fn.dataTable.ext.errMode = 'throw'; // or 'none'

    // Destroy DataTable if it already exists
    if ($.fn.DataTable.isDataTable('#data')) {
        $('#data').DataTable().destroy();
    }

    // Initialize DataTable
    $('#data').DataTable({
        searching: true,
        paging: true,
        ordering: true
    });
    new $.fn.dataTable.Buttons(table, {
        buttons: [
            {
                extend: 'colvis',
                postfixButtons: ['colvisRestore'],
                collectionLayout: 'fixed two-column'
            }
        ]
    });

    // Add the controls to the desired location
    $('#columnToggleDropdown').on('click', function () {
        table.buttons().container().appendTo($('#columnControls'));
    });

});
</script>
