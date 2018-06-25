<!-- Tours Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>tours.min.css">

<section id="head-cover" class="container-fluid" style="background-image: url('<?php echo base_url('/assets/upload/product/'.$detail['slug'].'/'.$detail['image']) ?>')"></section>

<section id="page">
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('') ?>"><?php echo $this->lang->line('home') ?></a></li>
			<?php if (!empty($detail['sub'])): ?>
				<?php for($i=0;$i<count($detail['sub']);$i++): ?>
					<li><a href="<?php echo base_url('/danhmuc/'.$detail['sub'][$i]['slug']) ?>"><?php echo $detail['sub'][$i]['title'] ?></a></li>
				<?php endfor; ?>
			<?php endif ?>
			<li class="active"><?php echo $detail['title'];?></li>
		</ol>
		<div class="section-header">
			<div class="row">
				<div class="col-xs-12">
					<h1><?php echo $detail['title'] ?></h1>
					<p><?php echo $detail['description'] ?></p>
				</div>
			</div>
		</div>
		<div id="tour-detail" class="section">
			<div class="row">
				<div class="left col-sm-6 col-xs-12">
					<h3>Note</h3>
					<p><?php echo $detail['content'] ?></p>
				</div>
				<div class="right col-sm-6 col-xs-12">
					<h3>Tour Detail</h3>
					<table class="table">
						<tr>
							<td><?php echo $this->lang->line('tour-detail-duration') ?></td>
							<td><?php echo count($detail['datetitle'])?> Ngày</td>
						</tr>
						<tr>
							<td><?php echo $this->lang->line('tour-detail-start') ?></td>
							<td><?php echo $detail['date'] ?></td>
						</tr>
						<tr>
							<td><?php echo $this->lang->line('tour-detail-price') ?></td>
							<td>
								<h3><?php echo number_format($detail['price']) ?> vnd</h3>
							</td>
						</tr>
						<tr>
							<td><?php echo $this->lang->line('tour-detail-rating') ?></td>
							<td>
								<div id="rateit_star" data-productid="123" data-rateit-resetable="false" data-rateit-value="<?php echo $rating ?>"></div>
								<input type="hidden" name="re_rateit" id="re_rateit" value="">
								<p class="number"><?php echo $rating ?> / 5 điểm <?php echo '(' . $count_rating. ' ' .$this->lang->line('tour-detail-votes') . ')' ?></p>
							</td>
						</tr>
						<tr>
							<td>
								<div class="captcha-image image"></div>
								<div class="captcha-input">
									<input type="hidden" name="re_captcha" id="re_captcha" class="show-re-captcha" value="">
									<input placeholder="Nhập mã" name="captcha" id="captcha" type="text" value="" style="border-radius: 4px; border: none; width: 48%; margin-right: 5%; color: black">  
									<a class="refresh" href="javascript:void(0)" title="Lấy mã mới"><i class="fa fa-refresh" aria-hidden="true"></i></a>    
								</div>
								<div>
									<span class="message"></span>
								</div>
							</td>
							<td>
								<input type="hidden" name="created_captcha" class="created_captcha" value="<?php echo base_url('tours/created_captcha'); ?>">
								<input type="hidden" name="created_rating" class="created_rating" value="<?php echo base_url('tours/created_rating'); ?>">
								<input type="hidden" name="product_id" class="product_id" value="91">
								<button class="btn btn-default btn-rating" <?php echo ($check_session == true)? 'disabled' : '' ?> >
                                    <?php echo $this->lang->line('booking') ?>
								</button>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="row tabs">
				<div class="col-xs-12">
					<ul class="nav nav-tabs nav-justified" role="tablist">
						<li role="presentation" class="active">
							<a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">
                                <?php echo $this->lang->line('tour-tabs-overview') ?>
							</a>
						</li>
						<li role="presentation">
							<a href="#gallery" aria-controls="gallery" role="tab" data-toggle="tab">
                                <?php echo $this->lang->line('tour-tabs-gallery') ?>
							</a>
						</li>
						<li role="presentation">
							<a href="#price" aria-controls="price" role="tab" data-toggle="tab">
                                <?php echo $this->lang->line('tour-tabs-price') ?>
							</a>
						</li>
						<li role="presentation">
							<a href="#trip-notes" aria-controls="trip-notes" role="tab" data-toggle="tab">
                                <?php echo $this->lang->line('tour-tabs-trip-notes') ?>
							</a>
						</li>
						<li role="presentation">
							<a href="#inquire" aria-controls="inquire" role="tab" data-toggle="tab">
                                <?php echo $this->lang->line('tour-tabs-inquire') ?>
							</a>
						</li>
						<li role="presentation">
							<a href="#customize" aria-controls="customize" role="tab" data-toggle="tab">
                                <?php echo $this->lang->line('tour-tabs-customize') ?>
							</a>
						</li>
					</ul>

					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="overview">
							<div class="row">
								<div class="schedule col-sm-8 col-xs-12">
                                    <?php $daily = array(
                                    		'number' => array('1','2','3','4','5','6','7'),
											'icon' => array ('fa-plane', 'fa-bus', 'fa-ship', 'fa-train', 'fa-motorcycle', 'fa-bicycle', 'fa-blind')
									) ?>
									<div class="panel-group" id="schedule" role="tablist" aria-multiselectable="true">
                                        <?php for($i = 0; $i < count($detail['dateimg']); $i++): ?>
											<div class="panel panel-primary">
												<div class="panel-heading" role="tab" id="day-<?php echo $daily['number'][$i]; ?>-heading">
													<h4 class="panel-title">
														<a role="button" data-toggle="collapse" data-parent="#schedule" href="#day-<?php echo $daily['number'][$i]; ?>" aria-expanded="false" aria-controls="day-<?php echo $daily['number'][$i]; ?>">
															Day <?php echo $i+1; ?>: <?php echo $detail['datetitle'][$i];?>
														</a>
														<i class="fa <?php echo $request_vehicles_icon[$detail['vehicles'][$i]]; ?> pull-right" aria-hidden="true"></i>
													</h4>
												</div>
												<div id="day-<?php echo $daily['number'][$i]; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="day-<?php echo $daily['number'][$i]; ?>-heading">
													<div class="panel-body">
														<div class="media">
															<div class="media-left">
																<div class="mask">
																	<img class="media-object" src="<?php echo base_url('/assets/upload/product/'.$detail['slug'].'/'.$detail['dateimg'][$i]); ?>" alt="daily schedule image">
																</div>
															</div>
															<div class="media-body">
																<h4 class="media-heading"><?php echo $detail['datetitle'][$i]; ?></h4>
																<p>
																	<?php echo $detail['datecontent'][$i]; ?>
																</p>
															</div>
														</div>
													</div>
												</div>
											</div>
                                        <?php endfor; ?>
									</div>

								</div>
								<div class="map col-sm-4 col-xs-12">
									<img src="<?php echo base_url('/assets/upload/product/'.$detail['slug'].'/'.$detail['imglocaltion']);?>" alt="tour map">
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="gallery">
							<div class="row">
								<div class="col-xs-12">
                                    <?php $daily = array(
                                        'number' => array('1','2','3','4','5','6','7'),
                                        'icon' => array ('fa-plane', 'fa-bus', 'fa-ship', 'fa-train', 'fa-motorcycle', 'fa-bicycle', 'fa-blind')
                                    );
                                    ?>


									<div class="panel-group" id="gallery-list" role="tablist" aria-multiselectable="true">
                                        <?php for($i = 0; $i < count($detail['librarylocaltion']); $i++): ?>
											<div class="panel panel-primary">
												<div class="panel-heading" role="tab" id="day-1-heading">
													<h4 class="panel-title">
														<a role="button" data-toggle="collapse" data-parent="#gallery-list" href="#gallery-<?php echo $daily['number'][$i]; ?>" aria-expanded="false" aria-controls="gallery-<?php echo $daily['number'][$i]; ?>">
															Day <?php echo $i+1; ?>: <?php echo $detail['datetitle'][$i];?>
														</a>
														<i class="fa <?php echo $request_vehicles_icon[$detail['vehicles'][$i]]; ?> pull-right" aria-hidden="true"></i>
													</h4>
												</div>
												<div id="gallery-<?php echo $i+1; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="gallery-<?php echo $i+1; ?>-heading">
													<div class="panel-body">
													<?php if (!empty($detail['librarylocaltion'][$i])): ?>
														<?php for($j = 0; $j < count($detail['librarylocaltion'][$i]); $j++): ?>
															<?php if (!empty($detail['librarylocaltion'][$i][$j])): ?>
																<div class="media">
																	<div class="media-left">
																		<div class="mask">
																			<img class="media-object" src="<?php echo base_url('/assets/upload/localtion/'.$detail['librarylocaltion'][$i][$j]['slug'].'/'.$detail['librarylocaltion'][$i][$j]['image']); ?>" alt="daily schedule image">
																		</div>
																	</div>
																	<div class="media-body">
																		<h4 class="media-heading"><?php echo $detail['librarylocaltion'][$i][$j]['title'] ?></h4>
																		<p><?php echo $detail['librarylocaltion'][$i][$j]['content'] ?></p>
																	</div>
																</div>
			                                                <?php else: ?>
			                                                    <div style="padding:20px;">
			                                                        Không có nơi nào được chọn trong ngày    
			                                                    </div>
			                                                <?php endif;?>
                                                            <?php if ($j+1 < count($detail['librarylocaltion'][$i])): ?>
                                                                <div style="border:2px solid gray" class="col-md-12"> </div>  
                                                            <?php endif ?> 
														<?php endfor; ?>
                                    				<?php endif;?>
													</div>
												</div>
											</div>
                                        <?php endfor; ?>
									</div>
								</div>
							</div>

						</div>
						<div role="tabpanel" class="tab-pane" id="price">
							<div class="row">
								<div class="col-xs-12">
									<table class="table table-bordered">
										<thead>
										<tr>
											<th><?php echo $this->lang->line('tour-price-adult') ?></th>
											<th><?php echo $this->lang->line('tour-price-u11') ?></th>
											<th><?php echo $this->lang->line('tour-price-u2') ?></th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td><?php echo $detail['priceadults'];?>% price</td>
											<td><?php echo $detail['pricechildren'];?>% price</td>
											<td><?php echo $detail['priceinfants'];?>% price</td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<?php echo $detail['detailsprice'];?>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="trip-notes">
							<div class="row">
								<div class="col-xs-12">
									<?php echo $detail['tripnodes'];?>
								</div>
							</div>
						</div>
						<input type="hidden" name="product_id" id="product_id" value="<?php echo $detail['id']?>">
						<div role="tabpanel" class="tab-pane" id="inquire">
							<div class="row">
                                <?php
                                echo form_open_multipart('', array('class' => 'form-horizontal','id' => 'form-booking'));
                                ?>
								<div class="form-group col-sm-4 col-xs-12">
                                    <?php
                                    echo form_label($this->lang->line('form-title') .' (*)', 'inquire_title');
                                    echo form_error('inquire_title');
                                    echo form_dropdown('inquire_title', $options =array('Mr' => 'Mr', 'Mrs' => 'Mrs', 'Ms' => 'Ms', 'Dr' => 'Dr'), set_value('inquire_title'), 'class="form-control" id="inquire_title"')
                                    ?>
								</div>
								<div class="form-group col-sm-4 col-xs-12">
                                    <?php
                                    echo form_label($this->lang->line('form-first-name') .' (*)', 'inquire_first_name');
                                    echo form_error('inquire_first_name');
                                    echo form_input('inquire_first_name', set_value('inquire_first_name'), 'class="form-control" id="inquire_first_name"');
                                    ?>
								</div>
								<div class="form-group col-sm-4 col-xs-12">
                                    <?php
                                    echo form_label($this->lang->line('form-last-name') .' (*)', 'inquire_last_name');
                                    echo form_error('inquire_last_name');
                                    echo form_input('inquire_last_name', set_value('inquire_last_name'), 'class="form-control" id="inquire_last_name"');
                                    ?>
								</div>
								<div class="form-group col-sm-4 col-xs-12">
                                    <?php
                                    echo form_label($this->lang->line('form-email') .' (*)', 'inquire_email');
                                    echo form_error('inquire_email');
                                    echo form_input('inquire_email', set_value('inquire_email'), 'class="form-control" id="inquire_email"');
                                    ?>
								</div>
								<div class="form-group col-sm-4 col-xs-12">
                                    <?php
                                    echo form_label($this->lang->line('form-email-confirm') .' (*)', 'inquire_email_confirm');
                                    echo form_error('inquire_email_confirm');
                                    echo form_input('inquire_email_confirm', set_value('inquire_email_confirm'), 'class="form-control" id="inquire_email_confirm"');
                                    ?>
								</div>
								<div class="form-group col-sm-4 col-xs-12">
                                    <?php
                                    echo form_label($this->lang->line('form-phone-number') .' (*)', 'inquire_phone_number');
                                    echo form_error('inquire_phone_number');
                                    echo form_input('inquire_phone_number', set_value('inquire_phone_number'), 'class="form-control" id="inquire_phone_number"');
                                    ?>
								</div>
								<div class="form-group col-sm-6 col-xs-12">
                                    <?php
                                    echo form_label($this->lang->line('form-departure') .' (*)', 'datepicker');
                                    echo form_error('datepicker');
                                    echo form_input('datepicker', set_value('datepicker'), 'class="form-control datepicker" readonly');
                                    ?>
								</div>
								<div class="form-group col-sm-6 col-xs-12">
                                    <?php
                                    echo form_label($this->lang->line('form-country') .' (*)', 'inquire_country');
                                    echo form_error('inquire_country');
                                    echo form_input('inquire_country', set_value('inquire_country'), 'class="form-control" id="inquire_country"');
                                    ?>
								</div>
								<div class="form-group col-sm-4 col-xs-12">
                                    <?php
                                    echo form_label($this->lang->line('form-adults') .' (*)', 'inquire_number_adults');
                                    echo form_error('inquire_number_adults');
                                    echo '<input type="number" class="form-control" id="inquire_number_adults" name="inquire_number_adults" min="0" placeholder="0" >';
                                    ?>
								</div>
								<div class="form-group col-sm-4 col-xs-12">
                                    <?php
                                    echo form_label($this->lang->line('form-children-u11') .' (*)', 'inquire_number_children_u11');
                                    echo form_error('inquire_number_children_u11');
                                    echo '<input type="number" class="form-control" id="inquire_number_children_u11" name="inquire_number_children_u11" min="0" placeholder="0" >';
                                    ?>
								</div>
								<div class="form-group col-sm-4 col-xs-12">
                                    <?php
                                    echo form_label($this->lang->line('form-children-u2') .' (*)', 'inquire_number_children_u2');
                                    echo form_error('inquire_number_children_u2');
                                    echo '<input type="number" class="form-control" id="inquire_number_children_u2" name="inquire_number_children_u2" min="0" placeholder="0" >';
                                    ?>
								</div>

								<div class="form-group col-xs-12">
                                    <?php
                                    echo form_label($this->lang->line('form-message') .' (*)', 'inquire_message');
                                    echo form_error('inquire_message');
                                    echo form_textarea('inquire_message', set_value('inquire_message'), 'class="form-control" id="inquire_message"')
                                    ?>
								</div>

								<div class="col-xs-12">
                                    <input id="bookingsubmit" class="btn btn-primary" type="button" value="Book Now!">
								</div>

                                <?php echo form_close(); ?>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="customize">
							<div class="row">
                                <?php
                                echo form_open_multipart('', array('class' => 'form-horizontal','id' => 'form-customize'));
                                ?>
									<div class="col-xs-12">
										<table class="table">
											<thead>
											<tr>
												<th><?php echo $this->lang->line('customize-program') ?></th>
												<th><?php echo $this->lang->line('customize-change') ?></th>
											</tr>
											</thead>

											<tbody>
				                                <?php for ($i = 0;$i< count($detail['dateimg']);$i++): ?>
													<tr>
														<td>
															Day <?php echo $i+1; ?>
														</td>
														<td>
			                                                <?php
			                                                echo form_error('inquire_message[]');
			                                                echo form_textarea(array('name' => 'tour_change[]','rows' => '4'), set_value('tour_change'), array('class' =>'form-control','id' => 'tour_change_'.$i,))
			                                                ?>
														</td>
													</tr>
				                                <?php endfor ?>
											</tbody>
										</table>
									</div>
	                                <div class="form-group col-sm-4 col-xs-12">
	                                    <?php
	                                    echo form_label($this->lang->line('form-title') .' (*)', 'inquire_title');
	                                    echo form_error('inquire_title');
	                                    echo form_dropdown('inquire_title', $options =array('Mr' => 'Mr', 'Mrs' => 'Mrs', 'Ms' => 'Ms', 'Dr' => 'Dr'), set_value('inquire_title'), 'class="form-control" id="inquire_title"')
	                                    ?>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
	                                    <?php
	                                    echo form_label($this->lang->line('form-first-name') .' (*)', 'inquire_first_name');
	                                    echo form_error('inquire_first_name');
	                                    echo form_input('inquire_first_name', set_value('inquire_first_name'), 'class="form-control" id="inquire_first_name"');
	                                    ?>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
	                                    <?php
	                                    echo form_label($this->lang->line('form-last-name') .' (*)', 'inquire_last_name');
	                                    echo form_error('inquire_last_name');
	                                    echo form_input('inquire_last_name', set_value('inquire_last_name'), 'class="form-control" id="inquire_last_name"');
	                                    ?>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
	                                    <?php
	                                    echo form_label($this->lang->line('form-email') .' (*)', 'inquire_email');
	                                    echo form_error('inquire_email');
	                                    echo form_input('inquire_email', set_value('inquire_email'), 'class="form-control" id="inquire_email"');
	                                    ?>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
	                                    <?php
	                                    echo form_label($this->lang->line('form-email-confirm') .' (*)', 'inquire_email_confirm');
	                                    echo form_error('inquire_email_confirm');
	                                    echo form_input('inquire_email_confirm', set_value('inquire_email_confirm'), 'class="form-control" id="inquire_email_confirm"');
	                                    ?>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
	                                    <?php
	                                    echo form_label($this->lang->line('form-phone-number') .' (*)', 'inquire_phone_number');
	                                    echo form_error('inquire_phone_number');
	                                    echo form_input('inquire_phone_number', set_value('inquire_phone_number'), 'class="form-control" id="inquire_phone_number"');
	                                    ?>
									</div>
									<div class="form-group col-sm-6 col-xs-12">
	                                    <?php
	                                    echo form_label($this->lang->line('form-departure') .' (*)', 'datepicker');
	                                    echo form_error('datepicker');
	                                    echo form_input('datepicker', set_value('datepicker'), 'class="form-control datepicker" readonly');
	                                    ?>
									</div>
									<div class="form-group col-sm-6 col-xs-12">
	                                    <?php
	                                    echo form_label($this->lang->line('form-country') .' (*)', 'inquire_country');
	                                    echo form_error('inquire_country');
	                                    echo form_input('inquire_country', set_value('inquire_country'), 'class="form-control" id="inquire_country"');
	                                    ?>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
	                                    <?php
	                                    echo form_label($this->lang->line('form-adults') .' (*)', 'inquire_number_adults');
	                                    echo form_error('inquire_number_adults');
	                                    echo '<input type="number" class="form-control" id="inquire_number_adults" name="inquire_number_adults" min="0" placeholder="0" >';
	                                    ?>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
	                                    <?php
	                                    echo form_label($this->lang->line('form-children-u11') .' (*)', 'inquire_number_children_u11');
	                                    echo form_error('inquire_number_children_u11');
	                                    echo '<input type="number" class="form-control" id="inquire_number_children_u11" name="inquire_number_children_u11" min="0" placeholder="0" >';
	                                    ?>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
	                                    <?php
	                                    echo form_label($this->lang->line('form-children-u2') .' (*)', 'inquire_number_children_u2');
	                                    echo form_error('inquire_number_children_u2');
	                                    echo '<input type="number" class="form-control" id="inquire_number_children_u2" name="inquire_number_children_u2" min="0" placeholder="0" >';
	                                    ?>
									</div>

									<div class="form-group col-xs-12">
	                                    <?php
	                                    echo form_label($this->lang->line('form-message') .' (*)', 'inquire_message');
	                                    echo form_error('inquire_message');
	                                    echo form_textarea('inquire_message', set_value('inquire_message'), 'class="form-control" id="inquire_message"')
	                                    ?>
									</div>
									<div class="col-xs-12">
	                                    <input id="customizesubmit" class="btn btn-primary" type="button" value="Book Now!">
									</div>
                                <?php echo form_close(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
  $(function () {
    //Date picker
    $('.datepicker').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy',
    })
  })
</script>
<script src="<?php echo base_url('assets/js/rating.js') ?>"></script>
