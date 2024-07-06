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
                        <h4 class="mb-sm-0 font-size-18">Manage Settings</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                                <li class="breadcrumb-item active">Manage Settings</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">

                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Sno.</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Favicon Icon</td>
                                        <td> <a href="add-settings.php?setting_type=favicon" class="btn btn-primary waves-effect waves-light">Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Website Logo</td>
                                        <td> <a href="add-settings.php?setting_type=logo" class="btn btn-primary waves-effect waves-light">Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Social Media Links</td>
                                        <td> <a href="add-settings.php?setting_type=social" class="btn btn-primary waves-effect waves-light">Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Email Id</td>
                                        <td> <a href="add-settings.php?setting_type=email_id" class="btn btn-primary waves-effect waves-light">Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Address</td>
                                        <td> <a href="add-settings.php?setting_type=address" class="btn btn-primary waves-effect waves-light">Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Phone No.</td>
                                        <td> <a href="add-settings.php?setting_type=phone_no" class="btn btn-primary waves-effect waves-light">Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Maps</td>
                                        <td> <a href="add-settings.php?setting_type=maps" class="btn btn-primary waves-effect waves-light">Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>meta Tags</td>
                                        <td> <a href="add-settings.php?setting_type=meta_tags" class="btn btn-primary waves-effect waves-light">Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Privacy Policy</td>
                                        <td> <a href="add-settings.php?setting_type=privacy_policy" class="btn btn-primary waves-effect waves-light">Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Terms & Conditions</td>
                                        <td> <a href="add-settings.php?setting_type=conditions" class="btn btn-primary waves-effect waves-light">Edit</a></td>
                                    </tr>
                                    
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <?php
    require_once("./inc/footer.php");
    require_once("./inc/script.php");
    ?>