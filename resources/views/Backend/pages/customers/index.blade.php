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
                            <th>Ad</th>
                            <th>Soyad</th>
                            <th>Email</th>
                            <th>Ölkə</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                        @foreach($customers as $customer)
                            <tr id="category{{$customer->id}}">
                                <td>{{$customer->id}}</td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->surname}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->country}}</td>
                                <td style="display: none">{{$customer->address}}</td>
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
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('Backend.pages.customers.sections.add-modal')
    @include('Backend.pages.customers.sections.see_details')
    @include('Backend.pages.customers.sections.edit-modal')
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on("click", "#create_modal_btn", function(){
                $.ajax({
                    type: "POST",
                    url: "{{route('Backend.customers.create')}}",
                    data: $(".create_form").serialize(),
                    dataType: "json",
                    beforeSend: function()
                    {
                        $(".create_form input, .create_form button").prop("disabled", true);
                        $('.create_form ul').empty();
                    },
                    success: function(e)
                    {
                        $("tbody").prepend(e.htmlElement);
                        $('#new_customer').modal('hide');
                    },
                    error: function(x)
                    {
                        var errorResponse = x.responseJSON || x.responseText;
                        console.error(errorResponse);
                        if(errorResponse.type === 'validation_error')
                        {
                            $.each(Object.entries(errorResponse.message), function (index, value) {
                                $.each(value[1], function(i, message) {
                                    $("." + value[0] + "-error").append("<li>" + message + "</li>");
                                });
                            });

                        }
                    },
                    complete: function()
                    {
                        $(".create_form input, .create_form button").prop("disabled", false);
                    }
                });
            });
        });

        $(document).on("click", "#see_row", function() {
            $("#see_customer #name_surname").val($(this).closest("tr").find("td:eq(1)").text()+" "+$(this).closest("tr").find("td:eq(2)").text());
            $("#see_customer #email").val($(this).closest("tr").find("td:eq(3)").text());
        });

        $(document).on("click", "#edit_row", function() {
            $("#edit_customer #name").val($(this).closest("tr").find("td:eq(1)").text());
            $("#edit_customer #surname").val($(this).closest("tr").find("td:eq(2)").text());
            $("#edit_customer #email").val($(this).closest("tr").find("td:eq(3)").text());
            $("#edit_customer #country").val($(this).closest("tr").find("td:eq(4)").text());
        });
    </script>
@endsection
