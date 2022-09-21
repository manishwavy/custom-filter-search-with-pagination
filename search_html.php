<?php
/*
	Template Name:Search page
*/

get_header();
global $wpdb;
$prefix = $wpdb->prefix;
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
<style>

dl, ol, ul {  
    margin-bottom: 0;
}

	.paginations {
    text-align: center;
    padding: 20px 0 0;
}
.paginations .cvf-universal-pagination ul li.selected {
    background: var( --e-global-color-accent );
    color: white;
}
.paginations .cvf-universal-pagination ul li {
    display: inline;
    margin: 1px;
    padding: 5px 10px;
    border-radius: 0;
    background: #FFF;
    color: #c3bfbf;
    font-size: 15px;
    font-family: 'PT Sans';
    font-weight: 600;
}
.serach-products a:hover {
    text-decoration: none;
}
.paginations .cvf-universal-pagination ul li.active:hover {
    cursor: pointer;
    background: #088587;
    color: white;
}
	.serach-products .detail {
    padding: 10px;
}
 .filter-search select{
    border: 1px solid;
    border-color: var( --e-global-color-ea47fe3 );
    border-radius: 0;
	font-family: var( --e-global-typography-71b6fbc-font-family ), Sans-serif;
	word-spacing: var( --e-global-typography-6fdd34c-word-spacing );
    color: var( --e-global-color-547613f );
}
.filter-search select#city{
   opacity: unset;
}
	.elementor-kit-2906 .filter-search input:not([type="button"]):not([type="submit"]){
    border: 1px solid;
    border-color: var( --e-global-color-ea47fe3 );
    border-radius: 0;
	font-family: var( --e-global-typography-71b6fbc-font-family ), Sans-serif;
	word-spacing: var( --e-global-typography-6fdd34c-word-spacing );
    color: var( --e-global-color-547613f );
	font-size:1rem;
	line-height: inherit;
}
	button.submit-filter {
    background: #000;
    padding: 30px 13px;
    width: 100%;
    display: block;
    text-align: center;
    color: #fff;
    font-weight: 600;
    text-transform: uppercase;
    font-family: 'PT Sans';
    letter-spacing: 1px;
	border:none;
	border-radius:6px;
		
}
	button.submit-filter:hover {
    color: #fff;
	cursor:pointer;
	border:none;
}
	.filter-search {
    padding-top: 30px;
    padding-bottom: 0px;
}
	.overflow-hide{
		overflow-y:hidden
	}
	
	.sidenav-filter {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 10;
  top: 0;
  right: -30px;
  background-color: rgb(17 17 17 / 100%);
  overflow-x: hidden;
  transition: 0.5s;
  padding: 20px 15px 20px;
}

.sidenav-filter a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #fff;
  display: block;
  transition: 0.3s;
}

.sidenav-filter a:hover {
  color: #f1f1f1;
}

.sidenav-filter .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

/**********************************/
	
	.range-main {
    padding: 0 20px;
		
}
	.sidenav-filter h3 {
    color: #fff;
    font-size: 16px;
    margin-bottom: 8px;
	font-weight: 600;
	font-family: "Merriweather Sans", Sans-serif;
}
	.range-values{
		font-family: "Merriweather Sans", Sans-serif;
		padding: 22px 0 15px;
    display: flex;
		justify-content: space-between;
	}
	.elementor-kit-2906 .range-values input:not([type="button"]):not([type="submit"]){
	display: inline-flex;
    width: auto;
    background-color: transparent;
    border: none;
    color: #fff;
	padding:0;
	text-align:center;
	}
	.elementor-kit-2906 .range-slider input:not([type="button"]):not([type="submit"]){
	background-color: transparent;
    border: none;
	padding:8px 0;
		
	}
	.range-slider {
  width: 100%;
  margin: auto;
  text-align: center;
  position: relative;
}
.closebtn svg {
    width: 14px;
    height: 14px;
    fill: #fff;
}
.range-slider input[type=range] {
  position: absolute;
  left: 0;
  top: 0;
}
	.advance-filter-btns {
    display: flex;
/*     justify-content:space-evenly; */
	margin-top:15px;
	 gap: 16px;
    padding: 0 10px;
}
	.advance-filter-btns a {
    background: #ff701e;
    padding: 12px 13px;
    display: block;
    text-align: center;
    color: #fff;
    font-weight: 600;
    text-transform: uppercase;
    font-family: 'PT Sans';
    letter-spacing: 1px;
    border: none;
    font-size: 16px;
}
	.advance-filter-btns a:hover {
		background:#078586
    
}
	.sideFilter-margin{
		margin-right:-350px
	}
  .select2-selection {
    min-height: 100%;
    line-height: normal;
    padding: 0;
}	
.select2-results__option {
  padding-right: 20px;
  vertical-align: middle;
}
.select2-results__option:before {
  content: "";
  display: inline-block;
  position: relative;
  height: 20px;
  width: 20px;
  border: 2px solid #e9e9e9;
  border-radius: 4px;
  background-color: #fff;
  margin-right: 20px;
  vertical-align: middle;
}
.select2-results__option[aria-selected=true]:before {
  font-family:fontAwesome;
  content: "\f00c";
  color: #fff;
  background-color: #f77750;
  border: 0;
  display: inline-block;
  padding-left: 3px;
}
.select2-container--default .select2-results__option[aria-selected=true] {
	background-color: #fff;
}
.select2-container--default .select2-results__option--highlighted[aria-selected] {
	background-color: #eaeaeb;
	color: #272727;
}
.select2-container--default .select2-selection--multiple {
	margin-bottom: 10px;
}
.select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
	border-radius: 4px;
}
.select2-container--default.select2-container--focus .select2-selection--multiple {
	border-color: #f77750;
	border-width: 1px;
	
}
	.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    position: relative;
}
	.select2-container--default .select2-selection--multiple .select2-selection__rendered {
    padding: 0 0px;
}
.select2-container--default .select2-selection--multiple {
	border-width: 2px;
	margin-bottom:0;
	padding:.5rem 1rem;
	border: 1px solid #ededed;
}
.select2-container--open .select2-dropdown--below {
	
	border-radius: 6px;
	box-shadow: 0 0 10px rgba(0,0,0,0.5);
}

.select2-container .select2-search--inline .select2-search__field {
    margin-top: 0;
    margin-left: 0;
    padding: 0;
    padding: 0 !important;
    height: 100%;
	border: none !important;
}	

