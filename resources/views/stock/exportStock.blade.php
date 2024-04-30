<table>
    <thead>
        <tr class="table">
            <th scope="col">No</th>
            <th scope="col">Nama Menu</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($stock as $s)
        <tr class="text-center">
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $s->menu->nama_menu }}</td>
            <td>{{ $s->jumlah }}</td>
            <td>{{ $s->created_at }}</td>
            <td>{{ $s->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
