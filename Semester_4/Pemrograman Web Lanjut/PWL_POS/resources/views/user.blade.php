<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data User</title>
</head>
<body>
    <h1>Data User</h1>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>ID Level Pengguna</th>
            <th>Kode Level</th>
            <th>Nama Level</th>
            <th>Aksi</th>
        </tr>
        @foreach ($data as $d)
            <tr>
                <td>{{$d->user_id}}</td>
                <td>{{$d->username}}</td>
                <td>{{$d->nama}}</td>
                <td>{{$d->level_id}}</td>
                <td>{{$d->level->level_kode}}</td>
                <td>{{$d->level->level_nama}}</td>
                <td>
                    <td>
                        <a href="/user/ubah/{{$d->user_id}}">Edit</a> |
                        <a href="/user/hapus/{{$d->user_id}}">Delete</a> | 
                        <a href="/user/tambah" class="btn btn-primary">Tambah User</a>
                    </td>
                    

                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>