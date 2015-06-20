<?php

namespace Larabook\Statuses;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'statuses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['body'];

    /**
     * A status belong to a user.
     */
    public function user()
    {
        return $this->belongsTo('Larabook\Users\User');
    }

    /**
     * Create a new status instance.
     *
     * @param $body
     * @return Status
     */
    public static function publish($body)
    {
        return new static(compact('body'));
    }
}
