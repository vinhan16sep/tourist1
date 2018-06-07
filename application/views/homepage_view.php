<!-- Homepage Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>homepage.min.css">

<header id="fh5co-header" class="fh5co-cover js-fullheight" role="banner" style="background-image: url('http://www.lifeoftrends.com/wp-content/uploads/2017/08/InspiredStudents.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="display-t js-fullheight">
					<div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
						<h1><?php echo $this->lang->line('intro-about'); ?></h1>
						<a href="#fh5co-about" class="btn btn-primary"><?php echo $this->lang->line('getting-started'); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<div id="fh5co-about" class="fh5co-section">
	<div class="container">
		<div class="row">
			<div class="col-md-6 img-wrap animate-box" data-animate-effect="fadeInLeft">
				<img src="<?php echo base_url('assets/upload/about/'. $about['avatar']) ?>" alt="img about" width="100%">
			</div>
			<div class="col-md-5 col-md-push-1 animate-box">
				<div class="section-heading">
					<h2><?php echo $about['about_title'] ?></h2>
					<?php echo $about['about_content'] ?>
					<p><a href="<?php echo base_url('about') ?>" class="btn btn-primary"><?php echo $this->lang->line('more-info'); ?></a></p>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="fh5co-featured-menu" class="fh5co-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 fh5co-heading animate-box">
				<h2><?php echo $this->lang->line('courses'); ?></h2>
				<div class="row">
					<div class="col-md-6">
						<p><?php echo $this->lang->line('intro-courses'); ?></p>
					</div>
				</div>
			</div>

			<?php foreach ($courses as $key => $value): ?>
				<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-wrap">
					<div class="fh5co-item">
						<div class="mask">
							<img src="<?php echo base_url('assets/upload/courses/' . $value['image']); ?>" alt="<?php echo $value['slug'] ?> img">
						</div>
						<h3><?php echo $value['title'] ?></h3>
						<span class="fh5co-price"><?php echo number_format($value['price']) ?> vnd</span>
						<p><?php echo $value['description'] ?></p>
					</div>
				</div>
			<?php endforeach ?>

		</div>
	</div>
</div>

<!--
<div id="fh5co-slider" class="fh5co-section animate-box">
	<div class="container">
		<div class="row">
			<div class="col-md-6 animate-box">
				<div class="fh5co-heading">
					<h2><?php echo $this->lang->line('testinomial'); ?></h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ab debitis sit itaque totam, a maiores nihil, nulla magnam porro minima officiis!</p>
				</div>
			</div>
			<div class="col-md-6 col-md-push-1 animate-box">
				<aside id="fh5co-slider-wrwap">
					<div class="flexslider">
						<ul class="slides">
							<li>
								<div class="overlay-gradient"></div>
								<div class="mask">
									<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQyqCV9aCtCkXOipriMbj_Ui-rwARARB27iBkHxKqrxoeReE4MlQ" alt="img person">
								</div>
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-12 col-md-offset-0 col-md-pull-10 slider-text slider-text-bg">
											<div class="slider-text-inner">
												<div class="desc">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt eveniet quae, numquam magnam doloribus eligendi ratione rem, consequatur quos natus voluptates est totam magni! Nobis a temporibus, ipsum repudiandae dolorum.</p>
													<blockquote>
														<p class="author"><cite>&mdash; Jane Smith</cite></p>
													</blockquote>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li>
								<div class="overlay-gradient"></div>
								<div class="mask">
									<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQyqCV9aCtCkXOipriMbj_Ui-rwARARB27iBkHxKqrxoeReE4MlQ" alt="img person">
								</div>
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-12 col-md-offset-0 col-md-pull-10 slider-text slider-text-bg">
											<div class="slider-text-inner">
												<div class="desc">

													<p>Ink is a free html5 bootstrap and a multi-purpose template perfect for any type of websites. A combination of a minimal and modern design template. The features are big slider on homepage, smooth animation, product listing and many more</p>
													<blockquote>
														<p class="author"><cite>&mdash; Jane Smith</cite></p>
													</blockquote>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li>
								<div class="overlay-gradient"></div>
								<div class="mask">
									<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQyqCV9aCtCkXOipriMbj_Ui-rwARARB27iBkHxKqrxoeReE4MlQ" alt="img person">
								</div>
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-12 col-md-offset-0 col-md-pull-10 slider-text slider-text-bg">
											<div class="slider-text-inner">
												<div class="desc">

													<p>Ink is a free html5 bootstrap and a multi-purpose template perfect for any type of websites. A combination of a minimal and modern design template. The features are big slider on homepage, smooth animation, product listing and many more</p>
													<blockquote>
														<p class="author"><cite>&mdash; Jane Smith</cite></p>
													</blockquote>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</aside>
			</div>
		</div>
	</div>
</div>
-->


<div id="fh5co-started" class="fh5co-section animate-box" style="background-image: url('https://www.bestcolleges.com/wp-content/uploads/African_American_Graduates.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				<h2><?php echo $this->lang->line('slogan'); ?></h2>
				<!--
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae enim quae vitae cupiditate, sequi quam ea id dolor reiciendis consectetur repudiandae. Rem quam, repellendus veniam ipsa fuga maxime odio? Eaque!</p>
				-->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#register">
					<?php echo $this->lang->line('join-now'); ?>!
				</button>
			</div>
		</div>
	</div>
</div>

<div id="fh5co-blog" class="fh5co-section">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
				<h2><?php echo $this->lang->line('blogs'); ?></h2>
				<!--
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, consequatur. Aliquam quaerat pariatur repellendus veniam nemo, saepe, culpa eius aspernatur cumque suscipit quae nobis illo tempora. Eum veniam necessitatibus, blanditiis facilis quidem dolore! Dolorem, molestiae.</p>
				-->
			</div>
		</div>
		<div class="row">

            <?php foreach ($blogs as $key => $value): ?>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="fh5co-blog animate-box">
						<a href="#">
							<div class="mask">
								<img src="<?php echo base_url('assets/upload/blogs/'. $value['image']) ?>" alt="<?php echo $value['slug'] ?> img">
							</div>
						</a>
						<div class="blog-text">
							<span class="posted_on"><?php echo date_format(date_create($value['updated_at']), 'd-m-Y') ?></span>
							<h3><a href="#"><?php echo $value['title'] ?></a></h3>
							<p><?php echo $value['description'] ?></p>
							<ul class="stuff">
								<!-- <li><i class="icon-heart2"></i>1.2K</li>
								<li><i class="icon-eye2"></i>2K</li> -->
								<li><a href="#">Read More<i class="icon-arrow-right22"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			<?php endforeach ?>

		</div>
	</div>
</div>

