
@extends('template.layout')

@section('content')

  <h1>Produto</h1>

  <p><strong>Nome </strong>{{ $produto->nome }}</p>
  <p><strong>Descrição </strong>{{ $produto->descricao }}</p>
  <p><strong>Categoria </strong>{{ $produto->categories->nome}}</p>
  <p><strong>Número </strong>{{ $produto->numero}}</p>
  <p><strong>Ativo </strong>{{ $produto->ativo ? 'Sim':'Não'}}</p>
  <form action="{{route('produtos.destroy', $produto->id)}}" method="post">
    @csrf
    @method('DELETE')
    <a class="btn btn-primary" href="{{route('produtos.index')}}">Voltar</a>
    <a class="btn btn-warning" href="{{route('produtos.edit', $produto->id)}}">Editar</a>
    <button class="btn btn-danger" type="submit">Deletar</button>
  </form>
  <hr>

@endsection

@push('scripts')
<!-- aqui vai script personalizados so pra essa pagina-->
@endpush()