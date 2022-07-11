<style type="text/css">
body {

  font-family: Arial;

}

.numbers {

  font-family: Tahoma;

  /* color: red;*/

}

select {

  font-family: Arial;

}
</style>

<?php

    $this->load->helper('functions_helper');

    if($this->uri->segment(2)== "create")

    {

    $action_page = "address-verification-en/save";

    $name = "नवीनतम डाटा";

    }

   

   

    $gender = ($details->gender == 1) ? 'MR' : 'MRS';

?>



<section class="content ">



  <div class="container-fluid">

    <div class="row">

      <div class="col-12">

        <div class="django-messages">

          <div class="container-fluid">

            <?php if(!empty($this->session->flashdata('msg'))): ?>

            <div class="alert alert-success alert-dismissible"> <a href="#" class="close" data-dismiss="alert"
                aria-label="close">&times;</a><span><?=$this->session->flashdata('msg');?></span></div>

            <?php endif; ?>

            <?php if(!empty($this->session->flashdata('err_msg'))): ?>

            <div class="alert alert-danger alert-dismissible"> <a href="#" class="close" data-dismiss="alert"
                aria-label="close">&times;</a><span><?=$this->session->flashdata('err_msg');?></span></div>

            <?php endif; ?>

          </div>

        </div>

      </div>

    </div>

  </div>



  <div class="container-fluid ">

    <nav aria-label="breadcrumb" class="bg-shadow">

      <ol class="breadcrumb px-3 py-2">

        <li class="breadcrumb-item ml-1"><a href="<?=  base_url()?>">Home</a></li>

        <li class="breadcrumb-item"><a href="<?=  base_url()?>address-verification-en"> Address Verification </a></li>

        <li class="breadcrumb-item active">Detail</li>

      </ol>

    </nav>

  </div>

  <div class="container-fluid font-kalimati">

    <div class="bd-example bd-example-tabs">

      <nav class="nav nav-tabs" id="nav-tab" role="tablist">

        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#details" role="tab"
          aria-controls="home" aria-expanded="true"><i class="fa fa-info-circle"></i> DETAIL</a>

        <?php
                if($details->status !=1)

                {

            ?>

        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#sifaris" role="tab"
          aria-controls="profile" aria-expanded="false"><i class="fa fa-eye"></i> PRINT PREVIEW</a>

        <?php

                }

            ?>

      </nav>

      <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade active show" id="details" role="tabpanel" aria-labelledby="nav-home-tab"
          aria-expanded="true">

          <div class="row">

            <div class="col-lg-12">

              <table class="table table-bordered my-4">

                <tbody>

                  <tr class="text-center font-bold font-20">

                    <td colspan="2"><i class="fa fa-check-circle-o"
                        style="color:<?php echo $details->status == 1 ? "red": $details->status == 2 ? "blue":$details->status == 3 ? 'green':'red';?>"></i>
                      Address Verification Detail</td>

                  </tr>

                  <tr>

                    <td>

                      From ID

                    </td>

                    <td class="numbers">

                      <?= $details->form_id?>

                    </td>

                  </tr>

                  <tr>

                    <td>

                      Status

                    </td>

                    <td>

                      <?php 

                                  if($details->status == 1) {

                                          echo "SUBMITTED";

                                        } elseif($details->status == 2) {

                                          echo 'DARTA';

                                        } elseif($details->status == 3) {

                                          echo "CHALANI";

                                        } else {

                                          echo 'INVALID STATUS MUST ME 12,3';

                                        }

                                ?>

                    </td>

                  </tr>

                  <tr>

                    <td>

                      Darta No

                    </td>

                    <td class="numbers">

                      <?php echo !empty($details->darta_no)?$details->darta_no:'-' ?>

                    </td>

                  </tr>

                  <tr>

                    <td>

                      CHALANI NO

                    </td>

                    <td class="numbers">

                      <?php echo !empty($chalani_details->chalani_no)?$chalani_details->chalani_no:'-' ?>

                    </td>

                  </tr>

                  <tr class="text-center font-bold font-20">

                    <td colspan="2">Detail</td>

                  </tr>

                  <tr>

                    <td>

                      Applicant Name

                    </td>

                    <td><?= $details->app_name ?></td>

                  </tr>







                  <tr>

                    <td>

                      Permanent Address

                    </td>

                    <td class="numbers">

                      <?= $per_gapa->english_name.", ward no-".$details->per_ward.", ".$per_district->english_name .",".$per_state->english_name.", Nepal"?>

                    </td>

                  </tr>

                </tbody>

              </table>

              <div class="row">

                <div class="offset-lg-2 col-lg-8">

                  <table class="table table-borderless ">

                    <tbody>

                      <tr>

                        <td colspan="2">

                          <div class="row">

                            <?php if($details->status == 1) { ?>
                            <div class="col-lg-6">
                              <a class="btn btn-warning btn-submit mt-3 btn-block  "
                                href="<?= base_url() ?>address-verification-en/edit/<?= $details->id ?>/">सम्पादन
                                गर्नुहोस्</a>
                            </div>
                            <div class="col-lg-6">
                              <a class="btn btn-success btn-submit  mt-3 btn-block  "
                                href="<?= base_url() ?>address-verification-en/darta/<?= $details->id ?>/">दर्ता
                                गर्नुहोस</a>
                            </div>
                            <?php  } elseif ($details->status == 2) { ?>
                            <div class="col-lg-6">
                              <a class="btn btn-warning btn-submit mt-3 btn-block  "
                                href="<?= base_url() ?>address-verification-en/edit/<?= $details->id ?>/">सम्पादन
                                गर्नुहोस्</a>
                            </div>
                            <div class="col-lg-6">
                              <a class="btn btn-success btn-submit mt-3 btn-block  "
                                href="<?= base_url() ?>address-verification-en/chalani/<?= $details->id ?>/">चलानी
                                गर्नुहोस</a>
                            </div>
                            <?php } ?>

                          </div>

                        </td>

                      </tr>

                    </tbody>

                  </table>

                </div>

              </div>

            </div>

          </div>

        </div>



        <!-- ----------------------------------------districts----------------------------------------------------------------------------- -->

        <?php if($details->status != 1) {?>

        <div class="tab-pane fade" id="sifaris" role="tabpanel" aria-labelledby="nav-home-tab" aria-expanded="true">

          <div class="row">

            <div class="col-lg-12">

              <div class="text-right">

                <?php if($details->status == 3) : ?>

                <?php echo form_open(base_url().'address-verification-en/print/'.$details->id ,'target="_blank"'); ?>

                <button type="submit" class="btn  btn-success  mb-4"><i class="fa fa-print"></i> &nbsp; &nbsp;
                  छाप्नुहोस्</button>

                <?php endif;?>

              </div>



              <div class="font-14 text-black" style="line-height: 1.6;">

                <div class="letter">

                  <div class="letter-head">
                    <!-- Letter head -->

                    <div class="row">

                      <div class="col-3 letter-head-left">

                        <img src="<?=base_url()?>assets/images/icons/logo.png" alt="logo.png">

                        <span class="red"> F/Y: </span> <span class="numbers"><?= $current_session->name ?></span><br>

                        <span class="red"> Dispatch No: </span> <span
                          class="numbers"><?php echo !empty($chalani_details->chalani_no)?$chalani_details->chalani_no:'-' ?></span>

                      </div>

                      <div class="col-6 letter-head-center red">

                        <h2><?= SITE_OFFICE_ENG ?></h2>

                        <div>

                          <?php if($this->session->userdata('is_muncipality') == 1):?>

                          <h3> <?= SITE_PALIKA_ENG ?></h3>

                          <?php else: ?>

                          <h3 class="numbers"><?=$this->session->userdata('ward_no')?> <?= SITE_WARD_OFFICE_ENG ?></h3>

                          <?php endif; ?>

                          <?php if($this->session->userdata('is_muncipality')==0):?>

                          <h3><?=  $this->session->userdata('address_eng').", ".SITE_DISTRICT_ENG?> </h3>

                          <?php else: ?>

                          <h3><?= SITE_ADDRESS_ENG ?></h3>

                          <?php endif;?>

                          <h4><?= SITE_STATE_ENG ?> </h4>

                        </div>

                      </div>

                      <div class="col-3 text-right letter-head-right">

                        <div class="myclear"> </div>

                        <span class="red" style="font-family: Arial;"> Date :
                          <?= !empty($chalani_details->english_chalani_miti)?$chalani_details->english_chalani_miti:'-'?></span>

                      </div>

                    </div>

                  </div><!-- Letter head end -->

                  <div class="col-md-3">

                    <?php

                                if(!empty($print_detail))

                                {

                                    $this_office = Modules::run('Settings/getOffice',$print_detail->office_id);

                                }

                            ?>

                    <div class="row non-border-input">

                      <input type="text" id="office_sambodhan" class="form-control"
                        value="<?= !empty($print_detail)? $this_office->sambodhan : ''?>">

                    </div>



                  </div>



                  <div class="space4"></div>

                  <div class="text-center mt-2 mb-5">

                    <h4><span style="border-bottom: 1px solid black; margin-bottom: 3px;"> <span class="red"> SUB:
                        </span> ADDRESS VERIFICATION </span>

                      <h4><span style="border-bottom: 1px solid black; margin-bottom: 3px;"> TO WHOM IT MAY CONCERN
                        </span>

                      </h4>

                  </div>

                  <div class="text-justify" style=" font-family: Arial; ">

                    In reference to the subject <b><?php echo $gender?>. <?php echo $details->app_name?></b>

                    has submitted an application to this office requesting to make clear about this address it is hereby
                    certified that this address was <?php echo $details->old_name?> VDC <?php echo $details->old_ward?>
                    and recently has been changed as
                    <?= $per_gapa->english_name.", Ward No-".$details->per_ward.", ".$per_district->english_name?>
                    according to the decision of the Government of Nepal applicable from 10th March 2017 A.D.(2073/11/27
                    B.S.)

                    <br>

                    Thus both addresses refer to same place.

                  </div>



                  <div class="row">

                    <div class="col-3 offset-9">

                      <div style="margin-top: 120px;">

                        <div class="text-center">

                          ................................. <br>

                          <select class="form-control worker_id" name="ward_worker" id="worker_id" required="true">
                            <option value="">Please Select</option>
                            <?php if(!empty($ward_worker)) : 
                                            foreach($ward_worker as $worker) : ?>
                            <option value="<?php echo $worker->id?>"> <?php echo $worker->english_name?></option>
                            <?php endforeach;endif?>
                          </select>
                          <br>
                          <input type="text" name="" class="worker_post form-control" id="worker_post">


                          <?php echo form_close();?>

                        </div>

                      </div>

                    </div>

                  </div>

                </div>



              </div>

            </div>

          </div>

          <!------------------------------------------districts----------------------------------------------------------------------------- -->

          <?php } ?>

        </div>

      </div>

</section>

</div>

<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>

<script type="text/javascript"></script>

<script>
function checkMyDate(date_selected, id_selected)

{

  if (id_selected == "nepaliDate4")

  {

    //        console.log(obj);

    var nep_dob = date_selected;

    //              alert(nep_dob);

    param = {};

    param.nep_dob = nep_dob;

    JQ.ajax({

      url: "<?= base_url()?>getConvertedDate",

      method: "POST",

      data: param,

      success: function(data) {

        var obj = JSON.parse(data);

        JQ("#id_eng_dob").val(obj.html);

      },

      error: function(error) {

        console.log(JSON.stringify(error));

      }

    });

  }

}
</script>