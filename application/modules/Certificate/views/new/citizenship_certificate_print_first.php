<?php
$b_local_body     = Modules::run("Settings/getLocal",$result->b_local_body);
$b_ward           = Modules::run("Settings/getWard",$result->b_ward);
$b_state          = Modules::run("Settings/getState",$result->b_state);
$b_district       = Modules::run("Settings/getDistrict",$result->b_district);

$p_local_body     = Modules::run("Settings/getLocal",$result->p_local_body);
$p_ward           = Modules::run("Settings/getWard",$result->p_ward);
$p_state          = Modules::run("Settings/getState",$result->p_state);
$p_district     = Modules::run("Settings/getDistrict",$result->p_district);

$f_local_body     = Modules::run("Settings/getLocal",$result->f_local_body);
$f_ward           = Modules::run("Settings/getWard",$result->f_ward);
$f_state          = Modules::run("Settings/getState",$result->f_state);
$f_district       = Modules::run("Settings/getDistrict",$result->f_district);

$m_local_body     = Modules::run("Settings/getLocal",$result->m_local_body);
$m_ward           = Modules::run("Settings/getWard",$result->m_ward);
$m_state          = Modules::run("Settings/getState",$result->m_state);
$m_district       = Modules::run("Settings/getDistrict",$result->m_district);

$hw_local_body     = Modules::run("Settings/getLocal",$result->hw_local_body);
$hw_ward           = Modules::run("Settings/getWard",$result->hw_ward);
$hw_state          = Modules::run("Settings/getState",$result->hw_state);
$hw_district       = Modules::run("Settings/getDistrict",$result->hw_district);

