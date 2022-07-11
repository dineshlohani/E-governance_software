<?php
    if($this->uri->segment(2)== "create")
    {
    $action_page = "citizenship-certificate-pratilipi/create";
    $name = "नवीनतम डाटा";
    }
    if($this->uri->segment(2)=="edit")
    {
    $action_page = "citizenship-certificate-pratilipi/edit/".($this->uri->segment(3));
    $name = "साच्याउनुहोस";
    }
//    echo $action_page;exit;
$path = base_url()."assets/documents/certificate/citcertificate_pratilipi/";
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
        <li class="breadcrumb-item"><a href="<?=  base_url()?>citizenship-certificate-pratilipi"> नागरिकता प्रमाणपत्रको
            प्रतिलिपि </a></li>
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
        <div class="alert alert-success alert-dismissible"> <a href="#" class="close" data-dismiss="alert"
            aria-label="close">&times;</a><span><?=$this->session->flashdata('msg');?></span></div>
        <?php } ?>
        <?php if(!empty($this->session->flashdata('err_msg')))
                {?>
        <div class="alert alert-danger alert-dismissible"> <a href="#" class="close" data-dismiss="alert"
            aria-label="close">&times;</a><span><?=$this->session->flashdata('err_msg');?></span></div>
        <?php } ?>
        <?php echo form_open_multipart($action_page)?>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label"><span class="float-right">आवेदन गरिएको मिति<span
                    class="text-danger">&nbsp;*</span></span></label>
              <div class="col-sm-6">
                <div class="input-group">
                  <input type="text" name="nepali_date" placeholder="YYYY-MM-DD"
                    value="<?php echo !empty($result) ? $result->nepali_date : DateEngToNep(date('Y-m-d'))?>"
                    class="form-control" required id="nepaliDate5" />
                  <div class="input-group-append">
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <hr class="">
        <div class="row mb-4">
          <label class="col-sm-2 col-form-label">
            <span class="float-right">
              <strong>ना.प्र.प. नं </strong>
              <span class="text-danger">&nbsp;*</span>
            </span>
          </label>
          <div class="col-sm-3">
            <input type="text" name="citizenship_no" value="<?=isset($result)?$result->citizenship_no:''?>"
              maxlength="32" class="form-control" id="id_citizenship_no" />
          </div>

          <label class="col-sm-2 col-form-label">
            <span class="float-right">
              <strong>जारी मिति</strong>
              <span class="text-danger">&nbsp;*</span>
            </span>
          </label>
          <div class="col-sm-3">
            <div class="input-group">
              <input type="text" name="citizenship_reg_date" placeholder="YYYY-MM-DD"
                value="<?=isset($result)?$result->citizenship_reg_date:''?>" class="form-control" id="nepaliDate4" />
              <div class="input-group-append">
              </div>
            </div>
          </div>
        </div>

        <div class="row mb-4">
          <label class="col-sm-2 col-form-label">
            <span class="float-right">
              <strong>ना.प्र.प. किसिम</strong>
              <span class="text-danger">&nbsp;*</span>
            </span>
          </label>
          <div class="col-sm-3">
            <select name="citizenship_type" class="form-control" id="id_citizenship_type">
              <option value="">छान्नुहोस्</option>

              <option value="1" <?php if(isset($result) && $result->citizenship_type==1){?>selected="selected"
                <?php } ?>>वंशज</option>
              <option value="2" <?php if(isset($result) && $result->citizenship_type==2){?>selected="selected"
                <?php } ?>>जन्म</option>

            </select>
          </div>

          <label class="col-sm-2 col-form-label">
            <span class="float-right">
              <strong>कारण </strong>
              <span class="text-danger">&nbsp;*</span>
            </span>
          </label>
          <div class="col-sm-3">
            <select name="citizenship_type_1" class="form-control" id="citizenship_type_1">
              <option value="">छान्नुहोस्</option>
              <option value="झुत्रो भएको"
                <?php if(!empty($result) && $result->citizenship_type_1 == 'झुत्रो भएको' ){ echo 'selected';}?>>
                झुत्रो भएको
              </option>
              <option value="हराएको"
                <?php if(!empty($result) && $result->citizenship_type_1 == 'हराएको' ){ echo 'selected';}?>>हराएको
              </option>
              <option value="नयाँ ढाँचाको आवश्येक भएको"
                <?php if(!empty($result) && $result->citizenship_type_1 == 'नयाँ ढाँचाको आवश्येक भएको' ){ echo 'selected';}?>>
                नयाँ
                ढाँचाको आवश्येक भएको</option>
              <option value="संसोधन गर्नुपर्ने"
                <?php if(!empty($result) && $result->citizenship_type_1 == 'संसोधन गर्नुपर्ने' ){ echo 'selected';}?>>
                संसोधन
                गर्नुपर्ने</option>
            </select>
          </div>

        </div>
        <hr>
        <div class="row mb-4">
          <div class="col-md-12 mb-3">
            <h4>व्यक्तिगत विवरण (Personal Detail) </h4>
            <hr style="border: 1px solid #adadad">
          </div>

          <label class="col-md-2 col-form-label">
            <span class="float-right">
              <strong>Name(In Nepali)</strong><span class="text-danger">&nbsp;*</span>
            </span>
          </label>
          <div class="col-md-3 mb-sm-2">
            <input type="text" name="nep_first_name" value="<?=(isset($result))? $result->nep_first_name:''?>"
              class="form-control" required placeholder="पहिलो नाम" id="id_nep_first_name" />
          </div>
          <div class="col-md-3 mb-sm-2">
            <input type="text" name="nep_middle_name" value="<?=(isset($result))? $result->nep_middle_name:''?>"
              maxlength="64" class="form-control" placeholder="बीचको नाम" id="id_nep_middle_name" />
          </div>
          <div class="col-md-3 mb-sm-2">
            <input type="text" name="nep_last_name" value="<?=(isset($result))? $result->nep_last_name:''?>"
              maxlength="64" class="form-control" required placeholder="थर" id="id_nep_last_name" />
          </div>
        </div>

        <div class="row mb-4">
          <label class="col-md-2 col-form-label">
            <span class="float-right">
              <Strong>Name(In English)</Strong>
              <span class="text-danger">&nbsp;*</span>
            </span>
          </label>
          <div class="col-md-3 mb-sm-2">
            <input type="text" name="eng_first_name" value="<?=(isset($result))? $result->eng_first_name:''?>"
              class="form-control" required placeholder="First Name" id="id_eng_first_name" />
          </div>
          <div class="col-md-3 mb-sm-2">
            <input type="text" name="eng_middle_name" value="<?=(isset($result))? $result->eng_middle_name:''?>"
              class="form-control" placeholder="Middle Name" id="id_eng_middle_name" />
          </div>
          <div class="col-md-3 mb-sm-2">
            <input type="text" name="eng_last_name" value="<?=(isset($result))? $result->eng_last_name:''?>"
              class="form-control" required placeholder="Last Name" id="id_eng_last_name" />
          </div>
        </div>


        <div class="row mb-4">
          <label class="col-sm-2 col-form-label">
            <span class="float-right">
              <strong>लिङ्ग (Gender)</strong>
              <span class="text-danger">&nbsp;*</span>
            </span>
          </label>
          <div class="col-sm-2">
            <select name="gender" class="form-control" required id="id_gender">
              <option value="" selected>छान्नुहोस्</option>
              <option value="Male" <?php if(isset($result) && $result->gender=="Male"){ echo 'selected="selected"';}?>>
                पुरुष
              </option>
              <option value="Female"
                <?php if(isset($result) && $result->gender=="Female"){ echo 'selected="selected"';}?>>
                महिला
              </option>

              <option value="Other"
                <?php if(isset($result) && $result->gender=="Other"){ echo 'selected="selected"';}?>>अन्य</option>

            </select>
          </div>

          <label class="col-sm-2 col-form-label">
            <span class="float-right">
              <strong>जन्म मिति (DOB)</strong>
              <span class="text-danger">&nbsp;*</span>
            </span>
          </label>
          <div class="col-sm-5">
            <div class="input-group mb-sm-2">
              <input type="text" name="nep_dob" placeholder="YYYY-MM-DD" value="<?=isset($result)?$result->nep_dob:''?>"
                maxlength="10" class="form-control nep_dob" required id="nepaliDate3" />
              <div class="input-group-append">
                <span class="input-group-text">B.S.</span>
              </div>
              <input type="text" name="eng_dob" placeholder="YYYY-MM-DD" readonly="true"
                value="<?=isset($result)?$result->eng_dob:''?>" class="form-control" required id="id_eng_dob" />
              <div class="input-group-append">
                <span class="input-group-text">A.D.</span>
              </div>
            </div>
          </div>
        </div>

        <div class="row mb-4">
          <!-- <div class="col-md-12 mb-3">
            <h4>
              जन्मस्थान (Place Of Birth)
            </h4>
            <hr style="border: 1px solid #adadad">
          </div> -->

          <label class="col-md-2 col-form-label">
            <span class="float-right">
              <strong>जन्मस्थान</strong><span class="text-danger">&nbsp;*</span>
            </span>
          </label>

          <div class="col-md-2 mb-sm-2">
            <select name="b_state" class="form-control select2 state_selected" required id="state_selected-1">
              <option value="" selected>प्रदेश</option>
              <?php foreach($states as $bstate):?>
              <option value="<?=$bstate->id?>" <?php
                                                            if(isset($result) && $result->b_state == $bstate->id)
                                                            {
                                                                echo 'selected = "selected"';
                                                            }
                                                            elseif($bstate->id==$default[0])
                                                            {
                                                                echo 'selected="selected"';
                                                            }
                                                          ?>><?=$bstate->name?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="col-md-2 mb-sm-2">
            <select name="b_district" class="form-control select2 district_selected" id="district_selected-1" required>
              <option value="" selected>जिल्ला</option>
              <?php
                                                    foreach($districts as $bdistrict) {
                                                ?>
              <option value="<?= $bdistrict->id ?>" <?php if(isset($result->p_district)&&$result->b_district == $bdistrict->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            elseif($bdistrict->name==$default[1])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>><?= $bdistrict->name ?></option>
              <?php
                                                    }
                                                 ?>
            </select>
          </div>
          <div class="col-md-3 mb-sm-2">
            <select name="b_local_body" class="form-control select2 local_body_selected" id="local_body_selected-1"
              required>
              <option value="" selected>गा.पा./न.पा </option>
              <?php
                                                    foreach($locals as $blocal)
                                                    {
                                                ?>
              <option value="<?= $blocal->id ?>" <?php if(isset($result->b_local_body)&&$result->b_local_body == $blocal->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            elseif($blocal->name==$default[2])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>><?= $blocal->name ?></option>
              <?php
                                                    }
                                                ?>
            </select>
          </div>
          <div class="col-md-2 mb-sm-2">
            <select name="b_ward" class="form-control select2 ward_selected" id="ward_selected-1" required>
              <option value="" selected>वडा</option>
              <?php
                                                    foreach($wards as $bw) {
                                                ?>
              <option value="<?= $bw->id ?>" <?php if(isset($result->b_ward) && $result->b_ward == $bw->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }elseif($bw->name==$default[3])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>><?= $bw->name ?></option>
              <?php } ?>
            </select>
          </div>

        </div>
        <div class="row mb-4">
          <label class="col-sm-2 col-form-label">
            <span class="float-right">
              <strong>टोल</strong>
              <span class="text-danger">&nbsp;*</span>
            </span>
          </label>

          <div class="col-sm-9">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">In Nepali</span>
              </div>
              <input type="text" name="nep_bp_tole" value="<?=isset($result)?$result->nep_bp_tole:''?>" maxlength="64"
                class="form-control" id="id_nep_bp_tole" placeholder="टोल" />
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">In English</span>
              </div>
              <input type="text" name="eng_bp_tole" value="<?=isset($result)?$result->eng_bp_tole:''?>" maxlength="64"
                class="form-control" id="id_eng_bp_tole" placeholder="Tole" />
            </div>
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-md-12">
            <h4>
              नेपाल भन्दा बाहिर जन्मिएको भए (Born Outside Of Nepal)
            </h4>
            <hr style="border: 1px solid #adadad">
          </div>

          <label class="col-sm-2 col-form-label">
            <span class="float-right">
              <strong>देशको नाम( नेपालीमा )</strong>
              <span class="text-danger">&nbsp;*</span>
            </span>
          </label>

          <div class="col-sm-4">
            <input type="text" name="country_name" placeholder="देशको नाम"
              value="<?=isset($result)?$result->country_name:''?>" maxlength="164" class="form-control"
              id="id_country_name" />
          </div>

          <label class="col-sm-2 col-form-label">
            <span class="float-right">
              <strong>ठेगाना</strong>
              <span class="text-danger">&nbsp;*</span>
            </span>
          </label>

          <div class="col-sm-4">
            <input type="text" name="country_address" placeholder="पुरा ठेगाना"
              value="<?=isset($result)?$result->country_address:''?>" maxlength="164" class="form-control"
              id="id_country_address" />
          </div>


          <label class="col-sm-2 col-form-label">
            <span class="float-right">
              <strong>देशको नाम(In English)</strong>
              <span class="text-danger">&nbsp;*</span>
            </span>
          </label>

          <div class="col-sm-4">
            <input type="text" name="country_name_eng" placeholder="Country Name"
              value="<?=isset($result)?$result->country_name_eng:''?>" maxlength="164" class="form-control"
              id="id_country_name_eng" />
          </div>

          <label class="col-sm-2 col-form-label">
            <span class="float-right">
              <strong>Address</strong>
              <span class="text-danger">&nbsp;*</span>
            </span>
          </label>

          <div class="col-sm-4">
            <input type="text" name="country_address_eng" placeholder="Full Address"
              value="<?=isset($result)?$result->country_address_eng:''?>" maxlength="164" class="form-control"
              id="id_country_address_eng" />
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-md-12">
            <h4>
              स्थाई ठेगाना (Parmanent Address)
            </h4>
            <hr style="border: 1px solid #adadad">
          </div>
          <label class="col-sm-1 col-form-label">
            <span class="">
              <strong>ठेगाना</strong>
              <span class="text-danger">&nbsp;*</span>
            </span>
          </label>
          <div class="col-md-3 mb-sm-2">
            <select name="p_state" class="form-control select2 state_selected" required id="state_selected-2">
              <option value="" selected>प्रदेश</option>

              <?php foreach($states as $pstate):?>
              <option value="<?=$pstate->id?>" <?php
                                                            if(isset($result) && $result->p_state == $pstate->id)
                                                            {
                                                                echo 'selected = "selected"';
                                                            }
                                                            elseif($pstate->id==$default[0])
                                                            {
                                                                echo 'selected="selected"';
                                                            }
                                                          ?>><?=$pstate->name?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="col-md-3 mb-sm-2">
            <select name="p_district" class="form-control select2 district_selected" id="district_selected-2" required>
              <option value="" selected>जिल्ला</option>
              <?php
                                                    foreach($districts as $pdistrict) {
                                                ?>
              <option value="<?= $pdistrict->id ?>" <?php if(isset($result->p_district)&&$result->p_district == $pdistrict->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            elseif($pdistrict->name==$default[1])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>><?= $pdistrict->name ?></option>
              <?php
                                                    }
                                                 ?>
            </select>
          </div>
          <div class="col-md-3 mb-sm-2">
            <select name="p_local_body" class="form-control select2 local_body_selected" id="local_body_selected-2"
              required>
              <option value="" selected>गा.पा./न.पा </option>
              <?php
                                                    foreach($locals as $plocal)
                                                    {
                                                ?>
              <option value="<?= $plocal->id ?>" <?php if(isset($result->p_local_body)&&$result->p_local_body == $plocal->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            elseif($plocal->name==$default[2])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>><?= $plocal->name ?></option>
              <?php
                                                    }
                                                ?>
            </select>
          </div>
          <div class="col-md-2 mb-sm-2">
            <select name="p_ward" class="form-control select2 ward_selected" id="ward_selected-2" required>
              <option value="" selected>वडा नं</option>
              <?php
                                                    foreach($wards as $pward) {
                                                ?>
              <option value="<?= $pward->id ?>" <?php if(isset($result->p_ward)&&$result->p_ward == $pward->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }elseif($pward->id==$default[3])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>><?= $pward->name ?></option>
              <?php
                                                    }
                                                ?>
            </select>
          </div>
        </div>
        <div class="row mb-4">
          <label class="col-sm-2 col-form-label">
            <span class="float-right">
              <strong>टोल</strong>
              <span class="text-danger">&nbsp;*</span>
            </span>
          </label>

          <div class="col-sm-9">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">In Nepali</span>
              </div>
              <input type="text" name="nep_bp_tole" value="<?=isset($result)?$result->nep_bp_tole:''?>" maxlength="64"
                class="form-control" id="id_nep_bp_tole" placeholder="टोल" />
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">In English</span>
              </div>
              <input type="text" name="eng_bp_tole" value="<?=isset($result)?$result->eng_bp_tole:''?>" maxlength="64"
                class="form-control" id="id_eng_bp_tole" placeholder="Tole" />
            </div>
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-md-12">
            <h4>
              बुबाको विवरण (Father's Detail) / <input type="checkbox" id="f_check" style="color:red" />
            </h4>
            <hr style="border: 1px solid #adadad">
          </div>

          <label class="col-sm-2 col-form-label">
            <span class="">
              <strong>नाम थर</strong>
              <span class="text-danger">&nbsp;*</span>
            </span>
          </label>

          <div class="col-sm-4">
            <input type="text" name="father_name" value="<?=isset($result)?$result->father_name:''?>" maxlength="164"
              class="form-control" id="id_father_name" />
          </div>
          <label class="col-sm-2 col-form-label">
            <span class="">
              <strong>नागरिकता नं.</strong>
              <span class="text-danger">&nbsp;*</span>
            </span>
          </label>

          <div class="col-sm-4">
            <div class="input-group mb-sm-2 ">
              <input type="text" name="f_citizenship_no" value="<?=isset($result)?$result->f_citizenship_no:''?>"
                maxlength="64" class="form-control" id="id_f_citizenship_no" />
            </div>
          </div>

        </div>
        <div class="row mb-4">
          <label class="col-md-1 col-form-label">
            <span class="float-right">
              <strong>ठेगाना</strong><span class="text-danger">&nbsp;*</span>
            </span>
          </label>
          <div class="col-md-2 mb-sm-2">
            <select name="f_state" class="form-control select2 state_selected" id="state_selected-3">
              <option value="" selected>प्रदेश</option>

              <?php foreach($states as $fstate):?>
              <option value="<?=$fstate->id?>" <?php
                                                            if(isset($result) && $result->f_state == $fstate->id)
                                                            {
                                                                echo 'selected = "selected"';
                                                            }
                                                            elseif($fstate->id==$default[0])
                                                            {
                                                                echo 'selected="selected"';
                                                            }
                                                          ?>><?=$fstate->name?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="col-md-2 mb-sm-2">
            <select name="f_district" class="form-control select2 district_selected" id="district_selected-3">
              <option value="" selected>जिल्ला</option>
              <?php
                                                    foreach($districts as $fdistrict) {
                                                ?>
              <option value="<?= $fdistrict->id ?>" <?php if(isset($result->f_district)&&$result->f_district == $fdistrict->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            elseif($fdistrict->name==$default[1])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>><?= $fdistrict->name ?></option>
              <?php
                                                    }
                                                 ?>
            </select>
          </div>
          <div class="col-md-3 mb-sm-2">
            <select name="f_local_body" class="form-control select2 local_body_selected" id="local_body_selected-3">
              <option value="" selected>गा.पा./न.पा </option>
              <?php
                                                    foreach($locals as $flocal)
                                                    {
                                                ?>
              <option value="<?= $flocal->id ?>" <?php if(isset($result->f_local_body)&&$result->f_local_body == $flocal->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }elseif($flocal->name==$default[2])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>><?= $flocal->name ?></option>
              <?php
                                                    }
                                                ?>
            </select>
          </div>
          <div class="col-md-1 mb-sm-2">
            <select name="f_ward" class="form-control select2 ward_selected" id="ward_selected-3">
              <option value="" selected>वडा</option>
              <?php
                                                    foreach($wards as $fward) {
                                                ?>
              <option value="<?= $fward->id ?>" <?php if(isset($result->f_ward)&&$result->f_ward == $fward->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }elseif($fward->id==$default[3])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>><?= $fward->name ?></option>
              <?php
                                                    }
                                                ?>
            </select>
          </div>
          <div class="col-md-3 mb-sm-2">
            <input type="text" name="f_tole" value="<?=isset($result)?$result->f_tole:''?>" maxlength="64"
              class="form-control" placeholder="टोल" id="id_f_tole" />
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-md-12">
            <h4>
              आमाको विवरण (Mother's Detail) / <input type="checkbox" id="m_check" style="color:red" />
            </h4>
            <hr style="border: 1px solid #adadad">
          </div>

          <label class="col-sm-2 col-form-label">
            <span class="">
              <strong>नाम थर</strong>
              <span class="text-danger">&nbsp;*</span>
            </span>
          </label>

          <div class="col-sm-4">
            <input type="text" name="mother_name" value="<?=isset($result)?$result->mother_name:''?>" maxlength="164"
              class="form-control" id="id_mother_name" />
          </div>
          <label class="col-sm-2 col-form-label">
            <span class="">
              <strong>नागरिकता नं.</strong>
              <span class="text-danger">&nbsp;*</span>
            </span>
          </label>

          <div class="col-sm-4">
            <div class="input-group mb-sm-2 ">
              <input type="text" name="m_citizenship_no" value="<?=isset($result)?$result->m_citizenship_no:''?>"
                maxlength="64" class="form-control" id="id_m_citizenship_no" />
            </div>
          </div>

        </div>
        <div class="row mb-4">
          <label class="col-md-1 col-form-label">
            <span class="float-right">
              <strong>ठेगाना</strong><span class="text-danger">&nbsp;*</span>
            </span>
          </label>
          <div class="col-md-2 mb-sm-2">
            <select name="m_state" class="form-control select2 state_selected" id="state_selected-4">
              <option value="" selected>प्रदेश</option>

              <?php foreach($states as $fstate):?>
              <option value="<?=$fstate->id?>" <?php
                                                            if(isset($result) && $result->f_state == $fstate->id)
                                                            {
                                                                echo 'selected = "selected"';
                                                            }
                                                            elseif($fstate->id==$default[0])
                                                            {
                                                                echo 'selected="selected"';
                                                            }
                                                          ?>><?=$fstate->name?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="col-md-2 mb-sm-2">
            <select name="m_district" class="form-control select2 district_selected" id="district_selected-4">
              <option value="" selected>जिल्ला</option>
              <?php
                                                    foreach($districts as $fdistrict) {
                                                ?>
              <option value="<?= $fdistrict->id ?>" <?php if(isset($result->f_district)&&$result->f_district == $fdistrict->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            elseif($fdistrict->name==$default[1])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>><?= $fdistrict->name ?></option>
              <?php
                                                    }
                                                 ?>
            </select>
          </div>
          <div class="col-md-3 mb-sm-2">
            <select name="m_local_body" class="form-control select2 local_body_selected" id="local_body_selected-4">
              <option value="" selected>गा.पा./न.पा </option>
              <?php
                                                    foreach($locals as $flocal)
                                                    {
                                                ?>
              <option value="<?= $flocal->id ?>" <?php if(isset($result->f_local_body)&&$result->f_local_body == $flocal->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }elseif($flocal->name==$default[2])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>><?= $flocal->name ?></option>
              <?php
                                                    }
                                                ?>
            </select>
          </div>
          <div class="col-md-1 mb-sm-2">
            <select name="m_ward" class="form-control select2 ward_selected" id="ward_selected-4">
              <option value="" selected>वडा</option>
              <?php
                                                    foreach($wards as $mward) {
                                                ?>
              <option value="<?= $mward->id ?>" <?php if(isset($result->m_ward)&&$result->m_ward == $mward->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }elseif($mward->id==$default[3])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>><?= $mward->name ?></option>
              <?php
                                                    }
                                                ?>
            </select>
          </div>
          <div class="col-md-3 mb-sm-2">
            <input type="text" name="m_tole" value="<?=isset($result)?$result->m_tole:''?>" maxlength="64"
              class="form-control" placeholder="टोल" id="id_m_tole" />
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
                      <span class="text-danger">&nbsp;*</span>
                    </span>
                  </label>

                  <div class="col-sm-8">
                    <input type="text" name="husband_wife_name"
                      value="<?=isset($result)?$result->husband_wife_name:''?>" maxlength="164" class="form-control"
                      id="id_husband_wife_name" />
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

                      <input type="text" name="hw_citizenship_no"
                        value="<?=isset($result)?$result->hw_citizenship_no:''?>" maxlength="64" class="form-control"
                        id="id_hw_citizenship_no" />
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
                  <strong>ठेगाना </strong><span class="text-danger">&nbsp;*</span>
                </span>

              </label>

              <div class="col-md-2 mb-sm-2">
                <select name="hw_state" class="form-control select2 state_selected" id="state_selected-5">
                  <option value="" selected>प्रदेश</option>

                  <?php foreach($states as $hwstate):?>
                  <option value="<?=$hwstate->id?>" <?php
                                                            if(isset($result) && $result->s_state == $hwstate->id)
                                                            {
                                                                echo 'selected = "selected"';
                                                            }
                                                            elseif($hwstate->id==$default[0])
                                                            {
                                                                echo 'selected="selected"';
                                                            }
                                                          ?>><?=$hwstate->name?></option>
                  <?php endforeach;?>
                </select>
              </div>
              <div class="col-md-2 mb-sm-2">
                <select name="hw_district" class="form-control select2 district_selected" id="district_selected-5">
                  <option value="" selected>जिल्ला</option>
                  <?php
                                                    foreach($districts as $hwdistrict) {
                                                ?>
                  <option value="<?= $hwdistrict->id ?>" <?php if(isset($result->s_district)&&$result->s_district == $hwdistrict->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            elseif($hwdistrict->name==$default[1])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>><?= $hwdistrict->name ?></option>
                  <?php
                                                    }
                                                 ?>
                </select>
              </div>
              <div class="col-md-3 mb-sm-2">
                <select name="hw_local_body" class="form-control select2 local_body_selected"
                  id="local_body_selected-5">
                  <option value="" selected>गा.पा./न.पा </option>
                  <?php
                                                    foreach($locals as $hwlocal)
                                                    {
                                                ?>
                  <option value="<?= $hwlocal->id ?>" <?php if(isset($result->s_local_body)&&$result->s_local_body == $hwlocal->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }elseif($hwlocal->name==$default[2])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>><?= $hwlocal->name ?></option>
                  <?php
                                                    }
                                                ?>
                </select>
              </div>
              <div class="col-md-1 mb-sm-2">
                <select name="hw_ward" class="form-control select2 ward_selected" id="ward_selected-5">
                  <option value="" selected>वडा</option>
                  <?php
                                                    foreach($wards as $hwward) {
                                                ?>
                  <option value="<?= $hwward->id ?>" <?php if(isset($result->p_ward)&&$result->p_ward == $hwward->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }elseif($hwward->id==$default[3])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>><?= $hwward->name ?></option>
                  <?php
                                                    }
                                                ?>
                </select>
              </div>
              <div class="col-md-2 mb-sm-2">
                <input type="text" name="hw_tole" value="<?=isset($result)?$result->hw_tole:''?>" maxlength="64"
                  class="form-control" placeholder="टोल" id="id_hw_tole" />
              </div>

            </div>
          </div>
        </div>

        <div class="row mt-4">
          <div class="col-md-12">
            <h4>
              संरक्षकको विवरण (Protector's Detail)
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
                      <span class="text-danger">&nbsp;*</span>
                    </span>
                  </label>

                  <div class="col-sm-8">
                    <input type="text" name="protector_name" value="<?=isset($result)?$result->protector_name:''?>"
                      maxlength="164" class="form-control" required id="id_protector_name" />
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group row">
              <label class="col-md-2 col-form-label">
                <span class="float-right">
                  <strong>ठेगाना</strong><span class="text-danger">&nbsp;*</span>
                </span>

              </label>

              <div class="col-md-2 mb-sm-2">
                <select name="s_state" class="form-control select2 state_selected" id="state_selected-6">
                  <option value="" selected>प्रदेश</option>

                  <?php foreach($states as $sstate):?>
                  <option value="<?=$sstate->id?>" <?php
                                                            if(isset($result) && $result->s_state == $sstate->id)
                                                            {
                                                                echo 'selected = "selected"';
                                                            }
                                                            elseif($sstate->id==$default[0])
                                                            {
                                                                echo 'selected="selected"';
                                                            }
                                                          ?>><?=$sstate->name?></option>
                  <?php endforeach;?>
                </select>
              </div>
              <div class="col-md-2 mb-sm-2">
                <select name="s_district" class="form-control select2 district_selected" id="district_selected-6">
                  <option value="" selected>जिल्ला</option>
                  <?php
                                                    foreach($districts as $sdistrict) {
                                                ?>
                  <option value="<?= $sdistrict->id ?>" <?php if(isset($result->s_district)&&$result->s_district == $sdistrict->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }
                                                            elseif($sdistrict->name==$default[1])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>><?= $sdistrict->name ?></option>
                  <?php
                                                    }
                                                 ?>
                </select>
              </div>
              <div class="col-md-3 mb-sm-2">
                <select name="s_local_body" class="form-control select2 local_body_selected" id="local_body_selected-6">
                  <option value="" selected>गा.पा./न.पा </option>
                  <?php
                                                    foreach($locals as $slocal)
                                                    {
                                                ?>
                  <option value="<?= $slocal->id ?>" <?php if(isset($result->s_local_body)&&$result->s_local_body == $slocal->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }elseif($slocal->name==$default[2])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>><?= $slocal->name ?></option>
                  <?php
                                                    }
                                                ?>
                </select>
              </div>
              <div class="col-md-1 mb-sm-2">
                <select name="s_ward" class="form-control select2 ward_selected" id="ward_selected-6">
                  <option value="" selected>वडा</option>
                  <?php
                                                    foreach($wards as $sward) {
                                                ?>
                  <option value="<?= $sward->id ?>" <?php if(isset($result->s_ward)&&$result->s_ward == $sward->id)
                                                            {
                                                                echo "selected='selected'";
                                                            }elseif($sward->id==$default[3])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                            ?>><?= $sward->name ?></option>
                  <?php
                                                    }
                                                ?>
                </select>
              </div>
              <div class="col-md-2 mb-sm-2">
                <input type="text" name="p_tole" value="<?=isset($result)?$result->p_tole:''?>" maxlength="64"
                  class="form-control" required placeholder="टोल" id="id_p_tole" />
              </div>

            </div>
          </div>
        </div>
        <hr class="mt-5 mb-4" style="border: 1px solid #adadad">

        <div class="row">
          <div class="col-lg-5">
            <div class="row">
              <div class="col-sm-12">
                <h5>संलग्न प्रमाणहरु :-</h5>
                <ul>
                  <li>नाता ........................ को ना.प्र.प. प्रतिलिपि</li>
                  <li>सनाखत गर्ने प्रतिलिपि</li>
                  <li>शैशिक योग्यता प्र.प. / जन्म दर्ता प्र.प. प्रतिलिपि</li>
                  <li>मतदाता नामावली प्र.पत्र / पारिवारिक लागतको प्र.प. प्रतिलिपि</li>
                  <li>बिबाह दर्ता प्र.प. / बसाई सराई दर्ता प्र.प. प्रतिलिपि</li>
                  <li>घर जग्गा कर, व्यवसायी प्रमाण पत्र प्रतिलिपि</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-7" style="border-left: 2px solid #d4d4d4">
            <div class="row">
              <div class="col-sm-3 text-right">
                <label>कागजातहरू <span class="text-danger">*</span> </label>
              </div>

              <div class="col-sm-9">
                <div class="mb-3 documents" id="doc_div_0">
                  <input type="file" name="documents[]" id="documents_0" style="width:300px" />
                  <select name="documents_type[]" id="documents_type_0">
                    <option value="">प्रकार छान्नुहोस्</option>
                    <?php foreach($documents as $doc):?> <option value="<?= $doc->id?>"><?= $doc->name ?></option>
                    <?php endforeach;?>

                  </select>
                  <button type="button" class="float-right btn btn-danger delete-form doc_remove"
                    id="documents_remove_0"><i class="fa fa-times"></i></button>
                </div>
                <div id="document_div"></div>

                <!-- This button will add a new form when clicked -->
                <button type="button" class="btn btn-success" data-formset-add><i id="documents"
                    class="fa fa-plus"></i></button>
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
        </div>
        <hr class="mt-5 mb-4">

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
function checkMyDate(date_selected, id_selected) {
  if (id_selected == "nepaliDate3") {
    //        console.log(obj);
    var nep_dob = date_selected;
    //        console.log(obj);
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
<script>
var JQ = jQuery.noConflict();
JQ(document).ready(function() {
  JQ(document).on("click", "#documents", function() {
    var count = JQ(".documents").length;
    param = {};
    param.count = count;
    param.patra_id = <?= $patra_id?>;
    JQ.ajax({
      url: "<?= base_url()?>getRoadDocumentHTML",
      method: "POST",
      data: param,
      success: function(data) {
        var obj = JSON.parse(data);
        JQ("#document_div").append(obj.html);
      },
      error: function(error) {
        console.log(JSON.stringify(error));
      }
    });
  });
  JQ(document).on("click", ".doc_remove", function() {
    var id_selected = JQ(this).attr("id");
    var res = id_selected.split("_");
    var id = res[res.length - 1];
    JQ("#doc_div_" + id).remove();
  });

  JQ(document).on("input", "#id_nep_bp_tole,#id_eng_bp_tole", function() {
    var nep_tol = JQ("#id_nep_bp_tole").val();
    var eng_tol = JQ("#id_eng_bp_tole").val();

    JQ("#id_nep_tole").val(nep_tol);
    JQ("#id_eng_tole").val(eng_tol);
    JQ("#id_f_tole").val(nep_tol);
    JQ("#id_m_tole").val(nep_tol);
    JQ("#id_hw_tole").val(nep_tol);
    JQ("#id_p_tole").val(nep_tol);
    //alert("date"); 
  });
  JQ(document).on("click", "#f_check", function() {
    var f_name = JQ("#id_father_name").val();
    JQ("#id_protector_name").val(f_name);
  });
  JQ(document).on("click", "#m_check", function() {
    var m_name = JQ("#id_mother_name").val();
    JQ("#id_protector_name").val(m_name);
  });
});
</script>