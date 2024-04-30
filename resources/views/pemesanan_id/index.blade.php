    @extends('template.layout')

    @push('style')

    @endpush

    @section('content')
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pemesanan</h3>

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


                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormPemesanan_id" style="margin-top: 2px;">
                    Tambah Pemesanan!
                </button>
            
             <a href="{{ url('/generate-pdf') }}" class="btn-dark btn " target="_blank">Lihat PDF</a>   

             <a href="{{ url('export/menu') }}" class="btn-success btn "><span> <i class="bi bi-table"></i>Export excel</span></a>

             <a href="{{ url('generate/menu') }}" class="btn-danger btn"><span> <i class="bi bi-file-pdf"></i>Export pdf</span></a>

             <button class="btn btn-warning"data-toggle="modal" data-target="#form-import"><i class=" bi bi-cloud-upload"></i>import excel</button>

            </div>
            <div class="mb-2">
                @include('pemesanan_id.data')
            </div>

            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>

        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    @include('pemesanan_id.form')

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

        $('#modalFormPemesanan_id').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const meja_id = btn.data('meja_id')
            const tanggal_pemesanan = btn.data('tanggal_pemesanan')
            const jam_mulai = btn.data('jam_mulai')
            const jam_selesai = btn.data('jam_selesai')
            const nama_pemesan = btn.data('nama_pemesan')
            const jumlah_pelanggan = btn.data('jumlah_pelanggan')
            const id = btn.data('id')
            console.log(id)
            const modal = $(this)
            if (mode === 'edit') {
                let data = (JSON.stringify(btn.data('kabehan')))
                let items = JSON.parse(data)
                console.log(items)
                modal.find('.modal-title').text('Edit Data Menu')
                modal.find('#meja_id').val(items.meja_id)
                modal.find('#tanggal_pemesanan').val(items.tanggal_pemesanan)
                modal.find('#jam_mulai').val(items.jam_mulai)
                modal.find('#jam_selesai').val(items.jam_selesai)
                modal.find('#nama_pemesan').val(items.nama_pemesan)
                modal.find('#jumlah_pelanggan').val(items.jumlah_pelanggan)
                modal.find('.modal-body form').attr('action', '{{ url("pemesanan_id") }}/' + id)
                modal.find('#method').html('@method("PUT")')
                
            } else {
                modal.find('.modal-title').text('Input Data Pemesanan')
                modal.find('#meja_id').val()
                modal.find('#method').html('')
                modal.find('.modal-body form').attr('action', '{{ url("pemesanan_id") }}')
            }
        })
    </script>
    @endpush