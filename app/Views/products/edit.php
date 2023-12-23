<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Create</title>

    <!-- Custom fonts for this template -->
    <link  href=" <?php echo site_url('assets/vendor/fontawesome-free/css/all.min.css') ?> " rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link  href="../../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link  href=" <?php echo site_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?> " rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?= $this->include('includes/Sidebar') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?= $this->include('includes/Topbar') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
              <div class="container">

              <div class="container mt-5">
        <h2>Add Product</h2>
        <!-- error message -->
        <?= validation_list_errors() ?>
        <form action="<?php echo site_url('products/update/'. $product_id) ?>" method="post">
            <div class="form-group">
                <label for="productName">Product Name:</label>
                <input type="text" class="form-control" id="productName" name="product" required value="<?= $product ?>">
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" class="form-control" id="category" name="category" required value="<?= $category ?>">
            </div>
            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" class="form-control" id="model" name="model" required value="<?= $model ?>" >
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required value="<?= $price ?>">
            </div>
            <div class="form-group">
                <label for="sku">SKU:</label>
                <input type="text" class="form-control" id="sku" name="sku" required value="<?= $sku ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="submit" class="btn btn-secondary">Reset</button>
        </form>
    </div>

    </div>
                <!-- /.container-fluid  -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?= $this->include('includes/Footer') ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src=" <?php echo site_url('assets/vendor/jquery/jquery.min.js') ?> "></script>
    <script src=" <?php echo site_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?> "></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo site_url('assets/vendor/jquery-easing/jquery.easing.min.js')?> "></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo site_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo site_url('assets/js/demo/datatables-demo.js') ?> "></script>

</body>

</html>