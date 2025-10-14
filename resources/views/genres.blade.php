<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genres</title>
    <style>
        table{
            border-collapse: collapse;
            width: 80%;
            margin-top:10px;
            margin:auto;
        }
        th,td{
            border: 1px solid #0a0a0aff;
            padding: 8px;
        }
        th{
            background-color: goldenrod;
            color: white;
            text-align: center;
        }
        h1{
            text-align: center;
        }
    </style>

</head>
<body>
    <h1>Hallo Readers, Penasaran Ada Genre Apa Saja? Yuk Simak di Bawah Ini!</h1>
    <table>
        <thead>
            <tr>
                <th>Nama Genre</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($genres as $item )
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['description'] }}</td>
                </tr>
            
            @endforeach
        </tbody>
    </table>

   
</body>
</html>