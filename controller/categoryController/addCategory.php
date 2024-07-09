            <!-- Add New Category Form -->
            <div class="container">
                <h1 class="mb-3">Thêm mới danh mục</h1>
                <form>
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Tên danh mục <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="categoryName" placeholder="Tên danh mục">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Title">
                    </div>
                    <div class="mb-3">
                        <label for="displayOrder" class="form-label">Thứ tự hiển thị</label>
                        <input type="text" class="form-control" id="displayOrder" placeholder="Thứ tự hiển thị">
                    </div>
                    <div class="mb-3">
                        <label for="parentCategory" class="form-label">Danh mục cha</label>
                        <!-- <input type="text" class="form-control" id="parentCategory" placeholder="Đây là danh mục cha"> -->
                        <select class="form-select" aria-label="Default select example">
                            <option selected></option>
                            <option value="1">Danh mục cha</option>
                            <option value="2">Đồ ăn </option>
                            <option value="3">Cơm chưa</option>
                            <option value="4">Thức uống</option>
                            <option value="5">Tráng miệng</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hiển thị <span class="text-danger">*</span></label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="display" id="displayYes" value="yes">
                                <label class="form-check-label" for="displayYes">Hiển thị</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="display" id="displayNo" value="no">
                                <label class="form-check-label" for="displayNo">Ẩn</label>
                            </div>
                        </div>
                    </div>
                    <a href="http://"><button type="submit" class="btn btn-primary">Thêm mới</button></a>
                    <a href="index.php?act=listCategory"><button type="button" class="btn btn-secondary">Hủy</button></a>
                </form>
            </div>