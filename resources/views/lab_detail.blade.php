<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail {{ $lab['nama_lab'] }}</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f4f6f9; padding: 40px; }
        .card { max-width: 620px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        h2 { color: #2c3e50; margin-top: 0; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        .row { margin-bottom: 12px; line-height: 1.6; }
        .label { font-weight: bold; width: 170px; display: inline-block; color: #555; }
        .fasilitas-box { background: #f8f9fa; padding: 15px; border-radius: 6px; border: 1px solid #e9ecef; margin-top: 15px; line-height: 1.6; }
        .btn-kembali { display: inline-block; margin-top: 20px; background: #2c3e50; color: white; padding: 9px 16px; text-decoration: none; border-radius: 5px; }
        .btn-kembali:hover { background: #1a252f; }
    </style>
</head>
<body>
<div class="card">
    <h2>Detail Ruang Laboratorium</h2>
    <div class="row"><span class="label">Kode Laboratorium</span>: <b>{{ $lab['kode_lab'] }}</b></div>
    <div class="row"><span class="label">Nama Laboratorium</span>: {{ $lab['nama_lab'] }}</div>
    <div class="row"><span class="label">Penanggung Jawab</span>: {{ $lab['penanggung_jawab'] }}</div>
    <div class="row"><span class="label">Kapasitas Perangkat</span>: {{ $lab['kapasitas_pc'] }} Unit PC</div>
    <div class="row"><span class="label">Status Kesiapan</span>: <b>{{ $lab['status'] }}</b></div>
    <div class="fasilitas-box">
        <b>Fasilitas & Spesifikasi Perangkat:</b><br>
        {{ $lab['fasilitas'] }}
    </div>
    <a href="{{ url('/laboratorium') }}" class="btn-kembali">&laquo; Kembali ke Direktori Lab</a>
</div>
</body>
</html>