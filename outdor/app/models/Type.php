<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Type extends Eloquent {

    protected $table = 'type';
    protected $fillable = array('type', 'description', 'image', 'price_day', 'price_hour', 'passengers', 'bags', 'doors', 'transmission', 'status');
    public $timestamps = true;

    public function Extra() {
        return $this->belongsToMany('extra', 'type_extra')->withTimestamps();
    }

    public function Car() {
        return $this->belongsToMany('car', 'car_type')->withTimestamps();
    }

}
