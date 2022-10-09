<div id="seo_wrap" class="card mt-4 col-12">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="header-title m-0" style="font-weight: 600">Search Engine Optimization</h6>
        <a href="javascript:void(0)" id="edit-seo">Edit SEO</a>
    </div>
    <div class="card-body pt-3 pb-4">
        <div class="seo-preview d-none">
            <div class="existed-seo-meta">
                <span class="page-title-seo" id="seo-section-title">@if(isset($page)){{($page->meta_title != '')? $page->meta_title : $page->title;}}@else{{old('title')}}@endif</span>
                <div class="page-url-seo ws-nm">
                    <p id="seo-section-link">{{url('/')}}@isset($page){{'/'.$page->slug}}@endisset{{old('slug')}}</p>
                </div>
                <div class="ws-nm">
                    <span style="color: #70757a;">
                        @isset($page)
                        {{\Carbon\Carbon::parse($page->created_at)->format('M d, Y')}}
                        @else
                        {{\Carbon\Carbon::now()->format('M d, Y')}}
                        @endisset - 
                    </span>
                    <span class="page-description-seo" id="seo-section-desc">@if(isset($page)){{($page->meta_description != '')? $page->meta_description : $page->short_description;}}@else{{old('short_desc')}}@endif</span>
                </div>
            </div>
        </div>
        <div class="seo-edit-section d-none">
            <hr>
            <div class="form-group mb-3">
                <label for="seo_title" class="control-label"><b>SEO Title</b></label>
                <input class="form-control" id="seo_title" placeholder="SEO Title" data-counter="120" value="@if(isset($page)){{$page->meta_title}}@else{{old('meta_title')}}@endif" name="meta_title" type="text">
            </div>
            @error('seo_title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group mb-3">
                <label for="seo_keywords" class="control-label"><b>SEO Keywords</b></label>
                <input class="form-control" id="seo_keywords" data-role="tagsinput" placeholder="SEO Keywords ( , seperated )" data-counter="120" value="@if(isset($page)){{$page->meta_keywords}}@else{{old('meta_keywords')}}@endif" name="meta_keywords" type="text">
            </div>
            @error('seo_keywords')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group mb-3">
                <label for="seo_description" class="control-label"><b>SEO description</b></label>
                <textarea class="form-control" rows="3" id="seo_description" placeholder="SEO description" data-counter="160" name="meta_description" cols="50">@if(isset($page)){{$page->meta_description}}@else{{old('meta_description')}}@endif</textarea>
            </div>
            @error('meta_description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>