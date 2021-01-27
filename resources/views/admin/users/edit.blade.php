<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar usuarios
        </h2>
    </x-slot>


    <div class="container2 py-8">
        <div class="card">
            <div class="card-body">

                <h1 class="text-2xl text-gray-600 mb-3">Asignar rol a {{$user->name}}</h1>

                {!! Form::model($user, [ 'route' => ['admin.users.update', $user],'method' => 'put']) !!}

                    @foreach ($roles as $role)
                        <div>
                            <label>
                                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                {{$role->name}}
                            </label>
                        </div>
                    @endforeach


                    {!! Form::submit('Asignar rol', ['class' => 'btn btn-blue mt-4']) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>