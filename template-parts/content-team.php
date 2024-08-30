<?php
  $banner = get_field('banner_section');
  $title_tag = "OUR TEAM" ?? $banner['eyebrow_text'];
  $main_title = "Passionate Leaders Driven by a Common Purpose" ?? $banner['main_title'];
  $paragraph_text = "A first-of-its-kind data and information exchange platform for the drug development lifecycle. Built for the process needs of today and the evolving life sciences–regulatory landscape of the future." ?? $banner['paragraph'];
?>

<section class="translucent-navigation relative isolate overflow-hidden section w-full">
	<picture class="absolute top-0 left-0 w-full h-full -z-10">
		<source media="(min-width:1024px)" srcset="<?php echo get_template_directory_uri() . "/images/team/team-bg.jpg"; ?>">
		<source media="(min-width:768px)" srcset="<?php echo get_template_directory_uri() . "/images/team/team-bg-tablet.jpg"; ?>">
		<img src="<?php echo get_template_directory_uri() . "/images/team/team-bg-mobile.jpg"; ?>" alt="Flowers" class="w-full h-full">
	</picture>
	<div class="container mx-auto pt-s4 md:pt-s7 pb-s8 md:pb-s13 lg:pb-s12">
		<div class="grid grid-cols-12 gap-x-s2 gap-y-s3 md:gap-y-s6 lg:justify-end">
			<h4 class="col-span-12 heading-4 uppercase pt-s1"><?php echo $title_tag; ?></h4>
			<h1 class="col-span-12 heading-1 pb-s8 md:pb-0"><?php echo $main_title; ?></h1>
			<div class="col-span-12 md:col-span-6 lg:col-span-5 md:col-start-6 lg:col-start-6 pt-s10 md:pt-0">
				<p class="body-2"><?php echo $paragraph_text; ?></p>
			</div>
		</div>
	</div>
</section>


<!-- Members -->

<?php 
  $teamLeadership = get_field('team-list', 'option');
?>

