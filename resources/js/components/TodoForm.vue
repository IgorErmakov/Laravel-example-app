<template>

    <div id="form-container">

        <form method="POST" action="/todo/add" @submit="addItem($event)">

            <input type="text" v-model="name" class="form-control" placeholder="New task" />
            <input type="submit" class="btn btn-primary" value="+Add" />

        </form>

        <div class="error-message" v-for="err in errorMessages">{{ err }}</div>
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

                    this.$emit('add_item', item)

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
