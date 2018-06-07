<!DOCTYPE html>
<html>
<head>
    <title>
        myIELTS
    </title>
    <meta charset="utf-8">
    <!--CSS-->

    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>fontAwesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>landing.min.css">
    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>animate/animate.min.css">
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,700,700i" rel="stylesheet">
</head>
<body>
<header class="header" id="HOME">
    <!-- Navigation -->

    <nav class="navbar navbar-default navbar-fixed-top">


        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#loso-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <!-- small size logo -->
					<img src="<?php echo site_url('assets/img/logo.png')?>" alt="logo">

                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="loso-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#HOME" class="nav-item">HOME</a></li>
                    <li><a href="#about" class="nav-item">ABOUT</a></li>
                    <li><a href="#performers" class="nav-item">PERFORMERS</a></li>
                    <li><a href="#timeline" class="nav-item">TIMELINE</a></li>
                    <li><a href="#numbers" class="nav-item">NUMBERS</a></li>
                    <li><a href="#landing-us" class="nav-item">landing</a></li>
                </ul>


            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>



    <div class="header-overlay" style="background-image: url('http://www.lifeoftrends.com/wp-content/uploads/2017/08/InspiredStudents.jpg');">
		<div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--Logo-->
                    <div class="logo text-center">
						<img src="<?php echo site_url('assets/img/logo.png')?>" alt="logo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 wow bounceIn">
                        <div class="header-text">
                            <h1>Old Is Gold</h1>
                            <p>Simple , Clear and Responsive theme for biking sport to help to re-generate it again!</p>
                        </div>
                        <div class="header-btns">
                            <a href="#about">
                                <i class="fa fa-angle-down wow bounceInUp"></i>
                            </a>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="<?php echo site_url('assets/img/book.png') ?>" alt="book image">
                    </div>
                </div>
            </div>
            <div class="row"></div>
        </div>
    </div>
</header>
<!--Section About-->
<section id="about">

    <div class="section-about">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow bounceIn">
                    <h2 class="section-title">About This Book</h2>
                    <p class="under-heading">Take A Look at some Features</p>
                </div>
            </div>
        </div>
        <div class="section-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 wow fadeInLeft">

                        <a href=""><i class="fa fa-star fa-5x square"></i></a>
                        <h3 class="heading">Featured #1</h3>
                        <p class="col-caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas delectus excepturi non modi quo iusto aut in nisi, esse provident!</p>
                    </div>

                    <div class="col-md-4 wow fadeInUp">

                        <a href=""><i class="fa fa-star fa-5x"></i></a>
                        <h3 class="heading">Featured #2</h3>
                        <p class="col-caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas delectus excepturi non modi quo iusto aut in nisi, esse provident!</p>

                    </div>

                    <div class="col-md-4 wow fadeInRight">

                        <a href=""><i class="fa fa-star fa-5x"></i></a>
                        <h3 class="heading">Featured #3</h3>
                        <p class="col-caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas delectus excepturi non modi quo iusto aut in nisi, esse provident!</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section><!--end of about section-->

<!--Performers Section-->
<!--
<section class="performer-section" id="performers">
    <div class="performer wow flipInY">
        <div class="performer-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <h2 class="section-title">Top Performers</h2>

                    </div>
                </div>
            </div>
            <div class="section-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="carousel-performer" class="carousel slide" data-ride="carousel">

                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-performer" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-performer" data-slide-to="1"></li>
                                    <li data-target="#carousel-performer" data-slide-to="2"></li>
                                </ol>

                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <img src="../bicycling/images/avatar_01.jpg" alt="Client01">
                                        <div class="performer-caption">
                                            <h2>Masue Jo <span class="job"> Senior </span></h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid facere vero amet quaerat eos quia. Nulla veritatis reprehenderit molestiae aperiam, </p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="../bicycling/images/avatar_02.jpg" alt="Client02">
                                        <div class="performer-caption">
                                            <h2>George eado<span class="job"> Junior </span></h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid facere vero amet quaerat eos quia. Nulla veritatis reprehenderit molestiae aperiam, </p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="../bicycling/images/avatar_03.jpg" alt="Client03">
                                        <div class="performer-caption">
                                            <h2>Gerarde Jo <span class="job"> District Manager</span></h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid facere vero amet quaerat eos quia. Nulla veritatis reprehenderit molestiae aperiam, </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--End of Performers-->
