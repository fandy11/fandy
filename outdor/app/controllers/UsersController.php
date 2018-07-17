<?php

class UsersController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    protected $layout = 'admin.layouts.index';
    public $status = array('Inactive', 'Active' );

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function login() {
        if (Sentry::check()) {
            return Redirect::to('admin/reservation');
        }
        return View::make('admin.login');
    }

    public function logout() {
        Sentry::logout();
        return Redirect::to('login');
    }

    public function doLogin() {
        $rules = array(
            'username' => 'required|email',
            'password' => 'required',
        );
        $input = Input::All();
        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            return Redirect::to('login')->withInput()
                            ->withErrors($validation);
        }
        try {
            $credentials = array('email' => Input::get('username'), 'password' => Input::get('password'));
            if (Input::get('remember')) {
                Sentry::authenticate($credentials, true);
            } else {
                Sentry::authenticate($credentials, false);
            }
            return Redirect::to('admin/reservation');
        } catch (\Exception $e) {
            return Redirect::to('login')->withErrors(array('login' => $e->getMessage()));
        }
    }

    public function index() {
        //
        $data['status'] = $this->status;
        $data['groups'] = $this->user->SelectGroups();
        $this->layout->content = View::make('admin.contents.user', $data);
    }

    public function getUsers() {
        return Datatable::collection($this->user->all())
                        ->addColumn('checkbox', function($checkbox) {
                            return '<input type="hidden" name="id[]" value="' . $checkbox->id . '"><input name="delete' . $checkbox->id . '" type="checkbox" class="uniform" id="test' . $checkbox->id . '">';
                        })
                        ->addColumn('name', function($name) {
                            return ucfirst($name->first_name) . ' ' . ucfirst($name->last_name);
                        })
                        ->showColumns('email')
                        ->addColumn('created_at', function($user) {
                            return date('d F Y', strtotime($user->created_at));
                        })
                        ->addColumn('group', function($groups) {
                            $group = array();
                            foreach ($groups->getGroups() as $g) {
                                $group = array($g->name);
                            }
                            return implode(',', $group);
                        })
                        ->addColumn('status', function($status) {
                            return Form::select('status', array('inactive', 'active'), $status->activated);
                        })
                        ->addColumn('edit', function($edit) {
                            return '<a href="' . route('admin.user.edit', $edit->id) . '" class="btn btn-sm" id="edit-user"><i class="icon-pencil"></i></a>';
                        })
                        ->searchColumns('name', 'email', 'group', 'created_at', 'status')
                        ->orderColumns('checkbox', 'name', 'email', 'group', 'created_at', 'status')
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
        try {
            $user = Sentry::createUser(array(
                        'email' => Input::get('email'),
                        'password' => Input::get('password'),
                        'activated' => Input::get('status') == 1 ? false : true,
                        'first_name' => Input::get('first_name'),
                        'last_name' => Input::get('last_name'),
            ));
            $adminGroup = Sentry::findGroupById(Input::get('group'));
            $user->addGroup($adminGroup);
            return Redirect::route('admin.user.index');
        } catch (\Exception $e) {
            return Redirect::route('admin.user.index')->withErrors(array('login' => $e->getMessage()));
        }
    }

    public function cekEmail() {
        try {
            $user = Sentry::findUserByCredentials(array(
                        'email' => Input::get('email'),
            ));
            return json_encode("Email already in use");
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            return json_encode(TRUE);
        }
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
        $data['status'] = $this->status;
        $data['groups'] = $this->user->SelectGroups();
        $data['user'] = Sentry::findUserById($id);
        return View::make('admin.contents.user-edit', $data);
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
