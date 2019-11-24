<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-bg-cyan">
                    <li><a href="<?= base_url(); ?>dashboard/"><i class="material-icons">home</i> Home</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Update Penerima Bansos </a></li>
                </ol>
            </div>

            <?php if($this->session->flashdata('text')){ ?>
                <p style="display:none;" id="text"><?= $this->session->flashdata('text'); ?></p>
                <p style="display:none;" id="icon"><?= $this->session->flashdata('icon'); ?></p>
                <p style="display:none;" id="title"><?= $this->session->flashdata('title'); ?></p>
            <?php } ?>
            <!-- Vertical Layout | With Floating Label -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Update Penerima Bansos
                                <!-- <small>With floating label</small> -->
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <?php foreach($data_penerima as $row){ ?>
                            <form method="post" action="<?= base_url() ?>dashboard/prosesUpdate/">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="nik" value="<?= $row['nik']; ?>" readonly id="nik" class="form-control">
                                        <label class="form-label">NIK</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="nama" value="<?= $row['nama']; ?>" name="nama" class="form-control">
                                        <label class="form-label">Nama</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" id="umur" value="<?= $row['umur'] ;?>" name="umur" class="form-control">
                                        <label class="form-label">Umur</label>
                                    </div>
                                </div>
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" id="jml_tanggungan" value="<?= $row['tanggungan'] ;?>" min="1" name="jml_tanggungan" class="form-control">
                                        <label class="form-label">Jumlah Tanggungan</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="penghasilan" value="<?= $row['penghasilan'] ;?>"  min="1" name="penghasilan" class="form-control">
                                        <label class="form-label">Penghasilan</label>
                                    </div>
                                </div>
                                <input type="hidden" value="<?= $row['id_bansos']; ?>" name="id_bansos">
                                <input type="hidden" value="<?= $row['id_detail']; ?>" name="id_detail">
                                <input type="hidden" value="<?= $row['tahun']; ?>" name="tahun">
                               
                                <div class="form-group form-float">
                                            <div class="form-line">
                                                <select name="status_pd" id="status_pd" class="form-control show-tick">
                                                    <option value="<?= $row['pendidikan'] ?>"><?= $row['pendidikan'] ?></option>
                                                    <option value="">-- Pilih Jenis Pendidikan --</option>
                                                    <option value="SD/SDLB">SD/SDLB </option>
                                                    <option value="Paket A  M. Ibtidaiyah"> Paket A  M. Ibtidaiyah</option> 
                                                    <option value="SMP/SMPLB">SMP/SMPLB </option>    
                                                    <option value="Paket B"> Paket B </option>    
                                                    <option value="M. Tsanawiyah">  M. Tsanawiyah </option>
                                                    <option value="  SMA/SMK/SMALB">  SMA/SMK/SMALB</option>
                                                    <option value="Paket C ">Paket C </option>   
                                                    <option value=" M. Aliyah"> M. Aliyah</option>
                                                    <option value="Perguruan Tinggi">Perguruan Tinggi</option>
                                                </select>
                                               
                                            </div>
                                        </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="status_peker" id="status_peker" class="form-control show-tick">
                                            <option value="<?= $row['status_pekerjaan'] ?>"><?= $row['status_pekerjaan'] ?></option>
                                            <option value="">-- Pilih Jenis Pekerjaan --</option>
                                            <option value="Berusaha sendiri">Berusaha sendiri</option> 
                                            <option value="Berusaha dibantu buruh tidak tetap/tidak dibayar">Berusaha dibantu buruh tidak tetap/tidak dibayar</option>
                                            <option value="Berusaha dibantu buuruh tetap/dibayar">Berusaha dibantu buuruh tetap/dibayar</option>  
                                            <option value="Buruh/Karyawan/Pegawai Swasta">Buruh/Karyawan/Pegawai Swasta</option>   
                                            <option value="PNS/TNI/Polri/BUMN/BUMD/Anggota Legislatif">PNS/TNI/Polri/BUMN/BUMD/Anggota Legislatif</option>  
                                            <option value="Pekerja bebas pertanian">Pekerja bebas pertanian</option>    
                                            <option value="Pekerjaan bebas non pertanian">Pekerjaan bebas non pertanian</option>   
                                            <option value="Pekerja Keluarga/tidak dibayar">Pekerja Keluarga/tidak dibayar</option>  
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="status_pk" id="status_pk" class="form-control show-tick">
                                            <option value="<?= $row['status_perkawinan'] ?>"><?= $row['status_perkawinan'] ?></option>
                                            <option value="">-- Pilih Status Perkawinan --</option>
                                            <option value="Kawin">Kawin</option>
                                            <option value="Belum Kawin">Belum Kawin</option>
                                            <option value="Cerai Mati">Cerai Mati</option>
                                            <option value="Cerai Hidup">Cerai Hidup</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="kelurahan" id="kelurahan" class="form-control show-tick">
                                            <?php foreach($data_penerima as $row){ ?>
                                           <option value="<?= $row['id_kelurahan'] ?>"><?= $row['nama_kelurahan'] ?></option>
                                            <?php } ?>
                                            <option value="">-- Pilih Kelurahan --</option>
                                            <?php foreach($kelurahan as $row){ ?>
                                                <option value="<?= $row['id_kelurahan']; ?>"><?= $row['nama_kelurahan']; ?></option>
                                            <?php } ?>
                                        
                                        </select>
                                    </div>
                                </div>
                                <?php foreach($data_penerima as $bantuan){ ?>
                                <label for="">Jenis Bantuan Sosial</label>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="checkbox" <?php if($bantuan['kip'] == 1){echo "checked";} ?>  value="1" name="kip" id="kip" class="filled-in">
                                                <label for="kip">Kartu Indonesia Pintar</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="checkbox" <?php if($bantuan['bsp'] == 1){echo "checked";} ?> value="1" name="bsp" id="bsp" class="filled-in">
                                                <label for="bsp">Bantuan Sosial Pangan</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="checkbox" <?php if($bantuan['pbi_jk'] == 1){echo "checked";} ?> value="1" name="pbi_jk" id="pbi-jk" class="filled-in">
                                                <label  for="pbi-jk">Program Bantuan Iuran - Jaminan Kesehatan </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="checkbox" <?php if($bantuan['pkh'] == 1){echo "checked";} ?> value=1 name="pkh" id="pkh" class="filled-in">
                                                <label for="pkh">Program Keluarga Harapan </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <!-- Akhir Row -->
                                <br>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                                <button type="reset" class="btn btn-default m-t-15 waves-effect">Reset</button>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Vertical Layout | With Floating Label -->
        </div>
    </section>