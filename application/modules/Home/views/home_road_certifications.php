<?php
    if(isset($_GET['status']))
    {
        $status     = $this->input->get('status');
        switch($status)
        {
            case 1:
                $breadcrumb  = "नवीनतम डाटा";
                break;
            case 2:
                $breadcrumb  = "दर्ता भएको डाटा"  ;
                break;
            case 3:
                $breadcrumb  = "चलानी भएको डाटा";
                break;
            case 0:
                $breadcrumb  = "सम्पूर्ण डाटा";
                break;
        }

    }
    else
    {
        $breadcrumb  = "नवीनतम डाटा";
    }
?>
<section class="content ">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php if(!empty($this->session->flashdata('msg')))
                        {
                    ?>
                        <div  class="alert alert-success alert-dismissible" >    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><span><?=$this->session->flashdata('msg');?></span></div>


                    <?php } ?>
                    <?php if(!empty($this->session->flashdata('err_msg')))
                    {?>
                        <div  class="alert alert-danger alert-dismissible" >    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><span><?=$this->session->flashdata('err_msg');?></span></div>

                    <?php } ?>
                </div>
            </div>
        </div>



            <div class="container-fluid ">
                <nav aria-label="breadcrumb" class="bg-shadow">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item ml-1"><a href="<?= base_url()?>">गृह</a></li>


        <li class="breadcrumb-item"><a href="<?= base_url()?>home-recommends">घर बाटो प्रमाणित</a></li>
        <li class="breadcrumb-item active"><?= $breadcrumb ?></li>


                    </ol>
                </nav>
            </div>





    <div class="container-fluid">
        <div class="card">
            <div class="body">
                <div class="row">
                    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">


<div class="">
    <div class="row no-gutters">

        <div class="col-lg-2 col-12 mr-3 ">
            <select class="form-control " name="filter" id="filter">
                <option value="search-form">Search</option>
                <option value="date">Filter</option>
            </select>
        </div>

        <div class="col-lg-9 col-12">
            <div class="date-content d-none" >
            <?php echo form_open(base_url().'home-road-certify', array('method'=>'get'));?>
                <div class="row">
                    <div class="col-lg-9" style=" padding-right: 20px;">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group" style=" padding-right: 20px;">
                                        <input type="text" id="nepaliDate4" name="start_date_nep" class="form-control "
                                               placeholder="Start Date">

                                        <input type="text" id="nepaliDate5" name="end_date_nep" class="form-control "
                                               placeholder="End Date">&nbsp;
                                        <div class="">
                                            <button type="submit" name="submit" class="btn btn-info" style="padding:9px 25px !important;">View</button>
                                        </div>
                                </div>
                            </div>

                    </div>
                    </div>
                <div class="col-lg-3">
                <?php echo form_close() ;?>
                    <div class="input-group dropdown mr-sm-2">
                        <button class="btn btn-secondary dropdown-toggle search-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            महिना अनुसार
                        </button>
                        <div class="dropdown-menu search" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item"
                               href="<?= base_url()?>home-road-certify?month=3&submit=">पछिल्लो
                                तीन महिनाको</a>
                            <a class="dropdown-item"
                               href="<?= base_url()?>home-road-certify?month=6&submit=">पछिल्लो
                                छ महिनाको</a>
                            <a class="dropdown-item"
                               href="<?= base_url()?>home-road-certify?month=12&submit=">पछिल्लो
                                बाह्र महिनाको</a>

                        </div>
                    </div>
                </div>
                </div> <!-- row close -->

            </div>

            <div class="search-form" >
                <div class="col-12 col-lg-10 mb-2 mr-sm-2">


