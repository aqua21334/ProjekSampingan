
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit PNBP</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('https://images.unsplash.com/photo-1581091012184-68e01a4a9468?auto=format&fit=crop&w=1600&q=80') no-repeat center center/cover;
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.5);
            z-index: 0;
        }

        .form-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 700px;
            background: rgba(255,255,255,0.95);
            border-radius: 20px;
            padding: 45px 35px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
            animation: fadeInUp 1s ease forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        @keyframes fadeInUp {
            to { opacity: 1; transform: translateY(0); }
        }

        h1 {
            text-align: center;
            font-size: 36px;
            color: #060E7E;
            margin-bottom: 35px;
        }

        .form-group { margin-bottom: 20px; }

        label {
            display: block;
            font-size: 16px;
            margin-bottom: 6px;
            color: #333;
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            border-radius: 12px;
            border: 1px solid #ccc;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        input:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.6);
            outline: none;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }

        .btn {
            width: 48%;
            padding: 13px 0;
            font-size: 16px;
            font-weight: 600;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            color: white;
            text-align: center;
        }

        .btn-back {
            background: linear-gradient(135deg, #7D81BE, #5F3DC4);
            box-shadow: 0 4px 12px rgba(125,129,190,0.6);
            text-decoration: none;
            line-height: 48px;
        }

        .btn-back:hover {
            transform: scale(1.05);
            opacity: 0.9;
        }

        .btn-submit {
            background: linear-gradient(135deg, #43cea2, #185a9d);
            box-shadow: 0 4px 12px rgba(67,206,162,0.6);
        }

        .btn-submit:hover {
            transform: scale(1.05);
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            .form-actions { flex-direction: column; gap: 15px; }
            .btn { width: 100%; }
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h1>Edit PNBP</h1>
        <form action="{{ route('pnpb.update', $pnpb->kode_billing) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="kode_billing">Kode Billing</label>
                <input type="text" id="kode_billing" name="kode_billing" value="{{ old('kode_billing', $pnpb->kode_billing) }}" required>
            </div>

            <div class="form-group">
                <label for="pelanggan">Pelanggan</label>
                <input type="text" id="pelanggan" name="pelanggan" value="{{ old('pelanggan', $pnpb->pelanggan) }}" required>
            </div>

            <div class="form-group">
                <label for="rupiah">Rupiah</label>
                <input type="number" id="rupiah" name="rupiah" value="{{ old('rupiah', $pnpb->rupiah) }}" step="0.01" required>
            </div>

            <div class="form-actions">
                <a href="{{ route('pnpb.index') }}" class="btn btn-back">Kembali</a>
                <button type="submit" class="btn btn-submit">Update</button>
            </div>
        </form>
    </div>

</body>
</html>
