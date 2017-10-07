<?php
namespace App;

//use Anouar\Paypalpayment\PaypalPayment;

use Anouar\Paypalpayment\Facades\PaypalPayment;
use Mockery\Exception;

class Paypal{
    private $_apiContext;
    private $shopping_cart;
    private $_ClientId = 'AUlih_pp3SqcKq-YzsaTndFajLwTKuZJevimeEAe2g94IzYUHGG_y9e9yC4a-yDDuSCeldWEMmFB_C6J';
    private $_ClientSecret = 'EPdYsfGVgJSCwZOoE4Woghk_A_q8ezWPSh8eJ14bVumI9xrgcchQHt9X1HN6NsejHIahU8Elf2C2J7Jh';

    public function __construct($shopping_cart){
        $this->_apiContext = PaypalPayment::ApiContext($this->_ClientId, $this->_ClientSecret);
        $config = config("paypal_payment");
        $flatConfig = array_dot($config);
        $this->_apiContext->setConfig($flatConfig);
        $this->shopping_cart = $shopping_cart;
    }

    public function generate(){
        $payment = PaypalPayment::payment()->setIntent("sale")
            ->setPayer($this->payer())
            ->setTransactions([$this->transaction()])
            ->setRedirectUrls($this->redirectURLs());
        try{
            $payment->create($this->_apiContext);
        }catch (Exception $ex){
            dd($ex);
            exit(1);
        }
        return $payment;
    }

    public function payer()
    {
        return PaypalPayment::payer()
            ->setPaymentMethod("paypal");
    }

    public function redirectURLs()
    {
        $baseUrl = url('/');
        return PaypalPayment::redirectUrls()
            ->setReturnURl("$baseUrl/payments/store")
            ->setCancelUrl("$baseUrl/carrito");
    }

    public function transaction()
    {
        return PaypalPayment::transaction()
            ->setAmount($this->amount())
            ->setItemList($this->items())
            ->setDescription("Tu compra en Computer@Sullana")->setInvoiceNumber(uniqid());
    }

    public function amount()
    {
        return PaypalPayment::amount()->setCurrency("USD")
//            ->setTotal($this->shopping_cart->totalUSD());
            ->setTotal($this->shopping_cart->totalUSD());
    }

    public function items()
    {
        $items = [];
        $products = $this->shopping_cart->products()->get();
        foreach ($products as $product){
            array_push($items, $product->paypalItem());
        }
        return PaypalPayment::itemList()->setItems($items);
    }

    public function execute($paymentId, $PayerID){
        $payment = PaypalPayment::getById($paymentId, $this->_apiContext);
        $execution = PaypalPayment::PaymentExecution()->setPayerId($PayerID);

        return $payment->execute($execution, $this->_apiContext);
    }
}