{{-- calling layouts \ app.blade.php --}}
@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-12">
      <h1>Crud com Laravel e AJAX</h1>
    </div>
  </div>

  <div class="row">
    <div class="table table-responsive">
      <table class="table table-bordered" id="table">
        <tr>
          <th>ID</th>
          <th>Título</th>
          <th>Texto</th>
          <th>Criado em</th>
          <th class="text-center" width="150px">
            <a href="#" class="create-modal btn btn-success ">
              <i class="fa fa-plus-square"></i>
            </a>
          </th>
        </tr>
        {{ csrf_field() }}
        <?php  $no=1; ?>
        @foreach ($post as $value)
          <tr class="post{{$value->id}}">
            <td>{{ $no++ }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->body }}</td>
            <td>{{ $value->created_at }}</td>
            <td>
              <a href="#" class="show-modal btn btn-info " data-id="{{$value->id}}" data-title="{{$value->title}}" data-body="{{$value->body}}">
                <i class="fa fa-eye"></i>
              </a>
              <a href="#" class="edit-modal btn btn-warning " data-id="{{$value->id}}" data-title="{{$value->title}}" data-body="{{$value->body}}">
                <i class="fa fa-pencil-alt"></i>
              </a>
              <a href="#" class="delete-modal btn btn-danger " data-id="{{$value->id}}" data-title="{{$value->title}}" data-body="{{$value->body}}">
                <i class="fa fa-trash"></i>
              </a>
            </td>
          </tr>
        @endforeach
      </table>
    </div>
    {{$post->links()}}
  </div>


  {{-- MODAL da criação de postagem  --}}



  <div id="create" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>

        <div class="modal-body">
          <form class="form-horizontal" role="form">
            <div class="form-group row add">
              <label class="control-label" for="title">Titulo :</label>
              <div class="col-10">
                <input type="text" class="form-control" id="title" name="title"
                placeholder="Titulo da postagem" required>
                <p class="error text-center alert alert-danger hidden"></p>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label" for="body">Corpo da mensagem :</label>
              <div class="col-10">
                <input type="text" class="form-control" id="body" name="body"
                placeholder="Corpo da mensagem" required>
                <p class="error text-center alert alert-danger hidden"></p>
              </div>
            </div>
          </form>

        </div>


        <div class="modal-footer">
          <button class="btn btn-warning" type="submit" id="add">
            <span class="fa fa-save"></span>Salvar postagem
          </button>

          <button class="btn btn-warning" type="button" data-dismiss="modal">
            <span class="fa fa-window-close"></span>Fechar
          </button>
        </div>
      </div>

    </div>
  </div></div>



  {{-- Modal da exibição da postagem --}}



  <div id="show" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="">ID :</label>
            <b id="i"/>
          </div>
          <div class="form-group">
            <label for="">Título :</label>
            <b id="ti"/>
          </div>
          <div class="form-group">
            <label for="">Corpo da mensagem :</label>
            <b id="by"/>
          </div>
        </div>
      </div>
    </div>
  </div>




  {{-- Modal da edição e exclusão de postagem  --}}

  <div id="myModal"class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="modal">
            <div class="form-group">
              <label class="control-label col-2"for="id">ID</label>
              <div class="col-10">
                <input type="text" class="form-control" id="fid" disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-2"for="title">Título</label>
              <div class="col-10">
                <input type="name" class="form-control" id="t">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2"for="body">Corpo da mensagem: </label>
              <div class="col-10">
                <textarea type="name" class="form-control" id="b"></textarea>
              </div>
            </div>
          </form>

          {{-- Exclusão de postagem --}}
          <div class="deleteContent">
            Tem certeza que deseja excluir? <span class="title"></span>?
            <span class="hidden id">&nbsp; </span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn actionBtn" data-dismiss="modal">
            <span id="footer_action_button" class="fa fa-save"></span>
          </button>

          <button type="button" class="btn btn-warning" data-dismiss="modal">
            <span class="fa fa-window-close"></span>Fechar
          </button>
        </div>
      </div>
    </div>
  </div>
@endsection
