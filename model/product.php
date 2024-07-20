<?php 
    function loadAllProduct(){
        $sql = "SELECT * FROM product INNER JOIN category ON product.category_id = category.category_id";
        $listSP = pdo_query($sql);

        return $listSP;
    }
    function DeleteProduct( $product_id ){
        $sql = "DELETE  FROM product WHERE product_id =".$product_id;
        pdo_execute($sql);
    }

    function insertProduct($product_name,$product_description,$product_avatar_url,$product_import_price,$product_sale_price,$product_listed_price,$product_stock,$category_id){
        $sql = "INSERT INTO `product`(`product_name`, `product_description`, `product_avatar_url`, `product_import_price`, `product_sale_price`, `product_listed_price`, `product_stock`, `category_id`) VALUES ('$product_name','$product_description','$product_avatar_url','$product_import_price','$product_sale_price','$product_listed_price','$product_stock','$category_id')";

        pdo_execute($sql);
    }
    function loadAllCategory(){
        $sql = "SELECT * FROM category";
        $listCate = pdo_query($sql);

        return $listCate;
    }
    function loadOneProduct($product_id){
        $sql = "SELECT * FROM product WHERE product_id= ".$product_id;
        $product = pdo_query_value($sql);

        return $product;
    }

    function updateProduct($product_id,$product_name,$product_description,$product_avatar_url,$product_import_price,$product_sale_price,$product_listed_price,$product_stock,$category_id){
        if(!$product_avatar_url != " "){
            $sql = "UPDATE `product` SET `product_name`='$product_name',`product_description`='$product_description',`product_avatar_url`='$product_avatar_url',`product_import_price`='$product_import_price',`product_sale_price`='$product_sale_price',`product_listed_price`='$product_listed_price',`product_stock`='$product_stock',`category_id`='$category_id' WHERE product_id=".$product_id;
        }else{
            $sql = "UPDATE `product` SET `product_name`='$product_name',`product_description`='$product_description',`product_import_price`='$product_import_price',`product_sale_price`='$product_sale_price',`product_listed_price`='$product_listed_price',`product_stock`='$product_stock',`category_id`='$category_id' WHERE product_id=".$product_id;
        }
        pdo_execute($sql);
    }

    //Hiển thị sản phẩm ở user
    function select_sp_home()
{
    $sql = "SELECT * FROM product where 1 ORDER BY product_id DESC LIMIT 0,12";
    $linkProduct = pdo_query($sql);
    return $linkProduct;
}

// Hiển thị chi tiết sản phẩm ở user
function select_sp_one($product_id)
{
    // $sql = "SELECT * FROM product WHERE product_id=" . $product_id;
    // $product = pdo_query_one($sql);
        $sql = "SELECT product.*, category.category_name FROM product 
                INNER JOIN category ON product.category_id = category.category_id 
                WHERE product.product_id = :product_id";
    $product = pdo_query_one($sql, ['product_id' => $product_id]);
    return $product;
}

// Hiển thị sản phẩm tương tự ở user
function select_sp_similar($id, $product_id)
{
    $sql = "SELECT * FROM product WHERE category_id=" . $product_id . " AND product_id<>" . $id;
    $listProducts = pdo_query($sql);
    return $listProducts;
}

//seach
function search_pro($search){
    $sql = "SELECT * FROM product WHERE product_name LIKE '%$search%' ";
    $result = pdo_query($sql);
    return $result;
}
//lọc
function getProductByCategory($category_id) {
    $sql = "SELECT * FROM product WHERE category_id = $category_id";
    return pdo_query($sql);
}

function getAllProducts() {
    $sql = "SELECT * FROM products";
    return pdo_query($sql);
}
//top 10
function load_product_top10(){
    $sql = "SELECT * From product where 1 ORDER BY product_id DESC LIMIT  0,10";
    $listProducts = pdo_query($sql);
    return $listProducts;
}

?>