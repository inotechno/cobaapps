<x-app-layout>
    <div class="row" style="width: 120%">
        <section class="mt-10">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <!-- Start coding here -->
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div class="flex items-center justify-between d p-4">
                        <div class="flex">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input wire:model.live.debounce.300ms="search" type="text"
                                    style="padding-left:32px !important "
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                    placeholder="Search" required="">
                            </div>
                        </div>
                        <div class="flex space-x-3">
                            <div class="flex space-x-3 items-center">
                                <label class="w-40 text-sm font-medium text-gray-900">User Type :</label>
                                <select
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option value="">All</option>
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 align:center">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Service ID</th>
                                    <th scope="col" class="px-4 py-3">Service name</th>
                                    <th scope="col" class="px-4 py-3">url msr </th>
                                    <th scope="col" class="px-4 py-3">Description</th>
                                    <th scope="col" class="px-4 py-3">url esb</th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($servicelists as $service)
                                    <tr wire:key = "{{ $service->id }}" class="border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap ">
                                            {{ $service->service_id }}</th>
                                        <td class="px-4 py-3">{{ $service->service_name }}</td>
                                        <td class="px-4 py-3 text-green-500">
                                            {{ $service->service_endpoint_msr }}</td>
                                        <td class="px-4 py-3">{{ $service->service_desc }}</td>
                                        <td class="px-4 py-3">{{ $service->service_endpoint_esb }}</td>
                                        <td class="px-4 py-3 flex items-center justify-end">
                                            <button class="px-3 py-1 bg-green-500 text-white rounded"
                                                data-bs-toggle="modal" data-bs-target="#showdataModal">
                                                <i class='bx bx-bookmark nav_icon'></i></button>
                                        </td>
                                    </tr>
                                    <x-posts.modal-showdata :service="$service" />
                                @endforeach


                            </tbody>
                        </table>
                    </div>

                    <div class="py-4 px-3">
                        <div class="flex ">
                            <div class="flex space-x-4 items-center mb-3">
                                <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                                <select wire:model.live='perPage'
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option value="5">5</option>
                                    <option value="7">7</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                        {{ $servicelists->links() }}
                    </div>
                </div>
            </div>
        </section>

    </div>




    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <input wire::model.live='search' class="form-control" type="text">


            </div>

        </div>
        <table class="table table-striped table-hover " style="table-layout: fixed; width: 100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>serviece id</th>
                    <th>service name</th>
                    <th>end point</th>
                    <th>Description</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($servicelists as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->service_id }}</td>
                        <td>{{ $service->service_name }}</td>
                        <td>{{ $service->service_name }}</td>
                        <td>{{ $service->service_name }}</td>
                        <td>

                            <a href="#" wire:click=" getDdetail({{ $service->id }}) "
                                class="btn btn-warning ; border-radius : 5px" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <span class="icons fi-social-pinterest"></span>
                                <i class='bx bx-folder nav_icon'></i>
                            </a>
                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>


        <div class="row">
            <div class="col-md-2">
                <select wire:model.live='perPage' class="form-select">
                    <option value="10">10</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                </select>
            </div>

            <div class="col-md-11">
                {{ $servicelists->links() }}
            </div>


        </div>

    </div> --}}






</x-app-layout>
