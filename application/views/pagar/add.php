

<?php $this->load->view('layout/sidebar'); ?>



<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navibar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('pagar'); ?>">Contas a pagar</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
            </ol>
        </nav>



        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a title="Voltar" href="<?php echo base_url($this->router->fetch_class()); ?>" class="btn btn-success col-md-1 float-right"><i class="fas fa-chevron-circle-left"></i>&nbsp;Voltar</a>   
            </div>
            <div class="card-body">

                <form class="user" method="POST" name="form_add">

                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small" ><i class="fas fa-cash-register"></i>&nbsp;Dados da conta</legend>                       

                        <div class="mb-4 row">

                            <div class="col-md-5">
                                <label>Fornecedor</label>                              
                                <select class="custom-select contas_pagar" name="conta_pagar_fornecedor_id">
                                    <option value="" selected=""></option>
                                    <?php foreach ($fornecedores as $fornecedor): ?>
                                        <option value="<?php echo $fornecedor->fornecedor_id ?>"><?php echo $fornecedor->fornecedor_nome_fantasia ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('conta_pagar_fornecedor_id', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>

                            <div class="col-md-3">
                                <label>Data de vencimento</label>
                                <input type="date" class="form-control form-control-user-date" name="conta_pagar_data_vencimento" value="<?php echo set_value('conta_pagar_data_vencimento'); ?>">
                                <?php echo form_error('conta_pagar_data_vencimento', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>

                            <div class="col-md-2">
                                <label>Valor da conta</label>
                                <input type="text" class="form-control money2" name="conta_pagar_valor" value="<?php echo set_value('conta_pagar_valor'); ?>">
                                <?php echo form_error('conta_pagar_valor', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>

                            <div class="col-md-2">
                                <label>Situação</label>                              
                                <select class="custom-select" name="conta_pagar_status">
                                    <option value="1">Paga</option>
                                    <option value="0">Pendente</option>
                                </select>
                            </div>

                        </div>

                        <div class="mb-4 row">

                            <div class="col-md-12">
                                <label>Observações da conta</label>
                                <textarea class="form-control" name="conta_pagar_obs" placeholder="Observações"><?php echo set_value('conta_pagar_obs'); ?></textarea>
                                <?php echo form_error('conta_pagar_obs', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>     

                        </div>

                    </fieldset>
                    
                    <div class="mb-3 row"></div>

                    <button type="submit" class="btn btn-primary col-md-1" >Salvar</button>

                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


