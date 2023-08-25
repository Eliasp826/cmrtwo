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
                                        <form>
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

                            <div class="card-body">

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

                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <div>
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
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
</div>
