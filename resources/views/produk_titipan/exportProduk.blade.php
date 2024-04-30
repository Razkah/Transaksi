<table>
    <thead>
        <tr class="text-center">
            <th>No</th>
            <th>Nama Produk</th>
            <th>Nama Suplier</th>
            <th>Harga beli</th>
            <th>Harga Jual</th>
            <th>Stock</th>
            <th>Keterangan</th>
            <th>Created At</th>
            <th>Updated At</th> 
        </tr>
    </thead>
    <tbody>
        @foreach($produk_titipan as $p)
        <tr>
            <td class="text-center">{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $p->nama_produk }}</td>
            <td>{{ $p->nama_suplier }}</td>
            <td>{{ $p->harga_beli }}</td>
            <td>{{ $p->harga_jual }}</td>
            <td>{{ $p->stock }}</td>
            <td>{{ $p->keterangan }}</td>
            <td>{{ $p->created_at }}</td>
            <td>{{ $p->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
