    @extends('template.layout')

    @push('style')

    @endpush

    @section('content')
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pelanggan</h3>

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


                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormPelanggan" style="margin-top: 2px;">
                    Tambah Pelanggan!
                </button>
              

             <a href="{{ url('export/menu') }}" class="btn-success btn "><span> <i class="bi bi-table"></i>Export excel</span></a>

            <a href="{{ route('exportPdf_menu') }}" class="btn btn-danger">
                <i class="fa fa-file-pdf"></i>
                    Export PDF
                </a>

             <button class="btn btn-warning" data-toggle="modal" data-target="#modalFormImportPel"><i class=" bi bi-cloud-upload"></i>import excel</button>
            </button>

            </div>
            <div class="mb-2">
                @include('pelanggan.data')
            </div>

            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>

        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    @include('pelanggan.form')

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
            $('#tbl-pelanggan'.DataTable)
        })

        //dialog hapus Data
    $('.btn-delete').on('click', function(e) {
        e.preventDefault();

    let nama = $(this).closest('tr').find('td:eq(0)').text();

    // if: Digunakan untuk mengevaluasi suatu kondisi. Jika kondisi tersebut benar (true), blok kode di dalam if akan dieksekusi. Jika tidak, blok kode tersebut dilewati.
    
    Swal.fire({
        icon: 'warning',
        title: 'Konfirmasi Hapus Data',
        html: `Apakah Anda yakin akan menghapus data <b>${nama}</b>?`,
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal',
        focusConfirm: false
    }).then((result) => {
        if (result.isConfirmed) {
            document.querySelector('.form-delete').submit()
        }
    });
});

        $('#modalFormPelanggan').on('show.bs.modal', function(e) {
            
            // Konstanta adalah suatu nilai yang tetap dan tidak dapat diubah selama eksekusi program.
            // Konstanta biasanya digunakan untuk menyimpan nilai yang tidak boleh berubah, seperti nilai pi, kunci enkripsi, dan sebagainya.

            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const nama = btn.data('nama')
            const email = btn.data('email')
            const no_telepon = btn.data('no_telepon')
            const alamat = btn.data('alamat')
            const id = btn.data('id')
            console.log(id)
            const modal = $(this)
            if (mode === 'edit') {
                let data = (JSON.stringify(btn.data('kabehan')))
                let items = JSON.parse(data)
                console.log(items)
                modal.find('.modal-title').text('Edit Data Pelanggan')
                modal.find('#nama').val(items.nama)
                modal.find('#email').val(items.email)
                modal.find('#no_telepon').val(items.no_telepon)
                modal.find('#alamat').val(items.alamat)
                modal.find('.modal-body form').attr('action', '{{ url("alamat") }}/' + id)
                modal.find('#method').html('@method("PUT")')
                
            } else {
                modal.find('.modal-title').text('Input Data alamat')
                modal.find('#alamat').val()
                modal.find('#method').html('')
                modal.find('.modal-body form').attr('action', '{{ url("alamat") }}')
            }
        })
    </script>
    @endpush