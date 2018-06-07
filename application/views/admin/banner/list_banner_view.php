<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper">
    <section class="content row">
        <div class="col-md-12">
            <div >
                <span><?php echo $this->session->flashdata('message'); ?></span>
            </div>
            <div >
                <a type="button" href="<?php echo site_url('admin/banner/create'); ?>" class="btn btn-primary">ADD NEW</a>
            </div>
            <div >
                <div  style="margin-top: 10px;">
                    <table class="table table-hover table-bordered table-condensed">
                    	<?php if ($result): ?>
			                <tr>
				                <td><b><a href="#">Title</a></b></td>
				                <td><b><a href="#">Image</a></b></td>
				                <td><b><a href="#">Url</a></b></td>
				                <td><b><a href="#">Active</a></b></td>
				                <td><b>Operations</b></td>
			                </tr>
			                <?php foreach ($result as $key => $value): ?>
		                        <tr>
		                            <td><?php echo $value['text'] ?></td>
		                            <td><img src="<?php echo base_url('assets/upload/banners/'.$value['image']) ?>"></td>
		                            <td><?php echo $value['url'] ?></td>

		                            <?php if ($value['is_actived'] == 1): ?>
                                        <td><button class="btn btn-success btn-is-active" data-id="<?php echo $value['id'] ?>"  title="Tắt banner"><i class="fa fa-check" aria-hidden="true"></i></button></td>
                                    <?php else: ?>
                                        <td><button class="btn btn-danger btn-not-active" data-id="<?php echo $value['id'] ?>"  title="Bật banner"><i class="fa fa-times" aria-hidden="true"></i></button></td>
                                    <?php endif ?>

		                            <td>
		                            <a href="" title="Xóa" class="btn-remove" data-id="" >
		                            <i class="fa fa-trash-o" aria-hidden="true"></i>
		                        </tr>
	                        <?php endforeach ?>
						<?php else: ?>
                        	<tr class="odd"><td colspan="9">No records</td></tr>
                        <?php endif ?>
                    </table>
		            <div class="col-md-6 col-md-offset-5">
		                <!-- <?php echo $page_links; ?> -->
		            </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
	var base_url = location.protocol + "//" + location.host + (location.port ? ':' + location.port : '')+'/hnx/';
	$('.btn-is-active').click(function(e){
		e.preventDefault()
	    var btn_check = $(this);
	    var id = $(this).attr('data-id');
	    if(confirm('Tắt banner?')){
	        jQuery.ajax({
	            method: "get",
	            url: base_url + 'admin/banner/active',
	            // url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tuoithantien/comment/create_comment",
	            data: {id : id},
	            success: function(result){
	                if(JSON.parse(result).isExists == false){
	                    alert('false');
	                }else{
	                    window.location.reload();
	                }
	            }
	        });
	    };
	});

	$('.btn-not-active').click(function(){
	    var btn_check = $(this);
	    var id = $(this).attr('data-id');
	    if(confirm('Kích hoạt banner?')){
	        jQuery.ajax({
	            method: "get",
	            url: base_url + 'admin/banner/active',
	            // url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tuoithantien/comment/create_comment",
	            data: {id : id},
	            success: function(result){
	                if(JSON.parse(result).isExists == false){
	                    alert('false');
	                }else{
	                    window.location.reload();
	                }
	            }
	        });
	    };
	})
</script>
