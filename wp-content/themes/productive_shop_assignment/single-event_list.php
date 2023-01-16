<?php
/* Single Event List */

get_header(); ?>


<?php
global $post;
$event_list_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
$e_id = get_the_ID();

$event_start_date_time = get_field('event_start_date_time', $e_id);
$event_end_date_time = get_field('event_end_date_time', $e_id);

$start_date_time = date("M j | g:iA",strtotime(get_field('event_start_date_time', $e_id)));
$start_date_time_arr = explode(" | ", date("M j | g:iA",strtotime(get_field('event_start_date_time', $e_id))));

$start_date = $start_date_time_arr[0];
$start_time = $start_date_time_arr[1];

$end_date_time = date("j, Y | g:iA",strtotime(get_field('event_end_date_time', $e_id)));
$end_date_time_arr = explode(" | ", date("j, Y | g:iA",strtotime(get_field('event_end_date_time', $e_id))));

$end_date = $end_date_time_arr[0];
$end_time = $end_date_time_arr[1];


$start_date_time_new = date("Y-m-d H:i:s",strtotime(get_field('event_start_date_time', $e_id)));
$start_date_time_arr_new = explode(" | ", date("m/d/Y | g:i a",strtotime(get_field('event_start_date_time', $e_id))));

$start_date_new = $start_date_time_arr_new[0];
$start_time_new = $start_date_time_arr_new[1];

$end_date_time_new = date("Y-m-d H:i:s",strtotime(get_field('event_end_date_time', $e_id)));
$end_date_time_arr_new = explode(" | ", date("m/d/Y | g:i a",strtotime(get_field('event_end_date_time', $e_id))));

$end_date_new = $end_date_time_arr_new[0];
$end_time_new = $end_date_time_arr_new[1];
?>

<div class="col-lg-12 single_main_bg">
&nbsp;
</div>

<div class="container cus_con">

<div class="row cus_head_sec">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 cus_event_top" style="background:#E4F6F8;">
<h1><?php the_title();?></h1>

<div class="event_lower_sec">
<span class="date_sec"><?php if($start_date){?><?php echo $start_date;?><?php } ?><?php if($end_date){?>-<?php echo $end_date;?><?php } ?></span>  | 
<p id="demo"></p>
</div>

</div>

<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 single_img">
<img src="<?php  echo $event_list_image[0]; ?>" alt="<?php the_title();?>" class="img-responsive" style="width:100%">
</div>
</div>


<div class="row single_event_dec_part">
<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
<a href="<?php echo site_url();?>/events" class="back_btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> back to events</a>
<br><br>
<span class="cus_dt">Date</span>
<span class="date_sec_new"><?php echo $start_date_new;?></span>
<br><br>
<span class="cus_dt">Time</span>
<span class="time_start_new"><?php echo $start_time_new;?></span> - <span class="time_end_new"><?php echo $end_time_new;?></span>
</div>

<div class="col-lg-8 col-md-6 col-sm-12 col-xs-12 about_event">
<h2>About this event</h2>
<div class="event_desc"><?php echo get_the_content($e_id);?></div>
</div>

</div>

</div> 

<div style="clear:both;"></div>

<?php get_footer(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $start_date_time_new;?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

// Get today's date and time
var now = new Date().getTime();

// Find the distance between now and the count down date
var distance = countDownDate - now;

// Time calculations for hours, minutes and seconds

let hours = Math.floor((distance / (1000 * 60 * 60)));

let seconds = Math.floor((distance / 1000) % 60);
let minutes = Math.floor((distance / 1000 / 60) % 60);



// Display the result in the element with id="demo"
document.getElementById("demo").innerHTML = hours + "h "
+ minutes + "m " + seconds + "s ";

// If the count down is finished, write some text
if (distance < 0) {
clearInterval(x);
document.getElementById("demo").innerHTML = "EXPIRED";
}
}, 1000);
</script>