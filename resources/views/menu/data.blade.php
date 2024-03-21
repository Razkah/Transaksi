<table class="table">
    <thead class="thead-dark">
        <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Harga</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Jenis</th>
            <th scope="col">Tools</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($menu as $m)
        <tr class="text-center">
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $m->nama_menu }}</td>
            <td>{{ $m->harga }}</td>
            <td>{{ $m->deskripsi }}</td>
            <td>{{ $m->jenis->name }}</td>
            <td>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalFormMenu" data-mode="edit" data-id="{{ $m->id }}" data-name="{{ $m->nama_menu }}" data-kabehan="{{ json_encode($m) }}">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <form action="{{ route('menu.destroy',$m->id) }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger btn-delete"><i class="bi bi-trash"></i></button>
                </form>

            </td>
        </tr>


        @endforeach

    </tbody>
</table>