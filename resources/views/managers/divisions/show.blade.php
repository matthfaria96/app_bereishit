@extends('layouts.panel')

@section('content')    
<table class="table">
    <thead>
      <tr>
        <th scope="co0"></th>
        <th scope="co1"></th>
        <th scope="co2"></th>
        <th scope="co3"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row"></th>
        <td  colspan="0"><a href="/web/manager/books">TORAH | Hebreu</a></td>
        <td  colspan="1"><a href="/web/manager/books">NEVIIM | Hebreu</a></td>
        <td  colspan="2"><a href="/web/manager/books">KETUVIM | Hebreu</a></td>
      </tr>
    </tbody>
    <tfoot>
        <tr>
        </tr>
    </tfoot>
  </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nomes de acordo com os idiomas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder=">Nome português">
                    <label for="floatingInput">Nome português</label>
                  </div>
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingPassword" placeholder=">Nome hebreu">
                    <label for="floatingPassword">Nome hebreu</label>
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