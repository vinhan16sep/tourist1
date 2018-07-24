<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tùy biến của khách hàng
            <small>Danh sách Tùy biến của khách hàng</small>
        </h1>
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf" />
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Tùy biến của khách hàng</a></li>
            <li class="active">
                <?php
                    switch ($this->uri->segment(3)) {
                        case 'success':
                            echo 'Đặt tour thành công';
                            break;
                        case 'cancel':
                            echo 'Tour đã hủy bỏ';
                            break;
                        default:
                            echo 'Chờ xác nhận';
                            break;
                    }
                ?>
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3>
                        <?php
                            switch ($this->uri->segment(3)) {
                                case 'success':
                                echo 'Đặt tour thành công';
                                break;
                                case 'cancel':
                                echo 'Tour đã hủy bỏ';
                                break;
                                default:
                                echo 'Chờ xác nhận';
                                break;
                            }
                        ?>
                        </h3>
                    </div>
                        <?php $action = ($this->uri->segment(3) != '') ? $this->uri->segment(3) : 'index' ?>
                        <form action="<?php echo base_url('admin/customize/' .$action) ?>" method="get">
                            <div class="input-group col-md-6" style="float: left;border-right: 5px solid white;">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" value="<?php echo (isset($date))? $date : '';  ?>" class="form-control pull-right" id="reservation" name="date" readonly>
                            </div>

                            <div class="input-group col-md-6" style="float: left;">
                                <input type="text" value="<?php echo (isset($keywords))? $keywords : '';  ?>" class="form-control" placeholder="Tìm kiếm ..." name="search" value="">
                                <span class="input-group-btn">
                                    <input type="submit" class="btn btn-block btn-primary" value="Tìm kiếm">
                                </span>
                            </div>
                        </form>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="" style="margin-top: 40px;">
                            <table id="table" class="table table-hover">
                                <?php if (!empty($booking)): ?>
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Họ Tên</th>
                                            <th>Tên Tour</th>
                                            <th>Thời Gian</th>
                                            <th>Xem thêm</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                <?php endif ?>
                                <tbody>
                                    <?php if ($booking): ?>
                                        <?php foreach ($booking as $key => $value): ?>
                                        <?php $i = 1 ?>
                                            <tr class="row-status-<?php echo $value['customize_id']; ?>">
                                                <td><?php echo $i++ ?></td>
                                                <td><?php echo $value['first_name']. ' ' .$value['last_name'] ?></td>
                                                <td><?php echo $value['product_title'] ?></td>
                                                <td>
                                                    <?php
                                                        if($value['time'] != "0000-00-00 00:00:00" && $value['time'] != "1970-01-01 08:00:00"){
                                                            $time = explode("-",str_replace(" 00:00:00","",$value['time']));
                                                            if(count($time) == 3){
                                                                echo $time[2]."/".$time[1]."/".$time[0];
                                                            }
                                                        }
                                                    ?>
                                                </td>

                                                <td><a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse_<?php echo $value['customize_id']; ?>" aria-expanded="false" aria-controls="collapseExample">
                                                    Chi Tiết
                                                </a></td>
                                                
                                                <td>
                                                    <a href="<?php echo base_url('admin/product/detail/'. $value['product_id'] .'?refer=true') ?>" class="dataActionEdit" title="So Sánh"><i class="fa fa-eye" aria-hidden="true"></i> </a>
                                                    &nbsp&nbsp
                                                    <?php if ($value['status'] != 2 && $value['status'] != 1): ?>
                                                        <a href="javascript:void(0);" class="dataActionDelete status-success" data-id="<?php echo $value['customize_id'] ?>" data-controller="customize" ><i class="fa fa-check" aria-hidden="true"></i> </a>
                                                    <?php endif ?>
                                                    &nbsp&nbsp
                                                    <?php if ($value['status'] != 2): ?>
                                                        <a href="javascript:void(0);" class="dataActionDelete status-cancel" data-id="<?php echo $value['customize_id'] ?>" data-controller="customize" style="color: red"><i class="fa fa-times" aria-hidden="true"></i> </a>
                                                    <?php endif ?>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <div class="collapse" id="collapse_<?php echo $value['customize_id']; ?>">
                                                        <div class="well">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Email</th>
                                                                        <th>Số Điện Thoại</th>
                                                                        <th>Số người lớn</th>
                                                                        <th>Trẻ em (2 - 11 tuổi)</th>
                                                                        <th>Em bé (dưới 2 tuổi)</th>
                                                                        <th>Quốc Gia</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><?php echo $value['email'] ?></td>
                                                                        <td><?php echo $value['phone'] ?></td>
                                                                        <td><?php echo $value['adults'] ?></td>
                                                                        <td><?php echo $value['children'] ?></td>
                                                                        <td><?php echo $value['infants'] ?></td>
                                                                        <td><?php echo $value['country'] ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <th colspan="6">Lời Nhắn: </th>
                                                                        <td><?php echo $value['message'] ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Ngày</th>
                                                                        <th>Chương trình mặc định</th>
                                                                        <th>Chương trình thay đổi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $h=1; ?>
                                                                    <?php foreach ($value['array_date'] as $k => $val): ?>
                                                                        <tr>
                                                                            <td><?php echo $h;?></td>
                                                                            <td><?php echo $k; ?></td>
                                                                            <td><?php echo $val; ?></td>
                                                                        </tr>
                                                                        <?php $h++;?>
                                                                    <?php endforeach ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php else: ?>
                                        <tr>
                                            <h4><?php echo NO_DATA;?></h4>
                                        </tr>
                                    <?php endif ?>
                                </tbody>
                                <?php if (!empty($booking)): ?>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Họ Tên</th>
                                            <th>Tên Tour</th>
                                            <th>Thời Gian</th>
                                            <th>Xem thêm</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                <?php endif; ?>
                            </table>
                        </div>
						<div class="col-md-6 col-md-offset-5 page">
                            <?php echo $page_links ?>
						</div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->
    </section>
</div>
<script>
$(function () {
    $('#reservation').mouseup(function() {
        $('#reservation').daterangepicker({
           format: 'DD/MM/YYYY',
        });
        $(".ranges").css("display","none");
        $(".calendar").mouseover(function(){
           $("#reservation").val($("input[name=daterangepicker_start]").val()+" - "+$("input[name=daterangepicker_end]").val());
           $(".second.right tbody .available").mousedown(function(){
               $(".daterangepicker.dropdown-menu.show-calendar.opensleft").css("display","none");
           });
        });
    });
});
</script>