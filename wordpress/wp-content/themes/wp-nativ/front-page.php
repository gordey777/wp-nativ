<?php /* Template Name: Home Page */ get_header(); ?>

<?php $lending__id = get_the_ID(); ?>


  <?php if( have_rows('main_slider') ): ?>
  <div id="main-slider" class="slider owl-carousel owl-theme">
    <?php $i = 0; ?>
    <?php while ( have_rows('main_slider') ) : the_row(); ?>
      <?php $bg_image = get_sub_field('bg_img'); ?>
      <?php $image = get_sub_field('img'); ?>
      <?php $link = get_sub_field('link'); ?>
      <?php $slide_product = get_sub_field('product'); ?>
      <?php $timer = get_sub_field('timer'); ?>


      <?php $dataTimer =  ((int)$timer[0]["time_value"] * 86400 + (int)$timer[1]["time_value"] * 3600 + (int)$timer[2]["time_value"] * 60 + (int)$timer[3]["time_value"]);?>

      <?php $slide_product = get_sub_field('product')[0]; ?>


      <div class="slide item"  style="background-image: url(<?php if ( !empty($bg_image)) { echo $bg_image['url'];} ?>);">

        <div class="container">
          <div class="row">
            <div class="col-md-12 slide-content">
              <?php the_sub_field('title'); ?>
            </div>

            <?php if ( !empty(get_sub_field('product')) ) { ?>
              <div class="col-xs-5 slide-img" style="background-image: url(<?php if ( !empty($image)) { echo $image['url'];} ?>);">
                <?php //if ( !empty($image)) { ?>
                <!-- <img src="<?php //echo $image['url']; ?>" alt="<?php //the_title(); ?>" /> -->
                <?php //} ?>
              </div>

              <div class="col-xs-7 slide-prod">

                <div class="slide-subtitle"><?php the_sub_field('slogan'); ?></div>
                <?php if ( get_sub_field('timer_switch') ) { ?>
                  <div class="timer_wrapp col-lg-10 col-lg-offset-1">
                    <div id="clockdiv-<?php  echo $i;?>" class="slide-timer" data-timer="<?php echo $dataTimer;?>">
                      <div class="sale"><?php the_sub_field('sale_text'); ?></div>
                      <div class="timer-item">
                        <span class="days"></span>
                        <div class="smalltext">
                          <?php echo $timer[0]["time_label"];?>
                        </div>
                      </div>
                      <div class="timer-item">
                        <span class="hours"></span>
                        <div class="smalltext">
                          <?php echo $timer[1]["time_label"];?>
                        </div>
                      </div>
                      <div class="timer-item">
                        <span class="minutes"></span>
                        <div class="smalltext">
                          <?php echo $timer[2]["time_label"];?>
                        </div>
                      </div>
                      <div class="timer-item">
                        <span class="seconds"></span>
                        <div class="smalltext">
                          <?php echo $timer[3]["time_label"];?>
                        </div>
                      </div>
                    </div>
                  </div>

                <?php } ?>


                <?php if ( get_field('price', $slide_product) ) { ?>
                  <div class="price_wrapp col-md-10 col-md-offset-1">

                    <div class="slide-oldprice">
                      <?php echo number_format(get_field('old_price', $slide_product),0,'',' '); ?>
                      <span class="currency"><?php the_field('currency', $slide_product); ?></span>
                    </div>
                    <div class="slide-price">
                      <?php echo number_format(get_field('price', $slide_product),0,'',' '); ?>
                      <span class="currency"><?php the_field('currency', $slide_product); ?></span>
                    </div>

                    <button class="slide-btn green-big-btn my-cart-btn" data-id="<?php echo $slide_product; ?>" data-name="<?php echo get_the_title( $slide_product ); ?>" data-summary="summary 2" data-price="<?php the_field('price', $slide_product);?>" data-quantity="1" data-currency="<?php the_field('currency', $slide_product); ?>" data-image="<?php echo $image['sizes']['small']; ?>"><?php the_field('buy_btn', $lending__id);?></button>
                  <div class="btn-wrapp">
                  <a href="#modal-product-<?php echo $slide_product; ?>" class="slide-btn btn green-btn" data-toggle="modal">
                    <?php the_field('more_btn', $lending__id);?>
                  </a></div>
                  </div>
                <?php } ?>

              </div>
<div class="clearfix"></div>
              <div class="col-md-10 col-md-offset-1 slide_desc"><?php the_field('short_desk', $slide_product); ?></div>
            <?php } ?>
          </div>
        </div>

      </div>
      <?php $i++; ?>
      <?php  endwhile; ?>
    </div>
  <?php endif; ?>


  <?php $product_objects = get_field('products'); ?>

  <?php  if( $product_objects ): ?>
    <section id="products">

      <div class="container">

        <div class="row">
          <h2><?php the_field('prods_title'); ?></h2>


          <?php foreach( $product_objects as $post): ?>
            <?php setup_postdata($post); ?>

              <div id="product-<?php the_ID(); ?>" <?php post_class('looper col-md-4'); ?>>

                <?php if(get_field('hit_sale')) { ?>
                  <div class="best-seler"><?php the_field('hit_label', $lending__id); ?></div>
                <?php } ?>
                  <?php if ( has_post_thumbnail()) { ?>

                    <img src="<?php echo the_post_thumbnail_url('medium'); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
                  <?php } else { ?>
                    <img src="<?php echo catchFirstImage(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
                  <?php } ?>
                <h3 class="inner-title"><?php the_title(); ?></h3>
                <div class="prod-desc"><?php the_field('short_desk'); ?></div>
                <?php if(get_field('old_price')){ ?>
                  <div class="prod-old-price">
                    <?php the_field('old_price'); ?>
                    <span class="prod-curr"><?php the_field('currency'); ?></span>
                  </div>
                <?php }?>

                <div class="prod-price">
                  <?php the_field('price');?>
                  <span class="prod-curr"><?php the_field('currency'); ?></span>
                </div>

                  <button class="green-bg-btn my-cart-btn" data-id="<?php the_ID(); ?>" data-name="<?php the_title(); ?>" data-summary="summary 2" data-price="<?php the_field('price');?>" data-currency="<?php the_field('currency'); ?>" data-quantity="1" data-image="<?php echo the_post_thumbnail_url('small'); ?>"><?php the_field('buy_btn', $lending__id);?></button>
                  <a href="#modal-product-<?php the_ID(); ?>" class="prod-more-btn btn blue-btn" data-toggle="modal"><?php the_field('more_btn', $lending__id);?></a>

              </div><!-- /looper -->

          <?php endforeach; ?>


          <?php wp_reset_postdata(); ?>

          <?php if( have_rows('prods_delivery', $lending__id) ): ?>
            <div class="delivery col-md-8 col-md-offset-2">
              <?php while ( have_rows('prods_delivery', $lending__id) ) : the_row(); ?>
                <?php $image = get_sub_field('icon'); ?>
                  <?php if ( !empty($image)) { ?>
                    <img src="<?php echo $image['url']; ?>" alt="" />
                  <?php } ?>
                <?php the_sub_field('delivery_title'); ?>
              <?php  endwhile; ?>
            </div>
          <?php endif; ?>
        </div>

      </div>
    </section>
  <?php endif; ?>


  <?php if( have_rows('whoo_use', $lending__id) ): ?>
    <section id="whoo_use">
      <div class="container">
        <h2><?php the_field('whoo_use_title', $lending__id); ?></h2>
        <div class="whoo-items">
          <?php $i = 0; ?>
          <?php while ( have_rows('whoo_use', $lending__id) ) : the_row(); ?>
            <?php $image = get_sub_field('img'); ?>
            <?php $delay = ($i * .3) . 's'; ?>

            <div class="whoo-item fadeIn wow animated" data-wow-delay="<?php echo $delay; ?>">
              <div class="whoo-img" style="background-image: url(<?php if ( !empty($image)) { echo $image['url'];} ?>);">
              </div>
              <div class="whoo-desc">
                <?php the_sub_field('desc'); ?>
              </div>
            </div>
            <?php $i++; ?>
          <?php  endwhile; ?>

        </div>
      </div>

    </section>
  <?php endif; ?>


  <?php if( have_rows('advantage', $lending__id) ): ?>
    <section id="advanteges">
      <div class="container">
        <h2><?php the_field('advantage_title', $lending__id); ?></h2>
        <ol>
          <?php while ( have_rows('advantage', $lending__id) ) : the_row(); ?>
            <li class="fadeIn wow"><span><?php the_sub_field('desc'); ?></span></li>
          <?php  endwhile; ?>

        </ol>
      </div>

    </section>
  <?php endif; ?>

  <section id="certificate">
    <div class="container">
      <h2><?php the_field('sert_title', $lending__id); ?></h2>
      <div class="cert-cont"><?php the_field('sert_content', $lending__id); ?></div>
    </div>
  </section>

  <?php if( have_rows('faq_block', $lending__id) ): ?>
    <section id="faq-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 faq-items">
        <h2><?php the_field('faq_title', $lending__id); ?></h2>

          <?php while ( have_rows('faq_block', $lending__id) ) : the_row(); ?>

            <div class="faq-item fadeIn wow">
              <div class="question"><p><?php the_sub_field('question'); ?></p></div>
              <div class="answer"><?php the_sub_field('answer'); ?></div>
            </div>

          <?php  endwhile; ?>

          </div>
        </div>

      </div>

    </section>
  <?php endif; ?>

  <?php $vidos = get_field('video_block', $lending__id); ?>
  <?php if(!empty($vidos)): ?>
    <section id="video-doctor">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2><?php the_field('video_title', $lending__id); ?></h2>

          </div>
          <div class="col-md-10 col-md-offset-1">
            <div class="video-wrapp">
              <?php echo $vidos['iframe']; ?>
            </div>
          </div>

        </div>
      </div>
    </section>
  <?php endif; ?>


  <?php if(get_field('contact_code', $lending__id)): ?>
    <section id="cont-form">
      <div class="container">
        <div class="row">
<?php echo do_shortcode(get_field('contact_code'));?>

        </div>
      </div>
    </section>
  <?php endif; ?>

<?php get_footer(); ?>
