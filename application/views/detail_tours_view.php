<!-- Tours Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>tours.min.css">

<section id="head-cover" class="container-fluid" style="background-image: url('https://images.unsplash.com/photo-1449034446853-66c86144b0ad?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=7402cc297bdfbb4a4856e764971dc013&auto=format&fit=crop&w=1950&q=80')"></section>

<section id="page">
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('') ?>"><?php echo $this->lang->line('home') ?></a></li>
			<li><a href="<?php echo base_url('tours') ?>">Tour Category</a></li>
			<li class="active">This page</li>
		</ol>

		<div class="section-header">
			<div class="row">
				<div class="col-xs-12">
					<h1>Tour Detail</h1>
					<p>Phasellus pretium turpis mauris, eu tincidunt nisi tincidunt tincidunt. Quisque lectus augue, convallis eget neque ut, interdum iaculis urna. Nam et diam quis mi cursus eleifend. Sed urna nisi, ultrices nec risus lacinia, convallis efficitur lorem. Vivamus pellentesque dignissim augue, sed interdum enim iaculis pharetra. Curabitur semper nulla suscipit velit sodales pulvinar. Curabitur lacinia fringilla dictum. Nam a dictum justo. Sed ultrices sed tellus non ornare. Ut ante elit, scelerisque a odio at, imperdiet porttitor dui. Suspendisse eu molestie velit, ut accumsan sem. Ut egestas ultricies nulla et vestibulum. Integer vitae fermentum risus. Nulla quam sem, viverra in nunc sed, mollis hendrerit nibh. Sed eu enim nibh. Ut vel efficitur lacus, a accumsan mauris.</p>
					<p>Proin dolor odio, hendrerit in sapien eleifend, rutrum mattis est. Vestibulum porta sollicitudin urna, eu congue arcu dignissim eu. Quisque finibus nisi et eros blandit volutpat. Mauris imperdiet, elit sed ornare pulvinar, erat lectus sodales eros, a egestas libero magna non enim. Nam feugiat volutpat ipsum sit amet fermentum. Mauris dapibus massa orci, vel venenatis dui tincidunt nec. Donec ultrices felis a iaculis sollicitudin. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				</div>
			</div>
		</div>

		<div id="tour-detail" class="section">
			<div class="row">
				<div class="left col-sm-6 col-xs-12">
					<h3>Note</h3>
					<p>Phasellus pretium turpis mauris, eu tincidunt nisi tincidunt tincidunt. Quisque lectus augue, convallis eget neque ut, interdum iaculis urna. Nam et diam quis mi cursus eleifend. Sed urna nisi, ultrices nec risus lacinia, convallis efficitur lorem. Vivamus pellentesque dignissim augue, sed interdum enim iaculis pharetra. Curabitur semper nulla suscipit velit sodales pulvinar. Curabitur lacinia fringilla dictum. Nam a dictum justo. Sed ultrices sed tellus non ornare. Ut ante elit, scelerisque a odio at, imperdiet porttitor dui. Suspendisse eu molestie velit, ut accumsan sem. Ut egestas ultricies nulla et vestibulum. Integer vitae fermentum risus. Nulla quam sem, viverra in nunc sed, mollis hendrerit nibh. Sed eu enim nibh. Ut vel efficitur lacus, a accumsan mauris.</p>
				</div>
				<div class="right col-sm-6 col-xs-12">
					<h3>Tour Detail</h3>
					<table class="table">
						<tr>
							<td><?php echo $this->lang->line('tour-detail-duration') ?></td>
							<td>5Ds 4Ns</td>
						</tr>
						<tr>
							<td><?php echo $this->lang->line('tour-detail-start') ?></td>
							<td>Datetime</td>
						</tr>
						<tr>
							<td><?php echo $this->lang->line('tour-detail-price') ?></td>
							<td>
								<h3>999.000.000 vnd</h3>
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
                                        <?php for($i = 0; $i < count($daily['number']); $i++): ?>
										<div class="panel panel-primary">
											<div class="panel-heading" role="tab" id="day-<?php echo $daily['number'][$i]; ?>-heading">
												<h4 class="panel-title">
													<a role="button" data-toggle="collapse" data-parent="#schedule" href="#day-<?php echo $daily['number'][$i]; ?>" aria-expanded="false" aria-controls="day-<?php echo $daily['number'][$i]; ?>">
														Day <?php echo $daily['number'][$i]; ?>: Go from somewhere to somewhere
													</a>
													<i class="fa <?php echo $daily['icon'][$i]; ?> pull-right" aria-hidden="true"></i>
												</h4>
											</div>
											<div id="day-<?php echo $daily['number'][$i]; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="day-<?php echo $daily['number'][$i]; ?>-heading">
												<div class="panel-body">
													<div class="media">
														<div class="media-left">
															<div class="mask">
																<img class="media-object" src="https://images.unsplash.com/photo-1495464597927-7137252f7d73?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=41203ca8f65d6ae05ccae4c6f6628ebd&auto=format&fit=crop&w=934&q=80" alt="daily schedule image">
															</div>
														</div>
														<div class="media-body">
															<h4 class="media-heading"><?php echo $this->lang->line('tour-detail-schedule') ?></h4>
															<p></p>
														</div>
													</div>
												</div>
											</div>
										</div>
                                        <?php endfor; ?>
									</div>

								</div>
								<div class="map col-sm-4 col-xs-12">
									<img src="http://en.hellovietnamtravel.com/uploads/images/userfiles/tourmap/thumb_550x550_21.jpg" alt="tour map">
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="gallery">
							<div class="row">
								<div class="col-xs-12">
                                    <?php $daily = array(
                                        'number' => array('1','2','3','4','5','6','7'),
                                        'icon' => array ('fa-plane', 'fa-bus', 'fa-ship', 'fa-train', 'fa-motorcycle', 'fa-bicycle', 'fa-blind')
                                    ) ?>


									<div class="panel-group" id="gallery-list" role="tablist" aria-multiselectable="true">
                                        <?php for($i = 0; $i < count($daily['number']); $i++): ?>
											<div class="panel panel-primary">
												<div class="panel-heading" role="tab" id="day-1-heading">
													<h4 class="panel-title">
														<a role="button" data-toggle="collapse" data-parent="#gallery-list" href="#gallery-<?php echo $daily['number'][$i]; ?>" aria-expanded="false" aria-controls="gallery-<?php echo $daily['number'][$i]; ?>">
															Day <?php echo $daily['number'][$i]; ?>: Go from somewhere to somewhere
														</a>
														<i class="fa <?php echo $daily['icon'][$i]; ?> pull-right" aria-hidden="true"></i>
													</h4>
												</div>
												<div id="gallery-<?php echo $daily['number'][$i]; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="gallery-<?php echo $daily['number'][$i]; ?>-heading">
													<div class="panel-body">
														<div class="media">
															<div class="media-left">
																<div class="mask">
																	<img class="media-object" src="https://images.unsplash.com/photo-1495464597927-7137252f7d73?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=41203ca8f65d6ae05ccae4c6f6628ebd&auto=format&fit=crop&w=934&q=80" alt="daily schedule image">
																</div>
															</div>
															<div class="media-body">
																<h4 class="media-heading">Location</h4>
																<p>Proin dolor odio, hendrerit in sapien eleifend, rutrum mattis est. Vestibulum porta sollicitudin urna, eu congue arcu dignissim eu. Quisque finibus nisi et eros blandit volutpat. Mauris imperdiet, elit sed ornare pulvinar, erat lectus sodales eros, a egestas libero magna non enim. Nam feugiat volutpat ipsum sit amet fermentum. Mauris dapibus massa orci, vel venenatis dui tincidunt nec. Donec ultrices felis a iaculis sollicitudin. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
															</div>
														</div>
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
											<td>100% price</td>
											<td>80% price</td>
											<td>30% price</td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<h3><?php echo $this->lang->line('inclusion') ?></h3>
									<ul>
										<?php for ($i = 0; $i < 6; $i++){ ?>
										<li>Accommodation in a shared twin or shared double room with daily breakfas</li>
										<?php } ?>
									</ul>
								</div>
								<div class="col-sm-6 col-xs-12">
									<h3><?php echo $this->lang->line('exclusion') ?></h3>
									<ul>
                                        <?php for ($i = 0; $i < 6; $i++){ ?>
											<li>Accommodation in a shared twin or shared double room with daily breakfas</li>
                                        <?php } ?>
									</ul>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="trip-notes">
							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<h3><?php echo $this->lang->line('condition-register') ?></h3>
									<ul>
                                        <?php for ($i = 0; $i < 6; $i++){ ?>
											<li>Accommodation in a shared twin or shared double room with daily breakfas</li>
                                        <?php } ?>
									</ul>
								</div>
								<div class="col-sm-6 col-xs-12">
									<h3><?php echo $this->lang->line('condition-cancel') ?></h3>
									<ul>
                                        <?php for ($i = 0; $i < 6; $i++){ ?>
											<li>Accommodation in a shared twin or shared double room with daily breakfas</li>
                                        <?php } ?>
									</ul>
								</div>
								<div class="col-xs-12">
									<h3><?php echo $this->lang->line('condition-general') ?></h3>
									<ul>
                                        <?php for ($i = 0; $i < 6; $i++){ ?>
											<li>Accommodation in a shared twin or shared double room with daily breakfas</li>
                                        <?php } ?>
									</ul>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="inquire">
							<div class="row">
                                <?php
                                echo form_open_multipart('', array('class' => 'form-horizontal'));
                                ?>

								<div class="form-group col-sm-4 col-xs-12">
                                    <?php
                                    echo form_label($this->lang->line('form-title') .' (*)', 'inquire_title');
                                    echo form_error('inquire_title');
                                    echo form_dropdown('inquire_first_name', $options =array('1' => 'Mr', '2' => 'Mrs', '3' => 'Ms', '4' => 'Dr'), set_value('inquire_title'), 'class="form-control" id="inquire_title"')
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
                                    echo form_label($this->lang->line('form-departure') .' (*)', 'inquire_departure');
                                    echo form_error('inquire_departure');
                                    echo form_input('inquire_departure', set_value('inquire_departure'), 'class="form-control" id="inquire_departure"');
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
                                    <?php echo form_submit('submit', $this->lang->line('booking'), 'class="btn btn-primary"'); ?>
								</div>

                                <?php echo form_close(); ?>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="customize">
							<div class="row">
                                <?php
                                echo form_open_multipart('', array('class' => 'form-horizontal'));
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
										<tr>
											<td>
												Schedule Day 1
											</td>
											<td>
                                                <?php
                                                echo form_error('inquire_message');
                                                echo form_textarea('tour_change', set_value('tour_change'), 'class="form-control" id="tour_change"')
                                                ?>
											</td>
										</tr>
										</tbody>
									</table>
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

<script src="<?php echo base_url('assets/js/rating.js') ?>"></script>