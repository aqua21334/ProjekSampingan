
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Peralatan</title>
    <style>
        body {
            font-family: 'Konkhmer Sleokchher', sans-serif;
            background: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
            font-size: 40px;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-size: 20px;
            margin-bottom: 8px;
        }
        input, select {
            width: 100%;
            max-width: 540px;
            height: 44px;
            border-radius: 8px;
            border: none;
            background: #D9D9D9;
            padding: 10px;
            font-size: 16px;
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
        <h1>Tambahkan Peralatan</h1>
        <form action="/peralatan" method="POST">
            @csrf

            <div class="form-group">
                <label for="kode_bmn">Kode BMN</label>
                <input type="text" id="kode_bmn" name="kode_bmn" required>
            </div>

            <div class="form-group">
                <label for="nama_peralatan">Nama Peralatan</label>
                <input type="text" id="nama_peralatan" name="nama_peralatan" required>
            </div>

            <div class="form-group">
                <label for="tanggal_kalibrasi">Tanggal Kalibrasi</label>
                <input type="date" id="tanggal_kalibrasi" name="tanggal_kalibrasi">
            </div>

            <div class="form-group">
                <label for="status_kalibrasi">Status Kalibrasi</label>
                <select id="status_kalibrasi" name="status_kalibrasi" required>
                    <option value="">Pilih Status</option>
                    <option value="Sudah">Sudah</option>
                    <option value="Belum">Belum</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-back" onclick="history.back()">Kembali</button>
                <button type="submit" class="btn btn-submit">Simpan</button>
            </div>
        </form>
    </div>

</body>
</html>
