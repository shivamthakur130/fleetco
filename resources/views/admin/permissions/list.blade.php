@extends('layouts.master')

    @section('title' , 'Admin|Branches')

@section('main-content')

  
    <!-- PNotify -->
    <link href="{{ asset('vendors/pnotify/dist/pnotify.css')}}" rel="stylesheet">
    <link href="{{ asset('vendors/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
    <link href="{{ asset('vendors/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                @if(session()->has('message'))    
                <div class="alert alert-success alert-dismissible ml-3 mr-3">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <!-- <h5><i class="icon fas fa-check"></i> Alert!</h5> -->
                    {{ session()->get('message') }}
                </div>
                @endif

                @if(session()->has('error'))    
                <div class="alert alert-danger alert-dismissible ml-3 mr-3">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <!-- <h5><i class="icon fas fa-check"></i> Alert!</h5> -->
                  {{ session()->get('error') }}
                </div>
                @endif
                  <div class="x_title">
                  <!-- <a href="" class="btn btn-default btn-sm ml-3 float-right" >Cancel</a> -->
                  <!-- <a href="javascript:void(0);" class="btn btn-primary btn-sm ml-3 float-right" onClick="refreshPage()">Save</a> -->
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2><i class="fa fa-bars"></i> Permissions </h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                              </div>
                          </li>
                          <li><a class="close-link"><i class="fa fa-close"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                        @foreach($roles as $role)
                          <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" data-href="#{{$role->name}}" role="tab" aria-controls="home" aria-selected="true">{{$role->label}}</a>
                          </li>
                          <!-- <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                          </li> -->
                          @endforeach
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div id="admin">
                            <!-- start accordion -->
                              <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel">
                                  <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h4 class="panel-title">Master Data (Admin)</h4>
                                  </a>
                                  <div id="collapseOne" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                      <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Sub Modules</th>
                                            <th>Add</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>List/View</th>
                                            <th>Print/Export</th>
                                            <th>Import</th>

                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($modules as $module)
                                          @if($module->role_name == 'admin')
                                          <tr>
                                            <th scope="row">{{$module->sub_module}}</th>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->Add}}" data-type="Add" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}"  @if($module->Add == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->edit}}" data-type="edit" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->edit == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->delete}}" data-type="delete" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->delete == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td><td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->list}}" data-type="list" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->list == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->print}}" data-type="print" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->print == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->import}}" data-type="import" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->import == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                          </tr>
                                          @endif
                                         @endforeach
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                                <!-- <div class="panel">
                                  <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <h4 class="panel-title">Collapsible Group Items #2</h4>
                                  </a>
                                  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                      <p><strong>Collapsible Item 2 data</strong>
                                      </p>
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                    </div>
                                  </div>
                                </div>
                                <div class="panel">
                                  <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <h4 class="panel-title">Collapsible Group Items #3</h4>
                                  </a>
                                  <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                      <p><strong>Collapsible Item 3 data</strong>
                                      </p>
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor
                                    </div>
                                  </div>
                                </div> -->
                              </div>
                            <!-- end of accordion -->
                          </div>
                          <div id="manager" style="display:none">
                            <!-- start accordion -->
                              <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel">
                                  <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h4 class="panel-title">Master Data (Manager)</h4>
                                  </a>
                                  <div id="collapseOne" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                      <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Sub Modules</th>
                                            <th>Add</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>List/View</th>
                                            <th>Print/Export</th>
                                            <th>Import</th>

                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($modules as $module)
                                          @if($module->role_name == 'manager')
                                          <tr>
                                            <th scope="row">{{$module->sub_module}}</th>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->Add}}" data-type="Add" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}"  @if($module->Add == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->edit}}" data-type="edit" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->edit == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->delete}}" data-type="delete" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->delete == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td><td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->list}}" data-type="list" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->list == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->print}}" data-type="print" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->print == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->import}}" data-type="import" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->import == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                          </tr>
                                          @endif
                                         @endforeach
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                                <!-- <div class="panel">
                                  <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <h4 class="panel-title">Collapsible Group Items #2</h4>
                                  </a>
                                  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                      <p><strong>Collapsible Item 2 data</strong>
                                      </p>
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                    </div>
                                  </div>
                                </div>
                                <div class="panel">
                                  <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <h4 class="panel-title">Collapsible Group Items #3</h4>
                                  </a>
                                  <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                      <p><strong>Collapsible Item 3 data</strong>
                                      </p>
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor
                                    </div>
                                  </div>
                                </div> -->
                              </div>
                            <!-- end of accordion -->
                          </div>
                          <div id="user" style="display:none">
                            <!-- start accordion -->
                              <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel">
                                  <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h4 class="panel-title">Master Data (User)</h4>
                                  </a>
                                  <div id="collapseOne" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                      <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Sub Modules</th>
                                            <th>Add</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>List/View</th>
                                            <th>Print/Export</th>
                                            <th>Import</th>

                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($modules as $module)
                                          @if($module->role_name == 'user')
                                          <tr>
                                            <th scope="row">{{$module->sub_module}}</th>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->Add}}" data-type="Add" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}"  @if($module->Add == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->edit}}" data-type="edit" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->edit == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->delete}}" data-type="delete" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->delete == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td><td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->list}}" data-type="list" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->list == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->print}}" data-type="print" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->print == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->import}}" data-type="import" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->import == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                          </tr>
                                          @endif
                                         @endforeach
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                                <div class="panel">
                                  <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <h4 class="panel-title">Collapsible Group Items #2</h4>
                                  </a>
                                  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                      <p><strong>Collapsible Item 2 data</strong>
                                      </p>
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                    </div>
                                  </div>
                                </div>
                                <div class="panel">
                                  <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <h4 class="panel-title">Collapsible Group Items #3</h4>
                                  </a>
                                  <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                      <p><strong>Collapsible Item 3 data</strong>
                                      </p>
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <!-- end of accordion -->
                          </div>
                          <div id="default" style="display:none">
                            <!-- start accordion -->
                              <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel">
                                  <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h4 class="panel-title">Master Data (Default)</h4>
                                  </a>
                                  <div id="collapseOne" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                      <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Sub Modules</th>
                                            <th>Add</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>List/View</th>
                                            <th>Print/Export</th>
                                            <th>Import</th>

                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($modules as $module)
                                          @if($module->role_name == 'default')
                                          <tr>
                                            <th scope="row">{{$module->sub_module}}</th>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->Add}}" data-type="Add" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}"  @if($module->Add == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->edit}}" data-type="edit" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->edit == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->delete}}" data-type="delete" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->delete == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td><td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->list}}" data-type="list" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->list == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->print}}" data-type="print" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->print == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->import}}" data-type="import" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->import == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                          </tr>
                                          @endif
                                         @endforeach
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                                <!-- <div class="panel">
                                  <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <h4 class="panel-title">Collapsible Group Items #2</h4>
                                  </a>
                                  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                      <p><strong>Collapsible Item 2 data</strong>
                                      </p>
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                    </div>
                                  </div>
                                </div>
                                <div class="panel">
                                  <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <h4 class="panel-title">Collapsible Group Items #3</h4>
                                  </a>
                                  <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                      <p><strong>Collapsible Item 3 data</strong>
                                      </p>
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor
                                    </div>
                                  </div>
                                </div> -->
                              </div>
                            <!-- end of accordion -->
                          </div>
                          <div id="guest" style="display:none">
                            <!-- start accordion -->
                              <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel">
                                  <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h4 class="panel-title">Master Data (Guest)</h4>
                                  </a>
                                  <div id="collapseOne" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                      <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Sub Modules</th>
                                            <th>Add</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>List/View</th>
                                            <th>Print/Export</th>
                                            <th>Import</th>

                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($modules as $module)
                                          @if($module->role_name == 'guest')
                                          <tr>
                                            <th scope="row">{{$module->sub_module}}</th>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->Add}}" data-type="Add" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}"  @if($module->Add == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->edit}}" data-type="edit" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->edit == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->delete}}" data-type="delete" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->delete == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td><td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->list}}" data-type="list" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->list == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->print}}" data-type="print" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->print == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->import}}" data-type="import" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->import == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                          </tr>
                                          @endif
                                         @endforeach
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                                <!-- <div class="panel">
                                  <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <h4 class="panel-title">Collapsible Group Items #2</h4>
                                  </a>
                                  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                      <p><strong>Collapsible Item 2 data</strong>
                                      </p>
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                    </div>
                                  </div>
                                </div>
                                <div class="panel">
                                  <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <h4 class="panel-title">Collapsible Group Items #3</h4>
                                  </a>
                                  <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                      <p><strong>Collapsible Item 3 data</strong>
                                      </p>
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor
                                    </div>
                                  </div>
                                </div> -->
                              </div>
                            <!-- end of accordion -->
                          </div>
                          <div id="viewer" style="display:none">
                            <!-- start accordion -->
                              <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel">
                                  <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h4 class="panel-title">Master Data (Viewer)</h4>
                                  </a>
                                  <div id="collapseOne" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                      <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Sub Modules</th>
                                            <th>Add</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>List/View</th>
                                            <th>Print/Export</th>
                                            <th>Import</th>

                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($modules as $module)
                                          @if($module->role_name == 'viewer')
                                          <tr>
                                            <th scope="row">{{$module->sub_module}}</th>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->Add}}" data-type="Add" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}"  @if($module->Add == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->edit}}" data-type="edit" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->edit == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->delete}}" data-type="delete" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->delete == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td><td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->list}}" data-type="list" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->list == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->print}}" data-type="print" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->print == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" class="text-center" name="config" value="{{$module->import}}" data-type="import" data-role-id="{{$module->role_id}}" data-name="{{$module->module}}" data-sname="{{$module->sub_module}}" @if($module->import == 'y') checked @endif>
                                                </label>
                                              </div>
                                            </td>
                                          </tr>
                                          @endif
                                         @endforeach
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                                <!-- <div class="panel">
                                  <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <h4 class="panel-title">Collapsible Group Items #2</h4>
                                  </a>
                                  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                      <p><strong>Collapsible Item 2 data</strong>
                                      </p>
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                    </div>
                                  </div>
                                </div>
                                <div class="panel">
                                  <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <h4 class="panel-title">Collapsible Group Items #3</h4>
                                  </a>
                                  <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                      <p><strong>Collapsible Item 3 data</strong>
                                      </p>
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor
                                    </div>
                                  </div>
                                </div> -->
                              </div>
                            <!-- end of accordion -->
                          </div>
                        </div>
                    </div>
                  </div>

                </div>
              </div>

            </div>
        </div>

        </div>
        <!-- /page content --> 
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset('vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{ asset('vendors/nprogress/nprogress.js')}}"></script>
    <!-- iCheck -->
    <script src="{{ asset('vendors/iCheck/icheck.min.js')}}"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('assets/js/custom.min.js')}}"></script>

    <!-- Datatables -->
    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{ asset('vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{ asset('vendors/pnotify/dist/pnotify.js')}}"></script>
    <script src="{{ asset('vendors/pnotify/dist/pnotify.buttons.js')}}"></script>
    <script src="{{ asset('vendors/pnotify/dist/pnotify.nonblock.js')}}"></script>


    <script>
     
      function refreshPage(){
          window.location.reload('/admin-area/permission');
      } 
      $(document).ready(function () {
        $('#admin').show();
          $(".nav-link").click(function () {
              var tab = $(this).data("href");
              // alert(tab);
              if(tab =='#admin'){
                $('#admin').show();
                $('#user').hide();
                $('#manager').hide();
                $('#default').hide();
                $('#guest').hide();
                $('#viewer').hide();
              }else if(tab == '#manager'){
                $('#manager').show();
                $('#user').hide();
                $('#admin').hide();
                $('#default').hide();
                $('#guest').hide();
                $('#viewer').hide();
              }else if(tab == '#user'){
                $('#user').show();
                $('#manager').hide();
                $('#admin').hide();
                $('#default').hide();
                $('#guest').hide();
                $('#viewer').hide();
              }else if(tab == '#default'){
                $('#user').hide();
                $('#manager').hide();
                $('#admin').hide();
                $('#default').show();
                $('#guest').hide();
                $('#viewer').hide();
              }else if(tab == '#guest'){
                $('#user').hide();
                $('#manager').hide();
                $('#admin').hide();
                $('#default').hide();
                $('#guest').show();
                $('#viewer').hide();
              }else if(tab == '#viewer'){
                $('#user').hide();
                $('#manager').hide();
                $('#admin').hide();
                $('#default').hide();
                $('#guest').hide();
                $('#viewer').show();
              }
              
          });

          $('.text-center').on('click', function(){
            var config = $(this).val();
            var roleId = $(this).attr('data-role-id');
            var moduleName = $(this).attr('data-name');
            var submodule = $(this).attr('data-sname');
            var fieldType = $(this).attr('data-type');
            //alert(config+roleId+modulee+submodule+fieldType);

            $.ajax({
              url : "{{URL('admin-area/permission/change')}}",
              type: "post",
              cache:false,
              data: {_token:'{{ csrf_token() }}', config: config, roleId:roleId,moduleName:moduleName, submodule:submodule,fieldType:fieldType},
              success: function(dataResult){
                  dataResult = JSON.parse(dataResult);
                  new PNotify({
                        title: 'Done',
                        text: 'Changes saved successfully!',
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                  // if(dataResult.statusCode)
                  // {   
                  //     Toast.fire({
                  //     icon: 'success',
                  //     title: 'Saved Successfully.'
                  //     })
                  // }
                  // else{
                  //     alert("Internal Server Error");
                  // } 
                    
                },
              
                  
            });
          });
      });

    </script>

@endsection