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
								<img src="<?php echo site_url('assets/img/')?>logo-W.png" alt="logo Diamond">
								<br>
								<p>About us Paragraph</p>
							</td>
							<td>
								<div class="outline">
									<i class="fa fa-phone" aria-hidden="false"></i> Hotline
									<br>
									<a class="link-primary" href="tel:0869 770 333">
										<h2>0869 770 333</h2>
									</a>
								</div>

								<div class="outline">
									<i class="fa fa-phone" aria-hidden="false"></i> Tel
									<br>
									<a class="link-primary" href="tel:(024) 22 393 599">
										<h2>(024) 22 393 599</h2>
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
							<a href="<?php echo base_url('chuyen-muc/dich-vu') ?>"><?php echo $this->lang->line('services') ?></a>
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

<div id="fb-chat-box-area">
	<div id="button">
		<button id="open-chat-box">
			<i class="fa fa-comments fa-2x" aria-hidden="false"></i>
		</button>

		<div id="fb-chat-box">
			<div class="heading">
				Talk to us <button class="pull-right" id="close-chat-box"> <i class="fa fa-close"></i> </button>
			</div>
			<div class="fb-page" data-href="https://www.facebook.com/Mato-Creative-330391013990260/" data-tabs="messages" data-width="400" data-height="300" data-small-header="true" data-adapt-container-width="false" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Mato-Creative-330391013990260/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Mato-Creative-330391013990260/">Mato Creative</a></blockquote></div>
		</div>
	</div>

</div>

<script>

    $('#fb-chat-box').hide();
	$(document).ready(function(){
	    $('#open-chat-box').click(function(){
	       $('#fb-chat-box').fadeIn();
		});
        $('#close-chat-box').click(function(){
            $('#fb-chat-box').fadeOut();
        });
	});
</script>


<script src="<?php echo site_url('assets/lib/bootstrap/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?php echo site_url('assets/lib/bootstrap/js/daterangepicker.js') ?>"></script>
<script src="<?php echo site_url('assets/js/') ?>main.js"></script>
<script src="<?php echo site_url('assets/js/') ?>client.js"></script>

</body>
</html>
