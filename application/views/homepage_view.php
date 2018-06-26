<!-- Homepage Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>homepage.css">

<!-- Slider JS -->
<script src="<?php echo site_url('assets/js/slider.js') ?>"></script>

<section id="slider" class="container-fluid">
	<div id="homepage-slider" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<?php if (!empty($banner)): ?>
				<?php foreach ($banner as $key => $value): ?>

					<li data-target="#homepage-slider" data-slide-to="0" class="<?php echo ($key == 0)?'active' : ''; ?>"></li>
				<?php endforeach ?>
			<?php endif ?>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<?php if (!empty($banner)): ?>
				<?php foreach ($banner as $key => $value): ?>
					<div class="item <?php echo ($key == 0)?'active' : ''; ?>">
						<div class="mask">
							<img src="<?php echo base_url('/assets/upload/banner/'.$value['image']); ?>" alt="slide 2">
						</div>
						<div class="carousel-caption">
							<?php echo $value['title']; ?>
						</div>
					</div>
				<?php endforeach ?>
			<?php endif ?>
		</div>

		<!--Slider Background-->
		<div class="slider-background"></div>

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
				<div class="section-header">
					<div class="row">
						<div class="col-xs-12">
							<h3><?php echo $specialtour['title']; ?></h3>
							<div class="line">
								<div class="line-primary"></div>
							</div>
							<p><?php echo $specialtour['content']; ?></p>
							<a href="<?php echo base_url('') ?>" class="btn btn-primary" role="button">
                                <?php echo $this->lang->line('see-all') ?>
							</a>
						</div>
					</div>
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
			<div class="col-xs-12">
				<div class="carousel carousel-showmanymoveone slider" id="special-slider">
					<div class="carousel-inner">
                        <?php if (!empty($tour_specialtour)): ?>
                            <?php foreach ($tour_specialtour as $key =>$value): ?>
								<div class="item <?php echo ($key == 0)?'active' : ''; ?>">
									<div class="inner col-xs-12 col-sm-6 col-md-4">
										<div class="mask">
											<img src="<?php echo base_url('/assets/upload/product/'.$value['slug'].'/'.$value['image']) ?>" alt="image">
											<div class="overview">
												<div class="head">
													<h4 class="post-subtitle"><?php echo $value['parent']['title']; ?></h4>
													<h2 class="post-title"><?php echo $value['title']; ?></h2>
												</div>
												<div class="body">
													<h3 class="price"><?php echo number_format($value['price']); ?>vnd</h3>
												</div>
											</div>
											<div class="content">
												<div class="head">
													<h4 class="post-subtitle"><?php echo $value['parent']['title']; ?></span>
														<h2 class="post-title"><?php echo $value['title']; ?></h2>
														<h3 class="price"><?php echo number_format($value['price']); ?>vnd</h3>
												</div>
												<div class="body">
													<table class="table">
														<tr>
															<td>Time</td>
															<td><?php echo count(json_decode($value['dateimg'])) ?></td>
														</tr>
														<tr>
															<td>Start</td>
															<td>
                                                                <?php
                                                                if($value['date'] != "0000-00-00 00:00:00" && $value['date'] != "1970-01-01 08:00:00"){
                                                                    $rmtime = str_replace(" 00:00:00","",$value['date']);
                                                                    $date= explode("-",$rmtime);
                                                                    if(count($date) == 3){
                                                                        $value['date'] = $date[2]."/".$date[1]."/".$date[0];
                                                                    }else{
                                                                        $value['date'] = "";
                                                                    }
                                                                }else{
                                                                    $value['date'] = "";
                                                                }
                                                                echo $value['date'];
                                                                ?>
															</td>
														</tr>
													</table>
												</div>
												<div class="foot">
													<a href="<?php echo base_url('tours/'.$value['slug']) ?>" class="btn btn-primary" role="button">
                                                        <?php echo $this->lang->line('explore') ?>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
                            <?php endforeach; ?>
                        <?php endif ?>
					</div>

					<div class="slider-control">
						<a class="left carousel-control" href="#special-slider" data-slide="prev">
							<i class="fa fa-arrow-left" aria-hidden="false"></i>
						</a>
						<a class="right carousel-control" href="#special-slider" data-slide="next">
							<i class="fa fa-arrow-right" aria-hidden="false"></i>
						</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>

