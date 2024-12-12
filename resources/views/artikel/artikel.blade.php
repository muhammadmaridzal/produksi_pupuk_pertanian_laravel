<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <style>
        button,
        a.btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.3s;
            display: inline-block;
            margin: 5px;
        }

        button:hover,
        a.btn:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        a.btn-edit {
            background-color: #ff9800;
        }

        a.btn-edit:hover {
            background-color: #e68900;
        }

        a.btn-delete {
            background-color: #f44336;
        }

        a.btn-delete:hover {
            background-color: #da190b;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f4f4f4;
        }

        .action-buttons {
            display: flex;
            justify-content: left;
            gap: 10px;
        }

        .action-buttons a,
        .action-buttons button {
            margin: 0 5px;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="logo-section">
            <img src="{{ asset('image/logo.png') }}" alt="Logo" class="logo">
            <h3>ORGANIK FERTILIZER</h3>
            <p>Solusi Pupuk Pertanian</p>
        </div>
        <ul class="nav-menu">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="#">Data Sales</a></li>
            <li><a href="data_artikel.php">Data Artikel</a></li>
            <li><a href="data_produk.php">Data Produk</a></li>
            <li><a href="#">Data Pembelian</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <header>
            <h1>Data Artikel</h1>
            <div class="search-bar">
                <input type="text" placeholder="Search here...">
            </div>
            <div class="user-info">
                <span>Eng (US)</span>
                <div class="user-profile">
                    <img src="image/user.jpg" alt="User">
                    <span></span>
                </div>
            </div>
        </header>
        <div class="action-buttons">
            <a href="{{ url('/tambah-artikel') }}" class="btn">Tambah Artikel</a>
            <a href="{{ url('pdf') }}" class="btn">Cetak Pdf</a>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID Artikel</th>
                        <th>Judul Artikel</th>
                        <th>Deskripsi Artikel</th>
                        <th>Foto Artikel</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($artikel as $article)
                        <tr>
                            <td>{{ $article['id'] }}</td>
                            <td>{{ $article['judul'] }}</td>
                            <td>{{ $article['deskripsi'] }}</td>
                            <td><img style="width: 50px;" src="{{ asset('image/artikel/' . $article['foto']) }}" alt=""></td>
                            <td class="">
                                <a href="{{ url('/edit-artikel', $article['id']) }}" class="btn btn-edit">Edit</a>
                                <a href="{{ url('/delete-data-artikel', $article['id']) }}" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
