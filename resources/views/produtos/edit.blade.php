@extends('template.layout')

@section('content')
<h1>Editar o produto</h1>

@if( isset($errors) && count($errors) > 0)
  @foreach($errors->all() as $error)
    <div class="alert alert-danger">
      {{$error}}
    </div>
  @endforeach
@endif

<form action="{{route('produtos.update', $produto->id)}}" method="post">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label>Nome </label>
    <input type="text" class="form-control" name="nome" placeholder="Nome" value="{{ $produto->nome}}">
  </div>
  <div class="form-group">
    <label>Número </label>
    <input type="text" class="form-control" name="numero" placeholder="Numero" value="{{ $produto->numero}}">
  </div>
  <div class="form-group">
    <label>Ativo? </label>
    @if( isset($produto) && $produto->ativo == 1)
      <input type="checkbox" name="ativo" value="1" checked>
    @else
      <input type="checkbox" name="ativo" value="0">
    @endif
  </div>
  <div class="form-group">
    <select class="form-control" name="categorias">
      <option value="null">Selecione a categoria</option>
      @foreach($categorias as $index => $categoria)
        <option value="{{$categoria->id}}"
          @if(isset($produto) && $produto->categories_id == $categoria->id)
          selected
          @endif
        >{{$categoria->nome}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label>Descrição</label>
    <textarea name="descricao" class="form-control" placeholder="descrição">{{$produto->descricao}}</textarea>
  </div>
  <input class="btn btn-success" type="submit" value="Enviar">
  <a class="btn btn-primary" href="{{route('produtos.index')}}">Voltar</a>
</form>

@endsection