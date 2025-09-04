<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Laporan Hasil</title>
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f0f0f0;
        }

        .form-container {
            width: 100%;
            max-width: 700px;
            background: rgba(255,255,255,0.95);
            border-radius: 20px;
            padding: 40px 30px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 {
            text-align: center;
            font-size: 36px;
            color: #060E7E;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 16px;
            margin-bottom: 6px;
            color: #333;
            font-weight: 500;
        }

        input, select, textarea {
            width: 100%;
            padding: 14px 15px;
            border-radius: 12px;
            border: 1px solid #ccc;
            font-size: 15px;
            transition: all 0.3s ease;
            background: #f1f1f1;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #060E7E;
            box-shadow: 0 0 8px rgba(6,14,126,0.5);
            background: #fff;
        }

        textarea {
            height: 80px;
            resize: vertical;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 30px;
        }

        .btn {
            flex: 1;
            padding: 14px 0;
            font-size: 16px;
            font-weight: 600;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            color: white;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-back {
            background: linear-gradient(135deg, #7D81BE, #5f639b);
        }

        .btn-submit {
            background: linear-gradient(135deg, #4CAF50, #2e7d32);
        }

        .btn-back:hover, .btn-submit:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>

<div class="form-container">
    <h1>Tambahkan Laporan Hasil</h1>

    <form action="/laporan_hasil" method="POST">
        @csrf

        <div class="form-group">
            <label for="id_laporan">ID Laporan</label>
            <input type="text" id="id_laporan" name="id_laporan" required>
        </div>

        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" id="judul" name="judul" required>
        </div>

        <div class="form-group">
            <label for="isi_laporan">Isi Laporan</label>
            <textarea id="isi_laporan" name="isi_laporan" required></textarea>
        </div>

        <div class="form-group">
            <label for="tanggal_laporan">Tanggal Laporan</label>
            <input type="date" id="tanggal_laporan" name="tanggal_laporan" required>
        </div>

        <div class="form-actions">
            <button type="button" class="btn btn-back" onclick="history.back()">Kembali</button>
            <button type="submit" class="btn btn-submit">Simpan</button>
        </div>
    </form>
</div>

</body>
</html>
