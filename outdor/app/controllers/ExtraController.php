<?php

class ExtraController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    protected $layout = 'admin.layouts.index';

    public function __construct(Extra $extra) {
        $this->extra = $extra;
    }

    public function index() {
        //
        $this->layout->content = View::make('admin.contents.extra');
    }

    public function getExtra() {
        return Datatable::collection($this->extra->all())
                        ->addColumn('checkbox', function($checkbox) {
                            return '<input type="hidden" name="id[]" value="' . $checkbox->id . '"><input name="delete' . $checkbox->id . '" type="checkbox" class="uniform" id="test' . $checkbox->id . '">';
                        })
                        ->showColumns('name')
                        ->addColumn('price', function($price) {
                            return 'Rp. ' . number_format(floatval($price->price), 2, ",", ".") . ' / ' . $price->type;
                        })
                        ->addColumn('status', function($status) {
                            return Form::select('status', array('inactive', 'active'), $status->status);
                        })
                        ->addColumn('edit', function($edit) {
                            return '<a href="' . route('admin.extra.edit', $edit->id) . '" class="btn btn-sm"><i class="icon-pencil"></i></a>';
                        })
                        ->searchColumns('name', 'status')
                        ->orderColumns('name', 'status')
                        ->make();
    }

    public function getType() {
        return Datatable::collection(Type::all())
                        ->addColumn('checkbox', function($checkbox) {
                            return '<input type="hidden" name="id[]"  value="' . $checkbox->id . '"><input name="delete' . $checkbox->id . '" type="checkbox" class="uniform" id="test' . $checkbox->id . '">';
                        })
                        ->addColumn('image', function($image) {
                            return '<img src="' . asset('assets/img/type/' . $image->image) . '" alt="" style="width: 100px">';
                        })
                        ->showColumns('type')
                        ->addColumn('car_model', function($car_model) {
                            $passengers = '<span class="label label-info"><i class="icon-group"></i> ' . $car_model->passengers . '</span>';
                            $bags = '<span class="label label-info"><i class="icon-briefcase"></i> ' . $car_model->bags . '</span>';
                            $doors = '<span class="label label-info"><i class="icon-signout"></i> ' . $car_model->doors . '</span>';
                            $trans = '<span class="label label-info"><i class="icon-sitemap"></i> ' . ($car_model->transmission == 'auto' ? 'A' : 'M') . '</span>';
                            return $passengers . '&nbsp' . $bags . '&nbsp' . $doors . '&nbsp' . $trans;
                        })
                        ->addColumn('num_car', function($num_car) {
                            return count($num_car->car);
                        })
                        ->addColumn('status', function($status) {
                            return Form::select('status', array('inactive', 'active'), $status->status);
                        })
                        ->addColumn('edit', function($edit) {
                            return '<a href="' . route('admin.type.edit', $edit->id) . '" class="btn btn-sm"><i class="icon-pencil"></i></a>';
                        })
                        ->searchColumns('type', 'status')
                        ->orderColumns('type', 'status')
                        ->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
        $this->layout->content = View::make('admin.contents.extra')->nest('extra', 'admin.contents.extra-new');
    }

    public function type_create() {
        $data['extra'] = $this->extra->checkbox();
        $this->layout->content = View::make('admin.contents.extra')->nest('type', 'admin.contents.type-new', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
        $data = Input::except('_token');
        $this->extra->create($data);
        return Redirect::route('admin.extra.index');
    }

    public function store_type() {
        $destinationPath = public_path() . '/assets/img/type/';
        $type = new Type();
        $type->type = Input::get('type');
        $type->description = Input::get('description');
        $type->price_day = Input::get('price_day');
        $type->price_hour = Input::get('price_hour');
        $type->passengers = Input::get('passengers');
        $type->bags = Input::get('bags');
        $type->doors = Input::get('doors');
        $type->transmission = Input::get('transmission');
        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $filename = str_random(12) . '.' . $file->getClientOriginalExtension();
            Input::file('image')->move($destinationPath, $filename);
            $type->image = $filename;
        }
        $type->save();
        $type_ex = Type::find($type->id);
        if (Input::has('extra')) {
            foreach (Input::get('extra') as $key => $val) {
                $type_ex->extra()->attach($val);
            }
        }
        return Redirect::route('admin.extra.index');
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
        $data['extra'] = $this->extra->find($id);
        $this->layout->content = View::make('admin.contents.extra')->nest('extra', 'admin.contents.extra-edit', $data);
    }

    public function edit_type($id) {
        $data['checkbox'] = $this->extra->checkbox();
        $data['type'] = Type::find($id);
        $i = 0;
        if (count($data['type']->extra) > 0) {
            foreach ($data['type']->extra as $extra) {
                $data['extra'][$i] = $extra->id;
                $i++;
            }
        } else {
            $data['extra'] = '';
        }
        $this->layout->content = View::make('admin.contents.extra')->nest('extra', 'admin.contents.type-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
        $extra = $this->extra->find($id);
        $extra->name = Input::get('name');
        $extra->price = Input::get('price');
        $extra->type = Input::get('type');
        $extra->save();
        return Redirect::route('admin.extra.index');
    }

    public function update_type($id) {
        $type = Type::find($id);
        $destinationPath = public_path() . '/assets/img/type/';
        $type->type = Input::get('type');
        $type->description = Input::get('description');
        $type->price_day = Input::get('price_day');
        $type->price_hour = Input::get('price_hour');
        $type->passengers = Input::get('passengers');
        $type->bags = Input::get('bags');
        $type->doors = Input::get('doors');
        $type->transmission = Input::get('transmission');
        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $filename = str_random(12) . '.' . $file->getClientOriginalExtension();
            Input::file('image')->move($destinationPath, $filename);
            $type->image = $filename;
        }
        $type->save();
        if (Input::has('extra')) {
            $type->extra()->detach();
            foreach (Input::get('extra') as $key => $val) {
                $type->extra()->attach($val);
            }
        }
        return Redirect::route('admin.extra.index');
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

    public function bulk_extra() {
        $data = json_decode(Input::get('data'));
        foreach ($data as $t) {
            echo $t->id;
            $extra = $this->extra->find($t->id);
            $extra->status = $t->status;
            $extra->save();
            if ($t->delete) {
                $this->extra->destroy($t->id);
            }
        }
    }

    public function bulk_type() {
        $data = json_decode(Input::get('data'));
        foreach ($data as $t) {
            if ($t->delete) {
                Type::destroy($t->id);
            } else {
                $type = Type::find($t->id);
                $type->status = $t->status;
                $type->save();
            }
        }
    }

}
