<table class="table">
    <thead class="thead-dark" id="tablePelanggan">
        <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">No Telepon</th>
            <th scope="col">Alamat</th>
            <th scope="col">Tools</th>

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
            <td>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalFormPelanggan" data-mode="edit" data-id="{{ $p->id }}" data-name="{{ $p->nama }}" data-kabehan="{{ json_encode($p) }}">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <form action="{{ route('pelanggan.destroy',$p->id) }}" method="post" style="display:inline" class="form-delete">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger btn-delete" data-id='$p->id'><i class="bi bi-trash"></i></button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>