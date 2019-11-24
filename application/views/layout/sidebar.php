<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?= base_url() ?>assets/dashboard/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata('users_id'); ?></div>
                    <div class="email"><?= $this->session->userdata('email'); ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <!-- <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li> -->
                            
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url(); ?>login/logout/"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="<?php if(!empty($active_home)){echo $active_home;} ?>">
                        <a href="<?= base_url(); ?>dashboard/">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="<?php if(!empty($active_tambah)){ echo $active_tambah;} ?>">
                        <a href="<?= base_url(); ?>dashboard/tambah_penerima/">
                            <i class="material-icons">add_to_queue</i>
                            <span>Input Penerima Bansos</span>
                        </a>
                    </li>
                    <li class="<?php if(!empty($active_maps)){echo "active";} ?>">
                        <a href="<?= base_url(); ?>dashboard/maps/">
                            <i class="material-icons">add_location</i>
                            <span>Peta</span>
                        </a>
                    </li>
                    <li class="<?php if(!empty($active_kemiskinan) || !empty($active_bantuan)){echo "active";} ?>">
                        <a href="javascript:void(0);" class="menu-toggle ">
                            <i class="material-icons">equalizer</i>
                            <span>Statistik</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php if(!empty($active_kemiskinan)){echo "active";} ?>">
                                <a href="<?= base_url(); ?>dashboard/statistik_kemiskinan/" class="">
                                    <span>Statistik Kemiskinan</span>
                                </a>
                            </li>
                            <li class="<?php if(!empty($active_bantuan)){echo "active";} ?>">
                                <a href="<?= base_url() ?>dashboard/statistik_bantuan/" >
                                    <span>Statistik Jenis Bansos</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php if(!empty($active_data)){$active_data;} ?>">
                        <a href="<?= base_url(); ?>dashboard/list_data/">
                            <i class="material-icons">storage</i>
                            <span>Tabulasi Data</span>
                        </a>
                    </li>
                    <li class="<?php if(!empty($active_laporan)){echo $active_laporan;} ?>">
                        <a href="<?= base_url() ?>dashboard/laporan/">
                            <i class="material-icons">library_books</i>
                            <span>Laporan</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2019<a href="#"> Dashboard - Pusdatin Kemsos</a>.
                </div>
                <div class="version">
                    <!-- <b>Version: </b> 1.0.5 -->
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->