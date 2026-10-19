@extends('Layout.branco')

@section('title', 'Emprestimo')

@section('content')

<link rel="stylesheet" href="{{ asset('cadastros.js') }}">

    <div class="container-fluid px-3">
        <div class="row justify-content-center mt-4 mb-4">
            <ul class="col-12 col-lg-9 nav nav-underline d-flex flex-row justify-content-center list-unstyled px-0">
                <li class="nav-item text-center flex-fill">
                    <a class="nav-link text-black active" aria-current="page" id="cadastro_btn" href="#">Cadastro</a>
                </li>
                <li class="text-center nav-item flex-fill">
                    <a class="nav-link text-black" aria-current="page" id="admlista_btn" href="#">Lista</a>
                </li>
                <li class="text-center nav-item flex-fill">
                    <a class="nav-link text-black" aria-current="page" id="emprestimos_btn" href="#">Emprestimos</a>
                </li>
            </ul>
            <div id="emprestimoS_hist" class="col-12 col-lg-9 rounded shadow-lg p-3 mb-5 mt-4 bg-body-tertiary">
                <div class="row justify-content-center d-flex">
                    <div class="col-lg-12 col-md-12 col-sm-12 mt-3 justify-content-center d-flex">
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Tipo de cadastro
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" id="form-cadastro-item_btn" >Item</a></li>
                                <li><a class="dropdown-item" id="form-cadastro-categoria_btn" >Categoria</a></li>
                                <li><a class="dropdown-item" id="form-cadastro-usuario_btn" >Usuário</a></li>
                                <li><a class="dropdown-item" id="form-cadastro-local_btn" >Local</a></li>
                            </ul>
                        </div>
                    </div>

                    <div id="form-cadastro-item">
                        <div class="row justify-content-center d-flex">
                            <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                                <label for="nome" class="form-label">Nome do item</label>
                                <input type="text" class="form-control " id="nome" name="nome"
                                    placeholder="Digite o nome do item para cadastro">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                                <label for="quantidade" class="form-label">Quantidade</label>
                                <input type="number" class="form-control " id="quantidade" name="quantidade"
                                    placeholder="Digite a quantidade do item para cadastro">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                                <label for="descricao" class="form-label">Descrição do item</label>
                                <textarea class="form-control" id="descricao" name="descricao" placeholder="Digite a descrição do item para cadastro"></textarea>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                                <label for="local" class="form-label">Local</label>
                                <select class="form-select" id="local" name="local">
                                    <option selected>Selecione o local do item</option>

                                </select>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                                <label for="categoria" class="form-label">Categoria</label>
                                <select class="form-select" id="categoria" name="categoria">
                                    <option selected>Selecione a categoria do item</option>

                                </select>
                            </div>


                        </div>
                        <div id="form-cadastro-categoria">
                            <div class="row justify-content-center d-flex">

                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                                    <label for="nome_categoria" class="form-label">Nome da categoria</label>
                                    <input type="text" class="form-control " id="nome_categoria" name="nome"
                                        placeholder="Digite o nome da categoria para cadastro">

                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                                    <label for="descricao_categoria" class="form-label">Descrição da categoria</label>
                                    <textarea class="form-control" id="descricao_categoria" name="descricao_categoria"
                                        placeholder="Digite a descrição da categoria para cadastro"></textarea>
                                </div>

                            </div>
                        </div>
                        <div id="form-cadastro-usuario">
                            <div class="row justify-content-center d-flex">

                                <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                                    <label for="nome_usuario" class="form-label">Nome do usuário</label>
                                    <input type="text" class="form-control " id="nome_usuario" name="nome"
                                        placeholder="Digite o nome do usuário para cadastro">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                                    <label for="senha_usuario" class="form-label">Senha do usuário</label>
                                    <input type="password" class="form-control " id="senha_usuario" name="senha"
                                        placeholder="Digite a senha do usuário para cadastro">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                                    <label for="email_usuario" class="form-label">Email do usuário</label>
                                    <input type="email" class="form-control " id="email_usuario" name="email"
                                        placeholder="Digite o email do usuário para cadastro">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                                    <label for="tipo_usuario" class="form-label">Tipo do usuário</label>
                                    <select class="form-select" id="tipo_usuario" name="tipo_usuario">
                                        <option selected>Selecione o tipo do usuário</option>
                                        <option value="admin">Administrador</option>
                                        <option value="user">Usuário</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                                    <label for="turma" class="form-label">Ano/Turma</label>
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
                            </div>
                            <div id="form-cadastro-Local">
                                <div class="row justify-content-center d-flex">

                                    <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                                        <label for="espaco" class="form-label">Espaço de armazenamento</label>
                                        <input type="text" class="form-control " id="espaco" name="espaco"
                                            placeholder="Digite o nome do espaço de armazenamento para cadastro">

                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                                        <label for="descricao_local" class="form-label">Descrição do local</label>
                                        <textarea class="form-control" id="descricao_local" name="descricao_local"
                                            placeholder="Digite a descrição do local para cadastro"></textarea>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                                        <label for="identificacao_local" class="form-label">Identificação do local</label>
                                        <input type="text" class="form-control " id="identificacao_local"
                                            name="identificacao_local"
                                            placeholder="Digite a identificação do local para cadastro">
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                @endsection
