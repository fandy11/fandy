<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Customers extends Eloquent {

    protected $table = 'customers';
    protected $fillable = array('title', 'name','email','telephone','country','state','city','address','zip');
    public $timestamps = true;

}
