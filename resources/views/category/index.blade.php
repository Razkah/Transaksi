@extends('template.layout')

@push('style')

@endpush

@section('content')
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Category</h3>

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


            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormCategory" style="margin-top: 2px;">
                Tambah Category!
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormImportCategory" style="margin-top: 2px;">
                Import
            </button>   

            <a href="{{ url('export/category') }}" class="btn-success btn "><span> <i class="bi bi-table"></i>Export excel</span></a>

             <a href="{{ url('generate/category') }}" class="btn-danger btn"><span> <i class="bi bi-file-pdf"></i>Export pdf</span></a>
        </div>
        <div class="mb-2">
            @include('category.data')
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>

    </div>
    <!-- /.card-footer-->
</div>
<!-- /.card -->
@include('category.form')

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
        $('#tbl-category'.DataTable)
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

    $('#modalFormCategory').on('show.bs.modal', function(e) {
        const btn = $(e.relatedTarget)
        console.log(btn.data('mode'))
        const mode = btn.data('mode')
        const id = btn.data('id')
        const name = btn.data('name')

        const modal = $(this)
        if (mode === 'edit') {
            let data = (JSON.stringify(btn.data('kabehan')))
            let items = JSON.parse(data)
            console.log(items)
            modal.find('.modal-title').text('Edit Data Category')
            modal.find('#name').val(items.name)
            modal.find('.modal-body form').attr('action', `{{ url("category") }}/` + id)
            modal.find('#method').html('@method("PUT")')

        } else {
            modal.find('.modal-title').text('Input Data Category')
            modal.find('#name').val()
            modal.find('#method').html('')
            modal.find('.modal-body form').attr('action', '{{ url("category") }}')
        }
    })
</script>
@endpush