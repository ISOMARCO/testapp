@extends('Backend.layouts.master')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="card card-flush">
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
                                        data-bs-target="#new_category">
                                    <i class="ki-duotone ki-plus fs-2"></i>
                                    New Category
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
                        <table style="border-radius: 10px; overflow: auto" id="kt_datatable_example_1"
                               class="table table-striped table-row-bordered align-middle fs-6 gy-5">
                            <thead>
                            <tr class="text-start text-white bg-primary fw-bold fs-7 text-uppercase gs-0">
                                <th class="px-3 w-40px">Id</th>
                                <th class="min-w-125px">Name</th>
                                <th class="text-end pe-15 ">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>
                                            <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                               data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--end::Datatable-->
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
        </div>
    </div>
    @include('Backend.pages.categories.sections.add-modal')
@endsection
