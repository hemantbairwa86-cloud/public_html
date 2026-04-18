<!DOCTYPE html>
<html lang="en">
<head>
<title>Product Report |<?php echo FIRM_NAME;  ?></title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo  base_url(); ?>assest/frontend/images/favicon.png">
<script src="<?php echo  base_url(); ?>assest/admin/js/jquery.min.js"></script>
<script src="<?php echo  base_url(); ?>assest/admin/js/dom-to-image.min.js"></script>
<script src="<?php echo  base_url(); ?>assest/admin/js/jspdf.min.js"></script>
<style>
.footer {
	position: fixed;
	left: 0;
	bottom: 0;
	width: 100%;
	color: white;
	text-align: center;
}
.button {
	background-color: #4CAF50; /* Green */
	border: none;
	color: white;
	padding: 5px 20px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 12px;
	cursor:pointer;
	border-radius:5px;
}
@media print {
.noprint {
	visibility: hidden;
}
}
@media print {
 @page {
 size: A4;
 margin: 0px;
}
}
</style>
<style>
body {
	font-family:Arial, Helvetica, sans-serif;
}
page[size="A4"] {
	background-color:#FFFFFF;
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
#customers {
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	width: 20cm;
	border-collapse:collapse;
}
#customers td, #customers th {
	font-size:12px;
	border:1px solid #9B9B9B;
	padding:5px 8px 5px 8px;
}
#customers th {
	font-size:14px;
	text-align:center;
	background-color:#fff;
	color:#000;
	padding:8px 9px;
}
#customers tr.alt td {
	color:#000000;
	background-color:#c9dce5;
}
.startposition {
	position:absolute;
	margin-top:10px;
	width: 21cm;
}
.heading-font {
	text-align:center;
	font-size:26px;
	font-weight:bold;
}
.full-page-border {
	position:relative;
	width:500px;
	display:inline-block;
}
.full-page-border:after {
	display: inline-block;
	margin: 0;
	height: 1px;
	content: " ";
	text-shadow: none;
	width: 500px;
	position:absolute;
	left:0;
	bottom:1px;
	border-top: 1px dashed #000;
}
.one-third-border {
	position:relative;
	width:110px;
	display:inline-block;
}
.one-third-border:after {
	display: inline-block;
	margin: 0;
	height: 1px;
	content: " ";
	text-shadow: none;
	width: 110px;
	position:absolute;
	left:0;
	bottom:1px;
	border-top: 1px dashed #000;
}
.border-sign {
	position:relative;
	width:180px;
	display:inline-block;
}
.border-sign:after {
	display: inline-block;
	margin: 0;
	height: 1px;
	content: " ";
	text-shadow: none;
	width: 180px;
	position:absolute;
	left:0;
	bottom:1px;
	border-top: 1px dashed #000;
}
.pagebreak {
	clear:both;
	page-break-before: always;
} /* page-break-after works, as well */
</style>
</head>

<page size="A4">
  <div>&nbsp;</div>
  <table border="1" cellpadding="0" cellspacing="0" frame="box" rules="all" align="center" width="100%" id="customers" style="line-height:22px;font-size:16px;">
    <thead>
      <tr>
        <th align="center" style="text-align:center;font-size:22px;vertical-align:middle;border-right:0;"> <div><img src="<?php echo  base_url(); ?>assest/frontend/images/logo.svg" height="30" width="auto"></div></th>
        <th align="center" style="text-align:center;font-size:22px;vertical-align:middle;border-left:0;"> <div style="text-align:center;padding:5px;;font-weight:bold;font-size:28px;color:#412774;font-family:Geneva, Arial, Helvetica, sans-serif">Product Report</div>
          <div  style="text-align:center;padding:5px;;font-weight:bold;font-size:14px;">From : <?php echo date('d/m/Y',strtotime($from_date)) ; ?> &nbsp; To: <?php echo date('d/m/Y',strtotime($to_date)) ; ?></div>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th style="text-align:center;font-weight:bold;font-size:16px;border-right:0px;"><?php echo "<font color='#990000'>Category :</font> ".$print_category ; ?></th>
        <th style="text-align:center;font-weight:bold;font-size:16px;border-left:0px;"><?php echo "<font color='#990000'>Product :</font> ".$print_product ; ?></th>
      </tr>
      <tr>
        <th colspan="2" style="text-align:center;font-weight:bold;font-size:16px;"> <table align="center" cellpadding="0" cellspacing="0" border="1" width="100%" id="customers" style="line-height:30px;">
            <tr>
              <th style="background-color:#f2f2f2">Sr No.</th>
              <th style="background-color:#f2f2f2">Order No.</th>
              <th style="background-color:#f2f2f2">Date</th>
              <th style="background-color:#f2f2f2">Customer Name</th>
              <th style="background-color:#f2f2f2">City</th>
              <th style="background-color:#f2f2f2">Amount</th>
              <th style="background-color:#f2f2f2">Status</th>
              <th style="background-color:#f2f2f2">Action</th>
            </tr>
            <?php if(!empty($orders)) { 
			foreach($orders as $k=>$v) { $k++ ;
			$mylink = base_url()."administrator/order/view/".md5($v['OrderID']); 
			?>
            <tr>
              <td><?php echo $k; ?></td>
              <td><?php echo $v['order_no_disp']; ?></td>
              <td><?php echo date('d/m/Y',strtotime($v['OrderDate'])) ; ?></td>
              <td style="text-align:left"><?php echo ucwords($v['ShippingName']); ?></td>
              <td style="text-align:left"><?php echo ucwords($v['ShippingCity']); ?></td>
              <td style="text-align:right"><?php echo $v['TotalValue']; ?></td>
              <td><?php echo $v['OrderStatus']; ?></td>
              <td><?php  echo '<a href="'.$mylink.'" target="_blank" class="btn btn-outline-primary" >Print</a>' ; ?></td>
            </tr>
            <?php } } else {?>
            <tr>
              <td colspan="8">No Record Found.</td>
            </tr>
            <?php } ?>
          </table></th>
      </tr>
    </tbody>
  </table>
</page>
<div class="footer noprint" >
  <p align="center">
    <?php /*?><button class="button noprint" id="downloadPDF">Download</button>
  &nbsp;&nbsp;&nbsp;&nbsp;<?php */?>
    <button class="button noprint"  onclick="window.print()">Print</button>
  </p>
</div>
</html>
<?php $fname = date("d-m-Y").".pdf"; ?>
<script>
$('#downloadPDF').click(function () {
    domtoimage.toPng(document.getElementById('content2'))
        .then(function (blob) {
            var pdf = new jsPDF('l', 'pt', [$('#content2').width(), $('#content2').height()]);
            pdf.addImage(blob, 'PNG', 0, 0, $('#content2').width(), $('#content2').height());
            pdf.save("<?php echo $fname; ?>");
            that.options.api.optionsChanged();
        });
});
</script>