<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $table = 'campuses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'institute_id', 'address', 'type'/*DummyFillables*/
    ];

    
 
 	public function campusExamTypes(){
        return $this->hasMany(CampusExamType::class, 'campus_id');
    }
 
 	public function campusExams(){
        return $this->hasMany(CampusExam::class, 'campus_id');
    }
 
 	public function campusExamAudienceResults(){
        return $this->hasMany(CampusExamAudienceResult::class, 'campus_exam_id');
    }
 
 	public function bankAccounts(){
        return $this->hasMany(BankAccount::class, 'campus_id');
    }
 
 	public function campusTransactionTypes(){
        return $this->hasMany(CampusTransactionType::class, 'campus_id');
    }
 
 	public function vouchers(){
            return $this->hasMany(Voucher::class, 'campus_id');
        }//DummyRelationship
}
