<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            text-align:center;
        }

        table td, table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table tr:nth-child(even){background-color: #f2f2f2;}

        table tr:hover {background-color: #ddd;}

        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: rgb(0, 121, 190);
            color: white;
        }
    </style>
</head>
<body>
    <center><h2>Data Nilai Penginapan</h2></center>
    <hr>
    <table>
        <tr>
            <th>Penginapan</th>
            <th>Harga Sewa</th>
            <th>Lokasi</th>
            <th>Fasilitas</th>
            <th>Kebersihan</th>
            <th>Keamanan</th>
            <th>Total</th>
            <th>Ranking</th>
        </tr>
        <tbody>
        @foreach ($ranks as $rank)
            <tr>
                <td>{{ $rank->villa->name }}</td>
                <td>{{ $rank->price_result }}</td>
                <td>{{ $rank->location_result }}</td>
                <td>{{ $rank->facility_result }}</td>
                <td>{{ $rank->hygiene_result }}</td>
                <td>{{ $rank->security_result }}</td>
                <td>{{ $rank->total }}</td>
                <td>{{ $loop->iteration }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
