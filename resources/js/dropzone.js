let text = window.location.href;

let pattern = 'user/' + LoggedUser.id + '/edit';

if(text.match(pattern) !== null && LoggedUser.doctor !== null)
{
    window.Dropzone = require('dropzone');
    Dropzone.autoDiscover = false;

    $(function(){
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
            success: function(file, response) {
                console.log(response);
            },
            error: function(file, response) {
                return false;
            },
        };
    })
}