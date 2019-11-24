


    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-bg-cyan">
                    <li><a href="<?= base_url(); ?>dashboard/"><i class="material-icons">home</i> Home</a></li>
                    <li class="active"><i class="material-icons">archive</i> Laporan</li>
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
                                Laporan
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                <a href="<?= base_url() ?>dashboard/cetak"><button style="position:relative;bottom:10px;"class="btn bg-cyan btn-circle waves-effect waves-circle waves-float"><i class="material-icons">print</i> </button>
                                </a>
                                </li>
                            </ul>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tahun</th>
                                            <th>Mampu</th>
                                            <th>Kurang Mampu</th>
                                            <th>Tidak Mampu</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Tahun</th>
                                            <th>Mampu</th>
                                            <th>Kurang Mampu</th>
                                            <th>Tidak Mampu</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       
                                        <tr>
                                            <td>1</td>
                                            <td>2017</td>
                                            <td><?= $countMampu2017['jumlah'];?></td>
                                            <td><?= $countKurangMampu2017['jumlah'];?></td>
                                            <td><?= $countTdkMampu2017['jumlah'];?></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>2016</td>
                                            <td><?= $countMampu2016['jumlah'];?></td>
                                            <td><?= $countKurangMampu2016['jumlah'];?></td>
                                            <td><?= $countTdkMampu2016['jumlah'];?></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>2015</td>
                                            <td><?= $countMampu2015['jumlah'];?></td>
                                            <td><?= $countKurangMampu2015['jumlah'];?></td>
                                            <td><?= $countTdkMampu2015['jumlah'];?></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>2014</td>
                                            <td><?= $countMampu2014['jumlah'];?></td>
                                            <td><?= $countKurangMampu2014['jumlah'];?></td>
                                            <td><?= $countTdkMampu2014['jumlah'];?></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>2013</td>
                                            <td><?= $countMampu2013['jumlah'];?></td>
                                            <td><?= $countKurangMampu2013['jumlah'];?></td>
                                            <td><?= $countTdkMampu2013['jumlah'];?></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>2012</td>
                                            <td><?= $countMampu2012['jumlah'];?></td>
                                            <td><?= $countKurangMampu2012['jumlah'];?></td>
                                            <td><?= $countTdkMampu2012['jumlah'];?></td>
                                        </tr>
                                       
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

