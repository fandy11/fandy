<?php

class CarController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    protected $layout = 'admin.layouts.index';

    public function __construct(Car $car) {
        $this->car = $car;
    }

    public function index() {
        //
        $data['telo'] = $this->car->Telo();
        $data['selectbox'] = $this->car->Checkbox();
        $data['types'] = Type::where('status', 1)->get(array('id', 'type'))->toArray();
        $this->layout->content = View::make('admin.contents.car', $data);
    }

    public function getCar() {
        return Datatable::collection($this->car->all())
                        ->addColumn('checkbox', function($checkbox) {
                            return '<input type="hidden" name="id[]" value="' . $checkbox->id . '"><input name="delete' . $checkbox->id . '" type="checkbox" class="uniform" id="test' . $checkbox->id . '">';
                        })
                        ->showColumns('registration_num')
                        ->addColumn('make_model', function($make_model) {
                            return $make_model->make . '&nbsp;' . $make_model->model;
                        })
                        ->addColumn('location', function($loc) {
                            return $loc->location->name;
                        })
                        ->addColumn('edit', function($edit) {
                            return '<a href="' . route('admin.car.edit', $edit->id) . '" class="btn btn-sm"><i class="icon-pencil"></i></a>';
                        })
                        ->searchColumns('registration_num', 'make_model', 'location')
                        ->orderColumns('registration_num', 'make_model', 'location')
                        ->make();
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
        $car = new Car();
        $car->make = Input::get('make');
        $car->model = Input::get('model');
        $car->registration_num = Input::get('registration_num');
        $car->mileage = Input::get('mileage');
        $car->location_id = Input::get('location_id');
        $car->save();
        $car_type = $this->car->find($car->id);
        if (Input::has('type')) {
            foreach (Input::get('type') as $type => $val) {
                $car_type->type()->attach($val);
            }
        }
        return Redirect::route('admin.car.index');
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
        $data['telo'] = $this->car->Telo();
        $data['car'] = $this->car->find($id);
        $data['selectbox'] = $this->car->Checkbox();
        $types = Type::where('status', 1)->get(array('id', 'type'))->toArray();
        $type_id = $data['car']->Type()->get()->toArray();
        foreach ($types as $type => $value) {
            foreach ($type_id as $cartype => $val) {
                if ($value['type'] == $val['type']) {
                    $types[$type]['checked'] = true;
                    break;
                } else {
                    $types[$type]['checked'] = false;
                }
            }
        }
        $data['types'] = $types;
        $this->layout->content = View::make('admin.contents.car', $data)->nest('new', 'admin.contents.car-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
        $car = $this->car->find($id);
        $car->make = Input::get('make');
        $car->model = Input::get('model');
        $car->registration_num = Input::get('registration_num');
        $car->mileage = Input::get('mileage');
        $car->location_id = Input::get('location_id');
        $car->save();
        $car->type()->detach();
        if (Input::has('type')) {
            foreach (Input::get('type') as $type => $val) {
                $car->type()->attach($val);
            }
        }
        return Redirect::route('admin.car.index');
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

    public function bulk_car() {
        $data = json_decode(Input::get('data'));
        foreach ($data as $t) {
            if ($t->delete) {
                $this->car->destroy($t->id);
            }
        }
    }

}
