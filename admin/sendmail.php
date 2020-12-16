<?php

require_once './class.phpmailer.php';
require_once './class.smtp.php';





        if(isset($_POST["forgotbtn"])){
        
            
                    $mail = new PHPMailer;

                    $mail->IsSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'mail.liverfoundationpk.com';                 // Specify main and backup server
                    $mail->Port = 26;                                    // Set the SMTP port
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'noreply@liverfoundationpk.com';                // SMTP username
                    $mail->Password = '#t#2d--}4+IM';                  // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

                    $mail->From = 'noreply@liverfoundationpk.com';
                    $mail->FromName = 'Admin Credentials TLF';
                    $mail->AddAddress('std_20586@iobm.edu.pk', '');  // Add a recipient
                    //$mail->AddAddress('ellen@example.com');               // Name is optional

                    $mail->IsHTML(true);                                  // Set email format to HTML

                    $mail->Subject = "Your Admin Credentials Are Provided Below..";
                    $mail->Body    = "<strong>Your Admin Credentials Are:</strong><br><br>Username: $credentialsUsername <br>Password: $credentialsPassword";
                    $mail->AltBody = "<strong>Your Admin Credentials Are:</strong><br><br>Username: $credentialsUsername <br>Password: $credentialsPassword";

                    if(!$mail->Send()) {
                        echo 'Message could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                        $error = "block";
                        exit;
                    }
                    else{
                        $messageSuccess = "block";
                    }

            
            
        }


?>