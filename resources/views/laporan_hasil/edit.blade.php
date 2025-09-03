<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Laporan Hasil</title>
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
        <h1>Edit Laporan Hasil</h1>
    <form action="{{ route('laporan_hasil.update', $laporan->id_laporan) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id_laporan">ID Laporan</label>
                <input type="text" id="id_laporan" name="id_laporan" value="{{ old('id_laporan', $laporan->id_laporan) }}" required>
            </div>

            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul', $laporan->judul) }}" required>
            </div>

            <div class="form-group">
                <label for="isi_laporan">Isi Laporan</label>
                <textarea id="isi_laporan" name="isi_laporan" required>{{ old('isi_laporan', $laporan->isi_laporan) }}</textarea>
            </div>

            <div class="form-group">
                <label for="tanggal_laporan">Tanggal Laporan</label>
                <input type="date" id="tanggal_laporan" name="tanggal_laporan" value="{{ old('tanggal_laporan', $laporan->tanggal_laporan) }}" required>
            </div>

            <div class="form-actions">
                <a href="{{ route('laporan_hasil.index') }}" class="btn btn-back" style="text-align:center;line-height:50px;text-decoration:none;">Kembali</a>
                <button type="submit" class="btn btn-submit">Update</button>
            </div>
        </form>
    </div>
</body>
</html>


