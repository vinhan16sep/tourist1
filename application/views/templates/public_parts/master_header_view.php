<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>myIELTS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>fontAwesome/css/font-awesome.min.css">


    <!-- Google Font -->
    <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,700,700i" rel="stylesheet">

	<!-- animate CSS -->
	<link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>animate/animate.min.css">
	<!-- icomoon CSS -->
	<link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>icomoon/icomoon.min.css">
	<!-- flexslider CSS -->
	<link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>flexslider/css/flexslider.min.css">

	<!-- Main Stylesheet
	<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>main.css"> -->

	<!-- jQuery 3 -->
	<script src="<?php echo site_url('assets/lib/') ?>jquery/jquery.min.js"></script>

	<!-- Main Js -->
	<script src="<?php echo site_url('assets/js/') ?>main.js"></script>
	<script src="<?php echo site_url('assets/lib/') ?>jquery/jquery.validate.min.js"></script>
	<!-- Easing JS -->
	<script src="<?php echo site_url('assets/lib/') ?>jquery/jquery.easing.1.3.js"></script>
	<!-- Bootstrap JS -->
	<script src="<?php echo site_url('assets/lib/') ?>bootstrap/js/bootstrap.min.js"></script>
	<!-- Waypoint Js -->
	<script src="<?php echo site_url('assets/lib/') ?>jquery/jquery.waypoints.min.js"></script>
	<!-- Stellar Js -->
	<!-- <script src="<?php echo site_url('assets/lib/') ?>jquery/jquery.stellar.min.js"></script> -->
	<!-- Stellar Js -->
	<script src="<?php echo site_url('assets/lib/') ?>flexslider/js/jquery.flexslider-min.js"></script>

</head>

<body>

<div class="fh5co-loader"></div>

<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<!-- <div class="top-menu"> -->
		<div class="container">
			<div class="row">
				<div class="col-xs-12 text-center logo-wrap">
					<div id="fh5co-logo">
						<a href="<?php echo base_url('') ?>">
							<img src="<?php echo site_url('assets/img/logo.png')?>" alt="logo">
						</a>
					</div>
				</div>
				<div class="col-xs-12 text-center menu-1 menu-wrap">
					<?php
						$url_vi = '';
						$url_en = '';
						switch($current_link){
							case 'homepage':
								$url_vi = base_url() . 'vi';
								$url_en = base_url() . 'en';
								break;
							case 'about':
								$url_vi = base_url() . 'vi/about';
								$url_en = base_url() . 'en/about';
								break;
							case 'courses':
								$url_vi = base_url() . 'vi/courses';
								$url_en = base_url() . 'en/courses';
								break;
							case 'detail_courses':
								$url_vi = base_url() . 'vi/courses/detail/'. $current_slug;
								$url_en = base_url() . 'en/courses/detail/'. $current_slug;
								break;
							case 'document':
								$url_vi = base_url() . 'vi/document';
								$url_en = base_url() . 'en/document';
								break;
							case 'detail_document':
								$url_vi = base_url() . 'vi/document/detail/'. $current_slug;
								$url_en = base_url() . 'en/document/detail/'. $current_slug;
								break;
							case 'blogs':
								$url_vi = base_url() . 'vi/blogs';
								$url_en = base_url() . 'en/blogs';
								break;
							case 'detail_blogs':
								$url_vi = base_url() . 'vi/blogs/detail/'. $current_slug;
								$url_en = base_url() . 'en/blogs/detail/'. $current_slug;
								break;
							case 'contact':
								$url_vi = base_url() . 'vi/contact';
								$url_en = base_url() . 'en/contact';
								break;
							case 'landing':
								$url_vi = base_url() . 'vi/landing';
								$url_en = base_url() . 'en/landing';
								break;
							default:
								$url_vi = base_url() . 'vi';
								$url_en = base_url() . 'en';
								break;
						}
					?>

					<ul>
						<li>
							<a href="<?php echo base_url('homepage') ?>"><?php echo $this->lang->line('homepage'); ?></a>
						</li>
						<li>
							<a href="<?php echo base_url('about') ?>"><?php echo $this->lang->line('about'); ?></a>
						</li>
						<li>
							<a href="<?php echo base_url('courses') ?>"><?php echo $this->lang->line('courses'); ?></a>
						</li>
						<li>
							<a href="<?php echo base_url('document') ?>"><?php echo $this->lang->line('document'); ?></a>
						</li>
						<li>
							<a href="<?php echo base_url('blogs') ?>"><?php echo $this->lang->line('blogs'); ?></a>
						</li>
						<li>
							<a href="<?php echo base_url('contact') ?>"><?php echo $this->lang->line('contact'); ?></a>
						</li>
						<!--
						<li>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#register">Register</button>
						</li>
						-->
					</ul>
					

					<ul>
						<li>
							<a href="<?php echo $url_vi; ?>">Vi</a>
						</li>
						<li> | </li>
						<li>
							<a href="<?php echo $url_en; ?>">En</a>
						</li>
					</ul>
				</div>
			</div>

		</div>
		<!-- </div> -->
	</nav>

