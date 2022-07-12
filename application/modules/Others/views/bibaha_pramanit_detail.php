<?php
$org_local_body_g     = Modules::run("Settings/getLocal",$result->g_local_body);
$org_state_g          = Modules::run("Settings/getState",$result->g_state);
$org_ward_g           = Modules::run("Settings/getWard",$result->g_ward);
$org_district_g       = Modules::run("Settings/getDistrict",$result->g_district);
$org_old_new_g        = Modules::run("Settings/getOldNewAddress",$result->g_old_address);

$org_local_body_b     = Modules::run("Settings/getLocal",$result->b_local_body);
$org_state_b          = Modules::run("Settings/getState",$result->b_state);
$org_ward_b           = Modules::run("Settings/getWard",$result->b_ward);
$org_district_b       = Modules::run("Settings/getDistrict",$result->b_district);
$org_old_new_b        = Modules::run("Settings/getOldNewAddress",$result->b_old_address);
$marriage_type        = Modules::run("Settings/getMarriageType",$result->marriage_type);
if(!empty($result->documents))
{
    $documents      = explode("+",$result->documents);

}
$path           = base_url()."assets/documents/others/bibaha_pramanit/";
$current_session    = Modules::run('Settings/getCurrentSession',$result->session_id);
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
                <li class="breadcrumb-item ml-1"><a href="/">गृह</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url()?>bibaha-pramanit"> विवाह प्रमाणित प्रमाणपत्र </a>
                </li>
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
                <div class="tab-pane fade active show" id="details" role="tabpanel" aria-labelledby="nav-home-tab" aria-expanded="true">
                    <div class="row">
                        <div class="offset-lg-2 col-lg-8">
                            <table class="table table-bordered my-4 font-kalimati">
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
                                    <tr>
                                        <td>विवाह प्रकार</td>
                                        <td><?=$marriage_types ?></td>
                                    </tr>
                                    <tr class="text-center font-bold font-20">
                                        <td colspan="2">दुलहाको विवरण
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            नाम
                                        </td>
                                        <td>श्री <?= $result->g_name ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            हजुर बुवाको नाम
                                        </td>
                                        <td>
                                            श्री <?= $result->g_grand_father_name ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            बुवाको नाम
                                        </td>
                                        <td>
                                            श्री <?= $result->g_father_name ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            आमाको नाम
                                        </td>
                                        <td>
                                            श्रीमती <?= $result->g_mother_name ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            नागरिकता/राहदानी नं
                                        </td>
                                        <td>
                                            <?= $result->g_citizenship_no ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ठेगाना</td>
                                        <td>
                                            <?= $org_local_body_g->name.", वार्ड-".$org_ward_g->name.", ".$org_district_g->name.", ".$org_state_g->name ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            साबिक ठेगाना
                                        </td>
                                        <td>
                                            <?= $org_old_new_g->name ?>
                                        </td>
                                    </tr>
                                    <tr class="text-center font-bold font-20">
                                        <td colspan="2">दुलहीको विवरण
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            नाम
                                        </td>
                                        <td>सुश्री <?= $result->b_name ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            हजुर बुवाको नाम
                                        </td>
                                        <td>
                                            श्री <?= $result->b_grand_father_name ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            बुवाको नाम
                                        </td>
                                        <td>
                                            श्री <?= $result->b_father_name ?>
                                        </td>
                                    </tr>
                                   <tr>
                                        <td>
                                            आमाको नाम
                                        </td>
                                        <td>
                                            श्रीमती <?= $result->b_mother_name ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            नागरिकता/राहदानी नं
                                        </td>
                                        <td>
                                            <?= $result->b_citizenship_no ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ठेगाना</td>
                                        <td>
                                            <?= $org_local_body_b->name.", वार्ड-".$org_ward_b->name.", ".$org_district_b->name.", ".$org_state_b->name ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            साबिक ठेगाना
                                        </td>
                                        <td>
                                            <?= $org_old_new_b->name ?>
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
                                                        <a class="btn btn-warning btn-submit mt-3 btn-block  " href="<?= base_url() ?>bibaha-pramanit/edit/<?= $result->id ?>/">सम्पादन
                                                        गर्नुहोस्</a>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <a class="btn btn-success btn-submit  mt-3 btn-block  " href="<?= base_url() ?>bibaha-pramanit/darta/<?= $result->id ?>/">
                                                        दर्ता गर्नुहोस</a>
                                                    </div>
                                                    <?php
                                                }
                                                elseif ($result->status == 2) {
                                                    ?>
                                                    <div class="col-lg-6">
                                                        <a class="btn btn-warning btn-submit mt-3 btn-block  " href="<?= base_url() ?>bibaha-pramanit/edit/<?= $result->id ?>/">सम्पादन
                                                        गर्नुहोस्</a>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <a class="btn btn-success btn-submit mt-3 btn-block  " href="<?= base_url() ?>bibaha-pramanit/chalani/<?= $result->id ?>/">
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
                            <?php echo form_open(base_url().'bibaha-pramanit/print/'.$result->id ,'target="_blank"'); ?>
                            <button type="submit" class="btn  btn-success  mb-4"><i class="fa fa-print"></i> &nbsp; &nbsp; छाप्नुहोस्</button>
                            <?php endif;?>
                        </div>
                        <div class="letter">
                            <div class="letter-head"><!-- Letter head -->
                                <div class="row">
                                    <div class="col-3 letter-head-left">
                                        <img src="<?=base_url()?>assets/images/icons/logo.png" alt="logo.png">
                                        <span class="red"> पत्र संख्या: </span> <?= $current_session->name ?><br>
                                        <span class="red"> चलानी नं.: </span> <?php !empty($chalani_no)? $chalani_no:'चलानी गरिएको छैन' ?>
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
                                    <div class="text-center mt-2 pb-2">
                                        <h4><span style="border-bottom: 1px solid black; margin-bottom: 3px;"> <span class="red"> बिषय:</span> विवाह प्रमाणित । </span>
                                        </h4>
                                    </div>
                                    <div class="space2"> </div>
                                    <div class="row">
                                        <div class="col-12">
                                            श्री <b><?= $result->g_grand_father_name ?></b> को नाति श्री <b><?= $result->g_father_name ?></b> तथा श्रीमती <b><?= $result->g_mother_name ?> </b>को छोरा <b><?= $org_district_g->name?>, <?= $org_local_body_g->name ?>,</b> वार्ड-<b><?= $org_ward_g->name ?></b> (साबिकको ठेगाना <b><?= $org_old_new_g->name ?></b>) निबासी श्री <b><?= $result->g_name ?></b> संग श्री <b><?= $result->b_grand_father_name ?></b> को नातिनी श्री <b><?= $result->b_father_name ?></b> तथा श्रीमती <b><?= $result->b_mother_name ?></b> को
                                            छोरी <b><?=$org_district_b->name?>, <?= $org_local_body_b->name ?></b> वडा-<b><?= $org_ward_g->name ?></b> निबासी
                                            सुश्री <b><?= $result->b_name ?></b> बीच मिति <b><?= $result->marriage_date_nepali ?></b> मा विवाह भई यस वडा कार्यालयमा मिति <?=$result->nepali_date?> मा भएको व्यहोरा प्रमाणित गरिन्छ।
                                        </div>
                                    </div>
                                    <div class="space3"></div>
                                    <div class="row" >
                                        <div class="col-3 offset-9 signature">
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
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
