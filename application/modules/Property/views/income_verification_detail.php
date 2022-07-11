<?php
    $local_body     = Modules::run("Settings/getLocal",$result->local_body);
    $state          = Modules::run("Settings/getState",$result->state);
    $ward           = Modules::run("Settings/getWard",$result->ward);
    $district       = Modules::run("Settings/getDistrict",$result->district);
    if(!empty($result->documents))
    {
        $documents      = explode("+",$result->documents);

    }
    $path           = base_url()."assets/documents/property/income_verification/";
    $current_session    = Modules::run('Settings/getCurrentSession',$result->session_id);

?>
<section class="content ">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php if(!empty($this->session->flashdata('msg'))): ?>
                        <div  class="alert alert-success alert-dismissible" >    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><span><?=$this->session->flashdata('msg');?></span></div>
                    <?php endif; ?>
                    <?php if(!empty($this->session->flashdata('err_msg'))): ?>
                        <div  class="alert alert-danger alert-dismissible" >    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><span><?=$this->session->flashdata('err_msg');?></span></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>



            <div class="container-fluid ">
                <nav aria-label="breadcrumb" class="bg-shadow">
                    <ol class="breadcrumb px-3 py-2">
                        <li class="breadcrumb-item ml-1"><a href="<?= base_url()?>dashboard">गृह</a></li>


                        <li class="breadcrumb-item"><a href="<?= base_url()?>income-verification">वार्षिक आय प्रमाणिकरण</a></li>

                    <li class="breadcrumb-item active">आवेदकको विवरण</li>

                    </ol>
                </nav>
            </div>





        <div class="container-fluid Please">
            <div class="bd-example bd-example-tabs">
                <nav class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#details" role="tab"
                       aria-controls="home" aria-expanded="true">बिस्तृत</a>

                   <?php if($result->status != 1): ?>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#sifaris" role="tab"
                           aria-controls="profile" aria-expanded="false">सिफारिस</a>
                   <?php endif; ?>
                </nav>

                <div class="tab-content" id="nav-tabContent">

                    <div class="tab-pane fade active show" id="details" role="tabpanel" aria-labelledby="nav-home-tab"
                         aria-expanded="true">
                        <div class="row">
                            <div class="offset-lg-3 col-lg-6">
                                <table class="table table-borderless my-4">
                                    <tbody>

                                    <tr>
                                        <td>
                                            फारम ID
                                        </td>
                                        <td>
                                            <span id="myInput"><?= $result->form_id ?></span></td>
                                        <td>

                                        </td>
                                    </tr>


                                        <tr>
                                            <td>
                                                दर्ता नं.
                                            </td>
                                            <td>
                                                <span id="myInput"><?= $result->id ?></span>
                                            </td>
                                        </tr>

                                    <tr>
                                        <td>
                                            आबदेन दिएको मिती
                                        </td>
                                        <td>
                                            <?= $result->nepali_date ?> ( <?= $result->date?>)
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>अनुमोदित
                                        </td>
                                        <td>
                                            <?php if($result->status == 1)
                                             {
                                            ?>
                                                 <h6 class="text-danger">नभएको</h6>
                                            <?php
                                             }
                                             else
                                             {
                                            ?>
                                                <h6 class="text-success">भएको</h6>
                                            <?php
                                                }
                                            ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            आवेदकको नाम
                                        </td>
                                        <td><?= $result->applicant_name ?></td>
                                    </tr>

                                    <tr>
                                        <td>ठेगाना</td>
                                        <td><?= $local_body->name."-".$ward->name.", ".$district->name.", ".$state->name?></td>
                                    </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <div class="table-responsive text-center">
                            <table class="table table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th>
                                        S.N.
                                    </th>
                                    <th>
                                        Relation with applicant
                                    </th>

                                    <th>
                                        Parties Name
                                    </th>

                                    <th>
                                        Annual Income
                                    </th>

                                    <th>
                                        Remarks
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i = 1;
                                    foreach($income_details as $data) :
                                        $relation = Modules::run("Settings/getRelation",$data->relation);
                                        if(!empty($data->remark))
                                        {
                                            $remark = $data->remark;
                                        }
                                        else
                                        {
                                            $remark = "-";
                                        }
                                ?>
                                    <tr>
                                        <td class="Please">
                                            <?= $i ?>
                                        </td>
                                        <td>
                                            <?= $relation->name ?>
                                        </td>
                                        <td>
                                            <?= $data->parties_name ?>
                                        </td>
                                        <td>
                                            <?= $data->annual_income ?>
                                        </td>
                                        <td>
                                            <?= $remark ?>
                                        </td>
                                    </tr>
                                <?php $i++; endforeach;?>
                                </tbody>
                            </table>

                        </div>

                        <div class="row">
                            <div class="offset-lg-3 col-lg-6">
                                <table class="table table-borderless ">
                                    <tbody>
                                    <tr>
                                        <td>कागजातहरू</td>
                                        <td>
                                            <div>
                                                <?php
                                                    if(!empty($result->documents))
                                                    {
                                                        foreach($documents as $doc)
                                                        {
                                                            echo "<a href='".$path.$doc."' target='_blank'>".$doc."</a><br/>";
                                                        }

                                                    }
                                                    if(empty($result->documents) && empty($result->darta_documents))
                                                    {
                                                            echo "नभएको";
                                                    }
                                                    if(!empty($result->darta_documents))
                                                    {
                                                        $darta_docs  = explode("+",$result->darta_documents);
                                                        foreach($darta_docs as $doc)
                                                        {
                                                            echo "<a href='".$path.$doc."' target='_blank'>".$doc."</a><br/>";
                                                        }
                                                    }
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-lg-2 col-lg-8">
                            <table class="table table-borderless ">
                                <tbody>

                                <tr>
                                    <td colspan="2">


                                        <div class="row">
                                            <?php
                                                if($result->status == 1) {
                                            ?>
                                                    <div class="col-lg-6">
                                                        <a class="btn btn-warning btn-submit mt-3 btn-block  "
                                                           href="<?= base_url() ?>income-verification/edit/<?= $result->id ?>/">सम्पादन
                                                            गर्नुहोस्</a>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <a class="btn btn-success btn-submit  mt-3 btn-block  "
                                                           href="<?= base_url() ?>income-verification/darta/<?= $result->id ?>/">
                                                            दर्ता गर्नुहोस</a>
                                                    </div>
                                            <?php
                                                }
                                                elseif ($result->status == 2) {
                                            ?>
                                                    <div class="col-lg-6">
                                                        <a class="btn btn-warning btn-submit mt-3 btn-block  "
                                                           href="<?= base_url() ?>income-verification/edit/<?= $result->id ?>/">सम्पादन
                                                            गर्नुहोस्</a>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <a class="btn btn-success btn-submit mt-3 btn-block  "
                                                           href="<?= base_url() ?>income-verification/chalani/<?= $result->id ?>/">
                                                            चलानी गर्नुहोस</a>
                                                    </div>
                                            <?php
                                                }
                                            ?>

                                        </div>


                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <?php if($result->status != 1): ?>
                        <div class="tab-pane fade" id="sifaris" role="tabpanel" aria-labelledby="nav-profile-tab"
                             aria-expanded="false">

                            <div class="text-right">
                                <?php if($result->status == 3 ) : ?>
                                    <?php echo form_open(base_url().'income-verification/print/'.$result->id ,'target="_blank"'); ?>
                                    <button type="submit" class="btn  btn-success  mb-4" ><i class="fa fa-print"></i> &nbsp; &nbsp; छाप्नुहोस्</button>
                                <?php endif;?>
                            </div>

                            <div class="letter_print">
                                <div class="letter-head">
                                    <!-- Letter head -->
                                    <div class="row">
                                        <div class="col-3 letter-head-left">
                                            <img src="<?=base_url()?>assets/images/icons/logo.png" alt="logo.png">
                                            <span class="red">  F/Y: </span> <?= $current_session->name ?>
                                            <div class="clearfix"></div>
                                            <span class="red">  Ref no: </span> <?php echo  !empty($chalani_no)?$chalani_no:'चलानी गरिएको छैन' ?>
                                        </div>
                                        <div class="col-6 letter-head-center red">
                                            <h2 ><?= SITE_OFFICE_ENG ?></h2>
                                            <h3>Ward
                                                No. <?= $this->session->userdata('ward_no') ?>
                                                Office</h3>
                                                <?php if($this->session->userdata('is_muncipality')==0):?>
                                                    <h3><?=  $this->session->userdata('address_eng').", ".SITE_DISTRICT_ENG?> </h3>
                                                 <?php else: ?>
                                                     <h3><?= SITE_ADDRESS_ENG ?></h3>
                                                 <?php endif;?>
                                            <h4><?= SITE_STATE_ENG ?></h4>
                                        </div>
                                        <div class="col-3 text-right letter-head-right">
                                            <div class="myclear"> </div>
                                            <span class="red"> Date : </span> <?= $chalani_result->nepali_chalani_miti?>
                                        </div>
                                    </div>
                                </div><!-- Letter head end -->

                                <div class="text-center my-4 py-2">
                                    <h4><span style="border-bottom: 1px solid black; margin-bottom: 3px;"> <span class="red"> Subject:  </span>Verification of Annual Income</span>
                                    </h4>
                                </div>

                                <div class="text-center pb-4">
                                    <h4><span style="border-bottom: 1px solid black; margin-bottom: 3px;">To Whom It May Concern</span>
                                    </h4>
                                </div>

                                <p class="text-justify">
                                    This is to certify that Mr/Mrs/Miss <span
                                        class="text-capitalize"><?= $result->applicant_name ?></span>, permanent resident of
                                    <?= $local_body->english_name ?> Ward
                                    No: <?= $ward->name ?>, <?= $district->english_name?> , <?= $state->english_name?> Nepal, has income from the following
                                    sources:
                                </p>


                                <table class="table letter-table table-bordered ">
                                    <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>
                                            Relations with Applicant
                                        </th>
                                        <th>
                                            Parties Name
                                        </th>
                                        <th>
                                            Annual Income
                                        </th>
                                        <th>
                                            Remarks
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $total  = 0; $i = 1;
                                            $rate   = $this->input->cookie('currency_rate',true);
                                            foreach($income_details as $data):
                                                $relation = Modules::run("Settings/getRelation",$data->relation);
                                                if(!empty($data->description))
                                                {
                                                    $description = $data->description;
                                                }
                                                else
                                                {
                                                    $description = "-";
                                                }
                                                $total += $data->annual_income;
                                         ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td class="text-capitalize"><?= $relation->english_name ?></td>
                                            <td class="text-capitalize"><?= $data->parties_name ?></td>
                                            <td><?= $data->annual_income ?></td>
                                            <td> <?= $description ?> </td>

                                        </tr>
                                    <?php $i++; endforeach;?>
                                    </tbody>
                                </table>

                                <div class="text-justify">
                                    Total valuation of income source is
                                    <strong>NRs. <?= placeholder($total) ?></strong> which is equivalent to
                                    <strong>$ <?= number_format($total / $rate ,2,".",",")?></strong> Note:Today's exchange rate <strong>$1 =
                                    NRs. <?= $rate ?></strong>.
                                </div>
                                
                                <div class="row">
                                    <div class="space3"></div>
                                    <div class="col-3 offset-9 signature">
                                        <div class="">
                                            <select name='ward_worker' class="form-control" id="ward_worker">
                                                <option value=''>छान्नुहोस्</option>
                                                <?php
                                                    foreach($workers as $worker):
                                                        if($print_detail != FALSE)
                                                        {
                                                            $this_worker = Modules::run('Settings/getWardWorker',$print_detail->worker_id);
                                                            $this_post   = Modules::run('Settings/getPost',$this_worker->post_id);
                                                        }
                                                        else {
                                                            $this_post = FALSE;
                                                        }

                                                ?>
                                                    <option value="<?= $worker->id ?>"
                                                        <?php
                                                            if($print_detail != FALSE)
                                                            {
                                                                if($worker->id == $print_detail->worker_id){
                                                                echo 'selected="selected"';
                                                                }
                                                            }
                                                            else
                                                            {
                                                                if($worker->post_id == 1){
                                                                echo 'selected="selected"';
                                                                }
                                                            }
                                                        ?>
                                                    ><?= $worker->name ?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <input type="text" name="post" id="ward_post" class="form-control" style="margin-top:15px;" value="<?= ($this_post != FALSE) ? 'वडा '.$this_post->name : 'वडा अध्यक्ष'?>">
                                            <?php echo form_close();?>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    <?php endif;?>

                </div>
            </div>
        </div>


    </section>
</div>
<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
