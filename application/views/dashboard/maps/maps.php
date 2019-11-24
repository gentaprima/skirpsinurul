
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
            <ol class="breadcrumb breadcrumb-bg-cyan">
                    <li><a href="<?= base_url(); ?>dashboard/"><i class="material-icons">home</i> Home</a></li>
                    <li><a href="<?= base_url(); ?>dashboard/maps/"><i class="material-icons">add_location</i> Maps </a></li>
                </ol>
            </div>

            <div stlye="display:none;" id="check"></div>
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>Peta Pulogadung <?= $tahun; ?></h2>
                                </div>

                                <button  data-target="#insert" data-toggle="modal" type="submit" style="float:right; position:relative;right:12px;bottom:14px;" class="btn btn-primary m-t-15 waves-effect">Pilih Tahun</button>
                                
                            </div>
                        </div>
                        <div class="body">
                            <div id="mapid" style="height:500px;z-index:0;"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
        </div>
    </section>
    
    <!-- MODAL INSERT -->
    <div class="modal fade" id="insert" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-col-teal">
                        <div class="modal-header">
                            <h4 id="header" class="modal-title" style="margin-bottom:10px;"  id="defaultModalLabel">Pilih Tahun</h4>
                            
                        </div>
                        <div class="modal-body"  style="background-color: #fff;">
                        <form id="form" action="<?= base_url() ?>dashboard/maps/" method="post">
                            <div class="row clearfix" style="margin-top:20px;">
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select name="tahun" id="tahun" class="form-control show-tick">
                                                    <option value="">-- Pilih Tahun --</option>
                                                    <option value="2012">2012</option>
                                                    <option value="2013">2013</option>
                                                    <option value="2014">2014</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                </select>
                                            </div>
                                        </div>
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