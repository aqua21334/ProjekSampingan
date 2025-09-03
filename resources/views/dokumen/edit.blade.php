@extends('layouts.app')

@section('content')
<div style="font-family: 'Konkhmer Sleokchher', sans-serif; background: #f0f0f0; display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div class="form-container" style="width: 1060px; background: rgba(255, 255, 255, 0.9); border-radius: 10px; padding: 40px; box-shadow: 0px 4px 6px rgba(0,0,0,0.2);">
        <h1 style="text-align: center; font-size: 40px; margin-bottom: 30px;">Edit Dokumen</h1>
        @if ($errors->any())
            <div style="background: #ffeaea; color: #d32f2f; padding: 16px; border-radius: 8px; margin-bottom: 24px;">
                <ul style="margin-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('dokumen.update', $dokumen->id_dokumen) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="id_dokumen" style="display: block; font-size: 20px; margin-bottom: 8px;">ID Dokumen</label>
                <input type="text" id="id_dokumen" name="id_dokumen" value="{{ old('id_dokumen', $dokumen->id_dokumen) }}" required maxlength="20" style="width: 100%; max-width: 540px; height: 44px; border-radius: 8px; border: none; background: #D9D9D9; padding: 10px; font-size: 16px;">
            </div>
            <div class="form-group" style="margin-bottom: 20px; position:relative; max-width:540px;">
                <label for="jenis_dokumen" style="display: block; font-size: 20px; margin-bottom: 8px;">Jenis Dokumen</label>
                <div style="position:relative;">
                    <select id="jenis_dokumen" name="jenis_dokumen" required style="width: 100%; height: 44px; border-radius: 8px; border: none; background: #D9D9D9; padding: 10px; font-size: 16px; appearance: none;">
                        <option value="Panduan Mutu" {{ $dokumen->jenis_dokumen == 'Panduan Mutu' ? 'selected' : '' }}>Panduan Mutu</option>
                        <option value="Prosedur" {{ $dokumen->jenis_dokumen == 'Prosedur' ? 'selected' : '' }}>Prosedur</option>
                        <option value="Instruksi Kerja" {{ $dokumen->jenis_dokumen == 'Instruksi Kerja' ? 'selected' : '' }}>Instruksi Kerja</option>
                        <option value="Formulir" {{ $dokumen->jenis_dokumen == 'Formulir' ? 'selected' : '' }}>Formulir</option>
                    </select>
                    <span style="position:absolute; right:18px; top:50%; transform:translateY(-50%); pointer-events:none;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </span>
                </div>
            </div>
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="judul" style="display: block; font-size: 20px; margin-bottom: 8px;">Judul</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul', $dokumen->judul) }}" required maxlength="150" style="width: 100%; max-width: 540px; height: 44px; border-radius: 8px; border: none; background: #D9D9D9; padding: 10px; font-size: 16px;">
            </div>
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="file" style="display: block; font-size: 20px; margin-bottom: 8px;">File PDF (kosongkan jika tidak ganti)</label>
                <input type="file" id="file" name="file" accept="application/pdf" style="width: 100%; max-width: 540px; height: 44px; border-radius: 8px; border: none; background: #D9D9D9; padding: 10px; font-size: 16px;">
                @if($dokumen->file_url)
                    <p style="margin-top: 8px; color: #007bff;">File saat ini: <a href="{{ asset('storage/' . $dokumen->file_url) }}" target="_blank" style="color:#007bff; text-decoration:underline;">Lihat PDF</a></p>
                @endif
            </div>
            <div class="form-actions" style="display: flex; justify-content: space-between; margin-top: 30px;">
                <a href="{{ route('dokumen.index') }}" class="btn btn-back" style="text-align:center;line-height:50px;text-decoration:none; background: #7D81BE; color: white; width: 160px; height: 50px; border-radius: 8px; border: none; font-size: 18px; font-weight: bold; cursor: pointer;">Kembali</a>
                <button type="submit" class="btn btn-submit" style="width: 160px; height: 50px; border-radius: 8px; border: none; font-size: 18px; font-weight: bold; background: #4CAF50; color: white; cursor: pointer;">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
