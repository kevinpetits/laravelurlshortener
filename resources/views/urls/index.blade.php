<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Url Shortener APP') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <div class="flex" id="long_url_container" style="display: none;">
                        <input type="text" id="datepicker" class="w-md px-4 py-3 rounded" />
                        <!-- <span class="text-gray-700">Status</span> -->
                                <div class="w-md px-5 py-3">
                                    <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="accountType" id="active" value="1">
                                    <span class="ml-2">Active</span>
                                    </label>
                                    <label class="inline-flex items-center ml-6">
                                    <input type="radio" class="form-radio" name="accountType" id="inactive" value="0">
                                    <span class="ml-2">Inactive</span>
                                    </label>
                                </div>
                        <input type="hidden" id="inputcode">
                        <button class="ml-4 w-md px-6 py-3 font-semibold bg-gray-900 text-white rounded" name="boton" id="" value="" onclick="shorter.update_url()">Save</button>
                </div>

                    <!-- component -->
                    <div class="overflow-x-auto">
                        <div class="min-w-screen min-h-screen flex justify-center  font-sans overflow-hidden">
                            <div class="w-full lg:w-6/6">
                                <div class="bg-white shadow-md rounded my-6">
                                    <table class="min-w-max w-full table-auto">
                                        <thead>
                                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                                <th class="py-3 px-6 text-center">Short URL</th>
                                                <th class="py-3 px-6 text-center">Original URL</th>
                                                <th class="py-3 px-6 text-center">Views</th>
                                                <th class="py-3 px-6 text-center">Expires</th>
                                                <th class="py-3 px-6 text-center">Status</th>
                                                <th class="py-3 px-6 text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600 text-sm font-light">
                                        @foreach($urls as $url)
                                            <tr class="border-b border-gray-200 hover:bg-gray-100 " >
                                                <td class="py-3 px-6 text-center">
                                                        <span class="font-medium">{{url('/').'/'.$url->code}}</span>
                                                </td>
                                                <td class="py-3 px-6 text-center max-w-xs overflow-hidden">
                                                    <span class="font-medium">{{$url->url}}</span>
                                                </td>
                                                <td class="py-3 px-6 text-center">
                                                    <span class="font-medium">{{$url->views}}</span>
                                                </td>
                                                <td class="py-3 px-6 text-center">
                                                    <span class="font-medium">{{$url->expiration}}</span>
                                                </td>
                                                <td class="py-3 px-6 text-center">
                                                    <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{$url->active ? "Active" : "Inactive"}}</span>
                                                </td>
                                                <td class="py-3 px-6 text-center">
                                                    <div class="flex item-center justify-center">
                                                        <!-- <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"> -->
                                                        <button class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110" id="{{$url->code}}" onclick="shorter.fill_edit_url(this.id)">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="cursor: pointer;">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                            </svg>
                                                        </button>
                                                        <!-- </div> -->
                                                        <!-- <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"> -->
                                                        <button class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110" id="{{$url->code}}" onclick="shorter.delete_url(this.id)">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="cursor: pointer;">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </button>
                                                        <!-- </div> -->
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
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
