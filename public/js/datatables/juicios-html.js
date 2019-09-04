"use strict";
var KTDatatablesDataSourceAjaxServer = function() {

	var initTable1 = function() {

		// begin first table
		var table = $('#html_table').DataTable({
			initComplete: function () {
			  $('div.dataTables_filter input').focus();
			},
			responsive: true,
			processing: true,
			serverSide: true,
			ajax: window.location.protocol + "//" + window.location.host + "/data_juicios",
			columns: [
				{data: 'juzgado', title: 'Juzgado'},
				{data: 'expediente', title: 'Expediente'},
				{data: 'demandado', title: 'Demandado'},
				{data: 'fecha_boletin', title: 'Ultima fecha de boletín'},
				{data: 'proxima_accion', title: 'Próxima acción'},
				{data: 'Actions', responsivePriority: -1, title: 'Acciones', render: function(data, type, row) {
						return '<a href="edit_client/'+row.id+'" class="btn btn-sm btn-warning btn-icon btn-icon-sm" title="Edit details">\
							<i class="fa fa-edit"></i>\
						</a>\
						<a href="delete_client/'+row.id+'" class="btn btn-sm btn-danger btn-icon btn-icon-sm" title="Delete">\
							<i class="flaticon2-trash"></i>\
						</a>\
					';
					}}
			],
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false
				}
			],
			language: {
                url: window.location.protocol + "//" + window.location.host + "/js/datatables/spanish.json"
            }
		});
	};

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
		},

	};

}();

jQuery(document).ready(function() {
	KTDatatablesDataSourceAjaxServer.init();
});