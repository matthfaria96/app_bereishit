@extends('layouts.panel')

@section('content')    
    <!-- Modal -->
    <div class="modal fade" id="modalStore" tabindex="-1" aria-labelledby="modalStoreLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollabl">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalStoreLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
    </div>
    <h1>Painel de Controle</h1>
@endsection


@section('scripts')
    @include('dasboard.scripts.show')
@endsection