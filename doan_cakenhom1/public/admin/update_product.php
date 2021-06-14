<?php
require_once 'header-require-models.php';
?>
<?php
// Kiểm tra xem người dùng có muốn thay đổi ảnh không:
$pro_image = $_FILES['fileUpload']['name'];
$changeImage = TRUE;
if ($pro_image == "") {
    $pro_image = $_POST['fileName'];
    $changeImage = FALSE;
}

// Sửa dữ liệu:
$updateResult = -1;
if (isset($_POST['id']) == TRUE) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $manu_id = $_POST['manu_id'];
    $type_id = $_POST['type_id'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $feature = $_POST['feature'];
    $create_at = (new DateTime('now'))->format('Y-m-d H:i:s');
    $getAllProduct = Product::getAllProducts();
    $flag = true;
    foreach ($getAllProduct as $value) {
        if ($value['name'] == $name || $value['description'] == $description) {
            $flag = false;
        }
    }
    if ($flag == true) {
        $updateResult = Product::updateProduct($id, $name, $manu_id, $type_id, $price, $pro_image, $description, $feature, $create_at);
    }
}

// Nếu sửa thành công, thì upload file:
if ($changeImage = TRUE) {
    if (!isset($_FILES["fileUpload"])) {
        header("Location: form_update.php?functionType=products&id=$id&updateResult=$updateResult");
    }

    // Kiểm tra dữ liệu có bị lỗi không
    if ($_FILES["fileUpload"]['error'] != 0) {
        header("Location: form_update.php?functionType=products&id=$id&updateResult=$updateResult");
    }

    // Đã có dữ liệu upload, thực hiện xử lý file upload

    //Thư mục bạn sẽ lưu file upload
    $target_dir    = "../img/cake-feature/";
    //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
    $target_file   = $target_dir . basename($_FILES["fileUpload"]["name"]);

    $allowUpload   = true;

    //Lấy phần mở rộng của file (jpg, png, ...)
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    // Cỡ lớn nhất được upload (bytes)
    $maxfilesize   = 800000;

    ////Những loại file được phép upload
    $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');


    if (isset($_POST["submit"])) {
        //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
        $check = getimagesize($_FILES["fileUpload"]["tmp_name"]);
        if ($check !== false) {
            $allowUpload = true;
        } else {
            $allowUpload = false;
        }
    }

    // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
    // Bạn có thể phát triển code để lưu thành một tên file khác
    if (file_exists($target_file)) {
        $allowUpload = false;
    }
    // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
    if ($_FILES["fileUpload"]["size"] > $maxfilesize) {
        $allowUpload = false;
    }


    // Kiểm tra kiểu file
    if (!in_array($imageFileType, $allowtypes)) {
        $allowUpload = false;
    }
    if ($allowUpload) {
        $updateResult = move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file);
    }
}

header("Location: form_update.php?functionType=products&id=$id&updateResult=$updateResult");
?>