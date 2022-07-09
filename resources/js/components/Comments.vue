<template>
    <div class="form-group row mt-4 mb-4">
        <div class="col-auto">
            <input type="text" name="userName" class="form-control"
                   :class="hasError('name') ? 'is-invalid' : ''" placeholder="Podaj nazwę " v-model="formData.name">
            <div v-if="hasError('name')" class="invalid-feedback">
                {{getError('name')}}
            </div>
        </div>
    </div>
        <textarea name="comment" class="form-control mb-1" :class="hasError('comment') ? 'is-invalid' : ''"
                  rows="2" placeholder="Komenatrz" v-model="formData.comment"></textarea>
        <div v-if="hasError('comment')" class="invalid-feedback">
            {{getError('comment')}}
        </div>
        <button class="btn btn-success" style="float: right;" @click="addComment">Wyślij</button>

    <div class="container mt-5"  v-for="(comment, index) in comments" :key="index">
        <div class="justify-content-between d-flex">
            <div>
                <h5>{{comment.name}}</h5>
                <p>{{comment.created_at}}</p>
                <p>
                    {{comment.comment}}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['postid'],
    data() {
        return {
            comments: {},
            formData: {
                comment: '',
                post_id: this.postid,
                name: ''
            },
            errors: [],
        }
    },
    mounted() {
        this.getComments()
    },
    methods: {
        addComment() {
            axios.post('comment/store', this.formData).then((response) => {
                this.formData.comment = ''
                this.formData.name = ''
                this.getComments()
            }).catch((error) => {
                this.errors = error.response.data.errors;
            })
        },
        getComments() {
            axios.get('getComments/' + this.postid).then((response) => {
                this.comments = response.data
            }).catch((errors) => {
               // console.log(errors)
            });
        },
        hasError(fieldName){
            return (fieldName in this.errors);
        },
        getError(fieldName){
            return this.errors[fieldName][0];
        },
    }
}
</script>
