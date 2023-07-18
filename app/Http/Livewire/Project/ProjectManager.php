<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use App\Models\Project;
use App\Models\User;
use App\Models\Client;
use Livewire\WithPagination;

class ProjectManager extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public  $selected_id, $keyWord, $name, $description, $deadline, $status, $user_id, $client_id;

    public function render()
    {
        $keyWord = '%'. $this->keyWord .'%';
        return view('livewire.project.project-manager', [
            'projects' => Project::latest()
            ->orWhere('name', 'LIKE', $keyWord)
            ->orWhere('description', 'LIKE', $keyWord)
            ->orWhere('deadline', 'LIKE', $keyWord)
            ->orWhere('status', 'LIKE', $keyWord)
            ->orWhere('user_id', 'LIKE', $keyWord)
            ->orWhere('client_id', 'LIKE', $keyWord)
            ->paginate(5),
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
        $this->status = null;
        $this->user_id = null;
        $this->client_id = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'require',
            'deadline' => 'required',
            'status' => 'required',
        ]);

        Project::create([
           'name' => $this-> name,
           'description' => $this-> description,
           'deadline' => $this-> deadline,
            'status' => $this-> status,
            'user_id' => $this-> user_id,
            'client_id' => $this-> client_id
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Project Successfully created');
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
