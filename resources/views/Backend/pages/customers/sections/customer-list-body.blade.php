<tr id="category{{$data->id}}">
    <td>{{$data->id}}</td>
    <td>{{$data->name}} {{$data->surname}}</td>
    <td>{{$data->email}}</td>
    <td>{{$data->country}}</td>
    <td>
        <a href="#" class="btn btn-light-primary btn-active-primary btn-sm w-150px" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
            Əməliyyatlar
            <span class="svg-icon fs-5 m-0">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                        <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                    </g>
                </svg>
            </span>
        </a>
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-150px py-4" data-kt-menu="true">
            <div class="menu-item px-3">
                <a class="menu-link px-3" data-kt-docs-table-filter="see_row" data-bs-target="#see_customer" id="see_row">
                    <i class="fas fa-eye menu-bullet"></i> Ətraflı bax
                </a>
            </div>
            <div class="menu-item px-3">
                <a data-bs-toggle="modal" data-bs-target="#edit_customer" data-id="{{$data->id}}" data-kt-docs-table-filter="edit_row" class="menu-link px-3" id="edit_row">
                    <i class="fas fa-edit menu-bullet"></i> Dəyiş
                </a>
            </div>
            <div class="menu-item px-3">
                <a class="menu-link px-3" data-kt-docs-table-filter="delete_customer" id="delete_row">
                    <i class="fas fa-trash-alt menu-bullet"></i> Sil
                </a>
            </div>
        </div>
    </td>
</tr>
