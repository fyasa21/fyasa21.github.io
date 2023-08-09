<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Nasi Kotak</title>
    <style>
        body{
            font-family: arial,sans-serif;
        }
        h1 {
            text-align: center;
        }
        form {
            width: 300px;
            margin: 0 auto;
        }
        label,input,select {
            display: block;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            margin-top: 15px;
            border-radius: 5px;
            padding: 8px;
            font-size: 16px;
        }
        .result {
            display: grid;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }
        .form-group {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        .form-group label {
            flex: 1;
            margin-right: 10px;
        }
        .form-group input,
        .form-group select {
            flex: 2;
            width: 100%;
            padding: 6px;
            font-size: 16px;
        }
    </style>
</head>
<body>  
        <h1>Form Pemesanan Nasi Kotak</h1>
        <form method="post" action="">
            <div class="form-group">
        <label for="branch">Cabang :</label>
        <select name="branch" id="branch">
            <option value="-pilih cabang">-Pilih Cabang-</option>
            <option value="cempaka">Cempaka</option>
            <option value="bandung">Bandung</option>
            <option value="jakarta">Jakarta</option>
        </select>
        </div>
        <div class="form-group">
        <label for="name">Nama Pelanggan :</label>
        <input type="text" name="name" id="name">
        </div>
        <div class="form-group">
        <label for="phoneNumber">Nomor HP :</label>
        <input type="text" name="phoneNumber" id="phoneNumber">
        </div>
        <div class="form-group">
        <label for="">Jumlah Kotak :</label>
        <input type="text" name="quantity" id="quantity">
        </div>
        <input type="submit" name="submit" value="Pesan">
    </form>
    
    <?php
    if (isset($_POST['submit'])){
        $branch = $_POST['branch'];
        $name = $_POST['name'];
        $phoneNumber = $_POST['phoneNumber'];
        $quantity = $_POST['quantity'];
        $priceperitem = 50000; //harga satuannya (50 ribu)
        $discountPerItem = 50000; //diskon per item jika lebih dari 10 pesanan
        $minimumQuantityForDiscount = 10; //jumlah pesanan minimal untuk mendapat diskon

        $totalPriceBeforeDiscount = $priceperitem * $quantity;
        $totalDiscount = 0;

        if ($quantity > $minimumQuantityForDiscount) {
            $totalDiscount = $discountPerItem * floor($quantity / $minimumQuantityForDiscount);
        }
        $totalPriceAfterDiscount = $totalPriceBeforeDiscount - $totalDiscount;

        echo "<div class='result'>";
        echo "<strong>Pesanan Telah Diterima :</strong><br>";
        echo "<strong>Cabang : &nbsp" . $branch . "</strong><br>";
        echo "<strong>Nama Pelanggan :" . $name . "</strong><br>";
        echo "<strong>Nomor HP :" . $phoneNumber . "</strong><br>";
        echo "<strong>Jumlah Kotak :" . $quantity . "</strong><br>";
        echo "<strong>Tagihan Awal Sebelum Diskon : Rp" . number_format($totalPriceBeforeDiscount, 0, ',', '.') . "</strong><br>";

        if ($totalDiscount > 0) {
            echo "<strong>Diskon: Rp" . number_format($totalDiscount, 0,',', '.') . "</strong><br>";
        }

        echo "<strong>Tagihan Akhir Setelah Diskon : Rp" . number_format($totalPriceAfterDiscount, 0, ',', '.') . "</strong><br>";
        echo "</div>";
    }
    ?>
</body>
</html>