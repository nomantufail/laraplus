<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class CampusExamAudienceResult extends Model
{
    protected $table = 'campus_exam_audience_results';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'campus_exam_id', 'student_id', 'obtained_marks', 'instructor_comments'/*DummyFillables*/
    ];

    
 
 	 public function campusExam(){
            return $this->belongsTo(Campus::class, 'campus_exam_id');
        }
 
 	 public function student(){
            return $this->belongsTo(Student::class, 'student_id');
        }//DummyRelationship
}
