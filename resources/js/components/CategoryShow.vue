<template>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>  {{category.title}}</h2>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            category: {}
        }
    },
    mounted(){
        this.showCategory()

    },
    methods: {
        async showCategory(){
            await this.axios.get(`/api/category/${this.$route.params.id}`).then(response=>{
                this.category = response.data.category
            }).catch(error=>{
                console.log(error)
            })
        },
    }
}
</script>
