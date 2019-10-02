<template>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <filters endpoint="/api/courses/filters"></filters>
            </div>
             <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Courses</div>

                    <div class="card-body">
                        <template v-if="courses.length">
                            <course v-for="course in courses" :course="course" :key="course.id"></course>
                            <pagination :meta="meta"></pagination>
                        </template>

                        <template v-else>
                            No results found
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Course from './partials/Course' 
    import Filters from './partials/Filters' 
    import Pagination from '../pagination/Pagination' 
    export default {
        data() {
            return {
                courses: [],
                meta: {}
            }
        },

        watch: {
            '$route.query' : {
                handler (query) {
                    this.getCourses(1, query)
                },

                deep: true
            }
        },

        components: {
            Course,
            Filters,
            Pagination
        },
        mounted() {
            this.getCourses()
        },

        methods: {
            getCourses(page = this.$route.query.page, query = this.$route.query) {
                axios.get('/api/courses', {
                    params: {
                        page,
                        ...query
                    }
                }).then((res) => {
                    this.courses = res.data.data
                    this.meta = res.data.meta
                })
            }
        }
    }
</script>
