@auth
    <a href="javascript:void(0)" data-creator-follow="{{ $followable->id }}" style="font-size:1.2rem;" class="btn btn-primary font-weight-bold my-2 follow">@if($followable->isFollowedBy(auth('web')->user())){{'Unfollow'}}@else{{'Follow'}}@endif</a>
@else
    <a href="{{ route('login',['redirect_to'=>url()->current()]) }}" style="font-size:1.2rem;" class="btn btn-primary font-weight-bold my-2 follow">Follow</a>
@endauth

@push(config('follow.push_js'))
<script>
    $(document).on('click','.follow[data-creator-follow]',function (e) {
        let creator = $(this).data('creator-follow'),
        url = "{{ route('follow') }}",
        obj = {
            _token: "{{ csrf_token() }}",
            creator_id : creator
        };
        $.ajax({
            url: url,
            type: "POST",
            data: obj,
            success: function(response) {
                if(response.status == 'success'){
                    $(".follow").text((response.is_follower==true)?'Unfollow':'Follow');
                }else{
                    alert(response.message);
                }
            }
        });
    });
</script>
@endpush