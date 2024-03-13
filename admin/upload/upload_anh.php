<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Validate Form</title>
</head>
<body>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="append">
        <input type="file" name="file0" /><br><br>
    </div>
    
    <input type="button" name="add" value="Thêm"/>

    <input type="hidden" name="total" value="0"/>

    <input type="submit" name="upload" value="Tải lên" />
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $total = $_POST['total'];
    $fileSelected = false;
    for ($i = 0; $i <= $total; $i++) {
        if ($_FILES['file' . $i]["name"] != '') {
            $fileSelected = true;
            break;
        }
    }
    if (!$fileSelected) {
        echo "<p style='color: red;'>Vui lòng chọn ít nhất một tệp tin.</p>";
    } else {
        for ($i = 0; $i <= $total; $i++) {
            if ($_FILES['file' . $i]["name"] != '') {
                // Thực hiện upload tệp tin
                move_uploaded_file($_FILES['file' . $i]["tmp_name"], time() . "-" . $_FILES['file' . $i]["name"]);
                echo "<p style='color: green;'>Tệp tin " . $_FILES['file' . $i]["name"] . " đã được tải lên thành công.</p>";
            }
        }
    }
}
?>

<script>
    document.querySelector("input[name='add']").addEventListener("click", function() {
        let file = parseInt(document.querySelector('input[type=hidden]').value);
        file += 1;

        // Thêm trường file mới
        let newFileInput = document.createElement('input');
        newFileInput.type = 'file';
        newFileInput.name = 'file' + file;
        newFileInput.required = true; // Thêm thuộc tính required để yêu cầu người dùng chọn ít nhất một file
        document.querySelector('.append').appendChild(newFileInput);
        document.querySelector('input[name=total]').value = file;
    });
</script>

</body>
</html>
