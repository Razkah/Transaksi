<div class="modal fade" id="modalFormAbsensi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Absensi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    {{-- <span aria-hidden="c">&times;</span> --}}
                </button>
            </div>
            <div class="modal-body">
                {{-- Metode adalah fungsi atau perilaku yang dapat dilakukan oleh objek yang dibuat dari kelas tersebut. Metode digunakan untuk memanipulasi atribut objek, melakukan operasi, atau mengembalikan nilai tertentu. --}}
                <form method="post" action="absensi" class="form">
                    @csrf
                    <div id="method"></div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Karyawan</label>
                        <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Waktu Masuk</label>
                        <input type="time" class="form-control" id="waktu_masuk" name="waktu_masuk">
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="masuk">Masuk</option>
                            <option value="sakit">Sakit</option>
                            <option value="cuti">Cuti</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Waktu Keluar</label>
                        <input type="time" class="form-control" id="waktu_kesluar" name="waktu_keluar">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>