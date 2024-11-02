<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kuliah_pakar";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari form
$nama = $_POST['nama'];
$email = $_POST['email'];
$jumlah = $_POST['jumlah'];

// Menangani upload file
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["bukti"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Cek apakah file gambar adalah gambar sebenarnya atau file yang tidak valid
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["bukti"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File bukan gambar.";
        $uploadOk = 0;
    }
}

// Cek jika file sudah ada
if (file_exists($target_file)) {
    echo "Maaf, file sudah ada.";
    $uploadOk = 0;
}

// Cek ukuran file
if ($_FILES["bukti"]["size"] > 500000) { // Maksimum 500KB
    echo "Maaf, ukuran file terlalu besar.";
    $uploadOk = 0;
}

// Izinkan format file tertentu
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diizinkan.";
    $uploadOk = 0;
}

// Cek jika $uploadOk bernilai 0 karena kesalahan
if ($uploadOk == 0) {
    echo "Maaf, file tidak diupload.";
} else {
    if (move_uploaded_file($_FILES["bukti"]["tmp_name"], $target_file)) {
        // Menyimpan data ke database
        $sql = "INSERT INTO bukti_transfer (nama, email, jumlah, bukti) VALUES ('$nama', '$email', '$jumlah', '$target_file')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil disimpan.";
            
            // Kirim email
            $to = "vatrarizqiatuka@gmail.com"; // Ganti dengan alamat email yang diinginkan
            $subject = "Registrasi Baru: $nama";
            $message = "Ada registrasi baru dengan detail berikut:\n\n".
                       "Nama: $nama\n".
                       "Email: $email\n".
                       "Jumlah: $jumlah\n".
                       "Bukti Transfer: $target_file\n";
            $headers = "From: noreply@example.com"; // Ganti dengan alamat pengirim yang valid
            
            if (mail($to, $subject, $message, $headers)) {
                echo "Email berhasil dikirim.";
            } else {
                echo "Gagal mengirim email.";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Maaf, terjadi kesalahan saat mengupload file.";
    }
}

$conn->close();
?>
