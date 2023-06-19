<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Usuarios</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Usuarios</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="d-flex justify-content-end m-2">
                        <wire:button class="btn btn-primary"><i class="fa fa-plus-square m-1">
                            </i>Agragar Nuevo Usuario</wire:button>
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
                                                <input type="text" wire:model ="search" class="form-control form-control-lg"
                                                       placeholder="Buscar">
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
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Roles</th>
                                    <th scope="col">Estactud</th>
                                    <th scope="col">Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td class="text-center"><span>
                                            <img src="" alt="imagen de ejemplo" height="70" width="80"
                                            class="round">
                                        </span>Mark</td>

                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>admin</td>
                                    <td class="text-center">
                                        <a href="" class="btn btn-primary" title="Edit">
                                            <i class="fas fa-user-edit m-2"></i>
                                        </a>
                                        <a href="" class="btn btn-danger" title="delete">
                                            <i class="fas fa-user-trash m-2"></i>
                                        </a>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                            pagintion
                        </div>
                    </div>



                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
include form
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){

    });
</script>
