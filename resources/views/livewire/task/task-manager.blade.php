<div>
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4><i class="m-0"></i>Listado de Tarea</h4>
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
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex justify-content-end m-2">
                                <button wire:click.prevent="addNew" class="btn btn-primary"
                                        data-toggle="modal" data-target="#createDataModal">
                                    <i class="fa fa-plus-square m-1">
                                    </i>Nueva Tarea</button>
                            </div>


                            <h4 class="card-title">
                                <b>componentName | PageTitle</b>
                            </h4>
                            <div class="container-fluid">
                                <h2 class="text-center display-4"></h2>
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <input wire:model="keyWord" type="text" class="form-control"
                                               name="search" id="serach" placeholder="Buscar">
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                @include('livewire.task.modals')
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead class="thead">
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
                                        @foreach($tasks as $task)
                                        <tr>
                                            <td class="text-center"><span>
                                                </span>{{ $task->name}}</td>
                                            <td>{{$task->description}}</td>
                                            <td>{{$task->deadline}}</td>
                                            <td>{{$task->task_status}}</td>
                                            <td>{{$task->project->name}}</td>
                                            <td>{{$task->user->name}}</td>
                                            <td>{{$task->client->contact_name}}</td>
                                            <td class="text-center">
                                                <div class="text-center">

                                                    <a class="btn btn-primary" title="Edit"
                                                       data-toggle="modal" data-target="#updateDataModal" wire:click="edit({{$task->id}})">
                                                        <i class="fa fa-edit"></i></a>

                                                    <a class="btn btn-danger" title="delete"
                                                       onclick="confirm('Confirm Delete Project id {{$task->id}}? \nDeleted Projects cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$task->id}})">
                                                        <i class="fas fa-trash mr-2"></i>
                                                    </a>

                                                </div>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-end">
                                        {{$tasks->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
</div>
