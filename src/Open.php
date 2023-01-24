<?php

namespace Open;

class Open
{
    use Append, Read, Remove;

    private string $filePath;

    private $file;

    private static $instance;

    private function __construct(){}

    /**
     * Checks that the class it creates has not already been created
     * @return mixed
     */
    public static function ready()
    {
        if(! static::$instance instanceof Open){
            static::$instance = new Open();
        }
        return static::$instance;
    }

    /**
     * Open file as array
     * @param string $filePath
     * @return $this
     */
    public function open(string $filePath){
        $this->filePath = $filePath;
        $this->file = file($this->filePath,FILE_IGNORE_NEW_LINES);
        return $this;
    }


    /**
     * Writes the changes to the file
     * @return $this
     */
    public function write(){
        file_put_contents($this->filePath,$this->getString());
        return $this;
    }


    /**
     * Returns the size of the file
     * @return string
     */
    public function fileSize(){
        return filesize($this->filePath) . ' bytes';
    }

}