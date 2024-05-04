<table>
    <thead>
        <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>

        </tr>
    </thead>
    <tbody>
        @foreach($category as $c)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $c->name }}</td>
            <td>{{ $c->created_at }}</td>
            <td>{{ $c->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>