<?php

class Truck extends Vehicle{
    protected   $doorNumber,
                $maxHeight;

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

    /**
     * Get the value of maxHeight
     */ 
    public function getMaxHeight()
    {
        return $this->maxHeight;
    }

    /**
     * Set the value of maxHeight
     *
     * @return  self
     */ 
    public function setMaxHeight($maxHeight)
    {
        $maxHeight = (int) $maxHeight;
        $this->maxHeight = $maxHeight;

        return $this;
    }
}