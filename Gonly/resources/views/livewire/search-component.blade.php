<div class="search">
    <div class="search-div">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input wire:model='search' wire:keyup='searchProduct' type="text" class="form-control" placeholder="Ingresa el nombre del producto">
    </div>
    @if ($showlist)
        <ul>
            @if (count($results) > 0)
                @foreach ($results as $producto)
                    <li>
                        <img src="{{ asset('storage').'/'.$producto->photos }}" alt="Foto del producto">
                        <h1>{{ $producto->tittle }}</h1>
                        <p>{{ $producto->description }}</p>
                        <span>$ {{ $producto->price }}</span>
                    </li>
                    {{--<li wire:click='getProduct({{ $producto->id }})'>{{ $producto->tittle }}</li>--}}
                @endforeach
            @else
                <s>No se encontraron productos con el nombre "{{ $search }}"</s>
            @endif
        </ul>
    @endif
</div>