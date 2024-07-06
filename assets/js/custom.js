$(document).ready(function () {

    // USER REGISTRATION STEP-1
    $(document).on('submit', '#user_register', function (e) {
        e.preventDefault();

        $.ajax({
            url: './inc/config/user-register.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            caches: false,
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 100) {
                    swaMsg('success', json.msg, "#0F843F");
                    setTimeout(() => {
                        window.location.assign('sms-verification.php');
                    }, 1200);
                    $('#user_register').trigger('reset');
                }
                else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });

    // USER REGISTRATION TIMER

    let page_path = window.location.pathname;
    var page_name = page_path.split('/').pop();
    if (page_name == 'sms-verification.php' || page_name == 'login-otp.php') {
        document.getElementById('timer').innerHTML = 1 + ":" + 02;
        startTimer();


        function startTimer() {
            var presentTime = document.getElementById('timer').innerHTML;
            var timeArray = presentTime.split(/[:]+/);
            var m = timeArray[0];
            var s = checkSecond((timeArray[1] - 1));
            if (s == 59) { m = m - 1 }
            if (m < 0) {
                return
            }

            document.getElementById('timer').innerHTML =
                m + ":" + s;
            console.log(m)
            setTimeout(startTimer, 1000);

        }

        function checkSecond(sec) {
            if (sec < 10 && sec >= 0) { sec = "0" + sec }; // add zero in front of numbers < 10
            if (sec < 0) { sec = "59" };
            return sec;
        }

        const myInterval = setInterval(myTimer, 500);

        function myTimer() {
            if ($('#timer').text() == '0:00') {
                clearInterval(myInterval);
                $('.opt_btn').fadeIn(600);
                $('.timer_div').hide(100);
            }
        }


        // USER REGISTRATION TIMER END

    }



    // USER OTP VERIFICATION


    $(document).on('submit', '#otp_verification', function (e) {
        e.preventDefault();

        $.ajax({
            url: './inc/config/otp-verify.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            caches: false,
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 100) {
                    swaMsg('success', json.msg, "#0F843F");
                    setTimeout(() => {
                        window.location.assign('./login.php');
                    }, 1200);
                    $('#otp_verification').trigger('reset');
                }
                else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                }
                else if (json.status == 102) {
                    swaMsg('error', json.msg, "#a90228");
                    setTimeout(() => {
                        window.location.assign('./signup.php');
                    }, 1200);
                }
            }
        });
    });


    $(document).on('click', '#otp_resend', function (e) {
        e.preventDefault();

        $.ajax({
            url: './inc/config/otp-resend.php',
            type: 'POST',
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 100) {
                    swaMsg('success', json.msg, "#0F843F");
                    setTimeout(() => {
                        window.location.assign('sms-verification.php');
                    }, 1200);
                    $('#otp_verification').trigger('reset');
                }
                else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });



    // OTP Resend For Login
    $(document).on('click', '#otp_resend_email', function (e) {
        e.preventDefault();

        $.ajax({
            url: './inc/config/otp-resend-email.php',
            type: 'POST',
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 100) {
                    swaMsg('success', json.msg, "#0F843F");
                    setTimeout(() => {
                        location.reload();
                    }, 1200);
                    $('#otp_verification').trigger('reset');
                }
                else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });
    // USER OTP VERIFICATION
    $(document).on('submit', '#login_otp', function (e) {
        e.preventDefault();

        $.ajax({
            url: './inc/config/login-query.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            caches: false,
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 100) {
                    swaMsg('success', json.msg, "#0F843F");
                    setTimeout(() => {
                        window.location.assign('./');
                    }, 1200);
                    $('#login_otp').trigger('reset');
                }
                else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });
    // alert();
    $(document).on('submit', '#form_data_users', function (e) {
        e.preventDefault();
        const form_data = new FormData(this);
        const msg = $('#message_inp').val();
        $.ajax({
            url: "./inc/config/add-ask-teacher-chat-data.php",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            success: (response) => {
                const json = JSON.parse(response);
                if (json.status == 100) {
                    // swaMsg('success', json.msg, "#0F843F");
                    $('#appCapsule').append(`
                                    <div class="message-item user">
                                        <div class="content">
                                            <div class="bubble">
                                                ${msg}
                                            </div>
                                            <div class="footer">Now</div>
                                        </div>
                                    </div>
                                `);
                    window.scrollTo({
                        top: document.body.scrollHeight,
                        behavior: 'smooth'
                    });
                    $('#message_inp').val('');
                    // setTimeout(() => {
                    //     location.reload();
                    // }, 1200);
                } else {
                    // console.log(json.res);
                    // msg('error', json.res);
                }
            }
        });

    });
    $(document).ready(function () {
        window.scrollTo({
            top: document.body.scrollHeight,
        });
    });

    //  =========================== Chat Community =============================== //

    $(document).on('submit', '#form_chat_community', function (e) {
        e.preventDefault();
        const form_data = new FormData(this);
        const msg = $('#message_inp').val();
        $.ajax({
            url: "./inc/config/add-chat-community-data.php",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            success: (response) => {
                const json = JSON.parse(response);
                if (json.status != 2) {
                    // msg('success', json.()res);
                    $('#appCapsule').append(`
                        <div class="message-item user">
                            <div class="content">
                                <div class="bubble">
                                    ${msg}
                                </div>
                                <div class="footer">Now</div>
                            </div>
                        </div>
                    `);
                    window.scrollTo({
                        top: document.body.scrollHeight,
                        behavior: 'smooth'
                    });
                    $('#message_inp').val('');
                    // setTimeout(() => {
                    //     location.reload();
                    // }, 1200);
                } else {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });

    });
    $(document).ready(function () {
        window.scrollTo({
            top: document.body.scrollHeight,
        });
    });
    //  ====================================== chat community End ============================== //

    //  ====================================== ask student Questions Start ============================== //

    $(document).on('submit', '#student_questions_ask_form', function (e) {
        e.preventDefault();
        $.ajax({
            url: './inc/config/add-ask-questions-students-data.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            caches: false,
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 100) {
                    // swaMsg('success', json.msg, "#0F843F");
                    $('#student_questions_ask_form').trigger('reset');
                    setTimeout(function () {
                        window.location.href = "ask-a-questions.php";
                    }, 1000); // 1000 milliseconds = 1 seconds

                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                    $("#reply_err").text(json.msg);
                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });

    //  ====================================== ask student Questions End ============================== //

    //  ====================================== ask student Answere Start ============================== //

    $(document).on('submit', '#student_answere_ask_form', function (e) {
        e.preventDefault();
        $.ajax({
            url: './inc/config/add-ask-answere-students-data.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            caches: false,
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 100) {
                    // swaMsg('success', json.msg, "#0F843F");
                    $('#student_answere_ask_form').trigger('reset');
                    setTimeout(function () {
                        window.location.href = "ask-a-questions.php";
                    }, 1000); // 1000 milliseconds = 1 seconds

                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                    $("#reply_err").text(json.msg);
                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });
    //  ====================================== ask student Answere End ============================== //

    //  ====================================== Edit Profile Start ============================== //
    $(document).on('submit', '#edit_profile_form_data', function (e) {
        e.preventDefault();
        $.ajax({
            url: './inc/config/add-ask-answere-students-data.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            caches: false,
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 100) {
                    // swaMsg('success', json.msg, "#0F843F");
                    $('#edit_profile_form_data').trigger('reset');
                    setTimeout(function () {
                        window.location.href = "page-profile.php";
                    }, 1000); // 1000 milliseconds = 1 seconds

                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                    $("#reply_err").text(json.msg);
                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });
    //  ====================================== Edit Profile end ============================== //
});