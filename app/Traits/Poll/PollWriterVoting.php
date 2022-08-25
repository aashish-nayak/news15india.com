<?php
namespace App\Traits\Poll;

use Illuminate\Support\Facades\Session;
use App\Models\Poll;
use Jorenvh\Share\ShareFacade;

trait PollWriterVoting
{
    /**
     * Drawing the poll for checkbox case
     *
     * @param Poll $poll
     */
    public function drawCheckbox(Poll $poll)
    {
        $options = $poll->options->pluck('name', 'id');
        $poll->views += 1;
        $poll->save();
        $sharePoll = ShareFacade::page(route('poll',$poll->id))
        ->facebook()
        ->twitter()
        ->whatsapp()
        ->linkedin()
        ->getRawLinks();
        echo view(config('larapoll_config.checkbox') ? config('larapoll_config.checkbox') :  'components.poll-stub.checkbox', [
            'id' => $poll->id,
            'question' => $poll->question,
            'options' => $options,
            'sharePoll' => $sharePoll,
        ]);
    }

    /**
     * Drawing the poll for the radio case
     *
     * @param Poll $poll
     */
    public function drawRadio(Poll $poll)
    {
        $options = $poll->options->pluck('name', 'id');
        $poll->views += 1;
        $poll->save();
        $sharePoll = ShareFacade::page(route('poll',$poll->id))
            ->facebook()
            ->twitter()
            ->whatsapp()
            ->linkedin()
            ->getRawLinks();
        echo view(config('larapoll_config.radio') ? config('larapoll_config.radio') :'components.poll-stub.radio', [
            'id' => $poll->id,
            'question' => $poll->question,
            'options' => $options,
            'sharePoll' => $sharePoll,
        ]);
    }
}
