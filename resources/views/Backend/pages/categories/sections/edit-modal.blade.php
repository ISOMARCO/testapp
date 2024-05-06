<!--begin::Modal - New Target-->
<div class="modal fade" id="edit_category" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered min-w-1000px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-md-5 border-0 justify-content-end bg-primary">
                <!--begin::Title-->
                <h2 class="w-100 text-start modal-title text-white">Kateqoriya dəyiş</h2>
                <!-- Title added here -->
                <!--end::Title-->

                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-solid ki-cross text-white fs-2hx"></i>
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-5 pb-15">
                <!--begin:Form-->
                <form id="kt_modal_new_target_form" class="form">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <!--begin::Input group-->
                            <div class="row g-9 mb-8">
                                <div class="fv-row mb-7 col-12">
                                    <!--begin::Label-->
                                    <label
                                        class="required fw-semibold fs-6 mb-2">Kateqoriya adı</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="name" class="form-control  mb-3 mb-lg-0" id="name"
                                           placeholder="Kateqoriya adı" value=""/>
                                    <!--end::Input-->
                                </div>

                                <!--end::Input group-->
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="text-center mt-5">
                            <button type="button" id="kt_modal_new_target_submit" class="btn btn-primary">
                                <span class="indicator-label">Yadda saxla</span>
                                <span class="indicator-progress">Zəhmət olmasa gözləyin...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <button type="reset" id="kt_modal_new_target_cancel"
                                    class="btn btn-light me-3">Sıfırla</button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <input type="hidden" value="" id="id">
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Target-->
