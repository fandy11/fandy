<?php

class LocationController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    protected $layout = 'admin.layouts.index';

    public function __construct(Location $location) {
        $this->loc = $location;
    }

    public function index() {
        //
        $this->layout->content = View::make('admin.contents.location');
    }

    public function getLoc() {
        return Datatable::collection(Location::all())
                        ->addColumn('checkbox', function($checkbox) {
                            return '<input type="hidden" name="id[]" value="' . $checkbox->id . '"><input name="delete' . $checkbox->id . '" type="checkbox" class="uniform" id="test' . $checkbox->id . '">';
                        })
                        ->showColumns('name')
                        ->addColumn('address', function($address) {
                            return $address->address . ', ' . $address->city . ', ' . $address->state . ', ' . $address->country . ', ' . $address->zip;
                        })
                        ->addColumn('num_car',function($num_car){
                            return count($num_car->car);
                        })
                        ->addColumn('status', function($status) {
                            return Form::select('status', array('inactive', 'active'), $status->status);
                        })
                        ->addColumn('edit', function($edit) {
                            return '<a href="' . route('admin.location.edit', $edit->id) . '" class="btn btn-sm" id="edit"><i class="icon-pencil"></i></a>';
                        })
                        ->searchColumns('name', 'status')
                        ->orderColumns('name', 'status')
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
        $data = Input::except('_token');
        $this->loc->create($data);
        return Redirect::route('admin.location.index');
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
        $data['loc'] = $this->loc->find($id);
        return View::make('admin.contents.edit-loc', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
        $data = Input::except('_method', '_token');
        $loc = $this->loc->find($id);
        $loc->name = Input::get('name');
        $loc->email = Input::get('email');
        $loc->phone = Input::get('phone');
        $loc->country = Input::get('country');
        $loc->state = Input::get('state');
        $loc->city = Input::get('city');
        $loc->address = Input::get('address');
        $loc->zip = Input::get('zip');
        $loc->save();
        return Redirect::route('admin.location.index');
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

    public function bulk_action() {
        $data = json_decode(Input::get('data'));
        foreach ($data as $t) {
            if ($t->delete) {
                $this->loc->destroy($t->id);
            } else {
                $loc = $this->loc->find($t->id);
                $loc->status = $t->status;
                $loc->save();
            }
        }
    }

}