.lds-roller {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-roller div {
  animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  transform-origin: 40px 40px;
}
.lds-roller div:after {
  content: " ";
  display: block;
  position: absolute;
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: #000;
  margin: -4px 0 0 -4px;
}
.lds-roller div:nth-child(1) {
  animation-delay: -0.036s;
}
.lds-roller div:nth-child(1):after {
  top: 63px;
  left: 63px;
}
.lds-roller div:nth-child(2) {
  animation-delay: -0.072s;
}
.lds-roller div:nth-child(2):after {
  top: 68px;
  left: 56px;
}
.lds-roller div:nth-child(3) {
  animation-delay: -0.108s;
}
.lds-roller div:nth-child(3):after {
  top: 71px;
  left: 48px;
}
.lds-roller div:nth-child(4) {
  animation-delay: -0.144s;
}
.lds-roller div:nth-child(4):after {
  top: 72px;
  left: 40px;
}
.lds-roller div:nth-child(5) {
  animation-delay: -0.18s;
}
.lds-roller div:nth-child(5):after {
  top: 71px;
  left: 32px;
}
.lds-roller div:nth-child(6) {
  animation-delay: -0.216s;
}
.lds-roller div:nth-child(6):after {
  top: 68px;
  left: 24px;
}
.lds-roller div:nth-child(7) {
  animation-delay: -0.252s;
}
.lds-roller div:nth-child(7):after {
  top: 63px;
  left: 17px;
}
.lds-roller div:nth-child(8) {
  animation-delay: -0.288s;
}
.lds-roller div:nth-child(8):after {
  top: 56px;
  left: 12px;
}
@keyframes lds-roller {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}


.apartment-sec .content-img {
    height: 290px;
}

.apartment-sec .content-img img {
    height: 100%;
    object-fit: cover;
    width:100%;
}
.apartment-sec .content{
  box-shadow: 0px 3px 10px 0px rgb(45 58 83 / 7%)
}
.apartment-sec .detail h5 {
        font-size: 22px;
    font-weight: 600;
		padding-top: 10px;
}

.apartment-sec p#area {
    color: #7a7a7a;
}

.apartment-sec p#price {
    font-weight: 700;
	padding-bottom: 8px;
}

.apartment-sec p#price span{
    font-weight: normal;
    color: #7a7a7a;
}

.apartment-sec .more-info {
    border-top: 1px solid #F0F0F0;
    border-bottom: 1px solid #F0F0F0;
	margin-bottom: 30px;
}

.apartment-sec .more-info ul {
    column-count: 3;
	padding: 8px 10px;
    margin-bottom: 0;
	
}

.apartment-sec .more-info li {
    padding: 6px 0;
    color: #7a7a7a;
}


.select2-selection .select2-selection--multiple:after {
	content: 'hhghgh';
}
/* select with icons badges single*/
.select-icon .select2-selection__placeholder .badge {
	display: none;
}
.select-icon .placeholder {
/* 	display: none; */
}
.select-icon .select2-results__option:before,
.select-icon .select2-results__option[aria-selected=true]:before {
	display: none !important;
	/* content: "" !important; */
}
.select-icon  .select2-search--dropdown {
	display: none;
}
	
/***************************************************************************************/	

.custom-range-filter {
  width: 100%;
  border: 0;
  padding:0 10px;
  margin: 20px 0 0; 
}

.range-title {
  position: relative;
  color: #fff;
  font-size: 14px;
  line-height: 1.2em;
  font-weight: 400;
}

.range-field {
  position: relative;
  width: 100%;
  height: 36px;
  box-sizing: border-box;
/*   background: rgba(248, 247, 244, 0.2); */
  padding-top: 15px;
  /*padding-left: 16px;*/
  padding-right: 16px;
  border-radius: 3px;
}

.range-field input[type=range] {
    position: absolute;
}

/* Reset style for input range */

.range-field input[type=range] {
  width: 90%;
  border: none !important;
  outline: 0;
  box-sizing: border-box;
  border-radius: 5px;
  pointer-events: none;
  -webkit-appearance: none;
}

.range-field input[type=range]::-webkit-slider-thumb {
    -webkit-appearance: none;
}
.range-field input[type=range]::-moz-slider-thumb {
    -webkit-appearance: none;
}

.range-field input[type=range]:active,
.range-field input[type=range]:focus {
  outline: 0;
}

.range-field input[type=range]::-ms-track {
  width: 90%;
  height: 4px; 
  border: 0;
  outline: 0;
  box-sizing: border-box;
  border-radius: 5px;
  pointer-events: none;
  background: transparent;
  border-color: transparent;
  color: transparent;
  border-radius: 5px;
}

.range-field input[type=range]::-moz-track {
  width: 90%;
  height: 3px; 
  border: 0;
  outline: 0;
  box-sizing: border-box;
  border-radius: 5px;
  pointer-events: none;
  background: transparent;
  border-color: transparent;
  color: transparent;
  border-radius: 5px;
}

/* Style toddler input range */

.range-field input[type=range]::-webkit-slider-thumb { 
  /* WebKit/Blink */
    position: relative;
    -webkit-appearance: none;
    margin: 0;
    border: 0;
    outline: 0;
    border-radius: 50%;
    height: 12px;
    width: 12px;
    margin-top: -5px;
    background-color: #fff;
    cursor: pointer;
    cursor: pointer;
    pointer-events: all;
    z-index: 100;
}

.range-field input[type=range]::-moz-range-thumb { 
  /* Firefox */
  position: relative;
  appearance: none;
  margin: 0;
  border: 0;
  outline: 0;
  border-radius: 50%;
  height: 14px;
  width: 14px;
  margin-top: -5px;
  background-color: #ff701e;
  cursor: pointer;
  cursor: pointer;
  pointer-events: all;
  z-index: 100;
}

.range-field input[type=range]::-ms-thumb  { 
  /* IE */
  position: relative;
  appearance: none;
  margin: 0;
  border: 0;
  outline: 0;
  border-radius: 50%;
  height: 14px;
  width: 14px;
  margin-top: -5px;
  background-color: #ff701e;
  cursor: pointer;
  cursor: pointer;
  pointer-events: all;
  z-index: 100;
}

/* Style track input range */

.range-field input[type=range]::-webkit-slider-runnable-track { 
  /* WebKit/Blink */
  width: 188px;
  height: 2px;
  cursor: pointer;
  background: #fff;
  border-radius: 5px;
}

