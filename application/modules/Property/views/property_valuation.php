<?php
    if($this->uri->segment(2)== "create")
    {
    $action_page = "property-valuation/create";
    }
    if($this->uri->segment(2)=="edit")
    {
    $action_page = "property-valuation/edit/".$this->uri->segment(3);
    }
    if(!empty($result->documents))
    {
        $documents      = explode("+",$result->documents);

    }
    $path           = base_url()."assets/documents/property/property_valuation/";
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


                          <li class="breadcrumb-item"><a href="<?= base_url()?>property-valuation/">सम्पत्ति मूल्यांकन</a></li>

                      <li class="breadcrumb-item active">नयाँ</li>

                  </ol>
              </nav>
          </div>





  <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12">




          </div>
      </div>

      <?php echo form_open_multipart($action_page);?>
          <div class="row">
              <div class="col-lg-12">
                  <div class="form-group row">
                      <label class="col-sm-4 col-form-label"><span
                              class="float-right">Applicated Date<span
                              class="text-danger">&nbsp;*</span></span></label>

                          <div class="col-sm-6">
                              <div class="input-group">
                                  <input type="text" name="nepali_date" maxlength="10" class="form-control" id="nepaliDate4" value="<?= isset($result) ? $result->nepali_date : DateEngToNep(date('Y-m-d'))?>"  required />

                              </div>
                          </div>

                  </div>
                  <div class="form-group row">
                      <label class="col-sm-4 col-form-label">
                            <span class="float-right">
                              Full Name
                              <span class="text-danger">&nbsp;*</span>
                            </span>
                      </label>

                          <div class="col-sm-6">
                              <input type="text" name="applicant_name" maxlength="120" class="form-control" id="id_applicant_name" value="<?= isset($result) ? $result->applicant_name : ''?>"  required/>
                          </div>

                  </div>


                  <div class="form-group row">
                      <label class="col-sm-4 col-form-label mt-2"><span
                              class="float-right">Address <span class="text-danger">&nbsp;*</span></span></label>

                          <div class="col-sm-6">
                              <table class="table table-borderless">
                                  <tr>
                                      <td>
                                            <select name="state" class="form-control select2 state_selected" required id="state_selected-1">
                                                <option value="" selected>प्रदेश</option>
                                            <?php foreach($states as $state) : ?>
                                                <option value="<?= $state->id ?>"
                                                    <?php
                                                        if(isset($result) && $result->state == $state->id)
                                                        {
                                                            echo 'selected = "selected"';
                                                        }
                                                        elseif($state->id==$default[0])
                                                        {
                                                            echo 'selected="selected"';
                                                        }
                                                    ?>
                                                ><?= $state->name?></option>
                                            <?php endforeach;?>
                                            </select>
                                        </td>
                                      <td>
                                            <select name="district" class="form-control select2 district_selected" required id="district_selected-1">
                                                <option value="" selected>जिल्ला</option>
                                                <?php foreach($districts as $district):?>
                                                    <option value="<?= $district->id ?>"
                                                        <?php
                                                            if(isset($result) && $result->district == $district->id)
                                                            {
                                                                echo 'selected = "selected"';
                                                            }
                                                            elseif($district->name==$default[1])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                        ?>
                                                    ><?= $district->name ?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="local_body" class="form-control select2 local_body_selected" required id="local_body_selected-1">
                                                <option value="" selected>गा.पा./न.पा </option>
                                                <?php foreach($locals as $local):?>
                                                    <option value="<?= $local->id ?>"
                                                        <?php
                                                            if(isset($result) && $result->local_body == $local->id)
                                                            {
                                                                echo 'selected = "selected"';
                                                            }
                                                            elseif($local->name==$default[2])
                                                                {
                                                                    echo 'selected="selected"';
                                                                }
                                                        ?>
                                                    ><?= $local->name ?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="ward" class="form-control select2 ward_selected" required id="ward_selected-1">
                                                <option value="" selected>वडा नं</option>
                                                <?php foreach($wards as $ward):?>
                                                    <option value="<?= $ward->id ?>"
                                                        <?php
                                                            if(isset($result) && $result->ward == $ward->id)
                                                            {
                                                                echo 'selected = "selected"';
                                                            }
                                                            elseif($ward->id==$default[3])
                                                            {
                                                                    echo 'selected="selected"';
                                                            }
                                                        ?>
                                                    ><?= $ward->name ?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </td>
                                  </tr>
                              </table>
                          </div>

                  </div>
              </div>
          </div>

          <hr class="my-4">
          <div class="col-md-12">
              <div class="text-center">
                  <label for="terai" style="font-size:17px"><b>तराई</b></label>
                  <input type="radio" name="land_type" value="terai" <?= (isset($result) && $result->land_type =="terai") ? 'checked' : 'checked'; ?>>
                  <label for="hill" style="font-size:17px"><b>पहाड</b></label>
                  <input type="radio" name="land_type" id="hill" value="hill" <?= (isset($result) && $result->land_type =="hill") ? 'checked' : ''; ?>>
              </div>

          </div>
          <div class="table-responsive">
              <table class="table form-table table-bordered table-sm">
                  <thead class="text-center">
                  <tr>
                      <td rowspan="2">Owner</td>
                      <td rowspan="2">Particular Plot no.</td>
                      <td <?= (isset($result) && $result->land_type=="hill") ? 'colspan="4"' : 'colspan="3"'?> id="land_area">Area</td>
                      <td rowspan="2">Total Value</td>
                      <td rowspan="2">Remark</td>
                      <td rowspan="2" style="max-width: 15%"></td>
                  </tr>
                  <tr>
                      <?php if(isset($result) && $result->land_type =="hill"):?>
                          <td id="biggha_span">रोपनी</td>
                          <td id="kattha_span">आना</td>
                          <td id="dhur_span">दाम</td>
                          <td class="paisa_div">पैसा</td>
                      <?php else: ?>
                          <td id="biggha_span">बिग्घा</td>
                          <td id="kattha_span">कट्ठा</td>
                          <td id="dhur_span">धुर</td>
                          <td class="paisa_div" style="display:none;">पैसा</td>
                      <?php endif; ?>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                        if(isset($result))
                        {
                            $i = 0;
                            $total_form = count($property_details);
                            foreach($property_details as $data) :
                      ?>
                      <tr class="item" id="div_<?=$i?>">
                              <td>
                                  <input type="text" name="owner_<?=$i?>" maxlength="64" class="form-control formset-field" id="id_details-<?=$i?>-owner" value="<?= $data->owner?>" required />
                              </td>
                              <td>
                                  <input type="text" name="plot_no_<?=$i?>" maxlength="16" class="form-control formset-field" id="id_details-<?=$i?>-plot_no" value="<?= $data->plot_no ?>" required/>
                              </td>
                              <td>
                                  <input type="number" name="biggha_<?=$i?>" class="form-control formset-field biggha" id="id_details-<?=$i?>-biggha" min="0" value="<?= $data->biggha ?>" required/>
                              </td>
                              <td>
                                  <input type="number" name="kattha_<?=$i?>" class="form-control formset-field kattha" id="id_details-<?=$i?>-kattha" min="0" max="20" value="<?= $data->kattha ?>" required/>
                              </td>
                              <td>
                                  <input type="number" name="dhur_<?=$i?>" class="form-control formset-field dhur" id="id_details-<?=$i?>-dhur" min="0" max="20" value="<?= $data->dhur ?>" required/>
                              </td>
                              <td class="paisa_div" <?= (isset($result) && $result->land_type=="terai") ? 'style="display:none;"' : ''?> >
                                  <input type="number" name="paisa_<?=$i?>" value="<?=$details->paisa?>" class="formset-field paisa" id="id_details-<?=$i?>-paisa" min="0" max="20"  />
                              </td>
                              <td>
                                  <input type="number" name="total_value_<?=$i?>" class="form-control formset-field" id="id_details-<?=$i?>-total_value" step="0.01" value="<?= $data->total_value ?>" required/>
                              </td>
                              <td>
                                  <textarea name="remark_<?=$i?>" class="form-control formset-field " id="id_details-<?=$i?>-remark" cols="40" maxlength="512" rows="2">
                                   <?= $data->remark ?>
                                  </textarea>
                              </td>


                          <td>

                              <button type="button" class="btn btn-danger btn-sm remove"
                                      id="remove_<?=$i?>">
                                   <i class="fa fa-minus"></i>
                              </button>
                          </td>
                      </tr>
                  <?php
                                $i++;
                            endforeach;
                        }
                        else
                        {
                ?>
                            <tr class="item" id="div_0">
                                <td>
                                    <input type="text" name="owner_0" maxlength="64" class="form-control formset-field" id="id_details-0-owner" required />
                                </td>
                                <td>
                                    <input type="text" name="plot_no_0" maxlength="16" class="form-control formset-field" id="id_details-0-plot_no" required/>
                                </td>
                                <td>
                                    <input type="number" name="biggha_0" value="0" class="form-control formset-field biggha" id="id_details-0-biggha" min="0" required/>
                                </td>
                                <td>
                                    <input type="number" name="kattha_0" value="0" class="form-control formset-field kattha" id="id_details-0-kattha" min="0" max="20" required/>
                                </td>
                                <td>
                                    <input type="number" name="dhur_0" value="0" class="form-control formset-field dhur" id="id_details-0-dhur" min="0" max="20" required/>
                                </td>
                                <td class="paisa_div" style="display:none;">
                                    <input type="number" name="paisa_0" value="0" class="form-control formset-field paisa" id="id_details-0-dhur" min="0" max="4"  />
                                </td>
                                <td>
                                    <input type="number" name="total_value_0" class="form-control formset-field" id="id_details-0-total_value" step="0.01" required/>
                                </td>
                                <td>
                                    <textarea name="remark_0" class="form-control formset-field " id="id_details-0-remark" cols="40" maxlength="512" rows="2">
                                    </textarea>
                                </td>


                            <td>

                                <button type="button" class="btn btn-danger btn-sm remove"
                                        id="remove_0">
                                     <i class="fa fa-minus"></i>
                                </button>
                            </td>
                        </tr>
                  <?php } ?>
                      <tbody id="form_div">
                      </tbody>
                  <tr>
                      <td colspan="9"
                          style="border-left: none!important; border-right: none !important; border-bottom: none!important;">
                           <input type="text" name="total_forms" id="total_forms" value="<?= isset($result) ? $total_form : 1 ?>" hidden>
                          <button type="button" class="btn btn-sm btn-success add"
                                  id="add">
                              <i class="fa fa-plus"></i>
                          </button>
                      </td>
                  </tr>
                  </tbody>
              </table>
          </div>

          <div class="row">
              <div class="col-lg-12">
                  <hr class="mt-5 mb-4">



                    <div class="row">
                      <div class="col-sm-3 text-right">
                          <label>कागजातहरू <span class="text-danger">*</span> </label>
                      </div>

                      <div class="col-sm-9">
                          <div class="mb-3 documents" id="doc_div_0">
                              <input type="file" name="documents[]" id="documents_0" />
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
                    </div><hr class="mt-5 mb-4">


                    <div class="form-group row">
                       <div class="col-lg-6 offset-lg-6">
                           <div class="row">
                       <span class="col-sm-9 offset-sm-3">
                         <button type="submit" class='btn btn-submit btn-block btn-primary'
                                 name="submit">पेश गर्नुहोस्</button>
                       </span>
                           </div>
                       </div>
                   </div>
              </div>
          </div>
      </form>
  </div>

  </section>
</div>
<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script>

    var JQ = jQuery.noConflict();
    JQ(document).ready(function() {
        JQ(document).on("click", "#add", function (){
            var  count = JQ(".item").length;
            var land_type = JQ("input[name=land_type]:checked").val();
            param = {};
            param.count = count;
            param.land_type = land_type;
            JQ.ajax({
                url: "<?= base_url()?>getPropertyValuationHTML",
                method: "POST",
                data: param,
                success: function (data) {
                    var obj = JSON.parse(data);
                    JQ("#total_forms").val(count + 1);
                    JQ("#form_div").append(obj.html);

                },
                error: function (error) {
                    console.log(JSON.stringify(error));
                }
            });
        });
        JQ(document).on("click", ".remove", function () {
            var id_selected     = JQ(this).attr("id");
            var res             = id_selected.split("_");
            var id              = res[res.length - 1];
            var total_forms     = JQ("#total_forms").val();
            JQ("#total_forms").val(total_forms-1);
            JQ("#div_"+id).remove();
        });

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

    });
</script>
