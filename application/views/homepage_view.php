<!-- Homepage Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>homepage.css">


<script type="text/javascript">
	function to_slug(str,space="_"){
	    str = str.toLowerCase();

	    str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
	    str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
	    str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
	    str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
	    str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
	    str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
	    str = str.replace(/(đ|ð)/g, 'd');

	    str = str.replace(/([^0-9a-z-\s])/g, '');

	    str = str.replace(/(\s+)/g, space);

	    str = str.replace(/^-+/g, '');

	    str = str.replace(/-+$/g, '');

	    // return
	    return str;
	}
	var list = {};
	var apiData = {};
	var i = 0;
    function temperature(id,lang){
        $.ajax({
            url: 'http://api.openweathermap.org/data/2.5/forecast?id='+id+'&mode=json&lang='+lang+'&APPID=279b4be6d54c8bf6ea9b12275a567156&cnt=3',
            type: 'GET',
            async: false,
        })
        .done(function(data) {
    		var key = to_slug(data.city.name);
            list[id] = key;
            apiData[id] = data;
            i++;
        })
        .fail(function() {
            console.log("error");
        });
    }
    temperature('1581129','<?php echo $lang;?>');
    temperature('1816670','<?php echo $lang;?>');
    temperature('1796236','<?php echo $lang;?>');
    temperature('1668341','<?php echo $lang;?>');
    temperature('1850147','<?php echo $lang;?>');
    temperature('1835848','<?php echo $lang;?>');
    temperature('4321929','<?php echo $lang;?>');
    temperature('1609350','<?php echo $lang;?>');
    temperature('1651944','<?php echo $lang;?>');
    temperature('1735161','<?php echo $lang;?>');
    temperature('1821306','<?php echo $lang;?>');
    temperature('1642911','<?php echo $lang;?>');
    temperature('1880252','<?php echo $lang;?>');
    $.ajax({
        url: '<?php echo base_url(); ?>homepage/fetch_weather_language?data=' + JSON.stringify(list),
        type: 'GET',
        success: function(response){
            var array = $.map(response.reponse, function(value, index) {
                return [value];
            });
            var count = 0;
            $.each(apiData, function(index, data){
                $('#banner-weather .line .content-weather').append('<div class="col-md-12 '+index+'" style="padding:0px; margin-bottom:10px;border-bottom:1px solid #CCC;"><div class="row"><div class="img col-md-3 col-ms-12 col-sm-12 col-xs-6" ><img src="http://openweathermap.org/img/w/'+data.list[2].weather[0].icon+'.png'+'" width="80px" alt=""></div><div class=" col-md-9 col-ms-12 col-sm-12 col-xs-6" style="padding-left:25px;"><h3 style="font-size:1em; text-transform:capitalize;font-weight:600;margin-bottom:0px;margin-top:15px;">' + array[count] + '</h3><p class="description" style="text-transform:capitalize;margin-bottom:0px;"></p><p class="nhietdo" style="margin-bottom:0px;"></p></div></div></div>');
                $("#banner-weather .line ."+index+" p.description").text(data.list[2].weather[0].description);
                $("#banner-weather .line ."+index+" p.nhietdo").text(Math.floor(data.list[2].main.temp_min/10)+'°C - '+Math.ceil(data.list[2].main.temp_max/10)+'°C');
                count++;
            })
        }
    });
</script>
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
						<!--
						<div class="carousel-caption">
							<?php echo $value['title']; ?>
						</div>
						-->
					</div>
				<?php endforeach ?>
			<?php endif ?>
		</div>

		<!--Slider Background-->
		<!--<div class="slider-background"></div>-->

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

