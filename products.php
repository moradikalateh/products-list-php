<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>لیست محصولات</title>
    <style>
        body { font-family: Arial; direction: rtl; text-align: center; }
        p { font-size: 18px; margin: 10px 0; }
        .product-container { display: flex; justify-content: center; gap: 20px; }
    </style>
</head>
<body>
    <h3>لیست محصولات</h3>
    <div class="product-container">
        <form action="#" method="post">
            <input type="image" src="hairdryer.jpg" name="hairdryer" width="150">
        </form>
        <form action="#" method="post">
            <input type="image" src="table.jpg" name="table" width="150">
        </form>
        <form action="#" method="post">
            <input type="image" src="clothes.jpg" name="clothes" width="150">
        </form>
    </div>

    <?php
    // اتصال به دیتابیس
    $conn = new mysqli("localhost", "root", "", "products_db");

    // چک کردن اتصال
    if ($conn->connect_error) {
        die("اتصال ناموفق: " . $conn->connect_error);
    }

    // پردازش فرم
    if (isset($_POST["hairdryer_x"]) && isset($_POST["hairdryer_y"])) {
        $x = $_POST["hairdryer_x"];
        $y = $_POST["hairdryer_y"];
        echo "<p><b>مختصات X:</b> $x</p>";
        echo "<p><b>مختصات Y:</b> $y</p>";

        // گرفتن اطلاعات سشوار از دیتابیس
        $sql = "SELECT name, price FROM products WHERE name = 'سشوار'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<p>محصول: " . $row["name"] . "، قیمت: " . $row["price"] . " تومان</p>";
        }
    } elseif (isset($_POST["table_x"]) && isset($_POST["table_y"])) {
        $x = $_POST["table_x"];
        $y = $_POST["table_y"];
        echo "<p><b>مختصات X:</b> $x</p>";
        echo "<p><b>مختصات Y:</b> $y</p>";

        // گرفتن اطلاعات میز از دیتابیس
        $sql = "SELECT name, price FROM products WHERE name = 'میز'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<p>محصول: " . $row["name"] . "، قیمت: " . $row["price"] . " تومان</p>";
        }
    } elseif (isset($_POST["clothes_x"]) && isset($_POST["clothes_y"])) {
        $x = $_POST["clothes_x"];
        $y = $_POST["clothes_y"];
        echo "<p><b>مختصات X:</b> $x</p>";
        echo "<p><b>مختصات Y:</b> $y</p>";

        // گرفتن اطلاعات لباس از دیتابیس
        $sql = "SELECT name, price FROM products WHERE name = 'لباس'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<p>محصول: " . $row["name"] . "، قیمت: " . $row["price"] . " تومان</p>";
        }
    }

    // بستن اتصال
    $conn->close();
    ?>
</body>
</html>