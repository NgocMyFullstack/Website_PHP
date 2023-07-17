<?php

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

$id = $_REQUEST['id'];
$row = Product::find($id);

$list_category = Category::where('status', '!=', '0')->get();
$list_brand = Category::where('status', '!=', '0')->get();
$html_category_id = '';
$html_brand_id = '';
foreach ($list_category as $category) {
    if ($category->id == $row->category_id) {
        $html_category_id .= "<option selected value='" . $category->id . "'>" . $category->name . "</option>";
    } else {
        $html_category_id .= "<option value='" . $category->id . "'>" . $category->name . "</option>";
    }
}
foreach ($list_brand as $brand) {
    if ($brand->id == $row->brand_id) {
        $html_brand_id .= "<option selected value='" . $brand->id . "'>" . $brand->name . "</option>";
    } else {
        $html_brand_id .= "<option value='" . $brand->id . "'>" . $brand->name . "</option>";
    }
}
?>

<?php require_once('../views/backend/header.php') ?>

<form action="index.php?option=product&cat=process" method="post" enctype="multipart/form-data">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>CẬP nhật SẢN PHẨM</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Cập nhật sản phẩm</li>
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
                            <button name="THEM" type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-save"></i> Lưu[Cập nhật]
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=product">
                                <i class="fas fa-step-backward"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php include_once('../views/backend/messageAlert.php'); ?>
                    <div class="row">
                        <div class="col-md-9">
                            <input type="hidder" name="id" value="<?= $row->id; ?>">
                            <div class="mb-3">
                                <label for="name"> Hãng Xe</label>
                                <input name="name" id="name" type="text" class="form-control" require placeholder="VD:BMW,..." value="<?= $row->name; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="slug"> Tên Xe</label>
                                <input name="slug" id="slug" type="text" class="form-control" require placeholder="VD:BMWS1000RR,...">
                            </div>
                            <div class="mb-3">
                                <label for="detail"> Chi tiết</label>
                                <textarea name="detail" id="detail" class="form-control" require placeholder="Chi tiết">value="<?= $row->detail; ?>"</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="metadesc"> Mô tả(SE0)</label>
                                <textarea name="metadesc" id="metadesc" class="form-control" require placeholder="VD: Xe Mới,...">value="<?= $row->metadesc; ?>"</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="metakey"> Từ khóa(SE0)</label>
                                <textarea name="metakey" id="metakey" class="form-control" require placeholder="VD: Xe BMW...">value="<?= $row->metakey; ?>"</textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="category_id">Danh mục</label>
                                <select name="category_id" id="category_id" class="form-control" required>
                                    <option value="0">--Chọn danh mục--</option>
                                    <?= $html_category_id; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="brand_id">Chọn thương hiệu</label>
                                <select name="brand_id" id="brand_id" class="form-control" required>
                                    <option value="">--Chọn thương hiệu--</option>

                                    <?= $html_brand_id; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="qty">Số lượng</label>
                                <input name="qty" id="qty" type="number" value="<?= $row->qty; ?>" min="1" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="price">Giá</label>
                                <input name="price" id="price" type="number" value="<?= $row->price; ?>" min="1000" step="500" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="pricesale">Giá khuyến mãi</label>
                                <input name="pricesale" id="pricesale" type="number" value="<?= $row->pricesale; ?>" min="1000" step="500" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="img">Hình ảnh</label>
                                <input name="img" id="img" type="file" class="form-control" >
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
                            <button name="THEM" type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-save"></i> Lưu[Thêm]
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=product">
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