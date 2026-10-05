@extends('Layout.branco')

@section('title', 'Emprestimo')

@section('content')

    <div class="container-fluid px-3">
      <div class="row justify-content-center mt-4 mb-4">
        <ul class="col-12 col-lg-9 nav nav-underline d-flex flex-row justify-content-center list-unstyled px-0">
            <li class="nav-item text-center flex-fill">
                <a class="nav-link text-black active" aria-current="page" id="emprestar_btn" href="#">Emprestar</a>
            </li>
            <li class="text-center nav-item flex-fill">
                <a class="nav-link text-black" aria-current="page" id="lista_btn" href="#">Lista</a>
            </li>
        </ul>
            <div id="form-emprestimo" class="col-12 col-lg-9 rounded shadow-lg p-3 mb-5 mt-4 bg-body-tertiary">
                 <div class="row justify-content-center d-flex">
                    <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                        <label for="nome" class="form-label">Nome do item</label>
                        <input type="text" class="form-control " id="nome" name="nome"
                            placeholder="Digite o nome do item para emprestimo">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                        <label for="email" class="form-label">Responsável <i>(Opcional)</i></label>
                        <input type="email" class="form-control " id="email" name="email"
                            placeholder="Digite o responsável pelo emprestimo (professor, inspetor, etc)">
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control " id="email" name="email"
                            placeholder="Digite seu email (ex: SeuEmail@exemplo.com)">
                    </div>
                    <div class="col-lg-4 col-md-3 col-sm-12 mt-3">
                        <label for="ano" class="form-label">Ano/Turma</label>
                        <input class="form-control" list="datalistOptions" maxlength="2"
                            placeholder="Digite o ano/turma (ex: 1A)">
                        <datalist id="datalistOptions">
                            <option value="6A">
                            <option value="6B">
                            <option value="7A">
                            <option value="7B">
                            <option value="8A">
                            <option value="8B">
                            <option value="9A">
                            <option value="9B">
                            <option value="1A">
                            <option value="1B">
                            <option value="2A">
                            <option value="2B">
                            <option value="3A">
                            <option value="3B">
                        </datalist>
                    </div>
                    <div class="col-lg-4 col-md-3 col-sm-12 mt-3">
                        <label for="data" class="form-label">Data de emprestimo</label>
                        <input type="date" class="form-control " id="data" name="data" readonly>
                    </div>
                    <div class="col-lg-4 col-md-3 col-sm-12 mt-3">
                        <label for="prazo" class="form-label">Prazo de entrega</label>
                        <input type="date" class="form-control " id="prazo" name="prazo" readonly>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 mt-3">
                        <label for="item" class="form-label">Item pra emprestimo</label>
                        <input type="text" class="form-control" list="listaItens" id="item" name="item"
                            placeholder="Digite o nome do item">
                        <datalist id="listaItens">

                        </datalist>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 mt-3">
                        <label for="qtd" class="form-label">Quantidade</label>
                        <input type="number" min="1" class="form-control " id="qtd" name="qtd"
                            placeholder="Digite a quantidade">
                    </div>
                    <div class="col-12 mt-3 text-center">
                        <button type="submit" class=" btn btn-dark shadow-lg container-fluid">Emprestar</button>
                    </div>
                </div>
            </div> 
            <div id="lista" class="col-12 col-lg-9 rounded shadow-lg p-3 mb-5 mt-4 bg-body-tertiary">
                <div class="table-responsive">
                 <table class="table table-dark text-light table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">QTD_disponível</th>
                        <th scope="col">QTD_total</th>
                        <th scope="col">Localização</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
                </div>
            </div>
      </div>
    </div>
@endsection
