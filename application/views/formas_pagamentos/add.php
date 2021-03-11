

<?php $this->load->view('layout/sidebar'); ?>



<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navibar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('modulo'); ?>">Formas de pagamento</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
            </ol>
        </nav>



        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a title="Voltar" href="<?php echo base_url('modulo'); ?>" class="btn btn-success col-md-1 float-right"><i class="fas fa-chevron-circle-left"></i>&nbsp;Voltar</a>   
            </div>
            <div class="card-body">

                <form class="user" method="POST" name="form_add">

                    

                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small" ><i class="fas fa-dollar-sign "></i>&nbsp;Dados da forma de pagamento</legend>

                        <div class="mb-4 row">

                            <div class="col-md-6">
                                <label>Nome da forma de pagamento</label>
                                <input type="text" class="form-control" name="forma_pagamento_nome" placeholder="Nome da forma de pagamento" value="<?php echo set_value('forma_pagamento_nome') ?>">
                                <?php echo form_error('forma_pagamento_nome', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>


                            <div class="col-md-3">
                                <label>Forma de pagamento ativa</label>
                                <select class="custom-select" name="forma_pagamento_ativa">
                                    <option value="0">Não</option>
                                    <option value="1">Sim</option>
                                </select>                              
                            </div> 

                            <div class="col-md-3">
                                <label>Aceita parcelamento</label>
                                <select class="custom-select" name="forma_pagamento_aceita_parc">
                                    <option value="0">Não</option>
                                    <option value="1">Sim</option>
                                </select>                              
                            </div> 

                        </div>

                    </fieldset>
                    
                    <div class="mb-3 row"></div>
                    
                    <button type="submit" class="btn btn-primary col-md-1">Salvar</button>
                </form>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


