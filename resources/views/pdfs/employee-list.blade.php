<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pegawai</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th, .table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    .table th {
        background-color: #f2f2f2;
    }

    .table tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    </style>
</head>
<body>
    <div class="header">
        <h2>Daftar Pegawai</h2>
        <p>{{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
    </div>
    
    <table class="table">
        <thead>
            <tr>
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
                <th>Unit Kerja</th>
                <th>No. HP</th>
                <th>NPWP</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->nip }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->birth_place }}</td>
                <td>{{ $employee->address }}</td>
                <td>{{ $employee->birth_date }}</td>
                <td>{{ $employee->gender }}</td>
                <td>{{ $employee->ranks->name ?? '-' }}</td>
                <td>{{ $employee->eselon->name ?? '-' }}</td>
                <td>{{ $employee->jabatan->name ?? '-' }}</td>
                <td>{{ $employee->workLocation->name ?? '-' }}</td>
                <td>{{ $employee->religion }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->npwp }}</td>
                <td>{{ $employee->units->name ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
