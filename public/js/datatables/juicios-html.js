"use strict";
// Class definition

var KTDatatableHtmlTableDemo = function() {
	// Private functions

	// demo initializer
	var demo = function() {

		var datatable = $('.kt-datatable').KTDatatable({
			data: {
				saveState: {cookie: false},
			},
			search: {
				input: $('#generalSearch'),
			},
			columns: [
				{
					field: 'Juzgado',
					title: 'Juzgado',
					autoHide: false,
				},  {
					field: 'Expediente',
					title: 'Expediente',
					autoHide: false,
				},  {
					field: 'Demandado',
					title: 'Demandado',
					autoHide: false,
				},  {
					field: 'Última Fecha de Boletín',
					title: 'Última Fecha de Boletín',
					autoHide: false,
				},  {
					field: 'Próxima Acción',
					title: 'Próxima Acción',
					autoHide: false,
					// callback function support for column rendering
					/* template: function(row) {
						return true;
					},*/
				},  {
					field: 'Acciones',
					title: 'Acciones',
					autoHide: false,
				},  {
					field: 'Estado',
					title: 'Estado',
					autoHide: true,
				},
			],
			translate: {
				records: {
					processing: 'Cargando...',
					noRecords: 'No se encontrarón archivos',
				},
				toolbar: {
					pagination: {
						items: {
							default: {
								first: 'Primero',
								prev: 'Anterior',
								next: 'Siguiente',
								last: 'Último',
								more: 'Más páginas',
								input: 'Número de página',
								select: 'Seleccionar tamaño de página',
							},
							info: 'Viendo {{start}} - {{end}} de {{total}} registros',
						},
					},
				},
			},
		});

    $('#kt_form_status').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'Estado');
    });

    $('#kt_form_type').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'Revendedor');
    });

    $('#kt_form_status,#kt_form_type').selectpicker();

	};

	return {
		// Public functions
		init: function() {
			// init dmeo
			demo();
		},
	};
}();

jQuery(document).ready(function() {
	KTDatatableHtmlTableDemo.init();
});