$s_local_body     = Modules::run("Settings/getLocal",$result->s_local_body);
$s_ward           = Modules::run("Settings/getWard",$result->s_ward);
$s_state          = Modules::run("Settings/getState",$result->s_state);
$s_district       = Modules::run("Settings/getDistrict",$result->s_district);
$birthdate_nep = explode("-",$result->nep_dob);
$birthdate_eng = explode("-",$result->eng_dob);
$from = new DateTime($result->eng_dob);
$to   = new DateTime();
$age= $to->diff($from)->y;
if(!empty($result->documents))
{
    $documents      = explode("+",$result->documents);

}
$path           = base_url()."assets/documents/certificate/citcertificate/";
$current_session    = Modules::run('Settings/getCurrentSession',$result->session_id);
switch($result->gender)
{
  case 'Male' :
  $gender = 'पुरुष';
  break;
  case 'Female':
  $gender = 'महिला';
  break;
  case 'Other':
  $gender = 'अन्य';
  break;
}
?>
<div class="font-14 myfontcolor" style="line-height: 2; font-size: 12px; font-weight: normal; font-family: sans-serif !important; margin: 5px 10px;">
    <!--<div class="card-body">-->
        <div class="font-14 font-bold myfontcolor" style="line-height: 1.5; font-weight: normal;">
            <div class="text-center mb-3">
                अनुसुची-१ <br> (नियम ३ को उपनियम (१) र (३) नियम ४ को उपनियम (१) र नियम १६ को उपनियम (१) सँग सम्बन्धित)
            </div>
            <div class="container-fluid" style="margin-top: -10px; font-weight: normal;">
                <div class="row">
                    <div class="col-9">
                        <div style="padding-top: 60px">
                            ारी ज्यु, <br> जिल्ला प्रशासन कार्यालय <br> 
                           <?=SITE_DISTRICT;?> <br>
                           <?=SITE_STATE;?>, नेपाल ।
                        </div>
                    </div>
                    <div class="col-3 text-center font-14">
                        <div class="py-5" style="border: 2px solid #555; margin-left: 50px; height: 160px; width: 145px;">
                            निवेदकको दुवै कान <br> देखिने पासपोर्ट <br> साइजको फोटो
                        </div>
                    </div>
                </div>
            </div>


            <div class="text-center mb-2" style="margin-top: -35px;">
                <h2 class="font-18 black">
                    विषय : नेपाली नागरिकताको प्रमाणपत्र पाउँ ।
                </h2>
            </div>
            <div style="margin-top: 0;">
                महोदय, <br>
                <div class="text-justify" style="text-indent: 50px; font-weight: normal;">
                    म वंशजको नाताले / जन्मको आधारले नेपाली नागरिक भएकोले देहायको विवरण खोली नेपाली नागरिकताको प्रमाणपत्र पाउनको लागि सिफारिस साथ रु १० को टिकट टाँसी यो निवेदन पत्र पेश गरेको छु । मैले यसअघि नेपाली नागरिकताको प्रमाणपत्र लिएको छैन ।
                </div>
            </div>
            <div class="container-fluid mb-3 mt-3">
                <div class="row">
                 <table class="table mybordertable">
                     <tr>
                         <td>
                             <div class="col-12 box-sizing">
                                <div class="">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td style="padding: 2px !important;">
                                                    १
                                                </td>
                                                <td style="padding: 2px !important;">
                                                    <strong>नाम, थर :-</strong> <?=$result->nep_first_name." ".$result->nep_middle_name." ".$result->nep_last_name?>
                                                    <br><strong>Full Name(In Block) :- </strong><span class="text-uppercase"><?=$result->eng_first_name." ".$result->eng_middle_name." ".$result->eng_last_name?></span>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td style="padding: 2px !important;">२</td>
                                                <td style="padding: 2px !important;"><strong>लिङ्ग :-</strong> <?= $gender ?><span class="ml-5 pl-4"> <strong> Gender :-</strong> <?=$result->gender ?></span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    ३
                                                </td>
                                                <td>
                                                    <strong>जन्मस्थान :-</strong> <span
                                                    class="mx-4">प्रदेश: <?=$b_state->name?></span>
                                                    <span class="">जिल्ला: <?=$b_district->name?>,</span> <span
                                                    class="">गा.पा./न.पा.: <?=$b_local_body->name?>,</span>
                                                    <span class="">वडा नं:<?= convertedcit($result->p_eng_ward)?>,</span>टोल: <?php  echo $result->nep_bp_tole;?>,
                                                    <br>
                                                    <strong>Place Of Birth :-</strong><span
                                                    class="mx-4"><?= $result->b_eng_state?>,</span>
                                                    <span class=""><?= $result->b_eng_district?> District,</span>
                                                    <span class=""><?= $result->b_eng_local_body?></span>
                                                    <span class="">Ward: <?= $result->bp_eng_ward?></span>
                                                    Tole: <?php  echo $result->eng_bp_tole; ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    ४
                                                </td>
                                                <td>
                                                    <strong>स्ठायी ठेगाना :-</strong></strong> <span
                                                    class="mx-4">प्रदेश:<?=$p_state->name?>,</span>
                                                    <span class="">जिल्ला: <?=$p_district->name?>,</span> <span
                                                    class="">गा.पा./न.पा.: <?=$p_local_body->name?>,</span>
                                                    <span class="">वडा नं: <?=convertedcit($result->p_eng_ward)?>, </span> टोल: <?=$result->nep_tole?>,
                                                    <br>
                                                    <strong>Permanent Address :-</strong></strong><span
                                                    class="mx-4"><?= $result->p_eng_state?> Province,</span>
                                                    <span class=""><?= $result->p_eng_district?> District,</span> <span
                                                    class=""><?= $result->p_eng_local_body?> Rural Municipality,</span>
                                                    <span class="">Ward: (<?= $result->p_eng_ward?>)-</span>
                                                    Tole: <?=$result->eng_tole?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="padding: 2px !important;">
                                                    ५
                                                </td>
                                                <td style="padding: 2px !important;">
                                                    <strong class="mr-4">जन्म मिति (वि.सं.)
                                                        :-</strong> <?=convertedcit($birthdate_nep[0])?>
                                                        <span class="mr-4 font-bold">साल</span> <?=convertedcit($birthdate_nep[1])?>
                                                        <span class="mr-4 font-bold">महिना</span> <?=convertedcit($birthdate_nep[2])?>
                                                        <span class="mr-4 font-bold">गते</span>
                                                        <br>
                                                        <strong class="mr-4">Date Of Birth (A.D) :- <?=$birthdate_eng[0]?> </strong><A.Dbirthdate_eng[0]?>
                                                        <span class="mr-4 font-bold">Year</span> <?=$birthdate_eng[1]?> <span class="mr-4 font-bold">Month</span> <?=$birthdate_eng[2]?> <span class="mr-4 font-bold">Day</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="col-12 box-sizing">
                                    <div class="">
                                        <table class="table table-borderless">
                                            <tbody>

                                                <tr>
                                                    <td style="padding: 2px !important;">६</td>
                                                    <td style="padding: 2px !important;">
                                                        <strong> बुबाको नाम, थर :- </strong> <?=$result->father_name?><br>
                                                        <strong>ठेगाना :-</strong>
                                                        <span class="mx-4">प्रदेश: <?=$f_state->name?></span>
                                                        <span class="mx-4">जिल्ला: <?=$f_district->name?></span>
                                                        <span class="mx-4">गा.पा./न.पा.: <?=$f_local_body->name?></span>
                                                        <span class="mx-4">वार्ड नं: <?=$f_ward->name?></span> टोल: <?=$result->f_tole?><br>
                                                        <strong>नागरिकता :- <?=convertedcit($result->f_citizenship_no)?>
                                                    </strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 2px !important;">
                                                    ७
                                                </td>
                                                <td style="padding: 2px !important;">
                                                    <strong> आमाको नाम, थर :- </strong> <?php echo $result->mother_name?><br>
                                                    <strong>ठेगाना :-</strong>
                                                    <span class="mx-4">प्रदेश: <?=$m_state->name?></span>
                                                    <span class="mx-4">जिल्ला: <?=$m_district->name?></span>
                                                    <span class="mx-4">गा.पा./न.पा.: <?=$m_local_body->name?></span>
                                                    <span class="mx-4">वार्ड नं: <?=$m_ward->name?></span> टोल:<?=$result->m_tole?> <br>
                                                    <strong>नागरिकता :- <?=convertedcit($result->m_citizenship_no)?></strong>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="padding: 2px !important;">
                                                    ८
                                                </td>
                                                <td style="padding: 2px !important;">
                                                    <strong> पति / पत्नीको नाम, थर :- </strong> <?= $result->husband_wife_name?> <br>
                                                    <strong>ठेगाना :-</strong>
                                                    <span class="mx-4">प्रदेश: <?php if(!empty($result->husband_wife_name)){ echo $hw_state->name;}?></span>
                                                    <span class="mx-4">जिल्ला: <?php if(!empty($result->husband_wife_name)){ echo $hw_district->name;}?></span>
                                                    <span class="mx-4">गा.पा./न.पा.: <?php if(!empty($result->husband_wife_name)){ echo $hw_local_body->name;}?></span>
                                                    <span class="mx-4">वार्ड नं: <?php if(!empty($result->husband_wife_name)){ echo $hw_ward->name;}?> </span> टोल:<?php if(!empty($result->husband_wife_name)){ echo $result->hw_tole; }?><br>
                                                    <strong>नागरिकता :- <?php if(!empty($result->husband_wife_name)){ echo $result->hw_citizenship_no; }?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 2px !important;">
                                                    ९
                                                </td>
                                                <td style="padding: 2px !important;">
                                                    <strong> संरक्षकको नाम, थर :- </strong><?= $result->protector_name ?> <br>
                                                    <strong>ठेगाना :-</strong>
                                                    <span class="mx-4">प्रदेश: <?=$s_state->name?></span>
                                                    <span class="mx-4">जिल्ला: <?=$s_district->name?></span>
                                                    <span class="mx-4">गा.पा./न.पा.: <?=$s_local_body->name?></span>
                                                    <span class="mx-4">वार्ड नं: <?= convertedcit($result->p_eng_ward)?> </span> टोल: <?= $result->p_tole?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>


            </div>
        </div>
    </div>

    <div class="text-center mt-2">
        मैले माथि लेखिदिएको व्यहोरा ठीक साँचो हो । झुठ्ठा ठहरे कानुन बमोजिम सहुँला बुझाउँला ।
    </div>
    <div class="row">
        <div class="col-4 offset text-center">
            औठाको छाप
            <table class="finger-table table">
                <tr>
                    <td> दायाँ </td>
                    <td> बायाँ </td>
                </tr>
                <tr>
                    <td style="height: 150px;"> </td>
                    <td> </td>
                </tr>
            </table>
        </div>
        <div class="col-4 offset-4 mt-5">
            <br>
            <u> भवदीय </u> <br> निवेदकको दस्तखत :<br> मिति : <?php echo convertedcit(convertDate(date('Y-m-d')))?>
        </div>
    </div>

    <div>
        <div class="text-center">
            <h2 class="font-18 black">
                <?= SITE_OFFICE_TYPE?>को सिफारिस
            </h2>
        </div>
        <div style="line-height: 1.8" class="text-justify">
            <?=$b_local_body->name." वडा नं ".convertedcit($result->b_eng_ward)?> मा मिति <?=convertedcit($result->nep_dob)?> मा जन्म भई हालसम्म <?=$p_local_body->name." वडा नं ".convertedcit($result->b_eng_ward)?> मा स्थायी रुपमा वसोवास गरी आएका यसमा लेखिएका 
            <?php if ($result->gender = 'पुरुष') {
             श्रीमान् ;
         }
         else{
            श्रीमती ;
        }
        ?>
        <?=$result->father_name?> को 
        <?php 
        if ($result->gender = 'पुरुष') {
            छोरा ;
        }
        else{
            छोरी ;
        }
        ?>
        वर्ष <?=convertedcit(round($age))?> को 
        <?php if ($result->gender = 'पुरुष') {
            श्री ;
        }
        else{
            सुश्री ;
        }
        ?>
        <?=$result->nep_first_name." ".$result->nep_middle_name." ".$result->nep_last_name?> लाई म राम्ररी चिन्दछु । उपयुक्त लेखिए बमोजिमका निजको व्यहोरा जाने बुझे सम्म सांचो हो । निजलाई वंशजको नाताले /जन्मको आधारले नागरिकता प्रमाण पत्र दिए हुन्छ । उक्त विवरण झुठ्ठा ठहरे कानुन वमोजिम सहुला बुझौला / बुझाउला ।
    </div>
</div>

<div style="margin-left:780px;">सिफारिस गर्नेको :-</div>
<div style="line-height: 2">
    <table class="table table-borderless">
        <tr>
            <td>
                <p>मिति :-<?php echo convertedcit(convertDate(date('Y-m-d')))?></p>

                <p>कार्यालयको नाम :-</p>
            </td>
            <td>
                <div style="margin-left: 550px">
                    <p class="mt-3"> दस्तखत : <span class="font-normal">.........................................</span></p>
                    <p> नाम, थर : <span class="font-normal">.........................................</span></p>
                    <p>पद : <span class="font-normal">................................................</span> </p>
                </div>
            </td>
        </tr>
    </table>
</div>
</div>
