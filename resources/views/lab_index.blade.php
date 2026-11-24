<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direktori & Inventaris Laboratorium Komputer</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f4f6f9; margin: 0; padding: 30px; color: #333; }
        .container { max-width: 960px; margin: auto; background: #fff; padding: 25px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        h1 { color: #2c3e50; margin-top: 0; border-bottom: 3px solid #3498db; padding-bottom: 10px; }
        .nav-filter { margin-bottom: 20px; display: flex; gap: 10px; }
        .nav-filter a { padding: 8px 14px; text-decoration: none; border-radius: 6px; background: #ecf0f1; color: #2c3e50; font-weight: bold; font-size: 14px; }
        .nav-filter a.active, .nav-filter a:hover { background: #3498db; color: white; }
        .info-box { background: #eef6ff; border-left: 4px solid #3498db; padding: 12px 15px; margin-bottom: 20px; border-radius: 4px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #2c3e50; color: white; }
        tr:hover { background-color: #f9f9f9; }
        .badge { padding: 5px 10px; border-radius: 12px; font-size: 12px; font-weight: bold; color: white; }
        .badge-tersedia { background-color: #27ae60; }
        .badge-maintenance { background-color: #e74c3c; }
        .btn-detail { background-color: #2980b9; color: white; padding: 6px 12px; text-decoration: none; border-radius: 5px; font-size: 13px; }
        .btn-detail:hover { background-color: #1f6391; }
    </style>
</head>
<body>
<div class="container">
    <h1>Direktori & Inventaris Laboratorium Komputer</h1>

    <div class="nav-filter">
        <a href="{{ url('/laboratorium') }}" class="{{ $filter_aktif === 'Semua' ? 'active' : '' }}">Semua Lab</a>
        <a href="{{ url('/laboratorium/status/Tersedia') }}" class="{{ $filter_aktif === 'Tersedia' ? 'active' : '' }}">Tersedia</a>
        <a href="{{ url('/laboratorium/status/Maintenance') }}" class="{{ $filter_aktif === 'Sedang Maintenance' ? 'active' : '' }}">Maintenance</a>
    </div>

    <div class="info-box">
        Filter Aktif: <b>{{ $filter_aktif }}</b> | Menampilkan <b>{{ count($daftar_lab) }} Ruang Lab</b> dengan total akumulasi <b>{{ $total_pc }} Unit PC</b>.
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Lab</th>
                <th>Nama Laboratorium</th>
                <th>Penanggung Jawab</th>
                <th>Kapasitas PC</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($daftar_lab as $lab)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><b>{{ $lab['kode_lab'] }}</b></td>
                    <td>{{ $lab['nama_lab'] }}</td>
                    <td>{{ $lab['penanggung_jawab'] }}</td>
                    <td>{{ $lab['kapasitas_pc'] }} Unit</td>
                    <td>
                        @if ($lab['status'] === 'Tersedia')
                            <span class="badge badge-tersedia">Tersedia</span>
                        @else
                            <span class="badge badge-maintenance">Sedang Maintenance</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('/laboratorium/detail/' . $lab['kode_lab']) }}" class="btn-detail">Lihat Detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align:center;">Tidak ada data laboratorium untuk status ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>