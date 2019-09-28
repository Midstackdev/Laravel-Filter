<?php

namespace App\Filters\Course;

use App\Filters\FiltersAbstract;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Filters\Course\{AccessFilter, DifficultyFilter};

class CourseFilters extends FiltersAbstract
{
	protected $filters = [
		'access' => AccessFilter::class,
		'difficulty' => DifficultyFilter::class,
		'type' => TypeFilter::class,
	];
}