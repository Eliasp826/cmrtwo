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
