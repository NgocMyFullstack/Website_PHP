<?php

use App\Models\Post;

$list = Post::where('status', '=', '0')->orderBy('created_at', 'DESC')->get();
?>

<?php require_once('../views/backend/header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tất Cả Danh Mục</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Bảng Điều Khiển</a></li>
                        <li class="breadcrumb-item active">Tất Cả Danh Mục</li>
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
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a class="btn btn-sm btn-info" href="index.php?option=post">
                        <i class="far fa-arrow-alt-circle-left"></i> Quay Về Danh Mục
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:20px" ;>#</th>
                            <th>Tên Danh Mục</th>
                            <th>Slug</th>
                            <th class="text-center" style="width:160px" ;>Ngày Tạo</th>
                            <th class="text-center" style="width:200px" ;>Chức Năng</th>
                            <th class="text-center" style="width:200px" ;>ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $row) : ?>
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox">
                                </td>
                                <td><?= $row['name']; ?></td>
                                <td><?= $row['slug']; ?></td>
                                <td class="text-center"><?= $row['created_at']; ?></td>
                                <td class="text-center">
                                    
                                    <a class="btn btn-sm btn-info" href="index.php?option=post&cat=restore&id=<?= $row['id']; ?>">
                                        <i class="fas fa-undo"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" href="index.php?option=post&cat=destroy&id=<?= $row['id']; ?>">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                                <td class="text-center"><?= $row['id']; ?></td>
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


<?php require_once('../views/backend/footer.php'); ?>