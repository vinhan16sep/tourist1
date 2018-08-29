<!-- Tours Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>tours.css">
<section id="head-slider-section">
	<div id="head-slider" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner" role="listbox">
			<?php if (!empty(json_decode($detail['image']))): ?>
				<?php foreach (json_decode($detail['image']) as $key => $value): ?>
					<div class="item <?php echo ($key == 0)?'active':'';?>">
						<div class="mask">
							<img src="<?php echo base_url('assets/upload/product_category/'.$detail['slug'].'/'.$value);?>" alt="<?php echo $detail['title'] ?>">
						</div>
					</div>
				<?php endforeach ?>
			<?php endif ?>
		</div>
		<a class="left carousel-control" href="#head-slider" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#head-slider" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</section>

<section id="page">
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('') ?>"><?php echo $this->lang->line('home') ?></a></li>
			<?php if (!empty($detail['sub'])): ?>
				<?php for($i=0;$i<count($detail['sub']);$i++): ?>
					<li><a href="<?php echo base_url('/danh-muc/'.$detail['sub'][$i]['slug']) ?>"><?php echo $detail['sub'][$i]['title'] ?></a></li>
				<?php endfor; ?>
			<?php endif ?>
			<li class="active"><?php echo $detail['title'];?></li>
		</ol>

		<div class="section-header">
			<div class="row">
				<div class="col-xs-12">
					<h1><?php echo $detail['title'] ?></h1>
					<p><?php echo $detail['content'] ?></p>
				</div>
			</div>
		</div>

		<div id="tours" class="section">
			<div class="row">
                <?php for($i =0;$i<count($product_array);$i++): ?>
					<div class="item col-md-4 col-6 col-xs-12">
						<div class="inner">

							<!--BADGE DISCOUNT -->
							<?php if (!empty($product_array[$i]['showpromotion'])): ?>
								<div class="badge badge-discount">
									<div class="content"><?php echo $this->lang->line('promotion');?><br>-<?php echo $product_array[$i]['percen']; ?>%</div>
								</div>
							<?php endif ?>

							<!--BADGE SPECIAL -->
							<div class="badge badge-special">
								<?php if (!empty($product_array[$i]['hot'])): ?>
									<div id="tour-hot" class="">
										<img src="<?php echo site_url('assets/img/badge-tour-hot.png')?>" alt="badge tour hot">
									</div>
								<?php endif ?>
								<?php if (!empty($product_array[$i]['bestselling'])): ?>
									<div id="best-sell" class="">
										<img src="<?php echo site_url('assets/img/badge-best-sell.png')?>" alt="badge best sell">
									</div>
								<?php endif ?>
							</div>

							<div class="mask">
								<img src="<?php echo base_url('/assets/upload/product/'.$product_array[$i]['slug'].'/'.$product_array[$i]['image']) ?>" alt="<?php echo $product_array[$i]['title'] ?>">
								<div class="overview">
									<div class="head">
										<h4 class="post-subtitle"><?php echo $product_array[$i]['parent_title'] ?></h4>
										<h2 class="post-title"><?php echo $product_array[$i]['title'] ?></h2>
									</div>
									<div class="body">
										<h3 class="price">
											<?php if (!empty($product_array[$i]['price'])): ?>
												<?php if (!empty($product_array[$i]['pricepromotion']) && !empty($product_array[$i]['percen']) && !empty($product_array[$i]['showpromotion'])): ?>
													<?php echo number_format($product_array[$i]['pricepromotion']); ?> vnd
													<small class="price-original"><del><?php echo number_format($product_array[$i]['price']);?> vnd</del></small>
												<?php else: ?>
													<?php echo number_format($product_array[$i]['price']); ?> vnd
												<?php endif ?>
											<?php else: ?>
												<span style="font-weight: 505;"><?php echo $this->lang->line('price');?>:</span> <?php echo $this->lang->line('contacts');?>
											<?php endif ?>
										</h3>
										<small class="rating" style="color: white;"><?php echo $this->lang->line('tour-detail-rating') ?>:
											<?php if (empty($product_array[$i]['count_rating'])): ?>
												<?php echo NO_RATING;?> 
											<?php else: ?>
												<?php echo round($product_array[$i]['total_rating']/$product_array[$i]['count_rating'],1);?>/5 
											<?php endif ?>
											<i class="fa fa-star" aria-hidden="true"></i>
										</small>
									</div>
								</div>
								<div class="content">
									<div class="head">
										<a href="<?php echo base_url("danh-muc/".$product_array[$i]['parent_slug'])?>" class="sub-header" style="color:white">
											<h4 class="post-subtitle">
                                                <?php echo $product_array[$i]['parent_title'] ?>
											</h4>
										</a>
										<h2 class="post-title" title="<?php echo $product_array[$i]['title'] ?>"><?php echo $product_array[$i]['title'] ?></h2>
										<h3 class="price">
											<?php if (!empty($product_array[$i]['price'])): ?>
												<?php if (!empty($product_array[$i]['pricepromotion']) && !empty($product_array[$i]['percen']) && !empty($product_array[$i]['showpromotion'])): ?>
													<?php echo number_format($product_array[$i]['pricepromotion']); ?> vnd
													<small class="price-original"><del><?php echo number_format($product_array[$i]['price']);?> vnd</del></small>
												<?php else: ?>
													<?php echo number_format($product_array[$i]['price']); ?> vnd
												<?php endif ?>
											<?php endif ?>
										</h3>
									</div>
									<div class="body">
										<table class="table">
											<?php if (empty($product_array[$i]['price'])): ?>
												<tr>
													<td><?php echo $this->lang->line('price'); ?></td>
													<td><?php echo $this->lang->line('contacts'); ?></td>
												</tr>
											<?php endif ?>
											<tr>
												<td><?php echo $this->lang->line('tour-detail-duration') ?></td>
												<td><?php echo count(json_decode($product_array[$i]['dateimg'])) ?></td>
											</tr>
											<tr>
												<td><?php echo $this->lang->line('tour-detail-start') ?></td>
												<td>
                                                    <?php
                                                    	$datetime = $this->lang->line('contacts');
	                                                    if($product_array[$i]['date'] != "0000-00-00 00:00:00" && $product_array[$i]['date'] != "1970-01-01 08:00:00"){
	                                                        $rmtime = str_replace(" 00:00:00","",$product_array[$i]['date']);
	                                                        $date= explode("-",$rmtime);
	                                                        if(count($date) == 3){
	                                                            $datetime = $date[2]."/".$date[1]."/".$date[0];
	                                                        }
	                                                    }
	                                                    echo $datetime;
                                                    ?>
												</td>
											</tr>
											<tr>
												<td><?php echo $this->lang->line('tour-detail-rating') ?></td>
												<td>
													<?php if (empty($product_array[$i]['count_rating'])): ?>
														<?php echo NO_RATING;?>
													<?php else: ?>
														<?php echo round($product_array[$i]['total_rating']/$product_array[$i]['count_rating'],1);?>/5 
													<?php endif ?>
													<i class="fa fa-star" aria-hidden="true"></i>
												</td>
											</tr>
										</table>
									</div>
									<div class="foot">
										<a href="<?php echo base_url('tours/'.$product_array[$i]['slug']) ?>" class="btn btn-primary" role="button">
                                            <?php echo $this->lang->line('explore') ?>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
                <?php endfor; ?>
			</div>
			<div class="col-md-6 col-md-offset-5 page">
                    <?php echo (isset($page_links))? $page_links : '';?>
                </div>
		</div>
	</div>
</section>