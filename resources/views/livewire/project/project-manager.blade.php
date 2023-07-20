<div>
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4><i class="m-0"></i>Listado de Proyectos</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Proyectos</li>
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
                                <button wire:click.prevent="addNew" class="btn btn-primary" data-toggle="modal" data-target="#createDataModal">
                                    <i class="fa fa-plus-square m-1">
                                    </i>Nuevo Proyectos</button>
                            </div>


                            <h4 class="card-title">
                                <b>componentName | PageTitle</b>
                            </h4>
                            <div class="container-fluid">
                                <input wire:model="keyWord" type="text" class="form-control" name="search" id="serach" placeholder="Search Projects">
                            </div>


                            <div class="card-body">
                                @include('livewire.project.modals')
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead class="thead">
                                        <tr>
                                            <th scope="col">Proyecto</th>
                                            <th scope="col">Descripcion</th>
                                            <th scope="col">Fecha Limite</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Usuario</th>
                                            <th scope="col">Cliente</th>
                                            <th scope="col">Accion</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($projects as $project)
                                            <tr>
                                                <td class="text-center"><span>
                                        </span>{{ $project->name }}</td>
                                                <td>{{$project->description}}</td>
                                                <td>{{$project->deadline}}</td>
                                                <td>{{$project->status}}</td>
                                                <td>{{$project->client->contact_name}}</td>
                                                <td>{{$project->user->name}}</td>
                                                <td width="90">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                                            Actions
                                                        </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a data-toggle="modal" data-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$project->id}})"><i class="fa fa-edit"></i> Edit </a></li>
                                                        <li><a class="dropdown-item" onclick="confirm('Confirm Delete Project id {{$project->id}}? \nDeleted Projects cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$project->id}})"><i class="fa fa-trash"></i> Delete </a></li>
                                                    </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-end">
                                        {{ $projects->links() }}
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
