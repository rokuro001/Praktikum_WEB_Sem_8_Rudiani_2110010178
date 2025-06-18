<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Data Jabatan</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center">Laporan Data Lokasi</h2>
    <hr>
    <table>
        <tr>
            <th>NO.</th>
            <th>NAMA LOKASI</th>
        </tr>
        @php
        $no = 1;
        @endphp
        @foreach ($lokasi as $lk)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $lk->nama_lokasi }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
