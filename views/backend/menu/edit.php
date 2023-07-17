<?php

use App\Models\Menu;


$id = $_REQUEST['id'];
$row = Menu::find($id);

$list = Menu::where('status', '!=', '0')->get();
$html_parent_id = '';
$html_oder = '';
foreach ($list as $item) {
    if ($item->id == $row->parent_id) {
        $html_parent_id .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
    } else {
        $html_parent_id .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
    }
    if ($item->oder == $row->parent_id) {
        $html_oder .= "<option selected value='" .    ($item->sort_order + 1) . "'>Sau :" . $item->name . "</option>";
    } else {
        $html_oder .= "<option value='" .    ($item->sort_order + 1) . "'>Sau :" . $item->name . "</option>";
    }
}
?>

<?php require_once('../views/backend/header.php') ?>

<form action="index.php?option=menu&cat=process" method="post" enctype="multipart/form-data">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Cập nhật danh mục</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Cập nhật danh mục</li>
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
                                <i class="fas fa-save"></i> Lưu[Cập nhật]
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=menu">
                                <i class="fas fa-step-backward"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                <label for="name"> Hãng Xe</label>
                                <input name="name" value="<?= $row['name']; ?>" id="name" type="text" class="form-control" require placeholder="VD:BMW,...">
                            </div>
                            <div class="mb-3">
                                <label for="slug"> Tên Xe</label>
                                <input name="slug" value="<?= $row['link']; ?> " id="slug" type="text" class="form-control" require placeholder="VD:BMWS1000RR,...">
                            </div>
                            <div class="mb-3">
                                <label for="metadesc"> Mô tả(SE0)</label>
                                <textarea name="metadesc" id="metadesc" class="form-control" require placeholder="VD: Xe Mới,..."><?= $row['metadesc']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="metakey"> Từ khóa(SE0)</label>
                                <textarea name="metakey" id="metakey" class="form-control" require placeholder="VD: Xe BMW..."><?= $row['metakey']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="parent_id">Chủ đề cha</label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="0">--Chọn cấp cha--</option>

                                    <?= $html_parent_id; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sort_order">Chọn vị trí</label>
                                <select name="sort_order" id="sort_order" class="form-control">
                                    <option value="0">--Chọn vị trí 1--</option>

                                    <?= $html_parent_id; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="img">Hình ảnh</label>
                                <input name="img" id="img" type="file" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="status">Trang thái</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="2" <?= ($row->status == 2) ? 'selected' : ''; ?>>--xuất bản--</option>
                                    <option value="1" <?= ($row->status == 1) ? 'selected' : ''; ?>>--Chưa xuất bản--</option>
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
                                <i class="fas fa-save"></i> Lưu[Cập nhật]
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=menu">
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