<template>
    <li>
        <a href="#" class="dropdown-toggle"  @click="markNotificationAsRead" data-bs-toggle="dropdown" role="button" aria-expanded="false">
            <span class="glyphicon glyphicon-globe"></span> Powiadomienia <span
            class="badge alert-danger">{{unreadNotifications.length}}</span>
        </a>

        <ul class="dropdown-menu" role="menu">
            <li>
                <notification-item v-for="unread in unreadNotifications" :unread="unread" :key="unread.id"></notification-item>
            </li>
        </ul>
    </li>


</template>

<script>
import NotificationItem from './NotificationItem.vue';
export default {
    props: ['unreads', 'userid'],
    components: {NotificationItem},
    data(){
        return {
            unreadNotifications: this.unreads,
        }
    },
    methods: {
        markNotificationAsRead() {
            if (this.unreadNotifications.length) {
               axios.get('/markAsRead');
            }
        }
    },
    mounted() {
        Echo.private('App.Models.User.' + this.userid)
            .notification((notification) => {
                let newUnreadNotifications = {data: {post: notification.post, user: notification.user}};
                this.unreadNotifications.push(newUnreadNotifications);
            });
    }
}
</script>
