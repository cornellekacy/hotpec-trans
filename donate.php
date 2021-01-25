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
        $mail->Subject = 'Donation Mail';
        //Keep it simple - don't use HTML
        $mail->isHTML(false);
        //Build a simple message body
        $mail->Body = <<<EOT
Donating For: {$_POST['for']}
Currency: {$_POST['currency_code']}
Amount To Donate: {$_POST['amount']}
Email: {$_POST['email']}
Country: {$_POST['country']}
Phone Number: {$_POST['phone']}
EOT;
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msg = 'Sorry, something went wrong. Please try again later.'. $mail->ErrorInfo;
        } else {
            echo "<script>alert('Message Successfully Sent we will get back to you shortly');
            window.location.href = 'donate.php'</script>";
        }
    } else {
        $msg = 'Invalid email address, message ignored.';
    }
}
?>
<h1 align="center">Donate to help someone out there</h1>
    <section id="donation" class="bg-theme-colored">
      <div class="container pt-40 pb-40">
        <div class="row">
          <div class="col-md-12">
            <div class="">
              <h3 class="text-white text-uppercase mt-0">Make a Donation Now!</h3>
              
              <!-- Paypal Both Onetime/Recurring Form Starts -->
              <form id="paypal_donate_form_onetime_recurring" class="form-text-white">
                <div class="row">

                  <div class="col-sm-3">
                    <div class="form-group mb-20">
                      <label><strong>I Want to Donate for</strong></label>
                      <select name="for" class="form-control">
                        <option value="Educate Children">Educate Children</option>
                        <option value="Child Camps">Child Camps</option>
                        <option value="Clean Water for Life">Clean Water for Life</option>
                        <option value="Campaign for Child Poverty">Campaign for Child Poverty</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <div class="form-group mb-20">
                      <label><strong>Currency</strong></label>
                      <select name="currency_code" class="form-control">
                        <option value="">Select Currency</option>
                        <option value="USD" selected="selected">USD - U.S. Dollars</option>
                        <option value="AUD">AUD - Australian Dollars</option>
                        <option value="BRL">BRL - Brazilian Reais</option>
                        <option value="GBP">GBP - British Pounds</option>
                        <option value="HKD">HKD - Hong Kong Dollars</option>
                        <option value="HUF">HUF - Hungarian Forints</option>
                        <option value="INR">INR - Indian Rupee</option>
                        <option value="ILS">ILS - Israeli New Shekels</option>
                        <option value="JPY">JPY - Japanese Yen</option>
                        <option value="MYR">MYR - Malaysian Ringgit</option>
                        <option value="MXN">MXN - Mexican Pesos</option>
                        <option value="TWD">TWD - New Taiwan Dollars</option>
                        <option value="NZD">NZD - New Zealand Dollars</option>
                        <option value="NOK">NOK - Norwegian Kroner</option>
                        <option value="PHP">PHP - Philippine Pesos</option>
                        <option value="PLN">PLN - Polish Zlotys</option>
                        <option value="RUB">RUB - Russian Rubles</option>
                        <option value="SGD">SGD - Singapore Dollars</option>
                        <option value="SEK">SEK - Swedish Kronor</option>
                        <option value="CHF">CHF - Swiss Francs</option>
                        <option value="THB">THB - Thai Baht</option>
                        <option value="TRY">TRY - Turkish Liras</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <div class="form-group mb-20">
                      <label><strong>How much do you want to donate?</strong></label>
                    <input type="text"class="form-control" name="amount" placeholder="Amount To Donate">
                    </div>
                  </div>

                  <div class="col-sm-2">
            
                  </div>
                </div>
                     <div class="row">

                  <div class="col-sm-3">
                    <div class="form-group mb-20">
                      <label><strong>Email Address</strong></label>
                 
                        <input type="email"class="form-control" name="email" placeholder="Enter your email">
                  
                    </div>
                  </div>

                <div class="col-sm-3">
                    <div class="form-group mb-20">
                      <label><strong>Country</strong></label>
                 
                        <input type="text"class="form-control" name="country" placeholder="Enter your Country">
                  
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <div class="form-group mb-20">
                     <div class="form-group mb-20">
                      <label><strong>Phone Number</strong></label>
                 
                        <input type="text"class="form-control" name="phone" placeholder="Phone Number">
                  
                    </div>
                    </div>
                  </div>
          

                  <div class="col-sm-2">
                    <div class="form-group mb-20">
                      <button type="submit" class="btn btn-flat btn-dark mt-10 p-10 pl-30 pr-30 mt-30">Donate Now</button>
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
    <br><br><br><br><br><br>
<?php include 'footer.php'; ?>