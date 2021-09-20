<template>

    <div id="form-container" >

        <form method="POST" action="/todo/add" class="flex" @submit="addItem($event)">

            <input type="text"
                   v-model="name"
                   class="w-10/12 bg-gray-50 p-2 my-2 rounded border-gray-150 border focus:bg-gray-100 focus:border-green-50"
                   placeholder="New task"
                   ref="inputField"
            />

            <input type="submit"
                   class="uppercase text-md font-sans font-bold text-white border-3 p-2 my-2 rounded border-blue-150 hover:bg-blue-200 block w-24 ml-4 bg-gradient-to-r from-blue-800 to-blue-600"
                   value="Add" />

        </form>

        <div class="text-red-500 font-bold" v-for="err in errorMessages">{{ err }}</div>
    </div>

</template>

<script>
    export default {

        props: [
            'itm',
        ],

        data() {
            return {
                name          : '',
                errorMessages : [],
            }
        },

        mounted() {
            this.$refs.inputField.focus();
        },

        methods: {
            addItem(event)
            {
                event.preventDefault();

                this.errorMessages = []

                let item = {
                    name         : this.name,
                    is_completed : false,
                }

                axios.post('/todo/add', item).then(response => {

                    this.name = ''

                    item.id = response.data.id

                    this.$store.commit('addItem', item)

                }).catch(e => {

                    if (e.response.data.errors) {

                        const errors = e.response.data.errors

                        Object.keys(errors).forEach(field => {
                            this.errorMessages.push(
                                errors[field].join("\n")
                            )
                        })
                    }
                })

            }
        }
    }
</script>
