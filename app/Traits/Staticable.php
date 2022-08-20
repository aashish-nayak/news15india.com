<?php

namespace App\Traits;

use App\Models\Statistic;

trait Staticable
{

    public function statistics()
    {
        return $this->hasOne(Statistic::class, 'staticable_id')->where('staticable_type', get_class($this));
    }

    public function updatedStats(array $attributes = [])
    {
        $instance = [
            'staticable_id' => $this->id,
            'staticable_type' => get_class($this),
        ];
        if($this->statistics != null) {
            $this->statistics()->update(array_merge($instance, $attributes));
        } else {
            $this->statistics()->create(array_merge($instance,$attributes));
        }
        return $this;
    }


    public function getViews()
    {
        return $this->statistics()->select('views')->first()->views;
    }
    
    public function getEditableViews()
    {
        return $this->statistics()->select('editable_views')->first()->editable_views;
    }

    public function frontViews()
    {
        if($this->statistics != null && $this->getEditableViews() > 0){
            return $this->getEditableViews();
        }
        return $this->getViews();
    }

    public function viewsUp($counts = 1)
    {
        $views = ($this->statistics != null)? $this->statistics->views + $counts : $counts;
        $this->updatedStats(['views' => $views]);
        return $this;
    }

    public function editableViewsUp($counts = 1)
    {
        $views = ($this->statistics != null)? $this->statistics->editable_views + $counts : $counts;
        $this->updatedStats(['editable_views' => $views]);
        return $this;
    }

    public function editableViewsDown()
    {
        $this->updatedStats(['editable_views' => 0]);
        return $this;
    }
}
