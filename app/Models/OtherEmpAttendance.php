<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class OtherEmpAttendance extends Model implements ModelInterface
{
    
 	private $id = 0;
 	private $otherEmployeeId = 0;
 	private $attendanceStatus = 0;
 	private $checkIn = null;
 	private $checkOut = null;
 	private $attendanceDate = null;
 	private $leaveReasonId = 0;
 	private $sessionId = 0;
 	private $foo = '';//DummyProps

    public function __construct($id = 0, $otherEmployeeId = 0, $attendanceStatus = 0, $checkIn = null, $checkOut = null, $attendanceDate = null, $leaveReasonId = 0, $sessionId = 0, $foo = '' /*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setOtherEmployeeId($otherEmployeeId);
 	 	$this->setAttendanceStatus($attendanceStatus);
 	 	$this->setCheckIn($checkIn);
 	 	$this->setCheckOut($checkOut);
 	 	$this->setAttendanceDate($attendanceDate);
 	 	$this->setLeaveReasonId($leaveReasonId);
 	 	$this->setSessionId($sessionId);
 	 	$this->setFoo($foo);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'otherEmployeeId' => $this->getOtherEmployeeId(), 
 	 	 	'attendanceStatus' => $this->getAttendanceStatus(), 
 	 	 	'checkIn' => $this->getCheckIn(), 
 	 	 	'checkOut' => $this->getCheckOut(), 
 	 	 	'attendanceDate' => $this->getAttendanceDate(), 
 	 	 	'leaveReasonId' => $this->getLeaveReasonId(), 
 	 	 	'sessionId' => $this->getSessionId(), 
 	 	 	'foo' => $this->getFoo()//DummyToArray
        ];
    }

    
    /**
     * @return $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return $otherEmployeeId
     */
    public function getOtherEmployeeId()
    {
        return $this->otherEmployeeId;
    }

    /**
     * @param $otherEmployeeId
     */
    public function setOtherEmployeeId($otherEmployeeId)
    {
        $this->otherEmployeeId = $otherEmployeeId;
    }


    /**
     * @return $attendanceStatus
     */
    public function getAttendanceStatus()
    {
        return $this->attendanceStatus;
    }

    /**
     * @param $attendanceStatus
     */
    public function setAttendanceStatus($attendanceStatus)
    {
        $this->attendanceStatus = $attendanceStatus;
    }


    /**
     * @return $checkIn
     */
    public function getCheckIn()
    {
        return $this->checkIn;
    }

    /**
     * @param $checkIn
     */
    public function setCheckIn($checkIn)
    {
        $this->checkIn = $checkIn;
    }


    /**
     * @return $checkOut
     */
    public function getCheckOut()
    {
        return $this->checkOut;
    }

    /**
     * @param $checkOut
     */
    public function setCheckOut($checkOut)
    {
        $this->checkOut = $checkOut;
    }


    /**
     * @return $attendanceDate
     */
    public function getAttendanceDate()
    {
        return $this->attendanceDate;
    }

    /**
     * @param $attendanceDate
     */
    public function setAttendanceDate($attendanceDate)
    {
        $this->attendanceDate = $attendanceDate;
    }


    /**
     * @return $leaveReasonId
     */
    public function getLeaveReasonId()
    {
        return $this->leaveReasonId;
    }

    /**
     * @param $leaveReasonId
     */
    public function setLeaveReasonId($leaveReasonId)
    {
        $this->leaveReasonId = $leaveReasonId;
    }


    /**
     * @return $sessionId
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * @param $sessionId
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;
    }



    /**
     * @return $foo
     */
    public function getFoo()
    {
        return $this->foo;
    }

    /**
     * @param $foo
     */
    public function setFoo($foo)
    {
        $this->foo = $foo;
    }


//DummyGetterSetters
}