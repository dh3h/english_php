<?php
require_once('./inc/head.php');
require_once('./inc/menu.php');
require_once('./inc/sidebar.php')
?>
    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section text-center">
            <img src="assets/img/app-assets/faq.png" alt="image" class="imaged w200">
        </div>

        <div class="section full">
            <div class="section-title">Welcome to Frequently Asked Questions</div>
            <div class="wide-block pt-2 pb-2">
                Welcome to the frequently asked questions page. You can find the answer to your question here.
            </div>
        </div>

        <div class="section full mt-2">
            <div class="section-title">About</div>

            <div class="accordion" id="accordionExample1">

                <div class="item">
                    <div class="accordion-header">
                        <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#accordion1">
                            Is this First faqs?
                        </button>
                    </div>
                    <div id="accordion1" class="accordion-body collapse" data-parent="#accordionExample1">
                        <div class="accordion-content">
                            Yes, Softxcite is  ready . You can build mobile websites and progressive web apps with it.
                        </div>
                    </div>
                </div>



            </div>
        </div>



        <div class="section full mt-2 mb-2">
            <div class="section-title">Support</div>

            <div class="accordion" id="accordionExample3">

                <div class="item">
                    <div class="accordion-header">
                        <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#accordion8">
                            How can i contact to you?
                        </button>
                    </div>
                    <div id="accordion8" class="accordion-body collapse" data-parent="#accordionExample3">
                        <div class="accordion-content">
                            Feel free to contact us on 
                        </div>
                    </div>
                </div>

            </div>
        </div>



    </div>
    <!-- * App Capsule -->
    <?php
    require_once('./inc/bottom-btn.php');
    // require_once('./inc/footer.php');
    require_once('./inc/script.php');
    ?>Ś