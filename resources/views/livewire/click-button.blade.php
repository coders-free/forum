<div>
    @if ($voucher->text_button == 'Llamar')
        <a class="btn btn-secondary block" href="tel:{{$voucher->url}}" wire:click="$emit('clicLlamar')" target="_blank">{{$voucher->text_button}}</a>
    @else
        <a class="btn btn-secondary block" href="{{$voucher->url}}" wire:click="$emit('clicBoton')" target="_blank">{{$voucher->text_button}}</a>
    @endif      
</div>
