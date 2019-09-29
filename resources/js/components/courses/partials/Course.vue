<template>
	<div class="media mb-2">
	  <img class="mr-3" src="https://via.placeholder.com/84" alt="Generic placeholder image">
	  <div class="media-body">
	  	<ul class="list-inline" v-if="course.subjects">
	    	<li class="list-inline-item" v-for="subject in course.subjects">{{subject.name}}</li>
	    </ul>
	    <h5 class="mt-0">{{course.name}}</h5>
	    <ul class="list-inline">
	    	<li class="list-inline-item">{{course.formattedAccess}}</li>
	    	<li class="list-inline-item">{{course.formattedDifficulty}}</li>
	    	<li class="list-inline-item">{{course.formattedType}}</li>
	    	<li class="list-inline-item">{{course.formattedStarted}}</li>
	    </ul>
	  </div>
	</div>
</template>

<script>
	export default {
		props: ['course']
	}
</script>