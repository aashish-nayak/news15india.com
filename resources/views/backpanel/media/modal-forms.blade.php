<form action="{{ Route('admin.media.create') }}" method="post" id="upload-form" enctype="multipart/form-data">
    @csrf
    <input type="file" class="" hidden name="file[]" multiple id="uploader">
</form>
<form action="{{ route('admin.media.rename') }}" method="POST" id="renameForm">
    <div class="modal fade" id="renameModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content modal-content-2">
                <div class="modal-header modal-header-2">
                    <h5 class="modal-title"><i class="bx bx-rename"></i> Rename</h5>
                    <button type="button" class="renameModalClose" aria-label="Close"><i class="fs-18 bx bx-x"></i></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div id="renameInputsWrapper">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary" id="renameFormSubmit">Save changes</button>
                    <button type="button" class="btn btn-sm btn-secondary renameModalClose">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
<form action="{{ route('admin.media.download') }}" method="POST" id="downloadForm">
    <div class="modal fade" id="downloadModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-content-2">
                <div class="modal-header modal-header-2">
                    <h5 class="modal-title"><i class="bx bx-cloud-download"></i> Download</h5>
                    <button type="button" class="downloadModalClose" aria-label="Close"><i class="fs-18 bx bx-x"></i></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <textarea class="form-control form-control-sm" required name="download"
                        placeholder="https://example.com/image.jpg
https://example.com/image2.jpg
https://example.com/image3.jpg
..."
                        rows="4"></textarea>
                    <div class="alert alert-info border-0 shadow-none rounded-0 px-2 py-2 bg-light-info show mb-0 mt-2"
                        style="cursor: help">
                        <div class="d-flex align-items-center">
                            <div class="font-14 text-dark"><i class="bx bx-info-circle fw-bold"></i>
                            </div>
                            <div class="ms-2">
                                <div style="font-size: 12px" class="text-dark fw-bold"> Enter one URL per line.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary" id="downloadFormSubmit">
                        Download
                    </button>
                    <button type="button" class="btn btn-sm btn-secondary downloadModalClose">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
