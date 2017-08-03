<?php
/**
 * Created by PhpStorm.
 * User: Velislav
 * Date: 22/05/2017
 * Time: 15:41
 */

$asPartners = file_get_contents("partners.txt");
$ajPartners = json_decode($asPartners);

$allPartners = "
    <h3 class='txt-showing'>All Partners :</h3>
    <div class='wdw-partners'>".displayAllPartners($ajPartners)."</div>
</div>
";

function displayAllPartners($ajPartners){
    $partner="";
    foreach($ajPartners as $jPartner)
    {
        $partner .= "<div class='partner'>
        <div class='partner-img'>
            <img src='$jPartner->image' class='img-circle' alt='partner image'>
        </div>
        <div class='partner-info'>
            <h3>$jPartner->partnername</h3>
        </div>
        <div>
             <h4>Event</h4>
             <p>$jPartner->event</p>
             <h4>Role</h4>
             <p>$jPartner->role</p>
        </div>
    </div>";
    }
    return $partner;
}

$content = $allPartners;