<!-- About Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>about.min.css">

<header id="fh5co-header" class="fh5co-cover js-fullheight" role="banner" style="background-image: url('https://images.unsplash.com/photo-1484712401471-05c7215830eb?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=64a2622330a7ea8f0e1e73d32b8afa9d&auto=format&fit=crop&w=1950&q=80');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="display-t js-fullheight">
                    <div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
                        <h1><?php echo $this->lang->line('about-us') ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div id="fh5co-about" class="fh5co-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 img-wrap animate-box" data-animate-effect="fadeInLeft">
                <img src="<?php echo base_url('assets/upload/about/' . $detail['avatar']) ?>" alt="img about" width=100%>
            </div>
            <div class="col-md-5 col-md-push-1 animate-box">
                <div class="section-heading">
                    <h2>myIELTS English Center</h2>
                    <?php echo $detail['about_content'] ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="fh5co-timeline">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <ul class="timeline animate-box">
                    <li class="timeline-heading text-center animate-box">
                        <div><h3><?php echo $this->lang->line('our-message'); ?></h3></div>
                    </li>
                    <?php if ($our_message): ?>
                        <?php foreach ($our_message as $key => $value): ?>
                            <?php if ($key == 0 || ($key % 2 == 0) ): ?>
                                <li class="animate-box timeline-unverted">
                                    <div class="timeline-badge"><i class="icon-genius"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h3 class="timeline-title">The Founders Meet</h3>

                                        </div>
                                        <div class="timeline-body">
                                            <p><?php echo $value['description'] ?></p>
                                        </div>
                                    </div>
                                </li>
                            <?php else: ?>
                                <li class="timeline-inverted animate-box">
                                    <div class="timeline-badge"><i class="icon-genius"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h3 class="timeline-title">Create A Restaurant</h3>
                                        </div>
                                        <div class="timeline-body">
                                            <p><?php echo $value['description'] ?></p>
                                        </div>
                                    </div>
                                </li>
                            <?php endif ?>
                        <?php endforeach ?>
                    <?php endif ?>

                    <br>
                    <li class="timeline-heading text-center animate-box">
                        <div><h3><?php echo $this->lang->line('our-methods'); ?></h3></div>
                    </li>
                    <?php if ($our_methods): ?>
                        <?php foreach ($our_methods as $key => $value): ?>
                            <?php if ($key == 0 || ($key % 2 == 0)): ?>
                                <li class="timeline-inverted animate-box">
                                    <div class="timeline-badge"><i class="icon-genius"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h3 class="timeline-title">Stablished Restaurant in Europe</h3>
                                        </div>
                                        <div class="timeline-body">
                                            <p><?php echo $value['description'] ?></p>
                                        </div>
                                    </div>
                                </li>
                            <?php else: ?>
                                <li class="animate-box timeline-unverted">
                                    <div class="timeline-badge"><i class="icon-genius"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h3 class="timeline-title">Franchise Restaurants Brooklyn</h3>
                                        </div>
                                        <div class="timeline-body">
                                            <p><?php echo $value['description'] ?></p>
                                        </div>
                                    </div>
                                </li>
                            <?php endif ?>
                        <?php endforeach ?>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </div>
</div>