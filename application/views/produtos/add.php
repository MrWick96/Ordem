

<?php $this->load->view('layout/sidebar'); ?>



<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navibar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('produtos'); ?>">Produtos</a></li>
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

                        <legend class="font-small" ><i class="fas fa-cash-register"></i>&nbsp;Dados do produto</legend>

                        <div class="mb-4 row">

                            <div class="col-md-2">
                                <label>Código interno do produto</label>
                                <input type="text" class="form-control" name="produto_codigo" value="<?php echo $produto_codigo ?>"readonly="">
                            </div>



                            <div class="col-md-10">
                                <label>Descrição do produto</label>
                                <input type="text" class="form-control" name="produto_descricao" placeholder="Descrição do produto" value="<?php echo set_value('produto_descricao'); ?>">
                                <?php echo form_error('produto_descricao', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>

                        </div>

                        <div class="mb-4 row">

                            <div class="col-md-3">
                                <label>Marca</label>
                                <select class="custom-select" name="produto_marca_id">
                                    <?php foreach ($marcas as $marca): ?>
                                        <option value="<?php echo $marca->marca_id ?>"><?php echo $marca->marca_nome; ?></option>
                                    <?php endforeach; ?>
                                </select> 
                            </div>

                            <div class="col-md-3">
                                <label>Categoria</label>
                                <select class="custom-select" name="produto_categoria_id">
                                    <?php foreach ($categorias as $categoria): ?>
                                        <option value="<?php echo $categoria->categoria_id ?>"><?php echo $categoria->categoria_nome; ?></option>
                                    <?php endforeach; ?>
                                </select> 
                            </div>

                            <div class="col-md-3">
                                <label>Fornecedor</label>
                                <select class="custom-select" name="produto_fornecedor_id">
                                    <?php foreach ($fornecedores as $fornecedor): ?>
                                        <option value="<?php echo $fornecedor->fornecedor_id ?>"><?php echo $fornecedor->fornecedor_nome_fantasia; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label>Produto unidade</label>
                                <input type="text" class="form-control" name="produto_unidade" placeholder="Produto unidade" value="<?php echo set_value('produto_unidade'); ?>">
                                <?php echo form_error('produto_unidade', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>

                            <!--                            <div class="col-md-2">
                                                            <label>Código de barras</label>
                                                            <input type="text" class="form-control" name="produto_codigo_barras" placeholder="Código de barras" value="<?php echo $produto->produto_codigo_barras; ?>">
                            <?php echo form_error('produto_codigo_barras', '<div class="form-text text-danger">', '</div>'); ?>
                                                        </div>-->


                        </div>

                    </fieldset>

                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small" ><i class="fas fa-funnel-dollar"></i>&nbsp;Precificação e estoque</legend>

                        <div class="mb-4 row">

                            <div class="col-md-3">
                                <label>Preço de custo</label>
                                <input type="text" class="form-control money" name="produto_preco_custo" placeholder="Preço de custo" value="<?php echo set_value('produto_preco_custo'); ?>">
                                <?php echo form_error('produto_preco_custo', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>

                            <div class="col-md-3">
                                <label>Preço de venda</label>
                                <input type="text" class="form-control money" name="produto_preco_venda" placeholder="Preço de venda" value="<?php echo set_value('produto_preco_venda'); ?>">
                                <?php echo form_error('produto_preco_venda', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>

                            <div class="col-md-3">
                                <label>Estoque minimo</label>
                                <input type="number" class="form-control" name="produto_estoque_minimo" placeholder="Estoque mínimo" value="<?php echo set_value('produto_estoque_minimo'); ?>">
                                <?php echo form_error('produto_estoque_minimo', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>

                            <div class="col-md-3">
                                <label>Quantidade em estoque</label>
                                <input type="number" class="form-control" name="produto_qtde_estoque" placeholder="Quantidade em estoque" value="<?php echo set_value('produto_qtde_estoque'); ?>">
                                <?php echo form_error('produto_qtde_estoque', '<div class="form-text text-danger">', '</div>'); ?>
                            </div>

                        </div>

                        <div class="mb-4 row">

                            <div class="col-md-3">
                                <label>Produto ativo</label>
                                <select class="custom-select" name="produto_ativo">
                                    <option value="0">Não</option>
                                    <option value="1">sim</option>
                                </select> 
                            </div>

                            <div class="col-md-8">
                                <label>Observações</label>
                                <textarea class="form-control "  placeholder="Obs" name="produto_obs"><?php echo set_value('produto_obs'); ?></textarea>
                                <?php echo form_error('produto_obs', '<div class="form-text text-danger">', '</div>'); ?>
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


