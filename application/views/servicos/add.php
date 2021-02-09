

<?php $this->load->view('layout/sidebar'); ?>



<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navibar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('servicos'); ?>">Servicos</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
            </ol>
        </nav>



        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a title="Voltar" href="<?php echo base_url($this->router->fetch_class()); ?>" class="btn btn-success btn-sm float-right"><i class="fas fa-chevron-circle-left"></i>&nbsp;Voltar</a>   
            </div>
            <div class="card-body">

                <form class="user" method="POST" name="form_add">

                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small" ><i class="fas fa-laptop "></i>&nbsp;Dados do serviço</legend>

                        <div class="mb-4 row">

                            <div class="col-md-6">
                                <label>Nome do serviço</label>
                                <input type="text" class="form-control" name="servico_nome" placeholder="Nome do serviço" value="<?php echo set_value('servico_nome'); ?>">
                                <?php echo form_error('servico_nome', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>



                            <div class="col-md-3">
                                <label>Preço</label>
                                <input type="text" class="form-control money" name="servico_preco" placeholder="Preço do serviço" value="<?php echo set_value('servico_preco'); ?>">
                                <?php echo form_error('servico_preco', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>

                            <div class="col-md-3">
                                <label>Servico ativo</label>
                                <select class="custom-select" name="servico_ativo">
                                    <option value="0">Não</option>
                                    <option value="1">Sim</option>
                                </select>                              
                            </div> 

                        </div>

                        <div class="mb-4 row">

                            <div class="col-md-12">
                                <label>Descrição</label>
                                <textarea class="form-control "  placeholder="Obs" name="servico_descricao" style="min-height: 100px!important"><?php echo set_value('servico_descricao'); ?></textarea>
                                <?php echo form_error('servico_descricao', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>

                        </div>

                    </fieldset>
                    

                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                </form>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


