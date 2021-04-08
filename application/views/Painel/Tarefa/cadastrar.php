<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb text-xs">
            <li><a href="<?php echo base_url(); ?>home">Home</a>
            </li>
            <li><a href="#">Tarefa</a>
            </li>
            <li class="active">Cadastrar</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="margin-none">
                    <i class="fa fa-th fa-fw"></i> Cadastro de Tarefa
                </h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="post" action="<?php echo base_url(); ?>tarefa/doCadastrar" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Pessoa :</label> 
                                <input class="form-control cur" readonly="readonly" data-toggle="modal" data-target="#myModalPessoa" id="nome_pessoa" name="nome_pessoa" placeholder="Nome do Pessoa">
                                <input type="hidden" id="pessoa_id" class="form-control" name="pessoa_id">
                            </div>
                            <div class="form-group">
                                <label>Titulo :</label> <input class="form-control" name="titulo" placeholder="Titulo">
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>
                            <div class="form-group">
                                <label>Data/Hora :</label> <input class="form-control date" name="dataHora" id="datetimepicker_mask" placeholder="Data / Hora">
                            </div>

                            <div class="form-group">
                                <label>Prioridade :</label>
                                <select class="form-control" name="prioridade">
                                    <option value=""></option>
                                    <option value="0">Baixa</option>
                                    <option value="1">Normal</option>
                                    <option value="2">Alta</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Estado :</label>
                                <select class="form-control" name="estado">
                                    <option value=""></option>
                                    <option value="0">Pendente</option>
                                    <option value="1">Em andamento</option>
                                    <option value="2">Concluída</option>
                                </select>
                            </div>
                            
                            <div class="possition-btn-form">
                                <button type="submit" class="btn btn-danger">Enviar</button>
                                <button type="reset" class="btn btn-default">Resetar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModalPessoa" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Busca - Lista de Pessoas</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Informe o Nome do Pessoa :</label> <input class="form-control" id="nome_pessoa_busca" name="nome_pessoa_busca" placeholder="Nome Pessoa">
                </div>
                <hr>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover"
                           id="dataTables-example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                            </tr>
                        </thead>
                        <tbody id="result_pessoa">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>
        </div>

    </div>
</div>
