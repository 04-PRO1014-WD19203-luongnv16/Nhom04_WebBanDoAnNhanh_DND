        <!-- Category List -->
        <div class="container ">
            <h1>Danh sách danh mục</h1>
            <a href="index.php?act=addCategory"><button type="submit" class="btn btn-primary mb-3 mt-1">Thêm mới</button></a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mã số</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Id danh mục cha</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Cơm Trưa</td>
                        <td>com-trua</td>
                        <td>Danh mục cha</td>
                        <td><i class="bi bi-check-circle-fill text-success"></i></td>
                        <td><a href="index.php?act=editCategory"><button class="btn btn-sm btn-warning">Edit</button></a></td>
                        <td><a href="index.php?act=deleteCategory"><button class="btn btn-sm btn-danger">Delete</button></a></td>
                    </tr>
                </tbody>
            </table>
        </div>