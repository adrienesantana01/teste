@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Item
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

      <form method="post" action="{{ route('form.store') }}">
          <div class="form-group">
              @csrf
              <label for="nome">Nome :</label>
              <input type="text" class="form-control" name="nome"/>
          </div>
          <div class="form-group">
              <label for="idade">Idade :</label>
              <input type="number" class="form-control" name="idade"/>
          </div>
          <div class="form-group">
              <label for="birth_year">Ano de nasc. :</label>
              <input type="number" class="form-control" name="birth_year"/>
          </div>
          <div class="form-group">
              <label for="votes">Telefone :</label>
              <input type="number" class="form-control" name="votes"/>
          </div>
          <div class="form-group">
              <label for="description">Fala um pouco sobre sua vida :</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <div class="form-group">
              <label for="amount">Altura em cm :</label>
              <input type="munber" class="form-control" name="amount"/>
          </div>
       
          
          <button type="submit" class="btn btn-primary">Cadastrar</button>
      </form>
  </div>
</div>
@endsection