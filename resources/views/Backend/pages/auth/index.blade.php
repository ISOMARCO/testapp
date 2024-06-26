@extends('Backend.layouts.auth')

@section('content')
    <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
        <!--begin::Form-->
        <div class="d-flex flex-center flex-column flex-lg-row-fluid">
            <!--begin::Wrapper-->
            <div class="w-lg-500px p-10">
                <!--begin::Form-->
                <form class="form w-100" novalidate="novalidate" method="post"  action="{{route('Backend.auth.login')}}">
                    @csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-11">
                        <!--begin::Title-->
                        <h1 class="text-gray-900 fw-bolder mb-3">Login title</h1>
                        <!--end::Title-->
                        <!--begin::Subtitle-->
                        {{--<div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div>--}}
                        <!--end::Subtitle=-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Input group=-->
                    <div class="fv-row mb-8">
                        <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" />
                        <ul class="text-danger" id="email-error"></ul>
                    </div>
                    <!--end::Input group=-->
                    <div class="fv-row mb-3">
                        <input type="password" placeholder="Şifrə" name="password" autocomplete="off" class="form-control bg-transparent" />
                        <ul class="text-danger" id="password-error"></ul>
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Submit button-->
                    <div class="d-grid mb-10">
                        <button type="button" id="kt_sign_in_submit" class="btn btn-primary">
                            Submit
                            <i class="fas fa-spinner fa-spin fa-lg" style="display: none"></i>
                        </button>
                    </div>
                    <!--end::Submit button-->
                    <!--begin::Sign up-->
                    {{--<div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet?
                        <a href="authentication/layouts/corporate/sign-up.html" class="link-primary">Sign up</a></div>--}}
                    <!--end::Sign up-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Form-->
        <!--begin::Footer-->
        <div class="w-lg-500px d-flex flex-stack px-10 mx-auto">
            <!--begin::Links-->
            <!--end::Links-->
        </div>
        <!--end::Footer-->
    </div>
@endsection
