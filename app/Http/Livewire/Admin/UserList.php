<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
//use livewire\withFileUploads; // trait
use Livewire\withPagination;

class UserList extends Component
{
    //use withFileUploads;
    use withPagination;
    //public $photo;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;

    public $state = [];

    public $user;

    public $showEditModal = false;

    public $userIdBeingRemoved = null;



    public function addNew()
    {
        $this->state =[];


        $this->showEditModal = false;

        $this->dispatchBrowserEvent('show-form');
    }

    public function createUser()
    {
        $validatedData = validator::make($this->state,[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ])->validate();

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        // session()->flash('message', 'User added successfully!');

        $this->dispatchBrowserEvent('hide-form', ['message' => 'User added successfully!']);

    }

    public function updateUser()
    {
        $validatedData = validator::make($this->state,[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'password' => 'sometimes|confirmed',
        ])->validate();

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        $this->user->update($validatedData);

        // session()->flash('message', 'User added successfully!');

        $this->dispatchBrowserEvent('hide-form', ['message' => 'User updated successfully!']);

    }

    public function confirmUserRemoval($userId)
    {
        $this->userIdBeingRemoved = $userId;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function deleteUser()
    {
        $user = User::findOrFail($this->userIdBeingRemoved);
        $user->delete();
        $this->dispatchBrowserEvent('hide-delete-modal', ['massage' => 'User deleted successfully!']);
    }
    public function edit(user $user)
    {
        $this->showEditModal = true;
        $this->user = $user;
        $this->state = $user->toArray();
        $this->dispatchBrowserEvent('show-form');
     }

    public function render()
    {
        $users = User::latest()->paginate(5);

        return view('livewire.admin.user-list', [
            'users' => $users,
        ]);

    }
}
