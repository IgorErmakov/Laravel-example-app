<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todos') }}
        </h2>
    </x-slot>


    <div class="container m-5">
        <div id="app">

            <h3>Tasks: @{{ items.length }}</h3>

            <todo-form v-on:add_item="addItem"></todo-form>

            <div class="list-group mt-5">
                <todo-item v-for="(itm, idx) in items"
                           :key="itm.id"
                           v-bind:itm="itm"
                           v-on:delete_item="removeItem(itm.id, idx)"

                ></todo-item>
            </div>
        </div>
    </div>

</x-app-layout>

