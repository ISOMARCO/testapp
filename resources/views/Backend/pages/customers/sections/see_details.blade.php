<div class="modal fade" id="see_customer" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered min-w-1000px">
        <div class="modal-content rounded">
            <div class="modal-header pb-md-5 border-0 justify-content-end bg-primary">
                <h2 class="w-100 text-start modal-title text-white">Müştəri</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-solid ki-cross text-white fs-2hx"></i>
                </div>
            </div>
            <div class="modal-body scroll-y px-10 px-lg-15 pt-5 pb-15">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row g-9 mb-8">
                            <div class="fv-row mb-4 col-12">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2" for="name_surname">Müştəri ad</label>
                                <input type="text" name="name" class="form-control  mb-3 mb-lg-0"
                                       placeholder="Ad" id="name" disabled="disabled"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6">
                        <div class="row g-9 mb-8">
                            <div class="fv-row mb-4 col-12">
                                <label class="fw-semibold fs-6 mb-2" for="country">Ölkə</label>
                                <input type="text" name="surname" class="form-control  mb-3 mb-lg-0"
                                       placeholder="Ölkə" id="country" disabled="disabled"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6">
                        <div class="row g-9 mb-8">
                            <div class="fv-row mb-4 col-12">
                                <label class="fw-semibold fs-6 mb-2" for="category">Kateqoriya</label>
                                <select name="category" id="category" class="form-control mb-3 mb-lg-0" disabled="disabled">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-12">
                        <div class="row g-9 mb-8">
                            <div class="fv-row mb-4 col-12">
                                <label class="fw-semibold fs-6 mb-2" for="address">Baş ofisin ünvanı</label>
                                <textarea name="address" class="form-control  mb-3 mb-lg-0" placeholder="Baş ofisin ünvanı" id="address" disabled="disabled"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-12">
                        <div class="row g-9 mb-4">
                            <div class="fv-row mb-4 col-12">
                                <label class="fw-semibold fs-6 mb-2" for="email">Email</label>
                                <input type="email" name="email" class="form-control  mb-3 mb-lg-0"
                                       placeholder="Email" id="email" disabled="disabled"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
