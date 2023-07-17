<?php

use App\Models\Slider;
//SELECT * from cqt_category WHERE status !=0 ORDER BY created _at DESC
$list = Slider::where('status', '=', '0')->orderBy('created_at', 'DESC')->get();



?>

<?php require_once('../views/backend/header.php') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>TAT CA THUNG RAC</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Tất cả thùng rác</li>
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

                        <a class="btn btn-sm btn-info" href="index.php?option=slider">
                            <i class="fas fa-step-backward"></i>Quay về danh sách
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <?php include_once('../views/backend/messageAlert.php'); ?>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                            <th class="text-center" style="width:20px">#</th>
                            <th>Tên chủ đề bài viết</th>
                            <th>Position</th>
                            <th class="text-center" style="width:90px">Hình ảnh</th>
                            <th class="text-center" style="width:90px">Ngày tạo</th>
                            <th class="text-center" style="width:200px">Chức năng</th>
                            <th class="text-center" style="width:20px">ID</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($list as $row) : ?>
                            <tr>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['position'] ?></td>
                                <td class="text-center">
                                    <img class="img-fluid" src="../public/img/slider/<?=$row['image'];?>" alt="">
                                </td>
                                <td class="text-center"><?= $row['created_at'] ?></td>
                                <td class="text-center">
                                <a class=" btn btn-sm btn-primary " href=" index.php?option=slider&cat=restore& id=<?= $row['id'] ?>">
                                        <i class="fas fa-undo"></i></a>
                                    <a class=" btn btn-sm btn-info " href=" index.php?option=slider&cat=destroy& id=<?= $row['id'] ?>">
                                        <i class="fas fa-trash"></i></a>
                                </td>

                                <td class="text-center"><?= $row['id'] ?></td>
                            <?php endforeach; ?>
                            </tr>
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
<?php require_once('../views/backend/footer.php') ?>