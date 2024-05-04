<table>
    <thead>
        <tr class="table">
            <th class="text-center" scope="col">No</th>
            <th class="text-center" scope="col">Nama Menu</th>
            <th class="text-center" scope="col">Jumlah</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($stock as $s)
        <tr class="text-center">
            <td class="text-center">{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td class="text-center">{{ $s->menu->nama_menu }}</td>
            <td class="text-center">{{ $s->jumlah }}</td>
            <td>{{ $s->created_at }}</td>
            <td>{{ $s->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