.range-field input[type=range]::-moz-range-track { 
  /* Firefox */
  width: 188px;
  height: 3px;
  cursor: pointer;
  background: #fff;
  border-radius: 5px;
}

.range-field input[type=range]::-ms-track { 
  /* IE */
  width: 188px;
  height: 3px;
  cursor: pointer;
  background: #fff;
  border-radius: 5px;
}

/* Style for input value block */

.range-wrap {
  display: flex;
  /*justify-content: space-between;*/
  color: #fff;
  font-size: 14px;
  line-height: 1.2em;
  font-weight: 400;
  margin-bottom: 7px;
}

.range-wrap-1, 
.range-wrap-2 {
  display: flex;
}

.range-title {
  margin-right: 5px;
  backgrund: #d58e32;
}

.range-wrap_line {
  margin: 0 4px;
}

.range-wrap input, 
.range-wrap input {
      width: 30px;
    text-align: right;
    margin: 0;
    padding: 0 !important;
    margin-right: 2px;
    background: 0;
    border: 0 !important;
    outline: 0;
    color: #fff !important;
    line-height: normal !important;
    font-weight: 400 !important;
    background: transparent !important;
}

.range-wrap label {
  text-align: right;
	color:#fff !important;
	margin:0;
}
.custom-range-filter h2 {
    color: #fff;
    font-size: 16px;
    margin-bottom: 8px;
    font-weight: 600;
    font-family: "Merriweather Sans", Sans-serif;
}
/* Style for active state input */
    
.range-field input[type=range]:hover::-webkit-slider-thumb {
  box-shadow: 0 0 0 0.5px #fff;
  transition-duration: 0.3s;
}
.range-field input[type=range]:hover::-moz-slider-thumb {
  box-shadow: 0 0 0 0.5px #fff;
  transition-duration: 0.3s;
}
.range-field input[type=range]:active::-webkit-slider-thumb {
  box-shadow: 0 0 0 0.5px #fff;
  transition-duration: 0.3s;
}	
.range-field input[type=range]:active::-moz-slider-thumb {
  box-shadow: 0 0 0 0.5px #fff;
  transition-duration: 0.3s;
}
.range-field input {
    padding: 0 !important;
}	
.select2-container--default.select2-container--disabled .select2-selection--multiple {
    background-color: #fff;
    cursor: default;
}
/**********************************************************************************************/	
	.sort-by-fliter{
		margin-top:30px	
	}
	.sort-by-fliter .sort-by-column{
		margin-bottom:0 !important
	}
	
.filter-search .row {
    row-gap: 4px;
}

.filter-search select#country,
.filter-search select#city,
.filter-search select#sortBy {    
    background-color: rgb(255,255,255);
    -webkit-appearance: none;    
}

@media (max-width: 2560px){
		.container-form{
    width:1450px;
    margin:0px auto;
  }
	}	
@media (max-width: 1500px){
		.container-form{
    width:auto;
    margin:0px auto;
  }
	}	
@media (min-width: 1200px)
{
/* .container {
    max-width: 1450px;
} */
.filter-search .col-md-3{
	margin-bottom:16px
}
	.filter-search .col-md-9{
	margin-bottom:16px
}
	
.multi-checkboxes_wrap:before{
    font-family:fontAwesome;
    color:#999;
    content:"\f096";
    width:25px;
    height:25px;
    padding-right: 10px;
    
}
.multi-checkboxes_wrap[aria-selected=true]:before{
    content:"\f14a";
}
}

@media (max-width: 1024px){
.filter-search button.submit-filter {
    font-size: 14px;    
    padding: 30px 6px;    
}
}

@media (max-width: 991px){
.filter-search button.submit-filter {
    margin-top: 20px;
}
}

@media (max-width: 767px){
.apartment-sec {
    margin: 0 4rem;
}

.filter-search select#country,
.filter-search select#city {
    padding: 8px 16px;
    font-size: 13px;    
}

.elementor-kit-2906 .filter-search input:not([type="button"]):not([type="submit"]) {
    font-size: 13px;
}

.page-id-13251 .select2-results__option {    
    font-size: 13px;
}

.page-id-13251 .select2-results__option:before {    
    height: 15px;
    width: 15px;    
    margin-right: 6px;    
}
/*.filter-search input#search,
.filter-search input#propertyId,
.filter-search select#sortBy {
    font-size: 16px;
}*/
}

