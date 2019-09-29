<?php

namespace App;

use App\Filters\Course\CourseFilters;
use App\Subject;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	protected $appends = [
		'started',
        'formattedAccess',
        'formattedDifficulty',
        'formattedType',
        'formattedStarted',
	];

	protected $hidden = [
		'users'
	];

    public function scopeFilter(Builder $builder, $request, array $filters = [])
    {
    	return (new CourseFilters($request))->add($filters)->filter($builder);
    }

    public function subjects()
    {
    	return $this->morphToMany(Subject::class, 'subjectable');
    }

    public function getFormattedAccessAttribute()
    {
        return $this->free === 1 ? 'Free' : 'Premium';
    }

    public function getFormattedStartedAttribute()
    {
        return $this->started === true ? 'Started' : 'Not started';
    }

    public function getFormattedDifficultyAttribute()
    {
        return ucfirst($this->difficulty);
    } 

    public function getFormattedTypeAttribute()
    {
        return ucfirst($this->type);
    }

    public function getStartedAttribute()
    {
    	if(!auth()->check()) {
    		return false;
    	}

    	return $this->users->contains(auth()->user());
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
