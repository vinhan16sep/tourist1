<!-- Tours Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>tours.css">

<section id="head-cover" class="container-fluid" style="background-image: url('<?php echo base_url("assets/upload/product_category/".$detail['slug']."/".$detail['image']) ?>')"></section>

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
							<div class="badge badge-discount">
								<div class="content">KM<br>-30%</div>
							</div>

							<!--BADGE SPECIAL -->
							<div class="badge badge-special">
								<div id="tour-hot" class="">
									<img src="<?php echo site_url('assets/img/badge-tour-hot.png')?>" alt="badge tour hot">
								</div>
								<div id="best-sell" class="">
									<img src="<?php echo site_url('assets/img/badge-best-sell.png')?>" alt="badge best sell">
								</div>
							</div>

							<div class="mask">
								<img src="<?php echo base_url('/assets/upload/product/'.$product_array[$i]['slug'].'/'.$product_array[$i]['image']) ?>" alt="image">
								<div class="overview">
									<div class="head">
										<h4 class="post-subtitle"><?php echo $product_array[$i]['parent_title'] ?></h4>
										<h2 class="post-title"><?php echo $product_array[$i]['title'] ?></h2>
									</div>
									<div class="body">
										<h3 class="price">
											<?php echo number_format($product_array[$i]['price']) ?> vnd
											<small class="price-original"><del>999.000.000 vnd</del></small>
										</h3>
									</div>
								</div>
								<div class="content">
									<div class="head">
										<a href="<?php echo base_url("danh-muc/".$product_array[$i]['parent_slug'])?>" class="sub-header" style="color:white">
											<h4 class="post-subtitle">
                                                <?php echo $product_array[$i]['parent_title'] ?>
											</h4>
										</a>
										<h2 class="post-title"><?php echo $product_array[$i]['title'] ?></h2>
										<h3 class="price">
											<?php echo number_format($product_array[$i]['price']) ?> vnd
											<small class="price-original"><del>999.000.000 vnd</del></small>
										</h3>
									</div>
									<div class="body">
										<table class="table">
											<tr>
												<td><?php echo $this->lang->line('tour-detail-duration') ?></td>
												<td><?php echo count(json_decode($product_array[$i]['dateimg'])) ?></td>
											</tr>
											<tr>
												<td><?php echo $this->lang->line('tour-detail-start') ?></td>
												<td>
                                                    <?php
                                                    if($product_array[$i]['date'] != "0000-00-00 00:00:00" && $product_array[$i]['date'] != "1970-01-01 08:00:00"){
                                                        $rmtime = str_replace(" 00:00:00","",$product_array[$i]['date']);
                                                        $date= explode("-",$rmtime);
                                                        if(count($date) == 3){
                                                            $product_array[$i]['date'] = $date[2]."/".$date[1]."/".$date[0];
                                                        }else{
                                                            $product_array[$i]['date'] = "";
                                                        }
                                                    }else{
                                                        $product_array[$i]['date'] = "";
                                                    }
                                                    echo $product_array[$i]['date'];
                                                    ?>
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