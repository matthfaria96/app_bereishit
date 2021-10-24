@extends('layouts.panel')

@section('content')    
<table class="table">
    <thead>
      <tr>
        <th scope="co0">Código</th>
        <th scope="co1">CAPÍTULOS</th>
        <th scope="co2">Ações</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
        <tr>
            <th scope="row"></th>
            <td colspan="2"><button type="button" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastrar capítulo </button></td>
        </tr>
    </tfoot>
  </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <form class="modal-content">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Números de acordo com os idiomas</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="inputNumberPt" placeholder=">Número do capítulo em português">
                      <label for="inputNumberPt">Número do capítulo em português</label>
                    </div>
                    <div class="form-floating">
                      <input type="text" class="form-control" id="inputNumberHe" placeholder=">Número do capítulo em Hebreu">
                      <label for="inputNumberHe">Número do capítulo em Hebreu</label>
                    </div>
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              <button type="button" class="btn btn-primary btn-save">Salvar</button>
              </div>
          </form>
        </div>
    </div>
@endsection


@section('scripts')
    @include('divisions.content.neviim.content.chapters.scripts.show')
@endsection