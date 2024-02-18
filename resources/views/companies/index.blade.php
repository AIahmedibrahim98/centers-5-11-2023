{{--@dd(auth()->user())--}}
{{--@dd(Auth::id())--}}
{{--@dd(auth()->id())--}}


    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-3 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form class="sm:px-6 lg:px-8" method="get" action="{{route('companies.index')}}">
                        <div class="flex justify-evenly border rounded p-3">
                            <div>
                                <x-input-label>Search</x-input-label>
                                <x-text-input name="search"></x-text-input>
                            </div>
                            <div>
                                <x-input-label>Manager</x-input-label>
                                <x-text-input name="manager"></x-text-input>
                            </div>
                            <div class="mt-5">
                                <x-primary-button type="submit">Search</x-primary-button>
                            </div>
                        </div>
                    </form>
                    {{--                    {{auth()->user()->name . ' - '  . auth()->user()->email}}--}}
                    <div class="flex justify-end m-3">
                        <x-button-link>
                            Add New Company
                            <x-slot name="href">{{route('companies.create')}}</x-slot>
                        </x-button-link>
                    </div>
                    <!-- component -->
                    <div class="flex flex-col w-full">
                        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <thead class="bg-gray-200 border-b">
                                        <tr class="text-center">
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                #
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                Name
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                Owner
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                Country
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                Manager
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                Created At
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($companies as $key=> $company)
                                            <tr class="bg-white border-b text-center transition duration-300 ease-in-out hover:bg-gray-100">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                                    {{--                                                    {{$loop->iteration}}--}}
                                                    {{$companies->firstItem() + $key}}
                                                    {{--                                                    {{$companies->firstItem() }}--}}
                                                </td>
                                                <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                    {{$company->name}}
                                                </td>
                                                <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                    {{$company->owner}}
                                                </td>
                                                <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                    {{$company->country}}
                                                </td>
                                                <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                    {{$company->manager ? $company->manager->name : ''}}
                                                </td>
                                                <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                    {{date_format(date_create($company->created_at),'Y-m-d h:i:s a')}}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                <td colspan="4"
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    No Companies Yet
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                    {{--                                    <div class="mt-2">{{$companies->links('pagination::bootstrap-5')}}</div>--}}
                                    <div class="mt-2">{{$companies->links()}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
