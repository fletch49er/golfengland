<?php
/*
*******************************************************************************
 * File:		dbmNotice.php
 * Purpose: Notice and link for designs by mark
 *
 * Author:	Mark Fletcher
 * Date:		01.01.2013
 *
 * Notes:
 *
 * Revision:
 *		01.01.2013		1st issue.
 *		24.04.2018		php function 'dbmNotice()' added
 *		22.11.2018		dbmNotice() function re-written
 *									notification variables added
 *		18.11.2020		css moved to an external file
 *
*******************************************************************************
*/
//set notification variables
$design = 'y';
$host = 'n';
$maintain = 'y';

function dbmNotice($designed, $hosted, $maintained) {
	$phrase = '';
	if ((strtolower($designed) == 'y')) {
		$phrase = 'designed';
		if ((strtolower($hosted) == 'y') AND (strtolower($maintained) == 'y')) {
			$phrase .= ', ';
		} elseif (((strtolower($hosted) == 'n') AND (strtolower($maintained) == 'y')) OR (strtolower($hosted) == 'y') AND (strtolower($maintained) == 'n')) {
			$phrase .= ' and ';
		} elseif ((strtolower($hosted) == 'n') AND (strtolower($maintained) == 'n')) {
			$phrase .= ' ';
		}
	}
	if ((strtolower($hosted) == 'y')) {
		$phrase .= 'hosted ';
		if ((strtolower($maintained) == 'y')) {
			$phrase .= 'and ';
		}
	}
	if ((strtolower($maintained) == 'y')) {
		$phrase .= 'maintained ';
	}
	return $phrase;
}
?>

<div id="dbmNotice">
	website <?php echo dbmNotice($design, $host, $maintain); ?>by <a href="http://www.designsbymark.co.uk" title="www.designsbymark.co.uk">designs by mark</a>
</div><!-- end #dbmNotice -->
