<table class="table">
    <thead class="thead-dark">
        <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Kategori</th>
            <th scope="col">Tools</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($jenis as $j)
        <tr class="text-center">
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $j->name }}</td>
            <td>{{ $j->Category->name }}</td>
            <td>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalFormJenis" data-mode="edit" data-id="{{ $j->id }}" data-name="{{ $j->name }}" data-kabehan="{{ json_encode($j) }}">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <form action="{{ route('jenis.destroy',$j->id) }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-delete"><i class="bi bi-trash"></i></button>
                </form>

            </td>
        </tr>


        @endforeach

    </tbody>
</table>