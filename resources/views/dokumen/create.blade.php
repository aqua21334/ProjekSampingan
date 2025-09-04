@extends('layouts.app')

@section('content')
<div style="min-height: 100vh; display:flex; justify-content:center; align-items:center; background:#f0f0f0; padding:20px;">
    <div style="width:100%; max-width:700px; background: rgba(255,255,255,0.95); border-radius:20px; padding:40px 30px; box-shadow: 0 20px 40px rgba(0,0,0,0.15); animation: fadeIn 0.8s ease-in-out;">
        <h1 style="text-align:center; font-size:36px; color:#060E7E; margin-bottom:30px;">Tambah Dokumen</h1>

        @if ($errors->any())
            <div style="background:#ffeaea; color:#d32f2f; padding:16px; border-radius:8px; margin-bottom:24px;">
                <ul style="margin-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dokumen.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group" style="margin-bottom:20px;">
                <label for="id_dokumen" style="display:block; font-size:16px; margin-bottom:6px; color:#333; font-weight:500;">ID Dokumen</label>
                <input type="text" id="id_dokumen" name="id_dokumen" value="{{ old('id_dokumen') }}" required maxlength="20" style="width:100%; padding:14px 15px; border-radius:12px; border:1px solid #ccc; font-size:15px; background:#f1f1f1; transition: all 0.3s;">
            </div>

            <div class="form-group" style="margin-bottom:20px;">
                <label for="jenis_dokumen" style="display:block; font-size:16px; margin-bottom:6px; color:#333; font-weight:500;">Jenis Dokumen</label>
                <select id="jenis_dokumen" name="jenis_dokumen" required style="width:100%; padding:14px 15px; border-radius:12px; border:1px solid #ccc; font-size:15px; background:#f1f1f1; appearance:none; transition: all 0.3s;">
                    <option value="" disabled selected>Pilih Jenis Dokumen</option>
                    <option value="Panduan Mutu" {{ old('jenis_dokumen') == 'Panduan Mutu' ? 'selected' : '' }}>Panduan Mutu</option>
                    <option value="Prosedur" {{ old('jenis_dokumen') == 'Prosedur' ? 'selected' : '' }}>Prosedur</option>
                    <option value="Instruksi Kerja" {{ old('jenis_dokumen') == 'Instruksi Kerja' ? 'selected' : '' }}>Instruksi Kerja</option>
                    <option value="Formulir" {{ old('jenis_dokumen') == 'Formulir' ? 'selected' : '' }}>Formulir</option>
                </select>
            </div>

            <div class="form-group" style="margin-bottom:20px;">
                <label for="judul" style="display:block; font-size:16px; margin-bottom:6px; color:#333; font-weight:500;">Judul</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul') }}" required maxlength="150" style="width:100%; padding:14px 15px; border-radius:12px; border:1px solid #ccc; font-size:15px; background:#f1f1f1; transition: all 0.3s;">
            </div>

            <div class="form-group" style="margin-bottom:20px;">
                <label for="file" style="display:block; font-size:16px; margin-bottom:6px; color:#333; font-weight:500;">File PDF</label>
                <input type="file" id="file" name="file" accept="application/pdf" required style="width:100%; padding:14px 15px; border-radius:12px; border:1px solid #ccc; font-size:15px; background:#f1f1f1; transition: all 0.3s;">
            </div>

            <div class="form-actions" style="display:flex; justify-content:space-between; margin-top:30px; gap:20px;">
                <a href="{{ route('dokumen.index') }}" class="btn btn-back" style="flex:1; padding:14px 0; border-radius:12px; border:none; font-size:16px; font-weight:600; background:linear-gradient(135deg, #7D81BE, #5f639b); color:white; cursor:pointer; box-shadow:0 4px 15px rgba(0,0,0,0.2); text-align:center; text-decoration:none;">Kembali</a>
                <button type="submit" class="btn btn-submit" style="flex:1; padding:14px 0; border-radius:12px; border:none; font-size:16px; font-weight:600; background:linear-gradient(135deg, #4CAF50, #2e7d32); color:white; cursor:pointer; box-shadow:0 4px 15px rgba(0,0,0,0.2);">Simpan</button>
            </div>
        </form>
    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #060E7E;
            box-shadow: 0 0 8px rgba(6,14,126,0.5);
            background: #fff;
        }

        .btn-back:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }

        .btn-submit:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }
    </style>
</div>
@endsection
