
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Personil</title>
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
        input {
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
        <h1>Edit Personil</h1>
        <form action="{{ route('personil.update', $personil->nip) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" id="nip" name="nip" value="{{ old('nip', $personil->nip) }}" required>
            </div>

            <div class="form-group">
                <label for="nama_personil">Nama</label>
                <input type="text" id="nama_personil" name="nama_personil" value="{{ old('nama_personil', $personil->nama_personil) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $personil->email) }}" required>
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan" value="{{ old('jabatan', $personil->jabatan) }}" required>
            </div>

            <div class="form-group">
                <label for="no_hp">No HP</label>
                <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', $personil->no_hp) }}" required>
            </div>

            <div class="form-actions">
                <a href="{{ route('personil.index') }}" class="btn btn-back" style="text-align:center;line-height:50px;text-decoration:none;">Kembali</a>
                <button type="submit" class="btn btn-submit">Update</button>
            </div>
        </form>
    </div>

</body>
</html>
