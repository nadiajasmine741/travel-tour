```html
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Wisata</title>

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
    url('../gambar/destinasi/toba.png');

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
    color:white;
}

h2{
    text-align:center;
    margin-bottom:25px;
}

.input-group{
    position:relative;
    margin-bottom:15px;
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
    font-size:15px;
}

.input-group input::placeholder{
    color:#f0f0f0;
}

.input-group input:focus{
    background:rgba(255,255,255,0.3);
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
    color:white;
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

    <h2>Login Wisata</h2>

    <form action="login_proses.php" method="POST">

        <div class="input-group">
            <i class="fa-solid fa-envelope"></i>
            <input type="email"
                   name="email"
                   placeholder="Masukkan Email"
                   required>
        </div>

        <div class="input-group">
            <i class="fa-solid fa-lock"></i>
            <input type="password"
                   name="password"
                   placeholder="Masukkan Password"
                   required>
        </div>

        <button type="submit">
            <i class="fa-solid fa-right-to-bracket"></i>
            Login
        </button>

    </form>

    <div class="footer">
        Belum punya akun?
        <a href="register.php">Daftar Sekarang</a>
    </div>

</div>

</body>
</html>
```
