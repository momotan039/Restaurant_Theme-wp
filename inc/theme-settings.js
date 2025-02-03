// handel show uploading image wp form
jQuery(document).ready(function($) {
    $('#upload_hero_image_button').click(function(e) {
        e.preventDefault();

        var mediaUploader = wp.media({
            title: 'Select Hero Image',
            button: { text: 'Use this image' },
            multiple: false
        });

        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#hero_image').val(attachment.url);
            $('#hero_image_preview').html('<img src="' + attachment.url + '" style="max-width: 200px; height: auto;">');
        });

        mediaUploader.open();
    });
});
