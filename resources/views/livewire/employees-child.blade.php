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
                <x:tall-crud-generator::label>Num Empleado</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.num_empleado" />
                @error('item.num_empleado') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Name</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.name" />
                @error('item.name') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>First Lastname</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.first_lastname" />
                @error('item.first_lastname') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Second Lastname</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.second_lastname" />
                @error('item.second_lastname') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Fecha Ingreso</x:tall-crud-generator::label>
                <x-datepicker id="item.fecha_ingreso" wire:model.lazy="item.fecha_ingreso" class="block mt-1 w-1/2"/>
                @error('item.fecha_ingreso') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>

            <div class="grid grid-cols-3">
                <div class="mt-4">
                    <x:tall-crud-generator::label>Department</x:tall-crud-generator::label>
                    <x:tall-crud-generator::select class="block mt-1 w-full" wire:model.defer="item.department_id">
                        <option value="">Please Select</option>
                        @foreach($departments as $c)
                        <option value="{{$c->id}}">{{$c->code}}</option>
                        @endforeach
                    </x:tall-crud-generator::select>
                    @error('item.department_id') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
                </div>
            </div>

            <div class="grid grid-cols-3">
                <div class="mt-4">
                    <x:tall-crud-generator::label>Job</x:tall-crud-generator::label>
                    <x:tall-crud-generator::select class="block mt-1 w-full" wire:model.defer="item.job_id">
                        <option value="">Please Select</option>
                        @foreach($jobs as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </x:tall-crud-generator::select>
                    @error('item.job_id') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
                </div>
            </div>

            <div class="grid grid-cols-3">
                <div class="mt-4">
                    <x:tall-crud-generator::label>Condition</x:tall-crud-generator::label>
                    <x:tall-crud-generator::select class="block mt-1 w-full" wire:model.defer="item.condition_id">
                        <option value="">Please Select</option>
                        @foreach($conditions as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </x:tall-crud-generator::select>
                    @error('item.condition_id') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
                </div>
            </div>

            <div class="grid grid-cols-3">
                <div class="mt-4">
                    <x:tall-crud-generator::label>Schedule</x:tall-crud-generator::label>
                    <x:tall-crud-generator::select class="block mt-1 w-full" wire:model.defer="item.schedule_id">
                        <option value="">Please Select</option>
                        @foreach($schedules as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </x:tall-crud-generator::select>
                    @error('item.schedule_id') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
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
                <x:tall-crud-generator::label>Num Empleado</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.num_empleado" />
                @error('item.num_empleado') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Name</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.name" />
                @error('item.name') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>First Lastname</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.first_lastname" />
                @error('item.first_lastname') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Second Lastname</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.second_lastname" />
                @error('item.second_lastname') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Fecha Ingreso</x:tall-crud-generator::label>
                <x-datepicker id="item.fecha_ingreso" wire:model.lazy="item.fecha_ingreso" class="block mt-1 w-1/2"/>
                <!-- <x:tall-crud-generator::input class="block mt-1 w-1/2" type="date" wire:model.defer="item.fecha_ingreso" /> -->
                @error('item.fecha_ingreso') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>



            <div class="grid grid-cols-3">
                <div class="mt-4">
                    <x:tall-crud-generator::label>Department</x:tall-crud-generator::label>
                    <x:tall-crud-generator::select class="block mt-1 w-full" wire:model.defer="item.department_id">
                        <option value="">Please Select</option>
                        @foreach($departments as $c)
                        <option value="{{$c->id}}">{{$c->code}}</option>
                        @endforeach
                    </x:tall-crud-generator::select>
                    @error('item.department_id') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
                </div>
            </div>

            <div class="grid grid-cols-3">
                <div class="mt-4">
                    <x:tall-crud-generator::label>Job</x:tall-crud-generator::label>
                    <x:tall-crud-generator::select class="block mt-1 w-full" wire:model.defer="item.job_id">
                        <option value="">Please Select</option>
                        @foreach($jobs as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </x:tall-crud-generator::select>
                    @error('item.job_id') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
                </div>
            </div>

            <div class="grid grid-cols-3">
                <div class="mt-4">
                    <x:tall-crud-generator::label>Condition</x:tall-crud-generator::label>
                    <x:tall-crud-generator::select class="block mt-1 w-full" wire:model.defer="item.condition_id">
                        <option value="">Please Select</option>
                        @foreach($conditions as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </x:tall-crud-generator::select>
                    @error('item.condition_id') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
                </div>
            </div>

            <div class="grid grid-cols-3">
                <div class="mt-4">
                    <x:tall-crud-generator::label>Schedule</x:tall-crud-generator::label>
                    <x:tall-crud-generator::select class="block mt-1 w-full" wire:model.defer="item.schedule_id">
                        <option value="">Please Select</option>
                        @foreach($schedules as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </x:tall-crud-generator::select>
                    @error('item.schedule_id') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x:tall-crud-generator::button wire:click="$set('confirmingItemEdit', false)">Cancel</x:tall-crud-generator::button>
            <x:tall-crud-generator::button mode="add" wire:loading.attr="disabled" wire:click="editItem()">Save</x:tall-crud-generator::button>
        </x-slot>
    </x:tall-crud-generator::dialog-modal>
</div>
