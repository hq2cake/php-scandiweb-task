<?php
require_once "views/components/header.php";
use App\Services\Dbh;
use App\Controllers\Controller;
use App\Classes\Product;

$controller = new Controller();

$controller->product_list();

?>
    <div class="container">
    <form method="post" action="/product/delete" name="product_delete" id="product_delete">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <h3>Product List</h3>
            <div class="col-md-3 text-end">
                <a href="/addproduct" class="btn btn-light">ADD</a>
                <button type="submit" class="btn btn-danger" form="product_delete" name="delete-product-btn" id="delete-product-btn">
                    MASS DELETE
                </button>
            </div>

        </header>
        <div class="row row-cols-4 g-4">
            <?php foreach ( $controller->getProducts() as $product): ?>
                <div class="col">
                    <div class="card text-center">
                        <div class="card-body">
                            <label class="w-100">
                                <div class="text-start">
                                    <input type="checkbox" class="form-check-input flex-shrink-0 delete-checkbox" name="product_chk[<?php echo $product->getID(); ?>]" id="product_chk_<?php echo $product->getID(); ?>" value="<?php echo $product->getID(); ?>">
                                </div>
                                <h5 class="card-title"><?php echo $product->getSKU(); ?></h5>
                                <p class="card-text">
                                    <?php echo $product->getName(); ?><br />
                                    <?php echo $product->getPrice(); ?> $<br />
                                    <?php echo $product->getSizeWeightDimension(); ?>
                                </p>
                            </label>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </form>
</div>

<?php
require_once "views/components/footer.php";
