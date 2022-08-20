<?php

namespace App\Traits;

use App\Models\Statistic;

trait Staticable
{

    public function statistics()
    {
        return $this->hasOne(Statistic::class, 'staticable_id')->where('staticable_type', get_class($this));
    }

    public function checkRelationExists()
    {
        if (!$this->statistics()->exists()) {
            return false;
        }
        return true;
    }

    public function stats(array $attributes = [])
    {
        if($attributes == []) {
            return $this->statistics()->first();
        }
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


    public function getView()
    {
        return $this->stats()->views;
    }
    
    public function getEditableView()
    {
        return $this->stats()->editable_views;
    }

    public function viewsUp($counts = 1)
    {
        $views = ($this->statistics != null)? $this->statistics->views + $counts : $counts;
        $this->stats(['views' => $views]);
        return $this;
    }

    public function editableViewsUp($counts = 1)
    {
        $views = ($this->statistics != null)? $this->statistics->editable_views + $counts : $counts;
        $this->stats(['editable_views' => $views]);
        return $this;
    }
}
