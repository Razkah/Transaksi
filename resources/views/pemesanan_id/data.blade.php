<table class="table">
    <thead class="thead-dark">
        <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Meja Id</th>
            <th scope="col">Tanggal Pemesanan</th>
            <th scope="col">Jam Mulai</th>
            <th scope="col">Jam Selesai</th>
            <th scope="col">Nama Pemesan</th>
            <th scope="col">Jumlah Pelanggan</th>
            <th scope="col">Tools</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($pemesanan_id as $p)
        <tr class="text-center">
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $p->meja_id }}</td>
            <td>{{ $p->tanggal_pemesanan }}</td>
            <td>{{ $p->jam_mulai }}</td>
            <td>{{ $p->jam_selesai }}</td>
            <td>{{ $p->nama_pemesan }}</td>
            <td>{{ $p->jumlah_pelanggan }}</td>
            <td>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalFormPemesanan_id" data-mode="edit" data-id="{{ $p->id }}" data-name="{{ $p->meja_id }}" data-kabehan="{{ json_encode($p) }}">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <form action="{{ route('pemesanan_id.destroy',$p->id) }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-delete"><i class="bi bi-trash"></i></button>
                </form>

            </td>
        </tr>


        @endforeach

    </tbody>
</table>