// Handle uploading image in WordPress form
jQuery(document).ready(function($) {
    function handleImageUpload( inputFieldId, title = 'Select Image') {
        $(inputFieldId+'btn').click(function(e) {
            e.preventDefault();

            var mediaUploader = wp.media({
                title: title,
                button: { text: 'Use this image' },
                multiple: false
            });

            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                $(inputFieldId).val(attachment.url);
                $(inputFieldId+'_preview').html('<img src="' + attachment.url + '" style="max-width: 200px; height: auto;">');
            });

            mediaUploader.open();
        });
    }

    // Initialize for multiple fields
    handleImageUpload('#hero_image', 'Select Hero Image');
    handleImageUpload('#about_image_left_top', 'Select Left Top Image');
    handleImageUpload('#about_image_right_top', 'Select Right Top Image');
    handleImageUpload('#about_image_left_bottom', 'Select Left Bottom Image');
    handleImageUpload('#about_image_right_bottom', 'Select Left Bottom Image');
});
