<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \Illuminate\View\View;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Job;
use App\Models\Condition;
use App\Models\Schedule;

class EmployeesChild extends Component
{

    public $item;

    /**
     * @var array
     */
    protected $listeners = [
        'showDeleteForm',
        'showCreateForm',
        'showEditForm',
    ];

    /**
     * @var array
     */
    public $departments = [];

    /**
     * @var array
     */
    public $jobs = [];

    /**
     * @var array
     */
    public $conditions = [];

    /**
     * @var array
     */
    public $schedules = [];

    /**
     * @var array
     */
    protected $rules = [
        'item.num_empleado' => 'required|numeric',
        'item.name' => 'required',
        'item.first_lastname' => 'required',
        'item.second_lastname' => 'required',
        'item.fecha_ingreso' => 'required',
        'item.department_id' => 'required',
        'item.job_id' => 'required',
        'item.condition_id' => 'required',
        'item.schedule_id' => 'required',
    ];

    /**
     * @var array
     */
    protected $validationAttributes = [
        'item.num_empleado' => 'Num Empleado',
        'item.name' => 'Name',
        'item.first_lastname' => 'First Lastname',
        'item.second_lastname' => 'Second Lastname',
        'item.fecha_ingreso' => 'Fecha Ingreso',
        'item.department_id' => 'Department',
        'item.job_id' => 'Job',
        'item.condition_id' => 'Condition',
        'item.schedule_id' => 'Schedule',
    ];

    /**
     * @var bool
     */
    public $confirmingItemDeletion = false;

    /**
     * @var string | int
     */
    public $primaryKey;

    /**
     * @var bool
     */
    public $confirmingItemCreation = false;

    /**
     * @var bool
     */
    public $confirmingItemEdit = false;

    public function render(): View
    {
        return view('livewire.employees-child');
    }

    public function showDeleteForm(int $id): void
    {
        $this->confirmingItemDeletion = true;
        $this->primaryKey = $id;
    }

    public function deleteItem(): void
    {
        Employee::destroy($this->primaryKey);
        $this->confirmingItemDeletion = false;
        $this->primaryKey = '';
        $this->reset(['item']);
        $this->emitTo('employees', 'refresh');
        $this->emitTo('livewire-toast', 'show', 'Record Deleted Successfully');
    }

    public function showCreateForm(): void
    {
        $this->confirmingItemCreation = true;
        $this->resetErrorBag();
        $this->reset(['item']);

        $this->departments = Department::orderBy('code')->get();

        $this->jobs = Job::orderBy('name')->get();

        $this->conditions = Condition::orderBy('name')->get();

        $this->schedules = Schedule::orderBy('name')->get();
    }

    public function createItem(): void
    {
        $this->validate();
        $item = Employee::create([
            'num_empleado' => $this->item['num_empleado'] ?? '',
            'name' => $this->item['name'] ?? '',
            'first_lastname' => $this->item['first_lastname'] ?? '',
            'second_lastname' => $this->item['second_lastname'] ?? '',
            'fecha_ingreso' => $this->item['fecha_ingreso'] ?? '',
            'department_id' => $this->item['department_id'] ?? 0,
            'job_id' => $this->item['job_id'] ?? 0,
            'condition_id' => $this->item['condition_id'] ?? 0,
            'schedule_id' => $this->item['schedule_id'] ?? 0,
        ]);
        $this->confirmingItemCreation = false;
        $this->emitTo('employees', 'refresh');
        $this->emitTo('livewire-toast', 'show', 'Record Added Successfully');
    }

    public function showEditForm(Employee $employee): void
    {
        $this->resetErrorBag();
        $this->item = $employee;
        $this->confirmingItemEdit = true;

        $this->departments = Department::orderBy('code')->get();

        $this->jobs = Job::orderBy('name')->get();

        $this->conditions = Condition::orderBy('name')->get();

        $this->schedules = Schedule::orderBy('name')->get();
    }

    public function editItem(): void
    {
        $this->validate();
        $this->item->save();
        $this->confirmingItemEdit = false;
        $this->primaryKey = '';
        $this->emitTo('employees', 'refresh');
        $this->emitTo('livewire-toast', 'show', 'Record Updated Successfully');
    }

}
