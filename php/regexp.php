<?php
/*
 * ========================================================================
 * File:		regexp.php
 * Purpose: regular expression patterns for data form validation
 *
 * Author:	Mark Fletcher
 * Date:		08.06.2021
 *
 * Notes:
 *
 * Revision:
 *		08.06.2021	1st issue.
 *
 * ========================================================================
*/
// set regular expression patterns for form validation
$namePattern = "/^[\w+\s]+$/";
$addressPattern = "/^(\d{1,5}[a-zA-Z]?\s)?([A-Z]{1}[a-z\-]+[,\.]?\s)*[A-Z]{1,2}[0-9][A-Z0-9]? ?[0-9][A-Z]{2}$/";
$regionPattern = "/^\d{1,2}$/";
$typePattern = "/^\d{1}$/";
$lengthPattern = "/^\d{4}$/";
$parPattern  = "/^\d{2}$/";
$telephonePattern =  "/^((\+44\s?\(0\)\s?\d{2,4})|(\+44\s?(01|02|03|07|08)\d{2,3})|(\+44\s?(1|2|3|7|8)\d{2,3})|(\(\+44\)\s?\d{3,4})|(\(\d{5}\))|((01|02|03|07|08)\d{2,3})|(\d{5}))(\s|-|.)(((\d{3,4})(\s|-)(\d{3,4}))|((\d{6,7})))$/";
$websitePattern = "/^http[s]?:\/\/[www.]?([\w]([\w\-]{0,61}[\w])\.)+[\w]([\w\-]{0,61}[\w])?[\/]?$/";
$emailPattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/";
$socialPattern = "/^[\w\-]*$/"; //"/^https:\/\/www.(facebook|twitter|instagram|youtube)*(.com\/){1}([\w\-]+)$/"
$textPattern = "/^[\w\s\'.,:-]*[\r\n\t]*$/";
$feePattern = "/^\d{2,3}(.\d{2})?$/";
$latPattern = "/^[-+]?([1-8]?\d(\.\d+)?|90(\.0+)?)$/";
$lngPattern = "/^[-+]?(180(\.0{0,5})?|((1[0-7]\d)|([1-9]?\d))(\.\d{5})?)$/";
$digitPattern = "/^\d{1}$/";
?>
