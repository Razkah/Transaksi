<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Menu</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Jenis ID</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($menu as $m)
        <tr>
            <td>{{ $m->id }}</td>
            <td>{{ $m->nama_menu }}</td>
            <td>{{ $m->harga }}</td>
            <td>{{ $m->deskripsi }}</td>
            <td>{{ $m->jenis_id }}</td>
            <td>{{ $m->created_at }}</td>
            <td>{{ $m->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
