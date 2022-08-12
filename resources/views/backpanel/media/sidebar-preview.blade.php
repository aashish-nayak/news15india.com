<div class="file-details">
    <div class="sidebar-image d-flex align-items-center justify-content-center" id="SideBarImage" data-placeholder-image="{{asset('assets/images/placeholder-image.jpg')}}">

    </div>
    <hr>
    <div class="sidebar-description">
        <div class="mb-1"><b>FileName </b><br><span class="media-title" id="SideBarName">File</span></div>
        <div class="mb-1"><b>Alt : </b><span class="media-size" id="SideBarAlt">Alt Name</span></div>
        <div class="mb-1"><b>Dimesion : </b><span class="media-size" id="SideBarDimension">Dimesion</span></div>
        <div class="mb-1"><b>Size : </b><span class="media-weight" id="SideBarSize">Size</span></div>
        <div class="mb-1"><b>File Type : </b><span class="media-type" id="SideBarType">File Type</span></div>
        <div class="mb-1"><b>Created by : </b><span class="media-type" id="SideBarCreatedBy">Admin</span></div>
        <div class="mb-1"><b>Created at : </b><span class="media-type" id="SideBarCreated">00 00 0000</span></div>
        <div class="mb-1"><b>Updated at : </b><span class="media-type" id="SideBarUpdated">00 00 0000</span></div>
    </div>
    <div class="form-group m-0 mb-1">
        <label class="col-form-label fw-bold" for="input-path">FullPath</label>
        <div class="input-group">
            <input type="text" class="form-control form-control-sm" id="input-path"  name="path" value="" readonly>
            <a type="button" class="input-group-prepend" style="cursor: pointer" onclick="copy()" title="Copy to Clipboard">
                <div class="input-group-text"><i class="fadeIn animated bx bx-clipboard"></i></div>
            </a>
        </div>
    </div>
</div>