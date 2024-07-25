<?php
// Add admin menu
function lsf_blog_add_admin_menu() {
    add_menu_page(
        'LSF Blog Settings',
        'LSF Blog',
        'manage_options',
        'lsf_blog_settings',
        'lsf_blog_settings_page',
        'dashicons-book',
        50
    );
}
add_action('admin_menu', 'lsf_blog_add_admin_menu');

// Create the settings page
function lsf_blog_settings_page() {
    ?>
    <div class="wrap">
        <h1>LSF Blog Setting</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('lsf_blog_settings');
            do_settings_sections('lsf_blog_settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Register settings
function lsf_blog_register_settings() {
    register_setting('lsf_blog_settings', 'lsf_blog_heading_color');
    register_setting('lsf_blog_settings', 'lsf_blog_link_color');
    register_setting('lsf_blog_settings', 'lsf_blog_button_color');

    add_settings_section(
        'lsf_blog_color_settings',
        'Color Settings',
        'lsf_blog_color_settings_callback',
        'lsf_blog_settings'
    );

    add_settings_field(
        'lsf_blog_heading_color',
        'Heading Color',
        'lsf_blog_color_field_callback',
        'lsf_blog_settings',
        'lsf_blog_color_settings',
        array('label_for' => 'lsf_blog_heading_color')
    );

    add_settings_field(
        'lsf_blog_link_color',
        'Link Color',
        'lsf_blog_color_field_callback',
        'lsf_blog_settings',
        'lsf_blog_color_settings',
        array('label_for' => 'lsf_blog_link_color')
    );

    add_settings_field(
        'lsf_blog_button_color',
        'Button Color',
        'lsf_blog_color_field_callback',
        'lsf_blog_settings',
        'lsf_blog_color_settings',
        array('label_for' => 'lsf_blog_button_color')
    );
	
	
// 	ZEZANJE KRECE

	register_setting('lsf_blog_settings', 'lsf_blog_author_image');
    register_setting('lsf_blog_settings', 'lsf_blog_author_name');
    register_setting('lsf_blog_settings', 'lsf_blog_author_bio');

    add_settings_section(
        'lsf_blog_author_settings',
        'Author Settings',
        'lsf_blog_author_settings_callback',
        'lsf_blog_settings'
    );

    add_settings_field(
        'lsf_blog_author_image',
        'Author Image',
        'lsf_blog_author_image_callback',
        'lsf_blog_settings',
        'lsf_blog_author_settings'
    );

    add_settings_field(
        'lsf_blog_author_name',
        'Author Name',
        'lsf_blog_author_name_callback',
        'lsf_blog_settings',
        'lsf_blog_author_settings'
    );

    add_settings_field(
        'lsf_blog_author_bio',
        'Author Bio',
        'lsf_blog_author_bio_callback',
        'lsf_blog_settings',
        'lsf_blog_author_settings'
    );
}
add_action('admin_init', 'lsf_blog_register_settings');

// Callbacks
function lsf_blog_color_settings_callback() {
    echo '<p>Choose colors for your LSF Blog:</p>';
}

function lsf_blog_color_field_callback($args) {
    $option = get_option($args['label_for']);
    ?>
    <input type="text" 
           id="<?php echo esc_attr($args['label_for']); ?>"
           name="<?php echo esc_attr($args['label_for']); ?>"
           value="<?php echo esc_attr($option); ?>"
           class="lsf-blog-color-picker" />
    <?php
}

// Callback author
function lsf_blog_author_settings_callback() {
    echo '<p>Enter the author details for your LSF Blog:</p>';
}

function lsf_blog_author_image_callback() {
    $image_id = get_option('lsf_blog_author_image');
    $image_url = wp_get_attachment_url($image_id);
    ?>
    <div class="lsf-blog-author-image-container">
        <img id="lsf-blog-author-image-preview" src="<?php echo esc_url($image_url); ?>" style="max-width:100px; max-height:100px; display: <?php echo $image_url ? 'block' : 'none'; ?>">
        <input type="hidden" name="lsf_blog_author_image" id="lsf_blog_author_image" value="<?php echo esc_attr($image_id); ?>">
        <button type="button" class="button" id="lsf-blog-author-image-upload">Upload Image</button>
        <button type="button" class="button" id="lsf-blog-author-image-remove" style="display: <?php echo $image_url ? 'inline-block' : 'none'; ?>">Remove Image</button>
    </div>
    <?php
}

function lsf_blog_author_name_callback() {
    $author_name = get_option('lsf_blog_author_name');
    echo '<input type="text" name="lsf_blog_author_name" value="' . esc_attr($author_name) . '" class="regular-text">';
}

function lsf_blog_author_bio_callback() {
    $author_bio = get_option('lsf_blog_author_bio');
    echo '<textarea name="lsf_blog_author_bio"  rows="10" cols="15" class="regular-text" >' . esc_textarea($author_bio) . '</textarea>';
}

// Enqueue color picker
function lsf_blog_enqueue_admin_scripts($hook_suffix) {
    if ('toplevel_page_lsf_blog_settings' !== $hook_suffix) {
        return;
    }

    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
    wp_enqueue_media();

    wp_add_inline_script('wp-color-picker', '
        jQuery(document).ready(function($) {
            $(".lsf-blog-color-picker").wpColorPicker();

            var frame;
            $("#lsf-blog-author-image-upload").on("click", function(e) {
                e.preventDefault();
                if (frame) {
                    frame.open();
                    return;
                }
                frame = wp.media({
                    title: "Select or Upload Author Image",
                    button: {
                        text: "Use this image"
                    },
                    multiple: false
                });
                frame.on("select", function() {
                    var attachment = frame.state().get("selection").first().toJSON();
                    $("#lsf_blog_author_image").val(attachment.id);
                    $("#lsf-blog-author-image-preview").attr("src", attachment.url).css("display", "block");
                    $("#lsf-blog-author-image-remove").show();
                });
                frame.open();
            });

            $("#lsf-blog-author-image-remove").on("click", function(e) {
                e.preventDefault();
                $("#lsf_blog_author_image").val("");
                $("#lsf-blog-author-image-preview").attr("src", "").css("display", "none");
                $(this).hide();
            });
        });
    ');
}
add_action('admin_enqueue_scripts', 'lsf_blog_enqueue_admin_scripts');