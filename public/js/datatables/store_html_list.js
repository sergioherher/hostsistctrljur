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
					field: 'Tienda',
					title: 'Tienda',
					autoHide: false,
				}, {
					field: 'Creada',
					title: 'Fecha de Creación',
					autoHide: false,
				}, {
					field: 'Vencimiento',
					title: 'Fecha de Expiración',
					autoHide: false,
				}, {
					field: 'Revendedor',
					title: 'Fecha de Expiración Licencia de Origen',
					autoHide: false,
				}, {
					field: 'Telefono',
					title: 'Teléfono',
					autoHide: true,
				},  {
					field: 'Estado',
					title: 'Estado',
					autoHide: false,
					// callback function support for column rendering
					/* template: function(row) {
						return true;
					},*/
				}, {
					field: 'Acciones',
					title: 'Acciones',
					autoHide: false,
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