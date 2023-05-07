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
    <center><h2>Data Nilai Pelamar</h2></center>
    <hr>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Pendidikan Terakhir</th>
            <th>Jurusan</th>
            <th>Pengalaman</th>
            <th>Wawancara</th>
        </tr>
        <tbody>
        @foreach ($results as $result)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $result->applicant->name }}</td>
                <td>{{ $result->education_score }}</td>
                <td>{{ $result->major_score }}</td>
                <td>{{ $result->experience_score }}</td>
                <td>{{ $result->interview_score }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>