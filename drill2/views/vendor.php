<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('location: http://localhost/drill2/login.php');
    exit();
}
include '../include/function.php';
include '../include/koneksi.php';
include '../part/header.php';

if(isset($_GET['delete'])){ 
    $id_vendor = $_GET['delete'];
    deleteVendor($id_vendor);
}

$vendors = getVendorAll();
?>

<main>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mt-4">Vendor List</h1>

            <div class="card mt-3">
                <div class="card-header">
                    <h5>Vendor List</h5>
                    <a href="addven.php" class="btn btn-primary float-right">Add Vendor</a>
                </div>
                <div class="card-body">
        <table class="table table-bordered table-light table-striped">
            <tr class="border-black">
                <th>no.</th>
                <th>nama vendor</th>
                <th>nama barang</th>
                <th>stok barang</th>
                <th>kontak vendor</th>
                <th>no inv</th>
                <th>action </th>
            </tr>
            <?php $no = 1;
                foreach($vendors as $ven): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $ven['nama_vendor']?></td>
                    <td><?= $ven['nama_barang'] ?></td>
                    <td><?= $ven['stok_barang'] ?></td>
                    <td><?= $ven['kontak_vendor'] ?></td>
                    <td><?= $ven['no_inv'] ?></td>
                    <td>
                        <a class="btn btn-warning" href="editVendor.php?updateVen=<?= $ven['nama_vendor']?>">Edit Vendor</a>
                        <a class="btn btn-warning" href="http://localhost/drill2/views/vendor.php?delete=<?= $ven['id_vendor'] ?>" onclick="return confirm('Apakah anda yakin mau delete')">Delete Vendor</a>
                    </td>
                </tr>
                <?php endforeach; ?>
        </table>
    </div>
        </div>
</div>

</main> 

<?php include '../part/footer.php'?>
