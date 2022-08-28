<?php

namespace App\Models;

use App\Traits\Poll\Votable;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use Votable;

    protected $guarded = [];

    protected $table = 'options';
    /**
     * An option belongs to one poll
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }

    /**
     * Check if the option is Closed
     *
     * @return bool
     */
    public function isPollClosed()
    {
        return $this->poll->isLocked();
    }
}
