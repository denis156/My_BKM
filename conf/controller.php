<?php


  //fungsi menampilkan
function select($query) 
{
  //panggil koneksi
  global $db;

  $result = mysqli_query($db, $query);
  $rows =[];
  while ($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }

  return $rows;
} 
 //fungsi menambahkan data delivery
 function create_delivery($post)
 {
  global $db;

  $truck_id = $post['truck_id'];
  $no_bl = $post['no_bl'];
  $id_supir = $post['id_supir'];
  $tanggal = $post['tanggal'];
  $no_count = $post['no_count'];
  $jenis_count = $post['jenis_count'];
  $pelayaran = $post['pelayaran'];
  $mitra = $post['mitra'];
  $re_maks = $post['re_maks'];

//querry tambah data delivery

$query = "INSERT INTO delivery VALUES (null,'$truck_id','$no_bl','$id_supir','$tanggal','$no_count','$jenis_count','$pelayaran','$mitra','$re_maks')";

mysqli_query($db, $query);

return mysqli_affected_rows($db);
 
}

//fungsi update data delivery

function update_delivery($post)
{
 global $db;
 $id_delivery = $post['id_delivery'];
 $truck_id = $post['truck_id'];
 $no_bl = $post['no_bl'];
 $id_supir = $post['id_supir'];
 $tanggal = $post['tanggal'];
 $no_count = $post['no_count'];
 $jenis_count = $post['jenis_count'];
 $pelayaran = $post['pelayaran'];
 $mitra = $post['mitra'];
 $re_maks = $post['re_maks'];

//querry update data data delivery

$query = "UPDATE delivery SET truck_id='$truck_id' , no_bl='$no_bl', id_supir='$id_supir', tanggal='$tanggal', no_count='$no_count', jenis_count='$jenis_count', pelayaran='$pelayaran', mitra='$mitra', re_maks='$re_maks' WHERE id_delivery = '$id_delivery' ";

mysqli_query($db, $query);

return mysqli_affected_rows($db);

}

function delete_delivery($id_delivery)
{
    global $db;
    // Melakukan query untuk menghapus data delivery
    $query = "DELETE FROM delivery WHERE id_delivery = $id_delivery";
    
    // Eksekusi query dan tangkap kesalahan jika ada
    mysqli_query($db, $query) or die(mysqli_error($db));

    return mysqli_affected_rows($db);
}



 //fungsi menambahkan data receiving
 function create_receiving($post)
 {
  global $db;

  $truck_id = $post['truck_id'];
  $id_supir = $post['id_supir'];
  $tanggal = $post['tanggal'];
  $no_count = $post['no_count'];
  $jenis_count = $post['jenis_count'];
  $pelayaran = $post['pelayaran'];
  $mitra = $post['mitra'];
  $re_maks = $post['re_maks'];

//querry tambah data data receiving

$query = "INSERT INTO receiving VALUES (null,'$truck_id','$id_supir','$tanggal','$no_count','$jenis_count','$pelayaran','$mitra','$re_maks')";

mysqli_query($db, $query);

return mysqli_affected_rows($db);
 
}

//fungsi update data receiving

function update_receiving($post)
{
 global $db;
 $id_receiving = $post['id_receiving'];
 $truck_id = $post['truck_id'];
 $id_supir = $post['id_supir'];
 $tanggal = $post['tanggal'];
 $no_count = $post['no_count'];
 $jenis_count = $post['jenis_count'];
 $pelayaran = $post['pelayaran'];
 $mitra = $post['mitra'];
 $re_maks = $post['re_maks'];

//querry update data data receiving

$query = "UPDATE receiving SET truck_id='$truck_id', id_supir='$id_supir', tanggal='$tanggal', no_count='$no_count', jenis_count='$jenis_count', pelayaran='$pelayaran', mitra='$mitra', re_maks='$re_maks' WHERE id_receiving = '$id_receiving' ";

mysqli_query($db, $query);

return mysqli_affected_rows($db);

}

//fungsi hapus data data receiving

