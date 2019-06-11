var Upload = function (file, url) {
    this.file = file;
    this.url = url;
};

Upload.prototype.getType = function() {
    return this.file.type;
};
Upload.prototype.getSize = function() {
    return this.file.size;
};
Upload.prototype.getName = function() {
    return this.file.name;
};
Upload.prototype.doUpload = function () {
    var that = this;
    var formData = new FormData();

    // add assoc key values, this will be posts values
    formData.append("file", this.file, this.getName());
    formData.append("juicio_id", $("#juicio_id").val());
    formData.append("upload_file", true);

    $.ajax({
        type: "POST",
        url: this.url,
        xhr: function () {
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) {
                myXhr.upload.addEventListener('progress', that.progressHandling, false);
            }
            return myXhr;
        },
        success: function (data) {
        	result = JSON.parse(data);
        		$("#pdf-file-"+result.tipo_doc).val("").hide();
				$("#pdf-preview-"+result.tipo_doc).hide().html("");
				$("#undo-upload-"+result.tipo_doc).hide();
				$("#upload-dialog-"+result.tipo_doc).show();
				$("#pdf-image-preview-"+result.tipo_doc).hide();
				if(result.tipo_doc == 3) {
					$("#add-uploaded-"+result.tipo_doc).hide();
					$("#progress-wrp").parent().hide();
					$("#progress-wrp").css("width", "0%");
            //if(data.exito) {
            	}
            	toastr.success("Se cargó exitosamente el archivo al servidor", "Carga de archivo");

				// Send the object url of the pdf
				showPDF3(result.ruta);
            	console.log(result.ruta);
            //}
        },
        error: function (error) {
            console.log(error);
        },
        async: true,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        timeout: 60000
    });
};

Upload.prototype.progressHandling = function (event) {
    var percent = 0;
    var position = event.loaded || event.position;
    var total = event.total;
    var progress_bar_id = "#progress-wrp";
    if (event.lengthComputable) {
        percent = Math.ceil(position / total * 100);
    }
    // update progressbars classes so it fits your code
    $(progress_bar_id).css("width", +percent + "%");
    //$(progress_bar_id + " .progress-bar").css("width", +percent + "%");
    //$(progress_bar_id + " .status").text(percent + "%");
};