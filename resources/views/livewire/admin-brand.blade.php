<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Marcas
        </h2>

    </x-slot>

    <div class="container py-8">
            
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                        <div class="px-6 py-4 bg-white">
                            <a href="{{route('admin.brands.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Nueva Marca
                            </a>
                        </div>
                        <div class="px-6 py-4 bg-white">
                            <input wire:model="search" type="text" class="form-control" placeholder="¿Qué Marca está buscando?">
                        </div>

                        @if ($brands->count())
                        
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nombre
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($brands as $brand)
                                    
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{$brand->name}}
                                                    </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{route('admin.brands.edit', $brand)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>|
                                                <form action="{{route('admin.brands.destroy', $brand)}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach
                                <!-- More items... -->
                                </tbody>
                            </table>

                            <div class="bg-gray-100 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{$brands}}
                            </div>
                        @else
                            <div class="bg-gray-100 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No existe ninguna Marca
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</div>