<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;
use App\Models\User;
use App\Models\Client;
use Livewire\WithPagination;

class ProjectManager extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $state = [];

    public  $selected_id, $keyWord, $name, $description, $deadline, $status, $user_id, $client_id;

    public function mount()
    {

    }
    public function addNew()
    {
        $this->state =[];
        $this->dispatchBrowserEvent('createDataModal');
    }
    public function render()
    {
        $clients = Client::all();
        $users = User::all();

        $keyWord = '%'. $this->keyWord .'%';
        $projects = Project::latest()->paginate(5);
        return view('livewire.project.project-manager', ['projects' => $projects,
        compact('clients', 'users')]);
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
        $this->status = null;
        $this->user_id = null;
        $this->client_id = null;
    }

    public function store()
    {

        $validatedData = validator::make($this->state, [
            'name' => 'required',
            'description' => 'require',
            'deadline' => 'required',
            'status' => 'required',
            'client_id' => 'required|exists:client,id',
            'user_id' => 'required|exists:users_id'
        ])->validate();

        $project = new Project();
        $project->name = $validatedData['name'];

        $client = Client::find($validatedData['client_id']);
        $user = User::find($validatedData['user_id']);

        $project->client()->associate($client);
        $project->user()->associate($user);

        Project::create($validatedData);

      /*  Project::create([
           'name' => $this-> name,
           'description' => $this-> description,
           'deadline' => $this-> deadline,
            'status' => $this-> status,
            'user_id' => $this-> user_id,
            'client_id' => $this-> client_id
        ]);*/



        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        $this->dispatchBrowserEvent('hide-form', ['message' => 'Proyecto agregado successfully!']);
    }

    public function edit($id)
    {
        $record = Project::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record-> name;
        $this->description = $record-> description;
        $this->deadline = $record-> deadline;
        $this->status = $record-> status;
        $this->user_id = $record-> user_id;
        $this->client_id = $record-> client_id;
    }

    public function update()
    {
        $this->validate([
            'name' => ' requiered',
            'description' => 'required',
            'deadline' => 'required',
            'status' => 'required',
        ]);

        if ($this->selected_id) {
            $record = project::find($this->selected_id);
            $record->update([
                'name' => $this-> name,
                'description' => $this-> description,
                'deadline' => $this-> deadline,
                'status'=> $this-> status,
                'user_id' => $this-> user_id,
                'client_id' => $this-> client_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Project Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            project::where('id', $id)->delete();
        }
    }
}
