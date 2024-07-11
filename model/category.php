<?php
function insert_dm($category_id,$category_name, $id_sub) {
    $sql = "INSERT INTO category (category_id, category_name, id_sub) VALUES ('$category_id','$category_name', '$id_sub')";
    pdo_execute($sql);
}
function select_dm(){
    $sql = "SELECT category.category_id, category.category_name, sub_category.name_dm FROM category 
    JOIN sub_category ON category.id_sub = sub_category.id_dm ";
    $listdm = pdo_query($sql);
    return $listdm;
}
function delete_dm($category_id){
    $sql = "UPDATE category SET catefory_id = NULL WHERE catefory_id=".$category_id;
        pdo_execute($sql);
        $sql = "DELETE FROM category WHERE catefory_id = ".$category_id;
        pdo_execute($sql);
}

function select_dm_one($category_id){
    $sql = "SELECT * FROM category WHERE category_id = :category_id";
    return pdo_query_one($sql, $category_id);
}

function update_dm($category_name, $category_id){
    $sql = "UPDATE category SET category_name = :category_name WHERE category_id = :category_id";
    pdo_execute($sql, $category_name, $category_id);
}

?>