<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight dark:text-gray-100 text-gray-800">
            {{ __('Todos') }}
        </h2>
    </x-slot>


    <div class="container mx-auto">
        <div id="app">

            <h3 class="font-bold text-sl mt-5 dark:text-gray-100 text-gray-800">Tasks: @{{ items.length }}</h3>

            <todo-form v-on:add_item="addItem"></todo-form>

            <div class="my-5">
                <todo-item v-for="itm in items"
                           :key="itm.id"
                           v-bind:itm="itm"
                ></todo-item>
            </div>
        </div>
    </div>

</x-app-layout>

