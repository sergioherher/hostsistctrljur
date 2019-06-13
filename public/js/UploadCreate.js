var Upload = function (file, url, doc_tipo_id, juicio_id) {
    this.file = file;
    this.url = url;
    this.doc_tipo_id = doc_tipo_id;
    this.juicio_id = juicio_id;
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
    formData.append("pdf_file", this.file, this.getName());
    formData.append("doc_tipo_id", this.doc_tipo_id);
    formData.append("juicio_id", this.juicio_id);
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
            $("#progress-wrp-"+result.doc_tipo_id).parent().hide();
            $("#progress-wrp-"+result.doc_tipo_id).css("width", "0%");
            toastr.success("Se cargó exitosamente el archivo al servidor", "Carga de archivo");
            if(result.doc_tipo_id < 3) {
                $("#tipo-doc-uploading").val(parseInt(result.doc_tipo_id)+1);
                iniciarCargaArchivos(result.juicio_id, parseInt(result.doc_tipo_id)+1);
            } else {
                submitted = true;
                window.location.assign("home");
            }
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
    var progress_bar_id = "#progress-wrp-"+$("#tipo-doc-uploading").val();
    if (event.lengthComputable) {
        percent = Math.ceil(position / total * 100);
    }
    // update progressbars classes so it fits your code
    $(progress_bar_id).css("width", +percent + "%");
    //$(progress_bar_id + " .progress-bar").css("width", +percent + "%");
    //$(progress_bar_id + " .status").text(percent + "%");
};