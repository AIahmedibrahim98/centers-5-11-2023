<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New Company
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-3 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{route('companies.store')}}">
{{--                        <input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div class="w-full">
                                <x-input-label>Name</x-input-label>
                                <x-text-input class="w-full" name="name"></x-text-input>
                            </div>
                            <div class="w-full">
                                <x-input-label>Owner</x-input-label>
                                <x-text-input class="w-full" name="owner"></x-text-input>
                            </div>
                            <div class="w-full">
                                <x-input-label>Country</x-input-label>
                                <x-text-input class="w-full" name="country"></x-text-input>
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
