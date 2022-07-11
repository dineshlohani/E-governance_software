<?php
if($this->uri->segment(2)== "create")
{
    $action_page = "citizenship-sifaris/create";
}
if($this->uri->segment(2)=="edit")
{
    $action_page = "citizenship-sifaris/edit/".$this->uri->segment(3);
}
if(!empty($result->documents))
{
    $documents      = explode("+",$result->documents);

}
$path           = base_url()."assets/documents/certificate/citizenship_sifaris/";
?>
<section class="content ">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
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
  <div class="container-fluid ">
    <nav aria-label="breadcrumb" class="bg-shadow">
      <ol class="breadcrumb px-3 py-2">
        <li class="breadcrumb-item ml-1"><a href="<?= base_url()?>dashboard">गृह</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url()?>citizenship-sifaris/">नागरिकता सिफारिस</a></li>
        <li class="breadcrumb-item active">नयाँ</li>
      </ol>
    </nav>
  </div>
  <div class="container-fluid ">
    <div class="card">
      <?php echo form_open_multipart($action_page);?>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label"><span class="float-right">आवेदन गरिएको मिति<span
                    class="text-danger">&nbsp;*</span></span></label>
              <div class="col-sm-8">
                <div class="input-group">
                  <input type="text" name="nepali_date" class="form-control" required id="nepaliDate5"
                    placeholder="YYYY-MM-DD" value="<?= isset($result) ? $result->nepali_date : ''?>" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 mb-3">
            <hr style="border: 1px solid #adadad">
          </div>
        </div>

        <div class="row mb-4">
          <label class="col-md-2 col-form-label">
            <span class="">
              निवेदकको नाम<span class="text-danger">&nbsp;*</span>
            </span>
          </label>
          <div class="col-md-2">
            <select name="gender_spec" class="form-control" id="gender_spec" required>
              <option value="1" <?php if(isset($result)){ if($result->gender_spec == 1){ echo 'selected';}}?>>
                श्री
              </option>
              <option value="2" <?php if(isset($result)){ if($result->gender_spec == 2){ echo 'selected';}}?>>
                सुश्री
              </option>
              <option value="3" <?php if(isset($result)){ if($result->gender_spec == 3){ echo 'selected';}}?>>
                श्रीमती
              </option>
            </select>
          </div>
          <div class="col-md-3">
            <input type="text" name="applicant_name" maxlength="100" class="form-control" required
              id="id_applicant_name" value="<?= isset($result) ? $result->applicant_name : ''?>" />
          </div>
          <label class="col-md-2 col-form-label">
            <span class="">
              निवेदकको बाबुको नाम<span class="text-danger">&nbsp;*</span>
            </span>
            <span class="float-right"></span>
          </label>
          <div class="col-sm-3">
            <input type="text" name="applicant_f_name" class="form-control" required id="applicant_f_name"
              value="<?= isset($result) ? $result->applicant_f_name : ''?>" />
          </div>
        </div>
        <div class="col-md-12"></div>
        <div class="row mb-4">
          <label class="col-md-2 col-form-label">
            <span class="">
              निवेदकको जन्मस्थान<span class="text-danger">&nbsp;*</span>
            </span>
          </label>
          <div class="col-md-2">
            <select name="br_state" class="form-control select2 state_selected" required id="state_selected-1">
              <option value="" selected>प्रदेश</option>
              <?php foreach($states as $state) : ?>
              <option value="<?= $state->id ?>" <?php
                                            if(isset($result)&& $result->state == $state->id)
                                            {
                                                echo 'selected="selected"';
                                            }
                                            elseif($state->id==$default[0])
                                            {
                                                echo 'selected="selected"';
                                            }
                                            ?>><?= $state->name?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="col-md-3">
            <select name="br_district" class="form-control select2 district_selected" required id="district_selected-1">
              <option value="" selected>जिल्ला</option>
              <?php foreach($districts as $district) : ?>
              <option value="<?= $district->id ?>" <?php
                                            if(isset($result)&& $result->district == $district->id)
                                            {
                                                echo 'selected="selected"';
                                            }
                                            elseif($district->name==$default[1])
                                            {
                                                echo 'selected="selected"';
                                            }
                                            ?>><?= $district->name?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="col-sm-3">
            <select name="br_local_body" class="form-control select2 local_body_selected" required
              id="local_body_selected-1">
              <option value="">गा.पा /न.पा </option>
              <?php foreach($locals as $local) : ?>
              <option value="<?= $local->id ?>" <?php
                                            if(isset($result)&& $result->br_local_body == $local->id)
                                            {
                                                echo 'selected="selected"';
                                            }
                                            else {
                                              if($local->name==$default[2])
                                              {
                                                  echo 'selected="selected"';
                                              }
                                            }
                                            
                                            
                                            ?>><?= $local->name?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="col-sm-2">
            <select name="br_ward" class="form-control select2 ward_selected" required id="ward_selected-1">
              <option value="">वडा नं</option>
              <?php foreach($wards as $ward) : ?>
              <option value="<?= $ward->id ?>" <?php if(isset($result)&& $result->br_ward == $ward->id)
                {
                echo 'selected="selected"';
                }
                elseif($state->id==$default[0])
                {
                echo 'selected="selected"';
                }
                ?>><?= $ward->name?>
              </option>
              <?php endforeach;?>
            </select>
          </div>
        </div>

        <div class="row mb-4">
          <label class="col-md-2 col-form-label">
            <span class="">
              निवेदकको ठेगाना<span class="text-danger">&nbsp;*</span>
            </span>
          </label>
          <div class="col-md-2">
            <select name="app_state" class="form-control select2 state_selected" required id="state_selected-2">
              <option value="" selected>प्रदेश</option>
              <?php foreach($states as $state) : ?>
              <option value="<?= $state->id ?>" <?php
                                            if(isset($result)&& $result->app_state == $state->id)
                                            {
                                                echo 'selected="selected"';
                                            }
                                            elseif($state->id==$default[0])
                                            {
                                                echo 'selected="selected"';
                                            }
                                            ?>><?= $state->name?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="col-md-3">
            <select name="app_district" class="form-control select2 district_selected" required
              id="district_selected-2">
              <option value="" selected>जिल्ला</option>
              <?php foreach($districts as $district) : ?>
              <option value="<?= $district->id ?>" <?php
                                            if(isset($result)&& $result->app_district == $district->id)
                                            {
                                                echo 'selected="selected"';
                                            }
                                            elseif($district->name==$default[1])
                                            {
                                                echo 'selected="selected"';
                                            }
                                            ?>><?= $district->name?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="col-sm-3">
            <select name="app_local_body" class="form-control select2 local_body_selected" required
              id="local_body_selected-2">
              <option value="" selected>गा.पा./न.पा </option>
              <?php foreach($locals as $local) : ?>
              <option value="<?= $local->id ?>" <?php
                                            if(isset($result)&& $result->app_local_body == $local->id)
                                            {
                                                echo 'selected="selected"';
                                            }
                                            elseif($local->name==$default[2])
                                            {
                                                echo 'selected="selected"';
                                            }
                                            ?>><?= $local->name?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="col-sm-2">
            <select name="app_ward" class="form-control select2 ward_selected" required id="ward_selected-2">
              <option value="">वडा नं</option>
              <?php foreach($wards as $w) : ?>
              <option value="<?= $ward->id ?>" <?php
                                           if(isset($result)&& $result->app_ward == $w->id)
                                            {
                                                echo 'selected="selected"';
                                            }
                                            elseif($w->id==$default[3])
                                            {
                                                echo 'selected="selected"';
                                            }
                                            ?>><?= $w->name?></option>
              <?php endforeach;?>
            </select>
          </div>

        </div>

        <div class="row mb-4">
          <label class="col-md-2 col-form-label">
            <span class="">
              जन्ममिति<span class="text-danger">&nbsp;*</span>
            </span>
          </label>
          <div class="col-md-4">
            <input type="hidden" id="curr_date"
              value="<?= isset($result) ? $result->nepali_date : DateEngToNep(date('Y-m-d'))?>">
            <input type="text" name="janmamiti" id="janmamiti" value="<?= isset($result) ? $result->janmamiti : ''?>"
              placeholder="YYYY-MM-DD" maxlength="10" class="form-control janmamiti" required id="nepaliDate4" />
          </div>
          <label class="col-md-1 col-form-label">
            <span class="">
              उमेर<span class="text-danger">&nbsp;*</span>
            </span>
          </label>
          <div class="col-md-4">
            <input type="text" name="age" maxlength="128" class="form-control" required id="id_age"
              value="<?= isset($result) ? $result->age : ''?>" />
          </div>

        </div>

        <div class=" col-md-12 mb-3">
          <hr style="border: 1px solid #adadad">
        </div>
        <div class="row">
          <div class="col-md-12">
            <div style="margin-left:3px"><input type="checkbox" id="aama"> <b>विवाहितको हकमा</b></div>
            <div class="alert alert-info">
              यदी विवाहितको हकमा भए टिक लगाउने
            </div>
          </div>
        </div>

        <div class="married">

          <div class=" col-md-12 mb-3">
            <hr style="border: 1px solid #adadad">
          </div>

          <div class="row mb-4">
            <label class="col-md-2">
              <span> श्रीमानको नाम
              </span>
            </label>
            <div class="col-sm-4">
              <input type="text" name="name" class="form-control" id="id_name"
                value="<?= isset($result) ? $result->name : ''?>" />
            </div>
            <label class="col-md-2 col-form-label">
              <span class="float-right">
                ससुराको नाम
              </span>
            </label>
            <div class="col-sm-4">
              <input type="text" name="sasura_name" maxlength="128" class="form-control" id="sasura_name"
                value="<?= isset($result) ? $result->sasura_name : ''?>" />
            </div>

          </div>

          <div class="row mb-4">
            <label class="col-md-2 col-form-label">
              <span class="">
                बिबाह भएको मिति
              </span>
            </label>
            <div class="col-sm-4">
              <div class="input-group">
                <input type="text" name="mr_nepali_date" maxlength="10" class="form-control" id="nepaliDate4"
                  placeholder="YYYY-MM-DD" value="<?= isset($result) ? $result->mr_nepali_date : ''?>" />
              </div>
            </div>

            <label class="col-md-2 col-form-label">
              <span class="float-right">
                बिबाह किसिम
              </span>
            </label>
            <div class="col-md-4">
              <select name="marriage_type" class="form-control">
                <option>---छान्नुहोस्---</option>
                <option value="1" <?php if(isset($result)&& $result->marriage_type == 1)
                      {
                      echo 'selected="selected"';
                      } ?>>सामाजिक परम्परा</option>
                <option value="2" <?php if(isset($result)&& $result->marriage_type == 2)
                      {
                      echo 'selected="selected"';
                      } ?>>कानुनि विबाह</option>
                <option value="3" <?php if(isset($result)&& $result->marriage_type == 3)
                      {
                      echo 'selected="selected"';
                      } ?>>प्रेम/भागि विबाह</option>
              </select>
            </div>
          </div>

          <div class="row mb-4">
            <label class="col-md-2">
              <span class="">
                नागरिकता नं
              </span>
            </label>
            <div class="col-sm-4">
              <div class="input-group">
                <input type="text" name="cit_no_1" maxlength="128" class="form-control" id="cit_no_1"
                  value="<?= isset($result) ? $result->cit_no_1 : ''?>" />
              </div>
            </div>

            <label class="col-md-2 col-form-label">
              <span class="float-right">
                जारि जिल्ला
              </span>
            </label>
            <div class="col-md-4">
              <input type="text" name="jaari_jilla" maxlength="128" class="form-control" id="jaari_jilla"
                value="<?= isset($result) ? $result->jaari_jilla : ''?>" />
            </div>
          </div>

          <div class="row mb-4">
            <label class="col-md-2 col-form-label">
              <span class="">
                जारि मिति
              </span>
            </label>
            <div class="col-md-4">
              <div class="input-group">
                <input type="text" name="jaari_date" class="form-control"
                  value="<?php echo !empty($result)?$result->jaari_date:''?>" id="nepaliDate6"
                  placeholder="YYYY-MM-DD" />
              </div>
            </div>
          </div>

          <hr>
          <div class="row mb-4">
            <label class="col-md-1 col-form-label">
              <span class="">
                ठेगाना
              </span>
            </label>
            <div class="col-md-2">
              <select name="state" class="form-control select2 state_selected" id="state_selected-3">
                <option value="" selected>प्रदेश</option>
                <?php foreach($states as $s) : ?>
                <option value=" <?= $state->id ?>" <?php
                                            if(isset($result)&& $result->state == $s->id)
                                            {
                                                echo 'selected="selected"';
                                            }
                                            elseif($state->id==$default[0])
                                            {
                                                echo 'selected="selected"';
                                            }
                                            ?>><?= $s->name?></option>
                <?php endforeach;?>
              </select>
            </div>
            <div class="col-md-3">
              <select name="district" class="form-control select2 district_selected" id="district_selected-3">
                <option value="" selected>जिल्ला</option>
                <?php foreach($districts as $district) : ?>
                <option value="<?= $district->id ?>" <?php
                                            if(isset($result)&& $result->district == $district->id)
                                            {
                                                echo 'selected="selected"';
                                            }
                                            elseif($district->name==$default[1])
                                            {
                                                echo 'selected="selected"';
                                            }
                                            ?>><?= $district->name?></option>
                <?php endforeach;?>
              </select>
            </div>
            <div class="col-md-3">
              <select name="local_body" class="form-control select2 local_body_selected" id="local_body_selected-3">
                <option value="">गा.पा./न.पा </option>
                <?php foreach($locals as $local) : ?>
                <option value="<?= $local->id ?>" <?php
                                            if(isset($result)&& $result->local_body == $local->id)
                                            {
                                                echo 'selected="selected"';
                                            }
                                            elseif($local->name==$default[2])
                                            {
                                                echo 'selected="selected"';
                                            }
                                            ?>><?= $local->name?></option>
                <?php endforeach;?>
              </select>
            </div>
            <div class="col-md-2">
              <select name="ward" class="form-control select2 ward_selected" id="ward_selected-3">
                <option value="" selected>वडा नं</option>
                <?php foreach($wards as $wp) : ?>
                <option value="<?= $wp->id ?>" <?php
                                            if(isset($result)&& $result->ward == $wp->id)
                                            {
                                                echo 'selected="selected"';
                                            }
                                            elseif($ward->id==$default[3])
                                            {
                                                echo 'selected="selected"';
                                            }
                                            ?>><?= $wp->name?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
        </div>
        <hr class="mt-5 mb-4" style="border: 1px solid #adadad">
        <div class="row">
          <label col-md-4 col-offset-4>कागजातहरू <span class="text-danger">*</span> </label>
          <div class="col-sm-9">
            <div class="mb-3 documents" id="doc_div_0">
              <input type="file" name="documents[]" id="documents_0" />
              <select name="documents_type[]" id="documents_type_0">
                <option value="">प्रकार छान्नुहोस्</option>
                <?php foreach($documents as $doc):?>
                <option value="<?= $doc->id?>"><?= $doc->name ?></option>
                <?php endforeach;?>
              </select>
              <button type="button" class="float-right btn btn-danger delete-form doc_remove" id="documents_remove_0"><i
                  class="fa fa-times"></i></button>
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
    <div class="form-group row">
      <div class="col-sm-6 offset-sm-6 mt-4">
        <button type="submit" class='btn btn-block btn-submit btn-primary' name="submit">पेश
          गर्नुहोस्
        </button>
      </div>
    </div>
  </div>


  </div>
  </div>

  </form>
  </div>
  </div>
</section>
</div>
<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script>
var JQ = jQuery.noConflict();
JQ(document).ready(function() {
  JQ('.married').hide();
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
  JQ(document).on("input", "#janmamiti", function() {
    var date = JQ("#curr_date").val();
    var date_1 = JQ("#janmamiti").val();
    var diff_date = parseFloat(date) - parseFloat(date_1);
    //var age = JQ("#id_age").val();
    //console.log(diff_date);
    JQ("#id_age").val(diff_date);
    //console.log(date);
    //alert("alert"); 
  });
  JQ(document).on("click", ".doc_remove", function() {
    var id_selected = JQ(this).attr("id");
    var res = id_selected.split("_");
    var id = res[res.length - 1];
    JQ("#doc_div_" + id).remove();
  });

  JQ(document).on('change', '#aama', function() {
    if ($(this).is(":checked")) {
      $('.married').show();
    } else {
      $('.married').hide();
    }
  });
});
</script>