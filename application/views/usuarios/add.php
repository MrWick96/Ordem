

    <?php $this->load->view('layout/sidebar'); ?>

   

      <!-- Main Content -->
      <div id="content">

       <?php $this->load->view('layout/navibar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
            
            
         <nav aria-label="breadcrumb">
           <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="<?php echo base_url('usuarios'); ?>">Usuários</a></li>
             <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
           </ol>
         </nav>

            

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a title="Voltar" href="<?php echo base_url('usuarios'); ?>" class="btn btn-success col-md-1 float-right"><i class="fas fa-chevron-circle-left"></i>&nbsp;Voltar</a>   
            </div>
            <div class="card-body">
                
                <form method="POST" name="form_add">
                    <div class="mb-3 row">
                        
                        <div class="col-md-4">
                            <label>Nome</label>
                            <input type="text" class="form-control" name="first_name" placeholder="Seu nome" value="<?php echo set_value('first_name') ?>">
                            <?php echo form_error('first_name', '<div class="form-text text-danger">','</div>'); ?>
                        </div>

                        
                        
                        <div class="col-md-4">
                            <label>Sobrenome</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Seu sobrenome" value="<?php echo set_value('last_name') ?>">
                            <?php echo form_error('last_name', '<div class="form-text text-danger">','</div>'); ?>
                        </div>   
                        
                         <div class="col-md-4">
                             <label>E-mail&nbsp;(Login)</label>
                            <input type="email" class="form-control" name="email" placeholder="Seu email  (Login)" value="<?php echo set_value('email') ?>">
                            <?php echo form_error('email', '<div class="form-text text-danger">','</div>'); ?>
                        </div>

                    </div>
                    
                    <div class="form-group row">
                        
                        <div class="col-md-4">
                             <label>Usuário</label>
                             <input type="text" class="form-control" name="username" placeholder="Seu Usuário" value="<?php echo set_value('username') ?>">
                            <?php echo form_error('username', '<div class="form-text text-danger">','</div>'); ?>
                        </div>
                        
                         <div class="col-md-4">
                             <label>Ativo</label>
                             
                             <select class="form-control" name="active">
                                 
                                 <option value="0">Não</option>
                                 <option value="1">Sim</option>
                                 
                             </select>
                            
                        </div>
                        
                        
                        
                        <div class="col-md-4">
                             <label>Perfil de acesso</label>
                             
                             <select class="form-control" name="perfil_usuario">
                                 
                                 <option value="2">Vendedor</option>
                                 <option value="1">Administrador</option>
                                 
                             </select>
                            
                        </div>
                        
                    </div>
                    
                    <div class="form-group row">
                        
                        <div class="col-md-6">
                             <label>Senha</label>
                             <input type="password" class="form-control" name="password" placeholder="Sua senha" value="">
                             <?php echo form_error('password', '<div class="form-text text-danger">','</div>'); ?>
                        </div>
                        
                        
                          <div class="col-md-6">
                             <label>Confirme</label>
                             <input type="password" class="form-control" name="confirm_password" placeholder="Confirme sua senha" value="">
                             <?php echo form_error('confirm_password', '<div class="form-text text-danger">','</div>'); ?>
                        </div>

                    </div>
                    
                    <button type="submit" class="btn btn-primary col-md-1">Salvar</button>
                  </form>
                
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      
