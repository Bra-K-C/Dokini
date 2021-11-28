<?php
/**
 *  PHP-PayPal-IPN Example
 *
 *  This shows a basic example of how to use the IpnListener() PHP class to
 *  implement a PayPal Instant Payment Notification (IPN) listener script.
 *
 *  For a more in depth tutorial, see my blog post:
 *  http://www.micahcarrick.com/paypal-ipn-with-php.html
 *
 *  This code is available at github:
 *  https://github.com/Quixotix/PHP-PayPal-IPN
 *
 *  @package    PHP-PayPal-IPN
 *  @author     Micah Carrick
 *  @copyright  (c) 2011 - Micah Carrick
 *  @license    http://opensource.org/licenses/gpl-3.0.html
 */

session_start();

/*
Since this script is executed on the back end between the PayPal server and this
script, you will want to log errors to a file or email. Do not try to use echo
or print--it will not work!
Here I am turning on PHP error logging to a file called "ipn_errors.log". Make
sure your web server has permissions to write to that file. In a production
environment it is better to have that log file outside of the web root.
*/
ini_set('log_errors', true);
ini_set('error_log', dirname(__FILE__).'/ipn_errors.log');

try {
    if ($_SERVER['REQUEST_METHOD'] && $_SERVER['REQUEST_METHOD'] != 'POST') {
        header('Allow: POST', true, 405);
        throw new Exception("Invalid HTTP request method.");
    }
    $encoded_data = 'cmd=_notify-validate';

// use raw POST data
    if (!empty($_POST)) {
        $this->post_data = $_POST;
        $encoded_data .= '&'.file_get_contents('php://input');
    } else {
        throw new Exception("No POST data found.");
    }


    if ($this->use_curl) $this->curlPost($encoded_data);
    else $this->fsockPost($encoded_data);

    if (strpos($this->response_status, '200') === false) {
        throw new Exception("Invalid response status: ".$this->response_status);
    }

    if (strpos($this->response, "VERIFIED") !== false) {
        $verified = true;
    } elseif (strpos($this->response, "INVALID") !== false) {
        $verified = false;
    } else {
        throw new Exception("Unexpected response from PayPal.");
    }
} catch (Exception $e) {
    error_log($e->getMessage());
    exit(0);
}


/*
The processIpn() method returned true if the IPN was "VERIFIED" and false if it
was "INVALID".
*/
if ($verified && $_POST['payment_status'] === "Completed" && $_POST['receiver_email'] === "batptiste.perrier@gmail.com"
        && $_POST['payment_amount'] === 300 && $_POST['payment_currency'] === "US") {
    pass;
    /*https://03d5-163-5-2-71.ngrok.io/
    /*
    Once you have a verified IPN you need to do a few more checks on the POST
    fields--typically against data you stored in your database during when the
    end user made a purchase (such as in the "success" page on a web payments
    standard button). The fields PayPal recommends checking are:

        1. Check the $_POST['payment_status'] is "Completed"
	    2. Check that $_POST['txn_id'] has not been previously processed <---TODO
	    3. Check that $_POST['receiver_email'] is your Primary PayPal email
	    4. Check that $_POST['payment_amount'] and $_POST['payment_currency']
	       are correct

    Since implementations on this varies, I will leave these checks out of this
    example and just send an email using the getTextReport() method to get all
    of the details about the IPN.
    */

}
else {
    /*
    An Invalid IPN *may* be caused by a fraudulent transaction attempt. It's
    a good idea to have a developer or sys admin manually investigate any
    invalid IPN.
    */
    $username = $_SESSION['username'];
    $query = $db->prepare("DELETE * FROM users WHERE username=:username");
    $query->execute();
    session_unset();
}

?>