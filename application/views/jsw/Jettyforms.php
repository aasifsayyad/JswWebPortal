<!DOCTYPE html>
<html lang="en">
<?php include 'includes/header.php';?> 
    
    <body class="">
        <div class="wrapper ">
      <!-- Sidebar -->
      <?php include 'includes/sidebar.php';?>       

    <!-- End Sidebar -->  

<div class="main-panel">
    <!-- Navbar -->
      <?php include 'includes/navbar.php';?>       

    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12"> 
                            <div class="form-div card">
                                <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                    <form action="<?php echo base_url();?>mhsPerformance/searchMhs" method="POST" enctype="multipart/form-data">
                                        <table class="table form">                                                
                                            <thead class="">

                                                <tr>
                                                     <th> Month :<span class="required">*</span></th>
                                                    <th>
                                                        <select id="month" name="month" placeholder="month" required="" class="clsmon form-control">
                                                            <option value="">---Select Month---</option>
                                                             <?php $sr=1; foreach($month_info as $mon){?>                                       
                                                            <option data-id="<?php echo trim($mon['MonID']);?>" value="<?php echo trim($mon['MonName']);?>"><?php echo trim($mon['MonthFullName']);?></option>                                      
                                                             <?php $sr++;}?>  
                                                        </select>
                                                    </th>

                                                    <th> Year :<span class="required">*</span></th>
                                                    <th>
                                                        <select id="year" name="year" placeholder="year" required="" class="form-control">
                                                            <option value="">---Select Year---</option>
                                                            <option value="<?php echo date('Y')-1;?>"><?php echo date('Y')-1;?></option>
                                                            <option value="<?php echo date('Y');?>"><?php echo date('Y');?></option>
                                                            <option value="<?php echo date('Y')+1;?>"><?php echo date('Y')+1;?></option>
                                                        </select>
                                                    </th>


                                                    <th colspan="4" style="text-align:center">
                                                        <button type="submit" name="save" data-id="hello" id="saveEnvironment" class="btn btn-success" value="save"> 
                                                            <i class="material-icons">search</i> Search</button>
                                                         <button type="reset" name="Reset" class="btn btn-info" value="reset"><i class="material-icons">replay</i> Reset</button>
                                                    </th>
                                                </tr>

                                            </thead>

                                        </table>
                                    </form>
                                     </div>
                                <div class="col-md-2">
                                    <div class="addbtn">
                                         <button data-toggle="modal" onclick="showAjaxModal('<?php echo base_url();?>Home/popup/jsw/modelName');" class="btn btn-primary" style="float: right" > <i class="material-icons">add_circle_outline</i> Add Jetty Data</button>
                                    </div>
                                </div>
                            </div>
                       
                        <div class="bootstrap-data-table-panel card">
                            <div class="table-responsive">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-hover">   
                                    <thead>
                                      <tr>
                                          <th>SR</th>
                                        <th>Date</th>
                                        <th>At Jetty <br>Under Discharge</th>
                                        <th>At Jetty <br>Waiting for Discharge</th>
                                        <th>At R-19 Waiting (Loaded)</th>
                                        <th>At Gulf - Waiting (Loaded)</th>
                                        <th>In transit from <br>MV/GULL to Jetty(Loaded)</th>
                                        <th>Under <br>Loading at MV</th>
                                        <th>Waiting for Loading</th>
                                        <th>Waiting at Jetty</th>
                                        <th>Empty at Gull R-19</th>
                                        <th>In Transit - <br>from Jetty to MV</th>
                                        <th>Breakdown/off hired</th>
                                      </tr>
                                    </thead>
                                   
                                    <tbody>
                                      <?php  if(!empty($JettyForm_data)){  $sr=1; foreach($JettyForm_data as $jetty){?>
                                        <tr>
                                        <td><?php echo $sr;?></td>   
                                        <td><?php echo $jetty['trans_date'];?></td>
                                        <td><?php echo $jetty['At_Jetty_under_discharge'];?></td>
                                        <td><?php echo $jetty['At_Jetty_waiting_for_discharge'];?></td>
                                        <td><?php echo $jetty['At_R_19_waiting_loaded'];?></td>
                                        <td><?php echo $jetty['At_gulf_waiting_loaded'];?></td>
                                        <td><?php echo $jetty['In_transit_from_MV_GULL_toJetty_Loaded'];?></td>
                                        <td><?php echo $jetty['Under_loading_at_MV'];?></td>
                                        <td><?php echo $jetty['Waiting_for_Loading'];?></td>
                                        <td><?php echo $jetty['Waiting_at_jetty'];?></td>
                                        <td><?php echo $jetty['Empty_at_gull_R_19'];?></td>
                                        <td><?php echo $jetty['In_transit_from_jetty_to_MV'];?></td>
                                        <td><?php echo $jetty['Breakdown_offHired'];?></td>
                                      </tr>
                                      <?php $sr++; } }?>                                     
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                   
                </div>
                <!-- end col-md-12 -->
            </div>
            <!-- end row -->
             <div class="row">
            <div class="col-md-12 text-center">
              <div class="card-header">
                <h4 class="card-title">Modal</h4>
              </div>
              <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#myModal">
                Classic modal
              </button>
              <button class="btn btn-info btn-round" data-toggle="modal" data-target="#noticeModal">
                Notice modal
              </button>
              <button class="btn btn-rose btn-round" data-toggle="modal" data-target="#myModal10">
                Small alert modal
              </button>
              <!-- Classic Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Modal title</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">clear</i>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.
                      </p>
                      <div class="form-group bmd-form-group is-filled">
                        <label class="label-control">Datetime Picker</label>
                        <input type="text" class="form-control datetimepicker" value="07/02/2018">
                        <span class="material-input"></span>
                        <span class="material-input"></span>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-link">Nice Button</button>
                      <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--  End Modal -->
              <!-- notice modal -->
              <div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-notice">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel">How Do You Become an Affiliate?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">close</i>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="instruction">
                        <div class="row">
                          <div class="col-md-8">
                            <strong>1. Register</strong>
                            <p class="description">The first step is to create an account at
                              <a href="http://www.creative-tim.com/">Creative Tim</a>. You can choose a social network or go for the classic version, whatever works best for you.</p>
                          </div>
                          <div class="col-md-4">
                            <div class="picture">
                              <img src="../../assets/img/card-1.jpg" alt="Thumbnail Image" class="rounded img-fluid">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="instruction">
                        <div class="row">
                          <div class="col-md-8">
                            <strong>2. Apply</strong>
                            <p class="description">The first step is to create an account at
                              <a href="http://www.creative-tim.com/">Creative Tim</a>. You can choose a social network or go for the classic version, whatever works best for you.</p>
                          </div>
                          <div class="col-md-4">
                            <div class="picture">
                              <img src="../../assets/img/card-2.jpg" alt="Thumbnail Image" class="rounded img-fluid">
                            </div>
                          </div>
                        </div>
                      </div>
                      <p>If you have more questions, don't hesitate to contact us or send us a tweet @creativetim. We're here to help!</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                      <button type="button" class="btn btn-info btn-round" data-dismiss="modal">Sounds good!</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end notice modal -->
              <!-- small modal -->
              <div class="modal fade modal-mini modal-primary" id="myModal10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-small">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                    </div>
                    <div class="modal-body">
                      <p>Are you sure you want to do this?</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                      <button type="button" class="btn btn-link" data-dismiss="modal">Never mind</button>
                      <button type="button" class="btn btn-success btn-link">Yes
                        <div class="ripple-container"></div>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!--    end small modal -->
            </div>
          </div>
        </div>
    </div>
        <?php include 'includes/modal.php';?>
            <!--Footer-->
           <?php include 'includes/footer.php';?>
            <!--/End Footer-->

        </div>
        
    </div>

<!--   Core JS Files   -->
 <?php include 'includes/footer-min.php';?>

</body>
</html>
