<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Usersrole</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
                <div class="form-group">
                <label for="rol">Seleccione un Rol:</label>
                <select wire:model="role_id" class="form-control" id="role_id">@error('role_id') <span class="error text-danger">{{ $message }}</span> @enderror
                                <option value="">Seleccione una opcion...</option>
                                @foreach($nombreRoles as $rol)
                                    <option value="{{$rol->id}}">{{$rol->name}}</option>
                                @endforeach
                </select>
                {{-- <input wire:model="rol" type="text" class="form-control" id="rol" placeholder="Rol">@error('rol') <span class="error text-danger">{{ $message }}</span> @enderror --}}
            </div>
            <div class="form-group">
                <label for="nombre">Seleccione el usuario:</label>
                <select wire:model="model_id" class="form-control" id="model_id">@error('model_id') <span class="error text-danger">{{ $message }}</span> @enderror
                                <option value="">Seleccione una opcion...</option>
                                @foreach($usuarios as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                {{-- <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror --}}
            </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
