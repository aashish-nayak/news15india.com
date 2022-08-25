<?php
namespace App\Traits\Poll;


use App\Models\Poll;
use Jorenvh\Share\ShareFacade;

trait PollWriterResults
{
    /**
     * Draw the results of voting
     *
     * @param Poll $poll
     */
    public function drawResult(Poll $poll)
    {
        $total = $poll->votes->count();
        $results = $poll->results()->grab();
        $sharePoll = ShareFacade::page(route('poll',$poll->id))
        ->facebook()
        ->twitter()
        ->whatsapp()
        ->linkedin()
        ->getRawLinks();
        $options = collect($results)->map(function ($result) use ($total){
                return (object) [
                    'votes' => $result['votes'],
                    'percent' => $total === 0 ? 0 : ($result['votes'] / $total) * 100,
                    'name' => $result['option']->name,
                ];
        });
        $question = $poll->question;
        echo view(config('larapoll_config.results') ? config('larapoll_config.results') : 'components.poll-stub.results', compact('options', 'question','sharePoll'));
    }
}
