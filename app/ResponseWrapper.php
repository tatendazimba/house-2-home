<?php

namespace App;

class ResponseWrapper
{
    public $code;
    public $description;
    public $friendly;
    public $results;

    public function __construct($code, $description, $friendly)
    {
        $this->code = $code;
        $this->description = $description;
        $this->friendly = $friendly;
    }

    public function toArray() {

         $objectArray = (array) $this;

         // remove unset properties
        foreach ($objectArray as $i => $property) {

            if (!$property) {
                unset($objectArray[$i]);
            }
        }

        return $objectArray;
    }
}
