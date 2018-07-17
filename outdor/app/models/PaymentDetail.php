<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PaymentDetail extends Eloquent {

    protected $table = 'payment_details';
    protected $fillable = array('options', 'values', '2nd_values');
    public $timestamps = true;

    public function Reservation() {
        return $this->belongsTo('reservation', 'reservation_id');
    }

}
