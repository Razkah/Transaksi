<table class="table">
    <thead class="thead-dark">
        <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Tools</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($category as $ca)
        <tr class="text-center">
            <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
            <td>{{ $ca->name }}</td>
            <td>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalFormCategory" data-mode="edit" data-id="{{ $ca->id }}" data-name="{{ $ca->name }}" data-kabehan="{{ json_encode($ca) }}">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <form action="{{ route('category.destroy',$ca->id) }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-delete"><i class="bi bi-trash"></i></button>
                    
                </form>

            </td>
        </tr>


        @endforeach

    </tbody>
</table>