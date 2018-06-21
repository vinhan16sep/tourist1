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

	<!-- jQuery 3 -->
	<script src="<?php echo site_url('assets/lib/') ?>jquery/jquery.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="<?php echo site_url('assets/lib/') ?>bootstrap/js/bootstrap.min.js"></script>

	<!-- Main Js -->
	<script src="<?php echo site_url('assets/js/') ?>main.js"></script>
	<script src="<?php echo site_url('assets/lib/') ?>jquery/jquery.validate.min.js"></script>
	<!-- Easing JS -->
	<script src="<?php echo site_url('assets/lib/') ?>jquery/jquery.easing.1.3.js"></script>

	<!-- Waypoint Js -->
	<script src="<?php echo site_url('assets/lib/') ?>jquery/jquery.waypoints.min.js"></script>


</head>

<body>

<section id="top-nav" class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="left col-sm-6 col-xs-12">
				<ul class="list-inline">
					<li>
						<a href=""><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $this->lang->line('about') ?></a>
					</li>
					<li>
						<a href=""><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $this->lang->line('contact') ?></a>
					</li>
				</ul>
			</div>
			<div class="right col-sm-6 col-xs-12">
				<ul class="list-inline">
					<li>
						<a href="mailto:info@diamondtour.vn"><i class="fa fa-envelope-o" aria-hidden="true"></i> info@diamondtour.vn</a>
					</li>
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

<section class="main-page">
	<header class="header">
		<div class="container">
			<div class="row">
				<section id="brand" class="col-xs-4">
					<div class="row">
						<div class="left col-sm-6 col-xs-12">
							<a href="<?php echo base_url('') ?>">
								<img src="<?php echo site_url('assets/img/')?>logo-w.png" alt="logo Diamond">
							</a>
						</div>
						<div class="right col-sm-6 col-xs-12">
						</div>
					</div>
				</section>
				<section id="main-nav" class="col-xs-8">
					<ul class="list-inline">
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
								<div class="row">
									<div class="item col-sm-3 col-xs-12">
										<div class="head">
											<h3><?php echo $this->lang->line('pilgrimage') ?></h3>
										</div>
										<div class="body">
											<ul>
												<li>
													<div class="mask">
														<img src="https://images.unsplash.com/photo-1431794062232-2a99a5431c6c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=13b58b0343d8efc06a88c55e843f624f&auto=format&fit=crop&w=1950&q=80" alt="image first tour">
													</div>
													<a href="<?php echo base_url('') ?>">Link bai viet viet dai that la dai nhung ma no chi duoc keo dai den dong thu 2 ma thoi nhe</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="item col-sm-3 col-xs-12">
										<div class="head">
											<h3><?php echo $this->lang->line('northern') ?></h3>
										</div>
										<div class="body">
											<ul>
												<li>
													<div class="mask">
														<img src="https://images.unsplash.com/photo-1431794062232-2a99a5431c6c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=13b58b0343d8efc06a88c55e843f624f&auto=format&fit=crop&w=1950&q=80" alt="image first tour">
													</div>
													<a href="<?php echo base_url('') ?>">Link bai viet viet dai that la dai nhung ma no chi duoc keo dai den dong thu 2 ma thoi nhe</a>
												</li>
												<li><a href="<?php echo base_url('') ?>">Link location</a></li>
											</ul>
										</div>
									</div>
									<div class="item col-sm-3 col-xs-12">
										<div class="head">
											<h3><?php echo $this->lang->line('central') ?></h3>
										</div>
										<div class="body">
											<ul>
												<li>
													<div class="mask">
														<img src="https://images.unsplash.com/photo-1431794062232-2a99a5431c6c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=13b58b0343d8efc06a88c55e843f624f&auto=format&fit=crop&w=1950&q=80" alt="image first tour">
													</div>
													<a href="<?php echo base_url('') ?>">Link bai viet viet dai that la dai nhung ma no chi duoc keo dai den dong thu 2 ma thoi nhe</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="item col-sm-3 col-xs-12">
										<div class="head">
											<h3><?php echo $this->lang->line('southern') ?></h3>
										</div>
										<div class="body">
											<ul>
												<li>
													<div class="mask">
														<img src="https://images.unsplash.com/photo-1431794062232-2a99a5431c6c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=13b58b0343d8efc06a88c55e843f624f&auto=format&fit=crop&w=1950&q=80" alt="image first tour">
													</div>
													<a href="<?php echo base_url('') ?>">Link bai viet viet dai that la dai nhung ma no chi duoc keo dai den dong thu 2 ma thoi nhe</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="menu-tabs">
							<a href="<?php echo base_url('') ?>">
                                <?php echo $this->lang->line('international') ?> <span class="caret"></span>
							</a>
							<div class="menu-tabs-expand menu-expand">
								<div class="row">
									<div class="left col-md-3 col-sm-4 col-xs-12">
										<ul>
                                            <?php for($i = 0; $i <6; $i ++){ ?>
												<li>
													Hanh huong <span class="glyphicon glyphicon glyphicon-menu-right pull-right" aria-hidden="true"></span>
													<ul>
														<li>
															<div class="mask">
																<img src="https://images.unsplash.com/36/xIsiRLngSRWN02yA2BbK_submission-photo-7.jpg?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a6696d473e304cb159beb53554186c77&auto=format&fit=crop&w=1945&q=80" alt="image example">
															</div>
															<a href="<?php echo base_url('') ?>">Link bai viet viet dai that la dai nhung ma no chi duoc keo dai den dong thu 2 ma thoi nhe</a>
														</li>
														<li>
															<div class="mask">
																<img src="https://images.unsplash.com/36/xIsiRLngSRWN02yA2BbK_submission-photo-7.jpg?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a6696d473e304cb159beb53554186c77&auto=format&fit=crop&w=1945&q=80" alt="image example">
															</div>
															<a href="<?php echo base_url('') ?>">Link bai viet viet dai that la dai nhung ma no chi duoc keo dai den dong thu 2 ma thoi nhe</a>
														</li>
														<li>
															<div class="mask">
																<img src="https://images.unsplash.com/36/xIsiRLngSRWN02yA2BbK_submission-photo-7.jpg?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a6696d473e304cb159beb53554186c77&auto=format&fit=crop&w=1945&q=80" alt="image example">
															</div>
															<a href="<?php echo base_url('') ?>">Link bai viet viet dai that la dai nhung ma no chi duoc keo dai den dong thu 2 ma thoi nhe</a>
														</li>
													</ul>
												</li>
                                            <?php } ?>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li>
							<a href="<?php echo base_url('') ?>">
                                <?php echo $this->lang->line('special-tours') ?>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('') ?>">
                                <?php echo $this->lang->line('mice') ?>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('') ?>">
                                <?php echo $this->lang->line('services') ?>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('') ?>">
                                <?php echo $this->lang->line('visa') ?>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('') ?>">
                                <?php echo $this->lang->line('blogs') ?>
							</a>
						</li>
					</ul>

				</section>
			</div>
		</div>
	</header>




