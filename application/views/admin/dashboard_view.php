

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $product; ?></h3>

                        <p>Số Tours</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sort-numeric-asc"></i>
                    </div>
                    <a href="<?php echo base_url('admin/product'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $location; ?></h3>

                        <p>Số điểm đến</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sort-numeric-asc"></i>
                    </div>
                    <a href="<?php echo base_url('admin/localtion'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $post; ?></h3>

                        <p>Số bài viết</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sort-numeric-asc"></i>
                    </div>
                    <a href="<?php echo base_url('admin/post'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <!-- booking tabs (Charts with tabs)-->
                <div class="nav-tabs-booking">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-right">
                        <li class="active"><a href="#booking_preprocessor" data-toggle="tab">Chờ xử lý</a></li>
                        <li><a href="#booking_success" data-toggle="tab">Hoàn thành</a></li>
                        <li><a href="#booking_error" data-toggle="tab">Đã hủy</a></li>
                    </ul>
                    <h4 class="pull-left header"><a href="<?php echo base_url('admin/booking');?>"><i class="fa fa-inbox"></i> Đặt tour</a></h4>
                    <div class="tab-content no-padding">
                        <!-- Morris chart - Sales -->
                        <div class="chart tab-pane active" id="booking_preprocessor" style="position: relative">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="table" class="table table-hover">
                                        <thead>
                                            <?php if (!empty($booking_preprocessor)): ?>
                                                <tr>
                                                    <th>Họ Tên</th>
                                                    <th>Thời gian</th>
                                                    <th>Tour</th>
                                                    <th>Email</th>
                                                    <th>Số điện thoại</th>
                                                </tr>
                                            <?php endif ?>
                                        </thead>
                                        <tbody>
                                            <?php if ($booking_preprocessor): ?>
                                                <?php foreach ($booking_preprocessor as $key => $value): ?>
                                                <?php $i = 1 ?>
                                                    <tr class="row-status-<?php echo $value['booking_id']; ?>">
                                                        <td><?php echo $value['first_name']. ' ' .$value['last_name'] ?></td>
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
                                                        <td><a href="<?php echo base_url('admin/product/detail/' .$value['product_id']) ?>"><?php echo $value['product_title'] ?></a></td>
                                                        <td><?php echo $value['email'] ?></td>
                                                        <td><?php echo $value['phone'] ?></td>

                                                    </tr>
                                                <?php endforeach ?>
                                            <?php else: ?>
                                                <tr>
                                                    Chưa có đơn đặt tour nào
                                                </tr>
                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <a href="<?php echo base_url('admin/booking');?>" class="btn btn-success right" style="float: right;">More info <i class="fa fa-arrow-circle-right"></i></a>
                            <!-- /.box-body -->
                        </div>
                        <div class="chart tab-pane" id="booking_success" style="position: relative">

                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="table" class="table table-hover">
                                        <thead>
                                            <?php if (!empty($booking_success)): ?>
                                                <tr>
                                                    <th>Họ Tên</th>
                                                    <th>Thời gian</th>
                                                    <th>Tour</th>
                                                    <th>Email</th>
                                                    <th>Số điện thoại</th>
                                                </tr>
                                            <?php endif ?>
                                        </thead>
                                        <tbody>
                                            <?php if ($booking_success): ?>
                                                <?php foreach ($booking_success as $key => $value): ?>
                                                <?php $i = 1 ?>
                                                    <tr class="row-status-<?php echo $value['booking_id']; ?>">
                                                        <td><?php echo $value['first_name']. ' ' .$value['last_name'] ?></td>
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
                                                        <td><a href="<?php echo base_url('admin/product/detail/' .$value['product_id']) ?>"><?php echo $value['product_title'] ?></a></td>
                                                        <td><?php echo $value['email'] ?></td>
                                                        <td><?php echo $value['phone'] ?></td>

                                                    </tr>
                                                <?php endforeach ?>
                                            <?php else: ?>
                                                <tr>
                                                    Chưa có đơn đặt tour nào hoàn thành
                                                </tr>
                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <a href="<?php echo base_url('admin/booking/success');?>" class="btn btn-success right" style="float: right;">More info <i class="fa fa-arrow-circle-right"></i></a>
                            <!-- /.box-body -->
                        </div>
                        <div class="chart tab-pane" id="booking_error" style="position: relative">

                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="table" class="table table-hover">
                                        <thead>
                                            <?php if (!empty($booking_error)): ?>
                                                <tr>
                                                    <th>Họ Tên</th>
                                                    <th>Thời gian</th>
                                                    <th>Tour</th>
                                                    <th>Email</th>
                                                    <th>Số điện thoại</th>
                                                </tr>
                                            <?php endif ?>
                                        </thead>
                                        <tbody>
                                            <?php if ($booking_error): ?>
                                                <?php foreach ($booking_error as $key => $value): ?>
                                                <?php $i = 1 ?>
                                                    <tr class="row-status-<?php echo $value['booking_id']; ?>">
                                                        <td><?php echo $value['first_name']. ' ' .$value['last_name'] ?></td>
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
                                                        <td><a href="<?php echo base_url('admin/product/detail/' .$value['product_id']) ?>"><?php echo $value['product_title'] ?></a></td>
                                                        <td><?php echo $value['email'] ?></td>
                                                        <td><?php echo $value['phone'] ?></td>

                                                    </tr>
                                                <?php endforeach ?>
                                            <?php else: ?>
                                                <tr>
                                                    Chưa có đơn đặt tour nào hủy
                                                </tr>
                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <a href="<?php echo base_url('admin/booking/cancel');?>" class="btn btn-success right" style="float: right;">More info <i class="fa fa-arrow-circle-right"></i></a>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
                <hr style="border:solid 1px grey">
                <!-- /.nav-tabs-customize --><!-- Custom tabs (Charts with tabs)-->
                <div class="nav-tabs-customize">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-right">
                        <li class="active"><a href="#customize_preprocessor" data-toggle="tab">Chờ xử lý</a></li>
                        <li><a href="#customize_success" data-toggle="tab">Hoàn thành</a></li>
                        <li><a href="#customize_error" data-toggle="tab">Đã hủy</a></li>
                    </ul>
                    <h4 class="pull-left header"><a href="<?php echo base_url('admin/customize');?>"><i class="fa fa-inbox"></i> Tùy biến khách hàng</a></h4>
                    <div class="tab-content no-padding">
                        <!-- Morris chart - Sales -->
                        <div class="chart tab-pane active" id="customize_preprocessor" style="position: relative">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="table" class="table table-hover">
                                        <thead>
                                            <?php if (!empty($customize_preprocessor)): ?>
                                                <tr>
                                                    <th>Họ Tên</th>
                                                    <th>Thời gian</th>
                                                    <th>Tour</th>
                                                    <th>Email</th>
                                                    <th>Số điện thoại</th>
                                                </tr>
                                            <?php endif ?>
                                        </thead>
                                        <tbody>
                                            <?php if ($customize_preprocessor): ?>
                                                <?php foreach ($customize_preprocessor as $key => $value): ?>
                                                <?php $i = 1 ?>
                                                    <tr class="row-status-<?php echo $value['customize_id']; ?>">
                                                        <td><?php echo $value['first_name']. ' ' .$value['last_name'] ?></td>
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
                                                        <td><a href="<?php echo base_url('admin/product/detail/' .$value['product_id']) ?>"><?php echo $value['product_title'] ?></a></td>
                                                        <td><?php echo $value['email'] ?></td>
                                                        <td><?php echo $value['phone'] ?></td>

                                                    </tr>
                                                <?php endforeach ?>
                                            <?php else: ?>
                                                <tr>
                                                    Chưa có đơn đặt tour nào
                                                </tr>
                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <a href="<?php echo base_url('admin/customize');?>" class="btn btn-success right" style="float: right;">More info <i class="fa fa-arrow-circle-right"></i></a>
                            <!-- /.box-body -->
                        </div>
                        <div class="chart tab-pane" id="customize_success" style="position: relative">

                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="table" class="table table-hover">
                                        <thead>
                                            <?php if (!empty($customize_success)): ?>
                                                <tr>
                                                    <th>Họ Tên</th>
                                                    <th>Thời gian</th>
                                                    <th>Tour</th>
                                                    <th>Email</th>
                                                    <th>Số điện thoại</th>
                                                </tr>
                                            <?php endif ?>
                                        </thead>
                                        <tbody>
                                            <?php if ($customize_success): ?>
                                                <?php foreach ($customize_success as $key => $value): ?>
                                                <?php $i = 1 ?>
                                                    <tr class="row-status-<?php echo $value['customize_id']; ?>">
                                                        <td><?php echo $value['first_name']. ' ' .$value['last_name'] ?></td>
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
                                                        <td><a href="<?php echo base_url('admin/product/detail/' .$value['product_id']) ?>"><?php echo $value['product_title'] ?></a></td>
                                                        <td><?php echo $value['email'] ?></td>
                                                        <td><?php echo $value['phone'] ?></td>

                                                    </tr>
                                                <?php endforeach ?>
                                            <?php else: ?>
                                                <tr>
                                                    Chưa có đơn đặt tour nào hoàn thành
                                                </tr>
                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <a href="<?php echo base_url('admin/customize/success');?>" class="btn btn-success right" style="float: right;">More info <i class="fa fa-arrow-circle-right"></i></a>
                            <!-- /.box-body -->
                        </div>
                        <div class="chart tab-pane" id="customize_error" style="position: relative">

                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="table" class="table table-hover">
                                        <thead>
                                            <?php if (!empty($customize_error)): ?>
                                                <tr>
                                                    <th>Họ Tên</th>
                                                    <th>Thời gian</th>
                                                    <th>Tour</th>
                                                    <th>Email</th>
                                                    <th>Số điện thoại</th>
                                                </tr>
                                            <?php endif ?>
                                        </thead>
                                        <tbody>
                                            <?php if ($customize_error): ?>
                                                <?php foreach ($customize_error as $key => $value): ?>
                                                <?php $i = 1 ?>
                                                    <tr class="row-status-<?php echo $value['customize_id']; ?>">
                                                        <td><?php echo $value['first_name']. ' ' .$value['last_name'] ?></td>
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
                                                        <td><a href="<?php echo base_url('admin/product/detail/' .$value['product_id']) ?>"><?php echo $value['product_title'] ?></a></td>
                                                        <td><?php echo $value['email'] ?></td>
                                                        <td><?php echo $value['phone'] ?></td>

                                                    </tr>
                                                <?php endforeach ?>
                                            <?php else: ?>
                                                <tr>
                                                    Chưa có đơn đặt tour nào hủy
                                                </tr>
                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <a href="<?php echo base_url('admin/customize/cancel');?>" class="btn btn-success right" style="float: right;">More info <i class="fa fa-arrow-circle-right"></i></a>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
                <hr style="border:solid 1px grey">
                <!-- /.nav-tabs-customize -->

            </section>
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
