<div>
    <form autocomplete="off" method="post" action="">
        <input autocomplete="false" name="hidden" type="text" style="display:none;">

        <input wire:model="search" wire:keydown.debounce.500ms="buscarLocalidad" type="text" class="form-control"
            list="datalistOptions" id="localidad" name="localidad" placeholder="Buscar...">
        <datalist wire:model="datalist" id="datalistOptions">
            @foreach ($datalist as $nombre)
                <option value="{{ $nombre }}">{{ $nombre }}</option>
            @endforeach
        </datalist>
    </form>
</div>
