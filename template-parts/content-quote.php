<!-- BEGIN QUOTE -->
<section class="section relative py-s6 <?php echo $args['bg_color']; ?>">
  <div class="container mx-auto">
    <div class="grid grid-cols-12">
      <?php if (array_key_exists('main_quote', $args)) { ?>
        <h2 class="col-start-1 col-span-12 md:col-span-9 <?php echo array_key_exists('titled', $args) ? 'heading-2 pb-s7' : 'heading-3'; ?> <?php echo array_key_exists('inverted', $args) ? 'row-start-2 heading-2' : ''; ?>">
          <?php echo $args['main_quote'] ?>
        </h2>
      <?php } ?>
      <h3
        class="col-span-9 md:col-span-8 pb-s8 lg:pb-s4 <?php !array_key_exists('main_quote', $args) ? 'col-start-3 md:col-start-4' : 'col-start-1 md:col-start-1 pt-s8 lg:pt-s6' ?> <?php echo array_key_exists('inverted', $args) ? 'row-start-3 body-1' : 'body-2' ?>">
        <?php echo $args['sub_quote'] ?>
      </h3>
      <div class="flex items-start justify-normal <?php echo array_key_exists('stacked-author', $args) ? 'flex-col col-start-2 md:col-start-7 lg:col-start-7 col-end-11 md:col-end-9 lg:col-end-10' : 'flex-row col-start-1 md:col-start-6 lg:col-start-6 col-end-12 md:col-end-12 lg:col-end-12' ?> <?php echo array_key_exists('inverted', $args) ? 'row-start-1' : 'row-start-3' ?> gap-s2 <?php array_key_exists('references', $args) && 'pb-s6'; ?>">

        <figure data-post="1" class="select-none member [&>div>.close]:!flex flex flex-col items-start justify-stretch gap-s2 md:w-[224px]">
          <img class="aspect-square w-full rounded-[40px] bg-[#EBEBEB] mb-s1" src="<?php echo $args['image']; ?>" alt="<?php echo $args['author']; ?>">
          <div class="flex flex-row items-center justify-between w-full">
            <h3 class="heading-6"><?php echo $args['author']; ?></h3>
            <svg style="display:none;" class="open" width="17" height="18" viewBox="0 0 17 18" fill="none">
              <path d="M7.83008 3.32325V4.95453V6.58461V8.21589V9.84717V11.4785V13.1085V14.7398V16.3711H9.46136V14.7398V13.1085V11.4785V9.84717V8.21589V6.58461V4.95453V3.32325V1.69197H7.83008V3.32325Z" fill="#444444"/>
              <path d="M14.3467 8.21484H12.7154H11.0853H9.45403H7.82275H6.19147H4.56139H2.93011H1.29883V9.84612H2.93011H4.56139H6.19147H7.82275H9.45403H11.0853H12.7154H14.3467H15.978V8.21484H14.3467Z" fill="#444444"/>
            </svg>
            <svg style="display:none;" class="close" width="17" height="18" viewBox="0 0 17 18" fill="none">
              <path d="M14.3467 8.21094H12.7154H11.0853H9.45403H7.82275H6.19147H4.56139H2.93011H1.29883V9.84222H2.93011H4.56139H6.19147H7.82275H9.45403H11.0853H12.7154H14.3467H15.978V8.21094H14.3467Z" fill="#444444"/>
            </svg>     	
          </div>
          <span class="body-4 text-neutral-sgray"><?php echo $args['position']; ?></span>
          <div style="display:none;" class="summary flex-col items-start gap-s2 col-span-2">
            <p class="body-4 text-neutral-sgray">
              <?php echo $args['description']; ?>
            </p>
            <a href="<?php echo $args['linkedin']; ?>" target="_blank">
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                <path d="M0.738907 5.15332H3.92293V15.3947H0.738907V5.15332ZM2.331 0.0625C3.34866 0.0625 4.17568 0.889524 4.17568 1.90888C4.17568 2.92722 3.34866 3.75424 2.331 3.75424C1.31096 3.75424 0.486328 2.92722 0.486328 1.90888C0.486328 0.889524 1.31096 0.0625 2.331 0.0625Z" fill="#444444"/>
                <path d="M5.91797 5.15399H8.9711V6.55444H9.01461C9.43956 5.74892 10.4782 4.90039 12.0263 4.90039C15.2495 4.90039 15.8445 7.02086 15.8445 9.7784V15.3954H12.6628V10.415C12.6628 9.22699 12.6422 7.6994 11.0088 7.6994C9.35235 7.6994 9.0996 8.99421 9.0996 10.3296V15.3954H5.91797V5.15399Z" fill="#444444"/>
              </svg>
            </a>
          </div>
        </figure>

        <!-- <div class="relative w-40 md:w-[224px] aspect-square rounded-3xl bg-primary-glaciar overflow-hidden flex-shrink-0">
          <img class="w-full h-full" src="<?php echo $args['image']; ?>" alt="<?php echo $args['author']; ?>" />
        </div>
        <div class="flex flex-col items-start gap-s2">
          <p class="<?php echo array_key_exists('stacked-author', $args) ? 'heading-6' : 'heading-3' ?>">
            <?php echo $args['author']; ?>
          </p>
          <p class="<?php echo array_key_exists('stacked-author', $args) ? 'body-4' : 'body-3' ?>">
            <?php echo $args['position']; ?>
          </p>
        </div> -->
      </div>
      <?php if (array_key_exists('references', $args)) { ?>
      <ul class="flex flex-col items-start col-start-1 md:col-start-2 col-span-12 md:col-span-10 <?php echo array_key_exists('inverted', $args) ? 'row-start-4' : '' ?>">
        <?php
          for ($i=0; $i < count($args['references']); $i++) { 
            ?>
              <p class="body-4">
                <span>
                  <?php echo $i + 1; ?>.
                </span>
                <span>
                <?php echo $args['references'][$i + 1]; ?>
                </span>
              </p>
            <?php
          }
        ?>
      </ul>
      <?php } ?>
    </div>
  </div>
</section>
<!-- END QUOTE -->

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