<?php



// Make theme available for translation

// Translations can be filed in the /languages/ directory

load_theme_textdomain( 'full-foto', TEMPLATEPATH . '/languages' );

 

$locale = get_locale();

$locale_file = TEMPLATEPATH . "/languages/$locale.php";

if ( is_readable($locale_file) )

    require_once($locale_file);

	

	// Get the theme extras!

require_once('library/fullfoto.php');            // core functions (don't remove)

require_once('library/plugins.php');          // plugins & extra functions (optional)



// Bootstrapped Menu

 require_once('wp_bootstrap_navwalker.php');

 

// enqueue javascript

if( !function_exists( "theme_js" ) ) {  

  function theme_js(){

  

    wp_register_script( 'bootstrap', 

      get_template_directory_uri() . '/library/js/bootstrap.min.js', 

      array('jquery'), 

      '1.2' );

  

    wp_register_script( 'wpff-scripts', 

      get_template_directory_uri() . '/library/js/scripts.js', 

      array('jquery'), 

      '1.2' );

	  

	wp_register_script( 'eifix', 

      get_template_directory_uri() . '/library/js/css3-mediaqueries.js', 

      array('jquery'), 

      '1.2' );

  

    wp_register_script(  'modernizr', 

      get_template_directory_uri() . '/library/js/modernizr.full.min.js', 

      array('jquery'), 

      '1.2' );

  

    wp_enqueue_script('bootstrap');

    wp_enqueue_script('wpff-scripts');

	wp_enqueue_script('eifix');

    wp_enqueue_script('modernizr');

    

  }

}

add_action( 'wp_enqueue_scripts', 'theme_js' );

 

// Get the page number

function get_page_number() {

    if ( get_query_var('paged') ) {

        print ' | ' . __( 'Page ' , 'full-foto') . get_query_var('paged');

    }

} // end get_page_number



// create initial menu

function register_theme_menus() {

      register_nav_menus(

          array( 'main-menu' => __( 'Main Menu' ) )

      );

    }

    add_action( 'init', 'register_theme_menus' );

	

	

	/************* ACTIVE SIDEBARS ********************/



// Sidebars & Widgetizes Areas

function fullfoto_register_sidebars() {

    register_sidebar(array(

    	'id' => 'sidebar1',

    	'name' => 'Main Sidebar',

    	'description' => 'Used on every page BUT the homepage page template.',

    	'before_widget' => '<div id="sidebar1" class="fluid-sidebar sidebar span4" role="complementary">

				<section class="post_content entry-content"><div id="%1$s" class="widget %2$s">',

    	'after_widget' => '</div><section></div>',

    	'before_title' => '<h2 class="widgettitle">',

    	'after_title' => '</h2>',

    ));

    

    register_sidebar(array(

    	'id' => 'sidebar2',

    	'name' => 'Homepage Sidebar',

    	'description' => 'Used only on the homepage page template.',

    	'before_widget' => '<div class="span4" role="complementary">

	<section class="post_content entry-content"><div id="%1$s" class="widget %2$s">',

    	'after_widget' => '</div><section></div>',

    	'before_title' => '<h2 class="widgettitle hide">',

    	'after_title' => '</h2>',

    ));

    

    register_sidebar(array(

      'id' => 'footer1',

      'name' => 'Footer 1',

      'before_widget' => '<div id="sidebar1" class="fluid-sidebar sidebar span4" role="complementary">

				<section class="post_content entry-content"><div id="%1$s" class="widget %2$s">',

      'after_widget' => '</div><section></div>',

      'before_title' => '<h2 class="widgettitle">',

      'after_title' => '</h2>',

    ));



    register_sidebar(array(

      'id' => 'footer2',

      'name' => 'Footer 2',

      'before_widget' => '<div id="sidebar1" class="fluid-sidebar sidebar span4" role="complementary">

				<section class="post_content entry-content"><div id="%1$s" class="widget %2$s">',

      'after_widget' => '</div><section></div>',

      'before_title' => '<h2 class="widgettitle">',

      'after_title' => '</h2>',

    ));



    register_sidebar(array(

      'id' => 'footer3',

      'name' => 'Footer 3',

      'before_widget' => '<div id="sidebar1" class="fluid-sidebar sidebar span4" role="complementary">

				<section class="post_content entry-content"><div id="%1$s" class="widget %2$s">',

      'after_widget' => '</div><section></div>',

      'before_title' => '<h2 class="widgettitle">',

      'after_title' => '</h2>',

    ));

    

    

    /* 

    to add more sidebars or widgetized areas, just copy

    and edit the above sidebar code. In order to call 

    your new sidebar just use the following code:

    

    Just change the name to whatever your new

    sidebar's id is, for example:

    

    To call the sidebar in your template, you can just copy

    the sidebar.php file and rename it to your sidebar's name.

    So using the above example, it would be:

    sidebar-sidebar2.php

    

    */

} // don't remove this bracket!



