<tr id="category{{$data->id}}">
    <td>{{$data->id}}</td>
    <td>{{$data->name}}</td>
    <td>{{$data->surname}}</td>
    <td>{{$data->email}}</td>
    <td>{{$data->country}}</td>
    <td style="display: none">{{$data->address}}</td>
    <td style="display: none">{{$data->category}}</td>
    <td>
        <button type="button" class="btn btn-sm btn-light btn-active-light-primary"
                data-bs-toggle="modal" data-bs-target="#see_customer" id="see_row">
            <i class="fas fa-eye"></i>
        </button>
        <button type="button" class="btn btn-sm btn-light btn-active-light-primary"
                data-bs-toggle="modal" data-bs-target="#edit_customer" id="edit_row">
            <i class="fas fa-edit"></i>
        </button>
        <button type="button" class="btn btn-sm btn-light btn-active-light-primary"
                data-bs-toggle="modal" data-bs-target="#delete_customer" id="delete_row">
            <i class="fas fa-trash"></i>
        </button>
    </td>
</tr>
