<template>

    <li class="list-group-item" :class="{'active': '1' === itm.is_completed}">

        <span class="name" @click="toggleItem" :id="'name-' + itm.id">
            {{ itm.name }}
        </span>

        <span class="delete" @click="deleteItem">x</span>
    </li>

</template>

<script>
    export default {

        props: ['itm'],

        methods: {
            toggleItem() {
                this.itm.is_completed = '1' === this.itm.is_completed ? '0' : '1'
                axios.post(`/todo/toggle-completed/${this.itm.id}`, {is_completed: this.itm.is_completed})
            },

            deleteItem() {
                this.$emit('delete_item')
            }
        }
    }
</script>
