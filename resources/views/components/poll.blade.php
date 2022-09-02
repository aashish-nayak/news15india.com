@php
if($poll != null){
    $new = new App\Helpers\PollWriter();
    $new->draw($poll);
}
@endphp
@if($poll == null)
@includeIf('components.poll-stub.no-poll')
@endif