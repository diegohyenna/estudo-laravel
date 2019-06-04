
@extends('template.layout')

@section('content')

  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success')}}
    </div>
  @elseif(session('error'))
    <div class="alert alert-danger">
      {{ session('error')}}
    </div>
  @endif

  <h1>Listagem de Produtos</h1>

  <a class="btn btn-primary" href="{{route('produtos.create')}}">Cadastrar</a>
  <hr>

  @foreach ($produtos as $produto)
    <p><strong>Nome </strong>{{ $produto->nome }}</p>
    <p><strong>Descrição </strong>{{ $produto->descricao }}</p>
    <p><strong>Categoria </strong>{{ $produto->categories->nome}}</p>
    <form action="{{route('produtos.destroy', $produto->id)}}" method="post">
      @csrf
      @method('DELETE')
      <a class="btn btn-primary" href="{{route('produtos.show', $produto->id)}}">Show</a>
      <a class="btn btn-warning" href="{{route('produtos.edit', $produto->id)}}">Editar</a>
      <button class="btn btn-danger" type="submit">Deletar</button>
    </form>
    <hr>
  @endforeach

  {{$produtos->links()}}

@endsection

@push('scripts')
<!-- aqui vai script personalizados so pra essa pagina-->
@endpush()