<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('save-form')}}">
                        @method('PUT')
                        @csrf

                        <input type="input" name="name" placeholder="Name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror"/>


                        <input type="input" name="description" placeholder="Description" value="{{ old('description') }}"  class="form-control @error('description') is-invalid @enderror"/>

                        <label>
                            <input type="checkbox" name="is_active" class="form-control">
                            Is active
                        </label>

                        <x-forms.submit value="Save"/>
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
