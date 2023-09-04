<div>
    <!-- modal task formulario crear-->
    <div wire:ignore.self class="modal fade" id="createDataModal" tabindex="-1" role="dialog"
         aria-labelledby="createDataModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createDataModalLabel">Agregar Nueva Tarea</h5>
                    <button wire:click.prevent="cancel()" type="button" class="btn-close"
                    data-dismiss="modal" aria-label="close">x</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="name" class="required">Tarea</label>
                            <input wire:model="name" type="text" name="name" id="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
                            placeholder="Ingrese la tarea agsinadad" value="{{old('name', '')}}">
                            @if($errors->has('name'))
                                <span class="error text-danger">
                                    <strong>{{$errors->first('name')}}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description" class="required"></label>
                            <textarea wire:model="description" name="description" placeholder="Descripcion"
                                      class="form-control">{{old('description', '')}}</textarea>
                            @if($errors->has('description'))
                                <span class="error text-danger">
                                    <strong>{{$errors->first('description')}}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="deadline" class="required">Fecha Limite</label>
                            <input wire:model="deadline" name="deadline" type="text" class="form-control date"
                            value="{{old('deadline')}}">
                        </div>

                        <div class="form-group">
                            <label for="user_id" class="required">Usuario</label>
                            <select wire:model="user_id" class="form-control select2" name="user_id" style="width: 100%;">
                                <option value="">Seleccione un usuario</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }} {{old('user_id') == $user->id ? 'selected' : ''}}">
                                        {{$user->name}}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('user_id'))
                                <span class="text-danger">
                                    <strong>{{$errors->first('user_id')}}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="client_id" class="required">Cliente</label>
                            <select wire:model="client_id"  class="form-control select2" id="client_id" style="width: 100%;">
                                <option value="">Seleccione un cliente</option>
                                @foreach($clients as $client)
                                    <option value="{{$client->id}}" {{old('client_id') == $client->id ? 'selected' : ''}}>
                                    {{ $client->contact_name }}
                                        @endforeach
                                    </option>
                            </select>
                            @if($errors->has('client_id'))
                                <span class="text-danger">
                                    <strong>{{$errors->first('client_id')}}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="project_id" class="required">Proyectos</label>
                            <select wire:model="project_id" class="form-control select2" name="project_id" style="width: 100%;">
                                <option value="">Seleccione un proyecto</option>
                                @foreach($project as $project)
                                    <option value="{{$project->id}}" {{old('$project_id') == $project_id ? 'selected' : ''}}>
                                        {{ $project->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('$project_id'))
                                <span class="text-danger">
                                    <strong>{{$errors->first($project_id)}}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="task_status">Status del proyecto</label>
                            <select wire:model="task_status" class="form-control {{$errors->has('task_status') ? 'is_invalid' : ''}}" name="task_status"
                                    id="task_status" required>
                                <option value="">Seleccione un status</option>
                                @foreach(App\Models\Tasks::STATUS as $status)
                                    <option value="{{$status}}" {{old('$status') == $status ? 'selected' : ''}}>{{$status}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('$status'))
                                <div class="text-danger">
                                    {{$errors->first('$status')}}
                                </div>
                            @endif
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                    <button type="button" wire:click.prevent="store()" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>

    </div>
</div>
