<div>
    <div class="bg-primary">
        @if (session('customer'))
            <div class="container2 py-6 lg:py-3 grid grid-cols-1 lg:grid-cols-6 gap-2 items-center">
        @else
            <div class="container2 py-6 lg:py-3 grid grid-cols-1 lg:grid-cols-5 gap-2 items-center">
        @endif
        

            <div class="lg:col-span-2">
                <input wire:model="search" placeholder="¿Qué estás buscando?" autocomplete="off" class="form-control w-full">
            </div>
    
            <div>
                <select wire:model="brand_id" class="form-control">
                    <option value="">Buscar por marca</option>
                    @foreach ($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </select>
            </div>
    
            <div>
                <select wire:model="category_id" class="form-control">
                    <option value="">Buscar por categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
    
            <div>
                @if (session('customer'))
                    <button class="font-bold text-sm py-3 px-4 rounded text-center bg-secondary text-white hover:bg-cyan-700 w-full" wire:click="$set('favorites', true)">VER FAVORITOS</button>
                @else
                    <a href="{{route('session.index')}}" class="font-bold text-sm py-3 px-4 rounded text-center bg-secondary text-white hover:bg-cyan-700 w-full block">VER FAVORITOS</a>
                @endif
                    
            </div>

            <div>
                @if (session('customer'))
                    <a href="{{route('contacto.index')}}" class="font-bold text-sm py-3 px-4 rounded text-center bg-secondary text-white hover:bg-cyan-700 w-full block">CONTACTO</a>
                @endif
                    
            </div>

        </div>
    </div>

    
    <section class="container2 py-10">
        <h1 class="text-2xl text-center text-primary uppercase mb-6">BENEFICIOS</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            @forelse ($vouchers as $voucher)
                <article class="rounded overflow-hidden shadow-lg flex flex-col bg-white relative">

                    {{-- Cabecera --}}
                    <div class="bg-primary px-6 py-2 flex justify-between items-center">
                        <h2 class="text-white uppercase font-bold">{{$voucher->brand->name}}</h2>

                        @if (session('customer'))
                        
                            @if ($voucher->check)
                                <i wire:click="favorites({{$voucher}})" class="fas fa-star text-yellow-400 cursor-pointer"></i>
                            @else
                                <i wire:click="favorites({{$voucher}})" class="fas fa-star text-white cursor-pointer"></i>
                            @endif

                        @else
                            <a href="{{route('session.index')}}"><i class="fas fa-star text-white cursor-pointer"></i></a>
                        @endif
                    </div>

                    {{-- Cuerpo --}}
                    @if ($voucher->image)
                        <img class="w-full h-56 object-cover object-center" src="{{$voucher->image}}" alt="Sunset in the mountains">
                    @else
                        <img class="w-full h-56 object-cover object-center" src="https://cdn.pixabay.com/photo/2020/12/10/20/40/color-5821297_960_720.jpg" alt="Sunset in the mountains">
                    @endif

                    <div class="px-6 pt-2 pb-4 flex-1 flex flex-col">
                        <a class="text-sm text-secondary" href="">{{$voucher->brand->category->name}}</a>
                        <h1 class="font-bold text-gray-700">{{$voucher->title}}</h1>
    
                        <div class="mt-auto flex justify-center pt-2">
                            <a class="btn btn-secondary" href="{{route('vouchers.show', $voucher)}}">VER BENEFICIO</a>
                        </div>
                    </div>
                </article>
            @empty

                <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3 col-span-3" role="alert">
                    <p class="font-bold">Mensaje informativo</p>
                    <p class="text-sm">No existe ningún beneficio con esas características.</p>
                </div>

            @endforelse
        </div>

        {{$vouchers->links()}}
    </section>

</div>