<section class="section py-s8 md:py-s10 lg:py-s13">
  <div class="container mx-auto">
    <div class="grid grid-cols-12 gap-x-s2 gap-y-s4 lg:gap-y-s10">

      <div class="flex flex-col items-start gap-s4 lg:gap-s3 col-span-12 md:col-span-9 lg:col-span-6">
        <h2 class="heading-1 font-normal">Leadership</h2>
        <p class="body-2 pb-s2 lg:pb-0">
          A first-of-its-kind data and information exchange platform for the drug development lifecycle. Built for the process needs of today and the evolving life sciences–regulatory landscape of the future.
        </p>
      </div>
      <div class="hidden md:block md:col-span-3 lg:col-span-6"></div>
      <?php
        foreach($teamLeadership as $key => $team_member) {
      ?>
        <figure data-post="<?php echo $key; ?>" class="select-none member [&>div>.open]:!flex flex flex-col items-start justify-stretch gap-s2 col-span-6 md:col-span-4 lg:col-span-3">
          <img class="aspect-square w-full rounded-[40px] bg-[#EBEBEB] mb-s1" src="<?php echo $team_member['image']; ?>" alt="<?php echo $team_member['name']; ?>">
          <div class="flex flex-row items-center justify-between w-full">
            <h3 class="heading-6"><?php echo $team_member['name']; ?></h3>
            <svg style="display:none;" class="open" width="17" height="18" viewBox="0 0 17 18" fill="none">
              <path d="M7.83008 3.32325V4.95453V6.58461V8.21589V9.84717V11.4785V13.1085V14.7398V16.3711H9.46136V14.7398V13.1085V11.4785V9.84717V8.21589V6.58461V4.95453V3.32325V1.69197H7.83008V3.32325Z" fill="#444444"/>
              <path d="M14.3467 8.21484H12.7154H11.0853H9.45403H7.82275H6.19147H4.56139H2.93011H1.29883V9.84612H2.93011H4.56139H6.19147H7.82275H9.45403H11.0853H12.7154H14.3467H15.978V8.21484H14.3467Z" fill="#444444"/>
            </svg>
            <svg style="display:none;" class="close" width="17" height="18" viewBox="0 0 17 18" fill="none">
              <path d="M14.3467 8.21094H12.7154H11.0853H9.45403H7.82275H6.19147H4.56139H2.93011H1.29883V9.84222H2.93011H4.56139H6.19147H7.82275H9.45403H11.0853H12.7154H14.3467H15.978V8.21094H14.3467Z" fill="#444444"/>
            </svg>     	
          </div>
          <span class="body-4 text-neutral-sgray"><?php echo $team_member['position']; ?></span>
          <div style="display:none;" class="summary flex-col items-start gap-s2 col-span-2">
            <p class="body-4 text-neutral-sgray">
              <?php echo $team_member['description']; ?>
            </p>
            <a href="<?php echo $team_member['linkedin']; ?>" target="_blank">
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
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


<!-- Directors -->

<?php 
  $teamDirectors = get_field('team-directors', 'option');
?>

<section class="section py-s8 md:py-s10 bg-neutral-offwhite">
  <div class="container mx-auto">
    <div class="grid grid-cols-12 gap-x-s2 gap-y-s4 lg:gap-y-s10">
      <h2 class="heading-1 font-normal col-span-12">
        The Board of<br />Directors
      </h2>
      <p class="body-2 col-span-12 lg:col-span-6 lg:col-start-6 pb-s2 lg:pb-0">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut in morbi id nec aliquet risus nunc amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut in morbi id.
      </p> 
      
      <?php
        foreach($teamDirectors as $key => $team_member) {
      ?>
        <figure data-post="<?php echo $key; ?>" class="select-none member [&>div>.open]:!flex flex flex-col items-start justify-stretch gap-s2 col-span-6 md:col-span-4 lg:col-span-3">
          <img class="aspect-square w-full rounded-[40px] bg-[#EBEBEB] mb-s1" src="<?php echo $team_member['image']; ?>" alt="<?php echo $team_member['name']; ?>">
          <div class="flex flex-row items-center justify-between w-full">
            <h3 class="heading-6"><?php echo $team_member['name']; ?></h3>
            <svg style="display:none;" class="open" width="17" height="18" viewBox="0 0 17 18" fill="none">
              <path d="M7.83008 3.32325V4.95453V6.58461V8.21589V9.84717V11.4785V13.1085V14.7398V16.3711H9.46136V14.7398V13.1085V11.4785V9.84717V8.21589V6.58461V4.95453V3.32325V1.69197H7.83008V3.32325Z" fill="#444444"/>
              <path d="M14.3467 8.21484H12.7154H11.0853H9.45403H7.82275H6.19147H4.56139H2.93011H1.29883V9.84612H2.93011H4.56139H6.19147H7.82275H9.45403H11.0853H12.7154H14.3467H15.978V8.21484H14.3467Z" fill="#444444"/>
            </svg>
            <svg style="display:none;" class="close" width="17" height="18" viewBox="0 0 17 18" fill="none">
              <path d="M14.3467 8.21094H12.7154H11.0853H9.45403H7.82275H6.19147H4.56139H2.93011H1.29883V9.84222H2.93011H4.56139H6.19147H7.82275H9.45403H11.0853H12.7154H14.3467H15.978V8.21094H14.3467Z" fill="#444444"/>
            </svg>     	
          </div>
          <span class="body-4 text-neutral-sgray"><?php echo $team_member['position']; ?></span>
          <div style="display:none;" class="summary flex-col items-start gap-s2 col-span-2">
            <p class="body-4 text-neutral-sgray">
              <?php echo $team_member['description']; ?>
            </p>
            <a href="<?php echo $team_member['linkedin']; ?>" target="_blank">
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
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

<?php
  get_template_part(
    'template-parts/content',
    'careers-footer',
        array( 
		'cta' => 'Explore Roles',
	)
  );
?>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		let teamMembers = document.querySelectorAll("figure.member")	
		teamMembers.forEach(function(teamMember) {
			let post = teamMember.dataset.post
			teamMember.addEventListener('click', function(){
				let toggleClass = teamMember.classList.contains("[&>div>.close]:!flex") ? 'open' : 'close';
				teamMember.classList.remove('[&>div>.close]:!flex')
				teamMember.classList.remove('[&>div>.open]:!flex')
				teamMember.classList.toggle('[&>.summary]:!flex')
				teamMember.classList.toggle('[&>div>.'+toggleClass+']:!flex')
			})	
		})
	})
</script>	


<!-- Form Module -->
<?php
  get_template_part(
    'template-parts/content',
    'form-module'
  );
?>
<!-- End form module -->