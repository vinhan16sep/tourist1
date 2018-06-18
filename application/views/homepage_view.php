<!-- Homepage Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>homepage.min.css">

<section id="slider" class="container-fluid">
	<div id="homepage-slider" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#homepage-slider" data-slide-to="0" class="active"></li>
			<li data-target="#homepage-slider" data-slide-to="1"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<div class="mask">
					<img src="https://images.unsplash.com/photo-1484804959297-65e7c19d7c9f?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=ff4666b0a7478ed7b17344eb76fbfe3d&auto=format&fit=crop&w=1914&q=80" alt="slide 01">
				</div>
				<div class="carousel-caption">
					...
				</div>
			</div>
			<div class="item">
				<div class="mask">
					<img src="https://images.unsplash.com/photo-1496531693211-31c5234a5ea9?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=26767cc689ecf946bbc1180836232fc8&auto=format&fit=crop&w=1950&q=80" alt="slide 2">
				</div>
				<div class="carousel-caption">
					...
				</div>
			</div>
			...
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#homepage-slider" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#homepage-slider" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</section>

<section id="tour-intro" class="container-fluid section">
	<div class="container">
		<div class="row">
			<div class="left col-sm-6 col-xs-12">
				<div class="head">
					<h3>About - Introduce Special Tour</h3>
				</div>
				<div class="body">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra non dui ut suscipit. Proin quis odio et mi dignissim accumsan. Integer fringilla fringilla rutrum. Pellentesque fringilla sem a nisi consequat porttitor. Sed in pharetra ipsum. Sed suscipit tincidunt sapien ac mollis. Fusce malesuada ornare convallis. Donec aliquam nisl et lacus varius bibendum. Duis ut purus ut erat consectetur tincidunt id eget nunc.</p>
					<a href="<?php echo base_url('') ?>" class="btn btn-primary" role="button">
						<?php echo $this->lang->line('see-all') ?>
					</a>
				</div>
			</div>
			<div class="right col-sm-6 col-xs-12">
				<div class="row">
					<div class="item col-sm-4 col-xs-12">
						<div class="circle-border">
							<i class="fa fa-plane" aria-hidden="true"></i>
						</div>
						<h4>Transport</h4>
					</div>
					<div class="item col-sm-4 col-xs-12">
						<div class="circle-border">
							<i class="fa fa-compass" aria-hidden="true"></i>
						</div>
						<h4>Trip Guiding</h4>
					</div>
					<div class="item col-sm-4 col-xs-12">
						<div class="circle-border">
							<i class="fa fa-hotel" aria-hidden="true"></i>
						</div>
						<h4>Hotel Advisor</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="row">

			<?php
				$image =
					array (
					"https://images.unsplash.com/photo-1449034446853-66c86144b0ad?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=7402cc297bdfbb4a4856e764971dc013&auto=format&fit=crop&w=1950&q=80",
                    "https://images.unsplash.com/photo-1485738422979-f5c462d49f74?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=7baf4d3346ed57b7b14ac88eac57d2e3&auto=format&fit=crop&w=1975&q=80",
					"https://images.unsplash.com/photo-1464809142576-df63ca4ed7f0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=ff20b264fa7c4bf102ad0266eb5f8724&auto=format&fit=crop&w=934&q=80",
					"https://images.unsplash.com/photo-1449034446853-66c86144b0ad?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=7402cc297bdfbb4a4856e764971dc013&auto=format&fit=crop&w=1950&q=80",
					"https://images.unsplash.com/photo-1528649659491-23edddd0b98a?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=2cc42216ea138878b0a6b39418ca6855&auto=format&fit=crop&w=1951&q=80",
					"https://images.unsplash.com/photo-1495464597927-7137252f7d73?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=41203ca8f65d6ae05ccae4c6f6628ebd&auto=format&fit=crop&w=934&q=80"
					)
			?>
            <?php foreach ($image as $value): ?>
			<div class="item col-md-4 col-6 col-xs-12">
				<div class="mask">
					<img src="<?php echo $value ?>" alt="image">

					<div class="overview">
						<div class="head">
							<span class="sub-header">Tour Kind</span>
							<h3>Tour Title</h3>
						</div>
						<div class="body">
							<h2 class="price">999.000.000vnd</h2>
						</div>
					</div>
					<div class="content">
						<div class="head">
							<span class="sub-header">Tour Kind</span>
							<h4>Tour Title</h4>
							<h3 class="price">999.000.000vnd</h3>
						</div>
						<div class="body">
							<table class="table">
								<tr>
									<td>Time</td>
									<td>5Ds 4Ns</td>
								</tr>
								<tr>
									<td>Start</td>
									<td>Datetime</td>
								</tr>
							</table>
						</div>
						<div class="foot">
							<a href="<?php echo base_url('') ?>" class="btn btn-primary" role="button">
                                <?php echo $this->lang->line('explore') ?>
							</a>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section id="domestic" class="container-fluid section tour-intro">
	<div class="container">
		<div class="row">
            <?php
            $image =
                array (
                    "https://images.unsplash.com/photo-1470399542183-e6245d78c479?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=2f37382c0d0203b8be43fea0a8380965&auto=format&fit=crop&w=1934&q=80",
                    "https://images.unsplash.com/photo-1488330890490-c291ecf62571?ixlib=rb-0.3.5&s=3af17b34e51e5647770d5bf4de8dc4df&auto=format&fit=crop&w=1950&q=80",
                    "https://images.unsplash.com/photo-1527223090385-ca195a6c3acc?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=7cd6f74a9213ce6748c78118782a8a82&auto=format&fit=crop&w=1950&q=80"
                )
            ?>
            <?php foreach ($image as $value): ?>
			<div class="item col-sm-3 col-xs-12">
				<div class="mask">
					<img src="<?php echo $value ?>" alt="image">

					<div class="top">
						<span class="sub-header">Tour Category</span>
						<span class="header">Title</span>
					</div>
					<div class="bottom">
						<a href="<?php echo base_url('') ?>" class="btn btn-default" role="button">
							<?php echo $this->lang->line('explore') ?>
						</a>
					</div>
				</div>
			</div>
            <?php endforeach; ?>

			<div class="item col-sm-3 col-xs-12">
				<div class="head">
					<span class="sub-header"><?php echo $this->lang->line('domestic') ?></span>
					<h3>Domestic Travel Introduce</h3>
				</div>
				<div class="body">
					<p>Donec auctor tortor et mi commodo scelerisque. Aliquam eget lacus mi. In convallis mauris id ex ullamcorper lacinia. Morbi sed eleifend elit. Nam fringilla ultricies enim nec posuere. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer dapibus sapien sodales viverra dignissim. In sem magna, suscipit vulputate mollis id, aliquet ac metus. Ut vitae mattis elit, a semper arcu. Maecenas quis condimentum est. Curabitur blandit quis magna sed cursus. Sed sagittis pellentesque tortor vitae vulputate. Quisque eu felis et ipsum vulputate iaculis. Sed vel pellentesque tellus. Proin ullamcorper odio id dui interdum, tempus elementum nulla tempus. Nam sit amet urna egestas, condimentum lectus id, mattis erat.</p>
				</div>
				<div class="foot">
					<a href="<?php echo base_url('') ?>" class="btn btn-primary" role="button">
                        <?php echo $this->lang->line('see-all') ?>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="international" class="container-fluid section tour-intro">
	<div class="container">
		<div class="row">
            <?php
            $image =
                array (
                    "https://images.unsplash.com/photo-1514896856000-91cb6de818e0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=305831f27f4c897d18c6ec6db27e5714&auto=format&fit=crop&w=1951&q=80",
                    "https://images.unsplash.com/photo-1512315342380-81f12a02bd7e?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=c2d7b436b564480e13857d5e35cb9b51&auto=format&fit=crop&w=999&q=80",
                    "https://images.unsplash.com/photo-1507062916289-6af3d3e05386?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=215c87912e22df1659f49e63caab8915&auto=format&fit=crop&w=1000&q=80"
                )
            ?>
            <?php foreach ($image as $value): ?>
				<div class="item col-sm-3 col-xs-12">
					<div class="mask">
						<img src="<?php echo $value ?>" alt="image">

						<div class="top">
							<span class="sub-header">Tour Category</span>
							<span class="header">Title</span>
						</div>
						<div class="bottom">
							<a href="<?php echo base_url('') ?>" class="btn btn-default" role="button">
                                <?php echo $this->lang->line('explore') ?>
							</a>
						</div>
					</div>
				</div>
            <?php endforeach; ?>

			<div class="item col-sm-3 col-xs-12">
				<div class="head">
					<span class="sub-header"><?php echo $this->lang->line('international') ?></span>
					<h3>Domestic Travel Introduce</h3>
				</div>
				<div class="body">
					<p>Donec auctor tortor et mi commodo scelerisque. Aliquam eget lacus mi. In convallis mauris id ex ullamcorper lacinia. Morbi sed eleifend elit. Nam fringilla ultricies enim nec posuere. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer dapibus sapien sodales viverra dignissim. In sem magna, suscipit vulputate mollis id, aliquet ac metus. Ut vitae mattis elit, a semper arcu. Maecenas quis condimentum est. Curabitur blandit quis magna sed cursus. Sed sagittis pellentesque tortor vitae vulputate. Quisque eu felis et ipsum vulputate iaculis. Sed vel pellentesque tellus. Proin ullamcorper odio id dui interdum, tempus elementum nulla tempus. Nam sit amet urna egestas, condimentum lectus id, mattis erat.</p>
				</div>
				<div class="foot">
					<a href="<?php echo base_url('') ?>" class="btn btn-primary" role="button">
                        <?php echo $this->lang->line('see-all') ?>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="tour-request" class="container-fluid section" style="background-image: url('https://images.unsplash.com/photo-1523698157635-f68771d9e761?ixlib=rb-0.3.5&s=332933132e5bfedb487304d4978df2c6&auto=format&fit=crop&w=2690&q=80');">
	<div class="overlay">
		<div class="container">
			<div class="head">
				<h1><?php echo $this->lang->line('tour-request-title') ?></h1>
			</div>
			<div class="body">
				<h4><?php echo $this->lang->line('tour-request-content') ?></h4>
			</div>
			<div class="foot">
				<a href="<?php echo base_url('') ?>" class="btn btn-primary" role="button">
                    <?php echo $this->lang->line('tour-request') ?>
				</a>
			</div>
		</div>
	</div>