<section id="domestic" class="container-fluid section tour-intro">
	<div class="container">
		<div class="row">
			<div class="left col-sm-9 col-xs-12">
				<div class="row">
					<div class="col-xs-12">
						<div class="carousel carousel-showmanymoveone slider" id="domestic-slider">
							<div class="carousel-inner">
                                <?php if (!empty($tour_domestic)): ?>
                                <?php foreach ($tour_domestic as $key => $value): ?>
									<div class="item <?php echo ($key == 0)?'active' : ''; ?>">
										<div class="inner col-xs-12 col-sm-6 col-md-4">
											<div class="mask">
												<a href="<?php echo base_url('tours/'.$value['slug']) ?>">
													<img src="<?php echo base_url('/assets/upload/product/'.$value['slug'].'/'.$value['image']) ?>" alt="image">
												</a>
												<div class="overview">
													<div class="head">
														<h4 class="post-subtitle"><?php echo $value['parent']['title']; ?></h4>
														<h2 class="post-title"><?php echo $value['title']; ?></h2>
													</div>
													<div class="body">
														<h3 class="price"><?php echo number_format($value['price']); ?>vnd</h3>
													</div>
												</div>
												<div class="content">
													<div class="head">
														<h4 class="post-subtitle"><?php echo $value['parent']['title']; ?></span>
														<h2 class="post-title"><?php echo $value['title']; ?></h2>
														<h3 class="price"><?php echo number_format($value['price']); ?>vnd</h3>
													</div>
													<div class="body">
														<table class="table">
															<tr>
																<td>Time</td>
																<td><?php echo count(json_decode($value['dateimg'])) ?></td>
															</tr>
															<tr>
																<td>Start</td>
																<td>
                                                                    <?php
                                                                    if($value['date'] != "0000-00-00 00:00:00" && $value['date'] != "1970-01-01 08:00:00"){
                                                                        $rmtime = str_replace(" 00:00:00","",$value['date']);
                                                                        $date= explode("-",$rmtime);
                                                                        if(count($date) == 3){
                                                                            $value['date'] = $date[2]."/".$date[1]."/".$date[0];
                                                                        }else{
                                                                            $value['date'] = "";
                                                                        }
                                                                    }else{
                                                                        $value['date'] = "";
                                                                    }
                                                                    echo $value['date'];
                                                                    ?>
																</td>
															</tr>
														</table>
													</div>
													<div class="foot">
														<a href="<?php echo base_url('tours/'.$value['slug']) ?>" class="btn btn-primary" role="button">
                                                            <?php echo $this->lang->line('explore') ?>
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
                                    <?php endforeach; ?>
                                <?php endif ?>
							</div>
						</div>
					</div>
				</div>
				<ul class="list-inline">
					<li>
						<a class="btn btn-default" href="#domestic-slider" data-slide="prev">
							<i class="fa fa-arrow-left" aria-hidden="false"></i>
						</a>
					</li>
					<li>
						<a class="btn btn-default" href="#domestic-slider" data-slide="next">
							<i class="fa fa-arrow-right" aria-hidden="false"></i>
						</a>
					</li>
				</ul>
			</div>
			<div class="right col-sm-3 col-xs-12">
				<div class="section-header">
					<h1><?php echo $this->lang->line('domestic') ?></h1>
					<div class="line">
						<div class="line-primary"></div>
					</div>
				</div>
				<div class="body">
					<p><?php echo $domestic['content']; ?></p>
				</div>
				<div class="foot">
					<a href="<?php echo base_url('/danhmuc/'.$domestic['slug']) ?>" class="btn btn-primary" role="button">
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
			<div class="left col-sm-9 col-xs-12">
				<div class="row">
					<div class="col-xs-12">
						<div class="carousel carousel-showmanymoveone slider" id="international-slider">
							<div class="carousel-inner">
                                <?php if (!empty($tour_international)): ?>
                                    <?php foreach ($tour_international as $key => $value): ?>
										<div class="item <?php echo ($key == 0)?'active' : ''; ?>">
											<div class="inner col-xs-12 col-sm-6 col-md-4">
												<div class="mask">
													<a href="<?php echo base_url('tours/'.$value['slug']) ?>">
														<img src="<?php echo base_url('/assets/upload/product/'.$value['slug'].'/'.$value['image']) ?>" alt="image">
													</a>
													<div class="overview">
														<div class="head">
															<h4 class="post-subtitle"><?php echo $value['parent']['title']; ?></h4>
															<h2 class="post-title"><?php echo $value['title']; ?></h2>
														</div>
														<div class="body">
															<h3 class="price"><?php echo number_format($value['price']); ?>vnd</h3>
														</div>
													</div>
													<div class="content">
														<div class="head">
															<h4 class="post-subtitle"><?php echo $value['parent']['title']; ?></span>
																<h2 class="post-title"><?php echo $value['title']; ?></h2>
																<h3 class="price"><?php echo number_format($value['price']); ?>vnd</h3>
														</div>
														<div class="body">
															<table class="table">
																<tr>
																	<td>Time</td>
																	<td><?php echo count(json_decode($value['dateimg'])) ?></td>
																</tr>
																<tr>
																	<td>Start</td>
																	<td>
                                                                        <?php
                                                                        if($value['date'] != "0000-00-00 00:00:00" && $value['date'] != "1970-01-01 08:00:00"){
                                                                            $rmtime = str_replace(" 00:00:00","",$value['date']);
                                                                            $date= explode("-",$rmtime);
                                                                            if(count($date) == 3){
                                                                                $value['date'] = $date[2]."/".$date[1]."/".$date[0];
                                                                            }else{
                                                                                $value['date'] = "";
                                                                            }
                                                                        }else{
                                                                            $value['date'] = "";
                                                                        }
                                                                        echo $value['date'];
                                                                        ?>
																	</td>
																</tr>
															</table>
														</div>
														<div class="foot">
															<a href="<?php echo base_url('tours/'.$value['slug']) ?>" class="btn btn-primary" role="button">
                                                                <?php echo $this->lang->line('explore') ?>
															</a>
														</div>
													</div>

												</div>
											</div>
										</div>
                                    <?php endforeach; ?>
                                <?php endif ?>
							</div>

