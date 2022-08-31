@if ($status == 1)
<div class="badge rounded-pill text-success bg-light-success cursor-pointer text-uppercase status" data-id="{{$id}}" title="Change Status"><i class="bx bxs-circle align-middle me-1"></i>Active</div>
@else
<div class="badge rounded-pill text-danger bg-light-danger cursor-pointer text-uppercase status" data-id="{{$id}}" title="Change Status"><i class="bx bxs-circle align-middle me-1"></i>Inactive</div>
@endif
