<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PaymentSetting extends Eloquent {

    protected $table = 'payment_settings';
    protected $fillable = array('days', 'hours','price_per_day','price_per_day_details','price_per_hour','price_per_hour_details','rental_fee','insurance_val','sub_total','tax_val','total_price','deposit_payment');
    public $timestamps = true;

}
