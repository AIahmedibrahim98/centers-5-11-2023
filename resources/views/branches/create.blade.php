<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New Branch
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
                    <form method="post" action="{{route('branches.store')}}">
                        {{--                        <input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div class="w-full">
                                <x-input-label>Name</x-input-label>
                                <x-text-input value="{{old('name')}}"  class="w-full" name="name"></x-text-input>
                                @error('name')
                                <p class="text-red-600 font-bold">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="w-full">
                                <x-input-label>Location</x-input-label>
                                <x-text-input value="{{old('location')}}" class="w-full" name="location"></x-text-input>
                                @error('location')
                                <p class="text-red-600 font-bold">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="w-full">
                                <x-input-label>Phone</x-input-label>
                                <x-text-input value="{{old('phone')}}" class="w-full" name="phone"></x-text-input>
                                @error('phone')
                                <p class="text-red-600 font-bold">{{$message}}</p>
                                @enderror
                            </div>
                              <div class="w-full">
                                <x-input-label>Company</x-input-label>
                                <select name="company_id" class="w-full">
                                    <option value="">Select Company</option>
                                    @foreach($companies as $id=>$name)
                                    <option value="{{$id}}">{{$name}}</option>
                                    @endforeach
                                </select>
                                @error('company_id')
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
