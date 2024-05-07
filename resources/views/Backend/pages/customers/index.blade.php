@extends('Backend.layouts.master')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="card-body pt-10">
                    <div class="d-flex flex-stack mb-5">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6"><span class="path1"></span><span
                                    class="path2"></span></i>
                            <input type="text" data-kt-docs-table-filter="search" class="form-control  w-250px ps-15"
                                   placeholder="Search" />
                        </div>
                        <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#new_customer">
                                <i class="ki-duotone ki-plus fs-2"></i>
                                Yeni Müştəri
                            </button>
                        </div>
                        <div class="d-flex justify-content-end align-items-center d-none"
                             data-kt-docs-table-toolbar="selected">
                            <div class="fw-bold me-5">
                                <span class="me-2" data-kt-docs-table-select="selected_count"></span> Selected
                            </div>

                            <button type="button" class="btn btn-danger" data-bs-toggle="tooltip" title="Coming Soon">
                                Selection Action
                            </button>
                        </div>
                    </div>
                    <table style="border-radius: 10px; overflow: auto;" class="table table-striped table-row-bordered fs-6 gy-5">
                        <thead>
                        <tr class="text-start text-white bg-primary fw-bold fs-7 text-uppercase gs-0">
                            <th>Id</th>
                            <th>Ad soyad</th>
                            <th>Email</th>
                            <th>Ölkə</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                        @foreach($customers as $customer)
                            <tr id="category{{$customer->id}}">
                                <td>{{$customer->id}}</td>
                                <td>{{$customer->name}} {{$customer->surname}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->country}}</td>
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
                                            <a data-bs-toggle="modal" data-bs-target="#edit_customer" data-id="{{$customer->id}}" data-kt-docs-table-filter="edit_row" class="menu-link px-3" id="edit_row">
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
                        @endforeach
                        </tbody>
                    </table>
                    <!--end::Datatable-->
                    <!--end::Table-->
                </div>
            </div>
        </div>
    </div>
    @include('Backend.pages.customers.sections.add-modal')
@endsection