
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit SOP</title>
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
        input, textarea {
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
            height: 120px;
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
        <h1>Edit SOP</h1>
        <form action="{{ route('sop.update', $sop->kode_sop) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="kode_sop">Kode SOP</label>
                <input type="text" id="kode_sop" name="kode_sop" value="{{ old('kode_sop', $sop->kode_sop) }}" required>
            </div>

            <div class="form-group">
                <label for="nama_sop">Nama SOP</label>
                <input type="text" id="nama_sop" name="nama_sop" value="{{ old('nama_sop', $sop->nama_sop) }}" required>
            </div>

            <div class="form-group">
                <label for="deskripsi_sop">File Deskripsi SOP</label>
                <input type="file" id="deskripsi_sop" name="deskripsi_sop" accept=".pdf,.doc,.docx">
                @if($sop->deskripsi_sop)
                    <div class="mt-2 text-sm">
                        <a href="{{ asset('storage/' . $sop->deskripsi_sop) }}" target="_blank" class="text-blue-600 hover:underline">Lihat File Saat Ini</a>
                    </div>
                @endif
            </div>

            <div class="form-actions">
                <a href="{{ route('sop.index') }}" class="btn btn-back" style="text-align:center;line-height:50px;text-decoration:none;">Kembali</a>
                <button type="submit" class="btn btn-submit">Update</button>
            </div>
        </form>
    </div>

</body>
</html>
