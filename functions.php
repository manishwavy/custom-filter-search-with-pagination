<?php

add_action("wp_ajax_customSearch", "handle_customSearch");  
add_action("wp_ajax_nopriv_customSearch", "handle_customSearch");

function handle_customSearch(){
	
	global $wpdb;

	$page = sanitize_text_field($_POST['page']);
	$cur_page = $page;
	$page -= 1;
	// Set the number of results to display
	$per_page = 9;
	$previous_btn = true;
	$next_btn = true;
	$first_btn = true;
	$last_btn = true;
	$start = $page * $per_page;
	$propertiesTypeArray=[];
	$mainArray=[];

	if($_POST['sortBy'] != '' && !empty($_POST['sortBy']))
	{
		if($_POST['sortBy'] == 'date-asc')
		{
			$orderby = 'date';
			$order = 'ASC';
			$me = '';
			
		}
		elseif($_POST['sortBy'] == 'date-desc')
		{
			$orderby = 'date';
			$order = 'DESC';
			$me = '';
		}
		elseif($_POST['sortBy'] == 'price-desc')
		{
			$orderby = 'meta_value_num';
			$me = 'price';
			$order = 'DESC';
		}
		elseif($_POST['sortBy'] == 'price-asc')
		{
			$orderby = 'meta_value_num';
			$me = 'price';
			$order = 'ASC';
		}
	}
	else{
		$orderby = 'ID';
		$order = 'DESC';
		$me  = '';
	}


	
    $args = array(
		'post_type' => 'properties',
		'post_status' => 'publish',
		'meta_key' => $me,
		's'=>$_POST['search'],
		'orderby' => $orderby,
		'order'             => $order,
		'posts_per_page'    => $per_page,
		'offset'            => $start
    );


	
    if(isset($_POST['propertiesType']) && !empty($_POST['propertiesType']))
	{
		
		$propertiesTypeData = $_POST['propertiesType'];
		$propertiesTypeCount = count($propertiesTypeData);
		if($propertiesTypeCount>1){
			$propertiesTypeArray = array("relation" => 'OR');
		}
		
		for($i=0;$i<$propertiesTypeCount;$i++)
		{
			$propertiesType = array(
				'key' => 'property-types',
				'value' => sprintf(':"%s";',$propertiesTypeData[$i]),
				'compare' => 'LIKE'
			);
			array_push($propertiesTypeArray, $propertiesType);
		}
	}
	$statusArray=[];
	
	if(isset($_POST['status']) && !empty($_POST['status']))
	{
		$statusData = $_POST['status'];
		$statusCount = count($statusData);


		if($statusCount>1){
			$statusArray = array("relation" => 'OR');
		}
		for($i=0;$i<$statusCount;$i++)
		{
			$searchDataStatus = array(
				'key' => 'completion-status',
				'value' => $statusData[$i],
				'compare' => '='
			);
			array_push($statusArray, $searchDataStatus);
		}
	}

	$amenitiesArray=[];
	
	if(isset($_POST['amenities']) && !empty($_POST['amenities']))
	{
		$amenitiesData = $_POST['amenities'];
		$amenitiesCount = count($amenitiesData);


		if($amenitiesCount>1){
			$amenitiesArray = array("relation" => 'OR');
		}
		for($i=0;$i<$amenitiesCount;$i++)
		{
			$searchDataAmenities = array(
				'key' => 'heating',
				'value' => sprintf(':"%s";s:4:"true";',$amenitiesData[$i]),
				'compare' => 'LIKE'
			);
			array_push($amenitiesArray, $searchDataAmenities);
		}
	}

	$accommodationArray=[];
	
	if(isset($_POST['accommodation']) && !empty($_POST['accommodation']))
	{
		$accommodationData = $_POST['accommodation'];
		$accommodationCount = count($accommodationData);
		if($accommodationCount>1){
			$accommodationArray = array("relation" => 'OR');
		}
		for($i=0;$i<$accommodationCount;$i++)
		{
			$searchDataAccommodation = array(
				'key' => 'accommodation',
				'value' =>$accommodationData[$i],
				'compare' => '='
			);
			array_push($accommodationArray, $searchDataAccommodation);
		}
	}

	$viewArray=[];
	
	if(isset($_POST['view']) && !empty($_POST['view']))
	{
		$viewData = $_POST['view'];
		$viewCount = count($viewData);


		if($viewCount>1){
			$viewArray = array("relation" => 'OR');
		}
		for($i=0;$i<$viewCount;$i++)
		{
			$searchDataview = array(
				'key' => 'view',
				'value' => $viewData[$i],
				'compare' => 'LIKE'
			);
			array_push($viewArray, $searchDataview);
		}
	}

	$propertyIdArray =[];
	if(isset($_POST['propertyId']) && !empty($_POST['propertyId']))
	{
		$propertyIdData = $_POST['propertyId'];
		$searchDatapropertyId = array(
			'key' => 'property-id',
			'value' =>$propertyIdData,
			'compare' => '='
		);
		array_push($propertyIdArray, $searchDatapropertyId);
		
	}


	$countryArray =[];
	if(isset($_POST['country']) && !empty($_POST['country']))
	{
		$countryData = $_POST['country'];
		$searchDatacountry = array(
			'key' => 'country',
			'value' =>$countryData,
			'compare' => '='
		);
		array_push($countryArray, $searchDatacountry);
		
	}


	$cityArray=[];
	if(isset($_POST['city']) && !empty($_POST['city']))
	{
		$cityData = $_POST['city'];
		$searchDatacity = array(
			'key' => 'city',
			'value' => $cityData,
			'compare' => '='
		);
		array_push($cityArray, $searchDatacity);
		
	}

	$areaArray=[];
	if(isset($_POST['area']) && !empty($_POST['area']))
	{
		$areaData = $_POST['area'];
		// print_r($areaData[0]);
			if($areaData[0] != '')
			{
				$searchDataarea = array(
					'taxonomy' => 'area',
					'field'    => 'name',      
					'terms' => $areaData
				);	
				$args['tax_query'] = array(
					$searchDataarea
				);
			}

			
		
	}
	
	$priceArray =[];
	if(isset($_POST['minPrice']) && !empty($_POST['minPrice']) && isset($_POST['maxPrice']) && !empty($_POST['maxPrice']))
	{
		$minPriceData = $_POST['minPrice'];
		$maxPriceData = $_POST['maxPrice'];
		$searchDataprice = array(
			'key' => 'price',
			'value' =>array($minPriceData,$maxPriceData),
			'type'     => 'numeric',
            'compare'  => 'between'
		);
		array_push($priceArray, $searchDataprice);
		
	}

	$bedroomArray =[];
	if(isset($_POST['minBedroom']) && $_POST['minBedroom'] != '' && isset($_POST['maxBedroom']) && !empty($_POST['maxBedroom']))
	{
	$minBedroomData = $_POST['minBedroom'];
	$maxBedroomData = $_POST['maxBedroom'];
	$searchDataBedroom = array(
		'key' => 'bedrooms',
		'value' =>array($minBedroomData,$maxBedroomData),
		'type'     => 'numeric',
		'compare'  => 'between'
	);
	array_push($bedroomArray, $searchDataBedroom);
	}

	$bathroomsArray =[];
	if(isset($_POST['minBathrooms']) && $_POST['minBathrooms'] != '' && isset($_POST['maxBathrooms']) && !empty($_POST['maxBathrooms']))
	{
		$minbathroomsData = $_POST['minBathrooms'];
		$maxbathroomsData = $_POST['maxBathrooms'];
		$searchDatabathrooms = array(
			'key' => 'bathsrooms',
			'value' =>array($minbathroomsData,$maxbathroomsData),
			'type'     => 'numeric',
			'compare'  => 'between'
		);
		array_push($bathroomsArray, $searchDatabathrooms);
	}

	$PropertyAreaArray =[];

	if(isset($_POST['minPropertyArea']) && $_POST['minPropertyArea'] != '' && isset($_POST['maxPropertyArea']) && !empty($_POST['maxPropertyArea']))
	{
		$minPropertyAreaData = $_POST['minPropertyArea'];
		$maxPropertyAreaData = $_POST['maxPropertyArea'];
		$searchDataPropertyArea = array(
			'key' => 'property-size',
			'value' =>array($minPropertyAreaData,$maxPropertyAreaData),
			'type'     => 'numeric',
			'compare'  => 'between'
		);
		array_push($PropertyAreaArray, $searchDataPropertyArea);
	}


	$AreaSizeArray =[];
	if(isset($_POST['minAreaSize']) && $_POST['minAreaSize'] != '' && isset($_POST['maxAreaSize']) && !empty($_POST['maxAreaSize']))
	{
		$minAreaSizeData = $_POST['minAreaSize'];
		$maxAreaSizeData = $_POST['maxAreaSize'];
		$searchDataAreaSize = array(
			'key' => 'area-size',
			'value' =>array($minAreaSizeData,$maxAreaSizeData),
			'type'     => 'numeric',
			'compare'  => 'between'
		);
		array_push($AreaSizeArray, $searchDataAreaSize);
	}

	$YearBuiltArray =[];
	if(isset($_POST['minYearBuilt']) && !empty($_POST['minYearBuilt']) && isset($_POST['maxYearBuilt']) && !empty($_POST['maxYearBuilt']))
	{
		$minYearBuiltData = $_POST['minYearBuilt'];
		$maxYearBuiltData = $_POST['maxYearBuilt'];
		$searchDataYearBuilt = array(
			'key' => 'year-built',
			'value' =>array($minYearBuiltData,$maxYearBuiltData),
			'type'     => 'numeric',
			'compare'  => 'between'
		);
		array_push($YearBuiltArray, $searchDataYearBuilt);
	}

	

	// print_r($YearBuiltArray);
	// die;




	if(!empty($propertiesTypeArray))
	{
		array_push($mainArray,$propertiesTypeArray);
	}
	if(!empty($statusArray))
	{
		if(count($mainArray)>0)
		{
			$mainArray[] = array("relation" => 'AND');
		}
		array_push($mainArray,$statusArray);
	}

	if(!empty($amenitiesArray))
	{
		
		if(count($mainArray)<1 && !array_key_exists("relation",$mainArray))
		{
			$mainArray[] = array("relation" => 'AND');
		}
		array_push($mainArray,$amenitiesArray);
	}

	if(!empty($accommodationArray))
	{
		
		if(count($mainArray)<1 && !array_key_exists("relation",$mainArray))
		{
			$mainArray[] = array("relation" => 'AND');
		}
		array_push($mainArray,$accommodationArray);
	}

	if(!empty($viewArray))
	{
		
		if(count($mainArray)<1 && !array_key_exists("relation",$mainArray))
		{
			$mainArray[] = array("relation" => 'AND');
		}
		array_push($mainArray,$viewArray);
	}

	if(!empty($countryArray))
	{
		
		if(count($mainArray)<1 && !array_key_exists("relation",$mainArray))
		{
			$mainArray[] = array("relation" => 'AND');
		}


		array_push($mainArray,$countryArray);
	}

	if(!empty($propertyIdArray))
	{
		
		if(count($mainArray)<1 && !array_key_exists("relation",$mainArray))
		{
			$mainArray[] = array("relation" => 'AND');
		}


		array_push($mainArray,$propertyIdArray);
	}



	if(!empty($cityArray))
	{
		
		if(count($mainArray)<1 && !array_key_exists("relation",$mainArray))
		{
			$mainArray[] = array("relation" => 'AND');
		}
		array_push($mainArray,$cityArray);
	}

	// if(!empty($areaArray))
	// {
		
	// 	if(count($mainArray)<1 && !array_key_exists("relation",$mainArray))
	// 	{
	// 		$mainArray[] = array("relation" => 'AND');
	// 	}
	// 	array_push($mainArray,$areaArray);
	// }

	if(!empty($priceArray))
	{
		
		if(count($mainArray)<1 && !array_key_exists("relation",$mainArray))
		{
			$mainArray[] = array("relation" => 'AND');
		}
		array_push($mainArray,$priceArray);
	}
	
	if(!empty($bedroomArray))
	{
		
		if(count($mainArray)<1 && !array_key_exists("relation",$mainArray))
		{
			$mainArray[] = array("relation" => 'AND');
		}
		array_push($mainArray,$bedroomArray);
	}


	if(!empty($bathroomsArray))
	{
		
		if(count($mainArray)<1 && !array_key_exists("relation",$mainArray))
		{
			$mainArray[] = array("relation" => 'AND');
		}
		array_push($mainArray,$bathroomsArray);
	}

	if(!empty($PropertyAreaArray))
	{
		
		if(count($mainArray)<1 && !array_key_exists("relation",$mainArray))
		{
			$mainArray[] = array("relation" => 'AND');
		}
		array_push($mainArray,$PropertyAreaArray);
	}


	if(!empty($AreaSizeArray))
	{
		
		if(count($mainArray)<1 && !array_key_exists("relation",$mainArray))
		{
			$mainArray[] = array("relation" => 'AND');
		}
		array_push($mainArray,$AreaSizeArray);
	}

	// if(!empty($YearBuiltArray))
	// {
		
	// 	if(count($mainArray)>1 && !array_key_exists("relation",$mainArray))
	// 	{
	// 		$mainArray[] = array("relation" => 'AND');
	// 	}
	// 	array_push($mainArray,$YearBuiltArray);
	// }







	// print_r($areaArray);
	// 	die;

	$args['meta_query'] = array(
		$mainArray
	);



	// print_r($args);
	// die;
	
    $query = new WP_Query( $args );
	$data_listing = '';
	$main_result_array = [];
	$count=$query->found_posts;
	if($count>0)
	{
		while ( $query->have_posts() ) {
			$query->the_post();
			$price = get_post_meta( get_the_ID(),'price');
			
			$currencySign = get_post_meta( get_the_ID(),'currency-sign');
			$vat = get_post_meta( get_the_ID(),'vat');
			$city = get_post_meta( get_the_ID(),'city');
			$address = get_post_meta( get_the_ID(),'address');
			$bedrooms = get_post_meta( get_the_ID(),'bedrooms');
			$areaSize = get_post_meta( get_the_ID(),'area-size');
			$propertySize = get_post_meta( get_the_ID(),'property-size');
			$bathsrooms = get_post_meta( get_the_ID(),'bathsrooms');
			if($bedrooms[0] != '' && $bedrooms[0] != '0')
			{
				$finalbedroom = '<li><img src="https://docryptonew5.cloudaccess.host/wp-content/uploads/2022/09/bed.png" /> '.$bedrooms[0].' Rooms</li>';
			}
			else{
				$finalbedroom = '';
			}
			if($areaSize[0] != '' && $areaSize[0] != '0')
			{
				$finalHome = '<li><img src="https://docryptonew5.cloudaccess.host/wp-content/uploads/2022/09/home.png" /> '.$areaSize[0].' sq.m.</li>';
			}
			else{
				$finalHome = '';
			}
	
			if($propertySize[0] != '' && $propertySize[0] != '0')
			{
				$finalpropertySize = '<li><img src="https://docryptonew5.cloudaccess.host/wp-content/uploads/2022/09/grid.png" /> '.$propertySize[0].' sq.m.</li>';
			}
			else{
				$finalpropertySize = '';
			}
	
			if($bathsrooms[0] != '' && $bathsrooms[0] != '0')
			{
				$finalbathsrooms = '<li><img src="https://docryptonew5.cloudaccess.host/wp-content/uploads/2022/09/bath.png" /> '.$bathsrooms[0].' Baths</li>';
			}
			else{
				$finalbathsrooms = '';
			}
	
			if($city[0] != '' && $city[0] != '0')
			{
				$finalcity = '<li><img src="https://docryptonew5.cloudaccess.host/wp-content/uploads/2022/09/cityscape.png" /> '.$city[0].'</li>';
			}
			else{
				$finalcity = '';
			}
	
	
	
			$data_listing .=  '<div class="col-xl-4 col-md-6">
			<div class="content">
				<div class="content-img">
					<a href="'.get_permalink().'"><img src="'.get_the_post_thumbnail_url(get_the_ID()).'" class="img-fluid" /></a>
				</div>
				<div class="detail py-2">
					<a href="'.get_permalink().'"><h5>'.get_the_title().'</h5></a>
					<p id="area">'.$address[0].'</p>
					<p id="price">'.$currencySign[0].' '.number_format($price[0]).' <span> '.$vat[0].' </span></p>
				</div>
				<div class="more-info">
					<ul class="list-unstyled">
						'.$finalbedroom.'
						'.$finalbathsrooms.'
						'.$finalHome.'
						'.$finalcity.'
						'.$finalpropertySize.'													
					</ul>
				</div>
			</div>
			</div>';
		}
	}
	else{
		$data_listing .=  '<div class="col-md-12"><h4 class="text-center">No Property Found...</h4></div>';
	}


if($count >= 9)
{

	// This is where the magic happens
	$no_of_paginations = ceil($count / $per_page);


	if ($cur_page >= 11) {
		$start_loop = $cur_page - 3;
		if ($no_of_paginations > $cur_page + 3)
			$end_loop = $cur_page + 3;
		else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
			$start_loop = $no_of_paginations - 6;
			$end_loop = $no_of_paginations;
		} else {
			$end_loop = $no_of_paginations;
		}
	} else {
		$start_loop = 1;
		if ($no_of_paginations >11)
			$end_loop = 11;
		else
			$end_loop = $no_of_paginations;
	}
	$pag_container = ''; 
	$pag_container .= "
	<div class='cvf-universal-pagination'>
		<ul>";

	for ($i = $start_loop; $i <= $end_loop; $i++) {

		if ($cur_page == $i)
			$pag_container .= "<li p='$i' class = 'selected' >{$i}</li>";
		else
			$pag_container .= "<li p='$i' class='active'>{$i}</li>";
	}
   
	if ($next_btn && $cur_page < $no_of_paginations) {
		$nex = $cur_page + 1;
		$pag_container .= "<li p='$nex' class='active'>Next</li>";
	} else if ($next_btn) {
		$pag_container .= "<li class='inactive'>Next</li>";
	}

	if ($last_btn && $cur_page < $no_of_paginations) {
		$pag_container .= "<li p='$no_of_paginations' class='active'>Last</li>";
	} else if ($last_btn) {
		$pag_container .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
	}

	$pag_container = $pag_container . "
		</ul>
	</div>";
   
	// We echo the final output
	$pagination = '<div class = "cvf-pagination-nav">' . $pag_container . '</div>';
   

}
else{
	$pagination = '';
}

	array_push($main_result_array,$data_listing);
	array_push($main_result_array,$pagination);
	echo json_encode($main_result_array);
	
	wp_die();
}