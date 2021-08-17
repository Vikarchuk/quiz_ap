<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div><h3>{{ test.title }}</h3></div>
                <div class="card" v-for="question in questions">
                    <div class="card-header">{{ question.id }}</div>
                    <div class="card-body" >
                        {{ question.description }}
                        <button @click="getAnswers(question.id)">Show answers</button>
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
        async getAnswers(id){
            await this.axios.get(`/api/test/${this.$route.params.id}`).then(response=>{
                this.test = response.data.test
                this.questions = response.data.questions
            }).catch(error=>{
                console.log(error)
            })
        },
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
