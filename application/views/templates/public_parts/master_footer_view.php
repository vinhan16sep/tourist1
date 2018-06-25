</section>
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="item col-sm-3 col-xs-12">
				<div class="head">
					<h3><?php echo $this->lang->line('domestic') ?></h3>
				</div>
				<div class="body">
					<ul>
                        <?php for($i = 0; $i <4; $i ++){ ?>
						<li>
							<a href="<?php echo base_url('') ?>">
                                <?php echo $this->lang->line('pilgrimage') ?>
							</a>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="item col-sm-3 col-xs-12">
				<div class="head">
					<h3><?php echo $this->lang->line('international') ?></h3>
				</div>
				<div class="body">
					<ul>
                        <?php for($i = 0; $i <8; $i ++){ ?>
							<li>
								<a href="<?php echo base_url('') ?>">
                                    <?php echo $this->lang->line('pilgrimage') ?>
								</a>
							</li>
                        <?php } ?>
					</ul>
				</div>
			</div>
			<div class="item col-sm-3 col-xs-12">
				<div class="head">
					<h3><?php echo $this->lang->line('about') ?></h3>
				</div>
				<div class="body">
					<ul>
                        <?php for($i = 0; $i <3; $i ++){ ?>
							<li>
								<a href="<?php echo base_url('') ?>">
                                    <?php echo $this->lang->line('pilgrimage') ?>
								</a>
							</li>
                        <?php } ?>
					</ul>
				</div>
			</div>
			<div class="item col-sm-3 col-xs-12">
				<div class="head">
					<h3><?php echo $this->lang->line('accept') ?></h3>
				</div>
				<div class="body">
					<ul class="list-inline">
						<li>
							<i class="fa fa-2x fa-cc-visa" aria-hidden="true"></i>
						</li>
						<li>
							<i class="fa fa-2x fa-cc-mastercard" aria-hidden="true"></i>
						</li>
						<li>
							<i class="fa fa-2x fa-cc-jcb" aria-hidden="true"></i>
						</li>
						<li>
							<i class="fa fa-2x fa-cc-amex" aria-hidden="true"></i>
						</li>
					</ul>
				</div>
				<div class="head">
					<h3><?php echo $this->lang->line('follow') ?></h3>
				</div>
				<div class="body">
					<ul class="list-inline">
						<li>
							<a href="" target="_blank">
								<i class="fa fa-2x fa-facebook-square" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="" target="_blank">
								<i class="fa fa-2x fa-twitter-square" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="" target="_blank">
								<i class="fa fa-2x fa-pinterest-square" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="" target="_blank">
								<i class="fa fa-2x fa-linkedin-square" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="" target="_blank">
								<i class="fa fa-2x fa-instagram" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="" target="_blank">
								<i class="fa fa-2x fa-youtube-square" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="item col-sm-3 col-xs-12">
				<div class="head">
					<h3><?php echo $this->lang->line('branch-1-location') ?></h3>
				</div>
				<div class="body">
					<table class="table">
						<tr>
							<td><i class="fa fa-map-marker" aria-hidden="true"></i></td>
							<td><?php echo $this->lang->line('branch-1-address') ?></td>
						</tr>
						<tr>
							<td><i class="fa fa-phone" aria-hidden="true"></i></td>
							<td><a href="tel:(+84) 024 1234 5678">(+84) 024 1234 5678</a> </td>
						</tr>
						<tr>
							<td><i class="fa fa-envelope-o" aria-hidden="true"></i></td>
							<td><a href="mailto:info@diamondtour.vn">info@diamondtour.vn</a> </td>
						</tr>
					</table>
				</div>
			</div>

			<div class="item col-sm-3 col-xs-12">
				<div class="head">
					<h3><?php echo $this->lang->line('branch-2-location') ?></h3>
				</div>
				<div class="body">
					<table class="table">
						<tr>
							<td><i class="fa fa-map-marker" aria-hidden="true"></i></td>
							<td><?php echo $this->lang->line('branch-2-address') ?></td>
						</tr>
						<tr>
							<td><i class="fa fa-phone" aria-hidden="true"></i></td>
							<td><a href="tel:(+84) 024 1234 5678">(+84) 024 8765 4321</a> </td>
						</tr>
						<tr>
							<td><i class="fa fa-envelope-o" aria-hidden="true"></i></td>
							<td><a href="mailto:info@diamondtour.vn">info@diamondtour.vn</a> </td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</footer>



<script src="<?php echo site_url('assets/lib/bootstrap/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?php echo site_url('assets/lib/bootstrap/js/daterangepicker.js') ?>"></script>
<script src="<?php echo site_url('assets/js/') ?>main.js"></script>
<script src="<?php echo site_url('assets/js/') ?>client.js"></script>

</body>
</html>
