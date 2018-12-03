<?php

class Car extends Vehicle{
    protected   $doorNumber;

    /**
     * Get the value of doorNumber
     */ 
    public function getDoorNumber()
    {
        return $this->doorNumber;
    }

    /**
     * Set the value of doorNumber
     *
     * @return  self
     */ 
    public function setDoorNumber($doorNumber)
    {
        $doorNumber = (int) $doorNumber;
        $this->doorNumber = $doorNumber;

        return $this;
    }
}