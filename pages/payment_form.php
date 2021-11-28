<?php
include "Payment.php";
use Payment\Payment;
$payment = new Payment;
// ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pay with PayPal</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form class="form-horizontal" method="POST" action="https://www.sandbox.PayPal.com/cgi-bin/webscr ">
                <fieldset>
                    <!-- Form Name -->
                    <legend>Pay with PayPal</legend>
                    <input type='hidden' name='business' value='sb-xk3zi8735117@business.example.com'>
                    <input type='hidden' name='item_name' value='Dokini'>
                    <input type='hidden' name='item_number' value='Dokini#N1'>
                    <input type='hidden' name='no_shipping' value='1'>
                    <input type='hidden' name='currency_code' value='EUR'>
                    <input type='hidden' name='amount' value='0.01'>
                    <input type='hidden' name='notify_url' value='<?php echo $payment->route("https://e6ec-163-5-2-71.ngrok.io", "") ?>'>
                    <input type='hidden' name='cancel_return' value='<?php echo $payment->route("https://e6ec-163-5-2-71.ngrok.io", "") ?>'>
                    <input type='hidden' name='return' value='<?php echo $payment->route("", "./pages/register.php") ?>'>
                    <input type="hidden" name="cmd" value="_xclick">
                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="submit"></label>
                        <div class="col-md-4">
                            <button id="submit" name="pay_now" class="btn btn-danger">Pay With PayPal</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
</body>
</html>