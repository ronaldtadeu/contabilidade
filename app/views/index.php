<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Escrituração fiscal</title>
        <!-- Bootstrap core CSS-->
        <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="<?php echo base_url();?>assets/css/sb-admin.css" rel="stylesheet">
        <style>
            .bg-blue{
            background-color:#053E69;
            }
        </style>
    </head>

    <body class="fixed-nav sticky-footer bg-blue" id="page-top">
        <!-- Navigation-->
        <?php $data = array('CarregaEmpr' => $this->admin_model->CarregaInfoEmpLogada("tab_emp_lf",$id_empr)); $this->load->view("menu_nav",$data);?>
        <div class="content-wrapper">
            <div class="logo_image">
                <center>
                    <img src="<?php echo base_url();?>assets/images/logo.png" />
                </center>
            </div>
            <footer class="sticky-footer print">
                <div class="container">
                    <div class="text-center">
                        <small style="font-size:18px;">Todos os Direitos Reservados e Projetado por <strong><a href="http://registrosweb.com.br" style="color:#0066cc; font-size:15px;">Registros Web</a></strong></small>
                    </div>
                </div>
            </footer>
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fa fa-angle-up"></i>
            </a>
            <!-- Bootstrap core JavaScript-->
            <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
            <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- Core plugin JavaScript-->
            <script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
            <!-- Page level plugin JavaScript-->
            <script src="<?php echo base_url();?>assets/vendor/chart.js/Chart.min.js"></script>
            <script src="<?php echo base_url();?>assets/vendor/datatables/jquery.dataTables.js"></script>
            <script src="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>
            <!-- Custom scripts for all pages-->
            <script src="<?php echo base_url();?>assets/js/sb-admin.min.js"></script>
            <!-- Custom scripts for this page-->
            <script src="<?php echo base_url();?>assets/js/sb-admin-datatables.min.js"></script>
            <script src="<?php echo base_url();?>assets/js/sb-admin-charts.min.js"></script>
            <script>
                var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'pie',
                  data: {
                    labels: ["Green", "Blue", "Black"],
                    datasets: [{
                      backgroundColor: [
                        "#2ecc71",
                        "#e74c3c",
                        "#34495e"
                      ],
                      data: [12, 19,  7]
                    }]
                  }
                });
            </script>
        </div>
    </body>

</html>
