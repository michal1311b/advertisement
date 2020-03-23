var text = window.location.href;

if(text.includes('user') && text.includes('edit'))
{
    window.Dropzone = require('dropzone');
    Dropzone.autoDiscover = false;

    Dropzone.options.dropzone = {
        previewTemplate: document.getElementById('template-preview').innerHTML,
        previewsContainer: '.dropzone-previews',
        createImageThumbnails: true,
        thumbnailHeight: 120,
        thumbnailWidth: 120,
        thumbnail: function(file, dataUrl) {
            if (file.previewElement) {
                file.previewElement.classList.remove("dz-file-preview");
                var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                for (var i = 0; i < images.length; i++) {
                    var thumbnailElement = images[i];
                    thumbnailElement.alt = file.name;
                    thumbnailElement.src = dataUrl;
                }
                setTimeout(function() { file.previewElement.classList.add("dz-image-preview"); }, 1);
            }
        },
        maxFilesize: 12,
            renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
            return time+file.name;
        },
        acceptedFiles: ".pdf,.doc,.docx",
        addRemoveLinks: true,
        timeout: 50000,
        removedfile: function(file) {
            var name = file.upload.filename;
            var fileRef;
            return (fileRef = file.previewElement) != null ? 
            fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },
    
        success: function(file, response) 
        {
            console.log(response);
        },
        error: function(file, response)
        {
            return false;
        }
    };
}
var minSteps = 6,
maxSteps = 60,
timeBetweenSteps = 100,
bytesPerStep = 100000;

var text = window.location.href;
    
if(text.includes('user') && text.includes('edit'))
{
    dropzone.uploadFiles = function(files) {
        var self = this;

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

            for (var step = 0; step < totalSteps; step++) {
                var duration = timeBetweenSteps * (step + 1);
                setTimeout(function(file, totalSteps, step) {
                    return function() {
                        file.upload = {
                            progress: 100 * (step + 1) / totalSteps,
                            total: file.size,
                            bytesSent: (step + 1) * file.size / totalSteps
                        };

                        self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
                        if (file.upload.progress == 100) {
                            file.status = Dropzone.SUCCESS;
                            self.emit("success", file, 'success', null);
                            self.emit("complete", file);
                            self.processQueue();
                            //document.getElementsByClassName("dz-success-mark").style.opacity = "1";
                        }
                    };
                }(file, totalSteps, step), duration);
            }
        }
    }
}