<template>
	<div class="filters">
		<div class="list-group mb-3" v-for="map, key in filters">
		  <a href="#" 
		  	class="list-group-item list-group-item-action"
		  	v-for="filter,  value in map"
		  >
		  	{{filter}}
		  </a>
		</div>
	</div>	
</template>

<script>
	export default {
		props: ['endpoint'],

		data() {
			return {
				filters: {}
			}
		},

		mounted() {
			axios.get(this.endpoint).then((res) => {
				this.filters = res.data.data
			})
		}
	}
</script>