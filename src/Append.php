<?php

namespace Open;

trait Append
{
    /**
     * Adds the new word to the end of the file
     * @param string ...$args One or more word
     * @return $this
     */
    public function append(string ...$args){
        array_map(fn($item)=>empty($this->file[0]) ? $this->file[0] = $item : $this->file[] = $item,func_get_args());
        return $this;
    }

    /**
     * Adds the new word after the selected line of the file
     * @param string $word
     * @param int $line
     * @return $this
     */
    public function appendTo(string $word, int $line){
        $this->replaceLine($word, $line,true);
        return $this;
    }

    /**
     * Adds the new word to the beginning of the file
     * @param string ...$args One or more word
     * @return $this
     */
    public function prepend(string ...$args){
        array_map(fn($item)=>array_unshift($this->file, $item), array_reverse(func_get_args()));
        return $this;
    }

    /**
     * Adds the new word to the beginning of the selected line of the file
     * @param string $word
     * @param int $line
     * @return $this
     */
    public function prependTo(string $word, int $line){
        $this->replaceLine($word, $line,false);
        return $this;
    }

    /**
     * Moves lines for appendTo and prependTo
     * @param string $word
     * @param int $line
     * @param bool $isAppendTo
     * @return void
     */
    private function replaceLine(string $word, int $line, bool $isAppendTo){

        if($isAppendTo){
            $lineCount = $line+1;
            $_word = $this->getLine($lineCount)??'';
            if(array_key_exists($lineCount, $this->file)){
                $this->file[$lineCount] = $word;
                $this->replaceLine($_word, $lineCount, $isAppendTo);
            }else{
                $this->file[$lineCount] = $word;
            }
        }else{
            if( $line !== 0){
                $lineCount = $line-1;
                $_word = $this->getLine($lineCount);
                if(array_key_exists($lineCount, $this->file)){
                    $this->file[$lineCount] = $word;
                    $this->replaceLine($_word, $lineCount, $isAppendTo);
                }
            }else{
                $this->prepend($word);
            }

        }


    }
}