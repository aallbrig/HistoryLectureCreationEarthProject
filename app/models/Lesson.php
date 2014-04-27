<?php 

class Lesson extends Eloquent {

    protected $table = 'lessons';
    public $timestamps = False;
    public function user()
    {
    	return $this->hasOne('User');
    }
    public function hotspots()
		{
			return $this->hasMany('Hotspot');
		}
}