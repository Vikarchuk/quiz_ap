<template>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>  {{category.title}}</h2>
            </div>
        </div>
        <div>
            <h2 class="text-center">Tests List</h2>

            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Performance time</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="test in tests" :key="test.id">
                    <td><router-link :to="{name: 'test', params: { id: test.id }}" class="btn btn-success">{{ test.id }}</router-link></td>
                    <td>{{ test.title }}</td>
                    <td>{{ test.performance_time }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            category: {},
            tests: []
        }
    },
    mounted(){
        this.showCategory()

    },
    methods: {
        async showCategory(){
            await this.axios.get(`/api/category/${this.$route.params.id}`).then(response=>{
                this.category = response.data.category
                this.tests =  response.data.tests
            }).catch(error=>{
                console.log(error)
            })
        },
    }
}
</script>
