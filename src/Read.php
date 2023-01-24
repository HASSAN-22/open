<?php

namespace Open;

trait Read
{
    /**
     * Returns an array of file lines
     * @return false|mixed|string
     */
    public function readLines(){
        return $this->file;
    }

    /**
     * It converts the lines of the file that has been converted into an array into a string and returns it
     * @return string
     */
    public function getString(){
        return implode("\n",array_values($this->file));
    }


    /**
     * Returns a particular line from the file
     * @param int $line
     * @return mixed
     */
    public function getLine(int $line){
        return $this->file[$line] ?? '';
    }

    /**
     * get the first line of the file
     * @return mixed
     */
    public function firstLine(){
        return $this->file[0];
    }

    /**
     * get the last line of the file
     * @return mixed
     */
    public function lastLine(){
        return $this->file[array_key_last($this->file)];
    }

    /**
     * Taking lines between two lines
     * @param int $startLine
     * @param int $endLine
     * @return mixed
     */
    public function between(int $startLine, int $endLine){
        return array_slice($this->file, $startLine, $endLine);
    }

}