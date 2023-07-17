<?php

use App\Models\Slider;

$id = $_REQUEST['id'];
$row = Slider::find($id);
$list = Slider::where('status', '!=', '0')->get();
$html_link = '';
$html_sort_oder = '';
foreach ($list as $item) {
    $html_link .= "<option value='" . $item->link. "'>" . $item->name . "</option>";
    $html_sort_oder .= "<option value='" .    $item->sort_oder . "'>Sau :" . $item->name . "</option>";
}
?>

<?php require_once('../views/backend/header.php') ?>

<form action="index.php?option=slider&cat=process" method="post" enctype="multipart/form-data">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sửa danh mục</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Sửa danh mục</li>
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
                            <button name="CAPNHAT" type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-save"></i> Lưu[Sửa]
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=slider">
                                <i class="fas fa-step-backward"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                            <div class="mb-3">
                                <label for="name">Tên chủ đề</label>
                                <input name="name" id="name" type="text" value="<?= $row['name']; ?>" class="form-control" require >
                            </div>
                            <div class="mb-3">
                                <label for="position">Posdition</label>
                                <textarea name="position" id="position" class="form-control" require><?= $row['position']; ?></textarea>

                            </div>
                        </div>
                        <div class="col-md-3">
                        <div class="mb-3">
                                <label for="image">Hình ảnh</label>
                                <input name="image" id="image" type="file" class="form-control">
                            </div>
                          <div class="mb-3">
                                <label for="status">Trang thái</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="2" <?=($row->status ==2)? 'selected' :'';?>>--Chưa xuất bản--</option>
                                    <option value="1" <?=($row->status ==1)? 'selected' :'';?>>--Đã xuất bản--</option>

                                </select>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button name="CAPNHAT" type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-save"></i> Lưu[Sửa]
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=slider">
                                <i class="fas fa-step-backward"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

</form>
<?php require_once('../views/backend/footer.php') ?>