<table class="table">
    <thead class="thead-dark">
        <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Nama Menu</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Tools</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($stock as $s)
        <tr class="text-center">
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $s->menu->nama_menu }}</td>
            <td>{{ $s->jumlah }}</td>
            <td>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalFormStock" data-mode="edit" data-id="{{ $s->id }}" data-name="{{ $s->menu_id }}" data-kabehan="{{ json_encode($s) }}">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <form action="{{ route('stock.destroy',$s->id) }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-delete" data-id='$s->id'><i class="bi bi-trash"></i></button>
                    
                </form>

            </td>
        </tr>


        @endforeach

    </tbody>
</table>