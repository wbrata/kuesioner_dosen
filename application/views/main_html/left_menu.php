        <div class="col-md-3 left_col menu_fixed" style="overflow: visible;">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
<!--               <a href="<?=base_url('admin/index/')?>" class="site_title">
                <img src="<?=base_url()?>/assets/images/logo-title.jpeg"/>                
              </a>   -->            
              <a href="<?=base_url('admin/index/')?>" class="site_title">
                <!-- <img class="mCS_img_loaded" src="<?=base_url()?>/assets/images/logo-md.jpeg"/> <span>WETA</span>                 -->
              </a>
              <!-- <i class="fa fa-paw"></i> <span>WETA</span> -->
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="<?=base_url()?>/assets/upload_foto/user.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2><?=$this->session->userdata('nama')?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
              <h3>&nbsp;</h3>
                <ul class="nav side-menu">
                  <li>
                    <a href="<?=base_url('mahasiswa/index/')?>"><i class="fa fa-home"></i> Data Kuisioner</a>                
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="NONE">
                <span class="glyphicon glyphicon-none" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="NONE">
                <span class="glyphicon glyphicon-none" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?=base_url('mahasiswa/index/logout')?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>