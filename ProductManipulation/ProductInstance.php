<?php
class ProductInstance
{
    /**
     * @param $type
     * @return float|int
     */
    public static function createProduct(string $type)
    {
        switch ($type){
            case 'Line':
                //create product
                $fee = '300';
                $serviveObj     = new Line;
                $serviveObj->setServiceFee($fee);
                $fee            = $serviveObj->getServiceFee();

                $product = ProductInstance::increaseProductFee($fee);
                echo '<br/><div> Product Added: '.$type.'</div><br/><div> Original Fee: '.$fee.'</div>';
                break;
            case 'Trunk':
                $fee = '152';
                $serviveObj     = new Trunk;
                $serviveObj->setServiceFee($fee);
                $fee            = $serviveObj->getServiceFee();

                $product = ProductInstance::increaseProductFee($fee);
                echo '<br/><div> Product Added: '.$type.'</div><br/><div> Original Fee: '.$fee.'</div>';
                break;
        }

        return $product;
    }

    /**
     * @param $fee
     * @return float|int
     */
    public static function increaseProductFee($fee)
    {
        $percentage = 14;
        $numberToAdd = ($fee / 100) * $percentage;
        $newfee = $fee + $numberToAdd;
        return $newfee;
    }
}
