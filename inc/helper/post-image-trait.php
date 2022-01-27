<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

trait PostImageTrait {

  public static function get_img_alt($post){ 
    $thumb_id = get_post_thumbnail_id(get_the_ID($post));
    $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
    if( $alt ):
        echo esc_attr($alt);
    endif;
}
  public static function get_single_generate_img($post, $class = "", $thumb_size){ ?>
    <?php   
        $the_post_thumbnail = self::generate_thumbnail_image( $post, $thumb_size); ?>          
            <img class="<?php echo esc_attr($class);?>" src="<?php echo esc_url($the_post_thumbnail);  ?>" alt="<?php self::get_img_alt($post);?>">  
       <?php 
     }   
  public static function get_generate_img($post, $class = "", $settings = "", $thumb_size){ ?>
    <?php   
        $the_post_thumbnail = self::generate_thumbnail_image( $post, $thumb_size); ?>          
            <img class="<?php echo esc_attr($class);?>" src="<?php echo esc_url($the_post_thumbnail);  ?>" alt="<?php self::get_img_alt($post);?>">  
       <?php 
     }    
     
public static function get_generate_thumbnail_image($post, $class = "", $settings = "", $thumb_size){ ?>
      <?php if ( $settings['show_post_thumb'] == 'yes' ) {    
        $the_post_thumbnail = self::generate_thumbnail_image( $post, $thumb_size); ?>
          <a class="align-self-center" href="<?php the_permalink(); ?>">
            <img class="<?php echo esc_attr($class);?>" src="<?php echo esc_url($the_post_thumbnail);?>" alt="<?php self::get_img_alt($post);?>">
            <div class="grad-overlay"></div>
          </a>  
       <?php } 
     }   

    public static function get_generate_blog_thumbnail_image($post, $class = "", $thumb_size){ 
      $papr_options   = self::axil_get_options();    
      ?>
      <?php if ( $papr_options['blog_show_post_thumb'] ) {    
         $the_post_thumbnail = self::generate_thumbnail_image( $post, $thumb_size); ?>
          <?php if ( has_post_thumbnail() ): ?>
            <a class="align-self-center" href="<?php the_permalink(); ?>">
              <img class="<?php echo esc_attr($class);?>" src="<?php echo esc_url($the_post_thumbnail);  ?>" alt="<?php self::get_img_alt($post);?>">    
                <div class="grad-overlay"></div>        
            </a>
          <?php else: ?>
        <?php if( $papr_options['show_preview_image'] == '1' ) { ?>
            <a class="align-self-center" href="<?php the_permalink(); ?>">
              <img class="<?php echo esc_attr($class);?>" src="<?php echo esc_url($the_post_thumbnail);  ?>" alt="<?php self::get_img_alt($post);?>">    
                <div class="grad-overlay"></div>        
            </a>
          <?php } ?>
          <?php endif ?>
       <?php } 
     } 

 public static function get_generate_author_thumbnail_image($post, $class = "", $thumb_size){ 
      $papr_options   = self::axil_get_options();    
      ?>
      <?php if ( $papr_options['author_show_post_thumb'] ) {    
         $the_post_thumbnail = self::generate_thumbnail_image( $post, $thumb_size); ?>
          <?php if ( has_post_thumbnail() ): ?>
            <a class="align-self-center" href="<?php the_permalink(); ?>">
              <img class="<?php echo esc_attr($class);?>" src="<?php echo esc_url($the_post_thumbnail);  ?>" alt="<?php self::get_img_alt($post);?>">    
                <div class="grad-overlay"></div>        
            </a>
          <?php else: ?>
        <?php if( $papr_options['show_preview_image'] == '1' ) { ?>
            <a class="align-self-center" href="<?php the_permalink(); ?>">
              <img class="<?php echo esc_attr($class);?>" src="<?php echo esc_url($the_post_thumbnail);  ?>" alt="<?php self::get_img_alt($post);?>">    
                <div class="grad-overlay"></div>        
            </a>
          <?php } ?>
          <?php endif ?>
       <?php } 
     } 

   public static function axil_get_width_height_thumb_size($thumb_size){  
      $width_height = [   
        "axil-size-sm"            => [ 'width' => 390,  'height'   =>  290, ], 
        "axil-size-md"            => [ 'width' => 400,  'height'   =>  400, ], 
        "axil-size-md2"           => [ 'width' => 780,  'height'   =>  780, ], 
        "axil-size-lg"            => [ 'width' => 1000,  'height'  =>  1000, ],
        "axil-size-large"         => [ 'width' => 1000,  'height'   =>  753, ],
        "axil-size-video"         => [ 'width' => 1200,  'height'   =>  1380, ],
        "axil-size-video2"        => [ 'width' => 1620,  'height'   =>  980, ],
        "axil-size-lg-vertical"   => [ 'width' => 600,  'height'   =>  940, ],
        "axil-size-full-height"   => [ 'width' => 600,  'height'   =>  9999, ],     
    ];
    $width = 320;
    $height = 320;
    if ( array_key_exists($thumb_size, $width_height ) ) {
      $width = $width_height[$thumb_size]['width'];
      $height = $width_height[$thumb_size]['height'];
    }
    return [
      'width' => $width,
      'height' => $height,
    ];
  }

  public static function get_no_image_file($thumb_size)
  {
    $no_image_width_height = self::axil_get_width_height_thumb_size($thumb_size);
    $no_image_width = $no_image_width_height['width'];
    $no_image_height = $no_image_width_height['height'];
    return Helper::get_img( "noimage/noimage_{$no_image_width}x{$no_image_height}.png" );
  }

  public static function generate_thumbnail_image($post, $thumb_size, $return_null = false)
  {
    $papr_options   = self::axil_get_options();    
    if ($img = get_the_post_thumbnail_url( $post, $thumb_size ) ) {
      return $img;
    }
    if ($return_null) {
      return null;
    }
    
      if( !empty( $papr_options['no_preview_image']['id'] ) ) {
        $img = wp_get_attachment_image_src( $papr_options['no_preview_image']['id'], $thumb_size, true );
        return $img[0];
      }

    if( $papr_options['show_preview_image'] == '1' ) {
      return self::get_no_image_file($thumb_size);
    }

  } 
  public static function generate_single_thumbnail_image($post, $thumb_size, $return_null = false)
  {
    $papr_options   = self::axil_get_options();    
    if ($img = get_the_post_thumbnail_url( $post, $thumb_size ) ) {
      return $img;
    }
    if ($return_null) {
      return null;
    }
    
      if( !empty( $papr_options['no_preview_image']['id'] ) ) {
        $img = wp_get_attachment_image_src( $papr_options['no_preview_image']['id'], $thumb_size, true );
        return $img[0];
      }

    if( $papr_options['display_demo_img'] == '1' ) {
      return self::get_no_image_file($thumb_size);
    }

  }
  public static function generate_thumbnail_image_by_attachment_id($id, $thumb_size)
  {

    $img = wp_get_attachment_image_src( $id, $thumb_size);
    if ($img) {
      return $img[0];
    }
    return self::get_no_image_file($thumb_size);
  }

  public static function generate_thumbnail_image_by_attachment_id_elementor($image, $thumb_size)
  {
    $id = $image['id'];
    if (!$id) {
      return $image['url'];
    }
    return self::generate_thumbnail_image_by_attachment_id($id, $thumb_size);
  }

}


