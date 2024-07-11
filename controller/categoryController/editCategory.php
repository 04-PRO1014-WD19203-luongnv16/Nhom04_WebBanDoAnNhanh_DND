            <!-- Add New Category Form -->
            <div class="container">
                <h1 class="mb-3">Sửa danh mục</h1>
                <form action="index.php?act=editCategory" method="post">
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">ID danh mục <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="category_id" id="categoryID" placeholder="ID danh mục" value="<?php if(isset($category_id)&&($category_id != "")) echo $category_id; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Tên danh mục <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="category_name" placeholder="Tên danh mục" name="category_name" value="<?php if(isset($category_name)&&($category_name != "")) echo $category_name; ?>">
                    </div>
            </div>
            <div class="btn-pass">
                <input type="hidden" name="category_id" value="<?=(isset($category_id)&&($category_id)) ? $category_id : "" ?>">
                <button class="btn btn-warning" type="submit" name="update_dm" value="update_dm">Cập Nhật</button>
                <a href="index.php?act=listCategory" class="btn btn-secondary">Quay Lại</a>
            </div>
            <?php
            if (isset($message) && $message != "") {
                echo $message;
            }
            ?>
            </form>
            </div>