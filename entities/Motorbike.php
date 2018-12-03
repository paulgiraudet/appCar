<?php

class Motorbike extends Vehicle{
    protected   $maxSpeed;

    /**
     * value of maxSpeed
     *
     * @return void
     */
    public function getMaxSpeed()
    {
        return $this->maxSpeed;
    }

    /**
     * maxSpeed setter
     *
     * @param int $maxSpeed
     * @return void
     */
    public function setMaxSpeed($maxSpeed)
    {
        $maxSpeed = (int) $maxSpeed;
        $this->maxSpeed = $maxSpeed;

        return $this;
    }
}