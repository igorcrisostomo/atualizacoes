<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$ci = &get_instance();
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Licitações
    <small>it all starts here</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Examples</a></li>
    <li class="active">Blank page</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">
      <!-- Custom Tabs -->
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="false">Modalidade</a></li>
          <li><a href="#tab_2" data-toggle="tab">Integrantes</a></li>
          <li class="active"><a href="#tab_3" data-toggle="tab" aria-expanded="true">DOD</a></li>
          <li><a href="#tab_4" data-toggle="tab">Análise de Riscos</a></li>
          <li><a href="#tab_5" data-toggle="tab">Termo de Referência</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              Dropdown <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
              <li role="presentation" class="divider"></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
            </ul>
          </li>
          <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane" id="tab_1">
           <!-- /.box-header -->
           <div class="box-body">
            <form role="form">

              <!-- radio -->
              <div class="form-group">
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                    Adesão a Ata
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                    Dispensa de Licitação
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                    Pregão Eletrônico
                  </label>
                </div>
              </div>



            </form>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
          <div class="row">
            <div class="col-md-12">
              <form role="form">
                <div class="box-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">
                      <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#modal-integrante"><i class="fa fa-plus"></i></button>
                      Integrante Administrativo
                    </label>
                  </div>
                  <div class="row">
                    <dl class="dl-horizontal">
                        <dt>Nome</dt>
                        <dd>Igor Oliveira Crisóstomo</dd>
                        <dt>Cargo</dt>
                        <dd>Técnico em Tecnologia da Informação</dd>
                        <dt>SIAPE</dt>
                        <dd>1969783</dd>
                        <dt>E-mail</dt>
                        <dd>igor.oliveira@ufvjm.edu.br</dd>
                        <dt>Telefone</dt>
                        <dd></dd>
                        <dt>Área</dt>
                        <dd>Diretoria de Logística</dd>
                      </dl>
                  </div>

                  <div class="modal fade" id="modal-integrante">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Adicionar Integrante</h4>
                        </div>
                        <div class="modal-body">

                          <div class="form-horizontal">

                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>

                              <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Cargo</label>

                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">SIAPE</label>

                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">E-mail</label>

                              <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Telefone</label>

                              <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Área</label>

                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                          <button type="button" class="btn btn-primary">Adicionar</button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->

                  <div class="form-group">
                    <label for="exampleInputEmail1">
                      <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#modal-integrante"><i class="fa fa-plus"></i></button>
                      Integrante Técnico
                    </label>
                    <div class="row">
                      <dl class="dl-horizontal">
                        <dt>Nome</dt>
                        <dd>Igor Oliveira Crisóstomo</dd>
                        <dt>Cargo</dt>
                        <dd>Técnico em Tecnologia da Informação</dd>
                        <dt>SIAPE</dt>
                        <dd>1969783</dd>
                        <dt>E-mail</dt>
                        <dd>igor.oliveira@ufvjm.edu.br</dd>
                        <dt>Telefone</dt>
                        <dd></dd>
                        <dt>Área</dt>
                        <dd>Diretoria de Logística</dd>
                      </dl>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">
                      <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#modal-integrante"><i class="fa fa-plus"></i></button>
                      Integrante(s) Requisitante(s)
                    </label>

                    <div class="row">
                      <dl class="dl-horizontal">
                        <dt>Nome</dt>
                        <dd>Igor Oliveira Crisóstomo</dd>
                        <dt>Cargo</dt>
                        <dd>Técnico em Tecnologia da Informação</dd>
                        <dt>SIAPE</dt>
                        <dd>1969783</dd>
                        <dt>E-mail</dt>
                        <dd>igor.oliveira@ufvjm.edu.br</dd>
                        <dt>Telefone</dt>
                        <dd></dd>
                        <dt>Área</dt>
                        <dd>Diretoria de Logística</dd>
                      </dl>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane active" id="tab_3">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Identificação da Área Requisitante</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Área Requisitante</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Responsável pela Demanda</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">SIAPE</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">E-mail</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Telefone</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Fonte de Recursos</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Área Requisitante</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Sign in</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="tab_4">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry.
          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
          when an unknown printer took a galley of type and scrambled it to make a type specimen book.
          It has survived not only five centuries, but also the leap into electronic typesetting,
          remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
          sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
          like Aldus PageMaker including versions of Lorem Ipsum.
        </div>

        <div class="tab-pane" id="tab_5">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry.
          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
          when an unknown printer took a galley of type and scrambled it to make a type specimen book.
          It has survived not only five centuries, but also the leap into electronic typesetting,
          remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
          sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
          like Aldus PageMaker including versions of Lorem Ipsum.
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
  </div>
</div>
</section>