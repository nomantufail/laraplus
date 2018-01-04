<?php
/**
 * Created by PhpStorm.
 * User: officeaccount
 * Date: 01/03/2017
 * Time: 12:58 PM
 */

namespace Models;


abstract class Model
{

    /**
     * This function convert a model to a Json object
     **/
    public abstract function toArray();

    public function toJson(){
            return (object)$this->toArray();
    }

    public static function jsonToObj($json, $obj){
        foreach ((array)$json as $key=>$value){
            $setter = "set".ucfirst($key);
            if(method_exists($obj, $setter)){
                $obj->$setter($value);
            }
        }
        return $obj;
    }

    /**
     * Models are by default strict
     * it means that they will validate them self when you assign values
     * to there properties. if they feel anything wrong, they will
     * throw an exception "ValidationErrorException" with the message
     *
     * user can set this property to false if you do not want to allow
     * these models to validate data.
     **/
    private $strict = true;

    /**
     * @return mixed
     */
    public function strict()
    {
        return $this->strict;
    }

    /**
     * @param mixed $strict
     */
    public function setStrict($strict)
    {
        $this->strict = $strict;
    }


}