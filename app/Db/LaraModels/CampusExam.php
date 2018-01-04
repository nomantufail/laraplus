<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class CampusExam extends Model
{
    protected $table = 'campus_exams';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'campus_id', 'campus_exam_type_id', 'exam_title', 'subject_id', 'exam_date', 'start_time', 'end_time', 'total_marks', 'passing_marks', 'create_by_id', 'duration'/*DummyFillables*/
    ];

    
 
 	 public function campus(){
            return $this->belongsTo(Campus::class, 'campus_id');
        }
 
 	 public function campusExamType(){
            return $this->belongsTo(CampusExamType::class, 'campus_exam_type_id');
        }
 
 	 public function subject(){
            return $this->belongsTo(Subject::class, 'subject_id');
        }
 
 	 public function createBy(){
            return $this->belongsTo(Agent::class, 'create_by_id');
        }
 
 	public function datesheetExam(){
                        return $this->hasMany(DatesheetExam::class, 'campus_exam_id');
                    }//DummyRelationship
}
