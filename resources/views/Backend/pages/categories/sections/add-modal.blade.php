<!--begin::Modal - New Target-->
<div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered min-w-1000px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-md-5 border-0 justify-content-end bg-primary">
                <!--begin::Title-->
                <h2 class="w-100 text-start modal-title text-white">
                    Add new category</h2>
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
                <form id="kt_modal_new_target_form" class="form" action="">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <!--begin::Input group-->
                            <div class="row g-9 mb-8">
                                <div class="fv-row mb-7 col-6">
                                    <!--begin::Label-->
                                    <label
                                        class="required fw-semibold fs-6 mb-2">Firstname</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="first_name" class="form-control  mb-3 mb-lg-0"
                                           placeholder="Firstname" />
                                    <!--end::Input-->
                                </div>
                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-6">
                                    <!--begin::Label-->
                                    <label
                                        class="required fw-semibold fs-6 mb-2">Lastname</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="last_name" class="form-control  mb-3 mb-lg-0"
                                           placeholder="Lastname" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input-->
                                <div class="fv-row mb-7 col-4">
                                    <!--begin::Label-->
                                    <label
                                        class="required fw-semibold fs-6 mb-2">Father name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="father_name" class="form-control  mb-3 mb-lg-0"
                                           placeholder="Father name" />
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7 col-4">
                                    <!--begin::Label-->
                                    <label
                                        class="fw-semibold fs-6 mb-2 required">Phone</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="phone" class="form-control  mb-3 mb-lg-0"
                                           placeholder="Phone" />
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7 col-4">
                                    <label
                                        class="fw-semibold fs-6 mb-2 required">Working department</label>
                                    <select id="department-select" class="form-select form-select-solid"
                                            name="department_id">
                                        <option value="0">
                                            None</option>
                                    </select>
                                </div>
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label
                                        class="required fw-semibold fs-6 mb-2">Email</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="email" name="email" class="form-control  mb-3 mb-lg-0"
                                           placeholder="Email" />
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label
                                        class="required fw-semibold fs-6 mb-2">Password</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="password" name="password" class="form-control  mb-3 mb-lg-0"
                                           placeholder="Password" />
                                    <!--end::Input-->
                                </div>

                                <!--end::Input group-->
                                <div class="mb-5 role-section">
                                    <!--begin::Label-->


                                </div>

                                <!--end::Input group-->
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="text-center mt-5">
                            <button type="button" id="kt_modal_new_target_submit" class="btn btn-primary">
                                <span class="indicator-label">Save</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <button type="reset" id="kt_modal_new_target_cancel"
                                    class="btn btn-light me-3">Cancel</button>
                        </div>
                        <!--end::Actions-->
                    </div>
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