/************* COMMENT LAYOUT *********************/

		

// Comment Layout

function fullfoto_comments($comment, $args, $depth) {

   $GLOBALS['comment'] = $comment; ?>

	<li <?php comment_class(); ?>>

		<article id="comment-<?php comment_ID(); ?>" class="clearfix">

			<div class="comment-author vcard row-fluid clearfix">

				<div class="avatar span3">

					<?php echo get_avatar( $comment, $size='75' ); ?>

				</div>

				<div class="span9 comment-text">

					<?php printf('<h4>%s</h4>', get_comment_author_link()) ?>

					<?php edit_comment_link(__('Edit','fullfoto'),'<span class="edit-comment btn btn-small btn-info"><i class="icon-white icon-pencil"></i>','</span>') ?>

                    

                    <?php if ($comment->comment_approved == '0') : ?>

       					<div class="alert-message success">

          				<p><?php _e('Your comment is awaiting moderation.','fullfoto') ?></p>

          				</div>

					<?php endif; ?>

                    

                    <?php comment_text() ?>

                    

                    <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>

                    

					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>

                </div>

			</div>

		</article>

    <!-- </li> is added by wordpress automatically -->

<?php

} // don't remove this bracket!



// Display trackbacks/pings callback function

function list_pings($comment, $args, $depth) {

       $GLOBALS['comment'] = $comment;

?>

        <li id="comment-<?php comment_ID(); ?>"><i class="icon icon-share-alt"></i>&nbsp;<?php comment_author_link(); ?>

<?php 



}



// Only display comments in comment count (which isn't currently displayed in wp-bootstrap, but i'm putting this in now so i don't forget to later)

add_filter('get_comments_number', 'comment_count', 0);

function comment_count( $count ) {

	if ( ! is_admin() ) {

		global $id;

	    $comments_by_type = separate_comments(get_comments('status=approve&post_id=' . $id));

	    return count($comments_by_type['comment']);

	} else {

	    return $count;

	}

}



/************* SEARCH FORM LAYOUT *****************/



// Search Form

function fullfoto_wpsearch( $form ) {

  $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >

  <label class="screen-reader-text" for="s">' . __('Search for:', 'fullfoto') . '</label>

  <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search the Site..." />

  <input type="submit" id="searchsubmit" value="'. esc_attr__('Search','fullfoto') .'" />

  </form>';

  return $form;

} // don't remove this bracket!



/****************** password protected post form *****/



add_filter( 'the_password_form', 'custom_password_form' );



function custom_password_form() {

	global $post;

	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );

	$o = '<div class="clearfix"><form class="protected-post-form" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post">

	' . '<p>' . __( "This post is password protected. To view it please enter your password below:" ,'fullfoto') . '</p>' . '

	<label for="' . $label . '">' . __( "Password:" ,'fullfoto') . ' </label><div class="input-append"><input name="post_password" id="' . $label . '" type="password" size="20" /><input type="submit" name="Submit" class="btn btn-primary" value="' . esc_attr__( "Submit",'fullfoto' ) . '" /></div>

	</form></div>

	';

	return $o;

}



/*********** update standard wp tag cloud widget so it looks better ************/



add_filter( 'widget_tag_cloud_args', 'my_widget_tag_cloud_args' );



function my_widget_tag_cloud_args( $args ) {

	$args['number'] = 20; // show less tags

	$args['largest'] = 9.75; // make largest and smallest the same - i don't like the varying font-size look

	$args['smallest'] = 9.75;

	$args['unit'] = 'px';

	return $args;

}



// filter tag cloud output so that it can be styled by CSS

function add_tag_class( $taglinks ) {

    $tags = explode('</a>', $taglinks);

    $regex = "#(.*tag-link[-])(.*)(' title.*)#e";

    $term_slug = "(get_tag($2) ? get_tag($2)->slug : get_category($2)->slug)";



        foreach( $tags as $tag ) {

        	$tagn[] = preg_replace($regex, "('$1$2 label tag-'.$term_slug.'$3')", $tag );

        }



    $taglinks = implode('</a>', $tagn);



    return $taglinks;

}



add_action( 'wp_tag_cloud', 'add_tag_class' );



add_filter( 'wp_tag_cloud','wp_tag_cloud_filter', 10, 2) ;



function wp_tag_cloud_filter( $return, $args )

