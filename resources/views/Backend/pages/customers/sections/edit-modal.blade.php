<div class="modal fade" id="edit_customer" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered min-w-1000px">
        <div class="modal-content rounded">
            <div class="modal-header pb-md-5 border-0 justify-content-end bg-primary">
                <h2 class="w-100 text-start modal-title text-white">Müştəri dəyiş</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-solid ki-cross text-white fs-2hx"></i>
                </div>
            </div>
            <div class="modal-body scroll-y px-10 px-lg-15 pt-5 pb-15">
                <form method="POST" id="kt_modal_new_target_form" class="edit_form">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="row g-9 mb-8">
                                <div class="fv-row mb-7 col-12">
                                    <label class="required fw-semibold fs-6 mb-2" for="name">Müştəri adı</label>
                                    <input type="text" name="name" class="form-control  mb-3 mb-lg-0"
                                           placeholder="Adı" id="name"/>
                                    <ul class="mt-3 name-error"></ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-6">
                            <div class="row g-9 mb-8">
                                <div class="fv-row mb-7 col-12">
                                    <label class="required fw-semibold fs-6 mb-2" for="country">Ölkə</label>
                                    <select name="country" id="country" class="form-control mb-3 mb-lg-0">
                                        @foreach($countries as $country)
                                            <option value="{{$country->code}}">{{getCountryName($country->code)}}</option>
                                        @endforeach
                                    </select>
                                    <ul class="mt-3 country-error text-danger"></ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-6">
                            <div class="row g-9 mb-8">
                                <div class="fv-row mb-7 col-12">
                                    <label class="required fw-semibold fs-6 mb-2" for="category">Kateqoriya</label>
                                    <select name="category" id="category" class="form-control mb-3 mb-lg-0">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <ul class="mt-3 category-error text-danger"></ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="row g-9 mb-8">
                                <div class="fv-row mb-7 col-12">
                                    <label class="required fw-semibold fs-6 mb-2" for="address">Baş ofisin ünvanı</label>
                                    <textarea name="address" class="form-control  mb-3 mb-lg-0" placeholder="Baş ofisin ünvanı" id="address"></textarea>
                                    <ul class="mt-3 address-error text-danger"></ul>
                                </div>
                            </div>
                        </div>
                        <hr><h3 class="text-center">Giriş Məlumatları</h3><hr>
                        <div class="col-12 col-lg-12">
                            <div class="row g-9 mb-4">
                                <div class="fv-row mb-7 col-12">
                                    <label class="required fw-semibold fs-6 mb-2" for="email">Email</label>
                                    <input type="email" name="email" class="form-control  mb-3 mb-lg-0"
                                           placeholder="Email" id="email"/>
                                    <ul class="mt-3 email-error text-danger"></ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-6">
                            <div class="row g-9 mb-4">
                                <div class="fv-row mb-7 col-12">
                                    <label class="fw-semibold fs-6 mb-2" for="password">Şifrə</label>
                                    <input type="password" name="password" class="form-control  mb-3 mb-lg-0"
                                           placeholder="Şifrə" id="password"/>
                                    <ul class="mt-3 password-error text-danger"></ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-6">
                            <div class="row g-9">
                                <div class="fv-row col-12">
                                    <label class="fw-semibold fs-6 mb-2" for="password_confirmation">Şifrə təkrarı</label>
                                    <input type="password" name="password_confirmation" class="form-control  mb-3 mb-lg-0"
                                           placeholder="Şifrə təkrarı" id="password_confirmation"/>
                                    <ul class="mt-3 password_confirmation-error text-danger"></ul>
                                </div>
                            </div>
                        </div>
                        <span class="text-info">Şifrə dəyişmək istəmirsinizsə, boş buraxın</span>
                        <!--begin::Actions-->
                        <div class="text-center mt-5">
                            <button type="button" id="edit_modal_btn" class="btn btn-primary">
                                <span class="indicator-label">Yadda saxla</span>
                            </button>
                            <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Sıfırla</button>
                        </div>
                    </div>
                    <input type="hidden" name="id" id="id">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
