<?php

use Illuminate\Support\Collection;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getOptions($settings, $options) {
    $data = array();
    switch ($settings) {
        case 'rental':
            $data = RentalSetting::where('options', $options)->first()->values;
            break;
        case 'payment':
            $data = array(
                'value_one' => PaymentSetting::where('options', $options)->first()->values,
                'value_two' => PaymentSetting::where('options', $options)->first()->values_2
            );
            break;
        case 'form':
            $data = FormSetting::where('options', $options)->first()->values;
            break;
        default:
            break;
    }
    return $data;
}
