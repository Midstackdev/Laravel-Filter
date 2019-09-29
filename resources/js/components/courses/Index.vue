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
                        <course v-for="course in courses" :course="course" :key="course.id"></course>
                        <pagination :meta="meta" v-on:pagination:switched="getCourses"></pagination>
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
        components: {
            Course,
            Filters,
            Pagination
        },
        mounted() {
            this.getCourses()
        },

        methods: {
            getCourses(page = this.$route.query.page) {
                axios.get('api/courses', {
                    params: {
                        page
                    }
                }).then((res) => {
                    this.courses = res.data.data
                    this.meta = res.data.meta
                })
            }
        }
    }
</script>
