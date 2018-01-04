<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class DatesheetExam extends Model
{
    protected $table = 'datesheet_exams';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'campus_datesheet_id', 'campus_exam_id'/*DummyFillables*/
    ];

    
 
 	 public function campusDatesheet(){
            return $this->belongsTo(CampusDatesheet::class, 'campus_datesheet_id');
        }
 
 	 public function campusExam(){
            return $this->belongsTo(CampusExam::class, 'campus_exam_id');
        }//DummyRelationship
}
