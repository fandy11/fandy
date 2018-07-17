<?php

class ReservationController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    protected $layout = 'admin.layouts.index';

    public function __construct(Reservation $res) {
        $this->reservation = $res;
    }

    public function index() {
        //
        $data['selectbox'] = Car::Checkbox();
        $data['selecttype'] = $this->reservation->Selectbox();
        $this->layout->content = View::make('admin.contents.reservation', $data);
    }

    public function getCarByType() {
        $check = '';
        $data = array();
        $id = Input::get("id");
        $type = Type::find($id);
        if ($type != NULL) {
            if (count($type->get()) > 0) {
                if (count($type->Car()->get()->toArray()) > 0) {
                    $check['car'] = $type->Car()->get()->toArray();
                    if (count($type->Extra()->get()->toArray() > 0)) {
                        $data['extra'] = $type->Extra()->get()->toArray();
                    }
                }
            }
        }
        if (Input::has('add')) {
            $data['idadd'] = Input::get('addid');
            return View::make('admin.contents.add-extra', $data)->render();
        }
        if (Input::has('id_res')) {
            $res_id = Input::get('id_res');
            $res = $this->reservation->find($res_id);
            $data['reg_extra'] = json_decode($res->extras);
            $check['extra'] = View::make('admin.contents.select-extra', $data)->render();
        } else {
            $check['extra'] = View::make('admin.contents.select-extra', $data)->render();
        }
        return json_encode($check);
    }

    public function getReservation() {
        return Datatable::collection($this->reservation->all())
                        ->addColumn('checkbox', function($checkbox) {
                            return '<input type="hidden" name="id[]" value="' . $checkbox->id . '"><input name="delete' . $checkbox->id . '" type="checkbox" class="uniform" id="test' . $checkbox->id . '">';
                        })
                        ->addColumn('datetime', function($datetime) {
                            $string = '';
                            $loc_pick = Location::find($datetime->loc_pick);
                            $loc_return = Location::find($datetime->loc_return);
                            $string .= date('Y F d, h:i', strtotime($datetime->start)) . ' at ' . $loc_pick->name;
                            $string .='<br />' . date('Y F d, h:i', strtotime($datetime->end)) . ' at ' . $loc_return->name;
                            return $string;
                        })
                        ->addColumn('type', function($type) {
                            return $type->type->type;
                        })
                        ->addColumn('car', function($car) {
                            $car_name = Car::find($car->car_id);
                            return $car_name->registration_num . '<br />' . $car_name->make . ' ' . $car_name->model;
                        })
                        ->addColumn('Customer', function($customer) {
                            return $customer->Customer->name;
                        })
                        ->addColumn('Cost', function($cost) {
                            return 'Rp.' . number_format($cost->Payment->total_price, 2);
                        })
                        ->addColumn('status', function($status) {
                            return Form::select('status', array('cancelled' => 'Cancelled', 'collected' => 'Collected', 'complete' => 'Complete', 'confirmed' => 'Confirmed', 'pending' => 'Pending'), $status->status, array('class' => 'form-control'));
                        })
                        ->addColumn('edit', function($edit) {
                            return '<a href="' . route('admin.reservation.edit', $edit->id) . '" class="btn btn-sm" id="edit-res"><i class="icon-pencil"></i></a>';
                        })
                        ->searchColumns('datetime')
                        ->orderColumns('datetime')
                        ->make();
    }

    public function getPrice() {
        $input = Input::get('data');
        $type = Input::get('type');
        $price_ex = 0;
        $insurance = getOptions('payment', 'insurance_payment[]');
        $deposit = getOptions('payment', 'deposit_payment[]');
        $tax = getOptions('payment', 'tax_payment[]');
        $from = Input::get('start-date') . ' ' . Input::get('start-time');
        $to = Input::get('end-date') . ' ' . Input::get('end-time');
        $interval = $this->getDateDiff($from, $to);
        $price_day = intval(Type::find(Input::get('type'))->first()->price_day);
        $price_hour = intval(Type::find(Input::get('type'))->first()->price_hour);
        if (Input::has('extras')) {
            $i = 0;
            $extrasa = Input::get('extras');
            $unique = array_unique($extrasa);
            $unique_keys = array_values($unique);
            foreach ($unique_keys as $ex_add) {
                $extra_add = Extra::find($ex_add);
                if (count($extra_add) > 0) {
                    $price_add = $extra_add->price;
                    $ex_type = $extra_add->type;
                    if ($ex_type == 'day') {
                        $price_ex = $price_ex + $price_add * ($interval->days == 0 ? 1 : $interval->d);
                    } else {
                        $price_ex = $price_ex + $price_add;
                    }
                }
                $i++;
            }
        }
        $data = array(
            'days' => $interval->days,
            'hours' => $interval->h,
            'total_day' => $interval->days . ' days ' . $interval->h . ' hours',
            'price_day' => $price_day,
            'price_hour' => $price_hour,
            'insurance_type' => $insurance['value_two'],
            'insurance_val' => intval($insurance['value_one']),
            'tax_type' => $tax['value_two'],
            'tax_val' => $tax['value_one'],
            'deposit_payment' => $deposit['value_one'],
            'rental_fee' => intval(intval($interval->days * $price_day) + intval($interval->h * $price_hour)),
            'price_ex' => $price_ex
        );
        if (getOptions('rental', 'calculate_rental_fee') == 'd') {
            $data['hours'] = 0;
            $data['price_hour'] = 0;
            $data['rental_fee'] = intval(intval($interval->days * $price_day));
        } elseif (getOptions('rental', 'calculate_rental_fee') == 'h') {
            $data['days'] = 0;
            $data['hours'] = $interval->h + ($interval->days * 24);
            $data['price_day'] = 0;
            $data['rental_fee'] = intval($data['hours'] * $price_hour);
        }
        return View::make('admin.contents.reservation-price', $data)->render();
    }

    private function getDateDiff($from, $to) {
        $datetime1 = new DateTime($from);
        $datetime2 = new DateTime($to);
        $interval = $datetime1->diff($datetime2);
        return $interval;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //

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
            $reservation->status = Input::get('status');
            $reservation->start = date('Y-m-d h:i:s', strtotime(Input::get('start-date') . ' ' . Input::get('start-time')));
            $reservation->end = date('Y-m-d h:i:s', strtotime(Input::get('end-date') . ' ' . Input::get('end-time')));
            $reservation->type_id = Input::get('type');
            $reservation->car_id = Input::get('car');
            $reservation->loc_pick = Input::get('loc_pick');
            $reservation->loc_return = Input::get('loc_return');
            $reservation->user_id = $customer->id;
            if (Input::has('extras')) {
                $data_ex = array();
                $extras = Input::get('extras');
                foreach ($extras as $ext => $val) {
                    $extra = Extra::find($val)->toArray();
                    $data_ex[] = array(
                        'id' => $extra['id'],
                        'name' => $extra['name'],
                    );
                }
                $reservation->extras = json_encode($data_ex);
            }
            $reservation->save();
            if ($reservation->id) {
                $payment = new PaymentDetail();
                $payment->reservation_id = $reservation->id;
                $payment->days = Input::get('total_day');
                $payment->hours = Input::get('total_hours');
                $payment->price_per_day = Input::get('price_per_day');
                $payment->price_per_day_details = Input::get('price_per_day_details');
                $payment->price_per_hour = Input::get('price_per_hour');
                $payment->price_per_hour_details = Input::get('price_per_hour_details');
                $payment->rental_fee = Input::get('rental_fee');
                $payment->extra_fee = Input::get('extra_fee');
                $payment->insurance_val = Input::get('insurance_val');
                $payment->sub_total = Input::get('sub_total');
                $payment->tax_val = Input::get('tax_val');
                $payment->total_price = Input::get('total_price');
                $payment->deposit_payment = Input::get('deposit_payment');
                $payment->save();
            }
        }
        return Redirect::route('admin.reservation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
        $data['reservation'] = $this->reservation->find($id);
        $data['selectbox'] = Car::Checkbox();
        $data['selecttype'] = $this->reservation->Selectbox();
        return View::make('admin.contents.reservation-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
        $reservation = $this->reservation->find($id);
        $payment = $reservation->payment;
        $reservation->status = Input::get('status');
        $reservation->start = date('Y-m-d h:i:s', strtotime(Input::get('start-date') . ' ' . Input::get('start-time')));
        $reservation->end = date('Y-m-d h:i:s', strtotime(Input::get('end-date') . ' ' . Input::get('end-time')));
        $reservation->type_id = Input::get('type');
        $reservation->car_id = Input::get('car');
        $reservation->loc_pick = Input::get('loc_pick');
        $reservation->loc_return = Input::get('loc_return');
        $payment->days = Input::get('total_day');
        $payment->hours = Input::get('total_hours');
        $payment->price_per_day = Input::get('price_per_day');
        $payment->price_per_day_details = Input::get('price_per_day_details');
        $payment->price_per_hour = Input::get('price_per_hour');
        $payment->price_per_hour_details = Input::get('price_per_hour_details');
        $payment->rental_fee = Input::get('rental_fee');
        $payment->extra_fee = Input::get('extra_fee');
        $payment->insurance_val = Input::get('insurance_val');
        $payment->sub_total = Input::get('sub_total');
        $payment->tax_val = Input::get('tax_val');
        $payment->total_price = Input::get('total_price');
        $payment->deposit_payment = Input::get('deposit_payment');
        $payment->save();
        if (Input::has('extras')) {
            $data_ex = array();
            $extras = Input::get('extras');
            foreach ($extras as $ext => $val) {
                $extra = Extra::find($val)->toArray();
                $data_ex[] = array(
                    'id' => $extra['id'],
                    'name' => $extra['name'],
                );
            }
            $reservation->extras = json_encode($data_ex);
        }
        if ($reservation->save()) {
            $customer = Customers::find($reservation->id);
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
        }
        return Redirect::route('admin.reservation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
