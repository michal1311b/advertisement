tinymce.init({
    selector: 'textarea',
    plugins: 'autoresize image',
    paste_data_images: true,
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
    }
});