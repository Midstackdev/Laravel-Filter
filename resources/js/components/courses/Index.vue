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
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Course from './partials/Course' 
    import Filters from './partials/Filters' 
    export default {
        data() {
            return {
                courses: []
            }
        },
        components: {
            Course,
            Filters
        },
        mounted() {
            axios.get('api/courses').then((res) => {
                this.courses = res.data.data
            })
        }
    }
</script>
