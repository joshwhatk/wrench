<?php

namespace JoshWhatK\Exceptions;

use Exception;

class Wrench extends Exception
{
    public function __construct($message = 'Threw a Wrench in it.', $code = 500, Exception $previous = null)
    {
        if (func_num_args() === 0) {
            if ($this->message !== '') {
                $message = $this->message;
            }
            if ($this->code !== 0) {
                $code = $this->code;
            }
        }

        //-- make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }

    //-- custom string representation
    public function __toString()
    {
        return __CLASS__ . ": [{$this->getCode()}] {$this->getMessage()}\n";
    }
}