</section>

<section id="services" class="section container">
	<div class="section-header">
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<h3><?php echo $this->lang->line('services') ?></h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra non dui ut suscipit. Proin quis odio et mi dignissim accumsan. Integer fringilla fringilla rutrum. Pellentesque fringilla sem a nisi consequat porttitor. Sed in pharetra ipsum. Sed suscipit tincidunt sapien ac mollis. Fusce malesuada ornare convallis. Donec aliquam nisl et lacus varius bibendum. Duis ut purus ut erat consectetur tincidunt id eget nunc.</p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="item col-sm-6 col-xs-12">
			<div class="mask">
				<img src="https://images.unsplash.com/photo-1492455417212-e162ed4446e1?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=e8bd81d8bc531873ab3af61d83ef0c19&auto=format&fit=crop&w=1350&q=80" alt="blogs image">
				<div class="content">
					<h4 class="sub-header"><?php echo $this->lang->line('services') ?></h4>
					<a href="<?php echo base_url('') ?>">
						<h2 class="header"><?php echo $this->lang->line('services-hotel') ?></h2>
					</a>
				</div>
			</div>
		</div>
		<div class="item col-sm-6 col-xs-12">
			<div class="mask">
				<img src="https://images.unsplash.com/photo-1493235818145-77224bfd6e5c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=4476fd5cb39304a73bea67f98bb735df&auto=format&fit=crop&w=1350&q=80" alt="blogs image">
				<div class="content">
					<h4 class="sub-header"><?php echo $this->lang->line('services') ?></h4>
					<a href="<?php echo base_url('') ?>">
						<h2 class="header"><?php echo $this->lang->line('services-air') ?></h2>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="visa" class="container-fluid section" style="background-image: url('https://images.unsplash.com/photo-1523698157635-f68771d9e761?ixlib=rb-0.3.5&s=332933132e5bfedb487304d4978df2c6&auto=format&fit=crop&w=2690&q=80');">
	<div class="overlay">
		<div class="container">
			<div class="head">
				<h1><?php echo $this->lang->line('visa-title') ?></h1>
			</div>
			<div class="body">
				<h4><?php echo $this->lang->line('visa-content') ?></h4>
			</div>
			<div class="foot">
				<a href="<?php echo base_url('') ?>" class="btn btn-primary" role="button">
                    <?php echo $this->lang->line('explore') ?>
				</a>
			</div>
		</div>
	</div>
