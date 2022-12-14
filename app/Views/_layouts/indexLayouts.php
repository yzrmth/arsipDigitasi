<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <?php include 'head.php' ?>
    <?= $this->renderSection('title') ?>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include 'navbars.php' ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include 'sidebars.php' ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- content-header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <?= $this->renderSection('content-header') ?>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- main-content -->
            <div class="content">
                <div class="container-fluid">

                    <?= $this->renderSection('main-content') ?>

                </div>
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
                <div class="p-3">
                    <h5>Title</h5>
                    <p>Sidebar content</p>
                </div>
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <?php include 'footers.php' ?>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        <?php include 'script.php' ?>
</body>

</html>