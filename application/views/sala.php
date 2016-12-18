<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Controle de Sala
    </h1>
  </section>

  <section class="content">

    <div class="row">

        <div class="col-md-6">

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Nova Sala</h3>
            </div>

            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label>Nome da Sala</label>
                  <input class="form-control" type="text">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Breve Descrição</label>
                  <input class="form-control" type="text">
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
                  <th style="width: 20px">#</th>
                  <th>Sala</th>
                  <th>Detalhes</th>
                  <th style="width: 75px"></th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>Update software</td>
                  <td>


                  </td>
                  <td>
                    <a href="#">
                        <span class="badge bg-red">
                            <i class="fa fa-edit"></i>
                        </span>
                    </a>
                    <a href="#">
                      <span class="badge bg-light-blue">
                          <i class="fa fa-edit"></i>
                      </span>
                    </a>
                  </td>
                </tr>


              </tbody>
             </table>
            </div>

          </div>
        </div>

    </div>

  </section>

</div>