{

  return '<div id="tag-cloud">' . $return . '</div>';

}



// Enable shortcodes in widgets

add_filter( 'widget_text', 'do_shortcode' );



// Disable jump in 'read more' link

function remove_more_jump_link( $link ) {

	$offset = strpos($link, '#more-');

	if ( $offset ) {

		$end = strpos( $link, '"',$offset );

	}

	if ( $end ) {

		$link = substr_replace( $link, '', $offset, $end-$offset );

	}

	return $link;

}

add_filter( 'the_content_more_link', 'remove_more_jump_link' );



// Add the Meta Box to the homepage template

function add_homepage_meta_box() {  

	global $post;



	// Only add homepage meta box if template being used is the homepage template

	// $post_id = isset($_GET['post']) ? $_GET['post'] : (isset($_POST['post_ID']) ? $_POST['post_ID'] : "");

	$post_id = $post->ID;

	$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);



	if ( $template_file == 'page-homepage.php' ){

	    add_meta_box(  

	        'homepage_meta_box', // $id  

	        'Optional Homepage Tagline', // $title  

	        'show_homepage_meta_box', // $callback  

	        'page', // $page  

	        'normal', // $context  

	        'high'); // $priority  

    }

}



add_action( 'add_meta_boxes', 'add_homepage_meta_box' );



// Field Array  

$prefix = 'custom_';  

$custom_meta_fields = array(  

    array(  

        'label'=> 'Homepage tagline area',  

        'desc'  => 'Displayed underneath page title. Only used on homepage template. HTML can be used.',  

        'id'    => $prefix.'tagline',  

        'type'  => 'textarea' 

    )  

);  



// The Homepage Meta Box Callback  

function show_homepage_meta_box() {  

  global $custom_meta_fields, $post;



  // Use nonce for verification

  wp_nonce_field( basename( __FILE__ ), 'wpff_nonce' );

    

  // Begin the field table and loop

  echo '<table class="form-table">';



  foreach ( $custom_meta_fields as $field ) {

      // get value of this field if it exists for this post  

      $meta = get_post_meta($post->ID, $field['id'], true);  

      // begin a table row with  

      echo '<tr> 

              <th><label for="'.$field['id'].'">'.$field['label'].'</label></th> 

              <td>';  

              switch($field['type']) {  

                  // text  

                  case 'text':  

                      echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="60" /> 

                          <br /><span class="description">'.$field['desc'].'</span>';  

                  break;

                  

                  // textarea  

                  case 'textarea':  

                      echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="80" rows="4">'.$meta.'</textarea> 

                          <br /><span class="description">'.$field['desc'].'</span>';  

                  break;  

              } //end switch  

      echo '</td></tr>';  

  } // end foreach  

  echo '</table>'; // end table  

}  



// Save the Data  

function save_homepage_meta( $post_id ) {  



    global $custom_meta_fields;  

  

    // verify nonce  

    if ( !isset( $_POST['wpff_nonce'] ) || !wp_verify_nonce($_POST['wpff_nonce'], basename(__FILE__)) )  

        return $post_id;



    // check autosave

    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )

        return $post_id;



    // check permissions

    if ( 'page' == $_POST['post_type'] ) {

        if ( !current_user_can( 'edit_page', $post_id ) )

            return $post_id;

        } elseif ( !current_user_can( 'edit_post', $post_id ) ) {

            return $post_id;

    }

  

    // loop through fields and save the data  

    foreach ( $custom_meta_fields as $field ) {

        $old = get_post_meta( $post_id, $field['id'], true );

        $new = $_POST[$field['id']];



        if ($new && $new != $old) {

            update_post_meta( $post_id, $field['id'], $new );

        } elseif ( '' == $new && $old ) {

            delete_post_meta( $post_id, $field['id'], $old );

        }

    } // end foreach

}

add_action( 'save_post', 'save_homepage_meta' );



// Add lead class to first paragraph

function first_paragraph( $content ){

    global $post;



    // if we're on the homepage, don't add the lead class to the first paragraph of text

    if( is_page_template( 'page-homepage.php' ) )

        return $content;

    else

        return preg_replace('/<p([^>]+)?>/', '<p$1 class="lead">', $content, 1);

}

add_filter( 'the_content', 'first_paragraph' );

	

	/**

 * Extends the default WordPress body class to denote:

 * 1. Using a full-width layout, when no active widgets in the sidebar

 *    or full-width template.

 * 2. Front Page template: thumbnail in use and number of sidebars for

 *    widget areas.

 * 3. White or empty background color to change the layout and spacing.

 * 4. Custom fonts enabled.

 * 5. Single or multiple authors.

 *

 *

 * @param array Existing class values.

 * @return array Filtered class values.

 */

