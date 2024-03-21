<div class="modal fade" id="modalFormProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    {{-- <span aria-hidden="c">&times;</span> --}}
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="produk_titipan" class="form">
                    @csrf
                    <div id="method"></div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_Produk" name="nama_produk">
                    </div>
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Suplier</label>
                        <input type="text" class="form-control" id="nama_suplier" name="nama_suplier">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Harga Beli</label>
                        <input type="number" class="form-control" id="harga_beli" name="harga_beli">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Harga Jual</label>
                        <input type="number" class="form-control" id="harga_jual" name="harga_jual" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Stock</label>
                        <input type="text-area" class="form-control" id="stock" name="stock">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Keterangan</label>
                        <input type="text-area" class="form-control" id="keterangan" name="keterangan">
                    </div>
                    

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>