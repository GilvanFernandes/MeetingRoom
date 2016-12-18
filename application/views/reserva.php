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

      <div class="box box-default">

        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Sala</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                  <option disabled="disabled">California (disabled)</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>

              <div class="form-group">
                <label>Reservador por</label>
                <input class="form-control" id="exampleInputEmail1" disabled="disabled" type="text">
              </div>

            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label>Assunto da Reserva</label>
                  <input class="form-control" placeholder="Ex.: Definição de backlog"  type="text">

              </div>

              <div class="form-group  col-xs-4">
                <label>Data da Reserva</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>

              </div>

              <div class="bootstrap-timepicker  col-xs-3">
                <div class="form-group">
                  <label>Horário da Reserva</label>

                  <div class="input-group">
                    <input type="text" class="form-control timepicker">

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

    </section>

  </div>
