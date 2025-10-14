<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authors</title>
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
    <h1>Hallo Readers, Kenalan Yuk Sama Para Penulis Buku Ternama</h1>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Photo</th>
                <th>Bio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $item )
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['photo'] }}</td>
                    <td>{{ $item['bio'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

   
</body>
</html>