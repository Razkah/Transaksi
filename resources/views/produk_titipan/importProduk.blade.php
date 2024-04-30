<div class="modal fade" id="modalFormImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    {{-- <span aria-hidden="c">&times;</span> --}}
                </button>
            </div>
            <div class="modal-body">
                <form method="post"  class="form" enctype="multipart/form-data">
                    @csrf
                    <div id="method"></div>

                    <div class="mb-3">
                        <label for="file" class="form-label">Pilih File Excel:</label>
                        <input type="file" class="form-control" id="file" name="file">
                    </div>
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Import</button>
                </form>
            </div>
        </div>
    </div>
</div>