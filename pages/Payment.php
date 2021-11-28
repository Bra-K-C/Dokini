<?php
namespace Payment;
use Omnipay\Omnipay;
class Payment
{
    /**
     * @return mixed
     */
    public function gateway()
    {
        $gateway = Omnipay::create('PayPal_Express');
        $gateway->setUsername("sb-xk3zi8735117@business.example.com");
        $gateway->setPassword("H&p4<7+b");
        $gateway->setSignature("EOEwezsNWMWQM63xxxxxknr8QLoAOoC6lD_-kFqjgKxxxxxwGWIvsJO6vP3syd10xspKbx7LgurYNt9");
        $gateway->setTestMode(true);
        return $gateway;
    }
    /**
     * @param array $parameters
     * @return mixed
     */
    public function purchase(array $parameters)
    {
        $response = $this->gateway()
            ->purchase($parameters)
            ->send();
        return $response;
    }
    /**
     * @param array $parameters
     */
    public function complete(array $parameters)
    {
        $response = $this->gateway()
            ->completePurchase($parameters)
            ->send();
        return $response;
    }
    /**
     * @param $amount
     */
    public function formatAmount($amount)
    {
        return number_format($amount, 2, '.', '');
    }
    /**
     * @param $order
     */
    public function getCancelUrl($order = "")
    {

        return $this->route('  https://170f-163-5-2-71.ngrok.io', $order);
    }
    /**
     * @param $order
     */
    public function getReturnUrl($order = "")
    {
        return $this->route(' https://170f-163-5-2-71.ngrok.io/pages/register.php', $order);
    }
    public function route($name, $params)
    {
        return $name; // ya change hua hai
    }
}
