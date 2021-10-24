@extends('layouts.panel')

@section('content')    
<table class="table">
    <thead>
      <tr>
        <th scope="co0">#</th>
        <th scope="co1">Número</th>
        <th scope="co2">Texto português</th>
        <th scope="co3">Texto hebreu</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td  colspan="0">
          <a href="#">número pt | número hebreu</a>
          <i class="fas fa-cog pointer"  data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
        </td>
        <td  colspan="1">
          <a href="#">Texto pt</a>
          <i class="fas fa-cog pointer"  data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
        </td>
        <td  colspan="2">
          <a href="#">Texto hebreu</a>
          <i class="fas fa-cog pointer"  data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
        </td>
      </tr>
    </tbody>
    <tfoot>
        <tr>
            <th scope="row"></th>
            <td colspan="0"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastrar vesículo</button></td>
        </tr>
    </tfoot>
  </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Informações de acordo com idiomas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingInput" placeholder=">Número pt">
                  <label for="floatingInput">Número pt</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingInput" placeholder=">Número hebreu">
                  <label for="floatingInput">Número hebreu</label>
                </div>
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingPassword" placeholder=">Texto pt">
                  <label for="floatingPassword">Texto pt</label>
                </div>
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingPassword" placeholder=">Texto hebreu">
                  <label for="floatingPassword">Texto hebreu</label>
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
    @include('divisions.content.neviim.content.verses.scripts.show')
@endsection