/*
 *  Document   : be_tables_datatables.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Tables Datatables Page
 */

var BeTableDatatables = function() {
    // Override a few DataTable defaults, for more examples you can check out https://www.datatables.net/
    var exDataTable = function() {
        jQuery.extend( jQuery.fn.dataTable.ext.classes, {
            sWrapper: "dataTables_wrapper dt-bootstrap4"
        });
    };

    // Init full DataTable, for more examples you can check out https://www.datatables.net/
    var initDataTableFull = function() {
        var numCols = $('.js-dataTable-full thead th').length;
        jQuery('.js-dataTable-full').dataTable({
            columnDefs: [ { orderable: false, targets: [ numCols-1 ] } ],
            pageLength: 8,
            lengthMenu: [[5, 8, 15, 20], [5, 8, 15, 20]],
            autoWidth: false
        });
    };

    // Init full extra DataTable, for more examples you can check out https://www.datatables.net/
    var initDataTableFullPagination = function() {
        var numCols = $('.js-dataTable-full-pagination thead th').length;
        jQuery('.js-dataTable-full-pagination').dataTable({
            pagingType: "full_numbers",
            columnDefs: [ { orderable: false, targets: [ numCols-1 ] } ],
            pageLength: 8,
            lengthMenu: [[5, 8, 15, 20], [5, 8, 15, 20]],
            autoWidth: false
        });
    };

    // Init simple DataTable, for more examples you can check out https://www.datatables.net/
    var initDataTableSimple = function() {
        var numCols = $('.js-dataTable-simple thead th').length;
        jQuery('.js-dataTable-simple').dataTable({
            columnDefs: [ { orderable: false, targets: [ numCols-1 ] } ],
            pageLength: 8,
            lengthMenu: [[5, 8, 15, 20], [5, 8, 15, 20]],
            autoWidth: false,
            searching: false,
            oLanguage: {
                sLengthMenu: ""
            },
            dom: "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-6'i><'col-sm-6'p>>"
        });
    };

    return {
        init: function() {
            // Override a few DataTable defaults
            exDataTable();

            // Init Datatables
            initDataTableSimple();
            initDataTableFull();
            initDataTableFullPagination();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BeTableDatatables.init(); });