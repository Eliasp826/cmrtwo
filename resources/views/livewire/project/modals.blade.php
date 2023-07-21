<div>
    <!-- Add Modal -->
    <div wire:ignore.self class="modal fade" id="createDataModal"  tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createDataModalLabel">Create New Project</h5>
                    <button wire:click.prevent="cancel()" type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="name" class="required"></label>
                            <input wire:model.defer="state.name" type="text" name="name" id="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
                                   placeholder="Ingrese el nombre del proyecto" value="{{old('name', '')}}">
                            @if ($errors->has('name'))
                                <span class="error text-danger">{{ $message }}
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description" class="required"></label>
                            <textarea wire:model.defer="state.description"name="description" placeholder="Descripcion" class="form-control">{{old('description', '')}}</textarea>
                            @if ($errors->has('description'))
                                <span class="error text-danger">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>

                        <!--<div class="form-group">
                            <label for="description"></label>
                            <input wire:model="description" type="text" class="form-control" id="description"
                                   placeholder="Descripcion">@error('description') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>-->
                        <div class="form-group">
                            <label for="deadline"></label>
                            <input wire:model.defer="state.deadline" type="text" class="form-control date" id="deadline"
                                   placeholder="Fecha Limite">@error('deadline') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="user_id" class="required">Usuario</label>
                            <select wire:model.defer="state.user_id" id="user_id" class="form-control select2" name="user_id" style="width: 100%;">
                                <option value="">Seleccione un usuario</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{old('user_id') == $user->id ? 'selected' : ''}}>
                                        {{ $user->name }}
                                        @endforeach
                                    </option>
                            </select>
                            @if ($errors->has('user_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('user_id') }}</strong>
                                </span>
                            @endif
                        </div>

                        <!--<div class="form-group">
                            <label for="user_id"></label>
                            <input wire:model="user_id" type="text" class="form-control" id="user_id"
                                   placeholder="User Id">@error('user_id') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>-->

                        <div class="form-group">
                            <label for="client_id" class="required">Cliente</label>
                            <select wire:model.defer="state.client_id"class="form-control select2" name="client_id" style="width: 100%;">
                                <option value="">Seleccione un cliente</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" {{old('client_id') == $client->id ? 'selected' : ''}}>
                                        {{ $client->contact_name }}
                                        @endforeach
                                    </option>
                            </select>
                            @if ($errors->has('client_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('client_id') }}</strong>
                                </span>
                            @endif
                        </div>

                        <!--<div class="form-group">
                            <label for="client_id"></label>
                            <select class="form-control select2"></select>
                            <input wire:model="client_id" type="text" class="form-control" id="client_id"
                                   placeholder="Client Id">@error('client_id') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>-->


                        <div class="form-group">
                            <label for="status">Status del proyecto</label>
                            <select wire:model.defer="state.status" class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                                <option value="">Seleccione un status</option>
                                @foreach(App\Models\Project::STATUS as $status)
                                    <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="text-danger">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div wire:ignore.self class="modal fade" id="updateDataModal"  tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Project</h5>
                    <button wire:click.prevent="cancel()" type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" wire:model="selected_id">
                        <div class="form-group">
                            <label for="name"></label>
                            <input wire:model="name" type="text" class="form-control" id="name" placeholder="Name">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="description"></label>
                            <input wire:model="description" type="text" class="form-control" id="description" placeholder="Description">@error('description') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="deadline"></label>
                            <input wire:model="deadline" type="text" class="form-control" id="deadline" placeholder="Deadline">@error('deadline') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="status"></label>
                            <input wire:model="status" type="text" class="form-control" id="status" placeholder="Status">@error('status') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="user_id"></label>
                            <input wire:model="user_id" type="text" class="form-control" id="user_id" placeholder="User Id">@error('user_id') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="client_id"></label>
                            <input wire:model="client_id" type="text" class="form-control" id="client_id" placeholder="Client Id">@error('client_id') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
