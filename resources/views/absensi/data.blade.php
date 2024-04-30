<table class="table" id="1">
    <thead class="thead-dark">
        <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Nama Karyawan</th>
            <th scope="col">Tanggal Masuk</th>
            <th scope="col">Waktu Masuk</th>
            <th scope="col">Status</th>
            <th scope="col">Waktu Selesai Kerja</th>
            <th scope="col">Tools</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($absensi as $a)
        <tr class="text-center">
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $a->nama_karyawan }}</td>
            <td>{{ $a->tanggal_masuk }}</td>
            <td>{{ $a->waktu_masuk }}</td>
            <td>
                <select name="status" id="status_{{ $a->id }}" class="form-control col-sm edit-status" onchange="updateStatus('{{ $a->id }}')">
                    <option value="masuk" {{ $a->status === 'masuk' ? 'selected' : '' }}>Masuk</option>
                    <option value="sakit" {{ $a->status === 'sakit' ? 'selected' : '' }}>Sakit</option>
                    <option value="izin" {{ $a->status === 'izin' ? 'selected' : '' }}>Izin</option>
                </select>
                <!-- Form untuk mengirim data -->
                <form id="form_{{ $a->id }}" action="{{ route('update-status', $a->id) }}" method="post" style="display: none;">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="waktu_keluar" value="00:00:00">
                </form>
            </td>
            <td id="waktu_keluar_{{ $a->id }}">{{ $a->waktu_keluar }}</td>
            <td>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalFormAbsensi" data-mode="edit" data-id="{{ $a->id }}" data-name="{{ $a->nama_karyawan }}" data-kabehan="{{ json_encode($a) }}">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <form action="{{ route('absensi.destroy', $a->id) }}" method="post" style="display:inline" class="form-delete">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger btn-delete" data-id='$a->id'><i class="bi bi-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>