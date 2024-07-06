$(document).ready(function(){
  $(".loader_btn").hide();
function show_loader(){
    $(".loader_btn").hide();
    $(".submit_btn").show();
}

$(document).on('click', '.bg-pr', function () {
  $('.bg-pr').removeClass('active');
  $(this).addClass('active');
  if ($(this).data('login_type') == 'admin') {
    $("#security_login_form").removeClass("visual-hide");
    $("#faculty_login_form").addClass("visual-hide");
  }
  else {
    $("#faculty_login_form").removeClass("visual-hide");
    $("#security_login_form").addClass("visual-hide");
  }
})


  //=============== Login To
  $('#feat_vid_box').hide();
      $(document).on('submit','#security_login_form',function(e){
          e.preventDefault();
          $(".loader_btn").show();
          $(".submit_btn").hide();
          let formdata = new FormData(this);
          $.ajax({
              url:'./inc/config/login_query.php',
              type:'POST',
              data:formdata,
              processData:false,
              caches:false,
              contentType:false,
              success:function(data){
                console.log(data);
                  let json = JSON.parse(data);
                  if(json.status == 2){
                    $('#security_login_form').trigger("reset");
                      setTimeout(function(){
                          window.location.assign('./index.php');
                      },1500)
                      swaMsg('success',json.msg,"#0F843F");
                      show_loader();
                  }
                  else if(json.status == 1){
                    swaMsg('error',json.msg,"#a90228");
                    show_loader();
                  }
                  else{
                    swaMsg('error',json.msg,"#a90228");
                    show_loader();
                  }
              }
          });
      });

      /* -------------------------------------------------------
                            Faculty Login                     
---------------------------------------------------------------- */
$(document).on('submit','#faculty_login_form',function(e){
  e.preventDefault();
  $(".loader_btn").show();
  $(".submit_btn").hide();
  let formdata = new FormData(this);
  $.ajax({
      url:'./inc/config/faculty-login.php',
      type:'POST',
      data:formdata,
      processData:false,
      caches:false,
      contentType:false,
      success:function(data){
          let json = JSON.parse(data);
          if(json.status == 2){
            $('#faculty_login_form').trigger("reset");
              setTimeout(function(){
                  window.location.assign('./index.php');
              },1500)
              swaMsg('success',json.msg,"#0F843F");
              show_loader();
          }
          else if(json.status == 1){
            swaMsg('error',json.msg,"#a90228");
            show_loader();
          }
          else{
            swaMsg('error',json.msg,"#a90228");
            show_loader();
          }
      }
  });
});
   //=============== End Of Jquery
       });