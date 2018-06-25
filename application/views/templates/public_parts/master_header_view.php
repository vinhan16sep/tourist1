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


</head>

<body>

<section id="top-nav" class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="left col-sm-6 col-xs-12">
				<ul>
					<li>
						<a href=""><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $this->lang->line('about') ?></a>
					</li>
					<li>
						<a href=""><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $this->lang->line('contact') ?></a>
					</li>
				</ul>
			</div>
			<div class="right col-sm-6 col-xs-12">
				<ul>
					<li>
                        <select name="change_language" class="form-control">
                            <option value="vi" <?php echo ($lang == 'vi') ? 'selected="selected"' : ''; ?> >Vietnamese</option>
                            <option value="en" <?php echo ($lang == 'en') ? 'selected="selected"' : ''; ?> >English</option>
                        </select>
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
						<a href="tel:(024) 1234 5678">(024) 1234 5678</a>
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
    $("select[name='change_language']").change(function(){
        $.ajax({
            method: "GET",
            url: "http://localhost/tourist1/homepage/change_language",
            data: {
                lang: $(this).val()
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
	<div class="container-fluid">
		<div class="container" id="main-nav">
			<ul>
				<li>
					<a href="<?php echo base_url('') ?>">
						<i class="fa fa-home" aria-hidden="true"></i>
					</a>
				</li>
				<li class="menu-list">
					<a href="<?php echo base_url('') ?>">
						<?php echo $this->lang->line('domestic') ?> <span class="caret"></span>
					</a>
					<div class="menu-list-expand menu-expand">
						<!----------------------------------------------->
						<!-- DOMESTIC MENU -->
						<!----------------------------------------------->
						<div class="row">
							<?php
							if($domestic_menu){

								foreach($domestic_menu as $key => $val){
							?>
								<div class="item col-sm-3 col-xs-12">
									<div class="head">
										<h3><?php echo $val['title']; ?></h3>
									</div>
									<div class="body">
										<ul>
											<li>
												<ul>
													<?php
														$sub = $controller->fetch_menu_categories($val['product_category_id']);
														if($sub){
															foreach($sub as $sub_key => $sub_val){
															    if($sub_key == 0){
													?>
                                                                    <img src="<?php echo site_url('assets/upload/product_category/' . $sub_val['slug'] . '/' . $sub_val['image']); ?>" alt="image first tour">
                                                                    <li><a href="<?php echo base_url('danh-muc/' . $sub_val['slug']); ?>"><?php echo $sub_val['title']; ?></a></li>
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
								</div>
							<?php
								}
							}
							?>
						</div>
						<!----------------------------------------------->
						<!-- END DOMESTIC MENU -->
						<!----------------------------------------------->
					</div>
				</li>
				<li class="menu-tabs">
					<a href="<?php echo base_url('') ?>">
						<?php echo $this->lang->line('international') ?> <span class="caret"></span>
					</a>
					<div class="menu-tabs-expand menu-expand">
						<!----------------------------------------------->
						<!-- INTERNATIONAL MENU -->
						<!----------------------------------------------->
						<div class="row">
							<div class="left col-md-3 col-sm-4 col-xs-12">
								<ul>
									<?php
									if($international_menu){
										foreach($international_menu as $key => $val){
											?>
											<li>
												<?php echo $val['title']; ?> <span
														class="glyphicon glyphicon glyphicon-menu-right pull-right"
														aria-hidden="true"></span>
												<ul>
													<?php
													if($val['product_category_id'] == 27){
														$sub = $controller->fetch_menu_categories($val['product_category_id']);
														foreach($sub as $sub_key => $sub_val){
													?>
														<li>
															<div class="mask">
																<img src="<?php echo site_url('assets/upload/product_category/' . $sub_val['slug'] . '/' . $sub_val['image']); ?>"
																	 alt="image example">
															</div>
															<a href="<?php echo base_url('danh-muc/' . $sub_val['slug']); ?>"><?php echo $sub_val['title']; ?></a>
														</li>
													<?php
														}
													}else{
														$tours = $controller->fetch_tour_by_category($val['product_category_id']);
														foreach($tours as $tour_key => $tour){
															?>
															<li>
																<div class="mask">
																	<img src="<?php echo site_url('assets/upload/product/' . $tour['slug'] . '/' . $tour['image']); ?>"
																		 alt="image example">
																</div>
																<a href="<?php echo base_url('tours/' . $tour['slug']); ?>"><?php echo $tour['title']; ?></a>
															</li>
															<?php
														}
													}
													?>
												</ul>
											</li>
											<?php
										}
									}
									?>
								</ul>
							</div>
						</div>
						<!----------------------------------------------->
						<!-- END INTERNATIONAL MENU -->
						<!----------------------------------------------->

				</li>
				<li>
					<a href="<?php echo base_url('danh-muc/tour-dac-biet'); ?>">
						<?php echo $this->lang->line('special-tours') ?>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);">
						<?php echo $this->lang->line('mice') ?>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);">
						<?php echo $this->lang->line('services') ?>
					</a>
                    <ul>
                        <li><a href="<?php echo base_url('chuyen-muc/khach-san'); ?>"><?php echo $this->lang->line('hotel') ?></a></li>
                        <li><a href="<?php echo base_url('chuyen-muc/ve-may-bay'); ?>"><?php echo $this->lang->line('ticket') ?></a></li>
                    </ul>
				</li>
				<li>
					<a href="javascript:void(0);">
						<?php echo $this->lang->line('visa') ?>
					</a>
                    <ul>
                        <li><a href="<?php echo base_url('chuyen-muc/thu-tuc-xin-visa'); ?>"><?php echo $this->lang->line('visa-procedure') ?></a></li>
                        <li><a href="javascript:void(0);"><?php echo $this->lang->line('registration-form') ?></a></li>
                    </ul>
				</li>
				<li>
					<a href="javascript:void(0);">
						<?php echo $this->lang->line('blog') ?>
					</a>
                    <ul>
                        <li><a href="<?php echo base_url('chuyen-muc/diem-den'); ?>"><?php echo $this->lang->line('location') ?></a></li>
                        <li><a href="<?php echo base_url('chuyen-muc/cam-nang'); ?>"><?php echo $this->lang->line('handbook') ?></a></li>
                        <li><a href="<?php echo base_url('chuyen-muc/nhat-ky'); ?>"><?php echo $this->lang->line('diary') ?></a></li>
                    </ul>
				</li>
			</ul>
		</div>
	</div>

</header>

<section class="main-page">
	<div class="container-fluid">


	</div>







