<?php
require_once('./inc/head.php');
?>
<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Tea Game</div>
    <div class="right">
    </div>
</div>
<!-- * App Header -->
<style>
    .section.full_edit {
        height: 90vh;
        background-color: rgb(255 106 84);
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-direction: column;
        padding: 30px;
    }

    .section.full_edit h3 {
        color: #fff;
        text-align: center;
    }

    .section.full_edit p {
        color: #fff;
        text-align: center;
    }

    .section.full_edit .start_glass {
        height: 200px;
    }
</style>

<!-- App Capsule -->
<div id="appCapsule">
    <div class="section full full_edit">
        <div>
            <h3>Tea Game</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa velit dignissimos quia incidunt saepe
            </p>
        </div>

        <div>
            <img src="./assets/img/glass.png" class="img-fluid start_glass">
        </div>

        <div>
            <a href="game-tea-play.php" class="btn btn-success px-5">Play</a>
        </div>
    </div>
</div>
<!-- * App Capsule -->
<?php
require_once('./inc/script.php');
?>