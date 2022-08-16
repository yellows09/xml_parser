<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';
    protected $guarded = [];
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function dealer(){
        return $this->belongsTo(Dealer::class);
    }
    public function generation(){
        return $this->belongsTo(Generation::class);
    }
    public function model(){
        return $this->belongsTo(ModelCar::class);
    }
    public function modification(){
        return $this->belongsTo(Modification::class);
    }
    public function bodyConfiguration(){
        return $this->belongsTo(BodyConfiguration::class);
    }
}
