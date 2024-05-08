<tr id="category{{$data->id}}">
    <td>{{$data->id}}</td>
    <td>{{$data->name}}</td>
    <td>
        <button type="button" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                data-bs-toggle="modal" data-bs-target="#edit_category" id="edit_row">
            <i class="fas fa-edit"></i>
        </button>
        <button type="button" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"
                data-bs-toggle="modal" data-bs-target="#delete_category">
            <i class="fas fa-trash"></i>
        </button>
    </td>
</tr>
