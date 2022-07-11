<?php
    if($this->uri->segment(2)== "create")
    {
    $action_page = "citizenship-certificate/create";
    $name = "नवीनतम डाटा";
    }
    if($this->uri->segment(2)=="edit")
    {
    $action_page = "citizenship-certificate/edit/".($this->uri->segment(3));
    $name = "साच्याउनुहोस";
    }
//    echo $action_page;exit;
$path = base_url()."assets/documents/certificate/citcertificate/";
?>
<section class="content ">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="django-messages">

                    </div>
                </div>
            </div>
        </div>



            <div class="container-fluid ">
                <nav aria-label="breadcrumb" class="bg-shadow">
                    <ol class="breadcrumb px-3 py-2">
                        <li class="breadcrumb-item ml-1"><a href="<?=  base_url()?>certificate-dashboard">गृह</a></li>


        <li class="breadcrumb-item"><a href="<?=  base_url()?>citizenship-certificate"> नागरिकता प्रमाण पत्र </a></li>

    <li class="breadcrumb-item active"><?=$name?></li>

                    </ol>
                </nav>
            </div>




    <div class="container-fluid ">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="offset-lg-1 col-lg-10">

                </div>
            </div>

              <?php if(!empty($this->session->flashdata('msg')))
                {?>
                    <div  class="alert alert-success alert-dismissible" >    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><span><?=$this->session->flashdata('msg');?></span></div>


                <?php } ?>
                <?php if(!empty($this->session->flashdata('err_msg')))
                {?>
                    <div  class="alert alert-danger alert-dismissible" >    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><span><?=$this->session->flashdata('err_msg');?></span></div>

                <?php } ?>


               <?php echo form_open_multipart($action_page)?>

               <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"><span
                                        class="float-right">आवेदन गरिएको मिति<span
                                        class="text-danger">&nbsp;*</span></span></label>




                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <input type="text" name="nepali_date" value="<?=(isset($result))? $result->nepali_date:''?>" maxlength="10" class="form-control" required id="nepaliDate5" />
                                            <div class="input-group-append">

                                            </div>
                                        </div>
                                    </div>

                            </div>
                         </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">
                                              <span class="float-right">
                                                आवेदन गरिएको कार्यालय<span class="text-danger">&nbsp;*</span>
                                              </span>
                                </label>

                                    <div class="col-sm-6">
                                        <input type="text" name="office" value="<?=(isset($result))? $result->office:''?>" maxlength="128" class="form-control" required id="id_office" />
                                    </div>

                            </div>
                        </div>
                    </div>

                    <div class="row ">
                        <div class="col-md-12 mb-3">
                            <h4>
                                व्यक्तिगत विवरण (Personal Detail)
                            </h4>
                            <hr style="border: 1px solid #adadad">
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">
                                            <span class="float-right">
                                                <strong>Name(In Nepali)</strong><span class="text-danger">&nbsp;*</span>
                                            </span>

                                        </label>

                                            <div class="col-md-3 mb-sm-2">
                                                <input type="text" name="nep_first_name" value="<?=(isset($result))? $result->nep_first_name:''?>" maxlength="64" class="form-control" required placeholder="पहिलो नाम" id="id_nep_first_name" />
                                            </div>
                                            <div class="col-md-3 mb-sm-2">
                                                <input type="text" name="nep_middle_name" value="<?=(isset($result))? $result->nep_middle_name:''?>" maxlength="64" class="form-control" placeholder="बीचको नाम" id="id_nep_middle_name" />
                                            </div>
                                            <div class="col-md-3 mb-sm-2">
                                                <input type="text" name="nep_last_name" value="<?=(isset($result))? $result->nep_last_name:''?>" maxlength="64" class="form-control" required placeholder="थर" id="id_nep_last_name" />
                                            </div>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">
                                      <span class="float-right">
                                        <Strong>Name(In English)</Strong>
                                        <span class="text-danger">&nbsp;*</span>
                                      </span>
                                        </label>

                                            <div class="col-md-3 mb-sm-2">
                                                <input type="text" name="eng_first_name" value="<?=(isset($result))? $result->eng_first_name:''?>" maxlength="64" class="form-control" required placeholder="First Name" id="id_eng_first_name" />
                                            </div>
                                            <div class="col-md-3 mb-sm-2">
                                                <input type="text" name="eng_middle_name" value="<?=(isset($result))? $result->eng_middle_name:''?>" maxlength="64" class="form-control" placeholder="Middle Name" id="id_eng_middle_name" />
                                            </div>
                                            <div class="col-md-3 mb-sm-2">
                                                <input type="text" name="eng_last_name" value="<?=(isset($result))? $result->eng_last_name:''?>" maxlength="64" class="form-control" required placeholder="Last Name" id="id_eng_last_name" />
                                            </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-6 col-form-label">
                                          <span class="float-right">
                                                <strong>लिङ्ग (Gender)</strong>
                                            <span class="text-danger">&nbsp;*</span>
                                          </span>
                                        </label>

                                            <div class="col-sm-6">
                                                <select name="gender" class="form-control" required id="id_gender">
                                                    <option value="" selected>छान्नुहोस्</option>

                                                    <option value="Male" <?php if(isset($result) && $result->gender=="Male"){ echo 'selected="selected"';}?>>पुरुष</option>

                                                    <option value="Female" <?php if(isset($result) && $result->gender=="Female"){ echo 'selected="selected"';}?>>महिला</option>

                                                    <option value="Other" <?php if(isset($result) && $result->gender=="Other"){ echo 'selected="selected"';}?>>अन्य</option>

                                                  </select>
                                            </div>

                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">
                                          <span class="float-right">
                                                <strong>जन्म मिति (Date of birth)</strong>
                                            <span class="text-danger">&nbsp;*</span>
                                          </span>
                                        </label>

                                            <div class="col-sm-7">
                                                <div class="input-group mb-sm-2">

                                                    <input type="text" name="nep_dob" value="<?=isset($result)?$result->nep_dob:''?>" maxlength="10" class="form-control nep_dob" required id="nepaliDate4" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">B.S.</span>
                                                    </div>

                                                    <input type="text" name="eng_dob" readonly="true" value="<?=isset($result)?$result->eng_dob:''?>" class="form-control" required id="id_eng_dob" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">A.D.</span>
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 mb-3">
                            <h4>
                                जन्मस्थान (Place Of Birth)
                            </h4>
                            <hr style="border: 1px solid #adadad">
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">
                                            <span class="float-right">
                                                <strong>(In Nepali)</strong><span class="text-danger">&nbsp;*</span>
                                            </span>

                                        </label>

                                            <div class="col-md-3 mb-sm-2">
                                                <select name="b_state" class="form-control select2 state_selected" required id="state_selected-1">
                                                    <option value="" selected>प्रदेश</option>

                                                    <?php foreach($states as $state):?>
                                                    <option value="<?=$state->id?>"
                                                            <?php
                                                            if(isset($result) && $result->p_state == $state->id)
                                                            {
                                                                echo 'selected = "selected"';
                                                            }
                                                            elseif($state->id==$default[0])
                                                            {
                                                                echo 'selected="selected"';
                                                            }
                                                          ?>
                                                            ><?=$state->name?></option>
                                                    <?php endforeach;?>
                                                  </select>
                                            </div>
                                            <div class="col-md-3 mb-sm-2">
                                              <select name="b_district" class="form-control select2 district_selected" id="district_selected-1" required>
                                                    <option value="" selected>जिल्ला</option>
                                                <?php
                                                    foreach($districts as $district) {
                                                ?>
                                                        <option value="<?= $district->id ?>"
                                                            <?php if(isset($result->p_district)&&$result->p_district == $district->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            elseif($district->name==$default[1])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>
                                                        ><?= $district->name ?></option>
                                                <?php
                                                    }
                                                 ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3 mb-sm-2">
                                                <select name="b_local_body" class="form-control select2 local_body_selected" id="local_body_selected-1" required>
                                                    <option value="" selected>गा.पा./न.पा </option>
                                                <?php
                                                    foreach($locals as $local)
                                                    {
                                                ?>
                                                        <option value="<?= $local->id ?>"
                                                            <?php if(isset($result->p_local_body)&&$result->p_local_body == $local->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            elseif($local->name==$default[2])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>
                                                        ><?= $local->name ?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="col-md-1 mb-sm-2">
                                                <select name="b_ward" class="form-control select2 ward_selected" id="ward_selected-1" required>
                                                    <option value="" selected>वडा नं</option>
                                                <?php
                                                    foreach($wards as $ward) {
                                                ?>
                                                        <option value="<?= $ward->id ?>"
                                                            <?php if(isset($result->p_ward)&&$result->p_ward == $ward->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            elseif($ward->id==$default[3])
                                                            {
                                                                    echo 'selected="selected"';
                                                            }
                                                            ?>
                                                        ><?= $ward->name ?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>

                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">
                                            <span class="float-right">
                                                <strong>(In English)</strong><span class="text-danger">&nbsp;*</span>
                                            </span>

                                        </label>

                                        <div class="col-md-3 mb-sm-2">
                                            <input type="text" name="b_eng_state" class="form-control" placeholder="Province" value="<?= isset($result) ? $result->b_eng_state : ''?>" required>
                                        </div>
                                        <div class="col-md-3 mb-sm-2">
                                            <input type="text" name="b_eng_district" class="form-control" placeholder="District" value="<?= isset($result) ? $result->b_eng_district : ''?>" required>
                                        </div>
                                        <div class="col-md-3 mb-sm-2">
                                            <input type="text" name="b_eng_local_body" class="form-control" placeholder="Municipality" value="<?= isset($result) ? $result->b_eng_local_body : ''?>" required>
                                        </div>
                                        <div class="col-md-1 mb-sm-2">
                                            <input type="text" name="b_eng_ward" class="form-control" placeholder="Ward" value="<?= isset($result) ? $result->b_eng_ward : ''?>" required>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">
                                          <span class="float-right">
                                                <strong>टोल</strong>
                                            <span class="text-danger">&nbsp;*</span>
                                          </span>
                                        </label>

                                            <div class="col-sm-9">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                                <span class="input-group-text"
                                                                      id="basic-addon1">In Nepali</span>
                                                    </div>
                                                    <input type="text" name="nep_bp_tole" value="<?=isset($result)?$result->nep_bp_tole:''?>" maxlength="64" class="form-control" id="id_nep_bp_tole" placeholder="टोल" />
                                                    <div class="input-group-prepend">
                                                                <span class="input-group-text"
                                                                      id="basic-addon1">In English</span>
                                                    </div>
                                                    <input type="text" name="eng_bp_tole" value="<?=isset($result)?$result->eng_bp_tole:''?>" maxlength="64" class="form-control" id="id_eng_bp_tole" placeholder="Tole" />
                                                </div>
                                            </div>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 mb-3">
                            <h4>
                                स्थाई ठेगाना (Permanent Address)
                            </h4>
                            <hr style="border: 1px solid #adadad">
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">
                                            <span class="float-right">
                                                <strong>(In Nepali) </strong><span class="text-danger">&nbsp;*</span>
                                            </span>

                                        </label>

                                            <div class="col-md-3 mb-sm-2">
                                                    <select name="p_state" class="form-control select2 state_selected" required id="state_selected-2">
                                                        <option value="" selected>प्रदेश</option>

                                                        <?php foreach($states as $state):?>
                                                        <option value="<?=$state->id?>"
                                                                <?php
                                                                if(isset($result) && $result->p_state == $state->id)
                                                                {
                                                                    echo 'selected = "selected"';
                                                                }
                                                                elseif($state->id==$default[0])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                              ?>
                                                                ><?=$state->name?></option>
                                                        <?php endforeach;?>
                                                      </select>
                                            </div>
                                            <div class="col-md-3 mb-sm-2">
                                              <select name="p_district" class="form-control select2 district_selected" id="district_selected-2" required>
                                                    <option value="" selected>जिल्ला</option>
                                                <?php
                                                    foreach($districts as $district) {
                                                ?>
                                                        <option value="<?= $district->id ?>"
                                                            <?php if(isset($result->p_district)&&$result->p_district == $district->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            elseif($district->name==$default[1])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>
                                                        ><?= $district->name ?></option>
                                                <?php
                                                    }
                                                 ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3 mb-sm-2">
                                                <select name="p_local_body" class="form-control select2 local_body_selected" id="local_body_selected-2" required>
                                                    <option value="" selected>गा.पा./न.पा </option>
                                                <?php
                                                    foreach($locals as $local)
                                                    {
                                                ?>
                                                        <option value="<?= $local->id ?>"
                                                            <?php if(isset($result->p_local_body)&&$result->p_local_body == $local->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            elseif($local->name==$default[2])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>
                                                        ><?= $local->name ?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="col-md-1 mb-sm-2">
                                                <select name="p_ward" class="form-control select2 ward_selected" id="ward_selected-2" required>
                                                    <option value="" selected>वडा नं</option>
                                                <?php
                                                    foreach($wards as $ward) {
                                                ?>
                                                        <option value="<?= $ward->id ?>"
                                                            <?php if(isset($result->p_ward)&&$result->p_ward == $ward->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            elseif($ward->id==$default[3])
                                                            {
                                                                    echo 'selected="selected"';
                                                            }
                                                            ?>
                                                        ><?= $ward->name ?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">
                                            <span class="float-right">
                                                <strong>(In English)</strong><span class="text-danger">&nbsp;*</span>
                                            </span>

                                        </label>

                                        <div class="col-md-3 mb-sm-2">
                                            <input type="text" name="p_eng_state" class="form-control" placeholder="Province" value="<?= isset($result) ? $result->p_eng_state : ''?>" required>
                                        </div>
                                        <div class="col-md-3 mb-sm-2">
                                            <input type="text" name="p_eng_district" class="form-control" placeholder="District" value="<?= isset($result) ? $result->p_eng_district : ''?>" required>
                                        </div>
                                        <div class="col-md-3 mb-sm-2">
                                            <input type="text" name="p_eng_local_body" class="form-control" placeholder="Municipality" value="<?= isset($result) ? $result->p_eng_local_body : ''?>" required>
                                        </div>
                                        <div class="col-md-1 mb-sm-2">
                                            <input type="text" name="p_eng_ward" class="form-control" placeholder="Ward" value="<?= isset($result) ? $result->p_eng_ward : ''?>" required>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">
                                          <span class="float-right">
                                                <strong>टोल</strong>
                                            <span class="text-danger">&nbsp;*</span>
                                          </span>
                                        </label>

                                            <div class="col-sm-9">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                                <span class="input-group-text"
                                                                      id="basic-addon1">In Nepali</span>
                                                    </div>
                                                    <input type="text" name="nep_tole" value="<?=isset($result)?$result->nep_tole:''?>" maxlength="64" class="form-control" id="id_nep_tole" placeholder="टोल" />
                                                    <div class="input-group-prepend">
                                                                <span class="input-group-text"
                                                                      id="basic-addon1">In English</span>
                                                    </div>
                                                    <input type="text" name="eng_tole" value="<?=isset($result)?$result->eng_tole:''?>" maxlength="64" class="form-control" id="id_eng_tole" placeholder="Tole" />
                                                </div>
                                            </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h4>
                                बुबाको विवरण (Father's Detail)
                            </h4>
                            <hr style="border: 1px solid #adadad">
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">
                                          <span class="float-right">
                                                <strong>नाम थर</strong>
                                            <span class="text-danger">&nbsp;*</span>
                                          </span>
                                        </label>

                                            <div class="col-sm-8">
                                                <input type="text" name="father_name" value="<?=isset($result)?$result->father_name:''?>" maxlength="164" class="form-control" id="id_father_name" />
                                            </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">
                                          <span class="float-right">
                                                <strong>नागरिकता नं.</strong>
                                            <span class="text-danger">&nbsp;*</span>
                                          </span>
                                        </label>

                                            <div class="col-sm-8">
                                                <div class="input-group mb-sm-2">

                                                    <input type="text" name="f_citizenship_no" value="<?=isset($result)?$result->f_citizenship_no:''?>"  maxlength="64" class="form-control" id="id_f_citizenship_no" />
                                                </div>
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">
                                            <span class="float-right">
                                                <strong>(In Nepali) </strong><span class="text-danger">&nbsp;*</span>
                                            </span>

                                </label>

                                    <div class="col-md-2 mb-sm-2">
                                                <select name="f_state" class="form-control select2 state_selected"   id="state_selected-3">
                                                    <option value="" selected>प्रदेश</option>

                                                    <?php foreach($states as $state):?>
                                                    <option value="<?=$state->id?>"
                                                            <?php
                                                            if(isset($result) && $result->f_state == $state->id)
                                                            {
                                                                echo 'selected = "selected"';
                                                            }
                                                            elseif($state->id==$default[0])
                                                            {
                                                                echo 'selected="selected"';
                                                            }
                                                          ?>
                                                            ><?=$state->name?></option>
                                                    <?php endforeach;?>
                                                  </select>
                                            </div>
                                            <div class="col-md-2 mb-sm-2">
                                              <select name="f_district" class="form-control select2 district_selected" id="district_selected-3"  >
                                                    <option value="" selected>जिल्ला</option>
                                                <?php
                                                    foreach($districts as $district) {
                                                ?>
                                                        <option value="<?= $district->id ?>"
                                                            <?php if(isset($result->f_district)&&$result->f_district == $district->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            elseif($district->name==$default[1])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>
                                                        ><?= $district->name ?></option>
                                                <?php
                                                    }
                                                 ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 mb-sm-2">
                                                <select name="f_local_body" class="form-control select2 local_body_selected" id="local_body_selected-3"  >
                                                    <option value="" selected>गा.पा./न.पा </option>
                                                <?php
                                                    foreach($locals as $local)
                                                    {
                                                ?>
                                                        <option value="<?= $local->id ?>"
                                                            <?php if(isset($result->f_local_body)&&$result->f_local_body == $local->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            elseif($local->name==$default[2])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>
                                                        ><?= $local->name ?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 mb-sm-2">
                                                <select name="f_ward" class="form-control select2 ward_selected" id="ward_selected-3"  >
                                                    <option value="" selected>वडा नं</option>
                                                <?php
                                                    foreach($wards as $ward) {
                                                ?>
                                                        <option value="<?= $ward->id ?>"
                                                            <?php if(isset($result->f_ward)&&$result->f_ward == $ward->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            elseif($ward->id==$default[3])
                                                            {
                                                                    echo 'selected="selected"';
                                                            }
                                                            ?>
                                                        ><?= $ward->name ?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                    <div class="col-md-2 mb-sm-2">
                                        <input type="text" name="f_tole" value="<?=isset($result)?$result->f_tole:''?>" maxlength="64" class="form-control" placeholder="टोल" id="id_f_tole" />
                                    </div>

                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h4>
                                आमाको विवरण (Mother's Detail)
                            </h4>
                            <hr style="border: 1px solid #adadad">
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">
                                          <span class="float-right">
                                                <strong>नाम थर</strong>
                                            <span class="text-danger">&nbsp;*</span>
                                          </span>
                                        </label>

                                            <div class="col-sm-8">
                                                <input type="text" name="mother_name" value="<?=isset($result)?$result->mother_name:''?>" maxlength="164" class="form-control" id="id_mother_name" />
                                            </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">
                                          <span class="float-right">
                                                <strong>नागरिकता नं.</strong>
                                            <span class="text-danger">&nbsp;*</span>
                                          </span>
                                        </label>

                                            <div class="col-sm-8">
                                                <div class="input-group mb-sm-2">

                                                    <input type="text" name="m_citizenship_no" value="<?=isset($result)?$result->m_citizenship_no:''?>" maxlength="64" class="form-control" id="id_m_citizenship_no" />
                                                </div>
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">
                                            <span class="float-right">
                                                <strong>(In Nepali) </strong><span class="text-danger">&nbsp;*</span>
                                            </span>

                                </label>

                                   <div class="col-md-2 mb-sm-2">
                                                <select name="m_state" class="form-control select2 state_selected"   id="state_selected-4">
                                                    <option value="" selected>प्रदेश</option>

                                                    <?php foreach($states as $state):?>
                                                    <option value="<?=$state->id?>"
                                                            <?php
                                                            if(isset($result) && $result->m_state == $state->id)
                                                            {
                                                                echo 'selected = "selected"';
                                                            }
                                                            elseif($state->id==$default[0])
                                                            {
                                                                echo 'selected="selected"';
                                                            }
                                                          ?>
                                                            ><?=$state->name?></option>
                                                    <?php endforeach;?>
                                                  </select>
                                            </div>
                                            <div class="col-md-2 mb-sm-2">
                                              <select name="m_district" class="form-control select2 district_selected" id="district_selected-4"  >
                                                    <option value="" selected>जिल्ला</option>
                                                <?php
                                                    foreach($districts as $district) {
                                                ?>
                                                        <option value="<?= $district->id ?>"
                                                            <?php if(isset($result->m_district) && $result->m_district == $district->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            elseif($district->name==$default[1])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>
                                                        ><?= $district->name ?></option>
                                                <?php
                                                    }
                                                 ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 mb-sm-2">
                                                <select name="m_local_body" class="form-control select2 local_body_selected" id="local_body_selected-4"  >
                                                    <option value="" selected>गा.पा./न.पा </option>
                                                <?php
                                                    foreach($locals as $local)
                                                    {
                                                ?>
                                                        <option value="<?= $local->id ?>"
                                                            <?php if(isset($result->m_local_body)&&$result->m_local_body == $local->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            elseif($local->name==$default[2])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>
                                                        ><?= $local->name ?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 mb-sm-2">
                                                <select name="m_ward" class="form-control select2 ward_selected" id="ward_selected-4"  >
                                                    <option value="" selected>वडा नं</option>
                                                <?php
                                                    foreach($wards as $ward) {
                                                ?>
                                                        <option value="<?= $ward->id ?>"
                                                            <?php if(isset($result->m_ward)&&$result->m_ward == $ward->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            elseif($ward->id==$default[3])
                                                            {
                                                                    echo 'selected="selected"';
                                                            }
                                                            ?>
                                                        ><?= $ward->name ?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                    <div class="col-md-2 mb-sm-2">
                                        <input type="text" name="m_tole" value="<?=isset($result)?$result->m_tole:''?>" maxlength="64" class="form-control" placeholder="टोल" id="id_m_tole" />
                                    </div>

                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h4>
                                पति / पत्नीको विवरण (Husband / Wife Detail)
                            </h4>
                            <hr style="border: 1px solid #adadad">
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">
                                          <span class="float-right">
                                                <strong>नाम</strong>

                                          </span>
                                        </label>

                                            <div class="col-sm-8">
                                                <input type="text" name="husband_wife_name" value="<?=isset($result)?$result->husband_wife_name:''?>" maxlength="164" class="form-control" id="id_husband_wife_name" />
                                            </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">
                                          <span class="float-right">
                                                <strong>नागरिकता नं.</strong>
                                          </span>
                                        </label>

                                            <div class="col-sm-8">
                                                <div class="input-group mb-sm-2">

                                                    <input type="text" name="hw_citizenship_no" value="<?=isset($result)?$result->hw_citizenship_no:''?>" maxlength="64" class="form-control" id="id_hw_citizenship_no" />
                                                </div>
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">
                                            <span class="float-right">
                                                <strong>(In Nepali) </strong>
                                            </span>

                                </label>

                                    <div class="col-md-2 mb-sm-2">
                                                <select name="hw_state" class="form-control select2 state_selected"   id="state_selected-5">
                                                    <option value="" selected>प्रदेश</option>

                                                    <?php foreach($states as $state):?>
                                                    <option value="<?=$state->id?>"
                                                            <?php
                                                            if(isset($result) && $result->hw_state == $state->id)
                                                            {
                                                                echo 'selected = "selected"';
                                                            }
                                                            elseif($state->id==$default[0])
                                                            {
                                                                echo 'selected="selected"';
                                                            }
                                                          ?>
                                                            ><?=$state->name?></option>
                                                    <?php endforeach;?>
                                                  </select>
                                            </div>
                                            <div class="col-md-2 mb-sm-2">
                                              <select name="hw_district" class="form-control select2 district_selected" id="district_selected-5"  >
                                                    <option value="" selected>जिल्ला</option>
                                                <?php
                                                    foreach($districts as $district) {
                                                ?>
                                                        <option value="<?= $district->id ?>"
                                                            <?php if(isset($result->hw_district)&&$result->hw_district == $district->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            ?>
                                                        ><?= $district->name ?></option>
                                                <?php
                                                    }
                                                 ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 mb-sm-2">
                                                <select name="hw_local_body" class="form-control select2 local_body_selected" id="local_body_selected-5"  >
                                                    <option value="" selected>गा.पा./न.पा </option>
                                                <?php
                                                    foreach($locals as $local)
                                                    {
                                                ?>
                                                        <option value="<?= $local->id ?>"
                                                            <?php if(isset($result->hw_local_body)&&$result->hw_local_body == $local->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            ?>
                                                        ><?= $local->name ?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 mb-sm-2">
                                                <select name="hw_ward" class="form-control select2 ward_selected" id="ward_selected-5"  >
                                                    <option value="" selected>वडा नं</option>
                                                <?php
                                                    foreach($wards as $ward) {
                                                ?>
                                                        <option value="<?= $ward->id ?>"
                                                            <?php if(isset($result->hw_ward)&&$result->hw_ward == $ward->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            ?>
                                                        ><?= $ward->name ?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                    <div class="col-md-2 mb-sm-2">
                                        <input type="text" name="hw_tole" value="<?=isset($result)?$result->hw_tole:''?>" maxlength="64" class="form-control" placeholder="टोल" id="id_hw_tole" />
                                    </div>

                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h4>
                                संरक्षकको विवरण (Protector's Detail)
                            </h4>
                            <!--<div class="text-center">-->
                            <!--    <label for="father" style="font-size:17px;">बुवा</label>-->
                            <!--    <input type="radio" name="is_protector" id="father" value="father">-->
                            <!--    <label for="mother" style="font-size:17px;">आमा</label>-->
                            <!--    <input type="radio" name="is_protector" id="mother" value="mother">-->
                            <!--    <label for="husband" style="font-size:17px;">पति / पत्नी</label>-->
                            <!--    <input type="radio" name="is_protector" id="husband" value="husband">-->
                            <!--</div>-->

                            <hr style="border: 1px solid #adadad">
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">
                                          <span class="float-right">
                                                <strong>नाम</strong>
                                            <span class="text-danger">&nbsp;*</span>
                                          </span>
                                        </label>

                                            <div class="col-sm-8">
                                                <input type="text" name="protector_name" value="<?=isset($result)?$result->protector_name:''?>" maxlength="164" class="form-control" required id="id_protector_name" />
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">
                                            <span class="float-right">
                                                <strong>(In Nepali) </strong><span class="text-danger">&nbsp;*</span>
                                            </span>

                                </label>

                                    <div class="col-md-2 mb-sm-2">
                                                <select name="s_state" class="form-control select2 state_selected"   id="state_selected-6">
                                                    <option value="" selected>प्रदेश</option>

                                                    <?php foreach($states as $state):?>
                                                    <option value="<?=$state->id?>"
                                                            <?php
                                                            if(isset($result) && $result->s_state == $state->id)
                                                            {
                                                                echo 'selected = "selected"';
                                                            }
                                                            elseif($state->id==$default[0])
                                                            {
                                                                echo 'selected="selected"';
                                                            }
                                                          ?>
                                                            ><?=$state->name?></option>
                                                    <?php endforeach;?>
                                                  </select>
                                            </div>
                                            <div class="col-md-2 mb-sm-2">
                                              <select name="s_district" class="form-control select2 district_selected" id="district_selected-6"  >
                                                    <option value="" selected>जिल्ला</option>
                                                <?php
                                                    foreach($districts as $district) {
                                                ?>
                                                        <option value="<?= $district->id ?>"
                                                            <?php if(isset($result->s_district)&&$result->s_district == $district->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            elseif($district->name==$default[1])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>
                                                        ><?= $district->name ?></option>
                                                <?php
                                                    }
                                                 ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 mb-sm-2">
                                                <select name="s_local_body" class="form-control select2 local_body_selected" id="local_body_selected-6"  >
                                                    <option value="" selected>गा.पा./न.पा </option>
                                                <?php
                                                    foreach($locals as $local)
                                                    {
                                                ?>
                                                        <option value="<?= $local->id ?>"
                                                            <?php if(isset($result->s_local_body)&&$result->s_local_body == $local->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            elseif($local->name==$default[2])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>
                                                        ><?= $local->name ?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 mb-sm-2">
                                                <select name="s_ward" class="form-control select2 ward_selected" id="ward_selected-6"  >
                                                    <option value="" selected>वडा नं</option>
                                                <?php
                                                    foreach($wards as $ward) {
                                                ?>
                                                        <option value="<?= $ward->id ?>"
                                                            <?php if(isset($result->s_ward)&&$result->s_ward == $ward->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            elseif($ward->id==$default[3])
                                                            {
                                                                    echo 'selected="selected"';
                                                            }
                                                            ?>
                                                        ><?= $ward->name ?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                    <div class="col-md-2 mb-sm-2">
                                        <input type="text" name="p_tole" value="<?=isset($result)?$result->p_tole:''?>" maxlength="64" class="form-control" required placeholder="टोल" id="id_p_tole" />
                                    </div>

                            </div>
                        </div>
                    </div>

                    <hr class="mt-5 mb-4" style="border: 1px solid #adadad">

                <div class="row">
                    <div class="col-lg-10">


<div class="row">
    <div class="col-sm-2 text-right">
        <label>कागजातहरू <span class="text-danger">*</span> </label>
    </div>

    <div class="col-sm-10">
        <div class="mb-3 documents" id="doc_div_0">
                                       <input type="file" name="documents[]" id="documents_0" style="width:300px" />
                                        <select name="documents_type[]" id="documents_type_0">
                                           <option value="">प्रकार छान्नुहोस्</option>

                                           <?php foreach($documents as $doc):?>
                                               <option value="<?= $doc->id?>"><?= $doc->name ?></option>
                                           <?php endforeach;?>

                                       </select>
                                       <button type="button"
                                               class="float-right btn btn-danger delete-form doc_remove"
                                               id="documents_remove_0"><i
                                               class="fa fa-times"></i></button>
                                   </div>
                                   <div id="document_div"></div>

                                           <!-- This button will add a new form when clicked -->
                                   <button type="button" class="btn btn-success" data-formset-add><i
                                           id ="documents" class="fa fa-plus"></i></button>
                                           <?php
                                            if(isset($result) && !empty($result->documents))
                                            {

                                                echo "<br/><br/><div style='border-style: groove;'><h6>कागजातहरु</h6>";
                                                foreach($documents as $doc)
                                                {
                                                    echo "<a href='".$path.$doc."' target='_blank'>".$doc."</a><br/>";
                                                }
                                                echo " </div>";
                                            }
                                        ?>
    </div>

</div>

                    </div>
                </div><hr class="mt-5 mb-4">

                <div class="form-group row">
                    <div class="col-sm-6 offset-sm-6 mt-4">
                        <button type="submit" class='btn btn-block btn-submit btn-primary' name="submit">पेश
                            गर्नुहोस्
                        </button>
                    </div>
                </div>

                 <?php echo form_close();?>

        </div>
    </div>

    </section>
</div>
<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script>
function checkMyDate(date_selected, id_selected)
    {
      if(id_selected=="nepaliDate4")
      {
//        console.log(obj);
       var  nep_dob = date_selected;
//              alert(nep_dob);
                param = {};
                param.nep_dob = nep_dob;
                JQ.ajax({
                    url: "<?= base_url()?>getConvertedDate",
                    method: "POST",
                    data: param,
                    success: function (data) {
                        var obj = JSON.parse(data);
                        JQ("#id_eng_dob").val(obj.html);
                    },
                    error: function (error) {
                        console.log(JSON.stringify(error));
                    }
                });
            }
    }
</script>
    <script>

        var JQ = jQuery.noConflict();
        JQ(document).ready(function() {
             JQ(document).on("click", "#documents", function (){
                var  count = JQ(".documents").length;
                param = {};
                param.count = count;
                param.patra_id = <?= $patra_id?>;
                JQ.ajax({
                    url: "<?= base_url()?>getRoadDocumentHTML",
                    method: "POST",
                    data: param,
                    success: function (data) {
                        var obj = JSON.parse(data);
                        JQ("#document_div").append(obj.html);
                    },
                    error: function (error) {
                        console.log(JSON.stringify(error));
                    }
                });
            });
            JQ(document).on("click", ".doc_remove", function () {
                var id_selected     = JQ(this).attr("id");
                var res             = id_selected.split("_");
                var id              = res[res.length - 1];
                JQ("#doc_div_"+id).remove();
            });

            JQ(document).on('change','input[name=is_protector]',function(){
                var value = JQ(this).val();
                switch (value) {
                    case 'father':
                        var state = JQ("select[name=f_state] ").val();
                        var district = JQ("select[name=f_district]").val();
                        JQ("#id_protector_name").val(JQ("#id_father_name").val());
                        JQ("select[name=s_state]").select2('val',state);
                        JQ("select[name=s_district]").select2('val',district);
                        break;
                    default:

                }
            });

        });
    </script>