<!--							<div class="slider-control">-->
<!--								<a class="left carousel-control" href="#international-slider" data-slide="prev">-->
<!--									<i class="fa fa-arrow-left" aria-hidden="false"></i>-->
<!--								</a>-->
<!--								<a class="right carousel-control" href="#international-slider" data-slide="next">-->
<!--									<i class="fa fa-arrow-right" aria-hidden="false"></i>-->
<!--								</a>-->
<!--							</div>-->
						</div>
					</div>
				</div>
				<ul class="list-inline">
					<li>
						<a class="btn btn-default" href="#international-slider" data-slide="prev">
							<i class="fa fa-arrow-left" aria-hidden="false"></i>
						</a>
					</li>
					<li>
						<a class="btn btn-default" href="#international-slider" data-slide="next">
							<i class="fa fa-arrow-right" aria-hidden="false"></i>
						</a>
					</li>
				</ul>
			</div>

			<div class="right col-sm-3 col-xs-12">
				<div class="section-header">
					<h1><?php echo $this->lang->line('international') ?></h1>
					<div class="line">
						<div class="line-primary"></div>
					</div>
				</div>
				<div class="body">
					<div><?php echo $international['content']; ?></div>
				</div>
				<div class="foot">
					<a href="<?php echo base_url('/danhmuc/'.$domestic['slug']) ?>" class="btn btn-primary" role="button">
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
				<h1><?php echo $services['title'];?></h1>
				<div class="line">
					<div class="line-primary"></div>
				</div>
				<p><?php echo $services['content'];?></p>
			</div>
		</div>
	</div>
	<div class="row">
		<?php foreach ($post_services as $key => $value): ?>
			<div class="item col-sm-6 col-xs-12">
				<div class="mask">
					<img src="<?php echo base_url('/assets/upload/post/'.$value['image']);?>" alt="blogs image">
					<div class="content">
						<h4 class="sub-header"><?php echo $services['title'];?></h4>
						<a href="<?php echo base_url('') ?>">
							<h2 class="header"><?php echo $value['title']; ?></h2>
						</a>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</section>

<section id="visa" class="container-fluid section" style="background-image: url('<?php echo base_url('assets/upload/post_category/'.$visa['image']); ?>');">
	<div class="overlay">
		<div class="container">
			<div class="head">
				<h1><?php echo $visa['title'] ?></h1>
			</div>
			<div class="body">
				<h4><?php echo $visa['content'] ?></h4>
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
				<h3><?php echo $blogs['title']; ?></h3>
				<div class="line">
					<div class="line-primary"></div>
				</div>
				<p><?php echo $blogs['content']; ?></p>
			</div>
		</div>
	</div>

	<div class="row">
        <?php foreach ($post_blogs as $value): ?>
		<div class="item col-sm-4 col-xs-12">
			<div class="inner">
				<div class="mask">
					<img src="<?php echo base_url('assets/upload/post/'.$value['image']); ?>" alt="blogs image">
				</div>
				<div class="head">
					<h4 class="post-subtitle"><?php echo $value['title']; ?></h4>
					<h2 class="post-title"><?php echo $value['title']; ?></h2>
				</div>
				<div class="body">
					<p class="post-description"><?php echo $value['description']; ?></p>
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

