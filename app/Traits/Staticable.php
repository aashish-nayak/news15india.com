<?php

namespace App\Traits;

use App\Models\Statistic;
use App\Models\Visitor;

trait Staticable
{

    public function statistics()
    {
        return $this->hasOne(Statistic::class, 'staticable_id')->where('staticable_type', get_class($this))->withDefault([
            'staticable_type'=> get_class($this),
            'views' => 0,
            'likes' => 0,
            'dislikes' => 0,
            'comments' => 0,
        ]);
    }

    public function registerIp()
    {
        if(Visitor::where('ip',request()->getClientIp())->count() == 0){
            return Visitor::create([
                'ip' => request()->getClientIp(),
                'clicks' => 1,
            ]);
        }else{
            $visitor = Visitor::where('ip',request()->getClientIp())->first();
            $visitor->clicks = $visitor->clicks+1;
            $visitor->save();
            return $visitor;
        }
    }

    public function visitorsRelation()
    {
        return $this->statistics->belongsToMany(Visitor::class,'statistic_visitor', 'statistic_id', 'visitor_id');
    }

    public function visitors()
    {
        return $this->visitorsRelation()->get();
    }

    public function updatedStats(array $attributes = [])
    {
        $this->statistics()->updateOrCreate([
            'staticable_id' => $this->id,
            'staticable_type' => get_class($this),
        ], $attributes);
        $this->refresh();
        return $this;
    }

    public function getViews()
    {
        return $this->statistics->views;
    }
    
    public function getEditableViews()
    {
        return $this->statistics->editable_views;
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
        $ipId = $this->registerIp()->id;
        if($this->visitorsRelation()->where('ip',request()->getClientIp())->count() == 0){
            $this->updatedStats(['views' => $this->statistics->views + $counts]);
            $this->visitorsRelation()->sync([$ipId]);
        }
        return $this;
    }

    public function editableViewsUp($counts = 1)
    {
        $this->updatedStats(['editable_views' => $counts]);
        return $this;
    }

}
