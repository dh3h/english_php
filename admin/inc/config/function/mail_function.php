<?php
class Mailer
{
  ##########-------------------------- Sent mail on Email address
  public function send_mail($mail, $email, $html, $subject, $smtp_email, $smtp_pass)
  {
    ## $mail = new PHPMailer(true);
    ## create a $mail object when use this function dont create here otherwise thrown error
    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->SMTPSecure = "tls";
    $mail->SMTPAuth = true;
    $mail->Username = $smtp_email;
    $mail->Password = $smtp_pass;
    $mail->SetFrom($smtp_email);
    $mail->addAddress($email);
    $mail->IsHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $html;
    $mail->SMTPOption = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => false));
    if ($mail->Send()) {
      return 1;
    } else {
      $success['status'] = 2;
      $success['msg'] = "Message sent failed. Continue !";
    }
  }
  ##------------------------ Sent Otp on Mobile Sms
  function sendotpsms($mobile, $otp)
  {
    $curl = curl_init();

    curl_setopt_array($curl, [
      CURLOPT_URL => "https://api.msg91.com/api/v5/flow/",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{\n  \"flow_id\": \"624d1c744ae69f7c817025df\",\n  \"mobiles\": \"91" . $mobile . "\",\n  \"otp\": \".$otp\"\n}",
      CURLOPT_HTTPHEADER => [
        "authkey: 374427ACouEb7VgrXm622f07b6P1",
        "content-type: application/JSON"
      ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      "cURL Error #:" . $err;
      $json['status'] = 1;
      $json['msg'] = $err;
    } else {
      $json['status'] = 2;
      $json['msg'] = "OTP successfully sent to your mobile number.";
      $response;
    }
  }

  ##------------------  ENCRYPT  ------------------##

  function encrypt($str)
  {
    // $str = base64_encode($str);
    // $str = rawurlencode($str);
    $str = str_rot13($str);
    $str = str_replace('.', '80@@', $str);
    $rand1 = substr(str_shuffle('A1B2C3D4E5F6G7H8I9J0KLMNOPQRSTUVWXYZ'), 0, 5);
    $rand2 = substr(str_shuffle('A1B2C3D4E5F6G7H8I9J0KLMNOPQRSTUVWXYZ'), 0, 4);
    $encode = $rand1 . ($str) . $rand2;
    return $encode;
  }


  ##---------------------  Decrypt --------------------##

  function decrypt($str)
  {
    // $decode = base64_decode(rawurldecode(substr(substr($str, 0, -4), 5)));
    $decode = str_rot13(str_replace('80@@', '.', substr(substr($str, 0, -4), 5)));
    return $decode;
  }



  ##------------------------  End Of class
}
