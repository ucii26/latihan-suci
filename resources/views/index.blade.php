<!DOCTYPE html>
<html>
<head>
<title>Data Mahasiswa</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Data Mahasiswa</h2>

<a href="/mahasiswa/create" class="btn btn-primary mb-3">
+ Tambah Data
</a>

<table class="table table-bordered table-striped">
<table>
<thead>
<tr>
<th>Nama</th>
<th>NIM</th>
<th>Prodi</th>
<th>Email</th>
<th>No HP</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach ($mahasiswa as $no => $mhs)
<tr>
<td>{{ $no + 1 }}</td>
<td>{{ $mhs['nama'] }}</td>
<td>{{ $mhs['nim'] }}</td>
<td>{{ $mhs['prodi'] }}</td>
<td>{{ $mhs['email'] }}</td>
<td>{{ $mhs['no_hp'] }}</td>
<td>
<a href="#" class="btn btn-warning btn-sm">Edit</a>
<a href="#" class="btn btn-danger btn-sm">Hapus</a>
</td>
</tr>
@endforeach
</tbody>
</table>
</body>
</html>