<?php defined('BASEPATH') OR exit('No direct script access allowed.');
function number_to_word( $num = '' ){
    $number = $num;
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'One', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? ' ' : null; //remove s ''
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Only ' : '') . $paise;
}
function getHeight($image) {
    $sizes = getimagesize($image);
    $height = $sizes[1];
    return $height;
}
/* Function to get image width */
function getWidth($image) {
    $sizes = getimagesize($image);
    $width = $sizes[0];
    return $width;
}
function convert_image_new($convFile){
    $input = imagecreatefromstring( file_get_contents( $convFile ) );
    list($width, $height) = getimagesize($convFile);
    $output = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($output,  255, 255, 255);
    imagefilledrectangle($output, 0, 0, $width, $height, $white);
    imagecopy($output, $input, 0, 0, 0, 0, $width, $height);
    return $output; //imagejpeg($output, $output_file);
}
/* Function to resize image */
function resizeImageNew($image,$width,$height,$scale, $ext) {
    $newImageWidth = ceil($width * $scale);
    $newImageHeight = ceil($height * $scale);
    $newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
    //$source = imagecreatefromjpeg($image);
    switch ($ext) {
        case 'jpg':
            $source = imagecreatefromjpeg($image);
        case 'jpeg':
            $source = imagecreatefromjpeg($image);
            break;
        case 'gif':
            $source = imagecreatefromgif($image);
            break;
        case 'png':
            $source = imagecreatefrompng($image);
            break;
        default:
            $source = false;
            break;
    }
    $width = imagesx($source);
    $height = imagesy($source);
    imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
    switch ($ext) {
        case 'jpg':
            imagejpeg($newImage,$image,90);
            break;
        case 'jpeg':
            imagejpeg($newImage,$image,90);
            break;
        case 'png':
            imagepng($newImage,$image,90,"PNG_ALL_FILTERS");
            break;
        default:
            imagejpeg($newImage,$image,90);
            break;
    }
    return $image;
}
function get_upcoming_events()
{
    $ci = &get_instance();
    $ci->db->select('*');
    $ci->db->from('events');
    $ci->db->where('status',1);
    $ci->db->order_by("id","desc");
    $ci->db->limit(3);
    $query = $ci->db->get();
    return $query->result_array();
}
function compress($source, $destination, $quality)
{
    $info = getimagesize($source);
    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);
    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);
    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);
    imagejpeg($image, $destination, $quality);
    return $destination;
}
function make_thumb($src, $dest, $desired_width) {
    /* read the source image */
    $source_image = imagecreatefromjpeg($src);
    $width = imagesx($source_image);
    $height = imagesy($source_image);
    /* find the "desired height" of this thumbnail, relative to the desired width  */
    $desired_height = floor($height * ($desired_width / $width));
    /* create a new, "virtual" image */
    $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
    /* copy source image at a resized size */
    imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
    /* create the physical thumbnail image to its destination */
    imagejpeg($virtual_image, $dest);
}
function create_thumbAll($image1_path, $dest, $box=300){
    list($width1, $height1, $image1_type) = getimagesize($image1_path);
  //  $image2_path = dirname($image1_path) . '/tn_' .basename($image1_path);
    $image2_path =$dest;
    // make image smaller if doesn't fit to the box 
    if ($width1 > $box || $height1 > $box){
        // set the largest dimension
        $width2 = $height2 = $box;
        // calculate smaller thumb dimension (proportional)
        if ($width1 < $height1) $width2  = round(($box / $height1) * $width1);
        else                    $height2 = round(($box / $width1) * $height1);
        // set image type, blending and set functions for gif, jpeg and png
        switch($image1_type){
            case IMAGETYPE_PNG:  $img = 'png';  $blending = false; break;
            case IMAGETYPE_GIF:  $img = 'gif';  $blending = true;  break;
            case IMAGETYPE_JPEG: $img = 'jpeg'; break;
        }
        $imagecreate = "imagecreatefrom$img";
        $imagesave   = "image$img";
        // initialize image from the file
        $image1 = $imagecreate($image1_path);
        // create a new true color image with dimensions $width2 and $height2
        $image2 = imagecreatetruecolor($width2, $height2);
        // preserve transparency for PNG and GIF images
        if ($img == 'png' || $img == 'gif'){
          // allocate a color for thumbnail
            $background = imagecolorallocate($image2, 0, 0, 0);
            // define a color as transparent 
            imagecolortransparent($image2, $background);
            // set the blending mode for thumbnail
            imagealphablending($image2, $blending);
            // set the flag to save alpha channel  
            imagesavealpha($image2, true); 
        }
        // save thumbnail image to the file
        imagecopyresampled($image2, $image1, 0, 0, 0, 0, $width2, $height2, $width1, $height1);
        $imagesave($image2, $image2_path);
    }
    // else just copy the image
    else copy($image1_path, $image2_path);
}
function square_crop($src_image, $dest_image, $thumb_size = 64, $jpg_quality = 90)
{
    // Get dimensions of existing image
    $image = getimagesize($src_image);
    // Check for valid dimensions
    if( $image[0] <= 0 || $image[1] <= 0 ) return false;
    // Determine format from MIME-Type
    $image['format'] = strtolower(preg_replace('/^.*?\//', '', $image['mime']));
    // Import image
    switch( $image['format'] ) {
        case 'jpg':
        case 'jpeg':
            $image_data = imagecreatefromjpeg($src_image);
        break;
        case 'png':
            $image_data = imagecreatefrompng($src_image);
        break;
        case 'gif':
            $image_data = imagecreatefromgif($src_image);
        break;
        default:
            // Unsupported format
            return false;
        break;
    }
    // Verify import
    if( $image_data == false ) return false;
    // Calculate measurements
    if( $image[0] > $image[1] ) {
        // For landscape images
        $x_offset = ($image[0] - $image[1]) / 2;
        $y_offset = 0;
        $square_size = $image[0] - ($x_offset * 2);
    } else {
        // For portrait and square images
        $x_offset = 0;
        $y_offset = ($image[1] - $image[0]) / 2;
        $square_size = $image[1] - ($y_offset * 2);
    }
    // Resize and crop
    $canvas = imagecreatetruecolor($thumb_size, $thumb_size);
    if( imagecopyresampled(
        $canvas,
        $image_data,
        0,
        0,
        $x_offset,
        $y_offset,
        $thumb_size,
        $thumb_size,
        $square_size,
        $square_size
    )) {
        // Create thumbnail
        switch( strtolower(preg_replace('/^.*\./', '', $dest_image)) ) {
            case 'jpg':
            case 'jpeg':
                return imagejpeg($canvas, $dest_image, $jpg_quality);
            break;
            case 'png':
                return imagepng($canvas, $dest_image);
            break;
            case 'gif':
                return imagegif($canvas, $dest_image);
            break;
            default:
                // Unsupported format
                return false;
            break;
        }
    } else {
        return false;
    }
}
function slugify($text)
{
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);
  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);
  // trim
  $text = trim($text, '-');
  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);
  // lowercase
  $text = strtolower($text);
  if (empty($text)) {
    return 'n-a';
  }
  return $text;
}
function send_mail($email="inquiry@venusproducts.in",$message="",$subject="",$attachment="")
{
    $ci = &get_instance();
    $ci->load->library('phpmailer_lib');
    $mail = $ci->phpmailer_lib->load();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'YOURGMAIL@gmail.com';		/////////////
    $mail->Password = 'YOURPASSWORD';   			/////////////            
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('inquiry@venusproducts.in', $subject);	/////////////  
    if($attachment !=""){           
        $mail->addAttachment($attachment); 
    }
    $mail->addAddress($email);    
    $mail->Subject = $subject;
    $mail->IsHTML(true);
    $mail->Body = $message; 
    if(!$mail->send())
    {
        echo 'Error';
        echo  'Mailer Error: '. $mail->ErrorInfo; exit;
        return false;
    }
    else
    {                
        return true;
    }  
}
function products_by_category($cid)
{
    $ci = &get_instance();
    $temp = array();
    $prod = $ci->db->select('p.*,s.name as category')->where("p.isdelete",0)->where("p.status",1)->where('p.collectiontype',$cid)->from('product p')->join('category s', 'p.collectiontype = s.id','left')->get()->result_array();
    foreach ($prod as $key => $v)
    {
        $v['images'] = $ci->db->select('*')->where("product_id",$v['id'])->from('product_image')->get()->result_array();
        $v['price_list'] = $ci->db->select('*')->where("product_id",$v['id'])->from('product_price')->get()->result_array();
        $temp[] = $v;
    }
    return  $temp;
}
function get_product_images($pid)
{
	 $ci = &get_instance();
	 $prod_images = array();
	 $prod_images = $ci->db->select('p.image_name')->where("p.product_id",$pid)->from('product_image p')->get()->result_array();    
      return  $prod_images;
}
function common_testimonials()
{
    $ci = &get_instance();
    $ci->db->select('*');
    $ci->db->where("status",1);
    $ci->db->where("homepage",1);
    $res = $ci->db->from('testimonial')->get()->result_array();
    return  $res;
}
function DailyRateChangerDetails()
{
    $ci = &get_instance();
    $ci->db->select('*');
    $ci->db->where("status",1);
    $res = $ci->db->from('dailyratechanger')->get()->row_array();
    return  $res;
}
function WebsiteInformation()
{
    $ci = &get_instance();
    $ci->db->select('*');
    $ci->db->where("status",1);
    $ci->db->where("id",1);
    $res = $ci->db->from('admin')->get()->row_array();
    return  $res;
}
function CollectionDetails()
{
    $ci = &get_instance();
    $ci->db->select('*');
    $ci->db->where("status",1);
    $res = $ci->db->from('category')->get()->result_array();
    return  $res;
}
function CategoryDetails()
{
    $ci = &get_instance();
    $ci->db->select('*');
    $ci->db->where("status",1);
    $res = $ci->db->from('sub_category')->get()->result_array();
    return  $res;
}
function GenderDetails()
{
    $ci = &get_instance();
    $ci->db->select('t.*,s.name as category_name');
    $ci->db->where("t.status",1);
    $ci->db->from('trending t');
    $ci->db->join('category s', 't.category_id = s.id');
    $res = $ci->db->get()->result_array();
    return  $res;
}
function TestimonialDetails()
{
    $ci = &get_instance();
    $ci->db->select('*');
    $ci->db->where("status",1);
    $res = $ci->db->from('testimonial')->get()->result_array();
    return  $res;
}
function PriceRangeDetails()
{
    $ci = &get_instance();
    $ci->db->select('*');
    $ci->db->where("status",1);
    $res = $ci->db->from('product_pricerange')->get()->result_array();
    return  $res;
}
function WelcomeNoteDetails()
{
    $ci = &get_instance();
    $ci->db->select('*');
    $ci->db->where("status",1);
    $ci->db->limit(1);
    $res = $ci->db->from('welcomenote')->get()->row_array();
    return  $res;
}
function FooterGalleryDetails($limit=0)
{
    $ci = &get_instance();
    $ci->db->select('*');
    $ci->db->order_by('rand()');
    if($limit!=0){
        $ci->db->limit($limit);    
    }    
    $res = $ci->db->from('photo_gallery_detail')->get()->result_array();
    return  $res;
}
function CategoryLimitedDetails($limit=0)
{
    $ci = &get_instance();
    $ci->db->select('*');
    $ci->db->order_by('rand()');
    $ci->db->where("status",1);
    if($limit!=0){
        $ci->db->limit($limit);    
    }  
    $res = $ci->db->from('sub_category')->get()->result_array();
    return  $res;
}
function OfferImageSingleDetails()
{
    $ci = &get_instance();
    $ci->db->select('*');
    $ci->db->where("status",1);
    $ci->db->order_by('id','DESC');
    $ci->db->limit(1);
    $res = $ci->db->from('offerzone')->get()->row_array();
    return  $res;
}
function get_admin($uid)
{
    $ci = &get_instance();
    $query = $ci->db->query("SELECT u.* FROM admin u WHERE u.id='".$uid."' ");
    $u = $query->row_array();
    return $u;
}
function create_slug($string){
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($string));
   return $slug;
}
function isActive_offers()
{
    $ci = &get_instance();
    $query = $ci->db->query("SELECT u.* FROM offer_cover u WHERE u.id = 1");
    $u = $query->row_array();
    return $u;
}
function moneyFormatIndia($amount)
{
    $amount = round($amount,2);
    $amountArray =  explode('.', $amount);
    if(count($amountArray)==1)
    {
        $int = $amountArray[0];
        $des=00;
    }
    else {
        $int = $amountArray[0];
        $des=$amountArray[1];
    }
    if(strlen($des)==1)
    {
        $des=$des."0";
    }
    if($int>=0)
    {
        $int = numFormatIndia( $int );
        $themoney = $int.".".$des;
    }
    else
    {
        $int=abs($int);
        $int = numFormatIndia( $int );
        $themoney= "-".$int.".".$des;
    }   
    return $themoney;
}
function numFormatIndia($num)
{
    $explrestunits = "";
    if(strlen($num)>3)
    {
        $lastthree = substr($num, strlen($num)-3, strlen($num));
        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++) {
            // creates each of the 2's group and adds a comma to the end
            if($i==0) {
                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
            } else {
                $explrestunits .= $expunit[$i].",";
            }
        }
        $thecash = $explrestunits.$lastthree;
    } else {
        $thecash = $num;
    }
    return $thecash; // writes the final format where $currency is the currency symbol.
}

