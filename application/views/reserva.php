  <div class="content-wrapper">
    <section class="content-header">
        <p>Olá, <?php
                    if(!$this->session->userdata('nome')){
                        echo "Visitante";
                    }else{
                        echo $this->session->userdata('nome');
                    }
                ?>.
        </p>
      <h1>
        Reserva de Sala
      </h1>
    </section>

    <section class="content">

      <?php if($this->session->userdata('logado')): ?>

      <?php if (!empty($sRetorno)): ?>
      <div class="alert alert-warning alert-dismissible">
          <strong><?php echo $sRetorno; ?></strong>
      </div>
      <?php endif; ?>

      <?php echo validation_errors("<div class=\"alert alert-danger alert-dismissible\">","</div>"); ?>
      <?php echo form_open('reserva/criar'); ?>

      <div class="box box-default">

        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Sala</label>
                <select name="idsala" class="form-control select2" style="width: 100%;">
                    <?php foreach ($rsSalas as $sSala): ?>
                        <option value="<?php echo $sSala->id;?>"><?php echo $sSala->sala;?></option>
                    <?php endforeach;?>
                 </select>
              </div>

              <div class="form-group">
                <label>Reservador por</label>
                <input class="form-control" value="<?php echo $this->session->userdata('nome'); ?>" disabled="disabled" type="text">
                <input name="idusuario" value="<?php echo $this->session->userdata('id'); ?>" hidden="hidden" type="text">
              </div>

            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label>Assunto da Reserva</label>
                  <input name="assunto" class="form-control" placeholder="Ex.: Definição de backlog"  type="text">

              </div>

              <div class="form-group  col-xs-4">
                <label>Data da Reserva</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="data" type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>

              </div>

              <div class="bootstrap-timepicker  col-xs-3">
                <div class="form-group">
                  <label>Horário da Reserva</label>

                  <div class="input-group">
                    <input name="hora" type="text" class="form-control timepicker">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>

                  </div>

                </div>

              </div>

            </div>

          </div>

          <button type="submit" class="btn btn-primary btn-block btn-flat">Reservar</button>

        </div>

      </div>

      <?php endif; ?>

        <div class="row">

            <?php foreach ($rsSalas as $sSala): ?>

            <div class="col-md-4">

              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                  <li class="active"><a href="#tab_1_1_<?php echo strtolower($sSala->id."_".str_replace(' ', '_', $sSala->sala));?>" data-toggle="tab" aria-expanded="true">Do dia(<?php echo date('d/m/Y');?>)</a></li>
                  <li class=""><a href="#tab_2_2_<?php echo strtolower($sSala->id."_".str_replace(' ', '_', $sSala->sala));?>" data-toggle="tab" aria-expanded="false">P/ Amanhã</a></li>
                  <li class=""><a href="#tab_3_3_<?php echo strtolower($sSala->id."_".str_replace(' ', '_', $sSala->sala));?>" data-toggle="tab" aria-expanded="false">Mês <?php echo date('m');?></a></li>
                  <li class="pull-left header"><?php echo $sSala->sala ;?></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1_1_<?php echo strtolower($sSala->id."_".str_replace(' ', '_', $sSala->sala));?>">

                      <table class="table table-bordered">
                        <tbody><tr>
                          <th>ID</th>
                          <th>Horário</th>
                          <th>Motivo da Alocação</th>
                          <th style="width: 75px"></th>
                        </tr>

                        <?php foreach ($rsReservasHoje as $sReservaHoje): ?>

                            <?php if($sReservaHoje->id_sala == $sSala->id): ?>

                            <tr>
                              <td>#<?php echo $sReservaHoje->id_reserva;?></td>
                              <td><?php echo $sReservaHoje->hora;?></td>
                              <td><?php echo $sReservaHoje->assunto;?></td>
                              <td>

                                <?php if($this->session->userdata('logado') && $this->session->userdata('id') == $sReservaHoje->id_usuario): ?>

                                <a href="<?php echo site_url('reserva/cancelar/'.$sReservaHoje->id_reserva); ?>">
                                    <span class="badge bg-red">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                </a>

                                <?php endif; ?>

                              </td>
                            </tr>

                            <?php endif;?>

                        <?php endforeach;?>

                      </tbody>
                     </table>

                  </div>

                  <div class="tab-pane" id="tab_2_2_<?php echo strtolower($sSala->id."_".str_replace(' ', '_', $sSala->sala));?>">
                      <table class="table table-bordered">
                        <tbody><tr>
                          <th>ID</th>
                          <th>Horário</th>
                          <th>Motivo da Alocação</th>
                          <th style="width: 75px"></th>
                        </tr>

                        <?php foreach ($rsReservasAmanha as $sReservaAmanha): ?>

                            <?php if($sReservaAmanha->id_sala == $sSala->id): ?>

                            <tr>
                              <td>#<?php echo $sReservaAmanha->id_reserva;?></td>
                              <td><?php echo $sReservaAmanha->hora;?></td>
                              <td><?php echo $sReservaAmanha->assunto;?></td>
                              <td>
                                  <?php if($this->session->userdata('logado') && $this->session->userdata('id') == $sReservaAmanha->id_usuario): ?>

                                  <a href="<?php echo site_url('reserva/cancelar/'.$sReservaAmanha->id_reserva); ?>">
                                      <span class="badge bg-red">
                                          <i class="fa fa-edit"></i>
                                      </span>
                                  </a>

                                  <?php endif; ?>
                              </td>
                            </tr>

                            <?php endif;?>

                        <?php endforeach;?>

                      </tbody>
                     </table>
                  </div>

                  <div class="tab-pane" id="tab_3_3_<?php echo strtolower($sSala->id."_".str_replace(' ', '_', $sSala->sala));?>">

                      <table class="table table-bordered">
                        <tbody><tr>
                          <th>ID</th>
                          <th>Data</th>
                          <th>Horário</th>
                          <th>Motivo da Alocação</th>
                          <th style="width: 75px"></th>
                        </tr>

                        <?php foreach ($rsReservasMes as $sReservaMes): ?>

                            <?php if($sReservaMes->id_sala == $sSala->id): ?>

                            <tr>
                              <td>#<?php echo $sReservaMes->id_reserva;?></td>
                              <td><?php echo $sReservaMes->data;?></td>
                              <td><?php echo $sReservaMes->hora;?></td>
                              <td><?php echo $sReservaMes->assunto;?></td>
                              <td>
                                  <?php if($this->session->userdata('logado') && $this->session->userdata('id') == $sReservaMes->id_usuario): ?>

                                  <a href="<?php echo site_url('reserva/cancelar/'.$sReservaMes->id_reserva); ?>">
                                      <span class="badge bg-red">
                                          <i class="fa fa-edit"></i>
                                      </span>
                                  </a>

                                  <?php endif; ?>
                                  
                              </td>
                            </tr>

                            <?php endif;?>

                        <?php endforeach;?>

                      </tbody>
                     </table>

                  </div>

                </div>

              </div>

            </div>

            <?php endforeach;?>

        </div>

    </section>

  </div>
