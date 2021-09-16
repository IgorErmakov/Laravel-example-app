<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('save-post')}}">
                        @method('PUT')
                        @csrf

                        <input type="input" name="name" placeholder="Name" value="{{ old('name') }}" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm @error('name') is-invalid @enderror"/>


                        <input type="input" name="description" placeholder="Description" value="{{ old('description') }}"  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm @error('description') is-invalid @enderror"/>

                        <label>
                            <input type="checkbox" name="is_active" class="rounded">
                            Is active
                        </label>

                        <div>

                            <x-button class="ml-3">
                                Save
                            </x-button>
                        </div>
                    </form>


                    @if ($errors->any())

                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
