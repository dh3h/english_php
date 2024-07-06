<?php
require_once('./inc/head.php');
require_once('./inc/sidebar.php')
?>
<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Tips</div>

</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">

    <div class="section">
        <div class="mt-2 pr-2 pl-2">
            <div class="row">
                <?php
                $select_tip_list = $action->database->query_sql("SELECT * FROM `tbl_tips` WHERE status = 1;");
                if ($select_tip_list) {
                    foreach ($select_tip_list as $data_tip_list) {
                        // print_r($data_tip_list);
                        $videoId = $data_tip_list['youtube_link'] // Replace with your actual video ID
                ?>
                        <div class="col-6 mb-2">
                            <!-- <img src="https://img.youtube.com/vi/eJ3REPPl0SI/maxresdefault.jpg" alt=""> -->
                            <iframe class="imaged" src="https://www.youtube.com/embed/<?php echo $videoId; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen style="width: 40vw; height:35vh;"></iframe>
                        </div>
                <?php
                    }
                }
                ?>


            </div>
        </div>
    </div>


</div>
<!-- * App Capsule -->
<?php
require_once('./inc/bottom-btn.php');
// require_once('./inc/footer.php');
require_once('./inc/script.php');
?>