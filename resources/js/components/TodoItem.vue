<template>

    <div class="flex justify-between cursor-pointer bg-gradient-to-r from-green-100 to-green-50 border-3 p-2 my-2 rounded border-gray-50 hover:from-green-200" :class="{'text-white from-green-500 to-green-300': '1' === itm.is_completed}">

        <div class="pt-2 pl-2 font-mono" @click="toggleItem" :id="'name-' + itm.id">
            {{ itm.name }}
        </div>

        <button class="py-2 mr-4 text-black-800 font-weight-bold font-mono font-xl" @click="deleteItem" title="Delete">x</button>
    </div>

</template>

<script>
    export default {

        props: ['itm'],

        methods: {
            toggleItem() {

                const itm = {
                    id: this.itm.id,
                    is_completed: '1' === this.itm.is_completed ? '0' : '1'
                }

                this.$store.commit('updateItem', itm)

                axios.post(`/todo/toggle-completed/${itm.id}`, itm)
            },

            deleteItem() {
                this.$store.commit('deleteItem', {id: this.itm.id})
            }
        }
    }
</script>
