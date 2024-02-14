<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Companies
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-3 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form class="sm:px-6 lg:px-8" method="get" action="{{route('companies.index')}}">
                        <div>
                            <x-input-label>Search</x-input-label>
                            <x-text-input name="search"></x-text-input>
                        </div>
                    </form>
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
                                                    {{$loop->iteration}}
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
