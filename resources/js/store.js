const store = new Vuex.Store({
    state: {
        items: []
    },
    mutations: {
        setItems: (state, items)     => state.items = items,
        addItem: (state, item)       => state.items.unshift(item),
        deleteItem: (state, payload)  => {

            const {id, isSkipServerUpdate} = payload

            state.items = state.items.filter(itm => itm.id != id)

            if (false !== isSkipServerUpdate) {
                axios.delete('/todo/delete/' + id)
            }
        },

        updateItem: (state, newItem) => {
            state.items.forEach(itm  => {

                if (itm.id == newItem.id) {

                    // itm.name         = newItem.name
                    itm.is_completed = newItem.is_completed
                }
            })
        }
    }
})

module.exports = store