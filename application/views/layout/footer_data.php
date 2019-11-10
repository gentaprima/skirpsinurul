
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
     <!-- Chart Plugins Js -->
     <script src="<?= base_url() ?>assets/dashboard/plugins/chartjs/Chart.bundle.js"></script>
     <script src="<?= base_url() ?>assets/dashboard/js/pages/charts/chartjs.js"></script>
    
</body>

</html>