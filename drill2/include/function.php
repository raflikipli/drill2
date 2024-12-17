<?php

// gudang

function addgud($nama_gudang, $lokasi){
    global $conn;
    $query = "INSERT INTO  gudang (nama_gudang,lokasi) VALUES (?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $nama_gudang, $lokasi);
    $stmt->execute();
    return true;
}

function getGudangALL(){
    global $conn;
    $query = "SELECT * FROM gudang";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function deletGudang($id_gudang){
    global $conn;
    $query = "DELETE FROM gudang  WHERE id_gudang=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id_gudang);
    $stmt->execute();
}

function updateGudang($nama_gudang, $lokasi, $id_gudang){
    global $conn;
    $query = "UPDATE gudang SET
                nama_gudang=?, lokasi=?
                WHERE id_gudang=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssi', $nama_gudang, $lokasi,$id_gudang );
    $stmt->execute();  
}

function getGudang($nama_gudang){
    global $conn;
    $query = "SELECt * FROM gudang WHERE nama_gudang=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $nama_gudang);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
// vendor

function getVendorByName($nama_barang){
    global $conn;
    $query = "SELECt * FROM vendor WHERE nama_vendor=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $nama_barang);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function getVendorBybarangName($nama_barang){
    global $conn;
    $query = "SELECT nama_vendor FROM vendor WHERE nama_barang=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $nama_barang);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function addVendor($nama_vendor, $nama_barang, $stok_barang, $kontak_barang, $no_inv){
    global $conn;
    $query = "INSERT INTO vendor (nama_vendor, nama_barang, stok_barang, kontak_vendor, no_inv) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssiis',$nama_vendor, $nama_barang, $stok_barang, $kontak_barang, $no_inv );
    $stmt->execute();
    return true;
}

function deleteVendor($id_vendor){
    global $conn;
    $query = "DELETE FROM vendor WHERE id_vendor=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id_vendor);
    $stmt->execute();
}

function getVendorAll(){
    global $conn;
    $query = "SELECT * FROM vendor";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function updateVendor($nama_vendor, $nama_barang, $stok_barang, $kontak_vendor, $no_inv, $id_vendor){
    global $conn;
    $query = "UPDATE vendor SET
                nama_vendor=?, nama_barang=?, stok_barang=?, kontak_vendor=?, no_inv=? 
                WHERE id_vendor=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssiisi',$nama_vendor, $nama_barang, $stok_barang, $kontak_vendor, $no_inv, $id_vendor);
    $stmt->execute();  
}

// inventory

function addInv( $nama_barang, $jenis_barang, $stok_barang, $barcode, $harga, $id_vendor, $id_gudang) {
    global $conn;
    $query = "INSERT INTO inventory 
    ( nama_barang, jenis_barang, stok_barang, barcode, harga, id_vendor, id_gudang) 
    VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssiiiii',  $nama_barang, $jenis_barang, $stok_barang, $barcode, $harga, $id_vendor, $id_gudang);
    $stmt->execute();
    return true;
}

function updateinven($id_inv,$nama_barang,$jenis_barang,$stok_barang,$barcode,$harga,$id_vendor,$id_gudang){
    global $conn;
    $query = "UPDATE inventory SET 
    nama_barang  = ?, jenis_barang  = ?, stok_barang  = ?, barcode  = ?, harga  = ?, id_vendor=?, id_gudang=? 
     WHERE id_inv  = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssiiiiii',$nama_barang,$jenis_barang,$stok_barang,$barcode,$harga,$id_vendor,$id_gudang,$id_inv);
    $stmt->execute();
}

function deleteinv($id_inv){
    global $conn;
    $query = "DELETE FROM inventory WHERE id_inv=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id_inv);
    $stmt->execute();
}

function getinvenbyid($id_inv){
    global $conn;
    $query = "SELECT * FROM inventory WHERE id_inv=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id_inv);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}


function getAllinv($search=''){
    global $conn;
    $query = "SELECT inventory.*,gudang.lokasi AS lokasi, vendor.nama_vendor AS nama_vendor
    FROM inventory JOIN gudang ON inventory.id_gudang =gudang.id_gudang
    JOIN vendor ON inventory.id_vendor=vendor.id_vendor";

    if (!empty($search)){
        $search='%'.$search.'%';
        $query.="WHERE inventory.nama_barang LIKE ?
        OR inventory.jenis_barang LIKE ?
        OR lokasi LIKE ?
        OR nama_vendor LIKE ?";
    }

    $stmt=$conn->prepare($query);
    if (!empty($search)){
        $stmt->bind_param('ssss', $search,$search,$search,$search);
    }
    $stmt->execute();
    $result=$stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}








?>
