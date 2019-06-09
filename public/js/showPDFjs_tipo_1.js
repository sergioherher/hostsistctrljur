var __PDF_DOC_1,
	__CURRENT_PAGE_1,
	__TOTAL_PAGES_1,
	__PAGE_RENDERING_IN_PROGRESS_1 = 0,
	__CANVAS_1 = $('#pdf-canvas-1').get(0),
	__CANVAS_CTX_1 = __CANVAS_1.getContext('2d');

function showPDF1(pdf_url) {
	$("#pdf-prev-loader-1").show();

	pdfjsLib.getDocument({ url: pdf_url }).then(function(pdf_doc) {
		__PDF_DOC_1 = pdf_doc;
		__TOTAL_PAGES_1 = __PDF_DOC_1.numPages;
		
		// Hide the pdf loader and show pdf container in HTML
		$("#pdf-prev-loader-1").hide();
		$("#pdf-contents-1").show();
		$("#pdf-total-pages-1").text(__TOTAL_PAGES_1);

		// Show the first page
		showPage1(1);
	}).catch(function(error) {
		// If error re-show the upload button
		$("#pdf-prev-loader-1").hide();
		
		alert(error.message);
	});;
}

function showPage1(page_no) {
	__PAGE_RENDERING_IN_PROGRESS_1 = 1;
	__CURRENT_PAGE_1 = page_no;

	// Disable Prev & Next buttons while page is being loaded
	$("#pdf-next-1, #pdf-prev-1").attr('disabled', 'disabled');

	// While page is being rendered hide the canvas and show a loading message
	$("#pdf-canvas-1").hide();
	$("#page-loader-1").show();

	// Update current page in HTML
	$("#pdf-current-page-1").text(page_no);
	
	// Fetch the page
	__PDF_DOC_1.getPage(page_no).then(function(page) {
		// As the canvas is of a fixed width we need to set the scale of the viewport accordingly
		var scale_required = __CANVAS_1.width / page.getViewport(1).width;

		// Get viewport of the page at required scale
		var viewport = page.getViewport(scale_required);

		// Set canvas height
		__CANVAS_1.height = viewport.height;

		var renderContext = {
			canvasContext: __CANVAS_CTX_1,
			viewport: viewport
		};
		
		// Render the page contents in the canvas
		page.render(renderContext).then(function() {
			__PAGE_RENDERING_IN_PROGRESS_1 = 0;

			// Re-enable Prev & Next buttons
			$("#pdf-next-1, #pdf-prev-1").removeAttr('disabled');

			// Show the canvas and hide the page loader
			$("#pdf-canvas-1").show();
			$("#page-loader-1").hide();
		});
	});
}

var archivo_1 = document.getElementById("doc_1").innerHTML;
// Send the object url of the pdf
showPDF1(archivo_1);

// Previous page of the PDF
$("#pdf-prev-1").on('click', function(e) {
	e.preventDefault();
	if(__CURRENT_PAGE_1 != 1)
		showPage1(--__CURRENT_PAGE_1);
});

// Next page of the PDF
$("#pdf-next-1").on('click', function(e) {
	e.preventDefault();
	if(__CURRENT_PAGE_1 != __TOTAL_PAGES_1)
		showPage1(++__CURRENT_PAGE_1);
});