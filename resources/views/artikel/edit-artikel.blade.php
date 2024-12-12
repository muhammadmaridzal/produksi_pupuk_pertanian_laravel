<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            font-size: 2.5rem;
            color: #333;
        }

        .form-container {
            width: 50%;
            margin: 40px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            font-size: 1.1rem;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        .form-container input,
        .form-container textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            background-color: #fafafa;
            box-sizing: border-box;
        }

        .form-container input[type="file"] {
            font-size: 1rem;
            padding: 6px;
            background-color: #fff;
        }

        .form-container button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .form-container button:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        .form-container .cancel-btn {
            background-color: #f44336;
            margin-left: 10px;
        }

        .form-container .cancel-btn:hover {
            background-color: #da190b;
        }
    </style>
</head>
<body>
    <h1>Edit Artikel</h1>
    <div class="form-container">
        <form action="{{ url('/update-data-artikel', $artikel['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="judul">Judul Artikel</label>
            <input type="text" name="judul" value="{{ $artikel['judul'] }}" required><br>

            <label for="deskripsi">Deskripsi Artikel</label>
            <textarea name="deskripsi" required>{{ $artikel['deskripsi'] }}</textarea><br>

            <label for="foto">Foto Artikel</label>
            <input type="file" name="foto"><br>

            <button type="submit">Update Artikel</button>
            <a href="{{ url('/artikel') }}" class="cancel-btn">Batal</a>
        </form>
    </div>
</body>
</html>
