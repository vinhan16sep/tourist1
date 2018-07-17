<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Diamond Tour</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>fontAwesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/') ?>client.css">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/rateit.css') ?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo site_url('assets/sass/main.min.css') ?>">

	<!-- jQuery 3 -->
	<script src="<?php echo site_url('assets/lib/') ?>jquery/jquery.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="<?php echo site_url('assets/lib/') ?>bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>bootstrap/css/daterangepicker.css">

    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>bootstrap/css/bootstrap-datepicker.min.css">
	<!-- Main Js -->
	<script src="<?php echo site_url('assets/js/') ?>main.js"></script>
	<script src="<?php echo site_url('assets/lib/') ?>jquery/jquery.validate.min.js"></script>
	<!-- Easing JS -->
	<script src="<?php echo site_url('assets/lib/') ?>jquery/jquery.easing.1.3.js"></script>

	<!-- Waypoint Js -->
	<script src="<?php echo site_url('assets/lib/') ?>jquery/jquery.waypoints.min.js"></script>
	<script src="<?php echo site_url('assets/js/jquery.rateit.js') ?>"></script>

	<!--Favicon-->
	<link rel="shortcut icon" type="image/png" href="<?php echo site_url('assets/img/favicon.png') ?>"/>


</head>

<body>

<!-- Facebook SDK-->

<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0&appId=139238366917004&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<section id="top-nav" class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="left col-sm-6 col-xs-12">
				<ul>
					<li>
						<a href="<?php echo base_url('about/')?>">
							<i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $this->lang->line('about') ?>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('contact/')?>">
							<i class="fa fa-phone" aria-hidden="true"></i> <?php echo $this->lang->line('contact') ?>
						</a>
					</li>
				</ul>
			</div>
			<div class="right col-sm-6 col-xs-12 hidden-xs">
				<ul>
<!--					<li>-->
<!--                        <select name="change_language" class="form-control">-->
<!--                            <option value="vi" --><?php //echo ($lang == 'vi') ? 'selected="selected"' : ''; ?><!-- >Vietnamese</option>-->
<!--                            <option value="en" --><?php //echo ($lang == 'en') ? 'selected="selected"' : ''; ?><!-- >English</option>-->
<!--                        </select>-->
<!--					</li>-->
					<li>
						<a href="" class="change-language" data-language="vi">
							<img src="<?php echo site_url('assets/img/vn@2x.png') ?>" alt="flag Vietnam"> Tiếng Việt
						</a>
					<li>
						<a href="" class="change-language" data-language="en">
							<img src="<?php echo site_url('assets/img/gb@2x.png') ?>" alt="flag GB"> English
						</a>
					</li>
					<li> | </li>
					<li>
						<a href="" target="_blank">
							<i class="fa fa-facebook-square" aria-hidden="true"></i>
						</a>
					</li>
					<li>
						<a href="" target="_blank">
							<i class="fa fa-twitter-square" aria-hidden="true"></i>
						</a>
					</li>
					<li>
						<a href="" target="_blank">
							<i class="fa fa-pinterest-square" aria-hidden="true"></i>
						</a>
					</li>
					<li>
						<a href="" target="_blank">
							<i class="fa fa-linkedin-square" aria-hidden="true"></i>
						</a>
					</li>
					<li>
						<a href="" target="_blank">
							<i class="fa fa-instagram" aria-hidden="true"></i>
						</a>
					</li>
					<li>
						<a href="" target="_blank">
							<i class="fa fa-youtube-square" aria-hidden="true"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<section id="brand" class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="left col-sm-4 col-xs-6">
				<a href="<?php echo base_url('') ?>">
					<img src="<?php echo site_url('assets/img/')?>logo.png" alt="logo Diamond">
				</a>
			</div>
			<div class="right col-sm-8 hidden-xs">
				<ul>
					<li class="outline">
						<i class="fa fa-phone" aria-hidden="true"></i> Hotline <br>
						<a href="tel:0869 770 333">0869 770 333</a>
					</li>
					<li class="outline">
						<i class="fa fa-envelope-o" aria-hidden="true"></i> Email <br>
						<a href="mailto:info@diamondtour.vn">info@diamondtour.vn</a>
					</li>
				</ul>
			</div>
			<div class="btn-expand visible-xs col-xs-6">
				<button class="btn btn-primary" id="btn-expand">
					<i class="fa fa-bars" aria-hidden="false"></i>
				</button>
			</div>
		</div>
	</div>
