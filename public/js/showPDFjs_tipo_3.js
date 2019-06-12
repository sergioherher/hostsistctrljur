var __PDF_DOC_3,
	__CURRENT_PAGE_3,
	__TOTAL_PAGES_3,
	__PAGE_RENDERING_IN_PROGRESS_3 = 0,
	__CANVAS_3 = $('#pdf-canvas-3').get(0),
	__CANVAS_3_ALT = $('#pdf-alt-preview-3').get(0),
	__CANVAS_CTX_3 = __CANVAS_3.getContext('2d');
	__CANVAS_CTX_3_ALT = __CANVAS_3_ALT.getContext('2d');

function showPDF3(pdf_url) {
	$("#pdf-prev-loader-3").show();

	pdfjsLib.getDocument({ url: pdf_url }).then(function(pdf_doc) {
		__PDF_DOC_3 = pdf_doc;
		__TOTAL_PAGES_3 = __PDF_DOC_3.numPages;

		// Hide the pdf loader and show pdf container in HTML
		$("#pdf-prev-loader-3").hide();
		$("#pdf-contents-3").show();
		$("#pdf-total-pages-3").text(__TOTAL_PAGES_3);

		// Show the first page
		showPage3(__TOTAL_PAGES_3);
	}).catch(function(error) {
		// If error re-show the upload button
		$("#pdf-prev-loader-3").hide();
		
		//alert(error.message);
	});;
}

function showPage3(page_no) {
	__PAGE_RENDERING_IN_PROGRESS_3 = 1;
	__CURRENT_PAGE_3 = page_no;

	// Disable Prev & Next buttons while page is being loaded
	$("#pdf-next-3, #pdf-prev-3").attr('disabled', 'disabled');

	// While page is being rendered hide the canvas and show a loading message
	$("#pdf-canvas-3").hide();
	$("#page-loader-3").show();

	// Update current page in HTML
	$("#pdf-current-page-3").text(page_no);
	
	// Fetch the page
	__PDF_DOC_3.getPage(page_no).then(function(page) {
		// As the canvas is of a fixed width we need to set the scale of the viewport accordingly
		var scale_required_1 = __CANVAS_3.width / page.getViewport(1).width;
		var scale_required_2 = __CANVAS_3_ALT.width / page.getViewport(1).width;

		// Get viewport of the page at required scale
		var viewport_1 = page.getViewport(scale_required_1);
		var viewport_2 = page.getViewport(scale_required_2);

		// Set canvas height
		__CANVAS_3.height = viewport_1.height;
		__CANVAS_3_ALT.height = viewport_2.height;

		var renderContext1 = {
			canvasContext: __CANVAS_CTX_3,
			viewport: viewport_1
		};

		var renderContext2 = {
			canvasContext: __CANVAS_CTX_3_ALT,
			viewport: viewport_2
		};
		
		// Render the page contents in the canvas
		page.render(renderContext1).then(function() {
			__PAGE_RENDERING_IN_PROGRESS_3 = 0;

			// Re-enable Prev & Next buttons
			$("#pdf-next-3, #pdf-prev-3").removeAttr('disabled');

			// Show the canvas and hide the page loader
			$("#pdf-canvas-3").show();
			$("#page-loader-3").hide();
		});

		// Render the page contents in the canvas
		page.render(renderContext2).then(function() {
			__PAGE_RENDERING_IN_PROGRESS_3 = 0;

			// Re-enable Prev & Next buttons
			$("#pdf-next-3, #pdf-prev-3").removeAttr('disabled');

			// Show the canvas and hide the page loader
			$("#pdf-canvas-3").show();
			$("#page-loader-3").hide();
		});
	});
}

var archivo_3 = document.getElementById("doc_3").innerHTML;
// Send the object url of the pdf
showPDF3(archivo_3);

// Previous page of the PDF
$("#pdf-prev-3").on('click', function(e) {
	e.preventDefault();
	if(__CURRENT_PAGE_3 != 1)
		showPage3(--__CURRENT_PAGE_3);
});

// Next page of the PDF
$("#pdf-next-3").on('click', function(e) {
	e.preventDefault();
	if(__CURRENT_PAGE_3 != __TOTAL_PAGES_3)
		showPage3(++__CURRENT_PAGE_3);
});