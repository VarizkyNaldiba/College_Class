<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Form Tambah Data User</h1>
    <form action="/user/tambah_simpan" method="post">
        
        {{ csrf_field() }}
        
        <label> Username </label>
        <input type="text" name="username" placeholder="Masukkan Username">
        <br>
        <label> Nama </label>
        <input type="text" name="nama" placeholder="Masukkan Nama">
        <br>
        <label> Password </label>
        <input type="password" name="password" placeholder="Masukkan Password">
        <br>
        <label> Level ID </label>
        <input type="number" name="level_id" placeholder="Masukkan ID Level">
        <br>
        <button type="submit" class"btn btn-success">Simpan</button>
    </form>
</body>
</html>