<?php


namespace Betweenapp\Backend\Traits;


trait SingletonTrait
{

    protected static $instance = null;

    /** call this method to get instance */
    public static function instance(){
        if (static::$instance === null){
            static::$instance = new static();
        }
        return static::$instance;
    }

    /** protected to prevent cloning */
    protected function __clone(){
    }

    /** protected to prevent instantiation from outside of the class */
    protected function __construct(){
    }

}