function getCustomerDetails($uid)
{    
      $ci = &get_instance();
      $ci->db->select("u.*,c.name as country_name,s.name as state_name");
      $ci->db->from('users u');
      $ci->db->join('own_countries c', 'u.country = c.id');
      $ci->db->join('own_states s', 'u.state = s.id');
      $ci->db->where("u.id",$uid);
      $query = $ci->db->get();
      $res = $query->row_array();
      return  $res;
}

function getCustomerAddress($uid)
{    
      $ci = &get_instance();
      $ci->db->select("d.*,c.name as country_name,s.name as state_name");
      $ci->db->from('billing_address d');
      $ci->db->join('billing_country c', 'd.country = c.id');
      $ci->db->join('billing_state s', 'd.state = s.id');
      $ci->db->where("d.customer_id",$uid);
      $query = $ci->db->get();
      $res = $query->result_array();
      return  $res;
}
function getSeoDetails($page)
{    
    $ci = &get_instance();
    $ci->db->select("*");
    $ci->db->from('seo');
    $ci->db->where("page",$page);
    $ci->db->where("status",1);
    $query = $ci->db->get();
    $res = $query->row_array();
    if(empty($res)) {
        $res = array(
            'seotitle' => '',
            'seodescription' => '',
            'seokeywords' => ''
        );
    }
    return $res;
}
//////
function is_login_user_front()
{
    $ci = &get_instance();
    if ($ci->session->userdata('user_front_session') ) 
    {
        return 1;
    } else {
        return 0;
    }
}
function get_shipping_by_state($state="")
{
    $ci = &get_instance();
    if($state=="")
    {
        $state = $ci->session->userdata('user_front_session')['state'];
    }
    $sc = 0;
    $query = $ci->db->query("SELECT u.shipping_charge FROM own_states u WHERE u.id='".$state."' ");
    $u = $query->row_array();
    $sc = $u['shipping_charge'];
    return $sc;
}
function get_order_series()
{
    $ci = &get_instance();
    $query = $ci->db->query("SELECT series FROM customer_bill WHERE series!=0 order by series  desc limit 1");
    $res = $query->row_array();
    if(!empty($res))
    {
            $new_series = $res['series']  + 1;
            $newpatient_id = $res['series']  + 1;                    
            if($newpatient_id<10)
            {
                 $newpatient_id = "0000".$newpatient_id;
            }
            else if($newpatient_id<100)
            {
                $newpatient_id = "000".$newpatient_id;
            }
            else if($newpatient_id<1000)
            {
                $newpatient_id = "00".$newpatient_id;
            }
            else if($newpatient_id<10000)
            {
                $newpatient_id = "0".$newpatient_id;
            }
            else
            { 
                 $newpatient_id = $res[0]['series'];
            }
            $data['order_no'] = $new_series;
            $data['order_no_disp'] = $newpatient_id;
    }
    else
    {
        $data['order_no'] = 1;
        $data['order_no_disp'] = "00001";
    }
    return $data;
}

