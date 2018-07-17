<?php

class FrontController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    protected $layout = 'front.layouts.index';

    public function getHome() {
        Session::flush();
        $data['selectbox'] = Car::Checkbox();
        if (Request::ajax()) {
            return View::make('front.content.home', $data);
        }
    }

    public function getCar() {
        if (Request::ajax()) {
            Session::flush();
            $data['loc'] = Input::all();
            $data['diff'] = $this->getDateDiff(Input::get('pickup'), Input::get('return'));
            $data['locpickup'] = Location::find(Input::get('locpickup'));
            $data['locreturn'] = Location::find(Input::get('locreturn'));
            $data['cars'] = Car::where('location_id', Input::get('locpickup'))->get();

//            $queries = DB::getQueryLog();
//            $last_query = end($queries);
//            dd($last_query);
            return View::make('front.content.car', $data);
        }
    }

    public function selectCar() {
        if (Request::ajax()) {
            $method = Request::method();
            if (Request::isMethod('post')) {
                Session::flush();
            }
            $data['insurance'] = getOptions('payment', 'insurance_payment[]');
            $data['deposit'] = getOptions('payment', 'deposit_payment[]');
            $data['tax'] = getOptions('payment', 'tax_payment[]');
            $data['loc'] = Input::all();
            $data['diff'] = $this->getDateDiff(Input::get('pickup'), Input::get('return'));
            $data['locpickup'] = Location::find(Input::get('locpickup_id'));
            $data['locreturn'] = Location::find(Input::get('locreturn_id'));
            $car = explode('-', Input::get('car_id'));
            $data['car'] = Car::find($car[1]);
            $data['type'] = Type::find($car[0]);
            $data['rental_fee'] = intval(intval($data['diff']->days * $data['type']->price_day) + intval($data['diff']->h * $data['type']->price_hour));
            if (getOptions('rental', 'calculate_rental_fee') == 'd') {
                $data['rental_fee'] = $data['diff']->days * $data['type']->price_day;
            } elseif (getOptions('rental', 'calculate_rental_fee') == 'h') {
                $hours = $data['diff']->h + ($data['diff']->days * 24);
                $data['rental_fee'] = intval($hours * $data['type']->price_hour);
            }
            $i = 0;
            if (count($data['type']->extra) > 0) {
                $data['extras'] = $data['type']->extra;
            } else {
                $data['extras'] = '';
            }
            if (Input::has('extras')) {
                $fee = Input::has('extra_fee') ? Input::get('extra_fee') : 0;
                Session::put('extras.' . Input::get('extras'), TRUE);
                $data['added'] = Session::get('extras');
                if (Input::get('add')) {
                    foreach ($data['added'] as $key => $val) {
                        $extra = Extra::find($key);
                        if ($extra->type == 'day') {
                            $data['extra_fee'] = $fee + $extra->price * $data['diff']->days;
                        } else {
                            $data['extra_fee'] = $fee + $extra->price;
                        }
                    }
                } elseif (Input::get('remove')) {
                    $extra = Extra::find(Input::get('extras'));
                    if ($extra->type == 'day') {
                        $data['extra_fee'] = $fee - $extra->price * $data['diff']->days;
                    } else {
                        $data['extra_fee'] = $fee - $extra->price;
                    }
                    Session::forget('extras.' . Input::get('extras'));
                }
            } else {
                $data['extra_fee'] = 0;
            }
            $data['total_price'] = $data['rental_fee'] + $data['extra_fee'];
            $data['deposit_price'] = floatval(($data['deposit']['value_one'] / 100) * $data['total_price']);
            $data['added'] = Session::get('extras');
//            $queries = DB::getQueryLog();
//            $last_query = end($queries);
//            dd($last_query);
            return View::make('front.content.extra', $data);
        }
    }

    public function detailCustomer() {
        if (Request::ajax()) {
            $data['deposit'] = getOptions('payment', 'deposit_payment[]');
            $data['loc'] = Input::all();
            $data['car'] = Car::find(Input::get('car_id'));
            $data['type'] = Type::find(Input::get('type_id'));
            $data['locpickup'] = Location::find(Input::get('locpickupid'));
            $data['locreturn'] = Location::find(Input::get('locreturnid'));
            $data['diff'] = $this->getDateDiff(Input::get('pickup'), Input::get('return'));
            $data['price_perday'] = Input::get('price_perday');
            $data['price_perhour'] = Input::get('price_perhour');
            $data['rental_fee'] = Input::get('rental_fee');
            $data['extra_fee'] = Input::get('extra_fee');
            $data['total_price'] = Input::get('total_price');
            $data['deposit_price'] = Input::get('deposit_price');
            return View::make('front.content.customer', $data);
        }
    }

    public function payment() {
        if (Request::ajax()) {
            $data['all'] = Input::all();
            $customer = new Customers();
            $customer->title = Input::get('title');
            $customer->name = Input::get('name');
            $customer->email = Input::get('email');
            $customer->telephone = Input::get('phone');
            $customer->country = Input::get('country');
            $customer->city = Input::get('city');
            $customer->state = Input::get('state');
            $customer->address = Input::get('address');
            $customer->zip = Input::get('zip');
            $customer->save();
            if ($customer->id) {
                $reservation = new Reservation();
                $reservation->status = 'pending';
                $reservation->start = date('Y-m-d h:i:s', strtotime(Input::get('pickup')));
                $reservation->end = date('Y-m-d h:i:s', strtotime(Input::get('return')));
                $reservation->type_id = Input::get('type_id');
                $reservation->car_id = Input::get('car_id');
                $reservation->loc_pick = Input::get('locpickupid');
                $reservation->loc_return = Input::get('locreturnid');
                $reservation->payment_type = Input::get('payment');
                $reservation->user_id = $customer->id;
//                if (Input::has('extras')) {
//                    $data_ex = array();
//                    $extras = Input::get('extras');
//                    foreach ($extras as $ext => $val) {
//                        $extra = Extra::find($val)->toArray();
//                        $data_ex[] = array(
//                            'id' => $extra['id'],
//                            'name' => $extra['name'],
//                        );
//                    }
//                    $reservation->extras = json_encode($data_ex);
//                }
                $reservation->save();
                if ($reservation->id) {
                    $payment = new PaymentDetail();
                    $payment->reservation_id = $reservation->id;
                    $payment->days = Input::get('total_day');
                    $payment->hours = Input::get('total_hours');
                    $payment->price_per_day = Input::get('price_perday');
                    $payment->price_per_day_details = Input::get('total_day') . ' x Rp.' . Input::get('price_perday');
                    $payment->price_per_hour = Input::get('price_perhour');
                    $payment->price_per_hour_details = Input::get('total_hours') . ' x Rp.' . Input::get('price_perhour');
                    $payment->rental_fee = Input::get('rental_fee');
                    $payment->extra_fee = Input::get('extra_fee');
                    $payment->sub_total = Input::get('total_price');
                    $payment->insurance_val = 0;
                    $payment->tax_val = 0;
                    $payment->total_price = Input::get('total_price');
                    $payment->deposit_payment = Input::get('deposit_price');
                    $payment->save();
                }
                return View::make('front.content.complete', $data);
            }
        }
    }

    private function getDateDiff($from, $to) {
        $datetime1 = new DateTime($from);
        $datetime2 = new DateTime($to);
        $interval = $datetime1->diff($datetime2);
        return $interval;
    }

}
