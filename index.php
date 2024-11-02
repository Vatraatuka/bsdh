<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Login - KULIAH PAKAR</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Open+Sans"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <style>
      body {
        font-family: "Open Sans", sans-serif;
        margin: 0;
        padding: 0;
        background: url("logo lppm.jpg") no-repeat center center fixed;
        background-size: 40%; /* Ukuran latar belakang logo diperbesar */
        color: #fff;
      }

      .container {
        background-color: rgba(255, 255, 255, 0.9);
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        max-width: 400px;
        margin: 100px auto;
        text-align: center;
      }

      h1 {
        color: #333;
        margin-bottom: 20px;
        font-size: 2em;
      }

      label {
        display: block;
        text-align: left;
        margin-bottom: 5px;
        color: #333;
      }

      input[type="text"],
      input[type="password"] {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border: 2px solid #1b8dce;
        border-radius: 5px;
        transition: border-color 0.3s;
      }

      input[type="text"]:focus,
      input[type="password"]:focus {
        border-color: #6db3f2;
        outline: none;
      }

      button {
        background-color: #1b8dce;
        color: white;
        padding: 12px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        font-size: 1.1em;
        transition: background-color 0.3s;
      }

      button:hover {
        background-color: #1785b1;
      }

      footer {
        text-align: center;
        padding: 20px;
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        margin-top: 20px;
      }

      .footer-links {
        list-style-type: none;
        padding: 0;
        margin: 10px 0 0 0;
        display: flex;
        justify-content: center;
        gap: 15px;
      }

      .footer-links li a {
        color: white;
        text-decoration: none;
      }

      .footer-links li a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <div class="w3-top">
      <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
        <a
          href="index.html"
          class="w3-bar-item w3-button w3-padding-large w3-theme-d4"
        >
          <i class="fa fa-home"></i>
        </a>
      </div>
    </div>

    <main>
      <div class="container">
        <h1>Login</h1>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />

        <button id="submit">Masuk</button>
      </div>
    </main>

    <footer>
      <div class="footer-content">
        <p>&copy; 2024 Nama Perusahaan. Semua hak dilindungi.</p>
        <ul class="footer-links">
          <li><a href="Tentang kami.html">Tentang Kami</a></li>
          <li><a href="Kontak.html">Kontak</a></li>
          <li><a href="Privasi.html">Kebijakan Privasi</a></li>
          <li><a href="Syarat.html">Syarat & Ketentuan</a></li>
        </ul>
      </div>
    </footer>

    <script
      src="https://code.jquery.com/jquery-3.7.1.js"
      integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
      crossorigin="anonymous"
    ></script>
    <script>
      $(document).ready(function () {
        const usernameTrue = "admin";
        const passwordTrue = "admin";
        $("#submit").on("click", function () {
          var username = $("#username").val();
          var password = $("#password").val();
          if (username == usernameTrue && password == passwordTrue) {
            alert("Login Berhasil");
            window.location.href = "dashboard.html";
          } else {
            alert("Login Gagal");
          }
        });
      });
    </script>
  </body>
</html>
