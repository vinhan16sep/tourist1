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

	<!--Favicon-->
	<link rel="shortcut icon" type="image/png" href="<?php echo site_url('assets/img/favicon.png') ?>"/>


</head>

<body>

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
			<div class="right col-sm-6 col-xs-12">
				<ul>
<!--					<li>-->
<!--                        <select name="change_language" class="form-control">-->
<!--                            <option value="vi" --><?php //echo ($lang == 'vi') ? 'selected="selected"' : ''; ?><!-- >Vietnamese</option>-->
<!--                            <option value="en" --><?php //echo ($lang == 'en') ? 'selected="selected"' : ''; ?><!-- >English</option>-->
<!--                        </select>-->
<!--					</li>-->
					<li>
						<a href="" class="change-language" data-language="vi">
							<img src="<?php echo site_url('assets/img/vn@2x.png') ?>" alt="flag Vietnam"> Tiếng Việt</li>
						</a>
					<li>
						<a href="" class="change-language" data-language="en">
							<img src="<?php echo site_url('assets/img/gb@2x.png') ?>" alt="flag GB"> English</li>
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
	<div class="container-fluid">
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
																	<li>
																		<div class="mask">
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
					<a href="<?php echo base_url('danh-muc/tour-nuoc-ngoai') ?>">
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
												<a href="<?php echo base_url('danh-muc/' . $val['slug']); ?>">
													<?php echo $val['title']; ?>
													<span class="glyphicon glyphicon glyphicon-menu-right pull-right"
														aria-hidden="true"></span>
												</a>
												<ul>
													<?php
													if($val['product_category_id'] == FIXED_INTERNATIONAL_PILGRIMAGE_CATEGORY_ID){
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
														$tours = $controller->receive_category_data($val['product_category_id']);

                                                        if($tours)
                                                        {
                                                            foreach ($tours as $tour_key => $tour)
                                                            {
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
				<li class="menu-dropdown">
					<a href="javascript:void(0);">
						<?php echo $this->lang->line('services') ?> <span class="caret">
					</a>
                    <div class="menu-dropdown-expand menu-expand">
						<div class="row">
							<div class="media col-sm-6 col-xs-12">
								<div class="media-left">
									<div class="mask">
										<img class="media-object" src="https://images.unsplash.com/photo-1524932563317-9962c267d8bd?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=72b9dca407a53486feee28d0905f3227&auto=format&fit=crop&w=1000&q=80" alt="service hotel">
									</div>
								</div>
								<div class="media-body">
									<a href="<?php echo base_url('chuyen-muc/khach-san'); ?>">
										<h3 class="media-heading"><?php echo $this->lang->line('hotel') ?></h3>
									</a>
									<p>Aenean porttitor diam non orci viverra, ut gravida justo mattis. Phasellus mollis leo vitae mi consectetur, eget ultrices metus aliquam. Sed consectetur dui lectus, eget dignissim ipsum feugiat eu. In consectetur tortor nec interdum posuere. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus auctor eros arcu, ac accumsan justo semper nec. Aliquam imperdiet lorem dolor, eu porta velit convallis maximus.</p>
									<a href="<?php echo base_url('chuyen-muc/khach-san'); ?>" class="btn btn-primary" role="button">
										<?php echo $this->lang->line('explore') ?>
									</a>
								</div>
							</div>
							<div class="media col-sm-6 col-xs-12">
								<div class="media-left">
									<div class="mask">
										<img class="media-object" src="https://images.unsplash.com/photo-1454496406107-dc34337da8d6?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=1eba6d2e11ba9969b93d137aa42ae851&auto=format&fit=crop&w=2326&q=80" alt="service air tickets">
									</div>
								</div>
								<div class="media-body">
									<a href="<?php echo base_url('chuyen-muc/ve-may-bay'); ?>">
										<h3 class="media-heading"><?php echo $this->lang->line('ticket') ?></h3>
									</a>
									<p>Aenean porttitor diam non orci viverra, ut gravida justo mattis. Phasellus mollis leo vitae mi consectetur, eget ultrices metus aliquam. Sed consectetur dui lectus, eget dignissim ipsum feugiat eu. In consectetur tortor nec interdum posuere. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus auctor eros arcu, ac accumsan justo semper nec. Aliquam imperdiet lorem dolor, eu porta velit convallis maximus.</p>
									<a href="<?php echo base_url('chuyen-muc/ve-may-bay'); ?>" class="btn btn-primary" role="button">
                                        <?php echo $this->lang->line('explore') ?>
									</a>
								</div>
							</div>
						</div>
                    </div>
				</li>
				<li class="menu-dropdown">
					<a href="javascript:void(0);">
						<?php echo $this->lang->line('visa') ?> <span class="caret">
					</a>
					<div class="menu-dropdown-expand menu-expand">
						<div class="row">
							<div class="media col-sm-6 col-xs-12">
								<div class="media-left">
									<div class="mask">
										<img class="media-object" src="https://images.unsplash.com/photo-1524932563317-9962c267d8bd?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=72b9dca407a53486feee28d0905f3227&auto=format&fit=crop&w=1000&q=80" alt="service hotel">
									</div>
								</div>
								<div class="media-body">
									<a href="<?php echo base_url('chuyen-muc/thu-tuc-xin-visa'); ?>">
										<h3 class="media-heading"><?php echo $this->lang->line('visa-procedure') ?></h3>
									</a>
									<p>Aenean porttitor diam non orci viverra, ut gravida justo mattis. Phasellus mollis leo vitae mi consectetur, eget ultrices metus aliquam. Sed consectetur dui lectus, eget dignissim ipsum feugiat eu. In consectetur tortor nec interdum posuere. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus auctor eros arcu, ac accumsan justo semper nec. Aliquam imperdiet lorem dolor, eu porta velit convallis maximus.</p>
									<a href="<?php echo base_url('chuyen-muc/thu-tuc-xin-visa'); ?>" class="btn btn-primary" role="button">
                                        <?php echo $this->lang->line('explore') ?>
									</a>
								</div>
							</div>
							<div class="media col-sm-6 col-xs-12">
								<div class="media-left">
									<div class="mask">
										<img class="media-object" src="https://images.unsplash.com/photo-1454496406107-dc34337da8d6?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=1eba6d2e11ba9969b93d137aa42ae851&auto=format&fit=crop&w=2326&q=80" alt="service air tickets">
									</div>
								</div>
								<div class="media-body">
									<a href="javascript:void(0);">
										<h3 class="media-heading"><?php echo $this->lang->line('registration-form') ?></h3>
									</a>
									<p>Aenean porttitor diam non orci viverra, ut gravida justo mattis. Phasellus mollis leo vitae mi consectetur, eget ultrices metus aliquam. Sed consectetur dui lectus, eget dignissim ipsum feugiat eu. In consectetur tortor nec interdum posuere. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus auctor eros arcu, ac accumsan justo semper nec. Aliquam imperdiet lorem dolor, eu porta velit convallis maximus.</p>
									<a href="javascript:void(0);" class="btn btn-primary" role="button">
                                        <?php echo $this->lang->line('explore') ?>
									</a>
								</div>
							</div>
						</div>
					</div>

				</li>
				<li class="menu-dropdown">
					<a href="javascript:void(0);">
						<?php echo $this->lang->line('blog') ?> <span class="caret">
					</a>
					<div class="menu-dropdown-expand menu-expand">
						<div class="row">
							<div class="media col-sm-4 col-xs-12" style="margin-top: 15px">
								<div class="media-left">
									<div class="mask">
										<img class="media-object" src="https://images.unsplash.com/photo-1524932563317-9962c267d8bd?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=72b9dca407a53486feee28d0905f3227&auto=format&fit=crop&w=1000&q=80" alt="service hotel">
									</div>
								</div>
								<div class="media-body">
									<a href="<?php echo base_url('chuyen-muc/diem-den'); ?>">
										<h3 class="media-heading"><?php echo $this->lang->line('location') ?></h3>
									</a>
									<p>Aenean porttitor diam non orci viverra, ut gravida justo mattis. Phasellus mollis leo vitae mi consectetur, eget ultrices metus aliquam. Sed consectetur dui lectus, eget dignissim ipsum feugiat eu. In consectetur tortor nec interdum posuere. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus auctor eros arcu, ac accumsan justo semper nec. Aliquam imperdiet lorem dolor, eu porta velit convallis maximus.</p>
									<a href="<?php echo base_url('chuyen-muc/diem-den'); ?>" class="btn btn-primary" role="button">
                                        <?php echo $this->lang->line('explore') ?>
									</a>
								</div>
							</div>
							<div class="media col-sm-4 col-xs-12">
								<div class="media-left">
									<div class="mask">
										<img class="media-object" src="https://images.unsplash.com/photo-1454496406107-dc34337da8d6?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=1eba6d2e11ba9969b93d137aa42ae851&auto=format&fit=crop&w=2326&q=80" alt="service air tickets">
									</div>
								</div>
								<div class="media-body">
									<a href="<?php echo base_url('chuyen-muc/cam-nang'); ?>">
										<h3 class="media-heading"><?php echo $this->lang->line('handbook') ?></h3>
									</a>
									<p>Aenean porttitor diam non orci viverra, ut gravida justo mattis. Phasellus mollis leo vitae mi consectetur, eget ultrices metus aliquam. Sed consectetur dui lectus, eget dignissim ipsum feugiat eu. In consectetur tortor nec interdum posuere. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus auctor eros arcu, ac accumsan justo semper nec. Aliquam imperdiet lorem dolor, eu porta velit convallis maximus.</p>
									<a href="<?php echo base_url('chuyen-muc/cam-nang'); ?>" class="btn btn-primary" role="button">
                                        <?php echo $this->lang->line('explore') ?>
									</a>
								</div>
							</div>
							<div class="media col-sm-4 col-xs-12">
								<div class="media-left">
									<div class="mask">
										<img class="media-object" src="https://images.unsplash.com/photo-1454496406107-dc34337da8d6?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=1eba6d2e11ba9969b93d137aa42ae851&auto=format&fit=crop&w=2326&q=80" alt="service air tickets">
									</div>
								</div>
								<div class="media-body">
									<a href="<?php echo base_url('chuyen-muc/nhat-ky'); ?>">
										<h3 class="media-heading"><?php echo $this->lang->line('diary') ?></h3>
									</a>
									<p>Aenean porttitor diam non orci viverra, ut gravida justo mattis. Phasellus mollis leo vitae mi consectetur, eget ultrices metus aliquam. Sed consectetur dui lectus, eget dignissim ipsum feugiat eu. In consectetur tortor nec interdum posuere. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus auctor eros arcu, ac accumsan justo semper nec. Aliquam imperdiet lorem dolor, eu porta velit convallis maximus.</p>
									<a href="<?php echo base_url('chuyen-muc/nhat-ky'); ?>" class="btn btn-primary" role="button">
                                        <?php echo $this->lang->line('explore') ?>
									</a>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>

</header>

<section class="main-page">








