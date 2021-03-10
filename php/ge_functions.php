<?php
/*
 * ===================================================================
 * Function:	create_navbar()
 * Purpose:		function to create navbars
 * Author:		Mark Fletcher
 * Date:			19.04.2019
 *
 * Input:
 * 	$data				- a selected data array
 * 	$count 			-
 * 	$separator	- e.g. '|', ' ', ':'
 *
 * Output:
 * 	footer navbar string
 *
 * Notes:
 *
 * ==================================================================
*/
function create_navbar($data, $count, $seperator) {
	foreach($data as $page => $link) {
		$count ++;
		if($count < count($data)) {
			echo '<a href="'.$link.'">'.strtoupper($page).'</a>&nbsp;&nbsp;<span class="seperator">'.$seperator.'</span>&nbsp;&nbsp;'.PHP_EOL;
		} else {
			echo '<a href="'.$link.'">'.strtoupper($page).'</a>'.PHP_EOL;
		}
	}
}

/*
 * ===================================================================
 * Function:	plus25()
 * Purpose:		Function to display 25+ results of database search result
 * Author:		Mark Fletcher
 * Date:			17.11.2020
 *
 * Input:
 * 	$gs_gsdsr -
 *  $url      -
 *  $img_path -
 *
 * Output:
 * 	HTML table of database search result
 *
 * Notes:
 *
 * ==================================================================
*/
function plus25($courses, $url, $img_path, $img) {
	echo <<<EOT
		<table id="gs-allCourse">
			<thead>
				<tr>
					<th colspan="2">COURSE</th>
					<th class="gs-switch">REGION</th>
					<th>TYPE</th>
					<th>YRDS</th>
					<th class="center">PAR</th>
				</tr>
			</thead>
			<tbody>
EOT;
	foreach ($courses as $course) :
		$format_yrds = number_format($course->length) ;
		echo <<<EOT
				<tr>
					<td class="gs-link gs-img center">
						<a href="{$url}?courseID={$course->id}">
EOT;
		if($course->img_logo != null ) :
				echo '<img class="gs-imgLogo" src="'.$img_path.$course->img_logo.'" alt="course logo" />'.PHP_EOL;
		else :
				echo '<img class="gs-imgLogo" src="'.$img_path.$img.'" alt="course logo" />'.PHP_EOL;
		endif;
		echo <<<EOT
						</a>
					</td>
					<td class="gs-link"><a href="{$url}?courseID={$course->id}">{$course->name}</a></td>
					<td class="gs-switch">{$course->region}</td>
					<td>{$course->type}</td>
					<td>{$format_yrds}</td>
					<td class="center">{$course->par}</td>
				</tr>
EOT;
	endforeach;
	echo <<<EOT
			</tbody>
		</table>
EOT;
}

/*
 * ===================================================================
 * Function:	plus20()
 * Purpose:		Function to display 20+ results of database search result
 * Author:		Mark Fletcher
 * Date:			17.11.2020
 *
 * Input:
 * 	$gs_gsdsr -
 *  $url      -
 *  $img_path -
 *
 * Output:
 * 	HTML table of database search result
 *
 * Notes:
 *
 * ==================================================================
 */
//12 results
function less_than25($courses, $url, $img_path) {
	echo <<<EOT
		<table id="gs-allCourse">
			<thead>
				<tr>
					<th colspan="2">COURSE</th>
					<th class="gs-switch">REGION</th>
					<th>TYPE</th>
					<th>YRDS</th>
					<th class="center">PAR</th>
				</tr>
			</thead>
			<tbody>
EOT;
	foreach ($courses as $course) :
		$format_yrds = number_format($course->length) ;
		echo <<<EOT
				<tr>
					<td class="gs-link gs-img center">
						<a href="{$url}?courseID={$course->id}">
EOT;
		if($course->img_logo != null ) :
				echo '<img class="gs-imgLogo" src="'.$img_path.$course->img_logo.'" alt="course logo" />'.PHP_EOL;
		else :
				echo '<img class="gs-imgLogo" src="'.$img_path.'2020/05/gs-icon240-e1590336869748.png" alt="course logo" />'.PHP_EOL;
		endif;
		echo <<<EOT
						</a>
					</td>
					<td class="gs-link"><a href="{$url}?courseID={$course->id}">{$course->name}</a></td>
					<td class="gs-switch">{$course->region}</td>
					<td>{$course->type}</td>
					<td>{$format_yrds}</td>
					<td class="center">{$course->par}</td>
				</tr>
EOT;
	endforeach;
	echo <<<EOT
			</tbody>
		</table>
EOT;
}

/*
	*===================================================================
	* Function:	tick_cross()
 	* Purpose:		function to create navbars
 	* Author:		Mark Fletcher
 	* Date:			19.04.2019
  *
  * Input:
  * 	$value - boolean valu 'true' or 'false'
  *
  * Output:
  * 	true	= print tick icon (green)
	*		false = print cross icon (red)
  *
  * Notes:
  *
  * ==================================================================
*/
function tick_cross($value) {
	if ($value == true) {
		$newValue = '<i class="fa fa-check fa-fw" style="color: green;"></i>';
	} else {
		$newValue = '<i class="fa fa-close fa-fw" style="color: red;"></i>';
	}
	return $newValue;
}

/*
 * ==================================================================
 * Function:	copyright()
 * Purpose:		function to create copyright notice for webpages
 * Author:		Mark Fletcher
 * Date:			18.04.2018
 *
 * Input:
 * 	$gs_gsdsr -
 *  $url      -
 *  $img_path -
 *
 * Output:
 * 	HTML table of database search result
 *
 * Notes:
 *
 * ==================================================================
*/
function copyright($company, $year) {
	if ($year == date('Y')) {
		$date = $year;
	} else {
		$date = $year.' - '.date('Y');
	}
	echo '&copy; '.$date.' '.$company.'. All rights reserved.';
}

/*
 * ==================================================================
 * File:		block_address()
 * Purpose:	function to write address string in a block
 * Author:	Mark Fletcher
 * Date:		08.03.2021
 *
 * Input:
 * 	$add - address string
 *
 * Output:
 * 	address string as a block
 *
 * Notes:
 *
 * ==================================================================
*/
function block_address($add) {
	$address = explode(', ', $add);
	for($x = 0; $x < count($address); $x++) {
  	if($x != (count($address)-1)) {
    	echo $address[$x].',<br />';
  	} else {
    	echo $address[$x];
  	}
	}
}
?>
