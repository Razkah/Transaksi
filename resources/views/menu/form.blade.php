<div class="modal fade" id="modalFormMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    {{-- <span aria-hidden="c">&times;</span> --}}
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="menu" class="form">
                    @csrf
                    <div id="method"></div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Menu</label>
                        <input type="text" class="form-control" id="nama_menu" name="nama_menu">
                    </div>
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Deskripsi</label>
                        <input type="text-area" class="form-control" id="deskripsi" name="deskripsi">
                    </div>
                    

                <div class="mb-3">
                    <label for="category_id" class="form-label">Jenis</label>
                    <div class="in">
                        <div class="input-group">
                            <select name="jenis_id" id="jenis_id" class="form-select">
                                <option selected disabled>Pilih Jenis</option>
                                @foreach($jenis as $j)
                                <option value="{{ $j->id }}">{{ $j->name }}</option>
                                @endforeach
                            </select>
                            <label for="category_id" class="input-group-text"><i class="fas fa-caret-down"></i>
                            </label>
                        </div>
                    </div>
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