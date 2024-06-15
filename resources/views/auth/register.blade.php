<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
      <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}" />

  <!-- Fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />

  <!-- Font awesome style -->
  <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
  <!-- Responsive style -->
  <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" />
    <style>
    .full-page-section {
      position: relative;
      width: 100%;
      height: 100vh;
      background-image: url('{{asset('assets/images/bgregister.jpg')}}'); /* Ganti dengan path gambar Anda */
      background-size: cover;
      background-position: center;
      opacity: 1.0; /* Atur transparansi sesuai kebutuhan (0.0 - 1.0) */
      display: flex;
      justify-content: center;
      align-items: center;
    }
    
    .form_container {
      background-color: rgba(255, 255, 255, 0.50); /* Atur transparansi pada background form */
      padding: 100px; /* Atur padding sesuai kebutuhan */
      border-radius: 10px;
      max-width: 700px; /* Maksimum lebar form */
      width: 100%; /* Lebar form menyesuaikan kontainer */
    }

    .form_container input {
      width: calc(100% - 20px); /* Lebar input menyesuaikan form dengan padding 20px */
      margin-bottom: 20px; /* Jarak antar input */
      padding: 10px; /* Padding pada input */
      border: 1px solid #ccc; /* Garis tepi input */
      border-radius: 5px; /* Sudut input */
    }

    .form_container button {
      width: 100%; /* Lebar tombol penuh */
      padding: 10px; /* Padding pada tombol */
      background-color: #007bff; /* Warna latar tombol */
      color: #fff; /* Warna teks tombol */
      border: none; /* Hapus garis tepi tombol */
      border-radius: 5px; /* Sudut tombol */
      cursor: pointer; /* Ubah kursor saat mengarah ke tombol */
    }

    .heading_container h2 {
      text-align: center; /* Membuat teks berada di tengah secara horizontal */
    }

    .password-toggle {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      cursor: pointer;
    }

    .password-toggle i {
      color: #888;
    }

    .notification {
      position: fixed;
      top: 20px;
      left: 50%;
      transform: translateX(-50%);
      background-color: #28a745;
      color: #fff;
      padding: 10px 20px;
      border-radius: 5px;
      display: none;
      z-index: 9999;
    }
  </style>
</head>
<body>
 <section class="full-page-section contact_section long_section">
    <div class="form_container">
      <div class="heading_container">
        <h2>
          Register
        </h2>
      </div>
      <form action="{{ route('register') }}" method="POST">
        @method('POST')
        @csrf
        <div class="notification" id="notification">Yeay!! Kamu Berhasil Mendaftar</div> <!-- Notifikasi -->
        <div>
          <input type="text" placeholder="Nama Lengkap"  name="name"/>
        </div>
        <div>
          <input type="email" placeholder="Email" name="email"/>
        </div>
        <div>
          <input type="password" id="password" placeholder="Password" name="password" />
          <span class="password-toggle" onclick="togglePassword()">
            <i class="fa fa-eye"></i>
          </span>
        </div>
        <div>
          <input type="password" placeholder="Ulangi Password" name="password_confirmation" />
        </div>
        <div class="btn_box">
          <button type="submit">Register</button>
        </div>
      </form>
    </div>
  </section>

  <script>
    function togglePassword() {
      var passwordInput = document.getElementById("password");
      var passwordToggle = document.querySelector(".password-toggle i");

      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        passwordToggle.classList.remove("fa-eye");
        passwordToggle.classList.add("fa-eye-slash");
      } else {
        passwordInput.type = "password";
        passwordToggle.classList.remove("fa-eye-slash");
        passwordToggle.classList.add("fa-eye");
      }
    }

    document.getElementById("registrationForm").addEventListener("submit", function(event) {
      event.preventDefault();
      // Simulasi proses registrasi
      // Di sini Anda dapat menambahkan kode untuk memproses data pendaftaran, misalnya dengan AJAX ke backend
      // Setelah berhasil, tampilkan notifikasi dan arahkan kembali ke halaman login
      document.getElementById("notification").style.display = "block"; // Menampilkan notifikasi
      setTimeout(function() {
        document.getElementById("notification").style.display = "none"; // Sembunyikan notifikasi setelah beberapa waktu
        // Ganti dengan alamat halaman login Anda
      }, 2000); // Waktu tampil notifikasi (dalam milidetik)
    });
  </script>
</body>
</html>