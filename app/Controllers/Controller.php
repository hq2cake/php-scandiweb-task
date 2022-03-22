<?php

namespace App\Controllers;
use App\Classes\Book;
use App\Classes\Dvd;
use App\Classes\Furniture;
use App\Services\Dbh;
use App\Services\Router;

class Controller
{

    public function product_list()
    {
        $items = Dbh::connect()->query("SELECT * FROM products")->fetchAll();
            foreach ($items as $item) {
            $productType = $item->product_type;

            switch($productType) {
                case '1' :
                    $this->products[] = new Dvd($item->id, $item->sku, $item->name, $item->price, $item->size, $productType);
                    break;
                case '2':
                    $this->products[] = new Book($item->id, $item->sku, $item->name, $item->price, $item->weight, $productType);
                    break;
                case '3' :
                    $this->products[] = new Furniture($item->id, $item->sku, $item->name, $item->price, $item->height, $item->width, $item->length, $productType);
                    break;
            }
        }
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function addProduct($data)
    {
        $sku = $data['sku'];
        $name = $data['name'];
        $price = $data['price'];
        $productType = $data['productType'];
        $size = empty($data['size']) ? 0 : $data['size'];
        $weight = empty($data['weight']) ? 0 : $data['weight'];
        $height = empty($data['height']) ? 0 : $data['height'];
        $width = empty($data['width']) ? 0 : $data['width'];
        $length = empty($data['length']) ? 0 : $data['length'];

        $addedQuery = Dbh::connect()->prepare("
            INSERT INTO products (sku, name, price, weight, size, height, width, length, product_type)
            VALUES (:sku, :name, :price, :weight, :size, :height, :width, :length, :product_type);
        ");

        $addedQuery->execute([
            'sku' => $sku,
            'name' => $name,
            'price' => $price,
            'weight' => $weight,
            'size' => $size,
            'height' => $height,
            'width' => $width,
            'length' => $length,
            'product_type' => $productType
        ]);

        Router::redirect('/');
    }

    public function deleteProduct($data)
    {

        if(!empty($data)) {
            foreach ($data as $rows) {
                foreach ($rows as $row) {
                    $deleteQuery = Dbh::connect()->prepare("
                            DELETE FROM products WHERE id = :row
                    ");

                    $deleteQuery->execute([
                        'row' => $row
                    ]);
                }
            }
        }

        Router::redirect('/');
    }
}