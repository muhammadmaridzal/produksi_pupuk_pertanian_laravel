<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Data Artikel</title>
  <style>
    .table-data {
      border-collapse: collapse;
      width: 100%;
    }

    .table-data tr th,
    .table-data tr td {
      border: 1px solid black;
      font-size: 11pt;
      padding: 10px 20px;
      text-align: center;
    }

    .table-data tr th {
      background-color: #0A5EB0;
      color: white;
    }

    .table-data tr:nth-child(even) {
      background-color: #CFD2CD;
    }

    .table-data tr:hover {
      background-color: #A9DBB8;
    }
  </style>
</head>

<body>
  <h3>Data Artikel</h3>
  <table class="table-data">
    <thead>
      <tr>
        <th>No</th>
        <th>Judul Artikel</th>
        <th>Deskripsi</th>
        <th>foto</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($artikel as $artikel)
      <tr>
        <td>{{ $artikel->id_artikel }}</td>
        <td>{{ $artikel->judul_artikel }}</td>
        <td>{{ $artikel->deskripsi_artikel }}</td>
        <td>{{ $artikel->foto_artikel }}</td>
      </tr>
      @empty
      <tr>
        <td colspan="7" align="center">Tidak ada data</td>
      </tr>
      @endforelse
    </tbody>
</body>

</html>

