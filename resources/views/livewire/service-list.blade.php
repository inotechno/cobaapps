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
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                wire:model.live="type">
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
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $service->service_id }}</th>
                                    <td class="px-4 py-3">{{ $service->service_name }}</td>
                                    <td class="px-4 py-3 text-green-500">
                                        {{ $service->service_endpoint_msr }}</td>
                                    <td class="px-4 py-3">{{ $service->service_desc }}</td>
                                    <td class="px-4 py-3">{{ $service->service_endpoint_esb }}</td>
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <button class="px-3 py-1 bg-green-500 text-white rounded"
                                            wire:click="openModal({{ $service }})">
                                            <i class='bx bx-bookmark nav_icon'></i></button>
                                    </td>
                                </tr>
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

    @if ($modal)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                <div class="px-4 py-5 sm:px-6 bg-gray-100 flex justify-between items-center">
                    <h5 class="text-lg font-medium leading-6 text-gray-900">{{ $selectedService['service_name'] }}</h5>
                    <button type="button" class="text-gray-400 hover:text-gray-600" wire:click="closeModal">
                        &times;
                    </button>
                </div>
                <div class="px-4 py-5 sm:p-6">
                    <!-- Modal body content -->
                    <p>{{ $selectedService['service_desc'] }}</p>
                    <!-- Add other details as needed -->
                </div>
                <div class="px-4 py-4 sm:px-6 bg-gray-100 flex justify-end">
                    <button type="button" class="px-4 py-2 mr-2 text-white bg-gray-500 rounded-md hover:bg-gray-700"
                        wire:click="closeModal">Close</button>
                    <button type="button" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-700">Save
                        changes</button>
                </div>
            </div>
        </div>
    @endif

</div>
