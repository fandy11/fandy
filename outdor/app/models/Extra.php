<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Extra extends Eloquent {

    protected $table = 'extra';
    protected $fillable = array('name', 'price', 'type', 'status');
    public $timestamps = true;

    public function Type() {
        return $this->belongsToMany('type', 'type_extra')->withTimestamps();
    }

    public static function Checkbox() {
        $data = array();
        $checkbox = Extra::where('status', 1)->get()->toArray();
        if (!empty($checkbox)) {
            foreach ($checkbox as $check) {
                $data[$check['id']] = $check['name'];
            }
        }
        return $data;
    }

}