function check_in_wishlist($pro_id,$user_id)
{    
    $ci = &get_instance();
    $ci->db->select("id");
    $ci->db->from('customer_favorite_products');
    $ci->db->where("customer_id",$user_id);
    $ci->db->where("products_id",$pro_id);
    $ci->db->where("status",1);
    $query = $ci->db->get();
    $res = $query->row_array();
    if(empty($res))
    {
        return 0;
    }else
    {
        return  1;
    }
}

function get_wishlist()
{
    $ci = &get_instance();
    $tcount = $ci->db->select('*')->from('customer_favorite_products')->where('customer_id',$ci->session->userdata('user_front_session')['id'])->get()->result_array();
    return $tcount;
}

function get_product_rating($pid="")
{
    $tmp['tot_customer'] = 0;
    $tmp['rating'] = 0;
    $ci = &get_instance();
    if($pid=="")
    {
        return $tmp;
    }else{
        $tcount = $ci->db->select('COUNT(id) as tot_cust')->from('product_reviews')->where('status',1)->where('product_id',$pid)->get()->row_array();
        $rev_tot = $ci->db->select('SUM(rating) as tot_rating')->from('product_reviews')->where('status',1)->where('product_id',$pid)->get()->row_array();
        $tot_cust = (!empty($tcount) && isset($tcount['tot_cust'])) ? (int)$tcount['tot_cust'] : 0;
        $tot_rating = (!empty($rev_tot) && isset($rev_tot['tot_rating'])) ? (float)$rev_tot['tot_rating'] : 0;
        $tot_rat = ($tot_cust > 0) ? round($tot_rating / $tot_cust) : 0;
        $tmp['tot_customer'] = $tot_cust;
        $tmp['rating'] = $tot_rat;
        return $tmp;
    }
    
}

function getFirmDetails()
{
	$ci = &get_instance();
    $ci->db->select("name,email,mo_number,firm_name,slogan,address,cemail,contactno,facebook,twitter,instagram,instagram,linkedin,website,youtube,pinterest,");
    $ci->db->from('admin');
    $ci->db->where("id",1);
    $query = $ci->db->get();
    $res = $query->row_array();
	return $res;
}	


?>