</section>
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="item col-sm-6 col-xs-12">
				<div class="head">
					<h3><?php echo $this->lang->line('about') ?></h3>
				</div>
				<div class="body">
					<table class="table">
						<tr>
							<td style="width: 50%">
								<img src="<?php echo site_url('assets/img/')?>logo.png" alt="logo Diamond">
								<br>
								<p>About us Paragraph</p>
							</td>
							<td>
								<div class="outline">
									<i class="fa fa-phone" aria-hidden="false"></i> Hotline
									<br>
									<a class="link-primary" href="tel:(024) 1234 5678">
										<h2>(024) 1234 5678</h2>
									</a>
								</div>

								<div class="outline">
									<i class="fa fa-envelope-o" aria-hidden="false"></i> Email
									<br>
									<a class="link-primary" href="mailto:info@diamondtour.vn">
										<h2>info@diamondtour.vn</h2>
									</a>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="item col-sm-3 col-xs-12">
				<div class="head">
					<h3><?php echo $this->lang->line('quick-links') ?></h3>
				</div>
				<div class="body">
					<ul>
                        <li>
							<a href="<?php echo base_url('') ?>"><?php echo $this->lang->line('home') ?></a>
						</li>
						<li>
							<a href="<?php echo base_url('about') ?>"><?php echo $this->lang->line('about') ?></a>
						</li>
						<li>
							<a href="<?php echo base_url('services') ?>"><?php echo $this->lang->line('services') ?></a>
						</li>
						<li>
							<a href="<?php echo base_url('contact') ?>"><?php echo $this->lang->line('contact') ?></a>
						</li>
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
			<div class="text-center">
				&copy; 2018 | <a class="link-primary" href="javascript:void(0);">Privacy</a>
				<br>
				All Rights Reversed
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
