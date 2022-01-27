<template>
    <div class="container"  v-for="(comment, index) in comments" :key="index">
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

    <div v-for="(errorArray, idx) in notifmsg" :key="idx">
        <div v-for="(allErrors, idx) in errorArray" :key="idx">
            <span class="text-danger">{{ allErrors}} </span>
        </div>
    </div>

    <div class="form-group row mt-4 mb-4">
        <div class="col-auto">
            <label for="name">Name</label>
            <input type="text" v-model="formData.name" name="name" class="form-control" placeholder="Enter Name">
        </div>
    </div>
        <textarea name="comment" v-model="formData.comment" class="form-control mb-1" rows="2" placeholder="Write a comment here..."></textarea>
        <button class="btn btn-success float-right" @click="commentStore">Submit Comment</button>
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
            notifmsg: ''
        }
    },
    mounted() {
        this.getComments()
    },
    methods: {
        commentStore() {
            axios.post('comment/store', this.formData).then((response) => {
                console.log(response)
                this.formData.comment = ''
                this.formData.name = ''
                this.getComments()
            }).then(()=> {
            }).catch(e => {
                this.notifmsg = e.response.data
            })
        },
        getComments() {
            axios.get('getComments/' + this.postid).then((response) => {
                this.comments = response.data
            }).catch((errors) => {
                console.log(errors)
            });
        }
    }
}
</script>
