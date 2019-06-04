@extends('template.layout')


@section('content')
<h1>Cria novo produto</h1>

@if( isset($errors) && count($errors) > 0)
  @foreach($errors->all() as $error)
    <div class="alert alert-danger">
      {{$error}}
    </div>
  @endforeach
@endif

<form action="{{route('produtos.store')}}" method="POST">
  @csrf
  <div class="form-group">
    <label>Nome</label>
    <input type="text" class="form-control" name="nome" placeholder="Nome" value="{{old('nome')}}">
  </div>
  <div class="form-group">
    <label>Número</label>
    <input type="text" class="form-control" name="numero" placeholder="Numero" value="{{old('numero')}}">
  </div>
  <div class="form-group">
    <label>Categoria</label>
    <select class="form-control" name="categorias">
      <option value="{{null}}">Selecione a categoria</option>
      @foreach($categorias as $index => $categoria)
        @if($categoria->id == old('categorias'))
          <option value="{{$categoria->id}}" selected="selected">{{$categoria->nome}}</option>
        @else
          <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
        @endif
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label>Ativo? </label>
    <input type="checkbox" name="ativo" value="{{old('ativo')}}">
  </div>
  <div class="form-group">
    <textarea class="form-control" name="descricao"class="form-control"  placeholder="descrição">{{old('description')}}</textarea>
  </div>

  <input class="btn btn-success" type="submit" value="Enviar">
  <a class="btn btn-primary" href="{{route('produtos.index')}}">Voltar</a>
</form>

@endsection