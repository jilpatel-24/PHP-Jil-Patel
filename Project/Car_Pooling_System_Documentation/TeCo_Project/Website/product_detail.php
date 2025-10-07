<?php
// Get product id from URL
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    
    // Fetch product details from DB
    $product_data = $this->select_where('product', ['id' => $product_id]);

    if (!empty($product_data)) {
        $product = $product_data[0];
    } else {
        die("Product not found.");
    }
} else {
    die("Invalid request.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($product->product_name); ?> - Details</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background: #f8f9fa;
        }
        .product-card {
            background: #fff;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
        }
        .product-img {
            width: 100%;
            max-width: 350px;
            height: 350px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transition: transform 0.3s ease-in-out;
        }
        .product-img:hover {
            transform: scale(1.05);
        }
        .price-tag {
            font-size: 1.5rem;
            font-weight: 700;
            color: #28a745;
        }
        .btn-success {
            border-radius: 30px;
            padding: 10px 25px;
            font-weight: 600;
        }
        .btn-secondary {
            border-radius: 30px;
            padding: 10px 25px;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="product-card">
        <div class="row align-items-center">
            <!-- Product Image -->
            <div class="col-md-6 text-center mb-4 mb-md-0">
                <img src="../admin/assets/images/product/<?php echo $product->product_image; ?>" 
                     class="product-img" 
                     alt="<?php echo htmlspecialchars($product->product_name); ?>">
            </div>

            <!-- Product Details -->
            <div class="col-md-6">
                <h2 class="mb-3"><?php echo htmlspecialchars($product->product_name); ?></h2>
                <p class="text-muted"><?php echo nl2br($product->description); ?></p>
                <p class="price-tag mb-4">₹<?php echo number_format($product->product_price, 2); ?></p>

                <!-- Add to Cart Form -->
                <form method="post" action="cart" class="d-inline">
                    <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">
                    <input type="hidden" name="item_name" value="<?php echo $product->product_name; ?>">
                    <input type="hidden" name="price" value="<?php echo $product->product_price; ?>">
                    <button type="submit" class="btn btn-success">🛒 Add to Cart</button>
                </form>

                <a href="product" class="btn btn-secondary ms-2">⬅ Back to Products</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
