<?php

namespace Open;

trait Remove
{
    /**
     * Remove null or empty line
     * @return $this
     */
    public function clean(){
        $this->file = array_filter($this->file, 'strlen');
        return $this;
    }

    /**
     * Delete a specific line
     * @param int $line
     * @return $this
     */
    public function deleteLine(int $line){
        unset($this->file[$line]);
        return $this;
    }

    /**
     * It empties the file
     * @return $this
     */
    public function emptyFile(){
        $this->file = [];
        return $this;
    }
}