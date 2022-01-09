<div class="mt-8 min-h-screen">
    <div class="flex justify-between">

        <button type="submit" wire:click="$emitTo('qnas-child', 'showCreateForm');" class="text-blue-500">
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
                <td class="px-3 py-2" >Year</td>
                <td class="px-3 py-2" >Active</td>
                <td class="px-3 py-2" >Actions</td>
                </tr>
            </thead>
            <tbody class="divide-y divide-blue-400">
            @foreach($results as $result)
                <tr class="hover:bg-blue-300 {{ ($loop->even ) ? "bg-blue-100" : ""}}">
                    <td class="px-3 py-2" >{{ $result->qna}}</td>
                    <td class="px-3 py-2" >{{ $result->year}}</td>
                    <td class="px-3 py-2" >{{ $result->active}}</td>
                    <td class="px-3 py-2" >
                        <button type="submit" wire:click="$emitTo('qnas-child', 'showEditForm', {{ $result->id}});" class="text-green-500">
                            <x:tall-crud-generator::icon-edit />
                        </button>
                        <button type="submit" wire:click="$emitTo('qnas-child', 'showDeleteForm', {{ $result->id}});" class="text-red-500">
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
    @livewire('qnas-child')
    @livewire('livewire-toast')
</div>
