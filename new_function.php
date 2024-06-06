// Enable support for menus
add_theme_support('menus');

// Enable support for widgets
add_theme_support('widgets');

// Enable support for custom logo
add_theme_support('custom-logo');

// Enable support for custom background
add_theme_support('custom-background');

// Enable support for custom header
add_theme_support('custom-header');

// Enable support for post thumbnails
add_theme_support('post-thumbnails');

// Enable support for custom CSS in the Customizer
function my_theme_custom_css()
{
	wp_enqueue_style('my-custom-css', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'my_theme_custom_css');

// Enable support for the Theme Customizer
function my_theme_customize_register($wp_customize)
{
	// Add a setting for the site logo.
	$wp_customize->add_setting('custom_logo');

	// Add a control to upload the logo
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_logo', array(
		'label'    => __('Upload Logo', 'theme_textdomain'),
		'section'  => 'title_tagline',
		'settings' => 'custom_logo',
	)));
}
add_action('customize_register', 'my_theme_customize_register');


//Ensure the Customizer Options Are Available
function my_theme_enqueue_styles()
{
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
