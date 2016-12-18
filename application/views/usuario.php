<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Controle de Usuários
    </h1>
  </section>

  <section class="content">

    <div class="row">

        <?php if (!empty($sRetorno)): ?>
        <div class="alert alert-warning alert-dismissible">
            <strong><?php echo $sRetorno; ?></strong>
        </div>
        <?php endif; ?>

        <div class="col-md-6">

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Novo Usuário</h3>
            </div>

            <?php echo validation_errors("<div class=\"alert alert-danger alert-dismissible\">","</div>"); ?>
            <?php echo form_open('usuario/acao'); ?>

            <input name="iacao" value="<?php echo(!empty($aUsuarios->id) ? 2 : 1) ; ?>" type="text" hidden="hidden">
            <input name="idado" value="<?php echo(!empty($aUsuarios->id) ? $aUsuarios->id : 0) ; ?>" type="text" hidden="hidden">

              <div class="box-body">
                <div class="form-group">
                  <label>Nome</label>
                  <input name="nome" class="form-control" value="<?php echo(!empty($aUsuarios->nome) ? $aUsuarios->nome : '') ; ?>" type="text" <?php echo(!empty($aUsuarios->id) ? 'disabled="disabled"' : '') ; ?>>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input name="email" class="form-control" value="<?php echo(!empty($aUsuarios->email) ? $aUsuarios->email : '') ; ?>" type="text">
                </div>
                <div class="form-group col-xs-7">
                  <label>Senha</label>
                  <input name="senha" class="form-control" value="" type="password">
                </div>
                <div class="form-group col-xs-5">
                  <label>Tipo de Conta: <?php echo(!empty($aUsuarios->adm) ? $aUsuarios->adm : '') ; ?></label>
                  <select name="adm" class="form-control select2" style="width: 100%;">
                      <option value="2">Colaborador</option>
                      <option value="1">Administrador</option>
                   </select>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Salvar Usuário</button>
              </div>
            </form>
          </div>

        </div>

        <div class="col-md-12">
            <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Usuários Existentes</h3>
            </div>

            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Tipo de Conta</th>
                  <th style="width: 75px"></th>
                </tr>

                <?php foreach ($rsUsuarios as $sUsuario): ?>

                <tr>
                  <td><?php echo $sUsuario->nome;?></td>
                  <td><?php echo $sUsuario->email;?></td>
                  <td><?php echo $sUsuario->adm;?></td>

                  <td>
                    <a href="<?php echo site_url('usuario/deletar/'.$sUsuario->id); ?>">
                        <span class="badge bg-red">
                            <i class="fa fa-edit"></i>
                        </span>
                    </a>
                    <a href="<?php echo site_url('usuario/acao/'.$sUsuario->id); ?>">
                      <span class="badge bg-light-blue">
                          <i class="fa fa-edit"></i>
                      </span>
                    </a>
                  </td>
                </tr>

                <?php endforeach;?>

              </tbody>
             </table>
            </div>

          </div>
        </div>

    </div>

  </section>

</div>
