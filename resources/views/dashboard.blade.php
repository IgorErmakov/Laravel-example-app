<x-app-layout>
    {{--
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
            | UserId: #{{ $userId}}
        </h2>
    </x-slot>
    --}}


    <div class="container m-5">
        <div id="app">

            <h3>Tasks: @{{ items.length }}</h3>

            <input type="text" v-model="name" class="form-control" placeholder="New task" />
            <input type="button" class="btn btn-primary" value="+Add" @click="addItem" />

            <div class="list-group mt-5">
                <todo-item v-for="(itm, idx) in items"
                           :key="itm.id"
                           v-bind:itm="itm""

                ></todo-item>
            </div>
        </div>
    </div>



{{--
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!

                    <p>
                        <a href="{{ route('create-form')}}">Create Form</a>
                    </p>

                    <p>
                        <a href="{{ route('post-form')}}">Post Form</a>
                    </p>
                    <x-alert type="error" :message="$message" />
                    <x-forms.input :value="$value" />

                    <x-forms.submit :value="$inputValue" type="success" class="mb-4" />

                    <x-dynamic-component :component="$componentName" class="mt-4" />

                </div>
            </div>
        </div>
    </div>
--}}
</x-app-layout>


@script
<script>


</script>
@endscript
