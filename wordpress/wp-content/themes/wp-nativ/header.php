<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php wp_title( '' ); ?><?php if ( wp_title( '', false ) ) { echo ' :'; } ?> <?php bloginfo( 'name' ); ?></title>

  <link href="http://www.google-analytics.com/" rel="dns-prefetch"><!-- dns prefetch -->

  <!-- icons -->
  <link href="<?php echo get_template_directory_uri(); ?>/favicon.ico" rel="shortcut icon">

  <!--[if lt IE 9]>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- css + javascript -->
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- wrapper -->
<div class="wrapper">

  <header>
    <div class="present-line">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
              <?php if( have_rows('header_sale') ): ?>
                <?php while ( have_rows('header_sale') ) : the_row(); ?>
                  <?php $image = get_sub_field('icon'); ?>

                  <?php if ( !empty($image)) { ?>
                    <img src="<?php echo $image['url']; ?>" />
                  <?php } ?>
                  <?php the_sub_field('text'); ?>
                <?php  endwhile; ?>
              <?php endif; ?>

          </div>
        </div>
      </div><!-- /.container -->
    </div><!-- /.present-line -->
    <div class="header-line">
      <div class="container">

          <div class="logo">
              <a href="#top">
                <img src="<?php echo get_template_directory_uri(); ?>/img/big-logo.png" alt="<?php wp_title( '' ); ?>" title="<?php wp_title( '' ); ?>" class="logo-img">
              </a>
          </div><!-- /logo -->
          <div class="slogan">
            <p><b class="blue-txt hidden-sm">НАТИВ</b> - 100% натуральный продукт</p>
          </div>
          <div class="lang-nav"><?php wpeHeadNav(); ?></div>
          <div class="head-contacts">
            <a href="tel:+<?php echo preg_replace("/[^0-9]/", '', get_field('head_main_phone')); ?>" class="main-phone"><?php the_field('head_main_phone'); ?></a>
            <div class="contacts">
              <a href="skype:<?php the_field('head_skype'); ?>?call" class="head-skype"><?php the_field('head_skype'); ?></a>
              <div class="tel_wrap">
                <a href="viber://chat?number=<?php echo preg_replace("/[^0-9]/", '', get_field('head_phone')); ?>" class="head-viber"></a>
                <a href="whatsapp://send?phone=<?php echo preg_replace("/[^0-9]/", '', get_field('head_phone')); ?>" class="head-watsup"></a>
                <a href="tel:+<?php echo preg_replace("/[^0-9]/", '', get_field('head_phone')); ?>" class="head-phone"><?php the_field('head_phone'); ?></a>
              </div>
            </div>
          </div>
          <div class="head-cart">
            <a src="#my-cart-modal" data-toggle="modal" class="glyphicon glyphicon-shopping-cart my-cart-icon">
              <span class="badge badge-notify my-cart-badge"></span>
            </a>
          </div>

      </div><!-- /.container -->
    </div>


      <nav class="nav" role="navigation">

      </nav><!-- /nav -->


  </header><!-- /header -->











