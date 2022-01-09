<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \Illuminate\View\View;
use App\Models\Qna;

class QnasChild extends Component
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
    protected $rules = [
        'item.qna' => 'required|numeric',
        'item.year' => 'required|numeric',
        'item.description' => 'required',
        'item.active' => '',
    ];

    /**
     * @var array
     */
    protected $validationAttributes = [
        'item.qna' => 'Qna',
        'item.year' => 'Year',
        'item.description' => 'Description',
        'item.active' => 'Active',
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
        return view('livewire.qnas-child');
    }

    public function showDeleteForm(int $id): void
    {
        $this->confirmingItemDeletion = true;
        $this->primaryKey = $id;
    }

    public function deleteItem(): void
    {
        Qna::destroy($this->primaryKey);
        $this->confirmingItemDeletion = false;
        $this->primaryKey = '';
        $this->reset(['item']);
        $this->emitTo('qnas', 'refresh');
        $this->emitTo('livewire-toast', 'show', 'Record Deleted Successfully');
    }

    public function showCreateForm(): void
    {
        $this->confirmingItemCreation = true;
        $this->resetErrorBag();
        $this->reset(['item']);
    }

    public function createItem(): void
    {
        $this->validate();
        $item = Qna::create([
            'qna' => $this->item['qna'] ?? '',
            'year' => $this->item['year'] ?? '',
            'description' => $this->item['description'] ?? '',
            'active' => $this->item['active'] ?? 0,
        ]);
        $this->confirmingItemCreation = false;
        $this->emitTo('qnas', 'refresh');
        $this->emitTo('livewire-toast', 'show', 'Record Added Successfully');
    }

    public function showEditForm(Qna $qna): void
    {
        $this->resetErrorBag();
        $this->item = $qna;
        $this->confirmingItemEdit = true;
    }

    public function editItem(): void
    {
        $this->validate();
        $this->item->save();
        $this->confirmingItemEdit = false;
        $this->primaryKey = '';
        $this->emitTo('qnas', 'refresh');
        $this->emitTo('livewire-toast', 'show', 'Record Updated Successfully');
    }

}
