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
        'username', 'password', 'agent_id', 'foo'/*DummyFillables*/
    ];

    public function logins(){
        return $this->hasMany(UserLogin::class, 'user_id');
    }
 
 	public function foo(){
            return $this->hasMany(Foo::class, 'user_id');
        }
 
 	public function foos(){
            return $this->hasMany(Foo::class, 'user_id');
        }//DummyRelationship
}
