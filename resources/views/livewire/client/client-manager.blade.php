<div>
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado Clientes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Clientes</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</div>
<!-- Menu del contenido -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">

                <div class="d-flex justify-content-end m-2">
                    <button wire:click.prevent="addNew" class="btn btn-primary">
                        <i class="fa fa-plus-square m-1">
                        </i>Agragar</button>
                </div>
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">
                            <b>componentName | PageTitle</b>
                        </h4>
                        <div class="container-fluid">
                            <h2 class="text-center display-4"></h2>
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <form action="simple-results.html">
                                        <div class="input-group">
                                            <input type="text" wire:model="searchTerm"
                                                   class="form-control form-control-lg"
                                                   placeholder="Buscar...">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-lg btn-default">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre del cliente</th>
                                <th scope="col">Email del cliente</th>
                                <th scope="col">Telefono del cliente</th>
                                <th scope="col">Nombre de la empresa</th>
                                <th scope="col">Direccion de la empresa</th>
                                <th scope="col">Telefono de la empresa</th>
                                <th scope="col">Accion</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td class="text-center"><span>
                                            <img src="https://icons.veryicon.com/png/o/business/multi-color-financial-and-business-icons/user-139.png" class="rounded-lg mr-2" alt="" width="34"
                                                 class="w-space-no">
                                        </span>{{ $client->contact_name }}</td>

                                    <td>{{$client->contact_email}}</td>
                                    <td>{{$client->contact_phone_number}}</td>
                                    <td>{{$client->company_name}}</td>
                                    <td>{{$client->company_address}}</td>
                                    <td>{{$client->company_phone_number}}</td>

                                    <td class="text-center">

                                        <a href="{{route('clients.show', $client->id)}}"
                                           wire:click.prevent="show" class="btn btn-info" title="view">
                                            <i class="fas fa-solid fa-eye mr2"></i>
                                        </a>

                                        <a href="" wire:click.prevent="edit({{ $client }})"
                                           class="btn btn-primary" title="Edit">
                                            <i class="fas fa-user-edit mr2"></i>
                                        </a>

                                        <a href="" wire:click.prevent="confirmUserRemoval({{ $client->id }})"
                                           class="btn btn-danger" title="delete">
                                            <i class="fas fa-trash mr2"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $clients->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

<!-- modal cliente formulario-->
<div class="modal fade" id="form" tabindex="1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg" role="document">
        <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateClient' :
                'createClient' }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">
                        @if($showEditModal)
                            <span>Edit Cliente</span>
                        @else
                            <span>Agregar nuevo Cliente</span>
                        @endif
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="contact_name">Nombre del cliente</label>
                            <input type="text" wire:model.defer="state.contact_name" class="form-control
                                @error('contact_name') is-invalid @enderror" id="contact_name" aria-describedby="nameHelp"
                                   placeholder="Enter full name">
                            @error('contact_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="contact_email">Email del client</label>
                            <input type="text" wire:model.defer="state.contact_email" class="form-control @error('contact_email')
                                is-invalid @enderror" id="contact_email" aria-describedby="emailHelp"
                                   placeholder="ingresar contact_email">
                            @error('contact_email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="contact_phone_number">Telefono del cliente</label>
                            <input type="text" wire:model.defer="state.contact_phone_number" class="form-control @error('contact_phone_number')
                                is-invalid @enderror" id="contact_phone_number" aria-describedby="phoneHelp"
                                   placeholder="ingresar phone">
                            @error('contact_phone_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="company_name">Nombre de la empresa</label>
                            <input type="text" wire:model.defer="state.company_name" class="form-control @error('company_name')
                                is-invalid @enderror" id="company_name" aria-describedby="emailHelp"
                                   placeholder="ingresar empresa">
                            @error('company_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="company_address">Dirreccion de la empresa</label>
                            <input type="text" wire:model.defer="state.company_address" class="form-control
                                @error('company_address') is-invalid @enderror" id="company_address" placeholder="company_address">
                            @error('company_address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="company_phone_number">Telefono de la empresa</label>
                            <input type="text" wire:model.defer="state.company_phone_number" class="form-control @error('company_phone_number')
                                is-invalid @enderror" id="company_phone_number" aria-describedby="phoneHelp"
                                   placeholder="ingresar phone">
                            @error('company_phone_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                    </div>


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fa-times mr-1"></i>Cancelar</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save mr-1"></i>
                        @if($showEditModal)
                            <span>Guardar Cambios</span>
                        @else
                            <span>Guardar</span>
                        @endif
                    </button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="confirmationModal" tabindex="1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Eliminar cliente</h5>
            </div>
            <div class="modal-body">
                <h4>Esta seguro que de sea eliminar este cliente?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fa-times mr-1"></i>Cancelar</button>
                <button type="button" wire:click.prevent="deleteClient" class="btn btn-danger">
                    <i class="fa fa-trash mr-1">Eliminar Cliente</i>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal-dialog -->
</div>
