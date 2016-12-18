<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Controle de Sala
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
              <h3 class="box-title">Nova Sala</h3>
            </div>

            <?php echo validation_errors("<div class=\"alert alert-danger alert-dismissible\">","</div>"); ?>
            <?php echo form_open('sala/acao'); ?>

            <input name="iacao" value="<?php echo(!empty($aSalas->id) ? 2 : 1) ; ?>" type="text" hidden="hidden">
            <input name="idado" value="<?php echo(!empty($aSalas->id) ? $aSalas->id : 0) ; ?>" type="text" hidden="hidden">

              <div class="box-body">
                <div class="form-group">
                  <label>Nome da Sala</label>
                  <input name="sala" class="form-control" value="<?php echo(!empty($aSalas->sala) ? $aSalas->sala : '') ; ?>" type="text">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Breve Descrição</label>
                  <input name="detalhes" class="form-control" value="<?php echo(!empty($aSalas->detalhes) ? $aSalas->detalhes : '') ; ?>" type="text">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Salvar Sala</button>
              </div>
            </form>
          </div>

        </div>

        <div class="col-md-6">
            <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Salas Existentes</h3>
            </div>

            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th>Sala</th>
                  <th>Detalhes</th>
                  <th style="width: 75px"></th>
                </tr>

                <?php foreach ($rsSalas as $sSala): ?>

                <tr>
                  <td><?php echo $sSala->sala;?></td>
                  <td><?php echo $sSala->detalhes;?></td>
                  <td>
                    <a href="<?php echo site_url('sala/deletar/'.$sSala->id); ?>">
                        <span class="badge bg-red">
                            <i class="fa fa-edit"></i>
                        </span>
                    </a>
                    <a href="<?php echo site_url('sala/acao/'.$sSala->id); ?>">
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
