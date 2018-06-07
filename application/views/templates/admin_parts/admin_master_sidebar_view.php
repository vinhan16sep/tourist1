<?php
//if($this->ion_auth->logged_in()) {
//?>
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo site_url('assets/lib/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Alexander Pierce</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="<?php echo ($this->uri->segment(2) == '')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin') ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'about' || $this->uri->segment(2) == 'our_message' || $this->uri->segment(2) == 'our_methods')? 'active' : 'treeview' ?>">
                    <a href="">
                        <i class="fa fa-user-circle-o"></i>
                        <span>Giới Thiệu</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php echo ($this->uri->segment(2) == 'about')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/about') ?>"><i class="fa fa-group"></i> Giới Thiệu</a>
                        </li>
                        <li class="<?php echo ($this->uri->segment(2) == 'our_message')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/our_message') ?>"><i class="fa fa-comments-o"></i></i> Thông điệp</a>
                        </li>
                        <li class="<?php echo ($this->uri->segment(2) == 'our_methods')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/our_methods') ?>"><i class="fa fa-gears"></i> Phương Pháp</a>
                        </li>
                    </ul>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'courses')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/courses') ?>">
                        <i class="fa fa-book" aria-hidden="true"></i> <span>Khóa Học</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'document')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/document') ?>">
                        <i class="fa fa-file" aria-hidden="true"></i> <span>Tài Liệu</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'category' || $this->uri->segment(2) == 'blog')? 'active' : 'treeview' ?>">
                    <a href="">
                        <i class="fa fa-newspaper-o"></i>
                        <span>Bài Viết</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php echo ($this->uri->segment(2) == 'category')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/category') ?>"><i class="fa fa-filter"></i> Danh Mục Bài Viêt</a>
                        </li>
                        <li class="<?php echo ($this->uri->segment(2) == 'blog')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/blog') ?>"><i class="fa fa-list"></i> Danh Sách Bài Viêt</a>
                        </li>
                    </ul>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'register_courses')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/register_courses') ?>">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span>Đăng Ký Khóa Học</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'register_document')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/register_document') ?>">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span>Đăng Ký Tải Tài Liệu</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'landing')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/landing') ?>">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span>Landing Page</span>
                    </a>
                </li>
                <li class="header">DOCUMENTATION</li>
                <li>
                    <a href="<?php echo base_url('admin/documentation') ?>">
                        <i class="fa fa-book"></i> <span>Documentation</span>
                    </a>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
<?php //} ?>



