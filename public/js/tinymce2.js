tinymce.init({
    selector: 'textarea',
    plugins: 'autoresize image table link',
    paste_data_images: true,
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    extended_valid_elements: 'span[*]', // Needed to retain spans without attributes these are removed by default
    formats: {
        removeformat: [
        // Configures `clear formatting` to remove specified elements regardless of it's attributes
        { selector: 'b,strong,em,i,font,u,strike', remove: 'all' },

        // Configures `clear formatting` to remove the class red from spans and if the element then becomes empty i.e has no attributes it gets removed
        { selector: 'span', classes: 'red', remove: 'empty' },

        // Configures `clear formatting` to remove the class green from spans and if the element then becomes empty it's left intact
        { selector: 'span', classes: 'green', remove: 'none' }
        ]
    },
    image_advtab: true,
    file_picker_callback: function(callback, value, meta) {
        if (meta.filetype == 'image') {
            $('#upload').trigger('click');
            $('#upload').on('change', function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    callback(e.target.result, {
                    alt: ''
                    });
                };
                reader.readAsDataURL(file);
            });
        }
    },
});