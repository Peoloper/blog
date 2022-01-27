<template>
    <div class="wrap">
     : {{ unread.data.user.name }} wrote a post {{ unread.data.post}}
    </div>
</template>

<script>
export default {
    props:['unread'],
    // data(){
    //     return {
    //         postUrl:""
    //     }
    // },
    // mounted(){
    //
    //     console.log(this.postUrl)
    //     //this.postUrl="admin/post/"+ this.postUrl.data.post.id
    // }
}
</script>
