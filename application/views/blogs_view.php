<!-- Blogs Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>blogs.min.css">

<section class="cover">
	<img src="https://images.unsplash.com/photo-1516974882164-2136160d59c6?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=c4b9e1d39ed76f884d4d640f17d00a0c&auto=format&fit=crop&w=1950&q=80" alt="cover">
</section>

<section class="content section container-fluid">
	<div class="container">
		<div class="row">
			<div class="left col-md-9 col-sm-8 col-xs-12">
				<div class="section-header">
					<h1><?php echo $this->lang->line('blogs') ?></h1>
					<div class="line">
						<div class="line-primary"></div>
					</div>
				</div>

				<div class="row">
					<div class="item col-md-4 col-sm-6 col-xs-12">
						<div class="inner">
							<div class="head">
								<div class="mask">
									<img src="https://images.unsplash.com/photo-1517265210433-b9e72acace29?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a5947dca27ca4fc31eb0bf7a08902f45&auto=format&fit=crop&w=1950&q=80" alt="image blog">
								</div>
							</div>
							<div class="body">
								<h4 class="post-subtitle">Blog SubTitles</h4>
								<h2 class="post-title">Blog Titles Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra non dui ut suscipit</h2>
								<p class="post-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra non dui ut suscipit. Proin quis odio et mi dignissim accumsan. Integer fringilla fringilla rutrum. Pellentesque fringilla sem a nisi consequat porttitor. Sed in pharetra ipsum. Sed suscipit tincidunt sapien ac mollis. Fusce malesuada ornare convallis. Donec aliquam nisl et lacus varius bibendum. Duis ut purus ut erat consectetur tincidunt id eget nunc.</p>
							</div>
							<div class="foot">
								<a href="<?php echo base_url('') ?>" class="btn btn-primary" role="button">
                                    <?php echo $this->lang->line('see-detail') ?>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="right col-md-3 col-sm-4 col-xs-12">
				<div class="section-header">
					<h1><?php echo $this->lang->line('blogs') ?></h1>
					<div class="line">
						<div class="line-primary"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>