<?php

use App\Models\Product;

$list = Product::join('category', "category.id", "product.category_id")
    ->join("brand", "brand_id", "product.brand_id")
    ->where("product.status", '=', '0')
    ->orderBy("product.created_at", 'DESC')
    ->select("product.*", "category.name as category_name", "brand.name as brand_name")
    ->get();
?>
<?php require_once('../views/backend/header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> THÙNG RÁC SẢN PHẨM</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Bảng Điều Khiển </a></li>
                        <li class="breadcrumb-item active">Thùng Rác Sản Phẩm</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">

                <div class="col-md-12 text-right">
                    <a class="btn btn-sm btn-info" href="index.php?option=product">
                        <i class="fas fa-arrow-left"> Quay Về Danh Sách</i>
                    </a>
                </div>

            </div>
            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:20px;">#</th>
                            <th class="text-center" style="width:50px;">ID</th>
                            <th class="text-center" style="width:90px;">Hinh</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Thương Hiệu</th>
                            <th>Slug</th>
                            <th class="text-center" style="width:300px;">Ngày Tạo</th>
                            <th class="text-center" style="width:200px;">Chức Năng</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $row) : ?>
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox">
                                </td>
                                <td class="text-center"><?= $row['id']; ?></td>
                                <td class="text-center">
                                    <img class="img-fluid" src="../public/images/GioiThieuXe/hinh/<?= $row->image; ?>" alt="<?= $row->image; ?>">
                                </td>
                                <td><?= $row['name']; ?></td>
                                <td><?= $row['category_name']; ?></td>
                                <td><?= $row['brand_name']; ?></td>
                                <td><?= $row['slug']; ?></td>
                                <td class="text-center"><?= $row['created_at']; ?></td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-info" href="index.php?option=product&cat=retore&id=<?= $row['id']; ?>">
                                        <i class="fas fa-undo"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" href="index.php?option=product&cat=destroy&id=<?= $row['id']; ?>">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

<?php require_once('../views/backend/footer.php'); ?>