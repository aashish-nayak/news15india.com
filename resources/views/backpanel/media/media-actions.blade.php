<div class="card-header py-2">
    <button id="uploadBtn" class="btn btn-sm btn-dark d-inline mb-2 mb-md-0 rounded-0"><i class="bx bx-save"></i>Upload</button>
    <button data-bs-toggle="modal" data-bs-target="#downloadModal" class="btn btn-sm btn-dark d-inline mb-2 mb-md-0 rounded-0"><i class="bx bx-cloud-download"></i>Download</button>
    {{-- <button id="" class="btn btn-sm btn-dark d-inline mb-2 mb-md-0 rounded-0"><i class="bx bx-folder"></i>Create Folder</button> --}}
    <button id="refreshMedia" class="btn btn-sm btn-dark d-inline mb-2 mb-md-0 rounded-0"><i class="bx bx-refresh"></i>Refresh</button>
    <div class="dropdown d-inline"> 
        <a href="#" class="btn btn-dark btn-sm mb-2 mb-md-0 rounded-0 radio_option dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bx bx-filter-alt"></i>Filter(<span id="filter"><i class="bx bx-recycle"></i>Everything</span>)<i class="bx bxs-chevron-down ms-1"></i>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item filter" type="button" data-filter="all"><i class="bx bx-recycle"></i> Everything</a>
            <a class="dropdown-item filter" type="button" data-filter="image"><i class="bx bxs-image-alt"></i> Image</a>
            <a class="dropdown-item filter" type="button" data-filter="audio"><i class="bx bxs-music"></i> Audio</a>
            <a class="dropdown-item filter" type="button" data-filter="video"><i class="bx bxs-video"></i> Video</a>
            <a class="dropdown-item filter" type="button" data-filter="application"><i class="bx bxs-file"></i> Document</a>
        </div>
    </div>
    {{-- <div class="dropdown d-inline"> 
        <a href="#" class="btn btn-dark btn-sm mb-2 mb-md-0 rounded-0 radio_option dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bx bx-show"></i><span id="view">View in(<i class="bx bx-globe"></i>All Media)</span><i class="bx bxs-chevron-down ms-1"></i></a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="javascript:void(0)"><i class="bx bx-globe"></i> All Media</a>
            <a class="dropdown-item" href="javascript:void(0)"><i class="bx bxs-trash"></i> Trash</a>
            <a class="dropdown-item" href="javascript:void(0)"><i class="bx bxs-time-five"></i> Recent</a>
            <a class="dropdown-item" href="javascript:void(0)"><i class="bx bxs-star"></i> Favorites</a>
        </div>
    </div> --}}
    {{-- <div class="d-inline">
        <div class="input-group input-group-sm"> 
            <input type="text" class="form-control" placeholder="People, groups, &amp; messages">
            <span class="input-group-text bg-transparent">
                <i class="bx bx-search"></i>
            </span>
        </div>
    </div> --}}
</div>
<div class="bottom-header media-actions px-4 py-3 border-top border-bottom">
    <div class="row align-items-center">
        <div class="col-md-8">
            <nav style="--bs-breadcrumb-divider: '/';font-size:12px" aria-label="breadcrumb">
                {{-- <ul class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Library</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ul> --}}
                <div class="items-loaded mt-1">
                    <p class="m-0"><span id="loadedItems" class="fw-bold"></span> Items Loaded out of <span id="totalItems" class="fw-bold"></span></p>
                </div>
            </nav>
        </div>
        <div class="col-md-4 text-md-end mt-2 mt-md-0">
            <div class="dropdown d-inline me-md-2"> 
                <a href="#" class="btn btn-outline-secondary btn-sm rounded-0 radio_option dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown" aria-expanded="false">
                    Sort <i class="bx bx-sort"></i>
                </a>
                <div class="dropdown-menu mb-2 mb-md-0" style="font-size: 13px">
                    <a class="dropdown-item sort" type="button" data-sort="created_at,desc"><i class="bx bx-sort-down"></i> Uploaded date - Latest</a>
                    <a class="dropdown-item sort" type="button" data-sort="created_at,asc"><i class="bx bx-sort-up"></i> Uploaded date - Oldest</a>
                    <a class="dropdown-item sort" type="button" data-sort="filename,desc"><i class="bx bx-sort-z-a"></i> File name - DESC</a>
                    <a class="dropdown-item sort" type="button" data-sort="filename,asc"><i class="bx bx-sort-a-z"></i> File name - ASC</a>
                </div>
            </div>
            <div class="dropdown d-inline me-md-2"> 
                <a type="button" class="btn btn-outline-secondary btn-sm rounded-0 radio_option dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown" aria-expanded="false">
                    <span id="selectedFiles" class="fw-bold"></span> Actions<i class="bx bx-dots-vertical-rounded"></i>
                </a>
                <div class="dropdown-menu mb-2 mb-md-0" style="font-size: 13px">
                    <a class="dropdown-item action-preview" type="button"><i class="bx bx-show"></i> Preview</a>
                    <a class="dropdown-item action-copy" type="button"><i class="bx bx-link"></i> Copy link</a>
                    <a class="dropdown-item action-rename" type="button"><i class="bx bx-rename"></i> Rename</a>
                    {{-- <a class="dropdown-item" type="button"><i class="bx bx-copy"></i> Make a copy</a> --}}
                    {{-- <a class="dropdown-item" type="button"><i class="bx bx-star"></i> Add to favorite</a> --}}
                    <a class="dropdown-item action-download" type="button"><i class="bx bx-download"></i> Download</a>
                    <a class="dropdown-item action-moveToTrash" type="button"><i class="bx bx-trash"></i> Move to trash</a>
                </div>
            </div>
            <div class="btn-group me-md-3" role="group" aria-label="First group">
                <button type="button" class="btn btn-sm btn-outline-secondary file-view" data-view="grid" style="border-radius: 0%"><span class="fw-bold lni lni-grid"></span></button>
                <button type="button" class="btn btn-sm btn-outline-secondary file-view" data-view="list" style="border-radius: 0%"><span class="fw-bold lni lni-list"></span></button>
            </div>
            <a class="text-primary accod-btn" type="button" data-bs-toggle="collapse" data-bs-target="#MediaSidebar" aria-expanded="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out text-primary"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
            </a>
        </div>
    </div>
</div>