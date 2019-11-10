


    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-bg-cyan">
                    <li><a href="<?= base_url(); ?>dashboard/"><i class="material-icons">home</i> Home</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Data Master</a></li>
                    <li class="active"><i class="material-icons">archive</i> Data Product</li>
                </ol>
            </div>
            <?php if($this->session->flashdata('text')){ ?>
                <p style="display:none;" id="text"><?= $this->session->flashdata('text'); ?></p>
                <p style="display:none;" id="icon"><?= $this->session->flashdata('icon'); ?></p>
                <p style="display:none;" id="title"><?= $this->session->flashdata('title'); ?></p>
            <?php } ?>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Product
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                <a href="" onClick="insertProduct()" data-toggle="modal" data-target="#insert"style="text-decoration:none; color: #010;" ><i style="cursor:pointer;" class="material-icons">add_circle</i> <span style="position:relative;bottom:4px;" class="icon-name">Tambah Data</span></a>
                                </li>
                            </ul>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NIK</th>
                                            <th>Nama </th>
                                            <th>Umur</th>
                                            <th>Status Perkawinan</th>
                                            <th>Pendidikan</th>
                                            <th>Pekerjaan</th>
                                            <th>Penghasilan</th>
                                            <th>Label</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>#</th>
                                            <th>NIK</th>
                                            <th>Nama </th>
                                            <th>Umur</th>
                                            <th>Status Perkawinan</th>
                                            <th>Pendidikan</th>
                                            <th>Pekerjaan</th>
                                            <th>Penghasilan</th>
                                            <th>Label</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       <?php $i = 0; foreach($data as $row){ $i++;?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $row['nik']; ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['umur'] ;?></td>
                                            <td><?= $row['status_perkawinan']; ?></td>
                                            <td><?= $row['pendidikan']; ?></td>
                                            <td><?= $row['status_pekerjaan']; ?></td>
                                            <td>Rp. <?= number_format($row['penghasilan'],2,",","."); ?></td>
                                            <td><?= $row['labels']; ?></td>
                                        </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MODAL DELETE -->
    <div class="modal fade" id="DELETE" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-col-teal">
                        <div class="modal-header" style="border-bottom:2px solid #fff;">
                            <h4 class="modal-title" style="margin-bottom:10px;"  id="defaultModalLabel">Hapus Data Product</h4>
                            
                        </div>
                        <div class="modal-body"  style="background-color:;">
                        <form id="form-delete"  method="post">
                            <div class="row clearfix" style="margin-top:20px;">
                                    <div class="col-sm-12">
                                        <center>
                                        <h1>WARNING !!</h1>
                                        <h5>Anda yakin ingin menghapus data tersebut ?</h5>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

