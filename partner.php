<?php include 'header.php'; ?>
    <?php
/**
 * This example shows how to handle a simple contact form.
 */

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
$msg = '';
//Don't run this unless we're handling a form submission
if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');
    require 'autoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP - requires a local mail server
    //Faster and safer than using mail()
    $mail->isSMTP();
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "cornellekacy4@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "cornellekacy456";
    //Use a fixed address in your own domain as the from address
    //**DO NOT** use the submitter's address here as it will be forgery
    //and will cause your messages to fail SPF checks
    $mail->setFrom('from@example.com', 'First Last');
    //Send the message to yourself, or whoever should receive contact for submissions
    $mail->addAddress('hotpec2.zad@gmail.com', 'Contact');
    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request
    if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = 'Contact Mail';
        //Keep it simple - don't use HTML
        $mail->isHTML(false);
        //Build a simple message body
        $mail->Body = <<<EOT
Name: {$_POST['name']}
Email: {$_POST['email']}
Subject: {$_POST['subject']}
Phone Number: {$_POST['phone']}
Message: {$_POST['message']}
EOT;
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msg = 'Sorry, something went wrong. Please try again later.'. $mail->ErrorInfo;
        } else {
            echo "<script>alert('Message Successfully Sent we will get back to you shortly');
            window.location.href = 'contact.php'</script>";
        }
    } else {
        $msg = 'Invalid email address, message ignored.';
    }
}
?>
    <section class="divider parallax layer-overlay overlay-deep" data-stellar-background-ratio="0.2"  data-bg-img="images/bg/bg2.jpg">
      <div class="container">
        <div class="section-content text-center">
          <div class="row">
            <div class="col-md-12">
              <h3 class="mt-0">How you can partner with us</h3>
              <h2>Just call at <span class="text-theme-colored">+(237) 677201621, +(237) 675082258</span> to get to us or</h2>
              <h3 align="center">Fill the form bellow with your contact details and we will get back to you.</h3>
            </div>
          </div>
        </div>
      </div>      
    </section>
    <section id="contact"> 
      <div class="container pt-70">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h3 class="text-uppercase mt-0">Partner</h3>
              <div class="title-icon">
                <i class="flaticon-charity-hand-holding-a-heart"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="section-content">

          <div class="row pt-30">
            <div class="col-md-2">
             
            </div>
            <div class="col-md-8">
              <h3 class="mt-0 mb-30">Interested in Becoming our partner?</h3>
              <!-- Contact Form -->
              <form id="contact_form"  class="form-transparent" action="" method="post">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="form_name">Name <small>*</small></label>
                      <input id="form_name" name="name" class="form-control" type="text" placeholder="Enter Name" required="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="form_email">Email <small>*</small></label>
                      <input id="form_email" name="email" class="form-control required email" type="email" placeholder="Enter Email">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="form_name">Subject <small>*</small></label>
                      <input id="form_subject" name="subject" class="form-control required" type="text" placeholder="Enter Subject">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="form_phone">Phone</label>
                      <input id="form_phone" name="phone" class="form-control" type="text" placeholder="Enter Phone">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="form_name">Message</label>
                  <textarea id="form_message" name="message" class="form-control required" rows="5" placeholder="Enter Message"></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-dark btn-theme-colored btn-flat mr-5">Send your message</button>
                  <button type="reset" class="btn btn-default btn-flat btn-theme-colored">Reset</button>
                </div>
              </form>

            </div>
            <div class="col-md-2">
             
            </div>
          </div>          
        </div>
      </div>
    </section>
<?php include 'footer.php'; ?>