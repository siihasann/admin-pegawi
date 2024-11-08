!-- resources/views/pdf/employees-print.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Pegawai</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px; /* Ukuran font dikecilkan */
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            padding: 10px;
        }

        .header h2 {
            margin: 0;
            font-size: 14px;
        }

        .date {
            text-align: right;
            margin-bottom: 10px;
            font-size: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 0.5px solid #000;
            padding: 4px 3px; /* Padding dikurangi */
            font-size: 12px; /* Ukuran font table lebih kecil */
            vertical-align: top;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Atur lebar kolom spesifik */
        .col-no { width: 3%; }
        .col-nip { width: 10%; }
        .col-nama { width: 12%; }
        .col-tempat-lahir { width: 8%; }
        .col-alamat { width: 15%; }
        .col-tanggal { width: 7%; }
        .col-gender { width: 3%; }
        .col-golongan { width: 5%; }
        .col-eselon { width: 5%; }
        .col-jabatan { width: 12%; }
        .col-tempat-tugas { width: 7%; }
        .col-agama { width: 5%; }
        .col-unit { width: 8%; }
    </style>
</head>
<body>
    <div class="header">
        <h2>DAFTAR PEGAWAI</h2>
        <span>Per Tanggal: {{ $date }}</span>
    </div>

    <table>
        <thead>
            <tr>
                <th class="col-no">No</th>
                <th class="col-nip">NIP</th>
                <th class="col-nama">Nama</th>
                <th class="col-tempat-lahir">Tempat Lahir</th>
                <th class="col-alamat">Alamat</th>
                <th class="col-tanggal">Tgl Lahir</th>
                <th class="col-gender">L/P</th>
                <th class="col-golongan">Gol</th>
                <th class="col-eselon">Eselon</th>
                <th class="col-jabatan">Jabatan</th>
                <th class="col-tempat-tugas">Tempat Tugas</th>
                <th class="col-agama">Agama</th>
                <th class="col-unit">Unit Kerja</th>
                <th class="col-nip">No. HP</th>
                <th class="col-nip">NPWP</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $index => $employee)
            <tr>
                <td style="text-align: center">{{ $index + 1 }}</td>
                <td>{{ $employee->nip }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->birth_place }}</td>
                <td>{{ $employee->address }}</td>
                <td>{{ $employee->birth_date ? $employee->birth_date->format('d-m-Y') : '' }}</td>
                <td style="text-align: center">{{ $employee->gender }}</td>
                <td>{{ $employee->ranks?->name }}</td>
                <td>{{ $employee->eselon?->name }}</td>
                <td>{{ $employee->jabatan?->name }}</td>
                <td>{{ $employee->work_locations?->name }}</td>
                <td>{{ $employee->religion }}</td>
                <td>{{ $employee->units?->name }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->npwp }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>