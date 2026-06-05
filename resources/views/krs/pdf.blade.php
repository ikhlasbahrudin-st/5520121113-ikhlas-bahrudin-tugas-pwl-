<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>KRS - {{ $kr->mahasiswa->nim }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; color: #333; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 3px double #333; padding-bottom: 15px; }
        .header h2 { margin: 0; font-size: 18px; text-transform: uppercase; letter-spacing: 2px; }
        .header h3 { margin: 5px 0; font-size: 14px; color: #555; }
        .header p { margin: 2px 0; font-size: 11px; color: #777; }
        .info-table { width: 100%; margin-bottom: 20px; }
        .info-table td { padding: 3px 8px; }
        .info-table .label { font-weight: bold; width: 150px; }
        table.main-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        table.main-table th, table.main-table td { border: 1px solid #333; padding: 8px; text-align: left; }
        table.main-table th { background-color: #f0f0f0; font-weight: bold; text-align: center; }
        table.main-table td.center { text-align: center; }
        .total-row { font-weight: bold; background-color: #f5f5f5; }
        .footer { margin-top: 40px; text-align: right; }
        .footer .ttd { margin-top: 60px; font-weight: bold; text-decoration: underline; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Kartu Rencana Studi (KRS)</h2>
        <h3>Sistem Informasi Akademik</h3>
        <p>Tahun Akademik {{ $kr->tahun_akademik }} - Semester {{ $kr->semester }}</p>
    </div>

    <table class="info-table">
        <tr><td class="label">NIM</td><td>: {{ $kr->mahasiswa->nim }}</td></tr>
        <tr><td class="label">Nama Mahasiswa</td><td>: {{ $kr->mahasiswa->nama_mahasiswa }}</td></tr>
        <tr><td class="label">Program Studi</td><td>: {{ $kr->mahasiswa->prodi }}</td></tr>
        <tr><td class="label">Semester</td><td>: {{ $kr->semester }}</td></tr>
    </table>

    <table class="main-table">
        <thead>
            <tr>
                <th width="40">No</th>
                <th width="80">Kode MK</th>
                <th>Nama Mata Kuliah</th>
                <th width="50">SKS</th>
                <th width="80">Semester</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allKrs as $index => $item)
            <tr>
                <td class="center">{{ $index + 1 }}</td>
                <td class="center">{{ $item->mataKuliah->kode_mk }}</td>
                <td>{{ $item->mataKuliah->nama_mk }}</td>
                <td class="center">{{ $item->mataKuliah->sks }}</td>
                <td class="center">{{ $item->mataKuliah->semester }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td colspan="3" style="text-align: right;">Total SKS</td>
                <td class="center">{{ $totalSks }}</td>
                <td></td>
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        <p>Tanggal: {{ date('d F Y') }}</p>
        <p>Dosen Pembimbing Akademik</p>
        <p class="ttd">____________________</p>
        <p>NIP. ____________________</p>
    </div>
</body>
</html>
