@extends('template.layout')

@push('style')

@endpush

@section('content')
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Jenis</h3>

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


            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormJenis" style="margin-top: 2px;">
                Tambah Jenis!
            </button>
        </div>
        <div class="mb-2">
            @include('jenis.data')
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>

    </div>
    <!-- /.card-footer-->
</div>
<!-- /.card -->
@include('jenis.form')

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
        $('#tbl-jenis'.DataTable)
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

    $('#modalFormJenis').on('show.bs.modal', function(e) {
        const btn = $(e.relatedTarget)
        console.log(btn.data('mode'))
        const mode = btn.data('mode')
        const id = btn.data('id')
        const name = btn.data('name')
        const category_id = btn.data('category_id')
        



        const modal = $(this)
        if (mode === 'edit') {
            let data = (JSON.stringify(btn.data('kabehan')))
            let items = JSON.parse(data)
            console.log(items)
            modal.find('.modal-title').text('Edit Data Menu')
            modal.find('#name').val(items.name)
            modal.find('#category_id').val(items.category_id)
            modal.find('.modal-body form').attr('action', '{{ url("jenis") }}/' + id)
            modal.find('#method').html('@method("PUT")')
            
        } else {
            modal.find('.modal-title').text('Input Data Jenis')
            modal.find('#name').val()
            modal.find('#method').html('')
            modal.find('.modal-body form').attr('action', '{{ url("jenis") }}')
        }
    })
</script>
@endpush