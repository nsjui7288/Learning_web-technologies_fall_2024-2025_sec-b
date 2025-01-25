<?php

include('includes/header.php');
include('../controllers/middleware/adminMiddleware.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="add_product.js"></script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Product</h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data" nonvalidate
                            onsubmit="return isValidProductForm (this);">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="mb-0" for="">Select Category</label>
                                    <select name="category_id" class="form-select mb-2">
                                        <option selected>Select Category</option>
                                        <?php
                                    $categories = getAll("categories");
                                    if(mysqli_num_rows($categories) > 0) {
                                        foreach ($categories as $item){
                                    ?>
                                        <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                        <?php
                                    }
                                    }
                                    else
                                    {
                                       echo "No Category Available";
                                    }

                                    ?>
                                    </select>
                                    <span id="categoryErrMsg"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0" for="name">Name</label>
                                    <input type="text" name="name" placeholder="Enter Category Name "
                                        class="form-control mb-2">
                                    <span id="nameErrMsg"></span>
                                    <div class="col-md-6">
                                        <label class="mb-0" for="slug">Slug</label>
                                        <input type="text" name="slug" placeholder="Enter Slug"
                                            class="form-control mb-2">
                                        <span id="slugErrMsg"></span>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="small_description">Small Description</label>
                                        <textarea rows="3" name="small_description"
                                            placeholder="Enter Small Description" class="form-control mb-2"></textarea>
                                        <span id="smallDescriptionErrMsg"></span>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="description">Description</label>
                                        <textarea rows="3" name="description" placeholder="Enter Description"
                                            class="form-control mb-2"></textarea>
                                        <span id="descriptionErrMsg"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0" for="original_price">Orginal Price</label>
                                        <input type="text" name="original_price" placeholder="Enter Original Price"
                                            class="form-control mb-2">
                                        <span id="originalPriceErrMsg"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0" for="selling_price">Selling Price</label>
                                        <input type="text" name="selling_price" placeholder="Enter Selling Price"
                                            class="form-control mb-2">
                                        <span id="sellingPriceErrMsg"></span>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="image">Upload Image</label>
                                        <input type="file" name="image" class="form-control mb-2">
                                        <span id="imageErrMsg"></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="mb-0" for="qty">Quantity</label>
                                            <input type="number" name="qty" placeholder="Enter Quantity"
                                                class="form-control mb-2">
                                            <span id="quantityErrMsg"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="mb-0" for="status">Status</label><br>
                                            <input type="checkbox" name="status">

                                        </div>
                                        <div class="col-md-3">
                                            <label class="mb-0" for="trending">Trending</label><br>
                                            <input type="checkbox" name="trending">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="meta_title">Meta Title</label>
                                        <input type="text" name="meta_title" placeholder="Enter Meta Title"
                                            class="form-control mb-2">
                                        <span id="metaTitleErrMsg"></span>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="meta_description">Meta Description</label>
                                        <textarea rows="3" name="meta_description" placeholder="Enter Meta Description"
                                            class="form-control mb-2"></textarea>
                                        <span id="metaDescriptionErrMsg"></span>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="meta_keywords">Meta Keywords</label>
                                        <textarea rows="3" name="meta_keywords" placeholder="Enter Meta Keywords"
                                            class="form-control mb-2"></textarea>
                                        <span id="metaKeywordsErrMsg"></span>
                                    </div>
                                    <!-- <div class="col-md-6">
                                <label class="mb-0" for="status">Status</label>
                                <input type="checkbox" name="status">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="popular">Popular</label>
                                <input type="checkbox" name="popular">
                            </div> -->
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary"
                                            name="add_product_btn">Save</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include('includes/footer.php'); ?>
</body>

</html>