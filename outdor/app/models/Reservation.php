<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Reservation extends Eloquent {

    protected $table = 'reservation';
    protected $fillable = array('status', 'start', 'end', 'type_id', 'loc_pick', 'loc_return', 'user_id', 'res_detail');
    public $timestamps = true;

    public function Type() {
        return $this->belongsTo('type', 'type_id');
    }
    
    public function Payment(){
        return $this->hasOne('PaymentDetail','reservation_id');
    }
    
    public function Customer(){
        return $this->belongsTo('customers','user_id');
    }

    public static function Selectbox() {
        $data = array();
        $checkbox = Type::where('status', 1)->get()->toArray();
        if (!empty($checkbox)) {
            foreach ($checkbox as $check) {
                $data[0] = '-- Choose Type --';
                $data[$check['id']] = $check['type'];
            }
        }
        return $data;
    }

}
