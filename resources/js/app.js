require('./bootstrap')

import { createApp } from 'vue'

import GetComments from './components/GetComments'
import Notification from './components/Notification'
import NotificationItem from './components/NotificationItem'


const app = createApp({})

app.component('get-comments', GetComments)
app.component('notification', Notification)
app.component('notification-item', NotificationItem)


app.mount('#app')
