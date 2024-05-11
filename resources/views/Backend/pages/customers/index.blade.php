@extends('Backend.layouts.master')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.8/sweetalert2.min.css">
    <link rel="stylesheet" href="{{asset('assets/plugins/custom/toastr/toastr.min.css')}}">
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
                                    data-bs-target="#new_customer">
                                <i class="ki-duotone ki-plus fs-2"></i>
                                Yeni Müştəri
                            </button>
                        </div>
                    </div>
                    <table style="border-radius: 10px; overflow: auto;" class="table table-striped table-row-bordered fs-6 gy-5">
                        <thead>
                        <tr class="text-start text-white bg-primary fw-bold fs-7 text-uppercase gs-0">
                            <th>Id</th>
                            <th>Ad</th>
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
                                <td>{{$customer->email}}</td>
                                <td>{{getCountryName($customer->country)}}</td>
                                <td style="display: none">{{$customer->address}}</td>
                                <td style="display: none">{{$customer->category}}</td>
                                <td style="display: none">{{$customer->country}}</td>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.8/sweetalert2.all.min.js"></script>
    <script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>
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
                        $(".create_form input, .create_form button, .create_form select, .create_form textarea").prop("disabled", true);
                        $('.create_form ul').empty();
                    },
                    success: function(e)
                    {
                        $(".table tbody").prepend(e.htmlElement);
                        $('#new_customer').modal('hide');
                        toastr.success(e.message);
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
                        else if(errorResponse.type === 'create_error')
                        {
                            Swal.fire({
                                title: "Xəta baş verdi",
                                text: errorResponse.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    complete: function()
                    {
                        $(".create_form input, .create_form button, .create_form select, .create_form textarea").prop("disabled", false);
                    }
                });
            });

            $(document).on("click", "#edit_modal_btn", function() {
                $.ajax({
                    type: "POST",
                    url: "{{route('Backend.customers.update')}}",
                    data: $(".edit_form").serialize(),
                    dataType: "json",
                    beforeSend: function()
                    {
                        $(".edit_form input, .edit_form button, .edit_form select, .edit_form textarea").prop("disabled", true);
                        $('.edit_form ul').empty();
                    },
                    success: function(e)
                    {
                        console.log(e);
                        $('#edit_customer').modal('hide');
                        $("tbody #category" + e.data.id +" td:eq(1)").text(e.data.name);
                        $("tbody #category" + e.data.id +" td:eq(2)").text(e.data.email);
                        $("tbody #category" + e.data.id +" td:eq(3)").text(e.data.countryName);
                        $("tbody #category" + e.data.id + " td:eq(4)").text(e.data.address);
                        $("tbody #category" + e.data.id + " td:eq(5)").text(e.data.category);
                        $("tbody #category" + e.data.id +" td:eq(6)").text(e.data.country);
                        toastr.success(e.message);
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
                        $(".edit_form input, .edit_form button, .edit_form select, .edit_form textarea").prop("disabled", false);
                    }
                });
            });

            $(document).on("click", "#see_row", function() {
                $("#see_customer #name").val($(this).closest("tr").find("td:eq(1)").text());
                $("#see_customer #email").val($(this).closest("tr").find("td:eq(2)").text());
                $("#see_customer #country").val($(this).closest("tr").find("td:eq(3)").text());
                $("#see_customer #address").val($(this).closest("tr").find("td:eq(4)").text());
                $("#see_customer #category").val($(this).closest("tr").find("td:eq(5)").text());
            });

            $(document).on("click", "#edit_row", function() {
                $("#edit_customer #id").val($(this).closest("tr").find("td:eq(0)").text());
                $("#edit_customer #name").val($(this).closest("tr").find("td:eq(1)").text());
                $("#edit_customer #email").val($(this).closest("tr").find("td:eq(2)").text());
                $("#edit_customer #country").val($(this).closest("tr").find("td:eq(6)").text());
                $("#edit_customer #address").val($(this).closest("tr").find("td:eq(4)").text());
                $("#edit_customer #category").val($(this).closest("tr").find("td:eq(5)").text());
            });

            $(document).on("click", "#delete_row", function() {
                Swal.fire({
                    title: "Silmək istədiyinizdən əminsiniz?",
                    text: "Bu əməliyyatı geri qaytarmaq mümkün deyil!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Bəli, sil!",
                    cancelButtonText: "Xeyr, silmə!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{route('Backend.customers.delete')}}",
                            data: {id: $(this).closest("tr").find("td:eq(0)").text()},
                            dataType: "json",
                            success: function(e)
                            {
                                console.log(e);
                                Swal.fire({
                                    title: "Müvəffəqiyyət",
                                    text: e.message,
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                });
                                $("tbody #category"+e.id).remove();
                            },
                            error: function(x)
                            {
                                var errorResponse = x.responseJSON || x.responseText;
                                console.log(errorResponse);
                                Swal.fire({
                                    title: "Xəta baş verdi",
                                    text: errorResponse.message,
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
