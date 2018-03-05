

</div><!-- /wrapper -->

<footer role="contentinfo">
  <div class="inner">

    <p class="copyright">
      Nativ &copy; <?php echo date("Y"); ?> <?php the_field('footer_cop'); ?>.
    </p><!-- /copyright -->

  </div><!-- /.inner -->
</footer><!-- /footer -->



<div class="modal fade" id="my-cart-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">

    <?php echo do_shortcode(get_field('cart_form'));?>

  </div>
</div>


<?php $lending__id = get_the_ID(); ?>
<?php $product_objects = get_field('products');

  if( $product_objects ): ?>

    <?php foreach( $product_objects as $post): // variable must be called $post (IMPORTANT) ?>
      <?php setup_postdata($post); ?>


      <div class="modal fade modal-product" id="modal-product-<?php the_ID(); ?>" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content product">
            <div class="modal-header">
              <button class="close" data-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body row">
              <div class="col-xs-5">
                <?php if ( has_post_thumbnail()) { ?>
                <?php if(get_field('hit_sale', $slide_product)) { ?>
                  <div class="best-seler"><?php the_field('hit_label', $lending__id); ?></div>
                <?php } ?>
                    <img src="<?php echo the_post_thumbnail_url('medium'); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
                  <?php } else { ?>
                    <img src="<?php echo catchFirstImage(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
                  <?php } ?>
              </div>

              <div class="col-xs-7">
                <h2><?php the_title(); ?></h2>
                <div class="mod-desc"><?php the_field('short_desk'); ?></div>
                <div class="row">
                  <div class="mod-prices col-md-4">
                    <?php if(get_field('old_price')){ ?>
                      <div class="mod-oldprice">
                        <?php echo number_format(get_field('old_price', $slide_product),0,'',' '); ?>
                        <span class="currency"><?php the_field('currency', $slide_product); ?></span>
                      </div>
                    <?php }?>

                    <div class="mod-price">
                      <?php echo number_format(get_field('price', $slide_product),0,'',' '); ?>
                      <span class="currency"><?php the_field('currency', $slide_product); ?></span>
                    </div>
                  </div>
                  <div class="col-md-8 mod-btn">
                    <button class="green-bg-btn my-cart-btn" data-id="<?php the_ID(); ?>" data-name="<?php the_title(); ?>" data-summary="summary 2" data-price="<?php the_field('price');?>" data-quantity="1" data-image="<?php echo the_post_thumbnail_url('small'); ?>"><?php the_field('buy_btn', $lending__id);?></button>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-12 content">
                <?php the_content(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>

    <?php endforeach; ?>

    <?php wp_reset_postdata(); ?>
  <?php endif; ?>



<?php if (get_field('rules')) { ?>
      <div class="modal fade modal-product" id="#mod__acceptance" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content product">
            <div class="modal-header">
              <button class="close" data-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body row">
              <div class="col-md-12">
                  <?php the_field('rules'); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php } ?>














<script src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.min.js" type="text/javascript"></script>
    <?php wp_footer(); ?>

</body>
</html>
