<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <style>
   
  </style>
  <style>
    .form-email:focus,
    .form-password:focus {
        outline: none;
        box-shadow: none;
        border-color: rgb(72, 155, 72);
    }
    .form-email, .form-password{
        border-bottom: 3px solid rgb(72, 155, 72);
        border-top: 0px;
        border-left: 0px;
        border-right: 0px;
        border-radius:2px;
        width: 350px;
        margin-top:15px;
        margin-bottom:5px;
    }
    .btn-login{
        border-radius: 20px;
        background: rgb(72, 155, 72);
        border: 1px;
        padding-left: 8em;
        padding-right: 8em;
        margin-left: 30px;
        margin-bottom: 5px;
        color: white;
        margin-top:10px;
        font-weight: bold;
        padding-top: 5px;
        padding-bottom: 5px;
    }
    body{
        background: #BCF1B3;
        font-family: 'Poppins', sans-serif;

    }
    .card {
        box-shadow: 5px 4px 8px rgba(2, 2, 2, 2);
        margin-top: 9em;
        width: 400px;
    }
    @media (max-width: 575.98px) {
        .card {
            width: 100%; /* Mengatur lebar card menjadi 100% dari lebar layar */
            max-width: 400px; /* Tetapkan maksimum lebar card agar tidak melebihi 400px */
            margin: 5em auto; /* Pusatkan card dengan margin atas dan bawah 2em */
        }
    }
    .container{
        padding: 0px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .card-header{
        background: rgb(72, 155, 72);
        color:white;
        font-weight: bold;
        font-size: 25px;
    }
    a{
        color:  rgb(72, 155, 72);
    }
    a:focus{
        outline: none;
        box-shadow: none;
        color: rgb(72,155,72);
    }
  </style>
  <body>
      <div class="container">
        <div class="card">
            <div class="card-header text-center">
                DAFTAR
            </div>
            <div class="card-body">
                <form action="/daftar" method="POST">
                    @csrf
                    <div class="mb-3">
                      <input name="name" type="text" class="form-email" placeholder="Nama Lengkap">
                    </div>
                    <div class="mb-3">
                      <input name="email" type="text" class="form-email" placeholder="Email ..">
                    </div>
                    <div class="mb-3">
                      <input name="whatsapp" type="text" class="form-email" placeholder="Nomor Whatsapp ..">
                    </div>
                    <div class="mb-3">
                        <input name="password" type="password" class="form-password" placeholder="Password ..">
                    </div>
                    <div class="mb-3">
                        <input name="confirm" type="password" class="form-password" placeholder="Confirm Password ..">
                    </div>
                    <button type="submit" class="btn-login">Daftar</button>
                    <br>
                    <label for="" style="margin-left: 110px; margin-top:10px;">Sudah punya akun?</label>
                    <br>
                    <a href="/login"  style="margin-left: 135px">Masuk disini!!..</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>