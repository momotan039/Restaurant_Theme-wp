<?php
// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Register Theme Settings Fields
function custom_theme_settings_init()
{
    // Register settings:that means register all fields I have in the database
    register_setting('theme_settings_group', 'hero_title');
    register_setting('theme_settings_group', 'hero_description');
    register_setting('theme_settings_group', 'hero_image');
    register_setting('theme_settings_group', 'primary_color');
    register_setting('theme_settings_group', 'light_color');
    register_setting('theme_settings_group', 'dark_color');
    register_setting('theme_settings_group', 'about_description');
    register_setting('theme_settings_group', 'years_experience');
    register_setting('theme_settings_group', 'popular_master_chefs');
    register_setting('theme_settings_group', 'about_image_left_top');
    register_setting('theme_settings_group', 'about_image_right_top');
    register_setting('theme_settings_group', 'about_image_left_bottom');
    register_setting('theme_settings_group', 'about_image_right_bottom');

    // Hero Section
    add_settings_section('hero_section', 'Hero Section', null, 'theme-settings');
    add_settings_field('hero_title', 'Hero Title','hero_title_callback', 'theme-settings', 'hero_section');
    add_settings_field('hero_description', 'Hero Description', 'hero_description_callback', 'theme-settings', 'hero_section');
    add_settings_field('hero_image', 'Hero Image URL', function(){upload_image_callback('hero_image');}, 'theme-settings', 'hero_section');

    // About Section
    add_settings_section('about_section', 'About Section', null, 'theme-settings');
    add_settings_field('about_description', 'About Description', 'about_description_callback', 'theme-settings', 'about_section');
    add_settings_field('years_experience', 'Years of Experience', 'years_experience_callback', 'theme-settings', 'about_section');
    add_settings_field('popular_master_chefs', 'Popular Master Chefs', 'popular_master_chefs_callback', 'theme-settings', 'about_section');
    add_settings_field('about_image_left_top', 'Image: Left Top URL', function(){upload_image_callback('about_image_left_top');}, 'theme-settings', 'about_section');
    add_settings_field('about_image_right_top', 'Image: Right Top URL', function(){upload_image_callback('about_image_right_top');}, 'theme-settings', 'about_section');
    add_settings_field('about_image_left_bottom', 'Image: Left Bottom URL', function(){upload_image_callback('about_image_left_bottom');}, 'theme-settings', 'about_section');
    add_settings_field('about_image_right_bottom', 'Image: Right Bottom URL', function(){upload_image_callback('about_image_right_bottom');}, 'theme-settings', 'about_section');

    // Colors Section
    add_settings_section('color_section', 'Colors Settings', null, 'theme-settings');
    add_settings_field('primary_color', 'Primary Color', 'primary_color_callback', 'theme-settings', 'color_section');
    add_settings_field('light_color', 'Light Color', 'light_color_callback', 'theme-settings', 'color_section');
    add_settings_field('dark_color', 'Dark Color', 'dark_color_callback', 'theme-settings', 'color_section');
}
add_action('admin_init', 'custom_theme_settings_init');

// Callback Functions for Fields
function hero_title_callback()
{
    $hero_title = get_option('hero_title', 'Welcome to My Restaurant');
    echo '<input type="text" name="hero_title" value="' . esc_attr($hero_title) . '" class="regular-text">';
}
function hero_description_callback()
{
    $hero_descrip = get_option('hero_description', 'Express How Much Your Food Is Taste😋');
    echo '<input type="text" name="hero_description" value="' . esc_attr($hero_descrip) . '" class="regular-text">';
}

function upload_image_callback($field_id)
{
    $image = get_option($field_id, 'https://placehold.co/800');
?>
    <input type="text" id="<?php echo $field_id?>" name="<?php echo $field_id?>" value="<?php echo esc_url($image); ?>" class="regular-text">
    <button type="button" class="button button-secondary" id="<?php echo $field_id.'btn'?>">Upload Image</button>
    <p class="description">Upload or select an image</p>
    <div id="<?php echo $field_id.'_preview'?>" style="margin-top:10px;">
        <?php if ($image) : ?>
            <img src="<?php echo esc_url($image); ?>" style="max-width: 200px; height: auto;">
        <?php endif; ?>
    </div>
<?php
}

function primary_color_callback()
{
    $primary_color = get_option('primary_color', '#FEA116');
    echo '<input type="color" name="primary_color" value="' . esc_attr($primary_color) . '">';
}

function light_color_callback()
{
    $light_color = get_option('light_color', '#F1F8FF');
    echo '<input type="color" name="light_color" value="' . esc_attr($light_color) . '">';
}

function dark_color_callback()
{
    $dark_color = get_option('dark_color', '#0F172B)');
    echo '<input type="color" name="dark_color" value="' . esc_attr($dark_color) . '">';
}

function about_description_callback() {
    echo '<textarea name="about_description" rows="5" cols="50" style="width:100%;">' . esc_textarea(get_option('about_description')) . '</textarea>';
}

function years_experience_callback() {
    echo '<input type="number" name="years_experience" value="' . esc_attr(get_option('years_experience')) . '" min="0" />';
}

function popular_master_chefs_callback() {
    echo '<input type="number" name="popular_master_chefs" value="' . esc_attr(get_option('popular_master_chefs')) . '" min="0" />';
}

function about_image_left_top_callback() {
    echo '<input type="text" name="about_image_left_top" value="' . esc_attr(get_option('about_image_left_top')) . '" style="width:100%;" />';
}

function about_image_right_top_callback() {
    echo '<input type="text" name="about_image_right_top" value="' . esc_attr(get_option('about_image_right_top')) . '" style="width:100%;" />';
}

function about_image_left_bottom_callback() {
    echo '<input type="text" name="about_image_left_bottom" value="' . esc_attr(get_option('about_image_left_bottom')) . '" style="width:100%;" />';
}

function about_image_right_bottom_callback() {
    echo '<input type="text" name="about_image_right_bottom" value="' . esc_attr(get_option('about_image_right_bottom')) . '" style="width:100%;" />';
}

function custom_reset_theme_settings()
{
    if (!current_user_can('manage_options')) {
        return;
    }

    // Delete theme settings
    delete_option('hero_title');
    delete_option('hero_description');
    delete_option('hero_image');
    delete_option('primary_color');
    delete_option('light_color');
    delete_option('dark_color');
    delete_option('about_image_right_bottom');
    delete_option('about_image_left_bottom');
    delete_option('about_image_right_top');
    delete_option('about_image_left_top');
    delete_option('popular_master_chefs');
    delete_option('years_experience');
    delete_option('about_description');
    exit;
}
