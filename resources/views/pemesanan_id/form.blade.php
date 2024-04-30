<div class="modal fade" id="modalFormPemesanan_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pemesanan Id</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    {{-- <span aria-hidden="c">&times;</span> --}}
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="pemesanan_id" class="form">
                    @csrf
                    <div id="method"></div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Meja Id</label>
                        <input type="text" class="form-control" id="meja_id" name="meja_id">
                    </div>
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Tanggal Pemesanan</label>
                        <input type="date" class="form-control" id="tanggal_pemesanan" name="tanggal_pemesanan">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Jam Mulai</label>
                        <input type="text" class="form-control" id="jam_mulai" name="jam_mulai">
                    </div>
                    

                    <div class="mb-3">
                        <label for="name" class="form-label">Jam Selesai</label>
                        <input type="text" class="form-control" id="jam_selesai" name="jam_selesai">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Pemesanan</label>
                        <input type="text-area" class="form-control" id="nama_pemesan" name="nama_pemesan">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Jumlah Pelanggan</label>
                        <input type="text-area" class="form-control" id="jumlah_pelanggan" name="jumlah_pelanggan">
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