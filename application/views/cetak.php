<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Resep Obat</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('asset'); ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('asset'); ?>/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('asset'); ?>/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('asset'); ?>/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('asset'); ?>/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('asset'); ?>/plugins/iCheck/square/blue.css">

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body>
    <div class="container">
        <div class="header center">
            <div class="row">
                <div class="col-md-12">
                    <table class="table-responsive">
                        <tr>
                            <td>
                                <img src="<?= base_url('asset/dist/img/logo.png'); ?>" style="width:100px; ">
                            </td>
                            <td>
                                <b class="title center">PUSKESMAS SEJAHTERA</b><br>
                                <p class="size center">Jl. Raya Bangsri-Keling Kelet, Gedong, Keling, Jepara, Kabupaten
                                    Jepara, Jawa
                                    Tengah
                                    59454</p>
                                <p class="size center">Kepala Puskesmas Sejahtera : Prof. Afreza Dwi Zuliyanto S1.</p>
                            </td>
                            <td>
                                <img src="<?= base_url('asset/dist/img/logo1.png'); ?>" style="width:100px; ">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <hr style=" border-width: 3px; color:black">
        </div>
        <?= $conten ?>
        <!-- jQuery 3 -->
        <script>
            // Function to trigger printing
            function printPage() {
                window.print();
            }

            // Automatically trigger printing when the page is loaded
            window.onload = function () {
                printPage();
            };
        </script>
        <script src="<?= base_url('asset'); ?>/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?= base_url('asset'); ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="<?= base_url('asset'); ?>/plugins/iCheck/icheck.min.js"></script>
</body>

</html>