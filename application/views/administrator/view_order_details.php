<?php $firm = getFirmDetails() ; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo "ORD".$OrderData['order_no_disp'];?>|<?php echo FIRM_NAME ; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo  base_url(); ?>assest/frontend/images/favicon.png">
<style>
body {
}
page[size="A4"] {
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
	width: 21cm;
	height: 29.7cm;
	display: block;
	margin: 0 auto;
	margin-bottom: 0.5cm;
}
 @media print {
body, page[size="A4"] {
	margin: 0;
	box-shadow: 0;
}
}
</style>
<style type="text/css">
#customers {
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	width:100%;
	border-collapse:collapse;
}
#customers td, #customers th {
	font-size:14px;
	/*border:1px solid #046998;*/
         padding:3px 5px;
}
#customers th {
	font-size:14px;
	text-align:left;
	color:#000000;
	background-color:#D7D7D7;
	font-weight:bold;
}
#customers tr.alt td {
	color:#000000;
	background-color:#c9dce5;
}
</style>
</head>
<body>
<page size="A4">
  <div style="margin-bottom:10px;padding:10px;">
    <?php //echo "<pre>"; print_r($OrderData); exit; ?>
    <table align="center" cellpadding="10" cellspacing="0" border="0" width="100%" id="customers" style="line-height:32px;padding:3px;" frame="box" rules="all">
      <tr>
        <td colspan="8" style="background-color:#D7D7D7;padding:20px;"><div style="font-family:Verdana, Arial, Helvetica, sans-serif;text-align:center;font-weight:bold;font-size:36px;"><?php echo $firm['firm_name'] ;  //FIRM_NAME ; ?></div></td>
      </tr>
      <tr>
        <td colspan="8" style="text-align:center;line-height:18px;font-size:12px;"><?php echo $firm['address'] ;  //FIRM_ADDRESS ; ?></td>
      </tr>
      <tr>
        <td colspan="8" style="text-align:center;font-weight:bold;padding:0px;font-weight:bold;font-size:14px;line-height:20px;font-family:Verdana, Arial, Helvetica, sans-serif;"> Online Order </td>
      </tr>
      <tr>
        <td colspan="8" style="padding:5px;vertical-align:top"><table align="center" cellpadding="0" cellspacing="0" border="0" width="100%" id="customers" style="line-height:12px;width:100%;padding:0px;" frame="void" rules="none">
            <tr>
              <td><table align="center" cellpadding="0" cellspacing="0" border="0" width="100%" id="customers" style="line-height:12px;width:100%;padding:0px;" frame="void" rules="none">
                  <tr>
                    <td colspan="2"><b><?php echo strtoupper($cust['name']." ".$cust['surname']);?></b></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="left" style="font-size:12px;line-height:16px;"><?php echo ucwords($OrderData['billing_address']);?> <br>
                      <?php echo ucwords($OrderData['billing_city']);?> - <?php echo ucwords($OrderData['billing_pincode']);?> <br>
                      <?php echo ucwords($OrderData['billing_state_name']);?> - <?php echo ucwords($OrderData['billing_country_name']);?> <br>
                      Contact : <?php echo ucwords($OrderData['billing_mobile']);?><br>
                      Email : <?php echo $OrderData['billing_email'];?> </td>
                  </tr>
                </table></td>
              <td style="width:200px;"><table align="right" cellpadding="0" cellspacing="0" border="0" width="100%" id="customers" style="line-height:16px;width:98%;padding:0px;font-size:12px;"  frame="void" rules="none">
                  <tr>
                    <td style="border-right:none"><b>Order No.</b></td>
                    <td style="width:2px;padding:0px;border-left:none;border-right:none;">:</td>
                    <td align="left" style="border-left:none"><?php echo $OrderData['order_id'];?></td>
                  </tr>
                  <tr>
                    <td style="border-right:none;width:80px;"><b>Order Date.</b></td>
                    <td  style="width:2px;padding:0px;border-left:none;border-right:none;">:</td>
                    <td align="left" style="border-left:none;width:90px;"><?php echo date('d-M-Y',strtotime($OrderData['oreder_date']));?></td>
                  </tr>
                </table></td>
            </tr>
          </table></td>
      </tr>
      <tr>
        <th style="width:65px;padding:10px;">Sr No</th>
        <th colspan="4" style="width:430px;">Product Description </th>
        <th style="text-align:center">Rate</th>
        <th style="text-align:center">Qty</th>
        <th style="text-align:center">Amount</th>
      </tr>
      <?php  $i=1;	//echo "<pre>"; print_r($OrderProductDetails); exit; 
                  if(!empty($OrderProductDetails)){
                    
                    foreach ($OrderProductDetails as $key => $value) {
                      
                ?>
      <tr class="item <?php echo ($i==count($OrderProductDetails))?"last":''; ?>">
        <td style="text-align:center;border-bottom:none;border-top:none;"><?php echo ($key+1);?></td>
        <td  colspan="4" style="border-bottom:none;border-top:none;vertical-align:middle;"><img src="<?php echo base_url(); ?>uploads/product/thumbnails/<?php echo $value['image_name'];?>" height="40" width="auto" /> <span style="vertical-align:top"><?php echo $value['product_category']."-".$value['product_name'];?> (<?php echo ucwords($value['productcode']);?>)</span> </td>
        <td style="font-weight:bold;text-align:right;border-bottom:none;border-top:none;padding-right:10px;"><?php echo $value['price'];?> </td>
        <td style="font-weight:bold;text-align:center;border-bottom:none;border-top:none;"><?php echo ucwords($value['qty']);?> </td>
        <td style="font-weight:bold;text-align:right;border-bottom:none;border-top:none;padding-right:10px;"><?php echo ucwords($value['subtotal']);?> </td>
      </tr>
      <?php 
                    }
                  }
                  for($j=1;$j<=7-$i;$j++){
                ?>
      <tr class=''>
        <td style='border-bottom:none;border-top:none;'>&nbsp;</td>
        <td colspan="4" style='border-bottom:none;border-top:none;'>&nbsp;</td>
        <td style='border-bottom:none;border-top:none;'>&nbsp;</td>
        <td style='border-bottom:none;border-top:none;'>&nbsp;</td>
      </tr>
      <?php } ?>
      <tr>
        <td colspan="8" style="line-height:24px;"><b>Remarks :</b> <?php echo $OrderData['remarks']; ?></td>
      </tr>
      <tr style="background-color:#F4F4F4">
        <td colspan="7" style="text-align:right;font-weight:bold;">Sub Total</td>
        <td style="font-weight:bold;text-align:right;padding-right:10px;"><?php echo $OrderData['total_amount'];?></td>
      </tr>
      <tr>
        <td colspan="7" style="text-align:right;font-weight:bold">Shipping Charge</td>
        <td style="font-weight:bold;text-align:right;padding-right:10px;"><?php echo $OrderData['total_shipping_charge'];?></td>
      </tr>
      <tr style="background-color:#F4F4F4">
        <td colspan="7" style="text-align:right;font-weight:bold">Total Amount</td>
        <td style="font-weight:bold;text-align:right;padding-right:10px;"><?php $tamount = $OrderData['total_amount'] + $OrderData['total_shipping_charge'];
							echo number_format($tamount, 2, '.', '');
							?></td>
      </tr>
      <tr>
        <td colspan="7" style="text-align:right;font-weight:bold">Discount</td>
        <td style="font-weight:bold;text-align:right;padding-right:10px;"><?php echo $OrderData['discount_rs'];?></td>
      </tr>
      <tr style="background-color:#F4F4F4">
        <td colspan="7" style="text-align:right;font-weight:bold">Net Amount</td>
        <td style="font-weight:bold;text-align:right;padding-right:10px;font-weight:bold;font-size:15px;"><?php echo $OrderData['final_total'];?></td>
      </tr>
      <tr>
        <td colspan="4" style="line-height:18px;font-size:12px;border-right:none;"><b>Terms &amp; Condition : </b><br />
          (1) Goods once sold will not be taken back.<br />
          (2) Interest @18% p.a. will be charged if payment is not made within due date.<br />
          (3) Our risk and responsibility ceases as soon as the goods leave our premises<br />
          (4) Subject to Junagadh Jurisdiction Only. </td>
        <td colspan="4" align="right" style="border-left:none;padding-right:10px;"><span>For, <?php echo FIRM_NAME ; ?></span><br />
          <br />
          <span style="font-size:12px;"><i>(Authorised Signatory)</i></span> </td>
      </tr>
    </table>
    <div style="text-align:center;font-size:12px;font-family:Arial, Helvetica, sans-serif;padding:10px;">This is computer generated order. No Need of Signature. </div>
  </div>
</page>
</body>
</html>
