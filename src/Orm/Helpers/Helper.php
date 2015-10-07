<?php

namespace Emeka\Potato\Helpers;

use Emeka\Potato\Helpers\Get;
use Emeka\Potato\Base\Inflect;
use Emeka\Potato\Helpers\Save;
use Emeka\Potato\Helpers\Create;
use Emeka\Potato\Base\BaseClass;
use Emeka\Potato\Helpers\Delete;
use Emeka\Potato\Database\Connections\Connect;


abstract class Emeka
{
    protected
    $get,
    $inflect,
    $classname,
    $tableName;

    public function __construct()
    {
        $this->get          = new Get;
        $this->inflect      = new Inflect;
        $this->tableName    = $this->tableName();
        $this->classname    = $this->getClassName();
    }

    /*
    | getClass returns class called
    | return string
    | accepts no parameter
    */
    public static function getClass()
    {
        return get_called_class();
    }

    /*
    | getClassName returns class name in singular form
    | return string
    | accepts class class
    */
    public function getClassName()
    {
        return substr(strrchr(static::getClass(), '\\'), 1);
    }


    /*
    | tabalName returns pluralized form of the class name
    | return string
    | accepts classname
    */
    public function tableName()
    {
       return $this->inflect->pluralize($this->classname);
    }

    /*
    | getAll returns result from Get class
    | return Array
    | accepts tableName from method tableName()
    */
    public function getAll ()
    {
        return $this->get->getAll($this->tableName());
    }





    public static function save ( $name )
    {
        return new Save( $name , $name);
    }

    public static function create ( $name )
    {
        $create =  new Create ( $name );
        return $create->create ( $name );
    }


}
