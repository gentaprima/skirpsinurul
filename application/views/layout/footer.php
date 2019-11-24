

<!-- Jquery Core Js -->
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery/jquery.min.js"></script>


<!-- Bootstrap Core Js -->
<script src="<?= base_url() ?>assets/dashboard/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="<?= base_url() ?>assets/dashboard/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?= base_url() ?>assets/dashboard/plugins/node-waves/waves.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-countto/jquery.countTo.js"></script>

<!-- Morris Plugin Js -->
<script src="<?= base_url() ?>assets/dashboard/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/plugins/morrisjs/morris.js"></script>


<!-- Custom Js -->
<script src="<?= base_url() ?>assets/dashboard/js/admin.js"></script>
<!-- <script src="<?= base_url() ?>assets/dashboard/js/pages/index.js"></script> -->
<script src="<?= base_url() ?>assets/dashboard/js/pages/tables/jquery-datatable.js"></script>

<!-- Demo Js -->
<script src="<?= base_url() ?>assets/dashboard/js/demo.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <!-- Jquery DataTable Plugin Js -->
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/maps/leaflet/leaflet.js"></script>

<script>

var arrayMaps = <?= json_encode(array(
                            array(
                                "name" =>"Kelurahan Kayu Putih","location"=>"-6.1857441, 106.886575"),
                            array(
                                "name"=>"Kelurahan Pulogadung","location"=>"-6.185786, 106.893559"),
                            array(
                                "name"=>"Kelurahan Rawamangun","location"=>"-6.198948, 106.880779"),
                            array(
                                "name"=>"Kelurahan Jati","location"=>"-6.199252, 106.900273"),
                            array(
                                "name"=>"Kelurahan Pisangan Timur","location"=>"-6.208540, 106.877023"),
                            array(
                                "name"=>"Kelurahan Cipinang","location"=>"-6.208942, 106.895045"),
                            array(
                                "name"=>"Kelurahan Jatinegara Kaum","location"=>"-6.209196, 106.897815")
                            )); ?>;
</script>

