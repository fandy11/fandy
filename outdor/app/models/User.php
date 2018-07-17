<?php

class User extends Cartalyst\Sentry\Users\Eloquent\User {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    public function getAuthIdentifier() {
        
    }

    public static function SelectGroups() {
        $data = array();
        $groups = Sentry::findAllGroups();
        foreach ($groups as $group) {
            $data = array(
                $group->id => $group->name
            );
        }
        return $data;
    }

    public function getAuthPassword() {
        
    }

    public function getRememberToken() {
        
    }

    public function getRememberTokenName() {
        
    }

    public function getReminderEmail() {
        
    }

    public function setRememberToken($value) {
        
    }

}
