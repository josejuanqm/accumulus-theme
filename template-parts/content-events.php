<?php
/**
* Template part for displaying page content in page.php
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package accumulus-website
*/

?>



<section class="section w-full pb-s16 md:pb-s7 lg:pb-s13 bg-neutral-nwhite bg-news-banner-mobile md:bg-news-banner-tablet lg:bg-news-banner-desktop bg-no-repeat bg-cover bg-center">

  <div class="container mx-auto pt-s5 md:pt-s10 lg:pt-s9">

    <div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end pt-0">

      <div class="relative col-span-12 md:col-span-6 ld:col-span-7 flex flex-col justify-between gap-s12 md:gap-s4 lg:gap-s3 lg:pr-9">

        <div class="flex flex-col gap-s4">
          <h4 class="heading-4 uppercase">COMPANY</h4>
          <h1 class="heading-1"><?php the_title(); ?></h1>
        </div>


        <div class="body-2 hidden md:block lg:max-w-[460px]">
          <?php the_content(); ?>
        </div>

      </div>
      <!-- Large post -->

      <div class="col-span-12 md:col-span-6 lg:col-span-5 md:col-start-8 pt-s2 md:pt-0 flex flex-col gap-s4">

        <div class="grid grid-cols-12 gap-s2">

          <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
            <img class="col-span-12" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
            <?php endif; ?>
            <!-- Top stories item -->
          
        </div>
  
      </div>
      <!-- Top stories -->

      <div class="col-span-12 md:hidden body-2">
        <?php the_content(); ?>
      </div>
    
    </div>
    
  </div>
  
</section>
<!-- Main banner -->
  
  
<?php

  $categories = array();
  $args = array(
    'taxonomy' => 'news-categories',
    'style' => 'list',
    'hide_empty' => 1,
  );
  
  $result = get_categories($args);
  
  // var_dump($result);
  if (count($result) > 0 ){
    $categories = $result;
  }

?>
  
<section class="section w-full pt-s8 pb-s8 md:pb-s10 md:pt-s10 lg:pt-s8 lg:pb-s8 bg-white">
  
  <div class="container mx-auto">
  
    <div class="grid grid-cols-12 gap-s2">
  
      <div class="filters col-span-12 pt-0 pb-s8 md:pt-s2 md:pb-s10 lg:pt-s4 lg:pb-s8 flex justify-center w-full flex-wrap gap-s2 md:gap-s4 text-neutral-sgray">
    
        <input type="hidden" id="category" value="0" data-catName="Last Articles">
        
        <a href="javascript:void(0)" data-id="0" data-name="All" class="col-span-6 w-auto flex items-center justify-center h-[38px] px-s3 heading-4 text-center rounded-button uppercase bg-neutral-dgray active-filter">All</a>
        <a href="javascript:void(0)" data-id="1" class="col-span-6 w-auto flex items-center justify-center h-[38px] px-s2 lg:px-s3 heading-4 text-center rounded-button uppercase btn-text-link text-neutral-sgray">Past events</a>
        <a href="javascript:void(0)" data-id="2" class="col-span-6 w-auto flex items-center justify-center h-[38px] px-s2 lg:px-s3 heading-4 text-center rounded-button uppercase btn-text-link text-neutral-sgray">Upcoming events</a>
          
      </div>


        <div id="category-post-content">
        </div>
        <div class="col-span-12 flex justify-center pt-s5 md:pt-s8">
        <a id="btn-events-see-more" class="btn-secondary" href="#">See More</a>
      </div>
        <input type="hidden" value="1" id="current-page"/>
    </div>
      
  </div>
      
</section>
<!-- Grid posts news -->
      
      
      