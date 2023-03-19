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
            'clicks' => 0,
            'likes' => 0,
            'dislikes' => 0,
            'comments' => 0,
        ]);
    }

    public function registerIp()
    {
        if(Visitor::where('ip',request()->getClientIp())->count() == 0){
            $data = [
                'ip' => request()->getClientIp(),
                'clicks' => 1,
            ];
            if(auth('web')->check() == true){
                $data['user_id'] = auth('web')->user()->id;
            }
            return Visitor::create($data);
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

    public function getClicks()
    {
        return $this->statistics->clicks;
    }

    public function getLikes()
    {
        return $this->statistics->likes;
    }

    public function getEditableClicks()
    {
        return $this->statistics->editable_clicks;
    }

    public function frontViews()
    {
        if($this->statistics != null && $this->getEditableViews() > 0){
            return $this->getEditableViews();
        }
        return $this->getViews();
    }

    public function frontClicks()
    {
        if($this->statistics != null && $this->getEditableClicks() > 0){
            return $this->getEditableClicks();
        }
        return $this->getClicks();
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

    public function likeUp($ipId, $counts = 1)
    {
        $this->updatedStats(['likes' => $this->statistics->likes + $counts]);
        $this->visitorsRelation()->sync([$ipId => ['is_like'=>1]]);
        return 1;
    }

    public function likeDown($ipId, $counts = 1)
    {
        $this->updatedStats(['likes' => $this->statistics->likes - $counts]);
        $this->visitorsRelation()->sync([$ipId => ['is_like'=>0]]);
        return 0;
    }

    public function isLiked($isCheck = false)
    {
        $ipId = $this->registerIp()->id;
        $check = $this->visitorsRelation()->withPivot('is_like')->where('visitor_id',$ipId)->first()->pivot->is_like;
        if($isCheck == true){
            return $check;
        }
        if($check == 1){
            return $this->likeDown($ipId);
        }else{
            return $this->likeUp($ipId);
        }
    }

    public function clicksUp($counts = 1)
    {
        $this->updatedStats(['clicks' => $this->statistics->clicks + $counts]);
        return $this;
    }

    public function editableViewsUp($counts = 1)
    {
        $this->updatedStats(['editable_views' => $counts]);
        return $this;
    }

    public function editableClicksUp($counts = 1)
    {
        $this->updatedStats(['editable_clicks' => $counts]);
        return $this;
    }

}
