<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="container2 py-8">
        <div class="card">
            <div class="card-body bg-white">
                {!! Form::open(['route' => ['admin.brands.store'], 'method' => 'POST']) !!}


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                        <div>
                            {!! Form::label('name', 'Nombre de la Marca') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}

                            @error('name')
                                <span class="text-red-500 text-sm">{{$message}}</span>
                            @enderror
                        </div>

                        <div>
                            {!! Form::label('category_id', 'Categoria') !!}
                            {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

                            @error('category_id')
                                <span class="text-red-500 text-sm">{{$message}}</span>
                            @enderror
                        </div>

                      
                    </div>

                    <div class="flex justify-end">
                        {!! Form::submit('Guardar', ['class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>