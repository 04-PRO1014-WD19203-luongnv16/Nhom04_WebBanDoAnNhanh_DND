<!-- Add New Category Form -->
<div class="container">
    <h1 class="mb-3">Thêm mới danh mục</h1>
    <form action="index.php?act=addCategory" method="POST">
        <div class="mb-3">
            <label for="categoryID" class="form-label">ID danh mục <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="categoryID" placeholder="ID danh mục" name="category_id" disabled>
        </div>
        <div class="mb-3">
            <label for="categoryName" class="form-label">Tên danh mục <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="categoryName" placeholder="Tên danh mục" name="category_name">
        </div>
        <div class="mb-3">
            <label for="name_dm" class="form-label">Danh mục cha <span class="text-danger">*</span></label>
            <select name="id_sub" class="form-control">
                <option value="">--Chọn Danh Mục Cha--</option>
                <option value="1">Đồ ăn</option>
                <option value="2">Đồ uống</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="add_dm" value="add">Thêm mới</button>
        <a href="index.php?act=listCategory" class="btn btn-secondary">Hủy</a>
        <?php
        if (isset($message) && $message != "") {
            echo $message;
        }
        ?>
    </form>
</div>
