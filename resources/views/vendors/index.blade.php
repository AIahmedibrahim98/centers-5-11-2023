{{--@dd(auth()->user())--}}
{{--@dd(Auth::id())--}}
{{--@dd(auth()->id())--}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Vendors
        </h2>
    </x-slot>
    <div class="py-12">

        <div class="max-w-full mx-auto sm:px-3 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session()->has('message'))
                        {{--                    @if(session('message'))--}}
                        <div
                            class="flex justify-left items-center m-1 font-medium py-1 px-2 rounded-md text-green-100 bg-green-700 border border-green-700 ">
                            <div slot="avatar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-check-circle w-5 h-5 mx-2">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                </svg>
                            </div>
                            <div class="text-xl font-normal  max-w-full flex-initial">
                                <div class="py-2">This is a success messsage
                                    <div class="text-sm font-base">{{session('message')}}</div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="flex justify-end m-3">
                    <x-button-link>
                        Add New Vendor
                        <x-slot name="href">{{route('vendors.create')}}</x-slot>
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
                                            Image
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Address
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Created At
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Actions
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($vendors as $key=> $vendor)
                                        <tr class="bg-white border-b text-center transition duration-300 ease-in-out hover:bg-gray-100">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                                {{$vendors->firstItem() + $key}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                @if($vendor->image)
                                                    <a href="{{asset('storage/'.$vendor->image)}}" target="_blank">
                                                        <img class="object-cover w-16 rounded" src="{{asset('storage/'.$vendor->image)}}">
                                                    </a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                {{$vendor->name}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                {{$vendor->address}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                {{date_format(date_create($vendor->created_at),'Y-m-d h:i:s a')}}
                                            </td>
                                            <td>
                                                <div class="flex justify-evenly">
                                                    <div>
                                                        <a href="{{route('vendors.edit',$vendor->id)}}"><i
                                                                class="fa-solid fa-pen-to-square text-lg"></i></a>
                                                    </div>
                                                    <div>
                                                        <form method="post"
                                                              action="{{route('vendors.destroy',$vendor->id)}}">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit"><i class="fa-solid fa-trash text-lg"
                                                                                     style="color: #ff0000;"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
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
                                {{--                                    <div class="mt-2">{{$vendors->links('pagination::bootstrap-5')}}</div>--}}
                                <div class="mt-2">{{$vendors->links()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