function fullfoto_body_class( $classes ) {

	$background_color = get_background_color();

		

	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/clearbg.php' ) )

		$classes[] = 'full-width';



	if ( is_page_template( 'page-templates/front-page.php' ) ) {

		$classes[] = 'imgbackground';

		if ( has_post_thumbnail() )

			$classes[] = 'has-post-thumbnail';

		if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )

			$classes[] = 'two-sidebars';

	}



	if ( empty( $background_color ) )

		$classes[] = 'custom-background-empty';

	elseif ( in_array( $background_color, array( '000', '000000' ) ) )

		$classes[] = 'custom-background-black';



	// Enable custom font class only if the font CSS is queued to load.

	if ( wp_style_is( 'fullfoto-fonts', 'queue' ) )

		$classes[] = 'custom-font-enabled';



	if ( ! is_multi_author() )

		$classes[] = 'single-author';



	return $classes;

}

add_filter( 'body_class', 'fullfoto_body_class' );



// This theme uses a custom image size for featured images, displayed on "standard" posts.

	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop

	

	// This theme uses a custom image size for featured images, displayed on "front" page.

	add_theme_support( 'page-feature' );

	set_post_thumbnail_size( 9999, 480 ); // Unlimited width, soft crop

	
/**

 *

 *

 * @param WP_Customize_Manager $wp_customize Theme Customizer object.

 * @return void

 */



function fullfoto_customize_register( $wp_customize ) {	


$wp_customize->add_section('fullfoto_social', array(

		'title' => __('Social Media Links', 'fullfoto'),

		'discription' => 'Link your Twitter and Facebook accounts'

	));
$wp_customize->add_setting('twitter_link', array(

		'default' => '',

	));
$wp_customize->add_setting('facebook_link', array(

		'default' => '',

	));

 $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook_link', array(
        'label'    => __( 'Facebook Link', 'fb' ),
        'section'  => 'fullfoto_social',
        'settings' => 'facebook_link',
    ) ) );
 $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter_link', array(
        'label'    => __( 'Twitter Link', 'tw' ),
        'section'  => 'fullfoto_social',
        'settings' => 'twitter_link',
    ) ) );

$wp_customize->add_setting( 'm1_logo' ); // Add setting for logo uploader
         
    // Add control for logo uploader (actual uploader)
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'm1_logo', array(
        'label'    => __( 'Upload Logo (replaces text)', 'm1' ),
        'section'  => 'title_tagline',
        'settings' => 'm1_logo',
    ) ) );

	$wp_customize->add_section('fullfoto_colors', array(

		'title' => __('Text Colors', 'fullfoto'),

		'discription' => 'Modify the theme colors'

	));

	

	$wp_customize->add_setting('link_color', array(

		'default' => '#4be1f2',

	));

	$wp_customize->add_setting('hover_color', array(

		'default' => '#34c5e2',

	));

	$wp_customize->add_setting('title_color', array(

		'default' => '#333',

	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'title_color', array(

		'label' => __('Edit Page Title Color', 'fullfoto'),

		'section' => 'fullfoto_colors',

		'settings' => 'title_color'

	)  ));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_color', array(

		'label' => __('Edit Link Color', 'fullfoto'),

		'section' => 'fullfoto_colors',

		'settings' => 'link_color'

	)  ));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'hover_color', array(

		'label' => __('Edit Hover Color', 'fullfoto'),

		'section' => 'fullfoto_colors',

		'settings' => 'hover_color'

	)  ));

}



add_action( 'customize_register', 'fullfoto_customize_register' );



$args = array(

	'default-color' => '000000',

	'default-image' => get_template_directory_uri() . '/assets/img/home-bg.jpg',

	

);

add_theme_support( 'custom-background', $args );


function fullfoto_css_customizer() {

	?>

    <style type="text/css">

	body { background-color:;}

	a	 { color:<?php echo get_theme_mod('link_color'); ?>;} 

	a:hover,

	a:focus { color:<?php echo get_theme_mod('hover_color'); ?>;}

	h1, h2, h3, h4, h5, h6	 { color:<?php echo get_theme_mod('title_color'); ?>;} 

	</style>

    <?php

	}

add_action('wp_head', 'fullfoto_css_customizer');



/**

 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.

 *

 */

function fullfoto_customize_preview_js() {

	wp_enqueue_script( 'fullfoto-customizer', get_template_directory_uri() . '/assets/js/theme-customizer.js', array( 'customize-preview' ), '20120827', true );

}

add_action( 'customize_preview_init', 'fullfoto_customize_preview_js' );

?>