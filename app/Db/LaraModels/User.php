<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'created_at', 'updated_at'/*DummyFillables*/
    ];

    
 
 	public function logins(){
            return $this->hasMany(UserLogin::class, 'user_id');
        }//DummyRelationship
}