<section class="why-us" id="timeline">
    <div class="section-timeline">
        <div class="container">
            <h2 class="heading"><span class="bold-green"> Why should I buy this Book?</span></h2>
            <p class="lead under-heading text-center">Look at the reasons</p>
            <ul class="timeline">
                <li>
                    <div class="timeline-badge"><span class="counteryear">1</span></div>
                    <div class="timeline-panal wow bounceIn">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">Reason <span class="blue-underline"> #1</span> </h4>
                        </div>
                        <div class="timeline-body"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor aliquam fugiat excepturi neque est modi ex dolores eaque esse optio commodi, animi similique ut iure nesciunt consectetur sed eos ad.</p></div>
                    </div><!--end of timeline panel-->
                </li>

                <li class="timeline-inverted">
                    <div class="timeline-badge"><span class="counteryear">2</span></div>
                    <div class="timeline-panal  wow bounceIn">
                        <div class="timeline-heading">
							<h4 class="timeline-title">Reason <span class="blue-underline"> #2</span> </h4>
                        </div>
                        <div class="timeline-body"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor aliquam fugiat excepturi neque est modi ex dolores eaque esse optio commodi, animi similique ut iure nesciunt consectetur sed eos ad.</p></div>
                    </div><!--end of timeline panel-->
                </li>

                <li>
                    <div class="timeline-badge"><span class="counteryear">3</span></div>
                    <div class="timeline-panal wow bounceIn">
                        <div class="timeline-heading">
							<h4 class="timeline-title">Reason <span class="blue-underline"> #3</span> </h4>
                        </div>
                        <div class="timeline-body"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor aliquam fugiat excepturi neque est modi ex dolores eaque esse optio commodi, animi similique ut iure nesciunt consectetur sed eos ad.</p></div>
                    </div><!--end of timeline panel-->
                </li>
            </ul>


        </div>
    </div>
</section><!--end of timeline-->
<section id="numbers">
    <div class="numbers-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title">Number Counting</h2>
                    <p class="under-heading">Review our Numbers</p>
                </div>
            </div>
        </div>
        <div class="section-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="num-data block-inline">
                            <i class="fa fa-user-circle-o fa-5x"></i>
                            <div class="counter">1000</div>
                            <p>Number 01</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="num-data block-inline">
                            <i class="fa fa-user-circle-o fa-5x"></i>
                            <div class="counter">100</div>
                            <p>Number 02</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="num-data block-inline">
                            <i class="fa fa-user-circle-o fa-5x"></i>
                            <div class="counter">1000</div>
                            <p>Number 03</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="num-data block-inline">
                            <i class="fa fa-user-circle-o fa-5x"></i>
                            <div class="counter">100</div>
                            <p>Number 04</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="landing-us">
    <div class="landing-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow slideInLeft">
                    <h2 class="section-title">Register to Get One</h2>
                    <p class="under-heading">Feel Free to text us</p>
                </div>
            </div>
        </div>
        <div class="section-wrapper">
            <div class="container">
                <?php
                    echo form_open_multipart('', array('class' => 'form-horizontal'));
                ?>
                    <div class="row">
                        <div class="col-md-6 wow slideInRight">
                            <div class="form-group">
                                <?php
                                echo form_label($this->lang->line('contact-name') .' (*)', 'landing_name');
                                echo form_error('landing_name');
                                echo form_input('landing_name', set_value('landing_name'), 'class="form-control input-lg"');
                                ?>
                            </div>
                            <div class="form-group">
                                <?php
                                echo form_label($this->lang->line('contact-mail') .' (*)', 'landing_mail');
                                echo form_error('landing_mail');
                                echo form_input('landing_mail', set_value('landing_mail'), 'class="form-control input-lg"');
                                ?>
                            </div>
                            <div class="form-group">
                                <?php
                                echo form_label($this->lang->line('contact-phone') .' (*)', 'landing_phone');
                                echo form_error('landing_phone');
                                echo form_input('landing_phone', set_value('landing_phone'), 'class="form-control input-lg"');
                                ?>
                            </div>

                        </div>
                        <div class="col-md-6 wow bounceInRight">
                            <div class="form-group">
                                <?php
                                echo form_label($this->lang->line('contact-message'), 'landing_message');
                                echo form_error('landing_message');
                                echo form_textarea('landing_message', set_value('landing_message'), 'class="form-control input-lg"');
                                ?>
                            </div>
                            <?php echo form_submit('submit', $this->lang->line('contact-send'), 'class="btn btn-primary btn-block input-lg btn-landing-send"'); ?>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="social-icons wow slideInDown">
                            <ul class="list-unstyled">
								<li><a href="https://www.facebook.com/myielts.edu.vn/" target="_blank"><i class="icon-facebook2"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="footer">
    <div class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="footer-text" >Copyright <span class="copyright"> &copy;</span>2018</p>
                </div>
                <div class="col-md-6">
                    <p class="footer-text">myIELTS</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="loading-overlay">
    <div class="sk-cube-grid">
        <div class="sk-cube sk-cube1"></div>
        <div class="sk-cube sk-cube2"></div>
        <div class="sk-cube sk-cube3"></div>
        <div class="sk-cube sk-cube4"></div>
        <div class="sk-cube sk-cube5"></div>
        <div class="sk-cube sk-cube6"></div>
        <div class="sk-cube sk-cube7"></div>
        <div class="sk-cube sk-cube8"></div>
        <div class="sk-cube sk-cube9"></div>
    </div>
</section>



<script src="<?php echo site_url('assets/lib/') ?>jquery/jquery.min.js"></script>
<script src="<?php echo site_url('assets/lib/') ?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo site_url('assets/') ?>js/plugins.js"></script>
<script src="<?php echo site_url('assets/') ?>js/jquery.counterup.min.js"></script>
<script src="<?php echo site_url('assets/') ?>js/jquery.waypoints.min.js"></script>
<script src="<?php echo site_url('assets/') ?>js/jquery.nicescroll.min.js"></script>
<script src="<?php echo site_url('assets/') ?>js/wow.min.js"></script>
<script>new WOW().init();</script>
<script>
    $("nav a, .header-overlay a").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function(){

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });
</script>
</body>
</html>