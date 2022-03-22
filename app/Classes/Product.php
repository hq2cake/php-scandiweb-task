<?php

namespace App\Classes;
use App\Services\Dbh;

abstract class Product{

    private $id;
    private $sku;
    private $name;
    private $price;
    private $productType;
    private $products = [];

    public function __construct($id, $sku, $name, $price, $productType){
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->productType = $productType;
    }

    public function getID(){
        return $this->id;
    }

    public function setID($id){
        $this->id = $id;
    }

    public function getSKU(){
        return $this->sku;
    }

    public function setSKU($sku){
        $this->sku = $sku;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function getProductType(){
        return $this->productType;
    }

    public function setProductType($productType){
        $this->productType = $productType;
    }

    abstract public function getSizeWeightDimension();


}