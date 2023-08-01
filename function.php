<?php
// Konek ke database
$conn = mysqli_connect("localhost","root","","anonim_teks");

function query($q){
    global $conn;

    $result = mysqli_query($conn, $q);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data){
    global $conn;

    // ambil data dari tiap elemen dalam form
    $nama = htmlspecialchars($data["nama"]);
    $isi = htmlspecialchars($data["isi"]);
    
    // upload gambar
    $gambar = upload();

    // query insert data
    $query = "INSERT INTO isi_hati VALUES('$nama','$gambar','$isi')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload(){
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpname = $_FILES['gambar']['tmp_name'];

    if (isset($_FILES['gambar']) && $error === UPLOAD_ERR_OK) {
        // cek apakah yang diupload adalah gambar
        $allowedExtensions = ['jpg', 'png', 'jpeg'];
        $fileExtension = pathinfo($namafile, PATHINFO_EXTENSION);
        if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
            echo "<script>
                    alert('Yang kamu upload bukan gambar!');
                </script>";
            return false;
        }

        // cek jika ukuran terlalu besar
        if ($ukuranfile > 1000000) {
            echo "<script>
                    alert('Gambarnya kebesaran!');
                </script>";
            return false;
        }

        // generate nama gambar baru
        $namaFileBaru = uniqid() . '.' . $fileExtension;
        
        // pindahkan file sementara ke folder tujuan (img/)
        move_uploaded_file($tmpname, 'img/' . $namaFileBaru);

        return $namaFileBaru;
    } else {
        return '';
    }
}

?>