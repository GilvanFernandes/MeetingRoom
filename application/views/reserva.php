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

            <div class="col-md-6">

              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                  <li class="active"><a href="#tab_1-1_<?php echo $sSala->id.$sSala->sala;?>" data-toggle="tab" aria-expanded="true">Do dia(<?php echo date('d/m/Y');?>)</a></li>
                  <li class=""><a href="#tab_2-2_<?php echo $sSala->id.$sSala->sala;?>" data-toggle="tab" aria-expanded="false">P/ Amanhã</a></li>
                  <li class=""><a href="#tab_3-2_<?php echo $sSala->id.$sSala->sala;?>" data-toggle="tab" aria-expanded="false">Mês <?php echo date('m');?></a></li>
                  <li class="pull-left header"><?php echo $sSala->sala;?></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1-1_<?php echo $sSala->id.$sSala->sala;?>">

                      <table class="table table-bordered">
                        <tbody><tr>
                          <th>Horário</th>
                          <th>Motivo da Alocação</th>
                          <th>Status</th>

                          <th style="width: 75px"></th>
                        </tr>

                        <?php foreach ($rsSalas as $sSala): ?>

                        <tr>
                          <td><?php echo $sSala->sala;?></td>
                          <td><?php echo $sSala->detalhes;?></td>
                          <td>Agendado</td>
                          <td>
                            <a href="<?php echo site_url('sala/deletar/'.$sSala->id); ?>">
                                <span class="badge bg-red">
                                    <i class="fa fa-edit"></i>
                                </span>
                            </a>

                          </td>
                        </tr>

                        <?php endforeach;?>

                      </tbody>
                     </table>

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2-2_<?php echo $sSala->id.$sSala->sala;?>">
                    The European languages are members of the same family. Their separate existence is a myth.
                    For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                    in their grammar, their pronunciation and their most common words. Everyone realizes why a
                    new common language would be desirable: one could refuse to pay expensive translators. To
                    achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                    words. If several languages coalesce, the grammar of the resulting language is more simple
                    and regular than that of the individual languages.
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3-2_<?php echo $sSala->id.$sSala->sala;?>">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    It has survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                    sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                    like Aldus PageMaker including versions of Lorem Ipsum.
                  </div>

                </div>

              </div>

            </div>

            <?php endforeach;?>


        </div>

    </section>

  </div>
