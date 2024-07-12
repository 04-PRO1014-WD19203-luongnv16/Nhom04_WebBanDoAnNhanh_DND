        <!-- Category List -->
        <div class="container ">
            <h1>Danh sách danh mục</h1>
            <a href="index.php?act=addCategory"><button type="submit" class="btn btn-primary mb-3 mt-1">Thêm mới</button></a>
            <?php
                if(isset($message)&&$message != ""){
                    echo $message;
                }
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mã số</th>
                        <th>Name</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($dsdm as $dsdm):?>
                    <tr>
                        <td><?php echo $dsdm['category_id'];?></td>            
                        <td><?php echo $dsdm['category_name'];?></td>
                        <td><a href="?act=deleteCategory&category_id=<?php echo $dsdm['category_id'];?>"><i class="fa-solid fa-pen-to-square">Xóa</i></a></td>
                        <td><a href="?act=editCategory&category_id=<?php echo $dsdm['category_id'];?>"><i class="fa-solid fa-eraser">Sửa</i></a></td>
                        </tr>
                <?php endforeach ?>

                </tbody>
            </table>
        </div>