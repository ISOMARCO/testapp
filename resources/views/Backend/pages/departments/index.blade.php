@extends('Backend.layouts.master')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.8/sweetalert2.min.css">
@endsection
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
                                    data-bs-target="#new_department">
                                <i class="ki-duotone ki-plus fs-2"></i>
                                Yeni Şöbə
                            </button>
                        </div>
                    </div>
                    <table style="border-radius: 10px; overflow: auto;" class="table table-striped table-row-bordered fs-6 gy-5">
                        <thead>
                        <tr class="text-start text-white bg-primary fw-bold fs-7 text-uppercase gs-0">
                            <th>Id</th>
                            <th>Ad</th>
                            <th>Müştəri</th>
                            <th>Email</th>
                            <th>Ölkə</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                        @foreach($departments as $department)
                            <tr id="department">
                                <td>{{$department->id}}</td>
                                <td>{{$department->name}}</td>
                                <td>{{$customerName($department->customer)}}</td>
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
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('Backend.pages.departments.sections.add-modal')
    @include('Backend.pages.departments.sections.see_details')
    @include('Backend.pages.departments.sections.edit-modal')
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.8/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on("click", "#create_modal_btn", function() {
               $.ajax({
                   type: "POST",
                   url: "{{ route('Backend.departments.create') }}",
                   data: $(".create_form").serialize(),
                   dataType: "json",
                   beforeSend: function()
                   {
                       $(".create_form button, .create_form input, .create_form select, .create_form textarea").prop("disabled", true);
                       $(".create_form ul").empty();
                   },
                   success: function(e)
                   {
                       console.log(e);
                   },
                   error: function (x)
                   {
                       var errorResponse = x.responseJSON || x.responseText;
                       if(errorResponse.type === 'validation_error')
                       {
                           $.each(Object.entries(errorResponse.message), function (index, value) {
                               $.each(value[1], function(i, message) {
                                   $("." + value[0] + "-error").append("<li>" + message + "</li>");
                               });
                           });
                       }
                       else if(errorResponse.type === 'create_error')
                       {
                           Swal.fire({
                               title: "Xəta baş verdi",
                               text: errorResponse.message,
                               icon: 'error',
                               confirmButtonText: 'OK'
                           });
                       }
                       console.error(errorResponse);
                   },
                   complete: function()
                   {
                       $(".create_form button, .create_form input, .create_form select, .create_form textarea").prop("disabled", false);
                   }
               });
            });

            $(document).on("click", "#see_row", function() {
                var row = $(this).closest("tr");
                $("#see_department #name").val(row.find('td:eq(1)').text());
                $("#see_department #customer").val(row.find('td:eq(2)').text());
                $("#see_department #email").val(row.find('td:eq(3)').text());
                $("#see_department #address").val(row.find('td:eq(5)').text());
            });

            $(document).on("click", "#edit_row", function() {
                var row = $(this).closest("tr");
                $("#edit_department #id").val(row.find('td:eq(0)').text());
                $("#edit_department #name").val(row.find('td:eq(1)').text());
                $("#edit_department #customer").val(row.find('td:eq(6)').text());
                $("#edit_department #email").val(row.find('td:eq(3)').text());
                $("#edit_department #address").val(row.find('td:eq(5)').text());
            });

            $(document).on("click", "#edit_modal_btn", function() {
                $.ajax({
                    type: "POST",
                    url: "{{ route('Backend.departments.update') }}",
                    data: $(".edit_form").serialize(),
                    dataType: "json",
                    beforeSend: function()
                    {
                        $(".edit_form button, .edit_form input, .edit_form select, .edit_form textarea").prop("disabled", true);
                        $(".edit_form ul").empty();
                    },
                    success: function(e)
                    {
                        console.log(e);
                    },
                    error: function (x)
                    {
                        var errorResponse = x.responseJSON || x.responseText;
                        if(errorResponse.type === 'validation_error')
                        {
                            $.each(Object.entries(errorResponse.message), function (index, value) {
                                $.each(value[1], function(i, message) {
                                    $("." + value[0] + "-error").append("<li>" + message + "</li>");
                                });
                            });
                        }
                        else if(errorResponse.type === 'update_error')
                        {
                            Swal.fire({
                                title: "Xəta baş verdi",
                                text: errorResponse.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                        console.error(errorResponse);
                    },
                    complete: function()
                    {
                        $(".edit_form button, .edit_form input, .edit_form select, .edit_form textarea").prop("disabled", false);
                    }
                });
            });
        });
    </script>
@endsection
