<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <title>Halaman Login</title>
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
        margin-top: 15em;
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
                LOGIN
            </div>
            <div class="card-body">
                <form method="post" action="/login">
                    @csrf
                    <div class="mb-3">
                      <input name="email" type="email" class="form-email" placeholder="Email ..">
                    </div>
                    <div class="mb-3">
                        <input name="password" type="password" class="form-password" placeholder="Password ..">
                    </div>
                    <button type="submit" class="btn-login">Login</button>
                    <br>
                    <label for="" style="margin-left: 110px; margin-top:10px;">Belum punya akun?</label>
                    <br>
                    <a href="/daftar"  style="margin-left: 135px">Daftar disini!!..</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    @if(session('success'))
    <script>
        Swal.fire({
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    </script>
    @endif
    </body>
</html>