function delete_receiving($id_receiving)
{
    
    // Melakukan query untuk menghapus data receiving
    $query = "DELETE FROM receiving WHERE id_receiving = $id_receiving";

    global $db;
    //query hapus data
    $query = "DELETE FROM receiving WHERE id_receiving =$id_receiving";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);


}

 //fungsi menambahkan data stripping
 function create_stripping($post)
{
    global $db;

    $no_bl = $post['no_bl'];
    $tanggal = $post['tanggal'];
    $no_count = $post['no_count'];
    $jenis_count = $post['jenis_count'];
    $pelayaran = $post['pelayaran'];
    $mitra = $post['mitra'];
    $re_maks = $post['re_maks'];
    $status = $post['status'];
    

    //query tambah data stripping
    $query = "INSERT INTO stripping VALUES (null,'$no_bl','$tanggal','$no_count','$jenis_count','$pelayaran','$mitra','$re_maks','$status')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


//fungsi update data stripping
function update_stripping($post)
{
    global $db;
    $id_stripping = $post['id_stripping'];
    $no_bl = $post['no_bl'];
    $tanggal = $post['tanggal'];
    $no_count = $post['no_count'];
    $jenis_count = $post['jenis_count'];
    $pelayaran = $post['pelayaran'];
    $mitra = $post['mitra'];
    $status = $post['status'];
    $re_maks = $post['re_maks'];

    //query update data stripping
    $query = "UPDATE stripping SET no_bl='$no_bl', tanggal='$tanggal', no_count='$no_count', jenis_count='$jenis_count', pelayaran='$pelayaran', mitra='$mitra', re_maks='$re_maks', status='$status' WHERE id_stripping = '$id_stripping'";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


//fungsi hapus data data stripping

function delete_stripping($id_stripping)
{
    global $db;

    // Melakukan query untuk menghapus data stripping
    $query = "DELETE FROM stripping WHERE id_stripping = $id_stripping";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


//fungsi menambahkan data user
function create_user($post)
{
 global $db;

 $nama = $post['nama'];
 $username = $post['username'];
 $password = $post['password'];
 $level = $post['level'];


//querry tambah data user

$query = "INSERT INTO user VALUES (null,'$nama','$username','$password','$level')";

mysqli_query($db, $query);

return mysqli_affected_rows($db);

}

//fungsi update data user

function update_user($post)
{
 global $db;
 $id_user = $post['id_user'];
 $nama = $post['nama'];
 $username = $post['username'];
 $password = $post['password'];
 $level = $post['level'];

//querry update data data user

$query = "UPDATE user SET nama='$nama', username='$username', password='$password', level='$level' WHERE id_user = '$id_user' ";

mysqli_query($db, $query);

return mysqli_affected_rows($db);

}

//fungsi hapus data data user

function delete_user($id_user)
{
    global $db;

    // Melakukan query untuk menghapus data user
    $query = "DELETE FROM user WHERE id_user = $id_user";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


//fungsi menambahkan data buffer
function create_buffer($post)
{
    global $db;

    $no_count = $post['no_count'];
    $no_segel = $post['no_segel'];
    $tanggal = $post['tanggal'];
    $jenis_count = $post['jenis_count'];
    $pelayaran = $post['pelayaran'];
    $mitra = $post['mitra'];
    $re_maks = $post['re_maks'];
    $status = $post['status'];

    //query tambah data buffer
    $query = "INSERT INTO buffer VALUES (null,'$no_count','$no_segel','$tanggal','$jenis_count','$pelayaran','$mitra','$re_maks','$status')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


//fungsi update data buffer
function update_buffer($post)
{
    global $db;
    $id_buffer = $post['id_buffer'];
    $no_count = $post['no_count'];
    $no_segel = $post['no_segel'];
    $tanggal = $post['tanggal'];
    $jenis_count = $post['jenis_count'];
    $pelayaran = $post['pelayaran'];
    $mitra = $post['mitra'];
    $status = $post['status'];
    $re_maks = $post['re_maks'];

    //query update data buffer
    $query = "UPDATE buffer SET no_count='$no_count', no_segel='$no_segel', tanggal='$tanggal', jenis_count='$jenis_count', pelayaran='$pelayaran', mitra='$mitra', status='$status', re_maks='$re_maks' WHERE id_buffer = '$id_buffer'";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi hapus data data buffer

function delete_buffer($id_buffer)
{
    global $db;

    // Melakukan query untuk menghapus data buffer
    $query = "DELETE FROM buffer WHERE id_buffer = $id_buffer";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


//fungsi menambahkan data outside
function create_outside($post)
{
    global $db;
    $truck_id = $post['truck_id'];
    $id_supir = $post['id_supir'];
    $tanggal = $post['tanggal'];
    $no_count = $post['no_count'];
    $no_segel = $post['no_segel'];
    $jenis_count = $post['jenis_count'];
    $pelayaran = $post['pelayaran'];
    $mitra = $post['mitra'];
    $status = $post['status'];
    $re_maks = $post['re_maks'];

    //query tambah data outside
    $query = "INSERT INTO outside VALUES (null,'$truck_id','$id_supir','$tanggal','$no_count','$no_segel','$jenis_count','$pelayaran','$mitra','$re_maks','$status')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


// FUNGSI UPDATE OUTSIDE
function update_outside($post)
{
    global $db;
    $id_outside = $post['id_outside'];
    $truck_id = $post['truck_id'];    
    $id_supir = $post['id_supir'];
    $tanggal = $post['tanggal'];
    $no_count = $post['no_count'];
    $no_segel = $post['no_segel'];
    $jenis_count = $post['jenis_count'];
    $pelayaran = $post['pelayaran'];
    $status = $post['status'];
    $mitra = $post['mitra'];
    $re_maks = $post['re_maks'];

    //query update data outside
    $query = "UPDATE outside SET truck_id='$truck_id',id_supir='$id_supir',tanggal='$tanggal',no_count='$no_count',no_segel='$no_segel',jenis_count='$jenis_count',pelayaran='$pelayaran',status='$status',mitra='$mitra',re_maks='$re_maks'
              WHERE id_outside = '$id_outside'";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


//fungsi hapus data data outside

function delete_outside($id_outside)
{
    global $db;

    // Melakukan query untuk menghapus data outside
    $query = "DELETE FROM outside WHERE id_outside = $id_outside";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}