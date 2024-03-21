    @extends('template.layout')

    @push('style')

    @endpush

    @section('content')
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Menu</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="bi bi-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="bi bi-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                @if(session('success'))
                <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        {{-- <span aria-hidden="true">&times;</span> --}}
                    </button>

                </div>
                @endif

                @if($errors->any())
                <div id="error-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif


                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormMenu" style="margin-top: 2px;">
                    Tambah Menu!
                </button>
            
             <a href="{{ url('/generate-pdf') }}" class="btn-dark btn " target="_blank">Lihat PDF</a>   

             <a href="{{ url('export/menu') }}" class="btn-success btn "><span> <i class="bi bi-table"></i>Export excel</span></a>

             <a href="{{ url('generate/menu') }}" class="btn-danger btn"><span> <i class="bi bi-file-pdf"></i>Export pdf</span></a>

             <button class="btn btn-warning"data-toggle="modal" data-target="#form-import"><i class=" bi bi-cloud-upload"></i>import excel</button>

            </div>
            <div class="mb-2">
                @include('menu.data')
            </div>

            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>

        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    @include('menu.form')

    </section>
    @endsection

    @push('script')
    <script>
        $('#success-alert').fadeTo(500, 500).slideUp(500, function() {
            $('#success-alert').slideUp(500)
        })

        $('#error-alert').fadeTo(1000, 500).slideUp(1000, function() {
            $('#error-alert').slideUp(500)
        })

        $(function() {
            $('#tbl-produk'.DataTable)
        })

        //dialog hapus Data
        $('.btn-delete').on('click', function() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href="">Why do I have this issue?</a>'
            })
        })

        $('#modalFormMenu').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const nama_menu = btn.data('nama_menu')
            const harga = btn.data('harga')
            const deskripsi = btn.data('deskripsi')
            const jenis_id = btn.data('jenis_id')
            const id = btn.data('id')
            console.log(id)
            const modal = $(this)
            if (mode === 'edit') {
                let data = (JSON.stringify(btn.data('kabehan')))
                let items = JSON.parse(data)
                console.log(items)
                modal.find('.modal-title').text('Edit Data Menu')
                modal.find('#nama_menu').val(items.nama_menu)
                modal.find('#harga').val(items.harga)
                modal.find('#deskripsi').val(items.deskripsi)
                modal.find('#jenis_id').val(items.jenis_id)
                modal.find('.modal-body form').attr('action', '{{ url("menu") }}/' + id)
                modal.find('#method').html('@method("PUT")')
                
            } else {
                modal.find('.modal-title').text('Input Data Menu')
                modal.find('#nama_menu').val()
                modal.find('#method').html('')
                modal.find('.modal-body form').attr('action', '{{ url("menu") }}')
            }
        })
    </script>
    @endpush