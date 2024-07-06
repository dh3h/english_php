<?php
require_once("./inc/head.php");
require_once("./inc/header.php");
require_once("./inc/sidebar.php");
if (in_array("About Us", $roleview) || in_array("All", $roleview)) {
} else {
    $error = true; // Replace this with your actual error-checking condition

    if ($error) {
        // Display an error message or perform any necessary actions

        // Redirect back to the previous page after a delay using JavaScript
        echo '<script>';
        echo 'setTimeout(function() {';
        echo '   window.history.back();'; // Go back to the previous page
        echo '}, 3);'; // 3 milliseconds (3 seconds) delay, you can adjust this
        echo '</script>';
        exit(); // Stop executing the rest of the script
    }
}
$about_data = $action->database->query_sql("SELECT * FROM `tbl_about`");
if ($about_data) {
    foreach ($about_data as $data) {
    }
}
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
                        <h4 class="mb-sm-0 font-size-18">About Us</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                                <li class="breadcrumb-item active">About Us</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add About Us</h4>
                    </div>
                    <div class="card-body">

                        <form id="add_form_data">
                            <input type="hidden" name="hidden_id" value="<?= @$data['id'] ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="validationTooltip01">About Tittle :</label>
                                        <input type="text" class="form-control" id="validationTooltip01" name="about_titile" placeholder="Enter Your About Title here" value="<?= @$data['about_title'] ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="validationTooltip02">About Image :</label>
                                        <input type="file" class="form-control" name="about_image" onchange="readURL(this);" id="validationTooltip02">
                                        <input type="hidden" name="hidden_icon_img" value="<?= @$data['about_image'] ?>">
                                        <img id="blah" class="mt-3" src="../upload/<?= @$data['about_image'] ?>" alt="your image" style="width: 32rem;" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="validationTooltip02">About Discription :</label>
                                        <textarea name="about_discr" class="form-control" id="about_discriptions" rows="5"><?= @$data['about_discrip'] ?></textarea>
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </form>
                    </div>
                </div>
                <!-- end card -->
            </div> <!-- end col -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <?php
    require_once("./inc/footer.php");
    require_once("./inc/script.php");
    ?>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result).width(450).height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>