<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Pdf</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h2 class="text-center p-3 mb-2 rounded-lg">Data Menu</h2>
    <table class="table table-bordered border-info">
        <thead class="thead-dark">
            <tr class="text-center">
                <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">No Telepon</th>
            <th scope="col">Alamat</th>
    
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggan as $p)
            <tr class="text-center">
                <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->no_telepon }}</td>
                <td>{{ $p->alamat }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

</body>

</html>