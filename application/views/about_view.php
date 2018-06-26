<!-- About Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>about.min.css">

<section class="cover">
	<img src="https://images.unsplash.com/photo-1516974882164-2136160d59c6?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=c4b9e1d39ed76f884d4d640f17d00a0c&auto=format&fit=crop&w=1950&q=80" alt="cover">
</section>

<section id="about" class="content section container-fluid">
	<div class="container">
		<div class="row">
			<div class="left col-sm-8 col-xs-12">
				<div class="section-header">
					<h1><?php echo $this->lang->line('about') ?></h1>
					<div class="line">
						<div class="line-primary"></div>
					</div>
				</div>

				<article>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tristique ultricies purus. Cras gravida dui tortor, et interdum erat imperdiet quis. Donec semper volutpat aliquam. Donec purus dui, tristique id enim et, gravida tincidunt orci. Nullam tristique maximus vehicula. In id dolor hendrerit, dignissim mi viverra, finibus erat. Vivamus at tellus tellus. Sed at porttitor sem. Duis nec faucibus nibh, non condimentum augue. Nam egestas leo enim, ut elementum arcu rutrum et. Nulla molestie justo a ultricies egestas. In ac metus egestas, congue erat ac, lacinia lacus. Aenean porta, arcu porta laoreet mollis, felis sem fringilla ante, vitae viverra erat augue et ante. Ut vel tortor at lectus consectetur sollicitudin quis id lectus.</p>
					<img src="https://images.unsplash.com/photo-1529789864526-f7067145c1b7?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=122d73dc8e0cd54c2327699a237aa12a&auto=format&fit=crop&w=1950&q=80" alt="about image">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tristique ultricies purus. Cras gravida dui tortor, et interdum erat imperdiet quis. Donec semper volutpat aliquam. Donec purus dui, tristique id enim et, gravida tincidunt orci. Nullam tristique maximus vehicula. In id dolor hendrerit, dignissim mi viverra, finibus erat. Vivamus at tellus tellus. Sed at porttitor sem. Duis nec faucibus nibh, non condimentum augue. Nam egestas leo enim, ut elementum arcu rutrum et. Nulla molestie justo a ultricies egestas. In ac metus egestas, congue erat ac, lacinia lacus. Aenean porta, arcu porta laoreet mollis, felis sem fringilla ante, vitae viverra erat augue et ante. Ut vel tortor at lectus consectetur sollicitudin quis id lectus.
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tristique ultricies purus. Cras gravida dui tortor, et interdum erat imperdiet quis. Donec semper volutpat aliquam. Donec purus dui, tristique id enim et, gravida tincidunt orci. Nullam tristique maximus vehicula. In id dolor hendrerit, dignissim mi viverra, finibus erat. Vivamus at tellus tellus. Sed at porttitor sem. Duis nec faucibus nibh, non condimentum augue. Nam egestas leo enim, ut elementum arcu rutrum et. Nulla molestie justo a ultricies egestas. In ac metus egestas, congue erat ac, lacinia lacus. Aenean porta, arcu porta laoreet mollis, felis sem fringilla ante, vitae viverra erat augue et ante. Ut vel tortor at lectus consectetur sollicitudin quis id lectus.
				</article>
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
					<?php for ($i = 0; $i < 5; $i++) { ?>
					<li class="list-group-item">
						<a href="">Cras justo odio</a>
					</li>
				<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</section>