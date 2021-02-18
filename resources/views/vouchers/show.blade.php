<x-forum-layout>
    <section class="bg-primary relative">
        
        <div class="md:absolute md:w-1/2 h-64">
            {{-- <img class="w-full h-full object-cover object-center" src="{{Storage::url($voucher->image)}}" alt=""> --}}
            @if ($voucher->image)
                <img class="w-full h-full object-cover object-center" src="{{$voucher->image}}" alt="">
            @else
                <img class="w-full h-full object-cover object-center" src="https://cdn.pixabay.com/photo/2020/12/10/20/40/color-5821297_960_720.jpg" alt="">
            @endif
        </div>

        {{-- grid --}}
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex md:h-64 items-center">

            <article class="pl-4 py-8 md:w-1/2 md:ml-auto">
                <h1 class="text-xl text-white font-bold uppercase mb-6">{{$voucher->title}}</h1>

                <div class="text-white mb-6">
                    {!!$voucher->description!!}
                </div>

                <p class="text-sm text-white mb-1">Beneficio valido hasta: {{$voucher->expiration_date->format('d/m/Y')}}</p>
                <p class="text-xs text-secondary font-bold uppercase">Categoría: {{$voucher->brand->category->name}}</p>
            </article>
        </div>

    </section>

    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-3 grid md:grid-cols-3 lg:grid-cols-4 gap-6 mt-8 items-start">

        <article class="md:col-span-2 lg:col-span-3 rounded overflow-hidden shadow-lg flex flex-col bg-white">
            <div class="px-8 py-6">
                <h1 class="text-xl text-primary uppercase font-bold mb-4">¿Cómo puedes disfrutarlo?</h1>
                {!!$voucher->description2!!}
            </div>
        </article>

        <div class="rounded overflow-hidden shadow-lg flex flex-col bg-white">
            <div class="px-6 py-4">
                {{-- <img src="{{$voucher->brand->url_logo}}" alt=""> --}} 
                {{--<img src="{{asset('img/logo/logo_Trasnvip.png')}}" alt=""> --}}

                @if ($voucher->url)

                    @if (session('customer'))
                        <a class="btn btn-secondary block" href="{{$voucher->url}}" target="_blank">{{$voucher->text_button}}</a>
                    @else
                        <a class="btn btn-secondary block" href="{{route('session.index')}}">{{$voucher->text_button}}</a>
                    @endif

                @else
                    @if (session('customer'))
                    
                        <form action="{{route('vouchers.exchange', $voucher)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-secondary w-full">{{$voucher->text_button}}</button>
                        </form>

                    @else

                        <a href="{{route('session.index')}}" class="btn btn-secondary w-full block">{{$voucher->text_button}}</a>
                        
                    @endif
                @endif

            </div>
        </div>
        
    </section>
</x-forum-layout>