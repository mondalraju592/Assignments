<?php
/*
* Template Name:Events Page
*/

get_header(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Productive Shop Assigment</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div class="container">

<div class="row pt-5">
<form method="post" name="Form" onsubmit="return validateForm()" action="">
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
<input type="text" name="event_name" placeholder="Search by Event name" id="event_name" class="event_name" <?php if(isset($_POST['event_name'])) {?>value="<?php echo $_POST['event_name'];?>"<?php } ?>>
</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
<select class="event_state" name="event_state_name" id="event_state">
<option value="-1">All</option> 
<option value="Alabama" <?php if(isset($_POST['Submit'])){if($_POST['event_state_name']=='Alabama') {?>selected="selected"<?php } } ?>>Alabama</option> 
<option value="Alaska" <?php if(isset($_POST['Submit'])){if($_POST['event_state_name']=='Alaska') {?>selected="selected"<?php } } ?>>Alaska</option> 
<option value="Arizona" <?php if(isset($_POST['Submit'])){if($_POST['event_state_name']=='Arizona') {?>selected="selected"<?php } } ?>>Arizona</option>
<option value="California" <?php if(isset($_POST['Submit'])){if($_POST['event_state_name']=='California') {?>selected="selected"<?php } } ?>>California</option> 			   
<option value="Florida" <?php if(isset($_POST['Submit'])){if($_POST['event_state_name']=='Florida') {?>selected="selected"<?php } } ?>>Florida</option> 

</select>
</div>
<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
<button type="submit" name="Submit" id="Submit" class="search_cus">Search  <i class="fa fa-search"></i></button>
</div>
</form>
</div>

<div class="row publication-list">
<?php
if(isset($_POST['Submit'])){


if(isset($_POST['event_name'])) {
if($_POST['event_name']!=''){
$event_name = $_POST['event_name'];
}else{
$event_name ="none";
}
}

if(isset($_POST['event_state_name'])) {
$event_state = $_POST['event_state_name'];
}

$args = array(
'post_type' => 'event_list',
'post_status'  => 'publish',
'posts_per_page' => -1,
'orderby' => 'meta_value',
'meta_key' => 'event_start_date_time',
'order' => 'DESC',
'meta_query' => array(
'relation' => 'OR',
array(
'key' => 'event_name',
'value' => $event_name,
'compare' => 'like'
),
array(
'key' => 'event_state_nm',
'value' => $event_state,
'compare' => 'like'
)
)

);

}else{


$args = array(
'post_type' => 'event_list',
'post_status'  => 'publish',
'posts_per_page' => 6,
'orderby' => 'meta_value',
'meta_key' => 'event_start_date_time',
'order' => 'DESC',
'paged' => 1
);

}

$query = new WP_Query( $args );
?>

<?php
if ( $query->have_posts() ) : while ( $query-> have_posts() ) : $query-> the_post();

$event_list_image = wp_get_attachment_image_src( get_post_thumbnail_id( $query->post->ID ), 'single-post-thumbnail' );
$event_start_date_time = get_field('event_start_date_time');
$event_end_date_time = get_field('event_end_date_time');

$start_date_time = date("M j | g:iA",strtotime(get_field('event_start_date_time', $query->post->ID)));
$start_date_time_arr = explode(" | ", date("M j | g:iA",strtotime(get_field('event_start_date_time', $query->post->ID))));

$start_date = $start_date_time_arr[0];
$start_time = $start_date_time_arr[1];

$end_date_time = date("j, Y | g:iA",strtotime(get_field('event_end_date_time', $query->post->ID)));
$end_date_time_arr = explode(" | ", date("j, Y | g:iA",strtotime(get_field('event_end_date_time', $query->post->ID))));

$end_date = $end_date_time_arr[0];
$end_time = $end_date_time_arr[1];

$meet_us_button_label = get_field('meet_us_button_label');

$cur_date_time = date("Y-m-d H:i:s", time());
$cur_date_time_str = strtotime($cur_date_time);
$event_end_date_time_str = strtotime($event_end_date_time);

?>


<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cus_event_sec clearfix">
<a href="<?php the_permalink();?>">
<img src="<?php  echo $event_list_image[0]; ?>" alt="<?php the_title();?>" class="img-responsive">
</a>
<div class="event_desc_sec">

<div class="event_status_sec">
<?php if($cur_date_time_str>$event_end_date_time_str){?>
<span class="past_event">PAST EVENT</span>
<?php } ?>
<span class="date_sec"><?php if($start_date){?><?php echo $start_date;?><?php } ?><?php if($end_date){?>-<?php echo $end_date;?><?php } ?></span>
</div> 

<h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
<p class="event_excerpt"><?php if ( has_excerpt() ) {?><?php echo strip_tags(get_the_excerpt($query->post->ID));?><?php } ?></p>
<a href="<?php the_permalink();?>" class="event_permalink"><?php if($meet_us_button_label!=''){?><?php echo $meet_us_button_label;?> <i class="fa fa-arrow-right" aria-hidden="true"></i>
<?php }else{?>MEET US <i class="fa fa-arrow-right" aria-hidden="true"></i><?php } ?></a>
</div>
</div>

<?php
endwhile;
endif;
wp_reset_postdata(); // this should be inside if - there is no need to rested postdata if the_post hasn’t been called.
?>

</div>

<?php if(isset($_POST['Submit'])){ }else{?>
<div class="btn__wrapper">
<a href="javascript:void(0)" class="btn btn__primary" id="load-more">View more</a>
<?php } ?>

</div>


</div>


<?php get_footer(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>
let currentPage = 1;
var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
$('#load-more').on('click', function() {
currentPage++; // Do currentPage + 1, because we want to load the next page

$.ajax({
type: 'POST',
url: ajaxurl,
dataType: 'json',
data: {
action: 'weichie_load_more',
paged: currentPage,
},
success: function (res) {
if(currentPage >= res.max) {
$('#load-more').hide();
}
$('.publication-list').append(res.html);
}
});
});
</script>

<script>
<!--
// Form validation code will come here.
function validateForm() {

if( document.Form.event_name.value == "" ) {
alert( "Please provide event name!" );
document.Form.event_name.focus() ;
return false;
}

/*if( document.Form.event_state.value == "-1" ) {
alert( "Please provide event State!" );
return false;
}*/
return( true );
}

</script>