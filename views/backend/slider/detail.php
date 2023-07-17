<?php

use App\Models\Slider;
//SELECT * from cqt_category WHERE status !=0 ORDER BY created _at DESC
$list =Slider::where('status','!=','0')-> orderBy('created_at','DESC')->get();

$id=$_REQUEST['id'];
$row=Slider::find($id);
?>

<?php require_once('../views/backend/header.php') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>TAT CA DANH MUC</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Tất cả danh mục</li>
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
                        <a class="btn btn-sm btn-success" href="index.php?option=slider">
                        <i class="fas fa-step-backward"></i>Quay về danh sách
                        </a>
                       
                    </div>
                </div>
            </div>
            <div class="card-body">
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
                            <tr>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['position'] ?></td>
                                <td class="text-center">
                                    <img class="img-fluid" src="../public/img/<?=$row['image'];?>" alt="">
                                </td>
                                <td class="text-center"><?= $row['created_at'] ?></td>
                                <td class="text-center">
                                    <?php if ($row['status'] == 1) : ?>
                                        <a class=" btn btn-sm btn-success " href="index.php?option=slider&cat=status&id=<?= $row['id'] ?>">
                                            <i class="fas fa-toggle-on"></i></a>

                                    <?php else : ?>
                                        <a class=" btn btn-sm btn-danger " href="index.php?option=slider&cat=status&id=<?= $row['id'] ?>">
                                            <i class="fas fa-toggle-off"></i></a>

                                    <?php endif; ?>
                                    <a class=" btn btn-sm btn-info " href="index.php?option=slider&cat=detail&id=<?= $row['id'] ?>">
                                        <i class="fas fa-eye"></i></a>
                                    <a class=" btn btn-sm btn-primary " href="index.php?option=slider&cat=edit&id=<?= $row['id'] ?>">
                                        <i class="fas fa-edit"></i></a>
                                    <a class=" btn btn-sm btn-info " href="index.php?option=slider&cat=deletel&id=<?= $row['id'] ?>">
                                        <i class="fas fa-trash"></i></a>
                                </td>

                                <td class="text-center"><?= $row['id'] ?></td>
                    
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