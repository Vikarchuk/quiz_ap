<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ test.title }}</div>

                    <div class="card-body">
                        {{ questions[0].description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            test: {},
            questions: []
        }
    },
    mounted(){
        this.showTest()

    },
    methods: {
        async showTest(){
            await this.axios.get(`/api/test/${this.$route.params.id}`).then(response=>{
                this.test = response.data.test
                this.questions = response.data.questions
            }).catch(error=>{
                console.log(error)
            })
        },
    }
}
</script>

<style scoped>

</style>
