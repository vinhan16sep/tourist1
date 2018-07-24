<!-- About Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>courses.css">

<header id="fh5co-header" class="fh5co-cover js-fullheight" role="banner" style="background-image: url('https://images.unsplash.com/photo-1512820790803-83ca734da794?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=14cc613995f60d89c4a908f3ea5c2409&auto=format&fit=crop&w=1974&q=80');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="display-t js-fullheight">
                    <div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
                        <h1><?php echo $this->lang->line('courses-title'); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div id="fh5co-featured-menu" class="fh5co-section">
    <div class="container">
		<div class="row">
			<?php foreach ($result as $key => $value): ?>
				<div class="col-md-6 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-wrap">
					<div class="fh5co-item">
						<div class="mask">
							<a href="<?php echo base_url('courses/detail') ?>">
								<img src="<?php echo base_url('assets/upload/courses/'. $value['image']) ?>" alt="popular course img">
							</a>
						</div>
						<a href="<?php echo base_url('courses/detail/'. $value['slug']) ?>">
							<h3><?php echo $value['title'] ?></h3>
						</a>
						<span class="fh5co-price"><?php echo number_format($value['price']) ?> vnd</span>
						<p><?php echo $value['description'] ?></p>
						<a href="<?php echo base_url('courses/detail/'. $value['slug']) ?>" class="btn btn-default" role="button"><?php echo $this->lang->line('see-more'); ?></a>
						<button type="button" class="btn btn-primary btn-register-courses" role="button" data-toggle="modal" data-target="#register-courses" data-id="<?php echo $value['id'] ?>"><?php echo $this->lang->line('register') ?>!</button>
					</div>
				</div>
            <?php endforeach ?>
		</div>
		<div>
			<?php echo $page_links; ?>
		</div>

    </div>
</div>
<script type="text/javascript">
	$('.btn-register-courses').click(function(){
		var id = $(this).data('id');
		$('#courses-id').val(id);
	});
</script>