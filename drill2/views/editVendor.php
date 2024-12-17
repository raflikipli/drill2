<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('location: http://localhost/LSP/login.php');
    exit();
}
include '../include/function.php';
include '../include/koneksi.php';
include '../part/header.php';

if(isset($_POST['updateVen'])){
    $nama_vendor = $_POST['nama_vendor'];
    $nama_vendor = $_POST['nama_vendor'];
    $nama_barang = $_POST['nama_barang'];
    $stok_barang = $_POST['stok_barang'];
    $kontak_vendor = $_POST['kontak_vendor'];
    $no_inv = $_POST['no_inv'];
    $id_vendor = $_POST['id_vendor'];
    updateVendor($nama_vendor, $nama_barang, $stok_barang, $kontak_vendor, $no_inv, $id_vendor);
    header('location: http://localhost/drill2/views/vendor.php');
    exit();
}

if(isset($_GET['updateVen'])){
    $nama_vendor = $_GET['updateVen'];
    $vendor = getVendorByName($nama_vendor);
}
?>
<main class="card col-9 me-auto ms-auto d-block p-5 mt-5 mb-5">
    <h2 class="text-center ">Edit Data</h2>
    <form action="editVendor.php" method="post" class="p-3">
        <input type="hidden" name="id_vendor" value="<?= $vendor['id_vendor']?>">
        <div class="mb-3">
            <label for="nama_vendor" class="form-label">Nama Vendor</label>
            <input type="text" name="nama_vendor" class="form-control" placeholder="Nama Vendor" value="<?= $vendor['nama_vendor']?>">
        </div>
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?= $vendor['nama_barang']?>">
        </div>
        <div class="mb-3">
            <label for="stok_barang" class="form-label">Stok Barang</label>
            <input type="text" name="stok_barang" class="form-control" placeholder="Stok Barang" value="<?= $vendor['stok_barang']?>">
        </div>
        <div class="mb-3">
            <label for="kontak_vendor" class="form-label">Kontak Vendor</label>
            <input type="text" name="kontak_vendor" class="form-control" placeholder="Kontak Vendor" value="<?= $vendor['kontak_vendor']?>">
        </div>
        <div class="mb-3">
            <label for="no_inv" class="form-label">Nomor Invoice</label>
            <input type="text" name="no_inv" class="form-control" placeholder="Nomor Invoice" value="<?= $vendor['no_inv']?>">
        </div>
        <button type="submit" name="updateVen" class="btn btn-primary">Ubah data vendor</button>
        <a href="vendor.php" class="btn btn-danger text-white"> cancel</a>
    </form>

</main>

<?php include '../part/footer.php'?>