<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="container2 py-8">
        <div class="card">
            <div class="card-body bg-white">
                {!! Form::model($voucher, ['route' => ['admin.vouchers.update', $voucher], 'method' => 'put','files' => 'true', 'autocomplete' => 'off']) !!}

                    <div class="relative mb-4">
                        @if ($voucher->image)
                            <img id="picture" class="h-64 object-cover" src="{{$voucher->image}}" alt="">
                        @else
                            <img id="picture" class="h-64 object-cover" src="https://cdn.pixabay.com/photo/2020/12/10/20/40/color-5821297_960_720.jpg" alt="">
                        @endif

                        <div class="absolute left-2 top-2">
                            {!! Form::file('file', ['class' => 'md:form-control', 'id' => 'file', 'accept' => 'image/*']) !!}
                        </div>
                    </div>

                    <div class="mb-4">
                        {!! Form::label('title', 'Título') !!}
                        {!! Form::text('title', null, ['class' => 'form-control', 'readonly', 'disabled']) !!}
                    </div>

                    <div class="mb-4">
                        {!! Form::label('description', 'Descripción') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

                        @error('description')
                            <span class="text-red-500 text-sm">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        {!! Form::label('description2', 'Descripción 2') !!}
                        {!! Form::textarea('description2', null, ['class' => 'form-control']) !!}

                        @error('description2')
                            <span class="text-red-500 text-sm">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            {!! Form::label('url', 'URL') !!}
                            {!! Form::text('url', null, ['class' => 'form-control']) !!}

                        </div>

                        <div>
                            {!! Form::label('brand_id', 'Marca') !!}
                            {!! Form::select('brand_id', $brands, null, ['class' => 'form-control']) !!}

                            @error('brand_id')
                                <span class="text-red-500 text-sm">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                        <div>
                            {!! Form::label('text_button', 'Texto del botón') !!}
                            {!! Form::text('text_button', null, ['class' => 'form-control']) !!}

                            @error('text_button')
                                <span class="text-red-500 text-sm">{{$message}}</span>
                            @enderror
                        </div>

                        <div>
                            {!! Form::label('voucher_type', 'Tipo de voucher') !!}
                            {!! Form::text('voucher_type', null, ['class' => 'form-control', 'readonly', 'disabled']) !!}
                        </div>
                    </div>

                    <div class="flex justify-end">
                        {!! Form::submit('Actualizar', ['class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>



    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>

    <script>

        //Description
        ClassicEditor
        .create( document.querySelector( '#description' ), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                ]
            }
        } )
        .catch( error => {
            console.log( error );
        } );

        //Description 2
        ClassicEditor
        .create( document.querySelector( '#description2' ), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                ]
            }
        } )
        .catch( error => {
            console.log( error );
        } );

        //Cambiar imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result); 
            };

            reader.readAsDataURL(file);
        }
    </script>
</x-app-layout>