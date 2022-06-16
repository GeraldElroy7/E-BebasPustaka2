<!DOCTYPE html>
<html>
<head>
<style>
a:link, a:visited {
  background-color: white;
  color: black;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border: 2px solid #4CAF50;
  transition-duration: 0.4s;
}   

a:hover, a:active {
    background-color: #4CAF50; /* Green */
    color: white;
}
}

a:hover, a:active {
  background-color: red;
}
</style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <b>Halo,</b> <br>
                    </div>
                    <div class="card-body">
                        Anda menerima email ini karena sudah melakukan request pengaturan ulang kata sandi pada website Layanan Referensi Virtual Perpustakaan ITS. <br>
                        <br><a href="{{ url('/reset-password/'.$token) }}">Atur Ulang Kata Sandi</a><br><br>
                        Jika anda tidak melakukan request pengaturan ulang kata sandi, harap abaikan email ini.
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


