require('./bootstrap');
require('alpinejs');
import {mapMutations} from 'vuex'
const store = require('./store')

function lg(v) { console.log(v) }


window.app = new Vue({

    el: '#app',
    store,
    components: Vue.options.components,

    mounted() {

        axios.get('/todo/get-items').then(response => {
            this.$store.commit('setItems', response.data.data)
        })
    },

    computed: {
        items() {
            return this.$store.state.items
        }
    },

    methods: {

        ...mapMutations([
            'addItem',
            'deleteItem',
            'updateItem'
        ])
    }
})


// callbacks from the server ECHO update (websockets)
Echo.channel('todos')
    .listen('.todo.created', data => app.addItem(data.todo))
    .listen('.todo.updated', data => app.updateItem(data.todo))
    .listen('.todo.deleted', data => app.deleteItem({id: data.todoId, isSkipServerUpdate: false}))