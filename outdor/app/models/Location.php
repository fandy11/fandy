<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Location extends Eloquent {

    protected $table = 'location';
    protected $fillable = array('name', 'email', 'phone', 'country', 'state', 'city','address', 'zip');
    public $timestamps = true;

    public function Car(){
        return $this->hasMany('car');
    }
}
