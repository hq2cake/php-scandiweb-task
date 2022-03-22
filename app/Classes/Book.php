<?php

namespace App\Classes;

class Book extends Product
{
    private $weight;

    public function __construct($id, $sku, $name, $price, $weight, $productType){
        parent::__construct($id, $sku, $name, $price, $productType);
        $this->weight = $weight;
    }

    public function getSizeWeightDimension()
    {
        return "Weight : $this->weight KG";
    }
}