</section>
<script>
    $("a[class='change-language']").click(function(){
        $.ajax({
            method: "GET",
            url: "http://localhost/tourist1/homepage/change_language",
            data: {
                lang: $(this).data('language')
            },
            success: function(res){
                if(res.message == 'changed'){
                    window.location.reload();
                }
            },
            error: function(){

            }
        });
    });
</script>

<header class="header">
	<div class="container-fluid hidden-xs">
		<div class="container" id="main-nav">
			<ul>
				<li>
					<a href="<?php echo base_url('') ?>">
						<i class="fa fa-home" aria-hidden="true" style="font-size: 1.35em"></i>
					</a>
				</li>
				<li class="menu-list">
					<a href="<?php echo base_url('danh-muc/tour-trong-nuoc') ?>">
						<?php echo $this->lang->line('domestic') ?> <span class="caret"></span>
					</a>
					<a class="right-caret visible-xs" data-toggle="collapse" data-parent="#main-nav-ul" href="#expand-domestic" aria-expanded="true" aria-controls="expand-domestic"><span class="caret"></span></a>
					<ul class="menu-list-expand menu-expand collapse list-unstyled" id="expand-domestic">
						<!----------------------------------------------->
						<!-- DOMESTIC MENU -->
						<!----------------------------------------------->

						<?php
						if($domestic_menu){

							foreach($domestic_menu as $key => $val){
						?>
							<li class="item col-sm-3 col-xs-12">
								<div class="head">
									<a href="<?php echo base_url('danh-muc/'. $val['slug']) ?>" style="margin-bottom: 15px;">
										<h3><?php echo $val['title']; ?></h3>
									</a>
								</div>
								<div class="body">
									<ul class="list-unstyled">
										<li>
											<ul class="list-unstyled">
												<?php
													$sub = $controller->fetch_menu_categories($val['product_category_id']);
													if($sub){
														foreach($sub as $sub_key => $sub_val){
															if($sub_key == 0){
												?>
																<li>
																	<div class="mask hidden-xs">
																		<img src="<?php echo site_url('assets/upload/product_category/' . $sub_val['slug'] . '/' . $sub_val['image']); ?>" alt="image first tour">

																		<a href="<?php echo base_url('danh-muc/' . $sub_val['slug']); ?>"><?php echo $sub_val['title']; ?></a>
																	</div>
																</li>
															<?php } else{ ?>
																<li><a href="<?php echo base_url('danh-muc/' . $sub_val['slug']); ?>"><?php echo $sub_val['title']; ?></a></li>
															<?php } ?>
												<?php
														}
													}
												?>
											</ul>
										</li>
									</ul>
								</div>
							</li>
						<?php
							}
						}
						?>

						<!----------------------------------------------->
						<!-- END DOMESTIC MENU -->
						<!----------------------------------------------->
					</ul>
				</li>
				<li class="menu-tabs">
					<a href="<?php echo base_url('danh-muc/tour-nuoc-ngoai') ?>">
						<?php echo $this->lang->line('international') ?> <span class="caret"></span>
					</a>
					<a class="right-caret visible-xs" href="#"><span class="caret"></span></a>
					<ul class="menu-tabs-expand menu-expand list-unstyled collapse" id="expand-international">
						<!----------------------------------------------->
						<!-- INTERNATIONAL MENU -->
						<!----------------------------------------------->
                        <?php
                        if($international_menu){
                            foreach($international_menu as $key => $val){
                                ?>
								<li>
									<a href="<?php echo base_url('danh-muc/' . $val['slug']); ?>">
                                        <?php echo $val['title']; ?> <span class="glyphicon glyphicon glyphicon-menu-right pull-right" aria-hidden="true"></span>
									</a>
									<ul>
                                        <?php
                                        if($val['product_category_id'] == FIXED_INTERNATIONAL_PILGRIMAGE_CATEGORY_ID){
                                            $sub = $controller->fetch_menu_categories($val['product_category_id']);
                                            foreach($sub as $sub_key => $sub_val){
                                                ?>
												<li>
													<div class="mask">
														<img src="<?php echo site_url('assets/upload/product_category/' . $sub_val['slug'] . '/' . $sub_val['image']); ?>" alt="image example">
													</div>
													<a href="<?php echo base_url('danh-muc/' . $sub_val['slug']); ?>"><?php echo $sub_val['title']; ?></a>
												</li>
                                                <?php
                                            }
                                        }else{
                                            $tours = $controller->receive_category_data($val['product_category_id']);

                                            if($tours)
                                            {
                                                foreach ($tours as $tour_key => $tour)
                                                {
                                                    ?>
													<li>
														<div class="mask">
															<img src="<?php echo site_url('assets/upload/product/' . $tour['slug'] . '/' . $tour['image']); ?>" alt="image example">
														</div>
														<a href="<?php echo base_url('tours/' . $tour['slug']); ?>"><?php echo $tour['title']; ?></a>
														<?php if (!empty($tour['bestselling'])): ?>
															<span class="badge "><i class="fa fa-star" aria-hidden="true"></i> <?php echo $this->lang->line('tour-best-sell-short') ?> </span>
														<?php endif ?>
														<?php if (!empty($tour['hot'])): ?>
															<span class="badge "><i class="fa fa-location-arrow" aria-hidden="true"></i> <?php echo $this->lang->line('tour-hot-short') ?> </span>
														<?php endif ?>
														<?php if (!empty($tour['showpromotion']) && !empty($tour['percen']) && !empty($tour['pricepromotion'])): ?>
															<span class="badge "><i class="fa fa-tags" aria-hidden="true"></i> <?php echo $this->lang->line('tour-discount-short') ?> </span>
														<?php endif ?>
													</li>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
									</ul>
								</li>
                                <?php
                            }
                        }
                        ?>
						<!----------------------------------------------->
						<!-- END INTERNATIONAL MENU -->
						<!----------------------------------------------->
					</ul>
				</li>
				<li>
					<a href="<?php echo base_url('danh-muc/tour-dac-biet'); ?>">
						<?php echo $this->lang->line('special-tours') ?>
					</a>
				</li>
				<li class="menu-list">
					<a href="<?php echo base_url('chuyen-muc/'.$mice_menu['slug']) ?>">
						<?php echo $this->lang->line('mice') ?> <span class="caret"></span>
					</a>
					<a class="right-caret visible-xs" data-toggle="collapse" data-parent="#main-nav-ul" href="#expand-domestic" aria-expanded="true" aria-controls="expand-domestic"><span class="caret"></span></a>
					<ul class="menu-list-expand menu-expand collapse list-unstyled" id="expand-domestic">
						<!----------------------------------------------->
						<!-- DOMESTIC MENU -->
						<!----------------------------------------------->

						<?php
						if(!empty($mice_menu['sub'])){
							foreach($mice_menu['sub'] as $key => $val){
						?>
							<li class="item col-sm-3 col-xs-12">
								<div class="head">
									<a href="<?php echo base_url('chuyen-muc/'. $val['slug']) ?>" style="margin-bottom: 15px;">
										<h3><?php echo $val['title']; ?></h3>
									</a>
								</div>
								<div class="body">
									<div class="mask hidden-xs" style="width: 100%;height: 200px;overflow: hidden;position: relative;">
										<img src="<?php echo site_url('assets/upload/post_category/' . $val['image']); ?>" alt="image first tour">
									</div>
								</div>
							</li>
						<?php
							}
						}
						?>
					</ul>
				</li>
				<li class="menu-dropdown">
					<a href="<?php echo base_url('chuyen-muc/dich-vu') ?>" class="nav-link">
						<?php echo $this->lang->line('services') ?> <span class="caret hidden-xs"></span>
					</a>
					<a class="right-caret visible-xs" href="#"><span class="caret"></span></a>
                    <ul class="menu-dropdown-expand menu-expand collapse" id="expand-services">
						<div class="row">
	                    	<?php
							if(!empty($service_menu['sub'])){
								foreach($service_menu['sub'] as $key => $val){
							?>
								<li class="media col-sm-6 col-xs-12">
									<div class="media-left">
										<div class="mask">
											<img class="media-object" src="<?php echo site_url('assets/upload/post_category/' . $val['image']); ?>" alt="service hotel">
										</div>
									</div>
									<div class="media-body">
										<a href="<?php echo base_url('chuyen-muc/'.$val['slug']); ?>">
											<h3 class="media-heading"><?php echo $val['title'] ?></h3>
										</a>
										<p><?php echo $val['content'] ?></p>
										<a href="<?php echo base_url('chuyen-muc/'.$val['slug']); ?>" class="btn btn-primary" role="button">
											<?php echo $this->lang->line('explore') ?>
										</a>
									</div>
								</li>
							<?php
								}
							}
							?>
						</div>
                    </ul>
				</li>
				<li class="menu-dropdown">
					<a href="<?php echo base_url('chuyen-muc/visa') ?>" class="nav-link">
						<?php echo $this->lang->line('visa') ?> <span class="caret hidden-xs"></span>
					</a>
					<a class="right-caret visible-xs" href="#"><span class="caret"></span></a>
					<ul class="menu-dropdown-expand menu-expand collapse" id="expand-visa">
						<div class="row">
	                    	<?php
							if(!empty($visa_menu['sub'])){
								foreach($visa_menu['sub'] as $key => $val){
							?>
								<li class="media col-sm-6 col-xs-12">
									<div class="media-left">
										<div class="mask">
											<img class="media-object" src="<?php echo site_url('assets/upload/post_category/' . $val['image']); ?>" alt="service hotel">
										</div>
									</div>
									<div class="media-body">
										<a href="<?php echo base_url('chuyen-muc/'.$val['slug']); ?>">
											<h3 class="media-heading"><?php echo $val['title'] ?></h3>
										</a>
										<p><?php echo $val['content'] ?></p>
										<a href="<?php echo base_url('chuyen-muc/'.$val['slug']); ?>" class="btn btn-primary" role="button">
	                                        <?php echo $this->lang->line('explore') ?>
										</a>
									</div>
								</li>
							<?php
								}
							}
							?>
						</div>
					</ul>

				</li>
				<li class="menu-dropdown">
					<a href="<?php echo base_url('chuyen-muc/bai-viet') ?>" class="nav-link">
						<?php echo $this->lang->line('blog') ?> <span class="caret hidden-xs"></span>
					</a>
					<a class="right-caret visible-xs" href="#"><span class="caret"></span></a>
					<ul class="menu-dropdown-expand menu-expand collapse" id="expand-blogs">
						<div class="row">
							<li class="media col-sm-4 col-xs-12">
								<div class="media-left">
									<div class="mask">
										<?php 
											if(!empty($location)){
										?>
											<img class="media-object" src="<?php echo site_url('assets/upload/localtion/' . $location[0]['slug'] .'/'. $location[0]['image']); ?>" alt="service hotel">
										<?php 
											}
										?>
									</div>
								</div>
								<div class="media-body">
									<a href="<?php echo base_url('location'); ?>">
										<h3 class="media-heading"><?php echo $this->lang->line('location') ?></h3>
									</a>
									<?php 
										if(!empty($location)){
									?>
										<p><?php echo $location[0]['content'] ?></p>
										<a href="<?php echo base_url('location'); ?>" class="btn btn-primary" role="button">
	                                        <?php echo $this->lang->line('explore') ?>
										</a>
									<?php 
										}
									?>
								</div>
							</li>

	                    	<?php
							if(!empty($blog_menu['sub'])){
								foreach($blog_menu['sub'] as $key => $val){
							?>
								<li class="media col-sm-4 col-xs-12">
									<div class="media-left">
										<div class="mask">
											<img class="media-object" src="<?php echo site_url('assets/upload/post_category/' . $val['image']); ?>" alt="service air tickets">
										</div>
									</div>
									<div class="media-body">
										<a href="<?php echo base_url('chuyen-muc/'.$val['slug']); ?>">
											<h3 class="media-heading"><?php echo $val['title'] ?></h3>
										</a>
										<p><?php echo $val['content']; ?></p>
										<a href="<?php echo base_url('chuyen-muc/'.$val['slug']); ?>" class="btn btn-primary" role="button">
	                                        <?php echo $this->lang->line('explore') ?>
										</a>
									</div>
								</li>
							<?php
								}
							}
							?>
						</div>
					</ul>
				</li>
			</ul>
		</div>
	</div>

	<div class="container-fluid visible-xs">
		<div id="nav-device">
			<div class="head">
				<a href="javascript:void(0);" class="pull-right" id="nav-close">
					<i class="fa fa-close fa-2x" aria-hidden="false"></i>
				</a>
			</div>
			<div class="body">
				<div class="panel-group" id="main-nav-side" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="homepage">
							<h4 class="panel-title">
								<a href="<?php echo site_url('') ?>" role="button">
									<i class="fa fa-home" aria-hidden="true"></i> <?php echo $this->lang->line('home') ?>
								</a>
							</h4>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="expand-domestic-heading">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#main-nav-side" href="#domestic" aria-expanded="true" aria-controls="expand-domestic-heading">
                                    <?php echo $this->lang->line('domestic') ?> <span class="caret"></span>
								</a>
							</h4>
						</div>
						<div id="domestic" class="panel-collapse collapse" role="tabpanel" aria-labelledby="expand-domestic-heading">
							<div class="panel-body">
								<ul>
									<?php
									if($domestic_menu){

									foreach($domestic_menu as $key => $val){
									?>
									<li>
										<a href="<?php echo base_url('danh-muc/'.$val['slug']); ?>">
											<h3><?php echo $val['title']; ?></h3>
										</a>
									</li>
										<?php
									}
									}
									?>
								</ul>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="expand-international-heading">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#main-nav-side" href="#international" aria-expanded="false" aria-controls="expand-international-heading">
                                    <?php echo $this->lang->line('international') ?> <span class="caret"></span>
								</a>
							</h4>
						</div>
						<div id="international" class="panel-collapse collapse" role="tabpanel" aria-labelledby="expand-international-heading">
							<div class="panel-body">
								<ul>
                                    <?php
                                    if($international_menu){
                                        foreach($international_menu as $key => $val){
                                            ?>
											<li>
												<a href="<?php echo base_url('danh-muc/'.$val['slug']); ?>" >
													<h3><?php echo $val['title']; ?></h3>
												</a>
											</li>
                                            <?php
                                        }
                                    }
                                    ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="expand-mice-heading">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#main-nav-side" href="#mice" aria-expanded="true" aria-controls="expand-mice-heading">
                                    <?php echo $mice_menu['post_category_title'] ?> <span class="caret"></span>
								</a>
							</h4>
						</div>
						<div id="mice" class="panel-collapse collapse" role="tabpanel" aria-labelledby="expand-mice-heading">
							<div class="panel-body">
								<ul>
									<?php
									if($mice_menu['sub']){

									foreach($mice_menu['sub'] as $key => $val){
									?>
									<li>
										<a href="<?php echo base_url('chuyen-muc/'.$val['slug']); ?>">
											<h3><?php echo $val['title']; ?></h3>
										</a>
									</li>
										<?php
									}
									}
									?>
								</ul>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="expand-service-heading">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#main-nav-side" href="#service" aria-expanded="true" aria-controls="expand-service-heading">
                                    <?php echo $service_menu['post_category_title'] ?> <span class="caret"></span>
								</a>
							</h4>
						</div>
						<div id="service" class="panel-collapse collapse" role="tabpanel" aria-labelledby="expand-service-heading">
							<div class="panel-body">
								<ul>
									<?php
									if($service_menu['sub']){

									foreach($service_menu['sub'] as $key => $val){
									?>
									<li>
										<a href="<?php echo base_url('chuyen-muc/'.$val['slug']); ?>">
											<h3><?php echo $val['title']; ?></h3>
										</a>
									</li>
										<?php
									}
									}
									?>
								</ul>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="expand-visa-heading">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#main-nav-side" href="#visa" aria-expanded="true" aria-controls="expand-visa-heading">
                                    <?php echo $visa_menu['post_category_title'] ?> <span class="caret"></span>
								</a>
							</h4>
						</div>
						<div id="visa" class="panel-collapse collapse" role="tabpanel" aria-labelledby="expand-visa-heading">
							<div class="panel-body">
								<ul>
									<?php
									if($visa_menu['sub']){

									foreach($visa_menu['sub'] as $key => $val){
									?>
										<li>
											<a href="<?php echo base_url('chuyen-muc/'.$val['slug']); ?>">
												<h3><?php echo $val['title']; ?></h3>
											</a>
										</li>
									<?php
										}
										}
									?>
								</ul>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="expand-blogs-heading">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#main-nav-side" href="#blogs" aria-expanded="true" aria-controls="expand-blogs-heading">
                                    <?php echo $this->lang->line('blog') ?> <span class="caret"></span>
								</a>
							</h4>
						</div>
						<div id="blogs" class="panel-collapse collapse" role="tabpanel" aria-labelledby="expand-blogs-heading">
							<div class="panel-body">
								<ul>
									<li>
										<a href="<?php echo base_url('chuyen-muc/diem-den'); ?>">
											<h3><?php echo $this->lang->line('location') ?></h3>
										</a>
									</li>
									<?php
									if($blog_menu['sub']){

									foreach($blog_menu['sub'] as $key => $val){
									?>
										<li>
											<a href="<?php echo base_url('chuyen-muc/'.$val['slug']); ?>">
												<h3><?php echo $val['title']; ?></h3>
											</a>
										</li>
									<?php
										}
										}
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="foot">
				<ul>
					<li>
						<a href="" class="change-language" data-language="vi">
							<img src="<?php echo site_url('assets/img/vn@2x.png') ?>" alt="flag Vietnam"> Tiếng Việt
					</a>
					<li>
						<a href="" class="change-language" data-language="en">
							<img src="<?php echo site_url('assets/img/gb@2x.png') ?>" alt="flag GB"> English
						</a>
					</li>
				</ul>
				<ul>
					<li>
						<label>
							<i class="fa fa-phone" aria-hidden="true"></i> Hotline <br>
						</label>
						<h3>
							<a href="tel:0869 770 333">0869 770 333</a>
						</h3>
					</li>
					<li>
						<label>
							<i class="fa fa-envelope-o" aria-hidden="true"></i> Email <br>
						</label>
						<h3>
							<a href="mailto: info@diamondtour.vn">info@diamondtour.vn</a>
						</h3>
					</li>
				</ul>
			</div>
		</div>
	</div>

</header>

<section class="main-page">








