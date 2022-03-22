<?php
require_once "views/components/header.php";
?>

<div class="container">
    <nav class="navbar navbar-expand-lg pt-3">
        <div class="container-fluid">
            <h3>Add List</h3>
            <div class="d-flex">
                <button type="submit" class="btn btn-light" form="product_form">Save</button>
                <a href="/" class="btn btn-danger">CANCEL</a>
            </div>
        </div>
    </nav>
    <hr>
    <form action="/product/add" method="post" id="product_form" name="product_form">
        <div class="row row-cols-2 g-2">
            <div class="col">
                <div class="row mb-3">
                    <label for="sku" class="col-sm-4 col-form-label">SKU</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="sku" id="sku" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-4 col-form-label">Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="price" class="col-sm-4 col-form-label">Price ($)</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="price" id="price" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="productType" class="col-sm-4 col-form-label">Type Switcher</label>
                    <div class="col-sm-8">
                        <select class="form-select" name="productType" id="productType" required>
                            <option selected disabled value=""></option>
                            <option value="1">DVD</option>
                            <option value="2">Book</option>
                            <option value="3">Furniture</option>
                        </select>
                    </div>
                </div>

                <div class="hidBox attr_1">
                    <div class="row mb-3">
                        <label for="size" class="col-sm-4 col-form-label">Size (MB)</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="size" id="size">
                            <div id="sizeHelp" class="form-text">Please, provide size</div>
                        </div>
                    </div>
                </div>

                <div class="hidBox attr_2">
                    <div class="row mb-3">
                        <label for="weight" class="col-sm-4 col-form-label">Weight (KG)</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="weight" id="weight">
                            <div class="invalid-feedback">
                                Please, provide the data of indicated type
                            </div>
                            <div id="weightHelp" class="form-text">Please, provide weight</div>
                        </div>
                    </div>
                </div>

                <div class="hidBox attr_3">
                    <div class="row mb-3">
                        <label for="height" class="col-sm-4 col-form-label">Height (CM)</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="height" id="height">
                            <div class="invalid-feedback">
                                Please, provide the data of indicated type
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="width" class="col-sm-4 col-form-label">Width (CM)</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="width" id="width">
                            <div class="invalid-feedback">
                                Please, provide the data of indicated type
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="length" class="col-sm-4 col-form-label">Lenght (CM)</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="length" id="length">
                            <div class="invalid-feedback">
                                Please, provide the data of indicated type
                            </div>
                            <div id="dimensionHelp" class="form-text">Please, provide dimensions</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
require_once "views/components/footer.php";
?>

<script>
    $(document).ready(function(){
        $("#productType").change(function(){
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("value");
                if(optionValue){
                    $(".hidBox").not(".attr_" + optionValue).hide();
                    $(".attr_" + optionValue).show();
                } else {
                    $(".hidBox").hide();
                }
            });
        }).change();
    });
</script>
