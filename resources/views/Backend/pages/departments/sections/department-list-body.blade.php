<tr id="department">
    <td>{{$department->id}}</td>
    <td>{{$department->name}}</td>
    <td>{{$department->customer}}</td>
    <td>{{$department->email}}</td>
    <td>{{$department->country}}</td>
    <td style="display: none">{{$department->address}}</td>
    <td style="display: none">{{$department->customer}}</td>
    <td>
        <button type="button" class="btn btn-sm btn-light btn-active-light-primary"
                data-bs-toggle="modal" data-bs-target="#see_department" id="see_row">
            <i class="fas fa-eye"></i>
        </button>
        <button type="button" class="btn btn-sm btn-light btn-active-light-primary"
                data-bs-toggle="modal" data-bs-target="#edit_department" id="edit_row">
            <i class="fas fa-edit"></i>
        </button>
        <button type="button" class="btn btn-sm btn-light btn-active-light-primary"
                data-bs-toggle="modal" data-bs-target="#delete_department" id="delete_row">
            <i class="fas fa-trash"></i>
        </button>
    </td>
</tr>
