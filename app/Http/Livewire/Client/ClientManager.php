<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;


class ClientManager extends Component
{
    use withPagination;
    //public $photo;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;

    public $client;

    public $showEditModal = false;

    public $state = [];

    public $clientIdBeingRemoved = null;


    public function addNew()
    {
        $this->state =[];


        $this->showEditModal = false;

        $this->dispatchBrowserEvent('show-form');
    }
    public function createClient()
    {
        $validatedData = validator::make($this->state,[
            'contact_name' => 'required',
            'contact_email' => 'required|email|unique:clients,contact_email',
            'contact_phone_number' => 'required',
            'company_name' => 'required',
            'company_address' => 'required',
            'company_phone_number' => 'required',
        ])->validate();


        Client::create($validatedData);

        // session()->flash('message', 'User added successfully!');

        $this->dispatchBrowserEvent('hide-form', ['message' => 'Client added successfully!']);

    }

    public function updateClient()
    {
        $validatedData = validator::make($this->state,[
            'contact_name' => 'required',
            'contact_email' => 'required|email|unique:clients,contact_email,' .$this->client->id,
            'contact_phone_number' => 'required',
            'company_name' => 'required',
            'company_address' => 'required',
            'company_phone_number' => 'required',
        ])->validate();


        $this->client->update($validatedData);

        // session()->flash('message', 'User added successfully!');

        $this->dispatchBrowserEvent('hide-form', ['message' => 'Client updated successfully!']);
    }

    public function confirmUserRemoval($clientId)
    {
        $this->clientIdBeingRemoved = $clientId;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function deleteClient()
    {
        $client = Client::findOrFail($this->clientIdBeingRemoved);
        $client->delete();
        $this->dispatchBrowserEvent('hide-delete-modal', ['massage' => 'Client deleted successfully!']);
    }
    public function edit(client $client)
    {
        $this->showEditModal = true;
        $this->client = $client;
        $this->state = $client->toArray();
        $this->dispatchBrowserEvent('show-form');
    }

    public function show($id)
    {
        $client = Client::findOrFail($id);
        dd($client);
        return view('clients.show',
            compact('client'));
    }
    public function render()
    {
        $clients = Client::latest()->paginate(5);
        return view('livewire.client.client-manager',
        ['clients' => $clients,
            ]);
    }
}
