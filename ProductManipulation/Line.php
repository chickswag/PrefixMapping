<?php


class Line implements Product
{

    private $serviceFee;

    /**
     * @param $fee
     */
    public function setServiceFee($fee)
    {
        $this->serviceFee = $fee;
    }

    /**
     * @return mixed
     */
    public function getServiceFee()
    {
        return $this->serviceFee;
    }

}





