<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table = 'agents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'agent_type_id'/*DummyFillables*/
    ];

    
 
 	public function campusExam(){
        return $this->hasMany(CampusExam::class, 'create_by_id');
    }
    
 
 	public function campusDatesheet(){
                        return $this->hasMany(CampusDatesheet::class, 'created_by_id');
                    }//DummyRelationship
}
