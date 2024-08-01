<div class="container mt-5 position-relative">
    <h2 class="mb-4">Danh Sách Đơn Hàng</h2>

    <!-- Thông báo update trạng thái đơn hàng -->
    <div id="toastNotification" class="toast align-items-center text-white bg-success border-0 position-absolute p-3 custom-toast" role="alert" aria-live="assertive" aria-atomic="true" style="display: none;">
        <div class="d-flex">
            <div class="toast-body">
                <?= isset($_SESSION['notification']) ? htmlspecialchars($_SESSION['notification']) : '' ?>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>

    <!-- Tìm kiếm đơn hàng -->
    <div class="mb-4">
        <form action="index.php" method="GET">
            <input type="hidden" name="act" value="order">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Tìm kiếm theo mã đơn hàng hoặc tên khách hàng" value="<?= htmlspecialchars(isset($_GET['search']) ? $_GET['search'] : '') ?>">
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </form>
    </div>

    <!-- Bảng danh sách đơn hàng -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Khách hàng</th>
                <th scope="col">Số lượng hàng</th>
                <th scope="col">Ngày đơn</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Tổng giá</th>
                <th scope="col">Chi tiết</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';
            if (!empty($searchQuery)) {
                $listBill = searchOrders($searchQuery);
            }

            if (empty($listBill)) : ?>
                <tr>
                    <td colspan="8" class="text-center">Không tìm thấy đơn hàng nào</td>
                </tr>
            <?php else : ?>
                <?php foreach ($listBill as $bill) : ?>
                    <?php
                    $countSp = loadone_cart_count($bill['bill_id']);
                    $ttdh = get_status_label($bill['bill_status']);
                    $bill_id = htmlspecialchars($bill['bill_id']);
                    $bill_code = htmlspecialchars($bill['bill_code']);
                    $full_name = htmlspecialchars($bill['full_name']);
                    $created_datetime = htmlspecialchars($bill['created_datetime']);
                    $total_price = number_format($bill['total_price'], 0, ',', '.');
                    $status_label = htmlspecialchars($ttdh);
                    ?>
                    <tr>
                        <td><?= $bill_code ?></td>
                        <td><?= $full_name ?></td>
                        <td><?= $countSp ?></td>
                        <td><?= $created_datetime ?></td>
                        <td><?= $status_label ?></td>
                        <td><?= $total_price ?>,000 VND</td>
                        <td>
                            <!-- <a class="btn btn-danger btn-sm" href="index.php?act=deleteOrder&bill_id=<?= urlencode($bill_id) ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?');">Xóa</a> -->
                            <a href="./order_detail.php?<?= urlencode($bill_id) ?>" class="btn btn-info btn-sm">Chi tiết</a>
                        </td>
                        <td>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <!-- Previous Button -->
            <li class="page-item <?= ($currentPage <= 1) ? 'disabled' : '' ?>">
                <a class="page-link" href="?act=order&page=<?= max(1, $currentPage - 1) ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <!-- Page Numbers -->
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
                    <a class="page-link" href="?act=order&page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <!-- Next Button -->
            <li class="page-item <?= ($currentPage >= $totalPages) ? 'disabled' : '' ?>">
                <a class="page-link" href="?act=order&page=<?= min($totalPages, $currentPage + 1) ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php if (isset($_SESSION['notification'])) : ?>
                var toastEl = document.getElementById('toastNotification');
                var toast = new bootstrap.Toast(toastEl);
                toastEl.style.display = 'block';
                toast.show();
                setTimeout(function() {
                    toast.hide();
                    toastEl.style.display = 'none';
                }, 5000);
                <?php unset($_SESSION['notification']); ?>
            <?php endif; ?>
        });
    </script>

</div>