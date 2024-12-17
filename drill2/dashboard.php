<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('location: http://localhost/drill2/login.php');
    exit();
}

include 'include/koneksi.php';
include 'include/function.php';
include 'part/header.php';

$total_vendor = $conn->query("SELECT COUNT(*) AS total FROM vendor")->fetch_assoc()['total'];
$total_inventory = $conn->query("SELECT COUNT(*) AS total FROM inventory")->fetch_assoc()['total'];
$total_gudang = $conn->query("SELECT COUNT(*) AS total FROM gudang")->fetch_assoc()['total'];

$inven = getallinv();

?>

<br>
<h1 style="display: flex; justify-content: center;">Welcome to Admin</h1>
<br>

<div class="col-md-12">
            <div  class="d-flex justify-content-evenly mt-3">
                <div class="col-md-3">
                    <div class="card text-white bg-secondary mb-3">
                        <div class="card-header">Total Vendors</div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $total_vendor; ?> Data Vendor </h5>
                            <a href="http://localhost/drill2/views/vendor.php" class="btn btn-light">Manage Vendors</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-secondary mb-3">
                        <div class="card-header">Total Inventory Items</div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $total_inventory; ?> Data Inventory</h5>
                            <a href="http://localhost/drill2/views/inventory.php" class="btn btn-light">Manage Inventory</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-secondary mb-3">
                        <div class="card-header">Total Storage Units</div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $total_gudang; ?> Data Storage Unit</h5>
                            <a href="http://localhost/drill2/views/gudang.php" class="btn btn-light">Manage Storage Units</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<br>
<div style="margin: 20px auto; width: 80%;">
<table class="table table-bordered table-light table-striped col-md-10">
            <tr class="">
                <th>no</th>
                <th>nama vendor</th>
                <th>nama barang</th>
                <th>Jenis barang</th>
                <th>stok </th>
                <th>barcode</th>
                <th>harga</th>
                <th>lokasi gudang</th>
            </tr>
            <?php $no = 1; 
                foreach($inven as $i): ?>
                    <tr class="<?= $i['stok_barang'] == 0 ? 'table-danger' : '' ?>">
                <td><?= $no++ ?></td>
                <td><?= $i['nama_vendor'] ?></td>
                <td><?= $i['nama_barang'] ?></td>
                <td><?= $i['jenis_barang'] ?></td>
                <td><?= $i['stok_barang'] ?></td>
                <td><?= $i['barcode'] ?></td>
                <td>Rp. <?php echo number_format($i['harga'], 0, ',', '.'); ?></td>
                <td><?= $i['lokasi'] ?></td>
            </tr>
                <?php endforeach; ?>
        </table>
</div>

<?php include 'part/footer.php'; ?>