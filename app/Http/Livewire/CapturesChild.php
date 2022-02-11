<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \Illuminate\View\View;
use App\Models\Capture;
use App\Models\Employee;
use App\Models\Incidencia;
use App\Models\Qna;
use App\Models\Periodo;

class CapturesChild extends Component
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
    public $employees = [];

    /**
     * @var array
     */
    public $incidencias = [];

    /**
     * @var array
     */
    public $qnas = [];

    /**
     * @var array
     */
    public $periodos = [];

    /**
     * @var array
     */
    protected $rules = [
        'item.fecha_inicio' => 'required',
        'item.fecha_fin' => 'required',
        'item.employee_id' => 'required',
        'item.incidencia_id' => 'required',
        'item.qna_id' => 'required',
        'item.periodo_id' => '',
    ];

    /**
     * @var array
     */
    protected $validationAttributes = [
        'item.fecha_inicio' => 'Fecha Inicio',
        'item.fecha_fin' => 'Fecha Fin',
        'item.employee_id' => 'Employee',
        'item.incidencia_id' => 'Incidencia',
        'item.qna_id' => 'Qna',
        'item.periodo_id' => 'Periodo',
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
        return view('livewire.captures-child');
    }

    public function showDeleteForm(int $id): void
    {
        $this->confirmingItemDeletion = true;
        $this->primaryKey = $id;
    }

    public function deleteItem(): void
    {
        Capture::destroy($this->primaryKey);
        $this->confirmingItemDeletion = false;
        $this->primaryKey = '';
        $this->reset(['item']);
        $this->emitTo('captures', 'refresh');
        $this->emitTo('livewire-toast', 'show', 'Record Deleted Successfully');
    }

    public function showCreateForm(): void
    {
        $this->confirmingItemCreation = true;
        $this->resetErrorBag();
        $this->reset(['item']);

        $this->employees = Employee::orderBy('num_empleado')->get();

        $this->incidencias = Incidencia::orderBy('code')->get();

        $this->qnas = Qna::orderBy('qna')->get();

        $this->periodos = Periodo::orderBy('periodo')->get();
    }

    public function createItem(): void
    {
        $this->validate();
        $item = Capture::create([
            'fecha_inicio' => $this->item['fecha_inicio'] ?? '',
            'fecha_fin' => $this->item['fecha_fin'] ?? '',
            'employee_id' => $this->item['employee_id'] ?? 0,
            'incidencia_id' => $this->item['incidencia_id'] ?? 0,
            'qna_id' => $this->item['qna_id'] ?? 0,
            'periodo_id' => $this->item['periodo_id'] ?? null,
        ]);
        $this->confirmingItemCreation = false;
        $this->emitTo('captures', 'refresh');
        $this->emitTo('livewire-toast', 'show', 'Record Added Successfully');
    }

    public function showEditForm(Capture $capture): void
    {
        $this->resetErrorBag();
        $this->item = $capture;
        $this->confirmingItemEdit = true;

        $this->employees = Employee::orderBy('num_empleado')->get();

        $this->incidencias = Incidencia::orderBy('code')->get();

        $this->qnas = Qna::orderBy('qna')->get();

        $this->periodos = Periodo::orderBy('periodo')->get();
    }

    public function editItem(): void
    {
        $this->validate();
        $this->item->save();
        $this->confirmingItemEdit = false;
        $this->primaryKey = '';
        $this->emitTo('captures', 'refresh');
        $this->emitTo('livewire-toast', 'show', 'Record Updated Successfully');
    }

}
