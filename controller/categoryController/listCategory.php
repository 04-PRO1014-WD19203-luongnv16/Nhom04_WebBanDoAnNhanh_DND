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
                        <th>Danh Mục Cha</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($listdm as $dm){
                    extract($dm);
                    $update = "index.php?act=editCategory&category_id=".$category_id;
                    $delete = "index.php?act=deleteCategory&category_id=".$category_id;
                    echo '
                        <tr>
                        <td>'.$category_id.'</td>            
                        <td>'.$category_name.'</td>
                        <td>'.$name_dm.'</td>
                        <td><a href="'.$update.'"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="'.$delete.'"><i class="fa-solid fa-eraser"></i></a></td>
                        </tr> 
                    ';
                };
            ?>
                </tbody>
            </table>
        </div>