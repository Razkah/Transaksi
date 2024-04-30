<table>
    <thead>
        <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Kategori</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>

        </tr>
    </thead>
    <tbody>
        @foreach($jenis as $j)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $j->name }}</td>
            <td>{{ $j->category_id}}</td>
            <td>{{ $j->created_at }}</td>
            <td>{{ $j->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>