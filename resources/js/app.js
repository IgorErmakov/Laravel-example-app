require('./bootstrap');
require('alpinejs');

import * as EventHandlers from './event-handlers';

window.app = new Vue({

    el: '#app',

    data: {
        items: [],
    },

    mounted() {

        axios.get('/todo/get-items').then(response => {
            this.items = response.data.data
        })
    },

    methods: {

        addItem(item)
        {
            this.items.unshift(item)
        },

        removeItem(id, idx)
        {

            this.items.splice(idx, 1)

            axios.delete(`/todo/delete/${id}`)
        },
    }
})



const handler = new EventHandlers;

Echo.channel('todos')
    .listen('.todo.created', handler.todoCreated)
    .listen('.todo.updated', handler.todoUpdated)
    .listen('.todo.deleted', handler.todoDeleted)