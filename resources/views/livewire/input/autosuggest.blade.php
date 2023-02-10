<div>
    {{-- <form autocomplete="off" method="post" action="">
        <input autocomplete="false" name="hidden" type="text" style="display:none;">

        <input wire:model="search" wire:keydown.debounce.500ms="buscarLocalidad" type="text" class="form-control"
            list="datalistOptions" id="localidad" name="localidad" placeholder="Buscar...">
        <datalist wire:model="datalist" id="datalistOptions">
            @foreach ($datalist as $localidad)
                <option value="{{ $localidad['localidad_id'] }}">{{ $localidad['nombre'] }}</option>
            @endforeach
        </datalist>
    </form> --}}

    <form action="#">
        
    </form>
    <select class="form-select" id="basic-usage" data-placeholder="Choose one thing" required>
        <option></option>
        <option>Reactive</option>
        <option>Solution</option>
        <option>Conglomeration</option>
        <option>Algoritm</option>
        <option>Holistic</option>
    </select>

    <script>
        $(document).ready(function() {
            $('#basic-usage').select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
            });
        });
    </script>
</div>