<form id='id_search_form' method='GET' action='<?= base_url()?>home-road-certify' class="form-inline ">
      <div class="input-group ">
        <input style="" id='search_field' class="form-control" type="search" placeholder="Search" aria-label="Search"
               name='search'
               value=''>
        <div class="input-group-append">
        <button class="btn btn-block btn-primary btn-lg" name="submit" type="submit">Search
            </button>
        </div>

        <div class="mr-sm-2" style="border-right: 1px solid #b3aaaa; padding-right: 30px;">
            <button class="btn ml-lg-2 btn-block reset btn-lg btn-secondary" type="button">Reset</button>
        </div>
        <div class="dropdown">
            <button class="btn btn-lg ml-sm-3 btn-secondary dropdown-toggle search-toggle" type="button" data-toggle="dropdown">
                Filter <span class="caret"></span></button>
            <ul class="dropdown-menu search" aria-labelledby="dropdownMenuButton">

                <li class="dropdown-item dropdown-submenu">
                    <div class="submenu-head"><a tabindex="-1" href="<?= base_url()?>home-road-certify?status=1&submit=">नवीनतम डाटा</a></div>
                </li>
                <li class="dropdown-item dropdown-submenu">
                    <div class="submenu-head"><a tabindex="-1" href="<?= base_url()?>home-road-certify?status=2&submit=">दर्ता भएको डाटा</a></div>
                </li>
                <li class="dropdown-item dropdown-submenu">
                    <div class="submenu-head"><a tabindex="-1" href="<?= base_url()?>home-road-certify?status=3&submit=">चलानी भएको डाटा</a></div>
                </li>
                <li class="dropdown-item dropdown-submenu" id="search_all">
                    <div class="submenu-head"><a tabindex="-1" href="<?= base_url()?>home-road-certify?status=0&submit=">सम्पूर्ण डाटा </a></div>
                </li>
            </ul>
        </div>
    </div>
</form>

                </div>
            </div>

        </div>
    </div>
</div>

                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 text-right">

                            <a href="<?= base_url()?>home-road-certify/create" class="btn font-16 btn-lg btn-success">
                            <i class="fa fa-plus" aria-hidden="true"></i> नयाँ</a>

                    </div>
                </div>

                <table class="table table-responsive-sm table-responsive-md table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">प्र.नं.</th>
                        <th scope="col">फारम ID</th>
                        <th scope="col">आवेदक को नाम</th>
                        <th scope="col">ठेगाना</th>
                        <th scope="col">कार्यालय</th>
                        <th scope="col">आवेदन गरिएको मिति</th>
                        <th>स्वीकृत</th>
                        <th style="max-width:15%"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(!isset($result) || $result == FALSE)
                            {
                        ?>
                        <tr>

                                <td class="text-danger text-center pt-4 pb-4" colspan="8"><h5>डाटाबेसमा कुनै डाटा छैन | </h5></td>


                        </tr>
                        <?php
                            }
                            else
                            {
                                $i = 1;
                                foreach($result as $data)
                                {
                                    switch($data->status)
                                    {
                                        case 1:
                                            $status = "नभएको";
                                            $html   = '<a href="'.base_url().'home-road-certify/edit/'.$data->id.'" class="btn btn-warning">सम्पादन गर्नुहोस</a> |
                                                        <a href="'.base_url().'home-road-certify/darta/'.$data->id.'" class="btn btn-success">दर्ता गर्नुहोस</a>';
                                            break;
                                        case 2:
                                            $status ="भएको";
                                            $html   = '<a href="'.base_url().'home-road-certify/chalani/'.$data->id.'" class="btn btn-success">चलानी गर्नुहोस</a>';
                                            break;
                                        case 3:
                                            $status ="भएको";
                                            $html   ="<span style='background-color:grey;color:white; padding: 2px 5px;'>कार्य उपलब्द छैन</span>";
                                            break;

                                    }
                                    $local_body     = Modules::run("Settings/getLocal",$data->local_body);
                                    $state          = Modules::run("Settings/getState",$data->state);
                                    $ward           = Modules::run("Settings/getWard",$data->ward);
                                    $district       = Modules::run("Settings/getDistrict",$data->district);
                                    $office         = Modules::run("Settings/getOffice",$data->office);
                                    $form_id        = Modules::run("Home/getFormId",$data->id,2);
                        ?>
                        <tr>
                                <td> <?= $i?> </td>
                                <td> <a href="home-road-certify/detail/<?=$data->id?>"><?= $form_id ?></a> </td>
                                <td> <?= $data->applicant_name ?> </td>
                                <td> <?= $local_body->name." ".$ward->name.", ".$district->name.", ".$state->name ?> </td>
                                <td> <?= $office->name ?> </td>
                                <td> <?= $data->nepali_date ?> </td>
                                <td> <?= $status ?> </td>
                                <td> <?= $html?>  </td>
                        </tr>
                        <?php
                                    $i++;
                                }
                            }
                        ?>



                    </tbody>
                </table>


            </div>
        </div>
    </div>

    </section>
</div>
<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url()?>assets/js/search.js"></script>