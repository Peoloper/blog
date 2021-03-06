require('./bootstrap')

import { createApp } from 'vue'

import Comments from './components/Comments'
import Notification from './components/Notification'
import NotificationItem from './components/NotificationItem'


const app = createApp({})

app.component('comments', Comments)
app.component('notification', Notification)
app.component('notification-item', NotificationItem)


app.mount('#app')
