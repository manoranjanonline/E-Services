<?php
  $from="";
  $to="";
  $cc="";
  $bcc="";
  $sub="";
  $text="";    
  if(isset($_POST['sendMail'])){
    $from=$_POST['from'];
    $to=$_POST['to'];
    $cc=$_POST['cc'];
    $bcc=$_POST['bcc'];
    $sub=$_POST['sub'];
    $text=$_POST['text'];

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: <$from>" . "\r\n";
    $headers .= "Cc: $cc" . "\r\n";
    $headers .= "Bcc: $bcc" . "\r\n";

    if(mail($to,$sub,$text,$headers)){
      $msg = '<H4 style="color:green;"">Mail Successfully Sent</H4>';
      $from="";
      $to="";
      $cc="";
      $bcc="";
      $sub="";
      $text="";  
    }
    else{
      $msg = '<H4 style="color:red;">Unable to Sent Mail</H4>';
    }
    //unset($_POST['sendMail']);
  }
?>