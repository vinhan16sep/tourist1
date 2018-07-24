<!-- About Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>about.css">

<section class="cover">
	<img src="https://images.unsplash.com/photo-1516974882164-2136160d59c6?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=c4b9e1d39ed76f884d4d640f17d00a0c&auto=format&fit=crop&w=1950&q=80" alt="cover">
</section>

<section id="about" class="content section container-fluid">
	<div class="container">
		<div class="row">
			<div class="left col-sm-8 col-xs-12">
                <?php if($about){ ?>
                    <?php foreach($about as $key => $val){ ?>
                        <div class="about-post" id="<?php echo $val['slug']; ?>">
                            <div class="section-header">
                                <h1><?php echo $val['title']; ?></h1>
                                <div class="line">
                                    <div class="line-primary"></div>
                                </div>
                            </div>

                            <article>
                                <?php echo $val['content']; ?>
                            </article>
                        </div>
                    <?php } ?>
                <?php } ?>
			</div>
			<div class="right col-sm-4 col-xs-12">
				<div class="section-header">
					<h1><?php echo $this->lang->line('about') ?></h1>
					<div class="line">
						<div class="line-primary"></div>
					</div>
				</div>

				<!-- Category -->
				<ul class="list-group">
                    <?php if($about){ ?>
                        <?php foreach($about as $key => $val){ ?>
                            <li class="list-group-item">
                                <a href="#<?php echo $val['slug']; ?>"><?php echo $val['title']; ?></a>
                            </li>
                        <?php } ?>
                    <?php } ?>
				</ul>
			</div>
		</div>
	</div>
</section>

<script>
    $(window).scroll(function () {
        //if you hard code, then use console
        //.log to determine when you want the
        //nav bar to stick.
        'use strict';
        if ($(window).scrollTop() > 600) {
            $('#about .container .right').addClass('sticky');
            $('#about .container .left .about-post').css('padding-top' , '90px');
        }
        if ($(window).scrollTop() < 600) {
            $('#about .container .right').removeClass('sticky');
            $('#about .container .left .about-post').css('padding-top' , '30px');

        }
    });

    // Select all links with hashes
    $('a[href*="#"]')
    // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function(event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function() {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        };
                    });
                }
            }
        });
</script>