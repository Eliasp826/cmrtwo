<div>
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Listado de tarea</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tarea</li>
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
                            </i>Nueva Tarea</button>
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
                                    <th scope="col">Tarea</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Fecha Limite</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Proyecto</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="text-center"><span>
                                        </span>{{ $task->name }}</td>

                                        <td>{{$task->description}}</td>
                                        <td>{{$task->dealine}}</td>
                                        <td>{{$task->task_status}}</td>
                                        <td>{{$task->project->name}}</td>
                                        <td>{{$task->user->name}}</td>
                                        <td>{{$task->$client->contact_name}}</td>

                                        <td class="text-center">

                                            <a href="" wire:click.prevent="edit({{ $task->id }})"
                                               class="btn btn-primary" title="Edit">
                                                <i class="fas fa-user-edit mr-2"></i>
                                            </a>

                                            <a href="" wire:click.prevent="confirmTaskRemoval({{ $task->id }})"
                                               class="btn btn-danger" title="delete">
                                                <i class="fas fa-trash mr-2"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="card-footer d-flex justify-content-end">
                                {{ $tasks->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

    <!-- modal task formulario crear-->
    <div class="modal fade" id="form" tabindex="1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateTasks' :
                'createTask' }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">
                            @if($showEditModal)
                                <span>Edit Tarea/span>
                            @else
                                <span>Agregar nueva Tarea</span>
                            @endif
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Tarea</label>
                                <input type="text" wire:model.defer="state.name" class="form-control
                                @error('name') is-invalid @enderror" id="name" aria-describedby="nameHelp"
                                       placeholder="Enter full name">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Descripcion</label>
                                <input type="text" wire:model.defer="state.description" class="form-control @error('description"')
                                is-invalid @enderror" id="description" aria-describedby="emailHelp"
                                       placeholder="ingresar contact_email">
                                @error('description"')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deadline">Fecha Límite</label>
                                <input type="text" wire:model.defer="state.deadline" class="form-control @error('deadline')
                                is-invalid @enderror" id="deadline" aria-describedby="phoneHelp"
                                       placeholder="ingresar phone">
                                @error('deadline')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="user_id">Usuario</label>
                                <select type="text" wire:model.defer="state.user_id" class="form-control select2" name="user_id" style="width: 100%;">
                                    <option value="">Seleccione un usuario</option>
                                @error('user_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="client_id">Cliente</label>
                                <select type="text" wire:model.defer="state.client_id" class="form-control select2" name="client_id" style="width: 100%;">
                                    <option value="">Seleccione un usuario</option>
                                    @error('client_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="project_id">Proyectos</label>
                                <select type="text" wire:model.defer="state.project_id" class="form-control select2" name="project_id" style="width: 100%;">
                                    <option value="">Seleccione un usuario</option>
                                    @error('project_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="task_status">Status del proyectos</label>
                                <select type="text" wire:model.defer="state.status" class="form-control select2" name="user_id" style="width: 100%;">
                                    <option value="">Seleccione un status</option>
                                    @error('status_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </select>
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
