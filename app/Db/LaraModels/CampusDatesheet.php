<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class CampusDatesheet extends Model
{
    protected $table = 'campus_datesheets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'created_by_id', 'exam_type_id', 'starting_from', 'unique_identity', 'result_status', 'notes'/*DummyFillables*/
    ];

    
 
 	 public function createdBy(){
            return $this->belongsTo(Agent::class, 'created_by_id');
        }
 
 	 public function examType(){
            return $this->belongsTo(ExamType::class, 'exam_type_id');
        }
 
 	public function datesheetExam(){
                        return $this->hasMany(DatesheetExam::class, 'campus_datesheet_id');
                    }//DummyRelationship
}
