<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Peralatan</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
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
    background: url('https://images.unsplash.com/photo-1581091012184-68e01a4a9468?auto=format&fit=crop&w=1600&q=80') no-repeat center center/cover;
    position: relative;
}

body::after {
    content: '';
    position: absolute;
    top:0; left:0; width:100%; height:100%;
    background: rgba(0,0,0,0.4);
    z-index: 1;
}

.form-container {
    position: relative;
    z-index: 2;
    width: 100%;
    max-width: 700px;
    background: rgba(255,255,255,0.95);
    border-radius: 20px;
    padding: 40px 30px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.3);
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

input, select {
    width: 100%;
    padding: 14px 15px;
    border-radius: 12px;
    border: 1px solid #ccc;
    font-size: 15px;
    transition: all 0.3s ease;
    background: #f1f1f1;
}

input:focus, select:focus {
    outline: none;
    border-color: #060E7E;
    box-shadow: 0 0 8px rgba(6,14,126,0.5);
    background: #fff;
}

.form-actions {
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
    gap: 20px;
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
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    text-align: center;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    text-decoration: none;
}

.btn-back {
    background: linear-gradient(135deg, #7D81BE, #5f639b);
}

.btn-back:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 20px rgba(0,0,0,0.3);
}

.btn-submit {
    background: linear-gradient(135deg, #4CAF50, #2e7d32);
}

.btn-submit:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 20px rgba(0,0,0,0.3);
}

@media(max-width:768px){
    .form-actions {
        flex-direction: column;
    }
}
</style>
</head>
<body>

<div class="form-container">
    <h1>Edit Peralatan</h1>
    <form action="{{ route('peralatan.update', $peralatan->kode_bmn) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="kode_bmn">Kode BMN</label>
            <input type="text" id="kode_bmn" name="kode_bmn" value="{{ old('kode_bmn', $peralatan->kode_bmn) }}" required>
        </div>

        <div class="form-group">
            <label for="nama_peralatan">Nama Peralatan</label>
            <input type="text" id="nama_peralatan" name="nama_peralatan" value="{{ old('nama_peralatan', $peralatan->nama_peralatan) }}" required>
        </div>

        <div class="form-group">
            <label for="tanggal_kalibrasi">Tanggal Kalibrasi</label>
            <input type="date" id="tanggal_kalibrasi" name="tanggal_kalibrasi" value="{{ old('tanggal_kalibrasi', $peralatan->tanggal_kalibrasi) }}">
        </div>

        <div class="form-group">
            <label for="status_kalibrasi">Status Kalibrasi</label>
            <select id="status_kalibrasi" name="status_kalibrasi" required>
                <option value="">Pilih Status</option>
                <option value="Sudah" {{ old('status_kalibrasi', $peralatan->status_kalibrasi) == 'Sudah' ? 'selected' : '' }}>Sudah</option>
                <option value="Belum" {{ old('status_kalibrasi', $peralatan->status_kalibrasi) == 'Belum' ? 'selected' : '' }}>Belum</option>
            </select>
        </div>

        <div class="form-actions">
            <a href="{{ route('peralatan.index') }}" class="btn btn-back">Kembali</a>
            <button type="submit" class="btn btn-submit">Update</button>
        </div>
    </form>
</div>

</body>
</html>
