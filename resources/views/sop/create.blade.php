@extends('layouts.app')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah SOP</title>
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
        <h1>Tambahkan SOP</h1>
        <form action="/sop" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="kode_sop">Kode SOP</label>
                <input type="text" id="kode_sop" name="kode_sop" required>
            </div>

            <div class="form-group">
                <label for="nama_sop">Nama SOP</label>
                <input type="text" id="nama_sop" name="nama_sop" required>
            </div>

            <div class="form-group">
                <label for="deskripsi_sop">File Deskripsi SOP</label>
                <input type="file" id="deskripsi_sop" name="deskripsi_sop" accept=".pdf,.doc,.docx">
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-back" onclick="history.back()">Kembali</button>
                <button type="submit" class="btn btn-submit">Simpan</button>
            </div>
        </form>
    </div>

</body>
</html>
     
  
