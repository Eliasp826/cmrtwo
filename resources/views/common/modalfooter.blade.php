</div>
<div class="modal-footer">
    <button type="button" wire:click.prevent="resetUI()" class="btn btn-primary close-btn"
            data-dismiss="modal">CERRAR</button>

    @if($selected_id < 1)
        <button type="button" wire:click.prevent="Store()" class="btn btn-primary close-modal"
                >Guardar</button>
    @else
        <button type="button" wire:click.prevent="Update()" class="btn btn-primary close-modal"
                >Cerrar</button>
    @endif
            </div>
        </div>
    </div>
</div>
