<?php

use App\Models\Post;

$id = $_REQUEST['id'];
$row = Post::find($id);

$list = Post::where('status', '!=', '0')->get();
$html_parent_id = '';
$html_sort_order = '';
foreach ($list as $item) {
    if ($item->id == $row->parent_id) {
        $html_parent_id .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
    } else {
        $html_parent_id .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
    }
    if ($item->sort_order == $row->sort_order) {
        $html_sort_order .= "<option selected value='" . ($item->sort_order + 1) . "'>Sau:" . $item->name . "</option>";
    } else {
        $html_sort_order .= "<option value='" . ($item->sort_order + 1) . "'>Sau:" . $item->name . "</option>";
    }
}
?>
<?php require_once('../views/backend/header.php'); ?>
<form action="index.php?option=post&cat=process" method="post" enctype="multipart/form-data">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Cập Nhật Danh Mục</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Bảng Điều Khiển</a></li>
                            <li class="breadcrumb-item active">Cập Nhật Danh Mục</li>
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
                                <i class="fas fa-save"></i> Lưu[Cập Nhật]
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=post">
                            <i class="far fa-arrow-alt-circle-left"></i> Quay Về Danh Mục
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="md-3">
                                <input type="hidden" name="id" value="<?= $row['id']; ?>" >
                                <label for="name">Tên Danh Mục</label>
                                <input name="name"  id=" name" type="text" class="form-control" required placeholder="VD: Đồng Hồ Nam"><?= $row['name']; ?>
                            </div>
                            <div class="md-3">
                                <label for="metadesc">Mô Tả(SEO)</label>
                                <textarea name="metadesc" id="metadesc" class="form-control" required placeholder="VD: Đồng Hồ Dành Cho Nam"><?= $row['metadesc']; ?></textarea>
                            </div>
                            <div class="md-3">
                                <label for="metakey">Từ Khóa(SEO)</label>
                                <textarea name="metakey" id="metakey" class="form-control" required placeholder="VD: Đồng Hồ, Đồng Hồ Nam, Đồng Hồ Dành Cho Nam"><?= $row['metakey']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="md-3">
                                <label for="parent_id">Chủ Đề Cha</label>
                                <select id="parent_id" name="parent_id" class="form-control">
                                    <option value="0">---Chọn Cấp Cha--- </option>
                                    <?= $html_parent_id; ?>
                                </select>
                            </div>
                            <div class="md-3">
                                <label for="sort_order">Vị Trí</label>
                                <select id="sort_order" name="sort_order" class="form-control">
                                    <option value="0">---Chọn Vị Trí--- </option>
                                    <?= $html_sort_order; ?>
                                </select>
                            </div>
                            <div class="md-3">
                                <label for="image">Hình Ảnh</label>
                                <input name="image" id="image" type="file" class="form-control">
                            </div>
                            <div class="md-3">
                                <label for="status">Trạng Thái</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="2" <?= ($row->status == 2) ? 'selected' : ''; ?>>Chưa Xuất Bản </option>
                                    <option value="1"  <?= ($row->status == 1) ? 'selected' : ''; ?>> Xuất Bản </option>

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
                                <i class="fas fa-save"></i> Lưu[Cập Nhật]
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=post">
                            <i class="far fa-arrow-alt-circle-left"></i> Quay Về Danh Mục
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

</form>
<?php require_once('../views/backend/footer.php'); ?>