<div>

    <x:tall-crud-generator::confirmation-dialog wire:model="confirmingItemDeletion">
        <x-slot name="title">
            Delete Record
        </x-slot>

        <x-slot name="content">
            Are you sure you want to Delete Record?
        </x-slot>

        <x-slot name="footer">
            <x:tall-crud-generator::button wire:click="$set('confirmingItemDeletion', false)">Cancel</x:tall-crud-generator::button>
            <x:tall-crud-generator::button mode="delete" wire:loading.attr="disabled" wire:click="deleteItem()">Delete</x:tall-crud-generator::button>
        </x-slot>
    </x:tall-crud-generator::confirmation-dialog>

    <x:tall-crud-generator::dialog-modal wire:model="confirmingItemCreation">
        <x-slot name="title">
            Add Record
        </x-slot>

        <x-slot name="content">

            <div class="mt-4">
                <x:tall-crud-generator::label>Fecha Inicio</x:tall-crud-generator::label>
                <x-datepicker id="item.fecha_inicio" wire:model.lazy="item.fecha_inicio" class="block mt-1 w-1/2"/>
                <!-- <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.fecha_inicio" /> -->
                @error('item.fecha_inicio') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Fecha Fin</x:tall-crud-generator::label>
                <x-datepicker id="item.fecha_fin" wire:model.lazy="item.fecha_fin" class="block mt-1 w-1/2"/>
                <!-- <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.fecha_fin" /> -->
                @error('item.fecha_fin') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>

            <div class="grid grid-cols-3">
                <div class="mt-4">
                    <x:tall-crud-generator::label>Employee</x:tall-crud-generator::label>
                    <x:tall-crud-generator::select class="block mt-1 w-full" wire:model.defer="item.employee_id">
                        <option value="">Please Select</option>
                        @foreach($employees as $c)
                        <option value="{{$c->id}}">{{$c->num_empleado}} - {{$c->fullname}}</option>
                        @endforeach
                    </x:tall-crud-generator::select>
                    @error('item.employee_id') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
                </div>
            </div>

            <div class="grid grid-cols-3">
                <div class="mt-4">
                    <x:tall-crud-generator::label>Incidencia</x:tall-crud-generator::label>
                    <x:tall-crud-generator::select class="block mt-1 w-full" wire:model.defer="item.incidencia_id">
                        <option value="">Please Select</option>
                        @foreach($incidencias as $c)
                        <option value="{{$c->id}}">{{$c->code}}</option>
                        @endforeach
                    </x:tall-crud-generator::select>
                    @error('item.incidencia_id') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
                </div>
            </div>

            <div class="grid grid-cols-3">
                <div class="mt-4">
                    <x:tall-crud-generator::label>Qna</x:tall-crud-generator::label>
                    <x:tall-crud-generator::select class="block mt-1 w-full" wire:model.defer="item.qna_id">
                        <option value="">Please Select</option>
                        @foreach($qnas as $c)
                        <option value="{{$c->id}}">{{$c->description}}</option>
                        @endforeach
                    </x:tall-crud-generator::select>
                    @error('item.qna_id') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
                </div>
            </div>

            <div class="grid grid-cols-3">
                <div class="mt-4">
                    <x:tall-crud-generator::label>Periodo</x:tall-crud-generator::label>
                    <x:tall-crud-generator::select class="block mt-1 w-full" wire:model.defer="item.periodo_id">
                        <option value="">Please Select</option>
                        @foreach($periodos as $c)
                        <option value="{{$c->id}}">{{$c->description}}</option>
                        @endforeach
                    </x:tall-crud-generator::select>

                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x:tall-crud-generator::button wire:click="$set('confirmingItemCreation', false)">Cancel</x:tall-crud-generator::button>
            <x:tall-crud-generator::button mode="add" wire:loading.attr="disabled" wire:click="createItem()">Save</x:tall-crud-generator::button>
        </x-slot>
    </x:tall-crud-generator::dialog-modal>

    <x:tall-crud-generator::dialog-modal wire:model="confirmingItemEdit">
        <x-slot name="title">
            Edit Record
        </x-slot>

        <x-slot name="content">

            <div class="mt-4">
                <x:tall-crud-generator::label>Fecha Inicio</x:tall-crud-generator::label>
                <x-datepicker id="item.fecha_inicio" wire:model.lazy="item.fecha_inicio" class="block mt-1 w-1/2"/>
                @error('item.fecha_inicio') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Fecha Fin</x:tall-crud-generator::label>
                <x-datepicker id="item.fecha_fin" wire:model.lazy="item.fecha_fin" class="block mt-1 w-1/2"/>
                @error('item.fecha_fin') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>

            <div class="grid grid-cols-3">
                <div class="mt-4">
                    <x:tall-crud-generator::label>Employee</x:tall-crud-generator::label>
                    <x:tall-crud-generator::select class="block mt-1 w-full" wire:model.defer="item.employee_id">
                        <option value="">Please Select</option>
                        @foreach($employees as $c)
                        <option value="{{$c->id}}">{{$c->num_empleado}} - {{$c->fullname}}</option>
                        @endforeach
                    </x:tall-crud-generator::select>
                    @error('item.employee_id') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
                </div>
            </div>



            <div class="grid grid-cols-3">
                <div class="mt-4">
                    <x:tall-crud-generator::label>Incidencia</x:tall-crud-generator::label>
                    <x:tall-crud-generator::select class="block mt-1 w-full" wire:model.defer="item.incidencia_id">
                        <option value="">Please Select</option>
                        @foreach($incidencias as $c)
                        <option value="{{$c->id}}">{{$c->code}}</option>
                        @endforeach
                    </x:tall-crud-generator::select>
                    @error('item.incidencia_id') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
                </div>
            </div>

            <div class="grid grid-cols-3">
                <div class="mt-4">
                    <x:tall-crud-generator::label>Qna</x:tall-crud-generator::label>
                    <x:tall-crud-generator::select class="block mt-1 w-full" wire:model.defer="item.qna_id">
                        <option value="">Please Select</option>
                        @foreach($qnas as $c)
                        <option value="{{$c->id}}">{{$c->description}}</option>
                        @endforeach
                    </x:tall-crud-generator::select>
                    @error('item.qna_id') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
                </div>
            </div>

            <div class="grid grid-cols-3">
                <div class="mt-4">
                    <x:tall-crud-generator::label>Periodo</x:tall-crud-generator::label>
                    <x:tall-crud-generator::select class="block mt-1 w-full" wire:model.defer="item.periodo_id">
                        <option value="">Please Select</option>
                        @foreach($periodos as $c)
                        <option value="{{$c->id}}">{{$c->description}}</option>
                        @endforeach
                    </x:tall-crud-generator::select>
                    @error('item.periodo_id') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x:tall-crud-generator::button wire:click="$set('confirmingItemEdit', false)">Cancel</x:tall-crud-generator::button>
            <x:tall-crud-generator::button mode="add" wire:loading.attr="disabled" wire:click="editItem()">Save</x:tall-crud-generator::button>
        </x-slot>
    </x:tall-crud-generator::dialog-modal>
</div>