@media (max-width: 540px){
.paginations .cvf-universal-pagination ul li {
    padding: 4px 7px;
    font-size: 14px;
}
.apartment-sec {
    margin: 0;
}
}

	@media screen and (max-height: 450px) {
  .sidenav-filter {padding-top: 15px;}
  .sidenav-filter a {font-size: 18px;}
}
.cvf_pag_loading {padding: 20px;}
.cvf-universal-pagination ul {margin: 0; padding: 0;}
.cvf-universal-pagination ul li {display: inline; margin: 3px; padding: 4px 8px; background: #FFF; color: black; }
.cvf-universal-pagination ul li.active:hover {cursor: pointer; background: #1E8CBE; color: white; }
.cvf-universal-pagination ul li.inactive {background: #7E7E7E;}
.cvf-universal-pagination ul li.selected {background: #1E8CBE; color: white;}
.select2-search__field::placeholder,#city::placeholder,input::placeholder{
  color:#000 !important;
}
</style>
<div class="container-form container-fluid filter-search">
<div class="row items-center">
<div class="col-lg-10">
	<div class="row items-center align-items-center">
	<div class="col-md-3 col-6 px-sm-3 px-1">
       <input type="text" name="search" id="search" placeholder="Search..." class="filter-input">
	</div>
	<?php

	?>
	<div class="col-md-3 col-6 px-sm-3 px-1">
  <select name="properties_type" id="properties" class="filterProperty js-select2"  multiple="multiple">
			<?php
				$sql_property_type = "SELECT meta_fields FROM `{$prefix}jet_post_types` WHERE `labels` LIKE '%Properties Type%' AND status='glossary'";
				$results_property_type = $wpdb->get_row($sql_property_type);
      
				$results_property_type = unserialize($results_property_type->meta_fields);
				foreach($results_property_type as $property_type)
				{
					?>
					<option value="<?php echo $property_type['value']; ?>"><?php echo $property_type['label']; ?></option>
					<?php
				}
			?>
		</select>
	

	</div>
	<div class="col-md-3 col-6 px-sm-3 px-1">
      <select name="status" id="status" class="js-select2 filterProperty"  multiple="multiple" >
          <?php
            $sql_completion = "SELECT meta_fields FROM `{$prefix}jet_post_types` WHERE `labels` LIKE '%Completion Status%' AND status='glossary'";
            $results_completion = $wpdb->get_row($sql_completion);
            $results_completion = unserialize($results_completion->meta_fields);
            foreach($results_completion as $completion_status)
            {
              ?>
            <option value="<?php echo $completion_status['value']; ?>"><?php echo $completion_status['label']; ?></option>
              <?php
            }
          ?>
      </select>
	</div>
	<div class="col-md-3 col-6 px-sm-3 px-1">
		<select name="amenities" id="amenities"  class="js-select2 filterProperty"  multiple="multiple">
			<?php
				$sql_amenities = "SELECT meta_fields FROM `{$prefix}jet_post_types` WHERE `labels` LIKE '%Amenities%' AND status='glossary'";
				$results_amenities = $wpdb->get_row($sql_amenities);
				$results_amenities = unserialize($results_amenities->meta_fields);
				foreach($results_amenities as $amenities)
				{
					?>
					<option value="<?php echo $amenities['value']; ?>"><?php echo $amenities['label']; ?></option>
					<?php
				}
			?>
		</select>
	</div>
	<div class="col-md-3 col-6 px-sm-3 px-1">
		<select name="accommodation" id="accommodation" class="js-select2 filterProperty"  multiple="multiple">
			<?php
				$sql_accommodation = "SELECT meta_fields FROM `{$prefix}jet_post_types` WHERE `labels` LIKE '%Accommodation%' AND status='glossary'";
				$results_accommodation = $wpdb->get_row($sql_accommodation);
				$results_accommodation = unserialize($results_accommodation->meta_fields);
				foreach($results_accommodation as $accommodation)
				{
					?>
					<option value="<?php echo $accommodation['value']; ?>"><?php echo $accommodation['label']; ?></option>
					<?php
				}
			?>
		</select>
	</div>
	<div class="col-md-3 col-6 px-sm-3 px-1">
		<select name="view" id="view" class="js-select2 filterProperty"  multiple="multiple">
			<?php
				$sql_view = "SELECT meta_fields FROM `{$prefix}jet_post_types` WHERE `labels` LIKE '%View%' AND status='glossary'";
				$results_view = $wpdb->get_row($sql_view);
				$results_view = unserialize($results_view->meta_fields);
				foreach($results_view as $view)
				{
					?>
					<option value="<?php echo $view['value']; ?>"><?php echo $view['label']; ?></option>
					<?php
				}
			?>
		</select>
	</div>
	<div class="col-md-3 col-6 px-sm-3 px-1">
 
	<select name="country" id="country" class="filterProperty">
      <option value="">Select Country</option>
      <?php 
          $categories = get_categories( array(
            'taxonomy'   => 'country',
            'orderby'    => 'name',
            'parent'     => 0,
            'hide_empty' => 0,
        ));
        foreach ( $categories as $category ) 
        {
          ?>
            <option value="<?php echo $category->name; ?>"><?php echo $category->name; ?></option>
          <?php
        }
      ?>
	</select>
	</div>
	<div class="col-md-3 col-6 px-sm-3 px-1">
		<select name="city" id="city" class="filterProperty" disabled>
    <option value=''>Select City</option>
    
		</select>
	</div>
	<div class="col-md-3 col-6 px-sm-3 px-1">
		<select name="area" id="area"  class="filterProperty js-select2" multiple="multiple" disabled>
    <option value=''>Select Area</option>
		</select>
	</div>
	<div class="col-md-3 col-6 px-sm-3 px-1">
		<input type="text" name="propertyId" id="propertyId" placeholder="Property Id" class="filter-input">
	</div>
		
	</div>
</div>
	
	<div class="col-lg-2">
		<button onclick="openNav()" class="submit-filter" data-info="close" data-check-reset="0">Advance Filters</button>

	<div id="filter-Sidenav" class="sidenav-filter">
    <form class="advanceFilter">
        <fieldset class="custom-range-filter">
        <h2>Price Range (€/$/AED):</h2>
          <div class="range-field">
            <input type="range"  min="100000" max="30000000" value="100000" step="1000" id="minPrice" class="filterProperty advanceFilter" id="minPrice">
            <input type="range" min="100000" max="30000000" value="30000000" step="1000" id="maxPrice"  class="filterProperty advanceFilter" id="maxPrice">
          </div>
          <div class="range-wrap">
            <div class="range-wrap-1">
              <div id="price-one">100,000</div>
            </div>
            <div class="range-wrap_line">-</div>
            <div class="range-wrap-2">
              <div id="price-two">30,000,000</div>
            </div>
          </div>
        </fieldset> 


        <fieldset class="custom-range-filter">
        <h2>Bedrooms</h2>
          <div class="range-field">
            <input type="range"  min="0" max="10" value="0" step="1" class="filterProperty advanceFilter" id="minBedroom">
            <input type="range" min="0" max="10" value="10" step="1"  class="filterProperty advanceFilter" id="maxBedroom">
          </div>
          <div class="range-wrap">
            <div class="range-wrap-1">
              <div id="Bedrooms-one">0</div>
            </div>
            <div class="range-wrap_line">-</div>
            <div class="range-wrap-2">
              <div id="Bedrooms-two">10</div>
            </div>
          </div>
        </fieldset> 

        <fieldset class="custom-range-filter">
        <h2>Bathrooms</h2>
          <div class="range-field">
            <input type="range"  min="0" max="10" value="0" step="1" class="filterProperty advanceFilter" id="minBathrooms">
            <input type="range" min="0" max="10" value="10" step="1"  class="filterProperty advanceFilter" id="maxBathrooms">
          </div>
          <div class="range-wrap">
            <div class="range-wrap-1">
              <div id="Bathrooms-one">0</div>
            </div>
            <div class="range-wrap_line">-</div>
            <div class="range-wrap-2">
              <div id="Bathrooms-two">10</div>
            </div>
          </div>
        </fieldset> 

        <fieldset class="custom-range-filter">
        <h2>Property Area</h2>
          <div class="range-field">
            <input type="range"  min="0" max="4000" value="0" step="100" class="filterProperty advanceFilter" id="minPropertyArea">
            <input type="range" min="0" max="4000" value="4000" step="100"  class="filterProperty advanceFilter" id="maxPropertyArea">
          </div>
          <div class="range-wrap">
            <div class="range-wrap-1">
              <div id="PropertyArea-one">0  Sq. m.</div>
            </div>
            <div class="range-wrap_line">-</div>
            <div class="range-wrap-2">
              <div id="PropertyArea-two">4000 Sq. m.</div>
            </div>
          </div>
        </fieldset> 

        <fieldset class="custom-range-filter">
        <h2>Covered Area</h2>
          <div class="range-field">
            <input type="range"  min="0" max="3000" value="0" step="100" class="filterProperty advanceFilter" id="minAreaSize">
            <input type="range" min="0" max="3000" value="3000" step="100"  class="filterProperty advanceFilter" id="maxAreaSize">
          </div>
          <div class="range-wrap">
            <div class="range-wrap-1">
              <div id="AreaSize-one">0 Sq. m.</div>
            </div>
            <div class="range-wrap_line">-</div>
            <div class="range-wrap-2">
              <div id="AreaSize-two">3000 Sq. m.</div>
            </div>
          </div>
        </fieldset> 
        <fieldset class="custom-range-filter">
        <h2>Year Build</h2>
          <div class="range-field">
            <input type="range"  min="1980" max="2022" value="1980" step="1" class="filterProperty advanceFilter" id="minYearBuilt">
            <input type="range" min="1980" max="2022" value="2022" step="1"  class="filterProperty advanceFilter" id="maxYearBuilt">
          </div>
          <div class="range-wrap">
            <div class="range-wrap-1">
              <div id="YearBuilt-one">1980</div>
            </div>
            <div class="range-wrap_line">-</div>
            <div class="range-wrap-2">
              <div id="YearBuilt-two">2022</div>
            </div>
          </div>
        </fieldset> 
          <div class="advance-filter-btns">
            <a href="#" onclick="closeNav()">Apply Filter</a>
            <a href="#" class="resetform d-none">Reset Filter</a>
          </div>
      </form>
  </div>
	</div>
<div class="col-md-12 sort-by-fliter">
		<div class="row">
		  <div class="col-md-2 col-6 sort-by-column px-sm-3 px-1">
			  <select name="sortBy" id="sortBy" class="filterProperty">
   				 <option value=''>Sort By</option>
				 <option value="date-desc">Date Added (Newest)</option>
				<option value="date-asc">Date Added (Oldest)</option>
				<option value="price-desc">Price highest to lowest</option>
				<option value="price-asc">Price Lowest to Highest</option>
		  </select>
		  </div>
			</div>
	</div>
</div>
</div>

<div class="apartment-sec py-5 serach-products">
		<div class="container-form container-fluid">
			<div class="row listingData">
				
			</div>

      <div class="row">
        <div class="col-md-12 paginations"></div>
      </div>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>

<script>
$("#country").change(function(){
  $("#city").attr("disabled","disabled");
    $("#city").val("");
    $("#area").attr("disabled","disabled");
    $("#area").select2("val", "");
    $("#area").val("");
    $("#area").trigger("change");
  var this_c = $(this).val();
  var option = `<option value=''>Select City</option>`;
  if(this_c != ''){
    let ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
		jQuery.ajax({
			type : "POST",
			data : {
        action : "citySearch",
        country : this_c
      },
			url : ajax_url,
      beforeSend:function(){
        $("#city").attr("disabled","disabled");
        $("#area").attr("disabled","disabled");
      },
			success : function(response){
        var jsondata = JSON.parse(response);
        //console.log(jsondata);
        jsondata.forEach(function(data){
          option += `<option value="${data}">${data}</option>`;
        });
        $("#city").html(option);
        $("#city").removeAttr("disabled");
			}
		});
  }
  else{
    $(this).val('');
    $("#city").attr("disabled","disabled");
    $("#city").val("");
    $("#area").attr("disabled","disabled");
    $("#area").select2("val", "");
    $("#area").val("");
    $("#area").trigger("change");
  }
});

$("#city").change(function(){
  var this_c = $(this).val();
  var optionArea = `<option value=''>Select Area</option>`;
  if(this_c != ''){
    let ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
		jQuery.ajax({
			type : "POST",
			data : {
        action : "areaSearch",
        city : this_c
      },
			url : ajax_url,
			success : function(response){
        var jsondata = JSON.parse(response);
        jsondata.forEach(function(data){
          optionArea += `<option value="${data}">${data}</option>`;
        });
        $("#area").html(optionArea);
        $("#area").removeAttr("disabled");
			}
		});
  }
  else{
    $("#area").html(`<option value=''>Select Area</option>`);
    $("#area").attr("disabled","disabled");
  }
});

function openNav() {
  document.getElementById("filter-Sidenav").style.width = "400px";
	jQuery('body').addClass('overflow-hide');
	jQuery('.sidenav-filter').removeClass('sideFilter-margin');
  jQuery('.submit-filter').attr("data-info","open");
}

function closeNav() {
  document.getElementById("filter-Sidenav").style.width = "0";
	jQuery('body').removeClass('overflow-hide');
	jQuery('.sidenav-filter').addClass('sideFilter-margin');
  jQuery('.submit-filter').attr("data-info","close");
}
</script>
<script>
var minSliderPrice = document.querySelector('#minPrice');
var  maxSliderPrice = document.querySelector('#maxPrice');
document.querySelector('#price-two').value=maxSliderPrice.value;
document.querySelector('#price-one').value=minSliderPrice.value;
var  minVal = parseInt(minSliderPrice.value);
var maxVal = parseInt(maxSliderPrice.value);
maxSliderPrice.oninput = function () {
    minVal = parseInt(minSliderPrice.value);
    maxVal = parseInt(maxSliderPrice.value);

    if (maxVal < minVal + 4) {
        minSliderPrice.value = maxVal - 4;
        if (minVal == minSliderPrice.min) {
        maxSliderPrice.value = 4;
        }
    }
    var prices =  Number(this.value);
    prices = prices.toLocaleString("en-US");
    document.querySelector('#price-two').innerHTML=prices;
};
minSliderPrice.oninput = function () {
    minVal = parseInt(minSliderPrice.value);
    maxVal = parseInt(maxSliderPrice.value);
    if (minVal > maxVal - 4) {
        maxSliderPrice.value = minVal + 4;
        if (maxVal == maxSliderPrice.max) {
            minSliderPrice.value = parseInt(maxSliderPrice.max) - 4;
        }
    }
    var price = Number(this.value);
    price = price.toLocaleString("en-US");
    document.querySelector('#price-one').innerHTML=price;
};



var minSliderBedrooms = document.querySelector('#minBedroom');
var  maxSliderBedrooms = document.querySelector('#maxBedroom');
document.querySelector('#Bedrooms-two').value=maxSliderBedrooms.value;
document.querySelector('#Bedrooms-one').value=minSliderBedrooms.value;
var  minVal = parseInt(minSliderBedrooms.value);
var maxVal = parseInt(maxSliderBedrooms.value);
maxSliderBedrooms.oninput = function () {
    minVal = parseInt(minSliderBedrooms.value);
    maxVal = parseInt(maxSliderBedrooms.value);

    if (maxVal < minVal + 1) {
        minSliderBedrooms.value = maxVal - 1;
        if (minVal == minSliderBedrooms.min) {
        maxSliderBedrooms.value = 1;
        }
    }
    document.querySelector('#Bedrooms-two').innerHTML=this.value
};
minSliderBedrooms.oninput = function () {
    minVal = parseInt(minSliderBedrooms.value);
    maxVal = parseInt(maxSliderBedrooms.value);
    if (minVal > maxVal - 1) {
        maxSliderBedrooms.value = minVal + 1;
        if (maxVal == maxSliderBedrooms.max) {
            minSliderBedrooms.value = parseInt(maxSliderBedrooms.max) - 1;
        }
    }
    document.querySelector('#Bedrooms-one').innerHTML=this.value;
};



var minSliderBathrooms = document.querySelector('#minBathrooms');
var  maxSliderBathrooms = document.querySelector('#maxBathrooms');
document.querySelector('#Bathrooms-two').value=maxSliderBathrooms.value;
document.querySelector('#Bathrooms-one').value=minSliderBathrooms.value;
var  minVal = parseInt(minSliderBathrooms.value);
var maxVal = parseInt(maxSliderBathrooms.value);
maxSliderBathrooms.oninput = function () {
    minVal = parseInt(minSliderBathrooms.value);
    maxVal = parseInt(maxSliderBathrooms.value);

    if (maxVal < minVal + 1) {
        minSliderBathrooms.value = maxVal - 1;
        if (minVal == minSliderBathrooms.min) {
        maxSliderBathrooms.value = 1;
        }
    }
    document.querySelector('#Bathrooms-two').innerHTML=this.value
};
minSliderBathrooms.oninput = function () {
    minVal = parseInt(minSliderBathrooms.value);
    maxVal = parseInt(maxSliderBathrooms.value);
    if (minVal > maxVal - 1) {
        maxSliderBathrooms.value = minVal + 1;
        if (maxVal == maxSliderBathrooms.max) {
            minSliderBathrooms.value = parseInt(maxSliderBathrooms.max) - 1;
        }
    }
    document.querySelector('#Bathrooms-one').innerHTML=this.value
};


var minSliderPropertyArea = document.querySelector('#minPropertyArea');
var  maxSliderPropertyArea = document.querySelector('#maxPropertyArea');
document.querySelector('#PropertyArea-two').value=maxSliderPropertyArea.value;
document.querySelector('#PropertyArea-one').value=minSliderPropertyArea.value;
var  minVal = parseInt(minSliderPropertyArea.value);
var maxVal = parseInt(maxSliderPropertyArea.value);
maxSliderPropertyArea.oninput = function () {
    minVal = parseInt(minSliderPropertyArea.value);
    maxVal = parseInt(maxSliderPropertyArea.value);

    if (maxVal < minVal + 100) {
        minSliderPropertyArea.value = maxVal - 100;
        if (minVal == minSliderPropertyArea.min) {
        maxSliderPropertyArea.value = 100;
        }
    }
    document.querySelector('#PropertyArea-two').innerHTML=this.value
};
minSliderPropertyArea.oninput = function () {
    minVal = parseInt(minSliderPropertyArea.value);
    maxVal = parseInt(maxSliderPropertyArea.value);
    if (minVal > maxVal - 100) {
        maxSliderPropertyArea.value = minVal + 100;
        if (maxVal == maxSliderPropertyArea.max) {
            minSliderPropertyArea.value = parseInt(maxSliderPropertyArea.max) - 100;
        }
    }
    document.querySelector('#PropertyArea-one').innerHTML=this.value
};



var minSliderAreaSize = document.querySelector('#minAreaSize');
var  maxSliderAreaSize = document.querySelector('#maxAreaSize');
document.querySelector('#AreaSize-two').value=maxSliderAreaSize.value;
document.querySelector('#AreaSize-one').value=minSliderAreaSize.value;
var  minVal = parseInt(minSliderAreaSize.value);
var maxVal = parseInt(maxSliderAreaSize.value);
maxSliderAreaSize.oninput = function () {
    minVal = parseInt(minSliderAreaSize.value);
    maxVal = parseInt(maxSliderAreaSize.value);

    if (maxVal < minVal + 100) {
        minSliderAreaSize.value = maxVal - 100;
        if (minVal == minSliderAreaSize.min) {
        maxSliderAreaSize.value = 100;
        }
    }
    document.querySelector('#AreaSize-two').innerHTML=this.value
};
minSliderAreaSize.oninput = function () {
    minVal = parseInt(minSliderAreaSize.value);
    maxVal = parseInt(maxSliderAreaSize.value);
    if (minVal > maxVal - 100) {
        maxSliderAreaSize.value = minVal + 100;
        if (maxVal == maxSliderAreaSize.max) {
            minSliderAreaSize.value = parseInt(maxSliderAreaSize.max) - 100;
        }
    }
    document.querySelector('#AreaSize-one').innerHTML=this.value
};
var minSliderYearBuilt = document.querySelector('#minYearBuilt');
var  maxSliderYearBuilt = document.querySelector('#maxYearBuilt');
document.querySelector('#YearBuilt-two').value=maxSliderYearBuilt.value;
document.querySelector('#YearBuilt-one').value=minSliderYearBuilt.value;
var  minVal = parseInt(minSliderYearBuilt.value);
var maxVal = parseInt(maxSliderYearBuilt.value);
maxSliderYearBuilt.oninput = function () {
    minVal = parseInt(minSliderYearBuilt.value);
    maxVal = parseInt(maxSliderYearBuilt.value);

    if (maxVal < minVal + 1) {
        minSliderYearBuilt.value = maxVal - 1;
        if (minVal == minSliderYearBuilt.min) {
        maxSliderYearBuilt.value = 1;
        }
    }
    document.querySelector('#YearBuilt-two').innerHTML=this.value
};
minSliderYearBuilt.oninput = function () {
    minVal = parseInt(minSliderYearBuilt.value);
    maxVal = parseInt(maxSliderYearBuilt.value);
    if (minVal > maxVal - 1) {
        maxSliderYearBuilt.value = minVal + 1;
        if (maxVal == maxSliderYearBuilt.max) {
            minSliderYearBuilt.value = parseInt(maxSliderYearBuilt.max) - 1;
        }
    }
    document.querySelector('#YearBuilt-one').innerHTML=this.value
};


</script>
<script>


    $("#properties").select2({
			closeOnSelect : false,
			placeholder : "Select Properties",
			allowHtml: true,
			allowClear: true,
			tags: true
		});

    $("#status").select2({
			closeOnSelect : false,
			placeholder : "Completion Status",
			allowHtml: true,
			allowClear: true,
			tags: true
		});
    $("#amenities").select2({
			closeOnSelect : false,
			placeholder : "Select Amenities",
			allowHtml: true,
			allowClear: true,
			tags: true
		});
    $("#view").select2({
			closeOnSelect : false,
			placeholder : "Select Views",
			allowHtml: true,
			allowClear: true,
			tags: true
		});
    $("#accommodation").select2({
			closeOnSelect : false,
			placeholder : "Select Accommodation",
			allowHtml: true,
			allowClear: true,
			tags: true
		});
    $("#area").select2({
			closeOnSelect : false,
			placeholder : "Select Area",
			allowHtml: true,
			allowClear: true,
			tags: true
		});

    $(".js-select2").change(function(){
    var selectElement = $(this).parent().find(".select2-selection__choice");
    var selectionRendered = $(this).parent().find(".select2-selection__rendered");
    var selectionPlaceholder = $(this).parent().find(".select2-search__field").attr("placeholder");

    var lengths = $(selectElement).length;
    if(lengths != 0)
    {
      $(selectionRendered).html(`<li>${lengths} Selected</li>`);
    }
    else{
      $(selectionRendered).html(`<li>${selectionPlaceholder}</li>`);
    }

  });
</script>


<script>
  
    var page = 1;
    var propertyId = jQuery("#propertyId").val();
		var search = jQuery("#search").val();
		var propertiesType = jQuery("#properties").val();
		var status = jQuery("#status").val();
    var amenities = jQuery("#amenities").val();
    var accommodation = jQuery("#accommodation").val();
    var view = jQuery("#view").val();
    var country = jQuery("#country").val();
    var city = jQuery("#city").val();
    var area = jQuery("#area").val();
    var minPrice = jQuery("#minPrice").val();
    var maxPrice = jQuery("#maxPrice").val();
    var minBedroom = jQuery("#minBedroom").val();
    var maxBedroom = jQuery("#maxBedroom").val();
    var minBathrooms = jQuery("#minBathrooms").val();
    var maxBathrooms = jQuery("#maxBathrooms").val();
    var minPropertyArea = jQuery("#minPropertyArea").val();
    var maxPropertyArea = jQuery("#maxPropertyArea").val();
    var minAreaSize = jQuery("#minAreaSize").val();
    var maxAreaSize = jQuery("#maxAreaSize").val();
    var minYearBuilt = jQuery("#minYearBuilt").val();
    var maxYearBuilt = jQuery("#maxYearBuilt").val();
    var sortBy = jQuery("#sortBy").val();
    var advanceCheck = jQuery(".submit-filter").attr('data-info');
    var data = {
      page:page,
			search:search,
			propertiesType:propertiesType,
			status:status,
      amenities:amenities,
      accommodation:accommodation,
      view:view,
      country:country,
      city:city,
      area:area,
    
      propertyId:propertyId,
      sortBy : sortBy,
			action:"customSearch"
		};
    if(advanceCheck != 'close')
    {   
      var advance = {
      minPrice : minPrice,
      maxPrice : maxPrice,
      minBedroom : minBedroom,
      maxBedroom : maxBedroom,
      minBathrooms : minBathrooms,
      maxBathrooms : maxBathrooms,
      minPropertyArea : minPropertyArea,
      maxPropertyArea : maxPropertyArea,
      minAreaSize : minAreaSize,
      maxAreaSize : maxAreaSize,
      minYearBuilt : minYearBuilt,
      maxYearBuilt : maxYearBuilt
    };

    }
    else{
      var advance = {};
    }
 
    var finalJson = Object.assign({}, data, advance);
		Ajaxdata(finalJson);


	jQuery(document).on("input change",".filter-input,.filterProperty",function(){
    var page = 1;
    var propertyId = jQuery("#propertyId").val();
		var search = jQuery("#search").val();
		var propertiesType = jQuery("#properties").val();
		var status = jQuery("#status").val();
    var amenities = jQuery("#amenities").val();
    var accommodation = jQuery("#accommodation").val();
    var view = jQuery("#view").val();
    var country = jQuery("#country").val();
    var city = jQuery("#city").val();
    var area = jQuery("#area").val();
    var minPrice = jQuery("#minPrice").val();
    var maxPrice = jQuery("#maxPrice").val();
    var minBedroom = jQuery("#minBedroom").val();
    var maxBedroom = jQuery("#maxBedroom").val();
    var minBathrooms = jQuery("#minBathrooms").val();
    var maxBathrooms = jQuery("#maxBathrooms").val();
    var minPropertyArea = jQuery("#minPropertyArea").val();
    var maxPropertyArea = jQuery("#maxPropertyArea").val();
    var minAreaSize = jQuery("#minAreaSize").val();
    var maxAreaSize = jQuery("#maxAreaSize").val();
    var minYearBuilt = jQuery("#minYearBuilt").val();
    var maxYearBuilt = jQuery("#maxYearBuilt").val();
    var sortBy = jQuery("#sortBy").val();
    var advanceCheck = jQuery(".submit-filter").attr('data-info');
		var data = {
			search:search,
      page:page,
			propertiesType:propertiesType,
			status:status,
      amenities:amenities,
      accommodation:accommodation,
      view:view,
      country:country,
      city:city,
      area:area,
      propertyId:propertyId,
      sortBy : sortBy,
   
			action:"customSearch"
		};
    if(advanceCheck != 'close')
    {
    var advance = {
      minPrice : minPrice,
      maxPrice : maxPrice,
      minBedroom : minBedroom,
      maxBedroom : maxBedroom,
      minBathrooms : minBathrooms,
      maxBathrooms : maxBathrooms,
      minPropertyArea : minPropertyArea,
      maxPropertyArea : maxPropertyArea,
      minAreaSize : minAreaSize,
      maxAreaSize : maxAreaSize,
      minYearBuilt : minYearBuilt,
      maxYearBuilt : maxYearBuilt
    };
  }
  else{
    var advance = {};
  }
    var finalJson = Object.assign({}, data, advance);
		Ajaxdata(finalJson);
	});


  $(document).on("click",".cvf-universal-pagination li.active",function(){
      var page = $(this).attr('p');
      var propertyId = jQuery("#propertyId").val();
      var search = jQuery("#search").val();
      var propertiesType = jQuery("#properties").val();
      var status = jQuery("#status").val();
      var amenities = jQuery("#amenities").val();
      var accommodation = jQuery("#accommodation").val();
      var view = jQuery("#view").val();
      var country = jQuery("#country").val();
      var city = jQuery("#city").val();
      var area = jQuery("#area").val();
      var minPrice = jQuery("#minPrice").val();
      var maxPrice = jQuery("#maxPrice").val();
      var minBedroom = jQuery("#minBedroom").val();
      var maxBedroom = jQuery("#maxBedroom").val();
      var minBathrooms = jQuery("#minBathrooms").val();
      var maxBathrooms = jQuery("#maxBathrooms").val();
      var minPropertyArea = jQuery("#minPropertyArea").val();
      var maxPropertyArea = jQuery("#maxPropertyArea").val();
      var minAreaSize = jQuery("#minAreaSize").val();
      var maxAreaSize = jQuery("#maxAreaSize").val();
      var minYearBuilt = jQuery("#minYearBuilt").val();
      var maxYearBuilt = jQuery("#maxYearBuilt").val();
      var sortBy = jQuery("#sortBy").val();
      var advanceCheck = jQuery(".submit-filter").attr('data-info');
      var data = {
        page:page,
        search:search,
        propertiesType:propertiesType,
        status:status,
        amenities:amenities,
        accommodation:accommodation,
        view:view,
        country:country,
        city:city,
        area:area,
        propertyId:propertyId,
        sortBy : sortBy,
       
        action:"customSearch"
      };
      if(advanceCheck != 'close')
    {
      var advance = {
      minPrice : minPrice,
      maxPrice : maxPrice,
      minBedroom : minBedroom,
      maxBedroom : maxBedroom,
      minBathrooms : minBathrooms,
      maxBathrooms : maxBathrooms,
      minPropertyArea : minPropertyArea,
      maxPropertyArea : maxPropertyArea,
      minAreaSize : minAreaSize,
      maxAreaSize : maxAreaSize,
      minYearBuilt : minYearBuilt,
      maxYearBuilt : maxYearBuilt
    };
  }
  else{
    var advance = {};
  }
    var finalJson = Object.assign({}, data, advance);
      Ajaxdata(finalJson);
      window.scrollTo(0, 0);
  });



$(".resetform").click(function(){
  $(".advanceFilter").trigger("reset");
  $(".submit-filter").attr("data-check-reset","0");
  $(".resetform").addClass("d-none");
  $("#price-one").html(Number($("#minPrice").attr("min")).toLocaleString("en-US"));
  $("#price-two").html(Number($("#maxPrice").attr("max")).toLocaleString("en-US"));

  $("#Bedrooms-one").html($("#minBedroom").attr("min"));
  $("#Bedrooms-two").html($("#maxBedroom").attr("max"));

  $("#Bathrooms-one").html($("#minBathrooms").attr("min"));
  $("#Bathrooms-two").html($("#maxBathrooms").attr("max"));

  $("#PropertyArea-one").html($("#minPropertyArea").attr("min"));
  $("#PropertyArea-two").html($("#maxPropertyArea").attr("max"));


  $("#AreaSize-one").html($("#minAreaSize").attr("min"));
  $("#AreaSize-two").html($("#maxAreaSize").attr("max"));

  $("#YearBuilt-one").html($("#minYearBuilt").attr("min"));
  $("#YearBuilt-two").html($("#maxYearBuilt").attr("max"));
  var propertyId = jQuery("#propertyId").val();
		var search = jQuery("#search").val();
		var propertiesType = jQuery("#properties").val();
		var status = jQuery("#status").val();
    var amenities = jQuery("#amenities").val();
    var accommodation = jQuery("#accommodation").val();
    var page = 1;
    var view = jQuery("#view").val();
    var country = jQuery("#country").val();
    var city = jQuery("#city").val();
    var area = jQuery("#area").val();
    var minPrice = jQuery("#minPrice").val();
    var maxPrice = jQuery("#maxPrice").val();
    var minBedroom = jQuery("#minBedroom").val();
    var maxBedroom = jQuery("#maxBedroom").val();
    var minBathrooms = jQuery("#minBathrooms").val();
    var maxBathrooms = jQuery("#maxBathrooms").val();
    var minPropertyArea = jQuery("#minPropertyArea").val();
    var maxPropertyArea = jQuery("#maxPropertyArea").val();
    var minAreaSize = jQuery("#minAreaSize").val();
    var maxAreaSize = jQuery("#maxAreaSize").val();
    var minYearBuilt = jQuery("#minYearBuilt").val();
    var maxYearBuilt = jQuery("#maxYearBuilt").val();
    var sortBy = jQuery("#sortBy").val();
		var finalJson = {
			search:search,
      page:page,
			propertiesType:propertiesType,
			status:status,
      amenities:amenities,
      accommodation:accommodation,
      view:view,
      country:country,
      city:city,
      area:area,
      propertyId:propertyId,
      sortBy : sortBy,
    
			action:"customSearch"
		};
		Ajaxdata(finalJson);

});



function Ajaxdata(data){
		let ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
		jQuery.ajax({
			type : "POST",
			data : data,
			url : ajax_url,
      beforeSend : function(){
        $(".listingData").html(`<div class="col-md-12 d-flex justify-content-center"><div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>`);
        $(".paginations").html('');
      },
			success : function(response){
        var res = JSON.parse(response);
				$(".listingData").html(res[0]);
        $(".paginations").html(res[1]);
			}
		});
		
	}

$(".advanceFilter").change(function(){
  $(".submit-filter").attr("data-check-reset","1");
  var resetButton = $(".submit-filter").attr("data-check-reset");
  if(resetButton == '1')
  {
    $(".resetform").removeClass('d-none');
  }
  else{
    $(".resetform").addClass('d-none');
  }
 
});
</script>


<?php get_footer(); ?>