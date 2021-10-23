@extends('layouts.panel')

@section('content')    
<table class="table">
    <thead>
      <tr>
        <th scope="co0">#</th>
        <th scope="co1">CAPÍTULOS</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td  colspan="0">
          <a href="/web/manager/verses">1 | hebreu</a>
          <i class="fas fa-cog pointer"  data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
        </td>
      </tr>
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
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Números de acordo com os idiomas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingInput" placeholder=">Número do capítulo em português">
                    <label for="floatingInput">Número do capítulo em português</label>
                  </div>
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingPassword" placeholder=">Número do capítulo em Hebreu">
                    <label for="floatingPassword">Número do capítulo em Hebreu</label>
                  </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
        </div>
    </div>
@endsection


@section('scripts')
    @include('managers.books.scripts.show')
@endsection