</section>

<section id="blogs" class="section container">
	<div class="section-header">
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<h3><?php echo $this->lang->line('blogs') ?></h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra non dui ut suscipit. Proin quis odio et mi dignissim accumsan. Integer fringilla fringilla rutrum. Pellentesque fringilla sem a nisi consequat porttitor. Sed in pharetra ipsum. Sed suscipit tincidunt sapien ac mollis. Fusce malesuada ornare convallis. Donec aliquam nisl et lacus varius bibendum. Duis ut purus ut erat consectetur tincidunt id eget nunc.</p>
			</div>
		</div>
	</div>
	<div class="row">
        <?php
        $image =
            array (
                "https://images.unsplash.com/photo-1514896856000-91cb6de818e0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=305831f27f4c897d18c6ec6db27e5714&auto=format&fit=crop&w=1951&q=80",
                "https://images.unsplash.com/photo-1512315342380-81f12a02bd7e?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=c2d7b436b564480e13857d5e35cb9b51&auto=format&fit=crop&w=999&q=80",
                "https://images.unsplash.com/photo-1507062916289-6af3d3e05386?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=215c87912e22df1659f49e63caab8915&auto=format&fit=crop&w=1000&q=80"
            )
        ?>
        <?php foreach ($image as $value): ?>
		<div class="item col-sm-4 col-xs-12">
			<div class="inner">
				<div class="mask">
					<img src="<?php echo $value ?>" alt="blogs image">
				</div>
				<div class="head">
					<h2>Blog Titles</h2>
				</div>
				<div class="body">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra non dui ut suscipit. Proin quis odio et mi dignissim accumsan. Integer fringilla fringilla rutrum. Pellentesque fringilla sem a nisi consequat porttitor. Sed in pharetra ipsum. Sed suscipit tincidunt sapien ac mollis. Fusce malesuada ornare convallis. Donec aliquam nisl et lacus varius bibendum. Duis ut purus ut erat consectetur tincidunt id eget nunc.</p>
				</div>
				<div class="foot">
					<a href="<?php echo base_url('') ?>" class="btn btn-primary" role="button">
                        <?php echo $this->lang->line('tour-request') ?>
					</a>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</section>

