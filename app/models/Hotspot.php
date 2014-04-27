<?php 

class Hotspot extends Eloquent {

    protected $table = 'hotspots';
    public $timestamps = False;
    public function lesson()
    {
    	return $this->hasOne('Lesson');
    }
}