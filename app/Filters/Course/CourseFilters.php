<?php

namespace App\Filters\Course;

use App\Filters\Course\Ordering\ViewsOrder;
use App\Filters\Course\{AccessFilter, DifficultyFilter, TypeFilter, SubjectFilter, StartedFilter};
use App\Filters\FiltersAbstract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CourseFilters extends FiltersAbstract
{
	protected $filters = [
		'access' => AccessFilter::class,
		'difficulty' => DifficultyFilter::class,
		'type' => TypeFilter::class,
		'subject' => SubjectFilter::class,
		'started' => StartedFilter::class,
		'views' => ViewsOrder::class,
	];
}