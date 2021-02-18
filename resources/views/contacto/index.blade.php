<x-forum-layout>
<div>
    <div class="bg-primary">
        @if (session('customer'))
            <div class="container2 py-6 lg:py-3 grid grid-cols-1 lg:grid-cols-1 gap-2 items-center">
        @else
            <div class="container2 py-6 lg:py-3 grid grid-cols-1 lg:grid-cols-1 gap-2 items-center">
        @endif

            <div class="text-center">
                @if (session('customer'))
                    <a href="/" class="font-bold text-sm py-3 px-4 rounded text-center bg-secondary text-white hover:bg-cyan-700 w-full items-center">VOLVER A BENEFICIOS</a>
                @endif
                    
            </div>

        </div>
    </div>

    
    <section class="container2 py-10">
        <h1 class="text-2xl text-center text-primary uppercase mb-6">¿TIENES ALGUNA DUDA O SUGERENCIA?</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-6 mb-6">
            
                <article class="rounded overflow-hidden shadow-lg flex flex-col bg-white relative">

                    {{-- Cabecera --}}
                    <div class="bg-primary px-6 py-2 flex justify-between items-center">
                        <h2 class="text-white uppercase font-bold">PROGRAMA DE BENEFICIOS</h2>

                       
                    </div>

                    {{-- Cuerpo --}}
                   

                    <div class=" flex items-center justify-center">
        
                        <form id="form" action="{{route('contacto.store')}}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                            @csrf
                            <br>
                            <h1 class="block text-gray-700 font-bold mb-2 text-xl text-center">COMPLETA LOS DATOS Y ESCRIBE TU SUGERENCIA O CONSULTA</h1>
                            <br>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                    Nombre
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="name" id="name" value="{{session('customer')->name}}" type="text" placeholder="Ingresa tu nombre" required>
                            </div>
                            
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                    Correo
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="email" id="email" value="{{session('customer')->email}}" type="email" placeholder="Ingresa tu correo" required>
                            </div>
                
                            <div class="mb-4">
                
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                    Mensaje
                                </label>
                                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="mensaje" id="mensaje" type="text" placeholder="Escríbe tu mensaje Aquí"required></textarea>
                            </div>
                            
                            <div class="flex items-center justify-between">
                                <button id="submit"
                                    class="font-bold text-sm py-3 px-4 rounded text-center bg-secondary text-white hover:bg-cyan-700 focus:outline-none focus:shadow-outline"
                                    type="submit">
                                    <i class="fa fa-envelope"></i> Enviar
                                </button>
                            </div>
                
                            <div class="mb-4">
                
                 
                        </form>
                        
                    </div>
                    <script src="https://kit.fontawesome.com/1e268974cb.js" crossorigin="anonymous"></script>
                    <script src="assets/js/helpers.js"></script>
                    <script src="assets/js/whatsapp.js"></script>
                </article>
            

            
        </div>

        
    </section>

</div>
</x-forum-layout>