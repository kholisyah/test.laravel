<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="/home"> Home </a>
     <a href="/dashboard"> dashboard </a>
     <h1> Halaman Home </h1>

     @auth
         <p>selamat login</p>
         <form action="/logout" method="POST">
        @csrf
        <button> log out</button>
         </form>

    @else
     <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="nama" type="text" placeholder="nama">
            <input name="email" type="text" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button>Register</button>
        </form>
     </div>

     <div style="border: 3px solid black;">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input name="loginname" type="text" placeholder="name">
            <input name="loginpassword" type="password" placeholder="password">
            <button>login</button>
        </form>
     </div>
     @endauth
</body>
</html>