

<?php $this->load->view('layout/sidebar'); ?>



<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navibar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('fornecedores'); ?>">Fornecedores</a></li>
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

                    <?php if (isset($fornecedor)): ?>
                        <p><strong><i class="fas fa-clock"></i>&nbsp;&nbsp;Última alteração:&nbsp;</strong><?php echo formata_data_banco_com_hora($fornecedor->fornecedor_data_alteracao); ?></p>
                    <?php endif; ?>
                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small" ><i class="fas fa-user-tag"></i>&nbsp;Dados principais</legend>

                        <div class="mb-4 row">

                            <div class="col-md-6">
                                <label>Razão social</label>
                                <input type="text" class="form-control" name="fornecedor_razao" placeholder="Razão social" value="<?php echo set_value('fornecedor_razao'); ?>">
                                <?php echo form_error('fornecedor_razao', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>



                            <div class="col-md-5">
                                <label>Nome fantasia</label>
                                <input type="text" class="form-control" name="fornecedor_nome_fantasia" placeholder="Nome fantasia" value="<?php echo set_value('fornecedor_nome_fantasia'); ?>">
                                <?php echo form_error('fornecedor_nome_fantasia', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>


                        </div>

                        <div class="mb-4 row">

                            <div class="col-md-4">
                                <label>CNPJ</label>
                                <input type="text" class="form-control cnpj" name="fornecedor_cnpj" placeholder="CNPJ" value="<?php echo set_value('fornecedor_cnpj'); ?>">
                                <?php echo form_error('fornecedor_cnpj', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>



                            <div class="col-md-4">
                                <label>Inscrição estadual</label>
                                <input type="text" class="form-control" name="fornecedor_ie" placeholder="Inscrição estadual" value="<?php echo set_value('fornecedor_ie'); ?>">
                                <?php echo form_error('fornecedor_ie', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>

                            <div class="col-md-4">
                                <label>Telefone Celular</label>
                                <input type="text" class="form-control sp_celphones" name="fornecedor_celular" placeholder="Telefone Celular" value="<?php echo set_value('fornecedor_celular'); ?>">
                                <?php echo form_error('fornecedor_celular', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>


                        </div>

                        <div class="mb-4 row">

                            <div class="col-md-4">
                                <label>Telefone fixo</label>
                                <input type="text" class="form-control sp_celphones" name="fornecedor_telefone" placeholder="Telefone fixo" value="<?php echo set_value('fornecedor_telefone'); ?>">
                                <?php echo form_error('fornecedor_telefone', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>



                            <div class="col-md-4">
                                <label>E-mail</label>
                                <input type="email" class="form-control" name="fornecedor_email" placeholder="Email" value="<?php echo set_value('fornecedor_email'); ?>">
                                <?php echo form_error('fornecedor_email', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>

                            <div class="col-md-4">
                                <label>Nome do atendente</label>
                                <input type="text" class="form-control" name="fornecedor_contato" placeholder="Nome do atendente" value="<?php echo set_value('fornecedor_contato'); ?>">
                                <?php echo form_error('fornecedor_contato', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>


                        </div>


                    </fieldset>

                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small" ><i class="fas fa-map-marker-alt"></i>&nbsp;Dados de endereço</legend>

                        <div class="mb-3 row">

                            <div class="col-md-6">
                                <label>Endereço</label>
                                <input type="text" class="form-control "  placeholder="Endereço" name="fornecedor_endereco" value="<?php echo set_value('fornecedor_endereco'); ?>">
                                <?php echo form_error('fornecedor_endereco', '<div class="form-text text-danger">', '</div>'); ?>
                            </div> 

                            <div class="col-md-2">
                                <label>Número</label>
                                <input type="text" class="form-control "  placeholder="Número" name="fornecedor_numero_endereco" value="<?php echo set_value('fornecedor_numero_endereco'); ?>">
                                <?php echo form_error('fornecedor_numero_endereco', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>

                            <div class="col-md-4">
                                <label>Complemento</label>
                                <input type="text" class="form-control "  placeholder="Complemento" name="fornecedor_complemento" value="<?php echo set_value('fornecedor_complemento'); ?>">
                                <?php echo form_error('fornecedor_complemento', '<div class="form-text text-danger">', '</div>'); ?>
                            </div> 

                        </div>

                        <div class="mb-3 row">

                            <div class="col-md-4">
                                <label>Bairro</label>
                                <input type="text" class="form-control "  placeholder="Bairro" name="fornecedor_bairro" value="<?php echo set_value('fornecedor_bairro'); ?>">
                                <?php echo form_error('fornecedor_bairro', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>

                            <div class="col-md-2">
                                <label>CEP</label>
                                <input type="text" class="form-control  cep"  placeholder="CEP" name="fornecedor_cep" value="<?php echo set_value('fornecedor_cep'); ?>">
                                <?php echo form_error('fornecedor_cep', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>  

                            <div class="col-md-5">
                                <label>Cidade</label>
                                <input type="text" class="form-control "  placeholder="Cidade" name="fornecedor_cidade" value="<?php echo set_value('fornecedor_cidade'); ?>">
                                <?php echo form_error('fornecedor_cidade', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>  

                            <div class="col-md-1">
                                <label>UF</label>
                                <input type="text" class="form-control  uf"  placeholder="UF" name="fornecedor_estado" value="<?php echo set_value('fornecedor_estado'); ?>">
                                <?php echo form_error('fornecedor_estado', '<div class="form-text text-danger">', '</div>'); ?>
                            </div> 

                        </div>

                    </fieldset>


                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small" ><i class="fas fa-tools"></i>&nbsp;Configurações</legend>

                        <div class="form-group row">

                            <div class="col-md-4">
                                <label>Cliente ativo</label>
                                <select class="custom-select " name="fornecedor_ativo">
                                    <option value="0">Não</option>
                                    <option value="1">Sim</option>
                                </select>                              
                            </div> 

                            <div class="col-md-8">
                                <label>Observações</label>
                                <textarea class="form-control "  placeholder="Obs" name="fornecedor_obs"><?php echo set_value('fornecedor_obs'); ?></textarea>
                                <?php echo form_error('fornecedor_obs', '<div class="form-text text-danger">', '</div>'); ?>
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


