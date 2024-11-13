<div>


    <form wire:submit.prevent="Sancionpdf">
        <div>
            <label for="status">Seleccionar Estado:</label>
            <select wire:model='fecha_id'>
                <option value="">Todos</option>
                @foreach($FechaFixture as $fecha)
                    <option value="{{ $fecha->id }}">{{ $fecha->id }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Generar PDF</button>
    </form>




</div>
