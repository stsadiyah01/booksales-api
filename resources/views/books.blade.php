<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
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
    <h1>Hallo Readers, Selamat Datang di Toko Kami</h1>
    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Foto Cover</th>
                <th>Genre ID</th>
                <th>Author ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $item )
                <tr>
                    <td>{{ $item['title'] }}</td>
                    <td>{{ $item['description'] }}</td>
                    <td>{{ $item['price'] }}</td>
                    <td>{{ $item['stok'] }}</td>
                    <td>{{ $item['cover_photo'] }}</td>
                    <td>{{ $item['genre_id'] }}</td>
                    <td>{{ $item['author_id'] }}</td>
                </tr>
            
            @endforeach
        </tbody>
    </table>

   
</body>
</html>