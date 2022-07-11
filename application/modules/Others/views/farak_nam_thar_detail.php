<?php
    $local_body     = Modules::run("Settings/getLocal",$result->local_body);
    $state          = Modules::run("Settings/getState",$result->state);
    $ward           = Modules::run("Settings/getWard",$result->ward);
    $district       = Modules::run("Settings/getDistrict",$result->district);
    $old_place      = Modules::run("Settings/getOldNewAddress",$result->old_place);

    $current_session    = Modules::run('Settings/getCurrentSession',$result->session_id);
    switch($result->gender)
{
    case 1:
        $gender = 'पुरुष';
        break;
    case 2:
        $gender = 'महिला';
        break;
}
    if(!empty($result->documents))
    {
        $documents      = explode("+",$result->documents);

    }
    $path           = base_url()."assets/documents/others/farak_nam_thar/";

?>
<section class="content ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php if(!empty($this->session->flashdata('msg'))): ?>
                <div class="alert alert-success alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><span><?=$this->session->flashdata('msg');?></span></div>
                <?php endif; ?>
                <?php if(!empty($this->session->flashdata('err_msg'))): ?>
                <div class="alert alert-danger alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><span><?=$this->session->flashdata('err_msg');?></span></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container-fluid ">
        <nav aria-label="breadcrumb" class="bg-shadow">
            <ol class="breadcrumb px-3 py-2">
                <li class="breadcrumb-item ml-1"><a href="<?= base_url()?>dashboard">गृह</a></li>


                <li class="breadcrumb-item"><a href="<?= base_url()?>farak-nam-thar/">फरक नाम र थर सिफारिस </a></li>

                <li class="breadcrumb-item active">आवेदकको विवरण</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid font-kalimati">
        <div class="bd-example bd-example-tabs">
            <nav class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#details" role="tab" aria-controls="home" aria-expanded="true">बिस्तृत</a>

                <?php if($result->status != 1): ?>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#sifaris" role="tab" aria-controls="profile" aria-expanded="false">सिफारिस</a>
                <?php endif; ?>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade active show font-kalimati" id="details" role="tabpanel" aria-labelledby="nav-home-tab" aria-expanded="true">
                    <div class="row">
                        <div class="offset-lg-2 col-lg-8">
                            <table class="table table-bordered my-4">
                                <tbody>
                                    <tr>
                                        <td>
                                            फारम ID
                                        </td>
                                        <td>
                                            <?= $result->form_id ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            स्वीकृत
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

                                    <tr class="text-center font-bold font-20">
                                        <td colspan="2">
                                            आवेदकको विवरण
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            नाम
                                        </td>
                                        <td><?= $result->applicant_name ?></td>
                                    </tr>

                                    <tr>
                                        <td>
                                            ठेगाना
                                        </td>
                                        <td>
                                            <?= $local_body->name.", वडा नं.-".$ward->name.", ".$district->name.", ".$state->name ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            साबिक / हालको ठेगाना
                                        </td>
                                        <td>
                                            <?= $old_place->name?> (<?= $old_place->new_name?>)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            फरक भएको कागजात
                                        </td>
                                        <td>
                                            <?= $result->farak_bhayeko_document ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            ठिक भएको कागजात
                                        </td>
                                        <td>
                                            <?= $result->thik_bhayeko_document ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            फरक भएको
                                        </td>
                                        <td>
                                            <?= $result->farak_name ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            हुनुपर्ने
                                        </td>
                                        <td>
                                            <?= $result->thik_naam ?>
                                        </td>
                                    </tr>

                                    <tr class="text-center font-bold font-20">
                                        <td colspan="2">कागजात</td>
                                    </tr>
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
                                                    <a class="btn btn-warning btn-submit mt-3 btn-block  " href="<?= base_url() ?>farak-nam-thar/edit/<?= $result->id ?>/">सम्पादन
                                                        गर्नुहोस्</a>
                                                </div>
                                                <div class="col-lg-6">
                                                    <a class="btn btn-success btn-submit  mt-3 btn-block  " href="<?= base_url() ?>farak-nam-thar/darta/<?= $result->id ?>/">
                                                        दर्ता गर्नुहोस</a>
                                                </div>
                                                <?php
                                                    }
                                                    elseif ($result->status == 2) {
                                                ?>
                                                <div class="col-lg-6">
                                                    <a class="btn btn-warning btn-submit mt-3 btn-block  " href="<?= base_url() ?>farak-nam-thar/edit/<?= $result->id ?>/">सम्पादन
                                                        गर्नुहोस्</a>
                                                </div>
                                                <div class="col-lg-6">
                                                    <a class="btn btn-success btn-submit mt-3 btn-block  " href="<?= base_url() ?>farak-nam-thar/chalani/<?= $result->id ?>/">
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
                <div class="tab-pane fade" id="sifaris" role="tabpanel" aria-labelledby="nav-profile-tab" aria-expanded="false">

                    <div class="text-right">
                        <?php if($result->status == 3 ) : ?>
                        <?php echo form_open(base_url().'farak-nam-thar/print/'.$result->id ,'target="_blank"'); ?>
                        <button type="submit" class="btn  btn-success  mb-4"><i class="fa fa-print"></i> &nbsp; &nbsp; छाप्नुहोस्</button>
                    <?php endif;?>
                    </div>

                    <div class="letter">
                        <div class="letter-head">
                            <!-- Letter head -->
                            <div class="row">
                                <div class="col-3 letter-head-left">
                                    <img src="<?=base_url()?>assets/images/icons/logo.png" alt="logo.png">
                                    <span class="red"> पत्र संख्या: </span> <?= $current_session->name ?><br>
                                    <span class="red"> चलानी नं.: </span> <?= $chalani_no ?>
                                </div>
                                <div class="col-6 letter-head-center red">
                                    <h2><?= SITE_OFFICE ?></h2>
                                    <div>
                                        <?php if($this->session->userdata('is_muncipality') == 1):?>
                                        <h3> <?= SITE_PALIKA ?> </h3>
                                        <?php else: ?>
                                        <h3><?=$this->session->userdata('ward_no')?> <?= SITE_WARD_OFFICE ?></h3>
                                        <?php endif; ?>
                                        <?php if($this->session->userdata('is_muncipality')==0):?>
                                        <h3><?=  $this->session->userdata('address').", ".SITE_DISTRICT?> </h3>
                                        <?php else: ?>
                                        <h3><?= SITE_ADDRESS ?></h3>
                                        <?php endif;?>
                                        <h4><?= SITE_STATE ?> </h4>
                                    </div>
                                </div>
                                <div class="col-3 text-right letter-head-right">
                                    <div class="myclear"> </div>
                                    <span class="red"> मिति : </span> <?= $chalani_result->nepali_chalani_miti?>
                                </div>
                            </div>
                        </div><!-- Letter head end -->
                        <div class="col-md-3">
                            <?php
                                        if($print_detail != FALSE)
                                        {
                                            $this_office = Modules::run('Settings/getOffice',$print_detail->office_id);
                                        }
                                    ?>
                            <div class="row non-border-input">
                                <input type="text" id="office_sambodhan" class="form-control" value="<?= $print_detail != FALSE ? $this_office->sambodhan : ''?>">
                            </div>
                            <div class="row" style="margin-bottom:10px;">
                                <select name="office_id" id="office_id" class="select2" style="width:100%;">
                                    <option value="">छान्नुहोस्</option>';
                                    <?php foreach($offices as $office):?>
                                    <option value="<?=$office->id?>" <?php if($print_detail->office_id == $office->id){echo 'selected="selected"';}?>><?=$office->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="row non-border-input">
                                <input type="text" id="office_address" class="form-control" value="<?= $print_detail != FALSE ? $this_office->address : ''?>">
                            </div>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <!-- The Modal Start -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title ">कार्यालय थप</h4>
                                        <button type="button" class="close" data-dismiss="modal">&#10006;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">

                                        <div class="col-md-10" style="font-size:17px; color:black;">
                                            <div class="form-group row">
                                                सम्बोधन: <input type="text" id="sambodhan" name="sambodhan" class="form-control">
                                            </div>
                                            <div class="form-group row">
                                                कार्यालयको नाम: <input type="text" id="office_name" name="office_name" class="form-control">
                                            </div>
                                            <div class="form-group row">
                                                ठेगाना: <input type="text" id="address" name="address" class="form-control">
                                            </div>

                                        </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" id="submit_office" name="submit_office" class="btn btn-success">Save</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- ----------------------Modal End-------------- -->
                        <div class="text-center font-28" style="margin-top: 50px; margin-bottom: 30px;">
                            <h4><span style="border-bottom: 1px solid black; margin-bottom: 5px;"> <span class="red"> बिषय: </span> फरक फरक नाम र थर प्रमाणित सिफारिस।</span>
                            </h4>
                        </div>
                        <div class="text-justify mt-5" style="text-indent: 150px;">प्रस्तुत बिषयमा
                            <b><?= $local_body->name ?></b> वडा नं <b><?= $ward->name ?> (साबिकको
                            ठेगाना <?= $old_place->name ?>)</b> निवासी
                            <?php
                                if ($gender!=1) {
                                    echo श्री;
                                }else{
                                    echo सुश्री;
                                }
                            ?>
                            <b><?= $result->applicant_name ?></b> को तल
                            उल्लेखित विवरण अनुसारको कागजातमा <b><?= $result->farak_name ?></b>
                            फरक हुन गएकोले सो फरक हुन गएको <b><?= $result->farak_name ?></b> भएको
                            व्यक्ति
                            एकै भएको प्रमाणित
                            गरि पाउँ भनी निजले यस कार्यालयमा पेश गर्नुभएको निवेदन र सोसाथ संलग्न कागजातका आधारमा
                            निजले
                            पेश गरेको व्यहोरा
                            मनासिव भएको खुल्न आएकोले सो फरक <b><?= $result->farak_name ?></b> भएको व्यक्ति एकै भएको व्यहोरा सिफारिस गरिन्छ
                            ।
                        </div>
                        <div class="text-center font-bold my-4">
                            <span style="border-bottom: 1px solid black; margin-bottom: 10px;">फरक नाम, थर र कागजजात विवरण</span>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-3">
                                <span class="text-bold b" style="border-bottom: 1px solid black; margin-bottom: 10px;">फरक भएको कागजजात</span>
                                <br>
                                <?= $result->farak_bhayeko_document ?>
                            </div>
                            <div class="col-md-3">
                                <span class="text-bold b" style="border-bottom: 1px solid black; margin-bottom: 10px;">ठिक भएको कागजजात</span>
                                <br>
                                <?= $result->thik_bhayeko_document ?>
                            </div>
                            <div class="col-md-3">
                                <span class="text-bold b" style="border-bottom: 1px solid black; margin-bottom: 10px;">फरक भएको</span>
                                <br>
                                <?= $result->farak_name ?>
                            </div>
                            <div class="col-md-3">
                                <span class="text-bold b" style="border-bottom: 1px solid black; margin-bottom: 10px;">हुनु पर्ने</span>
                                <br>
                                <?= $result->thik_naam ?>
                            </div>

                        </div>

                        <div class="mt-5 pt-5">
                            <div class="row mt-5x">

                                <div class="offset-9 col-3 signature">
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
                                        <option value="<?= $worker->id ?>" <?php
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
                                                        ?>><?= $worker->name ?></option>
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