<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb text-xs">
            <li><a href="<?php echo base_url(); ?>home">Home</a>
            </li>
            <li><a href="#">Tarefa</a>
            </li>
            <li class="active">Alterar</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="margin-none">
                    <i class="fa fa-th fa-fw"></i> Alterar registro de Tarefa
                </h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="post" action="<?php echo base_url();?>tarefa/doAlterar" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $vTarefa[0]->id; ?>">
                            
                            <div class="form-group">
                                <label>Pessoa :</label> 
                                <input class="form-control cur" readonly="readonly" value="<?php echo $vTarefa[0]->nome; ?>" data-toggle="modal" data-target="#myModalPessoa" id="nome_pessoa" name="nome_pessoa" placeholder="Nome do Pessoa">
                                <input type="hidden" id="pessoa_id" class="form-control" value="<?php echo $vTarefa[0]->pessoa_id; ?>" name="pessoa_id">
                                <input type="button" class="btn btn-danger remove_pessoa" value="Remover Pessoa" />
                            </div>
                            <div class="form-group">
                                <label>Titulo :</label> <input class="form-control" value="<?php echo $vTarefa[0]->titulo; ?>" name="titulo" placeholder="Titulo">
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>
                            <div class="form-group">
                                <?php 
                                 $dataHora = explode(' ', $vTarefa[0]->dataHora);
                                 
                                 $dataHora[0] = implode("/",array_reverse(explode("-",$dataHora[0])))
                                ?>
                                
                                <label>Data/Hora :</label> <input class="form-control date" name="dataHora" value="<?php echo $dataHora[0] . ' ' . $dataHora[1]; ?>" id="datetimepicker_mask" placeholder="Data / Hora">
                            </div>

                            <div class="form-group">
                                <label>Prioridade :</label>
                                <select class="form-control" name="prioridade">
                                    <option value=""></option>
                                    <option value="0" <?php echo ( $vTarefa[0]->prioridade == 0 ? "selected='selected'" : "" ); ?>>Baixa</option>
                                    <option value="1" <?php echo ( $vTarefa[0]->prioridade == 1 ? "selected='selected'" : "" ); ?>>Normal</option>
                                    <option value="2" <?php echo ( $vTarefa[0]->prioridade == 2 ? "selected='selected'" : "" ); ?>>Alta</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Estado :</label>
                                <select class="form-control" name="estado">
                                    <option value=""></option>
                                    <option value="0" <?php echo ( $vTarefa[0]->estado == 0 ? "selected='selected'" : "" ); ?>>Pendente</option>
                                    <option value="1" <?php echo ( $vTarefa[0]->estado == 1 ? "selected='selected'" : "" ); ?>>Em andamento</option>
                                    <option value="2" <?php echo ( $vTarefa[0]->estado == 2 ? "selected='selected'" : "" ); ?>>Concluída</option>
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
