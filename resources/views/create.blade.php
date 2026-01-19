<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Tambah Data Mahasiswa</h2>

<form action="/mahasiswa" method="POST">
    @csrf

    <div class="mb-2">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-2">
        <label>NIM</label>
        <input type="text" name="nim" class="form-control" required>
    </div>

    <div class="mb-2">
        <label>Prodi</label>
        <input type="text" name="prodi" class="form-control" required>
    </div>

    <div class="mb-2">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-2">
        <label>No HP</label>
        <input type="text" name="no_hp" class="form-control" required>
    </div>

    <button class="btn btn-primary mt-2">Simpan</button>
    <a href="/mahasiswa" class="btn btn-secondary mt-2">Kembali</a>
</form>

</body>
</html>
