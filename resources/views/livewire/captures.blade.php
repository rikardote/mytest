<div class="mt-8 min-h-screen">
    <div class="flex justify-between">
        <button type="submit" wire:click="$emitTo('captures-child', 'showCreateForm');" class="text-blue-500">
            <x:tall-crud-generator::icon-add />
        </button>
    </div>

    <div class="mt-6">
        <div class="flex justify-between">
            <div class="flex">

            </div>
            <div class="flex">

                <x:tall-crud-generator::select class="block w-1/10" wire:model="per_page">
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                </x:tall-crud-generator::select>
            </div>
        </div>
        <table class="w-full whitespace-no-wrap mt-4 shadow-2xl" wire:loading.class.delay="opacity-50">
            <thead>
                <tr class="text-left font-bold bg-blue-400">
                <td class="px-3 py-2" >Qna</td>
                <td class="px-3 py-2" >Employee</td>
                <td class="px-3 py-2" >Nombre</td>
                <td class="px-3 py-2" >Incidencia</td>
                <td class="px-3 py-2" >Fecha Inicio</td>
                <td class="px-3 py-2" >Fecha Fin</td>
                <td class="px-3 py-2" >Periodo</td>
                <td class="px-3 py-2" >Actions</td>
                </tr>
            </thead>
            <tbody class="divide-y divide-blue-400">
            @foreach($results as $result)
                <tr class="hover:bg-blue-300">
                    <td class="px-3 py-2" >{{ $result->qna?->description}}</td>
                    <td class="px-3 py-2" >{{ $result->employee?->num_empleado}}</td>
                    <td class="px-3 py-2" >{{ $result->employee?->fullname}}</td>
                    <td class="px-3 py-2" >{{ $result->incidencia?->code}}</td>
                    <td class="px-3 py-2" >{{ $result->fecha_inicio->format('d/m/Y')}}</td>
                    <td class="px-3 py-2" >{{ $result->fecha_fin->format('d/m/Y')}}</td>
                    <td class="px-3 py-2" >{{ $result->periodo?->description}}</td>
                    <td class="px-3 py-2" >
                        <button type="submit" wire:click="$emitTo('captures-child', 'showEditForm', {{ $result->id}});" class="text-green-500">
                            <x:tall-crud-generator::icon-edit />
                        </button>
                        <button type="submit" wire:click="$emitTo('captures-child', 'showDeleteForm', {{ $result->id}});" class="text-red-500">
                            <x:tall-crud-generator::icon-delete />
                        </button>
                    </td>
               </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $results->links() }}
    </div>
    @livewire('captures-child')
    @livewire('livewire-toast')
</div>
