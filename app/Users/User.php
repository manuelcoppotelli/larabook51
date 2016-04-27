<?php

namespace Larabook\Users;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, PresentableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Path to the presenter for a user.
     *
     * @var string
     */
    protected $presenter = 'Larabook\Users\UserPresenter';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    /**
     * Password must always be hashed.
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * A user has many statuses.
     */
    public function statuses()
    {
        return $this->hasMany('Larabook\Statuses\Status');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param $name
     * @param $email
     * @param $password
     *
     * @return User
     */
    public static function register($username, $email, $password)
    {
        return new static(compact('username', 'email', 'password'));
    }

    /**
     * Determine if the given user is the same
     * as the current one.
     *
     * @param  $user
     * @return bool
     */
    public function is($user)
    {
        if (is_null($user)) return false;
        return $this->username == $user->username;
    }
}
