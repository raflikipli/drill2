<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('location: http://localhost/drill2/login.php');
    exit();
}

include '../include/function.php';
include '../include/koneksi.php';
include '../part/header.php';

$gudang=getGudangAll();
if (isset($_GET['delete'])){
    $id_gudang = $_GET['delete'];
    deletGudang($id_gudang);
    header('location: http://localhost/drill2/views/gudang.php');
    exit();
}
?>

 
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mt-4">Gudang List</h1>

            <div class="card mt-3">
                <div class="card-header">
                    <h5>Gudang List</h5>
                    <a href="addgud.php" class="btn btn-primary float-right">Add Gudang</a>
                </div>
                <div class="card-body">
        <table class="table table-bordered table-light table-striped">
            <tr class="border-black">
                <th>no</th>
                <th>nama gudang</th>
                <th>Lokasi</th>
                <th>aksi </th>
            </tr>
            <?php $no = 1; 
                foreach($gudang as $g): ?>
                    <tr>
                <td><?= $no++ ?></td>
                <td><?= $g['nama_gudang'] ?></td>
                <td><?= $g['lokasi'] ?></td>
                <td>
                    <a class="btn btn-warning" href="editgud.php?updateGudang=<?= $g['nama_gudang'] ?>">Edit Gudang</a>
                    <a class="btn btn-warning" href="gudang.php?delete=<?= $g['id_gudang'] ?>"  onclick="return confirm('Apakah anda yakin mau delete')">Delete Gudang</a>
                </td>
            </tr>
                <?php endforeach; ?>
        </table>
    </div>
            </div>
        </div>
    </div>
 </div>
 
 <?php include '../part/footer.php'; ?>
