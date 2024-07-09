<div class="container">
    <h1 class="mb-3">Chỉnh sửa danh mục</h1>
    <form>
        <div class="mb-3">
            <label for="editCategoryName" class="form-label">Tên danh mục <span
                    class="text-danger">*</span></label>
            <input type="text" class="form-control" id="editCategoryName" value="Sinh tố">
        </div>
        <div class="mb-3">
            <label for="editTitle" class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="editTitle" value="sinh-to">
        </div>
        <div class="mb-3">
            <label for="editDisplayOrder" class="form-label">Thứ tự hiển thị</label>
            <input type="text" class="form-control" id="editDisplayOrder" value="3">
        </div>
        <div class="mb-3">
            <label for="editParentCategory" class="form-label">Danh mục cha</label>
            <input type="text" class="form-control" id="editParentCategory" value="Thức Uống">
        </div>
        <div class="mb-3">
            <label class="form-label">Hiển thị <span class="text-danger">*</span></label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="editDisplay" id="editDisplayYes"
                        value="yes" checked>
                    <label class="form-check-label" for="editDisplayYes">Hiển thị</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="editDisplay" id="editDisplayNo"
                        value="no">
                    <label class="form-check-label" for="editDisplayNo">Ẩn</label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php?act=listCategory"><button type="button" class="btn btn-secondary">Hủy</button></a>
    </form>
</div>

