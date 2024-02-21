<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Company
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-3 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
             {{--       @if ($errors->any())
                        <div class="text-red-700">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="font-bold text-lg">- {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif--}}
                    <form method="post" action="{{route('companies.update',$company->id)}}">
                        @method('PATCH')
                        {{--                        <input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div class="w-full">
                                <x-input-label>Name</x-input-label>
                                <x-text-input value="{{old('name',$company->name)}}" class="w-full"
                                              name="name"></x-text-input>
                                @error('name')
                                <p class="text-red-600 font-bold">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="w-full">
                                <x-input-label>Owner</x-input-label>
                                <x-text-input value="{{old('owner',$company->owner)}}" class="w-full"
                                              name="owner"></x-text-input>
                                @error('owner')
                                <p class="text-red-600 font-bold">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="w-full">
                                <x-input-label>Country</x-input-label>
                                <x-text-input value="{{old('country',$company->country)}}" class="w-full"
                                              name="country"></x-text-input>
                                @error('country')
                                <p class="text-red-600 font-bold">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mt-5 w-full flex justify-center">
                                <x-primary-button class="bg-fuchsia-900" type="submit">Save</x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
