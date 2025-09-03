<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <title>Tambah Literatur</title>
    <style>
        body {
            font-family: 'Konkhmer Sleokchher', sans-serif;
            background: #f0f0f0;
            display: flex;
            justify-content: center;
            min-height: 100vh;
        }
        .form-container {
            width: 1060px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0px 4px 6px rgba(0,0,0,0.2);
        }
        h1 {
            text-align: center;
            font-size: 32px;
            margin-bottom: 30px;
            margin-top: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-size: 20px;
            margin-bottom: 8px;
        }
        input, select, textarea {
            width: 100%;
            max-width: 540px;
            height: 44px;
            border-radius: 8px;
            border: none;
            background: #D9D9D9;
            padding: 10px;
            font-size: 16px;
        }
        textarea {
            height: 80px;
            resize: vertical;
        }
        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        .btn {
            width: 160px;
            height: 50px;
            border-radius: 8px;
            border: none;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
        }
        .btn-back {
            background: #7D81BE;
            color: white;
        }
        .btn-submit {
            background: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Tambahkan Literatur</h1>
        <form action="/literatur" method="POST">
            @csrf

            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" id="judul" name="judul" required>
            </div>

            <div class="form-group">
                <label for="penulis">Penulis</label>
                <input type="text" id="penulis" name="penulis" required>
            </div>

            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="number" id="tahun" name="tahun" required>
            </div>

            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input type="text" id="penerbit" name="penerbit" required>
            </div>

            <div class="form-group">
                <label for="sni_number">SNI Number</label>
                <input type="text" id="sni_number" name="sni_number">
            </div>

            <div class="form-group">
                <label for="link">Link</label>
                <input type="url" id="link" name="link">
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-back" onclick="history.back()">Kembali</button>
                <button type="submit" class="btn btn-submit">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>
