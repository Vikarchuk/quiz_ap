<template>
    <div>
        <h2 class="text-center">Categories List</h2>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="category in categories" :key="category.id">
                <td><router-link :to="{name: 'show', params: { id: category.id }}" class="btn btn-success">{{ category.id }}</router-link></td>
                <td>{{ category.title }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            categories: []
        }
    },
    mounted(){
        this.getCategories()
    },
    methods: {
        async getCategories(){
            await this.axios.get('/api/category').then(response=>{
                this.categories = response.data
            }).catch(error=>{
                console.log(error)
                this.categories = []
            })
        },
    }
}
</script>
