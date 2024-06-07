<?php 

// Get category by post
// $category = '';
// $categorySlug = '';
// $post_type = get_post_type(get_the_ID());   
// $taxonomies = get_object_taxonomies($post_type);   
// $taxonomy_names = wp_get_object_terms(get_the_ID(), $taxonomies,  array("fields" => "names")); 
// if(!empty($taxonomy_names)) :
  //   foreach($taxonomy_names as $tax_name) :
    //     $category = $tax_name; 
    //     $categorySlug = str_replace(' ', '-', strtolower($tax_name)); 
    //   endforeach;
    // endif;
    
    // $today = date( 'Ymd' );
    
    // $date = get_field( 'date_event' );
    // $dateEvent = DateTime::createFromFormat( 'Ymd', $date );
    
    echo get_the_ID();
    
    ?>
    
    <div class="relative col-span-12 max-md:flex max-md:flex-col md:grid md:grid-cols-12 md:gap-s2 items-center bg-neutral-offwhite text-neutral-dgray rounded-miniCard overflow-hidden <?php echo $categorySlug;  //print_r(($today <= $date) ? ' opacity-100' : ' opacity-50');?> ">
    
    <!-- <a href="<?php //the_permalink( get_the_ID() ); ?>" class="absolute top-0 left-0 w-full h-full z-10"></a> -->
    
    <div class="max-md:w-full md:col-span-2 flex md:flex-col max-md:order-2 items-center justify-start md:justify-center gap-s2 text-center pt-s4 md:py-0 px-s4 md:px-0 md:pl-s2">
    <h5 class="text-h2Mobile md:text-h2Tablet lg:text-h2"><?php //echo $dateEvent->format( 'j' ) ?></h5>
    <h6 class="text-h10"><?php //echo $dateEvent->format( 'F' ); ?></h6>
    </div>
    
    <div class="relative max-md:w-full md:col-span-6 flex flex-col max-md:order-3 gap-s1 lg:gap-s2 p-s4 md:py-s2 md:px-s2">
    <span class="flex items-center gap-s1 pt-1 text-h4Mobile md:text-h4Tablet lg:text-h4 uppercase text-neutral-dgray <?php //echo $categorySlug; ?>">
    <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M12 2.83909V10.8388H10.6669V1.1732C10.6669 0.619888 10.2189 0.171875 9.66556 0.171875H1.00132C0.448009 0.171875 0 0.619888 0 1.1732V10.8388C0 11.5749 0.597018 12.1719 1.33311 12.1719H12C12.7361 12.1719 13.3331 11.5749 13.3331 10.8388V2.83909H12ZM1.33311 10.8388V1.50499H9.33278V10.8378H1.33311V10.8388Z" class="fill-current"/>
    <path d="M7.99946 8.17188H2.66602V9.50499H7.99946V8.17188Z" class="fill-current"/>
    <path d="M7.99946 5.50391H2.66602V6.83702H7.99946V5.50391Z" class="fill-current"/>
    <path d="M7.99946 2.83594H2.66602V4.16905H7.99946V2.83594Z" class="fill-current"/>
    </svg>
    
    <?php //echo $category; ?>
    </span>
    <h3 class="text-h10"><?php the_title(); ?></h3>
    <p class="text-b2Mobile md:text-b2Tablet lg:text-b2 lg:max-w-[460px]"><?php echo get_the_excerpt(); ?></p>
    </div>
    
    <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
    <div class="max-md:w-full max-md:order-1 md:col-span-4">
    <img class="w-full max-h-[144px] md:max-h-[200px] lg:max-h-[192px] object-cover" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
    </div>
    <?php endif; ?>
    <!-- Thumbnail -->
    </div>
      <!-- Top stories item -->