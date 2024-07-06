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
                        <h4 class="mb-sm-0 font-size-18">Add Hangman Game</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="fill-in-the-blank.php">Hangman Game</a></li>
                                <li class="breadcrumb-item active">Hangman Game</li>
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
                            <h4 class="card-title">Hangman Game</h4>
                        </div>
                        <div class="card-body">
                            <form class="profile-form" id="hangman_form">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label"> Add Words Game Hangman</label>
                                            <div class="row">
                                                <div class="col-12 delete_hangman_parent">
                                                    <div class="row" id="add_more_hangman">


                                                        <div class="col-6 mt-3 delete_this">
                                                            <div class="row">
                                                                <input type="hidden" name="hidden_id" value="1">
                                                                <div class="col-5 pe-0">
                                                                    <input type="text" class="hindi_words form-control" placeholder="Enter Hindi Words" value="">
                                                                </div>
                                                                <div class="col-5 ps-0">
                                                                    <input type="text" class="english_words form-control" placeholder="Enter English Words" value="">
                                                                </div>
                                                                <div class="col-2 ps-0">
                                                                    <a class="btn btn-danger shadow btn-block btn sharp delete_hangman"><i class="fa fa-trash"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <button type="button" id="add_more_hang_btn" class="btn-block btn btn-outline-primary">+ Add
                                                        More</button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
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