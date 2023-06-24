// datatable 	
$('#constraints').DataTable({
    scrollX: true,
    scrollCollapse: true,
    filter: false,
    dom: 'rt<"bottom"lip><"clear">',
    ordering: false
});

$(document).ready(function() {
    var table = $('#standards').DataTable({
        scrollX: true,
        scrollCollapse: true,
        filter: false,
        dom: 'rt<"bottom"lip><"clear">',
        ordering: false,
        ajax: {
            url: 'ajax/data.js',
        },
        columns: [{
                className: 'dt-control',
                orderable: false,
                data: null,
                defaultContent: '',
            },
            {
                data: 'table'
            },
            {
                data: 'column'
            },
            {
                data: 'size'
            },
            {
                data: 'result'
            },
        ],
    });

    // Add event listener for opening and closing details
    $('#standards tbody').addClass('bg-light-black text-light-white text-center text-sm')
    $('#standards tbody').on('click', 'td.dt-control', function() {
        var tr = $(this).closest('tr');
        var row = table.row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child(format(row.data())).show();
            tr.addClass('shown');
        }
    });
});

function format(d) {
    return (
        '<p class="text-left mb-2">Media state</p>' +
        '<table class="table table-stripped table-bordered display nowrap w-100 border-gray" cellpadding="5" cellspacing="0" border="0">' +
        '<thead class="bg-black">' +
        '<tr>' +
        '<th class="text-light-white text-center text-sm uppercase">Name</th>' +
        '</th>' +
        '<th class="text-light-white text-center text-sm uppercase">Naming conversation</th>' +
        '</th>' +
        '<th class="text-light-white text-center text-sm uppercase">Name standards</th>' +
        '</th>' +
        '<th class="text-light-white text-center text-sm uppercase">Data type</th>' +
        '</th>' +
        '</thead>' +
        '<tbody class="bg-light-black" >' +
        '<tr>' +
        '<td class="text-light-white text-center text-sm">' +
        d.name +
        '</td>' +
        '<td class="text-light-white text-center text-sm">' +
        d.conversation +
        '</td>' +
        '<td class="text-light-white text-center text-sm">' +
        d.standards +
        '</td>' +
        '<td class="text-light-white text-center text-sm">' +
        d.type +
        '</td>' +
        '</tr>' +
        '</tbody>' +
        '</table>'
    );
}

$(document).on('click','.custom-action',function(){
    $('#constraints').DataTable().draw();
    $('#standards').DataTable().draw();
});