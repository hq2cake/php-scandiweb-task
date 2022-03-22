<?php

namespace App\Classes;

class Furniture extends Product
{
    private $height;
    private $width;
    private $length;

    public function __construct($id, $sku, $name, $price, $height, $width, $length, $productType){
        parent::__construct($id, $sku, $name, $price, $productType);
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }

    public function getSizeWeightDimension(){
        return "Dimension : $this->height x $this->width x $this->length";
    }
}