<?php

namespace App\Http\Livewire\Task;

use App\Models\Client;
use App\Models\Project;
use app\Models\User;
use App\Models\Tasks;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class TaskManager extends Component
{
    use withPagination;
    //public $photo;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;

    public $task;

    public $showEditModal = false;

    public $state = [];

    public $taskIdBeingRemoved = null;

    public function addNew()
    {
        $this->state =[];


        $this->showEditModal = false;

        $this->dispatchBrowserEvent('show-form');
    }
    public function createTask()
    {
        $validatedData = validator::make($this->state,[
            'name' => 'required|min:5',
            'description' => 'required',
            'deadline' => 'required',
            'status' => 'required',
            'client_id' => 'required',
            'user_id' => 'required',

        ])->validate();


        Tasks::create($validatedData);

        // session()->flash('message', 'User added successfully!');

        $this->dispatchBrowserEvent('hide-form', ['message' => 'Client added successfully!']);

    }

    public function updateTask()
    {
        $validatedData = validator::make($this->state,[
            'contact_name' => 'required',
            'contact_email' => 'required|email|unique:clients,contact_email,' .$this->task->id,
            'contact_phone_number' => 'required',
            'company_name' => 'required',
            'company_address' => 'required',
            'company_phone_number' => 'required',
        ])->validate();


        $this->task->update($validatedData);

        // session()->flash('message', 'User added successfully!');

        $this->dispatchBrowserEvent('hide-form', ['message' => 'Client updated successfully!']);
    }

    public function confirmTaskRemoval($taskId)
    {
        $this->taskIdBeingRemoved = $taskId;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function deleteTask()
    {
        $task = Tasks::findOrFail($this->taskIdBeingRemoved);
        $task->delete();
        $this->dispatchBrowserEvent('hide-delete-modal', ['massage' => 'Client deleted successfully!']);
    }
    public function edit(tasks $task)
    {
        $this->showEditModal = true;
        $this->task = $task;
        $this->state = $task->toArray();
        $this->dispatchBrowserEvent('show-form');
    }
    public function render()
    {
        $tasks = Tasks::latest()->paginate(5);
        return view('livewire.task.task-manager', [
            'tasks' => $tasks,
        ]);
    }
}
