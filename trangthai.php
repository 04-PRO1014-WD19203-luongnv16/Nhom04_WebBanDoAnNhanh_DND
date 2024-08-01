<div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton<?= $bill_id ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                    Thay đổi trạng thái
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?= $bill_id ?>">
                                    <li><a class="dropdown-item" href="index.php?act=update_status&id=<?= urlencode($bill_id) ?>&status=0">Đơn hàng mới</a></li>
                                    <li><a class="dropdown-item" href="index.php?act=update_status&id=<?= urlencode($bill_id) ?>&status=1">Chờ shipper lấy hàng</a></li>
                                    <li><a class="dropdown-item" href="index.php?act=update_status&id=<?= urlencode($bill_id) ?>&status=2">Đang giao hàng</a></li>
                                    <li><a class="dropdown-item" href="index.php?act=update_status&id=<?= urlencode($bill_id) ?>&status=3">Hoàn tất</a></li>
                                    <li><a class="dropdown-item" href="index.php?act=update_status&id=<?= urlencode($bill_id) ?>&status=4">Hủy hàng</a></li>
                                </ul>
                            </div>