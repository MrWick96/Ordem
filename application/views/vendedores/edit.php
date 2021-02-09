<?php $this->load->view('layout/sidebar'); ?>



<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navibar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('vendedores'); ?>">Vendedores</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
            </ol>
        </nav>



        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a title="Voltar" href="<?php echo base_url($this->router->fetch_class()); ?>" class="btn btn-success btn-sm float-right"><i class="fas fa-chevron-circle-left"></i>&nbsp;Voltar</a>   
            </div>
            <div class="card-body">

                <form class="user" method="POST" name="form_edit">

                    <p><strong><i class="fas fa-clock"></i>&nbsp;&nbsp;Última alteração:&nbsp;</strong><?php echo formata_data_banco_com_hora($vendedor->vendedor_data_alteracao); ?></p>

                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small" ><i class="fas fa-user-secret"></i>&nbsp;Dados Pessoais</legend>

                        <div class="mb-4 row">

                            <div class="col-md-6">
                                <label>Nome completo</label>
                                <input type="text" class="form-control" name="vendedor_nome_completo" placeholder="Nome completo" value="<?php echo $vendedor->vendedor_nome_completo; ?>">
                                <?php echo form_error('vendedor_nome_completo', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>



                            <div class="col-md-3">
                                <label>CPF</label>
                                <input type="text" class="form-control cpf" name="vendedor_cpf" placeholder="CPF" value="<?php echo $vendedor->vendedor_cpf; ?>">
                                <?php echo form_error('vendedor_cpf', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>

                            <div class="col-md-3">
                                <label>RG</label>
                                <input type="text" class="form-control rg" name="vendedor_rg" placeholder="RG" value="<?php echo $vendedor->vendedor_rg; ?>">
                                <?php echo form_error('vendedor_rg', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>

                        </div>


                        <div class="mb-2 row">

                            <div class="col-md-6">
                                <label>E-mail</label>
                                <input type="email" class="form-control" name="vendedor_email" placeholder="Email" value="<?php echo $vendedor->vendedor_email; ?>">
                                <?php echo form_error('vendedor_email', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>

                            <div class="col-md-3">
                                <label>Telefone fixo</label>
                                <input type="text" class="form-control sp_celphones" name="vendedor_telefone" placeholder="Telefone fixo" value="<?php echo $vendedor->vendedor_telefone; ?>">
                                <?php echo form_error('vendedor_telefone', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>


                            <div class="col-md-3">
                                <label>Telefone Celular</label>
                                <input type="text" class="form-control sp_celphones" name="vendedor_celular" placeholder="Telefone Celular" value="<?php echo $vendedor->vendedor_celular; ?>">
                                <?php echo form_error('vendedor_celular', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>

                        </div>

                    </fieldset>

                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small" ><i class="fas fa-map-marker-alt"></i>&nbsp;Dados de endereço</legend>

                        <div class="mb-3 row">

                            <div class="col-md-6">
                                <label>Endereço</label>
                                <input type="text" class="form-control "  placeholder="Endereço" name="vendedor_endereco" value="<?php echo $vendedor->vendedor_endereco; ?>">
                                <?php echo form_error('vendedor_endereco', '<div class="form-text text-danger">', '</div>'); ?>
                            </div> 

                            <div class="col-md-2">
                                <label>Número</label>
                                <input type="text" class="form-control "  placeholder="Número" name="vendedor_numero_endereco" value="<?php echo $vendedor->vendedor_numero_endereco; ?>">
                                <?php echo form_error('vendedor_numero_endereco', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>

                            <div class="col-md-4">
                                <label>Complemento</label>
                                <input type="text" class="form-control "  placeholder="Complemento" name="vendedor_complemento" value="<?php echo $vendedor->vendedor_complemento; ?>">
                                <?php echo form_error('vendedor_complemento', '<div class="form-text text-danger">', '</div>'); ?>
                            </div> 

                        </div>

                        <div class="mb-3 row">

                            <div class="col-md-4">
                                <label>Bairro</label>
                                <input type="text" class="form-control "  placeholder="Bairro" name="vendedor_bairro" value="<?php echo $vendedor->vendedor_bairro; ?>">
                                <?php echo form_error('vendedor_bairro', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>

                            <div class="col-md-2">
                                <label>CEP</label>
                                <input type="text" class="form-control  cep"  placeholder="CEP" name="vendedor_cep" value="<?php echo $vendedor->vendedor_cep; ?>">
                                <?php echo form_error('vendedor_cep', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>  

                            <div class="col-md-5">
                                <label>Cidade</label>
                                <input type="text" class="form-control "  placeholder="Cidade" name="vendedor_cidade" value="<?php echo $vendedor->vendedor_cidade; ?>">
                                <?php echo form_error('vendedor_cidade', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>  

                            <div class="col-md-1">
                                <label>UF</label>
                                <input type="text" class="form-control  uf"  placeholder="UF" name="vendedor_estado" value="<?php echo $vendedor->vendedor_estado; ?>">
                                <?php echo form_error('vendedor_estado', '<div class="form-text text-danger">', '</div>'); ?>
                            </div> 

                        </div>

                    </fieldset>


                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small" ><i class="fas fa-tools"></i>&nbsp;Configurações</legend>

                        <div class="form-group row">

                            <div class="col-md-3">
                                <label>Vendedor ativo</label>
                                <select class="custom-select" name="vendedor_ativo">
                                    <option value="0" <?php echo ($vendedor->vendedor_ativo == 0 ? 'selected' : ''); ?>>Não</option>
                                    <option value="1" <?php echo ($vendedor->vendedor_ativo == 1 ? 'selected' : ''); ?>>Sim</option>
                                </select>                              
                            </div> 

                            <div class="col-md-3">
                                <label>Matrícula</label>
                                <input type="text" class="form-control"  placeholder="Matrícula" name="vendedor_codigo" value="<?php echo $vendedor->vendedor_codigo; ?>" readonly="">
                                <?php echo form_error('vendedor_codigo', '<div class="form-text text-danger">', '</div>'); ?>
                            </div> 


                            <div class="col-md-6">
                                <label>Observações</label>
                                <textarea class="form-control "  placeholder="Obs" name="vendedor_obs"><?php echo $vendedor->vendedor_obs; ?></textarea>
                                <?php echo form_error('vendedor_obs', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>

                        </div>

                    </fieldset>


                    <div class="mb-3 row">
                        <input type="hidden" name="vendedor_id" value="<?php echo $vendedor->vendedor_id; ?>"/>
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                </form>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


