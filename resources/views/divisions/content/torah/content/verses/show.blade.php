@extends('layouts.panel')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="co0">#</th>
        <th scope="co1">Número</th>
        <th scope="co2">Texto português</th>
        <th scope="co3">Texto hebreu</th>
        <th scope="co4">Ações</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
        <tr>
            <th scope="row"></th>
            <td colspan="0"><button type="button" class="btn btn-primary create-verse-buttom" data-bs-toggle="modal" data-bs-target="#modal-verse">Cadastrar vesículo</button></td>
        </tr>
    </tfoot>
  </table>

    <!-- Modal -->
    <div class="modal fade" id="modal-verse" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <form class="modal-content">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Informações de acordo com idiomas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating">
                  <input type="hidden" class="form-control" id="inputId">
                  <input type="text" class="form-control" id="inputNumberPt" placeholder=">Número pt">
                  <label for="inputNumberPt">Número pt</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="inputNumberHe" placeholder=">Número hebreu">
                  <label for="inputNumberHe">Número hebreu</label>
                </div>
                <div class="form-floating">
                  <input type="text" class="form-control" id="inputVersePt" placeholder=">Texto pt">
                  <label for="inputVersePt">Texto pt</label>
                </div>
                <div class="form-floating">
                  <input type="text" class="form-control" id="inputVerseHe" placeholder=">Texto hebreu">
                  <label for="inputVerseHe">Texto hebreu</label>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-danger btn-delete">Excluir</button>
            <button type="button" class="btn btn-primary btn-save">Salvar</button>
            </div>
        </form>
        </div>
    </div>
@endsection


@section('scripts')
    @include('divisions.content.torah.content.verses.scripts.show')
@endsection