<?php

class SettingsController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    protected $layout = 'admin.layouts.index';

    public function __construct(FormSetting $formsetting) {
        $this->formsetting = $formsetting;
    }

    public function index() {
        //
        $data['form'] = $this->formsetting->all();
        $data['payment'] = PaymentSetting::all();
        $data['rental'] = RentalSetting::all();
        $this->layout->content = View::make('admin.settings.settings', $data);
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
        $data = Input::except('_token');
        foreach ($data as $d => $v) {
            $this->formsetting->where('options', $d)->update(array('values' => $v));
        }
        $queries = DB::getQueryLog();
        $last_query = end($queries);
        dd($last_query);
    }

    public function payment_store() {
        //
        $data = Input::except('_token');
        foreach ($data as $key => $val) {
            if (sizeof($val) > 1) {
                PaymentSetting::where('options', $key . '[]')->update(array('values_2' => $val[1]));
            }
            PaymentSetting::where('options', $key . '[]')->update(array('values' => $val[0]));
        }
        $queries = DB::getQueryLog();
        $last_query = end($queries);
        dd($last_query);
    }

    public function rental_store() {
        //
        $data = Input::except('_token');
        foreach ($data as $d => $v) {
            RentalSetting::where('options', $d)->update(array('values' => $v));
        }
        $queries = DB::getQueryLog();
        $last_query = end($queries);
        dd($last_query);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
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
