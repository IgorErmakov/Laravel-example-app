export class EventHandlers
{
    todoCreated(data)
    {
        if (data.todo) {
            window.app.items.unshift(data.todo)
        }
    }

    todoUpdated(data)
    {
        if (data.todo) {
            window.app.items.forEach(itm => {
                if (itm.id == data.todo.id) {
                    itm.name         = data.todo.name
                    itm.is_completed = data.todo.is_completed
                }
            })
        }
    }

    todoDeleted(data)
    {
        if (data.todoId) {
            window.app.items = window.app.items.filter(itm => itm.id !== data.todoId)
        }
    }
}