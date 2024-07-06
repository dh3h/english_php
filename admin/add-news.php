<?php
require_once("./inc/head.php");
require_once("./inc/header.php");
require_once("./inc/sidebar.php");
?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Add News</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="fill-in-the-blank.php">News List</a></li>
                                <li class="breadcrumb-item active">News</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">News</h4>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" id="news_form_data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label">News Title</label>
                                        <input type="text" name="news_title" class="form-control" placeholder="Enter News Title">
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="mb-3">
                                            <label class="form-label">Enter News Discriptions :</label>
                                            <textarea name="news_details" class="form-control" id="about_discriptions" placeholder="Enter Question Here..."></textarea>

                                        </div>
                                    </div>
                                </div>
                               
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </form>
                        </div>
                    </div>
                    <!-- end card -->
                </div> <!-- end col -->


            </div>
            <!-- end row -->


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Minia.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by <a href="#!" class="text-decoration-underline">Themesbrand</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?php
// require_once("./inc/footer.php");
require_once("./inc/script.php");
?>