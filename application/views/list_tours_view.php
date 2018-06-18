<!-- Tours Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>tours.min.css">

<section id="head-cover" class="container-fluid" style="background-image: url('https://images.unsplash.com/photo-1438955185657-797f29aeaea8?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=736daac70975c507e67e7c8bf5589c08&auto=format&fit=crop&w=1350&q=80')"></section>

<section id="page">
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('') ?>"><?php echo $this->lang->line('home') ?></a></li>
			<li class="active">This page</li>
		</ol>

		<div class="section-header">
			<div class="row">
				<div class="col-xs-12">
					<h1>Tour Category</h1>
					<p>Phasellus pretium turpis mauris, eu tincidunt nisi tincidunt tincidunt. Quisque lectus augue, convallis eget neque ut, interdum iaculis urna. Nam et diam quis mi cursus eleifend. Sed urna nisi, ultrices nec risus lacinia, convallis efficitur lorem. Vivamus pellentesque dignissim augue, sed interdum enim iaculis pharetra. Curabitur semper nulla suscipit velit sodales pulvinar. Curabitur lacinia fringilla dictum. Nam a dictum justo. Sed ultrices sed tellus non ornare. Ut ante elit, scelerisque a odio at, imperdiet porttitor dui. Suspendisse eu molestie velit, ut accumsan sem. Ut egestas ultricies nulla et vestibulum. Integer vitae fermentum risus. Nulla quam sem, viverra in nunc sed, mollis hendrerit nibh. Sed eu enim nibh. Ut vel efficitur lacus, a accumsan mauris.</p>
					<p>Proin dolor odio, hendrerit in sapien eleifend, rutrum mattis est. Vestibulum porta sollicitudin urna, eu congue arcu dignissim eu. Quisque finibus nisi et eros blandit volutpat. Mauris imperdiet, elit sed ornare pulvinar, erat lectus sodales eros, a egestas libero magna non enim. Nam feugiat volutpat ipsum sit amet fermentum. Mauris dapibus massa orci, vel venenatis dui tincidunt nec. Donec ultrices felis a iaculis sollicitudin. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				</div>
			</div>
		</div>

		<div id="tours" class="section">
			<div class="row">

                <?php
                $image =
                    array (
                        "https://images.unsplash.com/photo-1449034446853-66c86144b0ad?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=7402cc297bdfbb4a4856e764971dc013&auto=format&fit=crop&w=1950&q=80",
                        "https://images.unsplash.com/photo-1485738422979-f5c462d49f74?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=7baf4d3346ed57b7b14ac88eac57d2e3&auto=format&fit=crop&w=1975&q=80",
                        "https://images.unsplash.com/photo-1464809142576-df63ca4ed7f0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=ff20b264fa7c4bf102ad0266eb5f8724&auto=format&fit=crop&w=934&q=80",
                        "https://images.unsplash.com/photo-1449034446853-66c86144b0ad?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=7402cc297bdfbb4a4856e764971dc013&auto=format&fit=crop&w=1950&q=80",
                        "https://images.unsplash.com/photo-1528649659491-23edddd0b98a?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=2cc42216ea138878b0a6b39418ca6855&auto=format&fit=crop&w=1951&q=80",
                        "https://images.unsplash.com/photo-1495464597927-7137252f7d73?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=41203ca8f65d6ae05ccae4c6f6628ebd&auto=format&fit=crop&w=934&q=80"
                    )
                ?>
                <?php foreach ($image as $value): ?>
					<div class="item col-md-4 col-6 col-xs-12">
						<div class="mask">
							<img src="<?php echo $value ?>" alt="image">

							<div class="overview">
								<div class="head">
									<span class="sub-header">Tour Kind</span>
									<h3>Tour Title</h3>
								</div>
								<div class="body">
									<h2 class="price">999.000.000vnd</h2>
								</div>
							</div>
							<div class="content">
								<div class="head">
									<span class="sub-header">Tour Kind</span>
									<h4>Tour Title</h4>
									<h3 class="price">999.000.000vnd</h3>
								</div>
								<div class="body">
									<table class="table">
										<tr>
											<td><?php echo $this->lang->line('tour-detail-duration') ?></td>
											<td>5Ds 4Ns</td>
										</tr>
										<tr>
											<td><?php echo $this->lang->line('tour-detail-start') ?></td>
											<td>Datetime</td>
										</tr>
									</table>
								</div>
								<div class="foot">
									<a href="<?php echo base_url('') ?>" class="btn btn-primary" role="button">
                                        <?php echo $this->lang->line('explore') ?>
									</a>
								</div>
							</div>
						</div>
					</div>
                <?php endforeach; ?>
			</div>
		</div>
	</div>
</section>