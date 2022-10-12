@if(isset($element) && $element == 'switch')
<div class="form-check form-switch cursor-pointer py-2">
    <input class="form-check-input status" style="width:2.3em;height:1.2em" type="checkbox" name="status" @if ($status == 1) checked @endif data-url="{{$url}}" id="switch-{{$id}}" value="{{$id}}">
    <label class="form-check-label fw-bold ps-2 cursor-pointer" for="switch-{{$id}}">@if ($status == 1) Active @else Inactive @endif</label>
</div>
@else
@if ($status == 1)
<div class="badge rounded-pill text-success bg-light-success cursor-pointer text-uppercase status" data-id="{{$id}}" title="Change Status"><i class="bx bxs-circle align-middle me-1"></i>Active</div>
@else
<div class="badge rounded-pill text-danger bg-light-danger cursor-pointer text-uppercase status" data-id="{{$id}}" title="Change Status"><i class="bx bxs-circle align-middle me-1"></i>Inactive</div>
@endif
@endif
