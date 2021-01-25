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
        $mail->Subject = 'Volunteer Mail';
        //Keep it simple - don't use HTML
        $mail->isHTML(false);
        //Build a simple message body
        $mail->Body = <<<EOT
Full Name: {$_POST['name']}
Country: {$_POST['country']}
Email: {$_POST['email']}
Phone Number: {$_POST['phone']}



EOT;
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msg = 'Sorry, something went wrong. Please try again later.'. $mail->ErrorInfo;
        } else {
            echo "<script>alert('Message Successfully Sent we will get back to you shortly');
            window.location.href = 'volunteer.php'</script>";
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
              <h3 class="mt-0">How you can help us</h3>
              <h2>Just call at <span class="text-theme-colored">+(237) 677201621, +(237) 675082258</span> to make a donation</h2>
              <h4>Join us safe lives, give us a helping hand and help make hotpec a safe heaven for lost children and needy ones. The help you give is highly appreciated</h4>
            </div>
          </div>
        </div>
      </div>      
    </section>
    <section id="donate-now" class="divider"  data-bg-img="images/bg/bg7.jpg">
      <div class="container pt-0 pb-0">
        <div class="row">
          <div class="col-md-7">
            <div class="bg-light-transparent p-40">
              <h4 class="text-uppercase line-bottom">Become A Volunteer</h4>
              
              <!-- Paypal Both Onetime/Recurring Form Starts -->
              <form id="paypal_donate_form_onetime_recurring">
                <div class="row">

                  <div class="col-sm-12">
                    <div class="form-group mb-20">
                      <label><strong>Volunteer FullName</strong></label>
                      <input type="text"class="form-control" name="name" placeholder="FullName">
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group mb-20">
                      <label><strong>Volunteer Country</strong></label>
                   <input type="text"class="form-control" name="country" placeholder="Volunteer Country">
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group mb-20">
                      <label><strong>Volunteer Email Address</strong></label>
                      <input type="email"class="form-control" name="email" placeholder="Email Address">
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group mb-20">
                      <label><strong>Volunteer Phone Number</strong></label>
                      <input type="text"class="form-control" name="phone" placeholder="Volunteer Phone Number">
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group mb-20">
                      <button type="submit" class="btn btn-flat btn-dark btn-theme-colored mt-10 pl-30 pr-30" >Submit Now</button>
                    </div>
                  </div>
                </div>
              </form>
              <!-- Paypal Both Onetime/Recurring Form Ends -->

            </div>
          </div>
          <div class="col-md-5">
          </div>
        </div>
      </div>
    </section>
<?php include 'footer.php'; ?>