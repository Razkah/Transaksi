@extends('template.layout')

@push('style')

@endpush

@section('content')
{{-- sebuah blueprint atau cetakan untuk membuat objek dalam pemrograman berorientasi objek (OOP). atribut, inharantence dll --}}
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Absensi</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
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


            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormAbsensi" style="margin-top: 2px;">
                Tambah Absensi!
            </button>

            <a href="{{ url('export/menu') }}" class="btn-success btn "><span> <i class="bi bi-table"></i>Export excel</span></a>

    {{-- pdf --}}
    <a href="{{ route('exportPdf_absensi') }}" class="btn btn-danger">
        <i class="fa fa-file-pdf"></i>
        Export PDF
    </a>
             <button class="btn btn-warning"data-toggle="modal" data-target="#form-import"><i class=" bi bi-cloud-upload"></i>import excel</button>
        </div>
        <div class="mb-2">
            @include('absensi.data')
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>

    </div>
    <!-- /.card-footer-->
</div>
<!-- /.card -->
@include('absensi.form')

</section>
@endsection

@push('script')
<script>

    let table = new DataTable('#1');

    $('#success-alert').fadeTo(500, 500).slideUp(500, function() {
        $('#success-alert').slideUp(500)
    })

    $('#error-alert').fadeTo(1000, 500).slideUp(1000, function() {
        $('#error-alert').slideUp(500)
    })

    $(function() {
        $('#tbl-absensi'.DataTable)
    })

    //dialog hapus Data
    $('.btn-delete').on('click', function(e) {
        e.preventDefault();

    let nama_karyawan = $(this).closest('tr').find('td:eq(0)').text();

    // if: Digunakan untuk mengevaluasi suatu kondisi. Jika kondisi tersebut benar (true), blok kode di dalam if akan dieksekusi. Jika tidak, blok kode tersebut dilewati.
    
    Swal.fire({
        icon: 'warning',
        title: 'Konfirmasi Hapus Data',
        html: `Apakah Anda yakin akan menghapus data <b>${nama_karyawan}</b>?`,
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal',
        focusConfirm: false
    }).then((result) => {
        if (result.isConfirmed) {
            console.log('tes')
            document.querySelector('.form-delete').submit()
        }
    });
});

    $('#modalFormAbsensi').on('show.bs.modal', function(e) {
        const btn = $(e.relatedTarget)
        console.log(btn.data('mode'))
        const mode = btn.data('mode')
        const id = btn.data('id')
        const nama_karyawan = btn.data('nama_karyawan')
        const tanggal_masuk = btn.data('tanggal_masuk')
        const waktu_masuk = btn.data('waktu_masuk')
        const status = btn.data('status')
        const waktu_keluar = btn.data('waktu_keluar')
        



        const modal = $(this)
        if (mode === 'edit') {
            let data = (JSON.stringify(btn.data('kabehan')))
            let items = JSON.parse(data)
            console.log(items)
            modal.find('.modal-title').text('Edit Data Absensi')
            modal.find('#nama_karyawan').val(items.nama_karyawan)
            modal.find('#tanggal_masuk').val(items.tanggal_masuk)
            modal.find('#waktu_masuk').val(items.waktu_masuk)
            modal.find('#status').val(items.status)
            modal.find('#waktu_keluar').val(items.waktu_keluar)
            modal.find('.modal-body form').attr('action', '{{ url("absensi") }}/' + id)
            modal.find('#method').html('@method("PUT")')
            
        } else {
            modal.find('.modal-title').text('Input Data Absensi')
            modal.find('#nama_karyawan').val()
            modal.find('#method').html('')
            modal.find('.modal-body form').attr('action', '{{ url("absensi") }}')
        }
    })

    
</script>
@endpush