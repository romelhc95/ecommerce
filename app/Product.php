<?php

namespace App;

use Anouar\Paypalpayment\Facades\PaypalPayment;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'description', 'pricing'
    ];

    public function paypalItem(){
        return PaypalPayment::item()
            ->setName($this->title)
            ->setDescription($this->description)
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice(($this->pricing / 100));
    }
}
