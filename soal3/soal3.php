<?php
require "db.php";

$nama   = isset($_GET['nama']) ? $_GET['nama'] : '';
$alamat = isset($_GET['alamat']) ? $_GET['alamat'] : '';
$hobi   = isset($_GET['hobi']) ? $_GET['hobi'] : '';

$sql = "SELECT p.nama, p.alamat, h.hobi FROM person p JOIN hobi h ON p.id = h.person_id";

if (!empty($nama)) {
    $sql .= " AND p.nama LIKE '%" . mysqli_real_escape_string($conn, $nama) . "%'";
}
if (!empty($alamat)) {
    $sql .= " AND p.alamat LIKE '%" . mysqli_real_escape_string($conn, $alamat) . "%'";
}
if (!empty($hobi)) {
    $sql .= " AND h.hobi LIKE '%" . mysqli_real_escape_string($conn, $hobi) . "%'";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SOAL 3</title>
  <script src="../assets/tailwind.css"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center py-10">

  <div class="w-full max-w-3xl bg-white p-6 rounded-2xl shadow-md">
    <h2 class="text-2xl font-bold text-gray-700 mb-6">📋 Data Person dan Hobi</h2>

    <div class="overflow-x-auto">
      <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
        <thead class="bg-indigo-600 text-white">
          <tr>
            <th class="px-4 py-2 text-left">Nama</th>
            <th class="px-4 py-2 text-left">Alamat</th>
            <th class="px-4 py-2 text-left">Hobi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-2"><?= htmlspecialchars($row['nama']); ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($row['alamat']); ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($row['hobi']); ?></td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="3" class="text-center text-gray-500 py-4">Tidak ada data ditemukan</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <h3 class="text-xl font-semibold text-gray-700 mt-8 mb-4">🔎 Pencarian</h3>
    <form method="get" class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-600">Nama</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>"
          class="mt-1 w-full px-3 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-400 focus:outline-none">
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-600">Alamat</label>
        <input type="text" name="alamat" value="<?= htmlspecialchars($alamat) ?>"
          class="mt-1 w-full px-3 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-400 focus:outline-none">
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-600">Hobi</label>
        <input type="text" name="hobi" value="<?= htmlspecialchars($hobi) ?>"
          class="mt-1 w-full px-3 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-400 focus:outline-none">
      </div>
      <button type="submit"
        class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition">
        SEARCH
      </button>
    </form>
  </div>

</body>
</html>