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
?>