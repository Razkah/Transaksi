@extends('template.layout')

@push('style')

@endpush

@section('content')
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Stock</h3>

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
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    {{-- <span aria-hidden="true">&times;</span> --}}
                </button>
            </div>
            @endif


            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormStock" style="margin-top: 2px;">
                Tambah Stock!
            </button>

            <a href="{{ route('export.stock') }}" class="btn-success btn "><span> <i class="bi bi-table"></i>Export excel</span></a>

            <a href="{{ route('exportPdf_menu') }}" class="btn btn-danger">
                <i class="fa fa-file-pdf"></i>
                    Export PDF
                </a>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormImportStock" style="margin-top: 2px;">
                    Import
                </button>
            </div>
        </div>
        <div class="mb-2">
            @include('stock.data')
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>

    </div>
    <!-- /.card-footer-->
</div>
<!-- /.card -->
@include('stock.form')

</section>
@endsection

@push('script')
<script>
    
    let table = new DataTable('#tableStock');
    
    $('#success-alert').fadeTo(500, 500).slideUp(500, function() {
        $('#success-alert').slideUp(500)
    })

    $('#error-alert').fadeTo(1000, 500).slideUp(1000, function() {
        $('#error-alert').slideUp(500)
    })

    $(function() {
        $('#tbl-stock'.DataTable)
    })

    //dialog hapus Data
    $('.btn-delete').on('click', function() {
        Swal.fire({
            icon: 'error',
            title: 'Danger!',
            text: 'Apakah Anda Yakin?',
        })
    })

    $('#modalFormStock').on('show.bs.modal', function(e) {
        const btn = $(e.relatedTarget)
        console.log(btn.data('mode'))
        const mode = btn.data('mode')
        const id = btn.data('id')
        const menu_id = btn.data('menu_id')
        const jumlah = btn.data('jumlah')

        const modal = $(this)
        if (mode === 'edit') {
            let data = (JSON.stringify(btn.data('kabehan')))
            let items = JSON.parse(data)
            console.log(items)
            modal.find('.modal-title').text('Edit Data Stock')
            modal.find('#menu_id').val(items.menu_id)
            modal.find('#jumlah').val(items.jumlah)
            modal.find('.modal-body form').attr('action', `{{ url("stock") }}/ ` + id)
            modal.find('#method').html('@method("PUT")')

        } else {
            modal.find('.modal-title').text('Input Data Stock')
            modal.find('#menu_id').val()
            modal.find('#method').html('')
            modal.find('.modal-body form').attr('action', '{{ url("stock") }}')
        }
    })
</script>
@endpush