<section id="tour-special" class="container-fluid section">
	<div class="container">
		<div class="section-header">
			<h1><?php echo $specialtour['product_category_title']; ?></h1>
			<div class="line">
				<div class="line-primary"></div>
			</div>
		</div>
		<div class="row">
			<div class="left col-sm-6 col-xs-12">
				<p><?php echo $specialtour['product_category_content']; ?></p>
				<a href="<?php echo base_url('danh-muc/tour-dac-biet/') ?>" class="btn btn-primary" role="button">
                    <?php echo $this->lang->line('see-all') ?>
				</a>
			</div>
			<div class="right col-sm-6 col-xs-12">
				<div class="row">
					<div class="item col-xs-4">
						<div class="circle-border">
							<i class="fa fa-plane" aria-hidden="true"></i>
						</div>
						<h4><?php echo $this->lang->line('transport') ?></h4>
					</div>
					<div class="item col-xs-4">
						<div class="circle-border">
							<i class="fa fa-compass" aria-hidden="true"></i>
						</div>
						<h4><?php echo $this->lang->line('trip-guide') ?></h4>
					</div>
					<div class="item col-xs-4">
						<div class="circle-border">
							<i class="fa fa-hotel" aria-hidden="true"></i>
						</div>
						<h4><?php echo $this->lang->line('hotel-advisor') ?></h4>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="carousel carousel-showmanymoveone slider" id="special-slider">
					<div class="carousel-inner">
                        <?php if (!empty($special_tours)): ?>
                            <?php foreach ($special_tours as $key => $value): ?>
								<div class="item <?php echo ($key == 0)?'active' : ''; ?>">
									<div class="inner col-xs-12 col-sm-6 col-md-4">

										<!--BADGE DISCOUNT -->
										<?php if (!empty($value['showpromotion'])): ?>
											<div class="badge badge-discount">
												<div class="content"><?php echo $this->lang->line('promotion');?><br>-<?php echo $value['percen']; ?>%</div>
											</div>
										<?php endif ?>

										<!--BADGE SPECIAL -->
										<div class="badge badge-special">
											<?php if (!empty($value['hot'])): ?>
												<div id="tour-hot" class="">
													<img src="<?php echo site_url('assets/img/badge-tour-hot.png')?>" alt="badge tour hot">
												</div>
											<?php endif ?>
											<?php if (!empty($value['bestselling'])): ?>
												<div id="best-sell" class="">
													<img src="<?php echo site_url('assets/img/badge-best-sell.png')?>" alt="badge best sell">
												</div>
											<?php endif ?>
										</div>

										<div class="mask">
											<img src="<?php echo base_url('/assets/upload/product/'.$value['slug'].'/'.$value['image']) ?>" alt="image">
											<div class="overview">
												<div class="head">
													<h4 class="post-subtitle"><?php echo $value['category_title']; ?></h4>
													<h2 class="post-title"><?php echo $value['title']; ?></h2>
												</div>
												<div class="body">
													<h3 class="price">
														<?php if (!empty($value['pricepromotion']) && !empty($value['percen']) && !empty($value['showpromotion'])): ?>
															<?php echo number_format($value['pricepromotion']); ?> vnd
															<small class="price-original"><del><?php echo number_format($value['price']);?> vnd</del></small>
														<?php else: ?>
															<?php echo number_format($value['price']); ?> vnd
														<?php endif ?>
													</h3>
													<small class="rating"><?php echo $this->lang->line('tour-detail-rating') ?>:
														<?php if (empty($value['count_rating'])): ?>
															<?php echo NO_RATING;?> 
														<?php else: ?>
															<?php echo round($value['total_rating']/$value['count_rating'],1);?>/5 
														<?php endif ?> 
													<i class="fa fa-star" aria-hidden="true"></i></small>
												</div>
											</div>
											<div class="content">
												<div class="head">
													<h4 class="post-subtitle"><?php echo $value['category_title']; ?></h4>
													<h2 class="post-title"><?php echo $value['title']; ?></h2>
													<h3 class="price">
														<?php if (!empty($value['pricepromotion']) && !empty($value['percen']) && !empty($value['showpromotion'])): ?>
															<?php echo number_format($value['pricepromotion']); ?> vnd
															<small class="price-original"><del><?php echo number_format($value['price']);?> vnd</del></small>
														<?php else: ?>
															<?php echo number_format($value['price']); ?> vnd
														<?php endif ?>
													</h3>
												</div>
												<div class="body">
													<table class="table">
														<tr>
															<td><?php echo $this->lang->line('tour-detail-duration');?></td>
															<td><?php echo count(json_decode($value['dateimg'])) ?></td>
														</tr>
														<tr>
															<td><?php echo $this->lang->line('tour-detail-start');?></td>
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
														<tr>
															<td><?php echo $this->lang->line('tour-detail-rating') ?></td>
															<td>
																<?php if (empty($value['count_rating'])): ?>
																	<?php echo NO_RATING;?>
																<?php else: ?>
																	<?php echo round($value['total_rating']/$value['count_rating'],1);?>/5 
																<?php endif ?>
																<i class="fa fa-star" aria-hidden="true"></i>
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
                                <?php if (!empty($domestic_tours)): ?>
                                    <?php foreach ($domestic_tours as $key => $value): ?>
                                        <div class="item <?php echo ($key == 0)?'active' : ''; ?>">
                                            <div class="inner col-xs-12 col-sm-6 col-md-4">

												<!--BADGE DISCOUNT -->
												<?php if (!empty($value['showpromotion'])): ?>
													<div class="badge badge-discount">
														<div class="content"><?php echo $this->lang->line('promotion');?><br>-<?php echo $value['percen']; ?>%</div>
													</div>
												<?php endif ?>

												<!--BADGE SPECIAL -->
												<div class="badge badge-special">
													<?php if (!empty($value['hot'])): ?>
														<div id="tour-hot" class="">
															<img src="<?php echo site_url('assets/img/badge-tour-hot.png')?>" alt="badge tour hot">
														</div>
													<?php endif ?>
													<?php if (!empty($value['bestselling'])): ?>
														<div id="best-sell" class="">
															<img src="<?php echo site_url('assets/img/badge-best-sell.png')?>" alt="badge best sell">
														</div>
													<?php endif ?>
												</div>

                                                <div class="mask">
                                                    <a href="<?php echo base_url('tours/' . $value['slug']) ?>">
                                                        <?php if($value['image']){ ?>
                                                            <img src="<?php echo base_url('/assets/upload/product/'.$value['slug'].'/'.$value['image']) ?>" alt="image">
                                                        <?php }else{ ?>
                                                            <img src="<?php echo base_url('/assets/img/vertical.jpg'); ?>" alt="image">
                                                        <?php } ?>
                                                    </a>
                                                    <div class="overview">
                                                        <div class="head">
                                                            <h4 class="post-subtitle"><?php echo $value['category_title']; ?></h4>
                                                            <h2 class="post-title"><?php echo $value['title']; ?></h2>
                                                        </div>
                                                        <div class="body">
                                                            <h3 class="price">
																<?php if (!empty($value['pricepromotion']) && !empty($value['percen']) && !empty($value['showpromotion'])): ?>
																	<?php echo number_format($value['pricepromotion']); ?> vnd
																	<small class="price-original"><del><?php echo number_format($value['price']);?> vnd</del></small>
																<?php else: ?>
																	<?php echo number_format($value['price']); ?> vnd
																<?php endif ?>
															</h3>
															<small class="rating"><?php echo $this->lang->line('tour-detail-rating') ?>:
																<?php if (empty($value['count_rating'])): ?>
																	<?php echo NO_RATING;?> 
																<?php else: ?>
																	<?php echo round($value['total_rating']/$value['count_rating'],1);?>/5 
																<?php endif ?>
															<i class="fa fa-star" aria-hidden="true"></i></small>
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <div class="head">
                                                            <h4 class="post-subtitle"><?php echo $value['category_title']; ?></h4>
                                                            <h2 class="post-title"><?php echo $value['title']; ?></h2>
                                                            <h3 class="price">
																<?php if (!empty($value['pricepromotion']) && !empty($value['percen']) && !empty($value['showpromotion'])): ?>
																	<?php echo number_format($value['pricepromotion']); ?> vnd
																	<small class="price-original"><del><?php echo number_format($value['price']);?> vnd</del></small>
																<?php else: ?>
																	<?php echo number_format($value['price']); ?> vnd
																<?php endif ?>
															</h3>
                                                        </div>
                                                        <div class="body">
                                                            <table class="table">
                                                                <tr>
                                                                    <td><?php echo $this->lang->line('tour-detail-duration');?></td>
                                                                    <td><?php echo count(json_decode($value['dateimg'])) ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><?php echo $this->lang->line('tour-detail-start');?></td>
                                                                    <td>
                                                                        <?php
                                                                        if($value['date'] != "0000-00-00 00:00:00" && $value['date'] != "1970-01-01 08:00:00"){
                                                                            $rmtime = str_replace(" 00:00:00","",$value['date']);
                                                                            $date= explode("-",$rmtime);
                                                                            if(count($date) == 3){
                                                                                $value['date'] = $date[2]."/".$date[1]."/".$date[0];
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
																<tr>
																	<td><?php echo $this->lang->line('tour-detail-rating') ?></td>
																	<td>
																		<?php if (empty($value['count_rating'])): ?>
																			<?php echo NO_RATING;?>
																		<?php else: ?>
																			<?php echo round($value['total_rating']/$value['count_rating'],1);?>/5 
																		<?php endif ?>
																		<i class="fa fa-star" aria-hidden="true"></i>
																		
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
                                <?php endif; ?>
							</div>
						</div>
					</div>
				</div>
<!--				<ul class="list-inline">-->
<!--					<li>-->
<!--						<a class="btn btn-default" href="#domestic-slider" data-slide="prev">-->
<!--							<i class="fa fa-arrow-left" aria-hidden="false"></i>-->
<!--						</a>-->
<!--					</li>-->
<!--					<li>-->
<!--						<a class="btn btn-default" href="#domestic-slider" data-slide="next">-->
<!--							<i class="fa fa-arrow-right" aria-hidden="false"></i>-->
<!--						</a>-->
<!--					</li>-->
<!--				</ul>-->
			</div>
			<div class="right col-sm-3 col-xs-12">
				<div class="section-header">
					<h1><?php echo $this->lang->line('domestic') ?></h1>
					<div class="line">
						<div class="line-primary"></div>
					</div>
				</div>
				<div class="body">
					<p><?php echo $domestic['product_category_content']; ?></p>
				</div>
				<div class="foot">
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
					<a href="<?php echo base_url('/danh-muc/'.$domestic['slug']) ?>" class="btn btn-primary" role="button">
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
                                <?php if (!empty($international_tours)): ?>
                                    <?php foreach ($international_tours as $key => $value): ?>
										<div class="item <?php echo ($key == 0)?'active' : ''; ?>">
											<div class="inner col-xs-12 col-sm-6 col-md-4">

												<!--BADGE DISCOUNT -->
												<?php if (!empty($value['showpromotion'])): ?>
													<div class="badge badge-discount">
														<div class="content"><?php echo $this->lang->line('promotion');?><br>-<?php echo $value['percen']; ?>%</div>
													</div>
												<?php endif ?>

												<!--BADGE SPECIAL -->
												<div class="badge badge-special">
													<?php if (!empty($value['hot'])): ?>
														<div id="tour-hot" class="">
															<img src="<?php echo site_url('assets/img/badge-tour-hot.png')?>" alt="badge tour hot">
														</div>
													<?php endif ?>
													<?php if (!empty($value['bestselling'])): ?>
														<div id="best-sell" class="">
															<img src="<?php echo site_url('assets/img/badge-best-sell.png')?>" alt="badge best sell">
														</div>
													<?php endif ?>
												</div>

												<div class="mask">
													<a href="<?php echo base_url('tours/' . $value['slug']) ?>">
                                                        <?php if($value['image']){ ?>
                                                            <img src="<?php echo base_url('/assets/upload/product/'.$value['slug'].'/'.$value['image']) ?>" alt="image">
                                                        <?php }else{ ?>
                                                            <img src="<?php echo base_url('/assets/img/vertical.jpg'); ?>" alt="image">
                                                        <?php } ?>
													</a>
													<div class="overview">
														<div class="head">
															<h4 class="post-subtitle"><?php echo $value['category_title']; ?></h4>
															<h2 class="post-title"><?php echo $value['title']; ?></h2>
														</div>
														<div class="body">
															<h3 class="price">
																<?php if (!empty($value['pricepromotion']) && !empty($value['percen']) && !empty($value['showpromotion'])): ?>
																	<?php echo number_format($value['pricepromotion']); ?> vnd
																	<small class="price-original"><del><?php echo number_format($value['price']);?> vnd</del></small>
																<?php else: ?>
																	<?php echo number_format($value['price']); ?> vnd
																<?php endif ?>
															</h3>
															<small class="rating"><?php echo $this->lang->line('tour-detail-rating') ?>:
																<?php if (empty($value['count_rating'])): ?>
																	<?php echo NO_RATING;?> 
																<?php else: ?>
																	<?php echo round($value['total_rating']/$value['count_rating'],1);?>/5 
																<?php endif ?>
																<i class="fa fa-star" aria-hidden="true"></i></small>
														</div>
													</div>
													<div class="content">
														<div class="head">
															<h4 class="post-subtitle"><?php echo $value['category_title']; ?></h4>
																<h2 class="post-title"><?php echo $value['title']; ?></h2>
																<h3 class="price">
																	<?php if (!empty($value['pricepromotion']) && !empty($value['percen']) && !empty($value['showpromotion'])): ?>
																		<?php echo number_format($value['pricepromotion']); ?> vnd
																		<small class="price-original"><del><?php echo number_format($value['price']);?> vnd</del></small>
																	<?php else: ?>
																		<?php echo number_format($value['price']); ?> vnd
																	<?php endif ?>
																</h3>
														</div>
														<div class="body">
															<table class="table">
																<tr>
																	<td><?php echo $this->lang->line('tour-detail-duration');?></td>
																	<td><?php echo count(json_decode($value['dateimg'])) ?></td>
																</tr>
																<tr>
																	<td><?php echo $this->lang->line('tour-detail-start');?></td>
																	<td>
                                                                        <?php
                                                                        if($value['date'] != "0000-00-00 00:00:00" && $value['date'] != "1970-01-01 08:00:00"){
                                                                            $rmtime = str_replace(" 00:00:00","",$value['date']);
                                                                            $date= explode("-",$rmtime);
                                                                            if(count($date) == 3){
                                                                                $value['date'] = $date[2]."/".$date[1]."/".$date[0];
                                                                            }
                                                                        }
                                                                        ?>
																	</td>
																</tr>
																<tr>
																	<td><?php echo $this->lang->line('tour-detail-rating') ?></td>
																	<td>
																		<?php if (empty($value['count_rating'])): ?>
																			<?php echo NO_RATING;?>
																		<?php else: ?>
																			<?php echo round($value['total_rating']/$value['count_rating'],1);?>/5 
																		<?php endif ?>
																		<i class="fa fa-star" aria-hidden="true"></i>
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
                                <?php endif; ?>
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
			</div>

            <div class="right col-sm-3 col-xs-12">
                <div class="section-header">
                    <h1><?php echo $this->lang->line('international') ?></h1>
                    <div class="line">
                        <div class="line-primary"></div>
                    </div>
                </div>
                <div class="body">
                    <p><?php echo $international['product_category_content']; ?></p>
                </div>
                <div class="foot">
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
                    <a href="<?php echo base_url('/danh-muc/' . $international['slug']) ?>" class="btn btn-primary" role="button">
                        <?php echo $this->lang->line('see-all') ?>
                    </a>
                </div>
            </div>
		</div>
	</div>
</section>

<section id="tour-request" class="container-fluid section hidden" style="background-image: url('https://images.unsplash.com/photo-1523698157635-f68771d9e761?ixlib=rb-0.3.5&s=332933132e5bfedb487304d4978df2c6&auto=format&fit=crop&w=2690&q=80');">
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
	<div class="row">
		<div class="col-sm-9 col-xs-12 services-left">
			<div class="section-header">
				<div class="row">
					<div class="col-xs-12">
						<h1><?php echo $handbook['post_category_title'];?></h1>
						<div class="line">
							<div class="line-primary"></div>
						</div>
						<p><?php echo $handbook['post_category_content'];?></p>
					</div>
				</div>
			</div>
			<div class="row">
                <?php foreach ($post_handbook as $key => $value): ?>
					<a href="<?php echo base_url('bai-viet/').$value['slug'] ?>">
						<div class="item col-sm-6 col-xs-12">
							<div class="mask">
								<img src="<?php echo base_url('/assets/upload/post/'.$value['image']);?>" alt="blogs image">
								<div class="overlay"></div>
								<div class="content">
									<h4 class="sub-header"><?php echo $value['category_title'];?></h4>
									<h2 class="header"><?php echo $value['title']; ?></h2>
								</div>
							</div>
						</div>
					</a>
                <?php endforeach ?>
			</div>
		</div>

		<div class="col-sm-3 col-xs-12 services-right">
			<div id="banner-weather">
				<div class="section-header">
					<div class="row">
						<div class="col-xs-12">
							<h1><?php echo $this->lang->line('weather') ?></h1>
							<div class="line" style="padding: 0px;">
								<div class="line-primary"></div>
								<div class="content-weather" style="overflow-y: scroll;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
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
				<a href="<?php echo base_url('chuyen-muc/'.$visa['slug']) ?>" class="btn btn-primary" role="button">
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
				<h3><?php echo $this->lang->line('location') ?></h3>
				<div class="line">
					<div class="line-primary"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<?php if (!empty($location)): ?>
	        <?php foreach ($location as $value): ?>
			<div class="item col-sm-4 col-xs-12">
				<div class="inner">
					<a href="<?php echo base_url('diem-den/'.$value['slug']) ?>">
						<div class="mask">
							<img src="<?php echo base_url('assets/upload/localtion/'.$value['slug'].'/'.$value['image']); ?>" alt="blogs image">
						</div>
					</a>
					<div class="head">
						<h4 class="post-subtitle"><?php echo $value['title']; ?></h4>
					</div>
					<div class="body">
						<p class="post-description"><?php echo $value['content']; ?></p>
					</div>
					<div class="foot">
						<a href="<?php echo base_url('diem-den/'.$value['slug']) ?>" class="btn btn-primary" role="button">
	                        <?php echo $this->lang->line('explore') ?>
						</a>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		<?php endif ?>
	</div>
</section>

<script>
	var height = $('.services-left').height();
	$('.services-right').height($('.services-left').height());
	$('.services-right .content-weather').css('height',($('.services-left').height()-$('.services-right h1').height()-20)+'px');
	$(document).ready(function(){
		$('.section .item .inner').addClass('');
	});
</script>

