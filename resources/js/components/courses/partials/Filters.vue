<template>
	<div class="filters">
		<div class="list-group mb-3" v-for="map, key in filters">
		  <a href="#" 
		  	class="list-group-item list-group-item-action"
		  	:class="{ 'active' : selectedFilters[key] === value }"
		  	v-for="filter,  value in map"
		  	@click.prevent="activateFilter(key, value)"
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
				filters: {},
				selectedFilters: _.omit(this.$route.query, ['page'])
			}
		},

		mounted() {
			axios.get(this.endpoint).then((res) => {
				this.filters = res.data.data
			})
		},

		methods: {
			activateFilter(key, value) {
				this.selectedFilters = Object.assign({}, this.selectedFilters, {[key] : value})

				this.$router.replace({
					query: {
						...this.selectedFilters,
						page: 1
					}
				})
			}
		}
	}
</script>