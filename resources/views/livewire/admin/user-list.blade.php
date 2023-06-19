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
                                                <input type="search" class="form-control form-control-lg"
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
                                @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td class="text-center"><span>
                                            <img src="" alt="" height="70" width="80"
                                                 class="round">
                                        </span>{{ $user->name }}</td>

                                    <td>{{$user->email}}</td>
                                    <td>@mdo</td>
                                    <td>Administrador</td>
                                    <td class="text-center">
                                        <a href="" class="btn btn-primary" title="Edit">
                                            <i class="fas fa-user-edit m-2"></i>
                                        </a>
                                        <a href="" class="btn btn-danger" title="delete">
                                            <i class="fas fa-trash m-2"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>



                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <div class="modal fade" id="form" tabindex="1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <form autocomplete="off" wire:submit.prevent="createUser">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Agregar nuevo usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">Nombre</label>
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
                                <label for="email">Email address</label>
                                <input type="text" wire:model.defer="state.email" class="form-control @error('email')
                                is-invalid @enderror" id="email" aria-describedby="emailHelp"
                                       placeholder="ingresar email">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" wire:model.defer="state.password" class="form-control
                                @error('password') is-invalid @enderror" id="password" placeholder="password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="PasswordConfirmation">Confirm Password</label>
                                <input type="password" wire:model.defer="state.password_confirmation"
                                       class="form-control"
                                       id="passwordConfirmation" placeholder="Password">
                            </div>

                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="terms" class="custom-control-input"
                                           id="exampleCheck1">
                                    <label class="custom-control-label"
                                           for="exampleCheck1">I agree to the
                                        <a href="#">terms of service</a>.</label>
                                </div>

                            </div>
                        </div>


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>

