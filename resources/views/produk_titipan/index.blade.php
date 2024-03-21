    @extends('template.layout')

    @push('style')

    @endpush

    @section('content')
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">Produk</h6>

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


                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormProduk" style="margin-top: 2px;">
                    Tambah Produk!
                </button>

                <button class="btn btn-warning"data-toggle="modal" data-target="#form-import"><i class="bi bi-cloud-upload"></i>import excel</button>

             <a href="{{ url('export/produk_titipan') }}" class="btn-success btn"><span> <i class="bi bi-table"></i>Export
        excel</span></a>

        <a href="{{ url('generate/produk_titipan') }}" class="btn-danger btn"><span> <i class="bi bi-file-pdf"></i>Export
            pdf</span></a>

            </div>
            <div class="mb-2 px-4">
                @include('produk_titipan.data')
            </div>

            <!-- /.card-body -->
            <div class="card-footer">
                @cofeJayaIndo
            </div>

        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    @include('produk_titipan.form')

    </section>
    @endsection

    @push('script')
    <script>

        let table = new DataTable('#tabel');
        
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
        $('.btn-delete').on('click', function(e) {
        e.preventDefault();

    let nama_produk = $(this).closest('tr').find('td:eq(0)').text();

    Swal.fire({
        icon: 'warning',
        title: 'Konfirmasi Hapus Data',
        html: `Apakah Anda yakin akan menghapus data <b>${nama_produk}</b>?`,
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal',
        focusConfirm: false
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: 'success',
                title: 'Data Terhapus',
                text: `Data ${nama_produk} telah berhasil dihapus.`,
                confirmButtonText: 'OK'
            });
        }
    });
});

        $('#modalFormProduk').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const nama_produk = btn.data('nama_produk')
            const nama_suplier = btn.data('nama_suplier')
            const harga_beli = btn.data('harga_beli')
            const harga_jual = btn.data('harga_jual')
            const stock = btn.data('stock')
            const keterangan = btn.data('keterangan')
            const id = btn.data('id')
            console.log(id)
            const modal = $(this)
            if (mode === 'edit') {
                let data = (JSON.stringify(btn.data('kabehan')))
                let items = JSON.parse(data)
                console.log(items)
                modal.find('.modal-title').text('Edit Data Produk')
                modal.find('#nama_produk').val(items.nama_produk)
                modal.find('#nama_suplier').val(items.nama_suplier)
                modal.find('#harga_beli').val(items.harga_beli)
                modal.find('#harga_jual').val(items.harga_jual)
                modal.find('#stock').val(items.stock)
                modal.find('#keterangan').val(items.keterangan)
                modal.find('.modal-body form').attr('action', '{{ url("produk_titipan") }}/' + id)
                modal.find('#method').html('@method("PUT")')
                
            } else {
                modal.find('.modal-title').text('Input Data Produk')
                modal.find('#nama_produk').val()
                modal.find('#method').html('')
                modal.find('.modal-body form').attr('action', '{{ url("produk_titipan") }}')
            }
            
            document.getElementById("harga_beli").addEventListener("input", function() {
             var hargaBeli = parseFloat(this.value);
             var hargaJual = hargaBeli * 1.7; // Menambahkan 70%
             hargaJual = Math.round(hargaJual / 500) * 500;
             document.getElementById("harga_jual").value = hargaJual;
         });

         function editStock(event) {
        // Cek apakah target dari double-click adalah elemen stok
        if (event.target.classList.contains('stock')) {
            // Simpan nilai stok sebelumnya
            let previousValue = event.target.innerText;

            // Ubah elemen stok menjadi input field
            event.target.innerHTML = '<input type="number" class="stock-edit" value="' + previousValue + '">';

            // Berikan fokus pada input field stok yang baru
            let stockInput = document.querySelector('.stock-edit');
            stockInput.focus();

            // Tangkap event keypress pada input field stok
            stockInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    // Ambil nilai stok yang baru
                    let newStock = stockInput.value;
                    
                    // Ambil ID record atau produk
                    let productId = event.target.dataset.productId;
                    
                    // Kirim data ke server untuk pembaruan database
                    updateStock(productId, newStock);
                }
            });
        }
    }

    function updateStock(productId, newStock) {
        // Kirim permintaan AJAX ke server untuk memperbarui stok di database
        // Gunakan jQuery.ajax atau metode lainnya sesuai preferensi Anda
        $.ajax({
            url: '/update-stock',
            type: 'POST',
            dataType: 'json',
            data: {
                productId: productId,
                newStock: newStock
            },
            success: function(response) {
                // Tindakan setelah berhasil memperbarui stok
                console.log('Stok berhasil diperbarui:', response);
            },
            error: function(xhr, status, error) {
                // Tindakan jika terjadi kesalahan saat memperbarui stok
                console.error('Gagal memperbarui stok:', error);
            }
        });
    }

    // Tambahkan event listener untuk menangkap double-click pada tabel atau elemen stok
    document.addEventListener('dblclick', editStock);
            
    });
    </script>
    @endpush