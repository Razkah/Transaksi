<div class="modal fade" id="modalFormJenis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Jenis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    {{-- <span aria-hidden="c">&times;</span> --}}
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="jenis" class="form">
                    @csrf
                    <div id="method"></div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Jenis</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <div class="in">
                        <div class="input-group">
                            <select name="category_id" id="category_id" class="form-select">
                                <option selected disabled>Pilih Kategori</option>
                                @foreach($category as $ca)
                                <option value="{{ $ca->id }}">{{ $ca->name }}</option>
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