<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Beneficios
        </h2>

    </x-slot>

    <div class="container py-8">
            
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                        <div class="px-6 py-4 bg-white">
                            <input wire:model="search" type="text" class="form-control" placeholder="¿Qué beneficio está buscando?">
                        </div>

                        @if ($vouchers->count())
                        
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Categoría
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        F. Inscripción
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            F. Caducidad
                                            </th>
                                        <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($vouchers as $voucher)
                                    
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        @if ($voucher->image)
                                                            <img class="h-10 w-10 rounded-full object-cover" src="{{$voucher->image}}" alt="">
                                                        @else
                                                            <img class="h-10 w-10 rounded-full object-cover" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                                                        @endif
                                                    </div>
                                                    <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{$voucher->title}}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        {{$voucher->brand->name}}
                                                    </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{$voucher->brand->category->name}}</div>
                                                {{-- <div class="text-sm text-gray-500">Optimization</div> --}}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    {{$voucher->registration_date->format('d-m-Y')}}
                                                </span>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    {{$voucher->expiration_date->format('d-m-Y')}}
                                                </span>
                                            </td>
                                        
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{route('admin.vouchers.edit', $voucher)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            </td>
                                        </tr>

                                    @endforeach
                                <!-- More items... -->
                                </tbody>
                            </table>

                            <div class="bg-gray-100 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{$vouchers}}
                            </div>
                        @else
                            <div class="bg-gray-100 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No existe ningún beneficio
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</div>