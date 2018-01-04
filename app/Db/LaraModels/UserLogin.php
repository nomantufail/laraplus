<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{
    protected $table = 'user_logins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'session_token', 'active', 'deviceid'/*DummyFillables*/
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
 
 	public function foo(){
            return $this->hasMany(Foo::class, 'user_login_id');
        }//DummyRelationship
}
