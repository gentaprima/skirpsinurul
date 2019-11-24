
    <!-- Jquery Core Js -->
    <script src="<?= base_url() ?>assets/dashboard/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url() ?>assets/dashboard/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <!-- <script src="<?= base_url() ?>assets/dashboard/plugins/bootstrap-select/js/bootstrap-select.js"></script> -->
     

    <!-- Slimscroll Plugin Js -->
    <script src="<?= base_url() ?>assets/dashboard/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url() ?>assets/dashboard/plugins/node-waves/waves.js"></script>

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

    <!-- Custom Js -->
    <script src="<?= base_url() ?>assets/dashboard/js/admin.js"></script>
    <script src="<?= base_url() ?>assets/dashboard/js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="<?= base_url() ?>assets/dashboard/js/demo.js"></script>
    <script src="<?= base_url() ?>assets/dashboard/js/pages/ui/modals.js"></script>
    <script src="<?= base_url() ?>assets/dashboard/js/pages/forms/basic-form-elements.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Autosize Plugin Js -->
    <script src="<?= base_url() ?>assets/dashboard/plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="<?= base_url() ?>assets/dashboard/plugins/momentjs/moment.js"></script>

      <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="<?= base_url() ?>assets/dashboard/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="<?= base_url() ?>assets/dashboard/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?= base_url() ?>assets/dashboard/js/pages/ui/tooltips-popovers.js"></script>
    
    
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
    <script src="<?= base_url() ?>assets/dashboard/plugins/chartjs/Chart.bundle.js"></script>
    <script src="<?= base_url() ?>assets/dashboard/js/pages/charts/chartjs.js"></script>

<script>

var kemiskinan = document.getElementById("bar_chart");
var bansos = document.getElementById("chart");


    $(function () {
        new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar')); 
        new Chart(document.getElementById("chart_kip").getContext("2d"), getChartJs('kip')); 
        new Chart(document.getElementById("chart_bsp").getContext("2d"), getChartJs('bsp')); 
        new Chart(document.getElementById("chart_pbijk").getContext("2d"), getChartJs('pbijk')); 
        new Chart(document.getElementById("chart_pkh").getContext("2d"), getChartJs('pkh')); 
    });
        



function getChartJs(type) {
    var config = null;
    if (type === 'bar') {
                console.log("bar"+"true");
                config = {
                    type: 'bar',
                    data: {
                        labels: ["2012", "2013", "2014", "2015", "2016", "2017"],
                        datasets: [{
                            label: "Mampu",
                            data: [<?= substr($dataStatistik['data_mampu2012'],0,5); ?>,<?= substr($dataStatistik['data_mampu2013'],0,5); ?>, <?= substr($dataStatistik['data_mampu2014'],0,5); ?>, <?= substr($dataStatistik['data_mampu2015'],0,5); ?>, <?= substr($dataStatistik['data_mampu2016'],0,5); ?>, <?= substr($dataStatistik['data_mampu2017'],0,5); ?>],
                            backgroundColor: 'rgba(77, 6, 48, 1)',
                
                        }, {
                                label: "Kurang Mampu",
                                data: [<?= substr($dataStatistik['data_kurangmampu2012'],0,5);?>, <?= substr($dataStatistik['data_kurangmampu2013'],0,5);?>, <?= substr($dataStatistik['data_kurangmampu2014'],0,5);?>, <?= substr($dataStatistik['data_kurangmampu2015'],0,5);?>, <?= substr($dataStatistik['data_kurangmampu2016'],0,5);?>, <?= substr($dataStatistik['data_kurangmampu2017'],0,5);?>],
                                backgroundColor: 'rgba(239, 108, 0, 1)'
                            },{
                                label: "Tidak Mampu",
                                data: [<?= substr($dataStatistik['data_tdkmampu2012'],0,5);?>, <?= substr($dataStatistik['data_tdkmampu2013'],0,5);?>, <?= substr($dataStatistik['data_tdkmampu2014'],0,5);?>, <?= substr($dataStatistik['data_tdkmampu2015'],0,5);?>, <?= substr($dataStatistik['data_tdkmampu2016'],0,5);?>, <?= substr($dataStatistik['data_tdkmampu2017'],0,5);?>],
                                backgroundColor: 'rgba(221, 44, 0, 1)'
                            }]
                    },
                    options: {
                        responsive: true,
                        legend: false,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    // Include a dollar sign in the ticks
                                    callback: function(value, index, values) {        
                                        return value+"%";
                                    }
                                }
                            }]
                        }
                    },
                }
            }
    if(type === 'kip'){
        config = {
            type: 'bar',
            data: {
                labels: ["2012", "2013", "2014", "2015", "2016", "2017"],
                datasets: [{
                        label: "Kartu Indonesia Pintar",
                        data: [<?= $kip_2012['jumlah']; ?>,<?= $kip_2013['jumlah']; ?>, <?= $kip_2014['jumlah']; ?>,<?= $kip_2015['jumlah']; ?>,<?= $kip_2016['jumlah']; ?>,<?= $kip_2017['jumlah']; ?>],
                        backgroundColor: 'rgba(221, 44, 0, 1)'
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    if(type === 'bsp'){
        config = {
            type: 'bar',
            data: {
                labels: ["2012", "2013", "2014", "2015", "2016", "2017"],
                datasets: [{
                        label: "Bantuan Sosial Pangan",
                        data: [<?= $bsp_2012['jumlah']; ?>, <?= $bsp_2013['jumlah']; ?>, <?= $bsp_2014['jumlah']; ?>, <?= $bsp_2015['jumlah']; ?>, <?= $bsp_2016['jumlah']; ?>, <?= $bsp_2017['jumlah']; ?>],
                        backgroundColor: 'rgba(77, 6, 48, 1)'
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    if(type === 'pkh'){
        config = {
            type: 'bar',
            data: {
                labels: ["2012", "2013", "2014", "2015", "2016", "2017"],
                datasets: [{
                        label: "Program Keluarga Harapan",
                        data: [<?= $pkh_2012['jumlah']; ?>,<?= $pkh_2013['jumlah']; ?>,<?= $pkh_2014['jumlah']; ?>,<?= $pkh_2015['jumlah']; ?>,<?= $pkh_2016['jumlah']; ?>,<?= $pkh_2017['jumlah']; ?>],
                        backgroundColor: 'rgba(221, 44, 0, 1)'
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    if(type === 'pbijk'){
        config = {
            type: 'bar',
            data: {
                labels: ["2012", "2013", "2014", "2015", "2016", "2017"],
                datasets: [{
                        label: "PBI - JK",
                        data: [<?= $pbijk_2012['jumlah']; ?>, <?= $pbijk_2013['jumlah']; ?>, <?= $pbijk_2014['jumlah']; ?>, <?= $pbijk_2015['jumlah']; ?>, <?= $pbijk_2016['jumlah']; ?>, <?= $pbijk_2017['jumlah']; ?>],
                        backgroundColor: 'rgba(239, 108, 0, 1)'
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
   
    return config;
}
</script>

<script>

    function deletePenduduk(idDetail,nik){
        document.getElementById("form-delete").action = "http://localhost/skripsinurul/dashboard/deletePenduduk/"+ idDetail +"/" + nik;
    }

</script>
     
    
</body>

</html>