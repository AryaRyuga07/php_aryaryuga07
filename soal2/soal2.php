<?php
$step = isset($_POST['step']) ? (int)$_POST['step'] : 1;

$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$umur = isset($_POST['umur']) ? $_POST['umur'] : '';
$hobi = isset($_POST['hobi']) ? $_POST['hobi'] : '';

switch ($step) {
    case 1:
        echo "<h2>Masukkan Nama Anda</h2>";
        break;
    case 2:
        echo "<h2>Masukkan Umur Anda</h2>";
        break;
    case 3:
        echo "<h2>Masukkan Hobi Anda</h2>";
        break;
    case 4:
        echo "<h2>Selamat Datang di website kami, " . $nama . " ^^</h2>";
        break;
    default:
        echo "<h2>Form Terjadi Error Silahkan Hubungi Admin</h2>";
        break;
}

switch ($step) {
    case 1:
        echo "<form method='post'>
            Nama Anda: <input type='text' name='nama' required>
            <br><br>
            <input type='hidden' name='step' value='2'>
            <input type='submit' value='SUBMIT'>
          </form>";
        break;
    case 2:
        echo "<form method='post'>
            Umur Anda: <input type='number' name='umur' required>
            <br><br>
            <input type='hidden' name='nama' value='$nama'>
            <input type='hidden' name='step' value='3'>
            <input type='submit' value='SUBMIT'>
          </form>";
        break;
    case 3:
        echo "<form method='post'>
            Hobi Anda: <input type='text' name='hobi' required>
            <br><br>
            <input type='hidden' name='nama' value='$nama'>
            <input type='hidden' name='umur' value='$umur'>
            <input type='hidden' name='step' value='4'>
            <input type='submit' value='SUBMIT'>
          </form>";
        break;
    case 4:
        echo "<b>Nama:</b> $nama <br>";
        echo "<b>Umur:</b> $umur <br>";
        echo "<b>Hobi:</b> $hobi <br>";
        break;
    default:
        echo "<h2>Form Terjadi Error Silahkan Hubungi Admin</h2>";
        break;
}

?>
