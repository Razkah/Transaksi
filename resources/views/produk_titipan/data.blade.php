<table class="table" id="tabel">
    <thead >
        <tr class="text-center">
            <th>No</th>
            <th>Nama Produk</th>
            <th>Nama Suplier</th>
            <th>Harga beli</th>
            <th>Harga Jual</th>
            <th>Stock</th>
            <th>Keterangan</th>
            <th>Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produk_titipan as $p)
        <tr class="text-center">
            <td class="text-center">{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $p->nama_produk }}</td>
            <td>{{ $p->nama_suplier }}</td>
            <td>{{ $p->harga_beli }}</td>
            <td>{{ $p->harga_jual }}</td>
            <td>{{ $p->stock }}</td>
            <td>{{ $p->keterangan }}</td>
            <td class="d-flex text-center">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalFormProduk" data-mode="edit" data-id="{{ $p->id }}" data-name="{{ $p->nama_produk }}" data-kabehan="{{ json_encode($p) }}">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <form action="{{ route('produk_titipan.destroy',$p->id) }}" method="post" style="display:inline" class="px-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-delete" data-id='$p->id'><i class="bi bi-trash"></i></button>
                </form>

            </td>
        </tr>


        @endforeach

    </tbody>
</table>