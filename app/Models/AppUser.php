<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'app_users';

    /**
     * Get the roles associated to the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'app_users_has_roles', 'app_users_id', 'roles_id');
    }
}
