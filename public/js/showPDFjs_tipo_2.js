var __PDF_DOC_2,
	__CURRENT_PAGE_2,
	__TOTAL_PAGES_2,
	__PAGE_RENDERING_IN_PROGRESS_2 = 0,
	__CANVAS_2 = $('#pdf-canvas-2').get(0),
	__CANVAS_CTX_2 = __CANVAS_2.getContext('2d');

function showPDF2(pdf_url) {
	$("#pdf-prev-loader-2").show();

	pdfjsLib.getDocument({ url: pdf_url }).then(function(pdf_doc) {
		__PDF_DOC_2 = pdf_doc;
		__TOTAL_PAGES_2 = __PDF_DOC_2.numPages;
		
		// Hide the pdf loader and show pdf container in HTML
		$("#pdf-prev-loader-2").hide();
		$("#pdf-contents-2").show();
		$("#pdf-total-pages-2").text(__TOTAL_PAGES_2);

		// Show the first page
		showPage2(1);
	}).catch(function(error) {
		// If error re-show the upload button
		$("#pdf-prev-loader-2").hide();
		$("#upload-button-2").show();
		
		alert(error.message);
	});;
}

function showPage2(page_no) {
	__PAGE_RENDERING_IN_PROGRESS_2 = 1;
	__CURRENT_PAGE_2 = page_no;

	// Disable Prev & Next buttons while page is being loaded
	$("#pdf-next-2, #pdf-prev-2").attr('disabled', 'disabled');

	// While page is being rendered hide the canvas and show a loading message
	$("#pdf-canvas-2").hide();
	$("#page-loader-2").show();

	// Update current page in HTML
	$("#pdf-current-page-2").text(page_no);
	
	// Fetch the page
	__PDF_DOC_2.getPage(page_no).then(function(page) {
		// As the canvas is of a fixed width we need to set the scale of the viewport accordingly
		var scale_required = __CANVAS_2.width / page.getViewport(1).width;

		// Get viewport of the page at required scale
		var viewport = page.getViewport(scale_required);

		// Set canvas height
		__CANVAS_2.height = viewport.height;

		var renderContext = {
			canvasContext: __CANVAS_CTX_2,
			viewport: viewport
		};
		
		// Render the page contents in the canvas
		page.render(renderContext).then(function() {
			__PAGE_RENDERING_IN_PROGRESS_2 = 0;

			// Re-enable Prev & Next buttons
			$("#pdf-next-2, #pdf-prev-2").removeAttr('disabled');

			// Show the canvas and hide the page loader
			$("#pdf-canvas-2").show();
			$("#page-loader-2").hide();
		});
	});
}

var archivo_2 = document.getElementById("doc_2").innerHTML;
// Send the object url of the pdf
showPDF2(archivo_2);

// Previous page of the PDF
$("#pdf-prev-2").on('click', function(e) {
	e.preventDefault();
	if(__CURRENT_PAGE_2 != 1)
		showPage2(--__CURRENT_PAGE_2);
});

// Next page of the PDF
$("#pdf-next-2").on('click', function(e) {
	e.preventDefault();
	if(__CURRENT_PAGE_2 != __TOTAL_PAGES_2)
		showPage2(++__CURRENT_PAGE_2);
});