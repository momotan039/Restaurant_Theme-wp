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

    // Hero Section
    add_settings_section('hero_section', 'Hero Section', null, 'theme-settings');
    add_settings_field('hero_title', 'Hero Title', 'hero_title_callback', 'theme-settings', 'hero_section');
    add_settings_field('hero_description', 'Hero Description', 'hero_description_callback', 'theme-settings', 'hero_section');
    add_settings_field('hero_image', 'Hero Image URL', 'hero_image_callback', 'theme-settings', 'hero_section');

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
function hero_image_callback()
{
    $hero_image = get_option('hero_image', 'https://placehold.co/800');
?>
    <input type="text" id="hero_image" name="hero_image" value="<?php echo esc_url($hero_image); ?>" class="regular-text">
    <button type="button" class="button button-secondary" id="upload_hero_image_button">Upload Image</button>
    <p class="description">Upload or select an image for the hero section.</p>
    <div id="hero_image_preview" style="margin-top:10px;">
        <?php if ($hero_image) : ?>
            <img src="<?php echo esc_url($hero_image); ?>" style="max-width: 200px; height: auto;">
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

    exit;
}
