
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Permintaan Layanan</title>
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
        <h1>Edit Permintaan Layanan</h1>
        <form action="{{ route('permintaan.update', $permintaan->id_permintaan) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id_permintaan">ID Permintaan</label>
                <input type="text" id="id_permintaan" name="id_permintaan" value="{{ old('id_permintaan', $permintaan->id_permintaan) }}" required>
            </div>

            <div class="form-group">
                <label for="pemohon">Nama Pemohon</label>
                <input type="text" id="pemohon" name="pemohon" value="{{ old('pemohon', $permintaan->pemohon) }}" required>
            </div>

            <div class="form-group">
                <label for="jenis_permintaan">Jenis Permintaan</label>
                <input type="text" id="jenis_permintaan" name="jenis_permintaan" value="{{ old('jenis_permintaan', $permintaan->jenis_permintaan) }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="pending" {{ old('status', $permintaan->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="proses" {{ old('status', $permintaan->status) == 'proses' ? 'selected' : '' }}>Proses</option>
                    <option value="selesai" {{ old('status', $permintaan->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea id="keterangan" name="keterangan">{{ old('keterangan', $permintaan->keterangan) }}</textarea>
            </div>

            <div class="form-actions">
                <a href="{{ route('permintaan.index') }}" class="btn btn-back" style="text-align:center;line-height:50px;text-decoration:none;">Kembali</a>
                <button type="submit" class="btn btn-submit">Update</button>
            </div>
        </form>
    </div>

</body>
</html>
