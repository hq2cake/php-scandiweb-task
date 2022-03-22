<?php

namespace App\Classes;

class Dvd extends Product
{
    private $size;

    public function __construct($id, $sku, $name, $price, $size, $productType){
        parent::__construct($id, $sku, $name, $price, $productType);
        $this->size = $size;
    }

    public function getSizeWeightDimension(){
        return "Size : $this->size MB";
    }
}