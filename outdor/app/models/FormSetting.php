<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class FormSetting extends Eloquent {

    protected $table = 'checkout_form_settings';
    protected $fillable = array('options', 'values');
    public $timestamps = true;

}
