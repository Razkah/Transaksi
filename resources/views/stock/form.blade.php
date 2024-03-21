<div class="modal fade" id="modalFormStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    {{-- <span aria-hidden="true">&times;</span> --}}
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="stock" class="form">
                    @csrf
                    <div id="method"></div>

                    <div class="mb-3">
                        <label for="jenis_id" class="form-label">Nama Memu</label>
                        <div class="in">
                            <div class="input-group">
                                <select name="menu_id" id="menu_id" class="form-select">
                                    <option selected disabled>Pilih Menu</option>
                                    @foreach($menu as $m)
                                    <option value="{{ $m->id }}">{{ $m->nama_menu }}</option>
                                    @endforeach
                                </select>
                                <label for="menu_id" class="input-group-text"><i class="fas fa-caret-down"></i>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Jumlah</label>
                        <input type="text-area" class="form-control" id="deskripsi" name="jumlah">
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