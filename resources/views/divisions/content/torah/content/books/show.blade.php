@extends('layouts.panel')

@section('content')    
<table class="table">
    <thead>
      <tr>
        <th scope="co0">Código</th>
        <th scope="co1">LIVRO</th>
        <th scope="co1">Ações</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
        <tr>
            <th scope="row"></th>
            <td colspan="0"><button type="button" class="btn btn-primary create-book-buttom" data-bs-toggle="modal" data-bs-target="#modal-book">Cadastrar livro</button></td>
        </tr>
    </tfoot>
  </table>

    <!-- Modal -->
    <div class="modal fade" id="modal-book" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <form class="modal-content">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Nomes de acordo com os idiomas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="hidden" class="form-control" id="inputId">
                    <input type="text" class="form-control" id="inputNamePt" placeholder=">Nome português">
                    <label for="inputNamePt">Nome português</label>
                  </div>
                  <div class="form-floating">
                    <input type="text" class="form-control" id="inputNameHe" placeholder=">Nome hebreu">
                    <label for="inputNameHe">Nome hebreu</label>
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
    @include('divisions.content.torah.content.books.scripts.show')
@endsection