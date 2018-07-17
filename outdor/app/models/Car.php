<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Car extends Eloquent {

    protected $table = 'car';
    protected $fillable = array('name', 'model', 'registration_num', 'mile_age');
    public $timestamps = true;

    public function Location() {
        return $this->belongsTo('location', 'location_id');
    }

    public function Type() {
        return $this->belongsToMany('type', 'car_type')->withTimestamps();
    }

    public static function Checkbox() {
        $data = array();
        $checkbox = Location::where('status', 1)->get()->toArray();
        if (!empty($checkbox)) {
            foreach ($checkbox as $check) {
                $data[$check['id']] = $check['name'];
            }
        }
        return $data;
    }

    public static function Telo() {
        $data = array();
        $cars = Car::all();
        $i = 0;
        if (count($cars) > 0) {
            foreach ($cars as $car) {
                $data[$i] = array(
                    'title' => $car->make . ' ' . $car->model,
                    'start' => date('Y-m-d 20:10:10'),
                    'end' => date('2014-06-12 20:10:10'),
                    'all-day' => FALSE
                );
                $i++;
            }
        }
        return json_encode($data);
    }

}
