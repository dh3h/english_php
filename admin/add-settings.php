<?php
require_once("./inc/head.php");
require_once("./inc/header.php");
require_once("./inc/sidebar.php");
require_once("inc/config/function/load.php");
$accpeted_arr = array(
    "favicon",
    "logo",
    "social",
    "email_id",
    "address",
    "phone_no",
    "maps",
    "meta_tags",
    "privacy_policy",
    "conditions"
);

$type = "";
if (isset($_GET['setting_type']) && !empty($action->database->text_filter($_GET['setting_type'])) && in_array($_GET['setting_type'], $accpeted_arr)) {
    $type = $action->database->text_filter($_GET['setting_type']);
    $select_settings = $action->database->tbl_select("tbl_setting");
    if ($select_settings) {
        foreach ($select_settings as $data_det) {
        }
    }
} else {
    // echo "<script> history.back(); </script>";
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
                        <h4 class="mb-sm-0 font-size-18">Add <?= @$type ?></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                                <li class="breadcrumb-item active">Add <?= @$type ?></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add <?= @$type ?></h4>
                    </div>
                    <div class="card-body">

                        <form id="add_form_settings">
                            <input type="hidden" name="hidden_id" value="<?= @$data_det['id'] ?>">
                            <div class="row">
                                <?php
                                if ($type == "favicon") {
                                ?>
                                    <div class="col-md-12">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="validationTooltip02">Favicon Image :</label>
                                            <input type="file" class="form-control" name="favicon" onchange="readURL(this);" id="validationTooltip02">
                                            <input type="hidden" name="hidden_icon_img" value="<?= @$data_det['favicon_icon'] ?>">
                                            <h6 class="mt-3">Favicon Image's</h6>
                                            <img id="blah" class="mt-3" src="../upload/<?= @$data_det['favicon_icon'] ?>" alt="your image" style="width: 32rem;" />
                                        </div>
                                    </div>
                                <?php
                                } elseif ($type == "logo") {
                                ?>
                                    <div class="col-md-12">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="validationTooltip02">Website Logo :</label>
                                            <input type="file" class="form-control" name="logo" onchange="readURL(this);" id="validationTooltip02">
                                            <input type="hidden" name="hidden_icon_img" value="<?= @$data_det['logo'] ?>">
                                            <h6 class="mt-3">Website Logo</h6>
                                            <img id="blah" class="mt-3" src="../upload/<?= @$data_det['logo'] ?>" alt="your image" style="width: 32rem;" />
                                        </div>
                                    </div>
                                <?php
                                } elseif ($type == "social") {
                                ?>
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="validationTooltip02">Instagram :</label>
                                            <input type="text" class="form-control" id="validationTooltip02" name="instagram" placeholder="Enter Your Instagram link" value="<?= @$data_det['instagram'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="validationTooltip02">Facebook :</label>
                                            <input type="text" class="form-control" id="validationTooltip02" name="facebook" placeholder="Enter Your Facebook Link" value="<?= @$data_det['facebook'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="validationTooltip02">Youtube :</label>
                                            <input type="text" class="form-control" id="validationTooltip02" name="youtube" placeholder="Enter Your Youtube Link" value="<?= @$data_det['youtube'] ?>">
                                        </div>
                                    </div>
                                <?php
                                } else if ($type == "email_id") {
                                ?>
                                    <div class="col-md-12">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="validationTooltip02">Email :</label>
                                            <input type="email" class="form-control" id="validationTooltip02" name="email_id" placeholder="Enter Your Email" value="<?= @$data_det['email_id'] ?>">
                                        </div>
                                    </div>
                                <?php
                                } elseif ($type == "address") {
                                ?>
                                    <div class="col-md-12">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="validationTooltip02">Address :</label>
                                            <textarea name="address" id="about_discriptions"><?= @$data_det['address'] ?></textarea>
                                        </div>
                                    </div>
                                <?php
                                } else if ($type == "phone_no") {
                                ?>
                                    <div class="col-md-12">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="validationTooltip02">Phone No. :</label>
                                            <input type="number" class="form-control" id="validationTooltip02" name="phone_no" placeholder="Enter Your Phone No." value="<?= @$data_det['phone'] ?>">
                                        </div>
                                    </div>
                                <?php
                                } elseif ($type == "maps") {
                                ?>
                                    <div class="col-md-12">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="validationTooltip02">Maps :</label>
                                            <input type="text" class="form-control" id="validationTooltip02" name="google_map" placeholder="Enter Your Maps" value="<?= @$data_det['map'] ?>">
                                        </div>
                                    </div>
                                <?php
                                } elseif ($type == "meta_tags") {
                                ?>
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="validationTooltip02">Site Name :</label>
                                            <input type="text" class="form-control" id="validationTooltip02" name="site_name" placeholder="Enter Your Site Name" value="<?= @$data_det['site_name'] ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="validationTooltip02">SEO Title :</label>
                                            <input type="text" class="form-control" id="validationTooltip02" name="seo_title" placeholder="Enter Your SEO Title" value="<?= @$data_det['seo_titile'] ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="validationTooltip02">Meta Description :</label>
                                            <input type="text" class="form-control" id="validationTooltip02" name="meta_desc" placeholder="Enter Your Meta description" value="<?= @$data_det['meta_desc'] ?>">
                                        </div>
                                    </div>
                                <?php
                                } elseif ($type == "privacy_policy") {
                                ?>
                                    <div class="col-md-12">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="validationTooltip02">Privacy Policy :</label>
                                            <textarea name="privacy_policy" id="about_discriptions"><?= @$data_det['privacy_policy'] ?></textarea>
                                        </div>
                                    </div>
                                <?php
                                } elseif ($type == "conditions") {
                                ?>
                                    <div class="col-md-12">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="validationTooltip02">Terms & Conditions :</label>
                                            <textarea name="terms&conditions" id="about_discriptions"><?= @$data_det['conditions'] ?></textarea>
                                        </div>
                                    </div>
                                <?php
                                } elseif ($type == "html_input") {
                                ?>

                                <?php
                                }
                                ?>
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