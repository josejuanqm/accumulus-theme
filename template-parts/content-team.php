<?php
  $banner = get_field('banner_section');
  $bg_image = (get_template_directory_uri() . "/images/team-bg.jpg") ??  $banner['bg_image'];
  $title_tag = "OUR TEAM" ?? $banner['eyebrow_text'];
  $main_title = "Passionate Leaders Driven by a Common Purpose" ?? $banner['main_title'];
  $paragraph_text = "Accumulus leaders are a diverse group of domain experts motivated by our company’s mission to dramatically accelerate critical therapies to citizens of the world." ?? $banner['paragraph'];
?>

<section class="section w-full pt-0 lg:pt-52 2xl:pt-60 pb-s12 md:pb-s7 lg:pb-s12 bg-cover bg-no-repeat bg-center" style="background-image: url(<?php echo $bg_image ?>)">
	<div class="container mx-auto">
		<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end pt-s10 md:pt-0 lg:pt-0">
			<h4 class="col-span-12 text-h4Mobile md:text-h4Tablet lg:text-h4 uppercase pt-s1"><?php echo $title_tag; ?></h4>
			<h1 class="col-span-12 text-h1Mobile md:text-h1Tablet lg:text-h1"><?php echo $main_title; ?></h1>
			<div class="col-span-12 md:col-span-6 md:col-start-6 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4">
				<p class="text-b2 md:max-w-550 lg:max-w-full"><?php echo $paragraph_text; ?></p>
			</div>
		</div>
	</div>
</section>

<section class="section py-s10">
  <div class="container mx-auto px-s2">
    <div class="grid grid-cols-4 gap-x-s2 gap-y-s6">
      <div class="flex flex-col items-start gap-s2 col-span-2">
        <h2 class="heading-2">
        Leadership
        </h2>
        <p class="body-1">
          A first-of-its-kind data and information exchange platform for the drug development lifecycle. Built for the process needs of today and the evolving life sciences–regulatory landscape of the future.
        </p>
      </div>

      <div class="col-span-2"></div>
      
      <?php
        foreach(array(1,2,3,4) as $team_member) {
      ?>
        <figure class="flex flex-col items-start justify-stretch gap-s1 col-span-1">
          <img class="aspect-square w-full rounded-[40px] bg-primary-glaciar mb-s3" src="https://via.placeholder.com/200x200" alt="">
          <div class="flex flex-row items-center justify-between w-full">
            <h3 class="heading-6">Francisco Nogueira</h3>
            <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M14.3467 8.21094H12.7154H11.0853H9.45403H7.82275H6.19147H4.56139H2.93011H1.29883V9.84222H2.93011H4.56139H6.19147H7.82275H9.45403H11.0853H12.7154H14.3467H15.978V8.21094H14.3467Z" fill="#444444"/>
            </svg>
          </div>
          <span class="body-4">CEO</span>
          <div class="flex flex-col items-start gap-s2 col-span-2">
            <p class="body-4">
              Francisco joined from Genentech, a Roche company, where he was a Vice President focused on applying his 20 years of enterprise, regulatory
            </p>
            <a href="#">
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.738907 5.15332H3.92293V15.3947H0.738907V5.15332ZM2.331 0.0625C3.34866 0.0625 4.17568 0.889524 4.17568 1.90888C4.17568 2.92722 3.34866 3.75424 2.331 3.75424C1.31096 3.75424 0.486328 2.92722 0.486328 1.90888C0.486328 0.889524 1.31096 0.0625 2.331 0.0625Z" fill="#444444"/>
                <path d="M5.91797 5.15399H8.9711V6.55444H9.01461C9.43956 5.74892 10.4782 4.90039 12.0263 4.90039C15.2495 4.90039 15.8445 7.02086 15.8445 9.7784V15.3954H12.6628V10.415C12.6628 9.22699 12.6422 7.6994 11.0088 7.6994C9.35235 7.6994 9.0996 8.99421 9.0996 10.3296V15.3954H5.91797V5.15399Z" fill="#444444"/>
              </svg>
            </a>
          </div>
        </figure>
      <?php } ?>
    </div>
  </div>
</section>

<section class="section py-s10">
  <div class="container mx-auto px-s2">
    <div class="grid grid-cols-4 gap-x-s2 gap-y-s6">
      <h2 class="heading-2 col-span-4">
        The Board of Directors
      </h2>
      <p class="body-1 col-span-4 grid grid-cols-4">
        <span class="col-start-3 col-end-5">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut in morbi id nec aliquet risus nunc amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut in morbi id.
        </span>
      </p> 

      <?php
        foreach(array(1,2,3,4) as $team_member) {
      ?>
        <figure class="flex flex-col items-start justify-stretch gap-s1 col-span-1">
          <img class="aspect-square w-full rounded-[40px] bg-primary-glaciar mb-s3" src="https://via.placeholder.com/200x200" alt="">
          <div class="flex flex-row items-center justify-between w-full">
            <h3 class="heading-6">Francisco Nogueira</h3>
            <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M14.3467 8.21094H12.7154H11.0853H9.45403H7.82275H6.19147H4.56139H2.93011H1.29883V9.84222H2.93011H4.56139H6.19147H7.82275H9.45403H11.0853H12.7154H14.3467H15.978V8.21094H14.3467Z" fill="#444444"/>
            </svg>
          </div>
          <span class="body-4">CEO</span>
          <div class="flex flex-col items-start gap-s2 col-span-2">
            <p class="body-4">
              Francisco joined from Genentech, a Roche company, where he was a Vice President focused on applying his 20 years of enterprise, regulatory
            </p>
            <a href="#">
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.738907 5.15332H3.92293V15.3947H0.738907V5.15332ZM2.331 0.0625C3.34866 0.0625 4.17568 0.889524 4.17568 1.90888C4.17568 2.92722 3.34866 3.75424 2.331 3.75424C1.31096 3.75424 0.486328 2.92722 0.486328 1.90888C0.486328 0.889524 1.31096 0.0625 2.331 0.0625Z" fill="#444444"/>
                <path d="M5.91797 5.15399H8.9711V6.55444H9.01461C9.43956 5.74892 10.4782 4.90039 12.0263 4.90039C15.2495 4.90039 15.8445 7.02086 15.8445 9.7784V15.3954H12.6628V10.415C12.6628 9.22699 12.6422 7.6994 11.0088 7.6994C9.35235 7.6994 9.0996 8.99421 9.0996 10.3296V15.3954H5.91797V5.15399Z" fill="#444444"/>
              </svg>
            </a>
          </div>
        </figure>
      <?php } ?>
    </div>
  </div>
</section>