<script>
var mymap = L.map('mapid').setView([-6.198908, 106.891189], 14);
var checkMap = document.getElementById("check");
    if(checkMap == null){
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mymap);
     mymap.touchZoom.disable();
            mymap.doubleClickZoom.disable();
            mymap.scrollWheelZoom.disable();
            mymap.boxZoom.disable();
            mymap.keyboard.disable();
             mymap.dragging.disable();
    
    mymap.scrollWheelZoom.disable();   
    }else{
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mymap);
            mymap.touchZoom.disable();
            mymap.doubleClickZoom.disable();
            mymap.scrollWheelZoom.disable();
            mymap.boxZoom.disable();
            mymap.keyboard.disable();
            // mymap.dragging.disable();

            $(".leaflet-control-zoom").css("visibility", "hidden");
    }


    function maps(){

    if(checkMap == null){
        for(var i = 0 ; i<=arrayMaps.length;i++){
        var location = arrayMaps[i]["location"].split(",");
        L.marker([location[0], location[1]]).addTo(mymap)
            .bindPopup(arrayMaps[i]['name']);
        
            }
    }else{
        for(var i = 0 ; i<=arrayMaps.length;i++){
        var location = arrayMaps[i]["location"].split(",");
        L.marker([location[0], location[1]]).addTo(mymap)
            .bindPopup(showAlert(arrayMaps[i]['name']));
            }
        }
    }


    function showAlert(kelurahan){
        if(kelurahan == "Kelurahan Jatinegara Kaum"){
            var html = '<img width="200px" height="200px" src="<?= base_url() ?>assets/maps/leaflet/images/jatinegara.png"></img><br><p style="font-weight:800">Kelurahan Jatinegara Kaum</p><p>Jumlah Mampu : <?= 23 . "%"; ?> </p><p>Jumlah Tidak Mampu : <?= 50 . "%"; ?> </p><p>Jumlah Kurang Mampu : <?= 27 . "%"; ?> </p>';
            return html;
        }else if(kelurahan == "Kelurahan Cipinang"){
            var html = '<img width="200px" height="200px" src="<?= base_url() ?>assets/maps/leaflet/images/cipinang.png"></img><br><p style="font-weight:800">Kelurahan Cipinang</p><p>Jumlah Mampu : <?= $percentCiMampu . "%"; ?> </p><p>Jumlah Tidak Mampu : <?= $percentCiTm . "%"; ?> </p><p>Jumlah Kurang Mampu : <?= $percentCiKm . "%"; ?> </p>';
            return html;
        }else if(kelurahan == "Kelurahan Pisangan Timur"){
            var html = '<img width="200px" height="200px" src="<?= base_url() ?>assets/maps/leaflet/images/pisangantimur.png"></img><br><p style="font-weight:800">Kelurahan Pisangan Timur</p><p>Jumlah Mampu : <?= $percentPisanganMampu . "%"; ?> </p><p>Jumlah Tidak Mampu : <?= $percentPisanganTm . "%"; ?> </p><p>Jumlah Kurang Mampu : <?= $percentPisanganKm . "%"; ?> </p>';
            return html;
        }else if(kelurahan == "Kelurahan Jati"){
            var html = '<img width="200px" height="200px" src="<?= base_url() ?>assets/maps/leaflet/images/jati.png"></img><br><p style="font-weight:800">Kelurahan Kayu Jati</p><p>Jumlah Mampu : <?= $percentJatiMampu . "%"; ?> </p><p>Jumlah Tidak Mampu : <?= $percentJatiTm . "%"; ?> </p><p>Jumlah Kurang Mampu : <?= $percentJatiKm . "%"; ?> </p>';
            return html;
        }else if(kelurahan == "Kelurahan Rawamangun"){
            var html = '<img width="200px" height="200px" src="<?= base_url() ?>assets/maps/leaflet/images/rawamangun.png"></img><br><p style="font-weight:800">Kelurahan Rawamangun</p><p>Jumlah Mampu : <?= $percentRawamangunMampu . "%"; ?> </p><p>Jumlah Tidak Mampu : <?=  $percentRawamangunTm. "%"; ?> </p><p>Jumlah Kurang Mampu : <?= $percentRawamangunKm . "%"; ?> </p>';
            return html;
        }else if(kelurahan == "Kelurahan Pulogadung"){
            var html = '<img width="200px" height="200px" src="<?= base_url() ?>assets/maps/leaflet/images/pulogadung.png"></img><br><p style="font-weight:800">Kelurahan Pulogadung</p><p>Jumlah Mampu : <?= $percentPGMampu . "%"; ?> </p><p>Jumlah Tidak Mampu : <?= $percentPGTidakMampu . "%"; ?> </p><p>Jumlah Kurang Mampu : <?= $percentPGKurangMampu . "%"; ?> </p>';
            return html;
        }else if(kelurahan == "Kelurahan Kayu Putih"){
            var html = '<img width="200px" height="200px" src="<?= base_url() ?>assets/maps/leaflet/images/kayuputih.png"></img><br><p style="font-weight:800">Kelurahan Kayu Putih</p><p>Jumlah Mampu : <?= $percentKpMampu . "%"; ?> </p><p>Jumlah Tidak Mampu : <?= $percentKPTM . "%"; ?> </p><p>Jumlah Kurang Mampu : <?= $percentKpKm . "%"; ?> </p>';
            return html;
        }
    }

    maps();

</script>

<script>
var alert = document.getElementById("text");
if(alert != null){
    var text = document.getElementById("text").innerHTML
    var title = document.getElementById("title").innerHTML;
    var icon = document.getElementById("icon").innerHTML;
    swal({
        title: title,
        text: text,
        icon: icon,
        button: "OK",
        });
}
</script>
</body>
</html>
