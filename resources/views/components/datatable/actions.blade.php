<div class="row row-cols-2 order-actions justify-content-center gap-1">
    @if (!empty($edit))
    {{-- @permission($editPermission) --}}
    <a href="{{ route($edit, $item->id) }}" class="col edit-category border border-dark" title="Edit"><i class="bx bxs-edit"></i></a>
    {{-- @endpermission --}}
    @endif

    @if (!empty($delete))
    {{-- @permission($deletePermission) --}}
    <a href="{{ route($delete, $item->id) }}" class="col delete text-danger border border-dark" title="Trash"><i class="bx bxs-trash"></i></a>
    {{-- @endpermission --}}
    @endif

    @if (!empty($view))
    {{-- @permission($viewPermission) --}}
    <a href="{{ route($view, $viewParam) }}" class="col text-dark border border-dark" @if(!isset($current)) target="_blank" @endif><i class="bx bxs-show"></i></a>
    {{-- @endpermission --}}
    @endif

    @if (!empty($download))
    {{-- @permission($downloadPermission) --}}
    <a href="javascript:void(0)" class="col text-dark border border-dark"><i class="bx bxs-download"></i></a>
    {{-- @endpermission --}}
    @endif
    
    @isset($extra)
    {!! $extra !!}
    @endisset
</div>