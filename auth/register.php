<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register Wisata</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;

    background:
    linear-gradient(
        rgba(0,0,0,0.45),
        rgba(0,0,0,0.45)
    ),
    url('../gambar/destinasi/lombok.jpg');

    background-size:cover;
    background-position:center;
}

.container{
    width:420px;
    padding:35px;

    background:rgba(255,255,255,0.15);

    backdrop-filter:blur(12px);

    border:1px solid rgba(255,255,255,0.3);

    border-radius:20px;

    box-shadow:0 8px 32px rgba(0,0,0,0.3);

    color:white;
}

.logo{
    text-align:center;
    margin-bottom:15px;
}

.logo i{
    font-size:60px;
    color:#fff;
}

h2{
    text-align:center;
    margin-bottom:25px;
}

.input-group{
    margin-bottom:15px;
    position:relative;
}

.input-group i{
    position:absolute;
    top:15px;
    left:15px;
    color:white;
}

.input-group input{
    width:100%;
    padding:14px 14px 14px 45px;

    border:none;
    outline:none;

    border-radius:10px;

    background:rgba(255,255,255,0.2);

    color:white;
}

.input-group input::placeholder{
    color:#eee;
}

button{
    width:100%;
    padding:14px;

    border:none;
    border-radius:10px;

    background:#10b981;

    color:white;
    font-size:16px;
    font-weight:bold;

    cursor:pointer;
    transition:.3s;
}

button:hover{
    background:#059669;
    transform:translateY(-2px);
}

.footer{
    text-align:center;
    margin-top:20px;
}

.footer a{
    color:#fff;
    font-weight:bold;
    text-decoration:none;
}

.footer a:hover{
    text-decoration:underline;
}

</style>
</head>
<body>

<div class="container">

    <div class="logo">
        <i class="fa-solid fa-earth-asia"></i>
    </div>

    <h2>Daftar Akun Wisata</h2>

    <form action="register_proses.php" method="POST">

        <div class="input-group">
            <i class="fa-solid fa-user"></i>
            <input type="text"
                   name="nama"
                   placeholder="Nama Lengkap"
                   required>
        </div>

        <div class="input-group">
            <i class="fa-solid fa-envelope"></i>
            <input type="email"
                   name="email"
                   placeholder="Email"
                   required>
        </div>

        <div class="input-group">
            <i class="fa-solid fa-lock"></i>
            <input type="password"
                   name="password"
                   placeholder="Password"
                   required>
        </div>

        <button type="submit">
            Daftar Sekarang
        </button>

    </form>

    <div class="footer">
        Sudah punya akun?
        <a href="login.php">Login</a>
    </div>

</div>

</body>
</html>