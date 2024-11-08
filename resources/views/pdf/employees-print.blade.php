<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Pegawai</title>
    <style>
        @media print {
            /* Gaya khusus untuk print */
            @page {
                size: landscape;
                margin: 1cm;
            }
        }
        
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        th, td {
            border: 1px solid #000;
            padding: 4px;
            text-align: left;
        }
        
        th {
            background-color: #f0f0f0;
        }
        
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Pastikan background tetap tercetak */
        th {
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
    </style>
    <script>
        // Script untuk otomatis memunculkan dialog print
        window.onload = function() {
            window.print();
        }
    </script>
</head>
<body>
    <div class="header">
        <h2>Data Pegawai</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Alamat</th>
                <th>Tgl Lahir</th>
                <th>L/P</th>
                <th>Gol</th>
                <th>Eselon</th>
                <th>Jabatan</th>
                <th>Tempat Tugas</th>
                <th>Agama</th>
                <th>Unit</th>
                <th>No. IIP</th>
                <th>NPWP</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $index => $employee)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $employee->nip }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->birth_place }}</td>
                <td>{{ $employee->address }}</td>
                <td>{{ $employee->birth_date?->format('d-m-Y') }}</td>
                <td>{{ $employee->gender }}</td>
                <td>{{ $employee->ranks?->name }}</td>
                <td>{{ $employee->eselon?->name }}</td>
                <td>{{ $employee->jabatan?->name }}</td>
                <td>{{ $employee->work_location?->name }}</td>
                <td>{{ $employee->religion }}</td>
                <td>{{ $employee->units?->name }}</td>
                <td></td>
                <td>{{ $employee->npwp }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>