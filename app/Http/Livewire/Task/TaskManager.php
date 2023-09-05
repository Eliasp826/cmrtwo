<?php

namespace App\Http\Livewire\Task;

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use App\Models\Tasks;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class TaskManager extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';


    public $clients;
    public $users;
    Public $project;

    public $selected_id, $keyWord, $name, $description, $deadline, $task_status, $user_id, $client_id, $project_id;

   public function  mount()
   {
       $this->clients = Client::all();
       $this->users = User::all();
       $this->project = Project::all();
   }
    public function addNew()
    {
        $this->dispatchBrowserEvent('createDataModal');
    }
    public function render()
    {
        $keyWord = '%'. $this->keyWord .'%';
        $tasks = Tasks::latest()->paginate(5);
        return view('livewire.task.task-manager', [
            'tasks' => $tasks,
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->name = null;
        $this->description = null;
        $this->deadline = null;
        $this->task_status = null;
        $this->project->name = null;
        $this->user_id= null;
        $this->client_id = null;
    }
    protected $rules = [
        'name' =>[
            'required'
        ],
        'description' =>[
            'required'
        ],
        'deadline' =>[
            'required',
        ],
        'task_status' =>[
            'required',
        ],
        'client_id' =>[
            'required',
        ],
        'user_id' =>[
            'required',
        ],
        'project_id' =>[
            'required',
        ],
    ];

   protected $messages = [
       'name.required' => 'El tarea es obligatorio',
       'description.required' => 'El tarea es obligatorio',
       'deadline.required' => 'El tarea es obligatorio',
       'task_name.required' => 'El tarea es obligatorio',
   ];
   public function updated($propertyName)
   {
       $this->validateOnly($propertyName);
   }

   public function store()
   {
       $validationData = $this->validate();
       Tasks::create($validationData);

       $this->resetInput();
       $this->dispatchBrowserEvent('closeModal');
       $this->dispatchBrowserEvent('hide-form', ['message' => 'Tarea Agregada Successfully']);
   }

   public function edit($id)
   {
       $record = Tasks::findOrFail($id);
       $this->selected_id = $id;
       $this->name = $record-> name;
       $this->description = $record-> description;
       $this->deadline = $record-> deadline;
       $this->task_status = $record-> task_status;
       $this->client_id = $record-> client_id;
       $this->user_id = $record-> user_id;
       $this->project_id = $record-> project_id;
   }

   public function update()
   {
       $this->validate([
           'name' => 'required',
           'description' => 'required',
           'deadline' => 'required',
           'task_status' => 'required',
       ]);

       if ($this->selected_id){
           $record = tasks::find($this->selected_id);
           $record->update([
               'name' => $this->name,
               'description' => $this->description,
               'deadline' => $this->deadline,
               'task_status' => $this->task_status,
               'client_id' => $this->client_id,
               'user_id' => $this->user_id,
               'project_id' => $this->project_id,


           ]);

           $this->resetInput();
           $this->dispatchBrowserEvent('closeModal');
           $this->dispatchBrowserEvent('hide-form', ['message' => 'Tarea Actualizada Successfully']);

       }
   }

   public function destroy($id)
   {
       if ($id){
           tasks::where('id', $id)->delete();
           $this->dispatchBrowserEvent('show-delete-modal');
           $this->dispatchBrowserEvent('hide-delete-modal', ['massage' => 'tarea elimniar successfully!']);
       }
   }
   /* public function createTask()
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
        $this->dispatchBrowserEvent('show-form');*/
}
