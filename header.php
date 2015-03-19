<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">

    <title><?php

        if ( is_single() ) { single_post_title(); }      

        elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; bloginfo('description'); get_page_number(); }

        elseif ( is_page() ) { single_post_title(''); }

        elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); get_page_number(); }

        elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }

        else { bloginfo('name'); wp_title('|'); get_page_number(); }

    ?></title>

     

    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />

      <!-- the bootstrap styles -->

   <!--<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css">

    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/camera-favicon.gif">-->
<link rel="shortcut icon" href="http://stage.natewallace.org/wp-content/uploads/2015/03/fcct.gif">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->

    <!--[if lt IE 9]>

      <script src="../assets/js/html5shiv.js"></script>

    <![endif]-->

    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

    <?php wp_head(); ?>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />  

</head>

<body <?php body_class(); ?>>

<div class="wrapper">



<div class="container clearfix">

<div class="row-fluid clearfix">

	<div class="span8" style="margin-bottom:-20px; margin-top:20px;">

<?php if ( get_theme_mod( 'm1_logo' ) ) : ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="site-logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
 
        <img src="<?php echo get_theme_mod( 'm1_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
 
    </a>
 
    <?php else : ?>
               
    <hgroup>
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <p class="site-description"><?php bloginfo( 'description' ); ?></p>
    </hgroup>
               
<?php endif; ?>


</div>

<div class="span4" style="padding-top:15px;">
<p class="text-center"><a href="/donate" class="call-to-action">Donate Today!</a></p></div>
</div>

</div>             

<!-- NAVBAR

    ================================================== -->

    <div id="access">

    <div class="navbar-wrapper"> 

      <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->

      <div class="container">

        <div class="navbar <!--navbar-inverse-->">

          <div class="navbar-inner">

            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->

            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">

              <span class="icon-bar"></span>

              <span class="icon-bar"></span>

              <span class="icon-bar"></span>

            </button>

            <!--<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>-->

            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->

            <div class="nav-collapse collapse">

              <?php 

    wp_nav_menu( array(

        'menu'       => 'Main-Menu',

        'depth'      => 2,

        'container'  => false,

        'menu_class' => 'nav',

        'fallback_cb' => 'wp_page_menu',

        //Process nav menu using our custom nav walker

        'walker' => new wp_bootstrap_navwalker())

    );

?>

            </div><!--/.nav-collapse -->

        <div class="pull-right">
<a href="<?php echo get_theme_mod( 'facebook_link' ); ?>" title="facebook"><img style="margin-top:5px; margin-right:10px;" src="<?php echo get_template_directory_uri(); ?>/assets/img/fb-icon.png"></a>
<a href="<?php echo get_theme_mod( 'twitter_link' ); ?>" title="twitter"><img style="margin-top:5px;" src="<?php echo get_template_directory_uri(); ?>/assets/img/tw-icon.png"></a>

	</div>  
	</div><!-- /.navbar-inner -->

        </div><!-- /.navbar -->

      </div> <!-- /.container -->

    </div><!-- /.navbar-wrapper --></div><!-- #access -->