<?php

include("connect.php"); 
include("header.php");
include("menu.php");
include("functions.php");

$graph = array();


function displaygraph(){

global $graph;
	print "<br><h3>Usage Bar Graph</h3><table width=95% cellpadding=0 bordercolor='#0000ff' cellspacing=0 border=1>";
	for($t=0;$t<count($graph);$t++){
	$nums2 = explode("|",$graph[$t]);
	$nums = $nums2[1];
	$day = $nums2[0];
		$width = $nums;
		print "<tr width=$width><td width=50>$day</td>";
			for($r=1;$r<$width+1;$r++){
				print "<td bgcolor='#cccccc'>$r</td>";
			}
		print "</tr><tr></tr>";
	}
	print "</table>";
	}



function generate_calendar($year, $month, $days = array(), $day_name_length = 3, $month_href = NULL, $first_day = 0, $pn = array()){
  	global $stream;
	global $graph;
    $first_of_month = gmmktime(0,0,0,$month,1,$year);
    #remember that mktime will automatically correct if invalid dates are entered
    # for instance, mktime(0,0,0,12,32,1997) will be the date for Jan 1, 1998
    # this provides a built in "rounding" feature to generate_calendar()

    $day_names = array(); #generate all the day names according to the current locale
    for($n=0,$t=(3+$first_day)*86400; $n<7; $n++,$t+=86400) #January 4, 1970 was a Sunday
        $day_names[$n] = ucfirst(gmstrftime('%A',$t)); #%A means full textual day name

    list($month, $year, $month_name, $weekday) = explode(',',gmstrftime('%m,%Y,%B,%w',$first_of_month));
    $weekday = ($weekday + 7 - $first_day) % 7; #adjust for $first_day
    $title   = htmlentities(ucfirst($month_name)).'&nbsp;'.$year;  #note that some locales don't capitalize month and day names

    #Begin calendar. Uses a real <caption>. See http://diveintomark.org/archives/2002/07/03
    @list($p, $pl) = each($pn); @list($n, $nl) = each($pn); #previous and next links, if applicable
    if($p) $p = '<span class="calendar-prev">'.($pl ? '<a href="'.htmlspecialchars($pl).'">'.$p.'</a>' : $p).'</span>&nbsp;';
    if($n) $n = '&nbsp;<span class="calendar-next">'.($nl ? '<a href="'.htmlspecialchars($nl).'">'.$n.'</a>' : $n).'</span>';
    $calendar = '<table height=400 bordercolor=#111111 border=1 class="calendar">'."\n".
        '<caption class="calendar-month">'.$p.($month_href ? '<a href="'.htmlspecialchars($month_href).'">'.$title.'</a>' : $title).$n."</caption>\n<tr>";

    if($day_name_length){ #if the day names should be shown ($day_name_length > 0)
        #if day_name_length is >3, the full name of the day will be printed
        foreach($day_names as $d)
            $calendar .= '<th abbr="'.htmlentities($d).'">'.htmlentities($day_name_length < 4 ? substr($d,0,$day_name_length) : $d).'</th>';
        $calendar .= "</tr>\n<tr>";
    }

    if($weekday > 0) $calendar .= '<td width=150 colspan="'.$weekday.'">&nbsp;</td>'; #initial 'empty' days
    for($day=1,$days_in_month=gmdate('t',$first_of_month); $day<=$days_in_month; $day++,$weekday++){
        if($weekday == 7){
            $weekday   = 0; #start a new week
            $calendar .= "</tr>\n<tr>";
        }
		$mono = eregi_replace("0","",$month);
		$date = "$day/$mono/$year"; 
		
		if(isset($days[$day]) and is_array($days[$day])){
        	$sql = $stream->do_query("select * from members where other like '%$date%'","array");
			
			$s=0;
			$msg = "<br><hr>";
			for($h=0;$h<count($sql);$h++){

			$tmp = $sql[$h];
			$id = $tmp[0];
			$fname = $tmp[1];
			$sname = $tmp[2];
			$add = substr($tmp[3],0,15);
			$mob = $tmp[4];
			$email = $tmp[5];
			$pay = $tmp[6];
			$op1 = $tmp[7];
			$op2 = $tmp[8];
			$op3 = $tmp[9];
			$all = $tmp[10];
			$crap = $tmp[11];
		
			$msg .= "<a href='editmember.php?members=memberedit&id=$id'>($id)$sname, $fname</a><br>";
			$s++;
		}
		
				
			
		    @list($link, $classes, $content) = $days[$day];
            if(is_null($content))  $content  = $day;
            $calendar .= '<td width=150  align=left valign=top bgcolor=#FFCCAA '.($classes ? ' class="'.htmlspecialchars($classes).'">' : '>'). ($link ? '<a href="'.htmlspecialchars($link).'">'.$content. $msg .'</a>' : $content). $msg .'<br></td>';
      		$ggg = count($sql);
			array_push($graph,"$content|$s");
	    }
        else {
		$sql = $stream->do_query("select * from members where other like '%$date%'","array");
			$msg = "<br><hr>";
			$s=0;
			for($h=0;$h<count($sql);$h++){

			$tmp = $sql[$h];
			$id = $tmp[0];
			$fname = $tmp[1];
			$sname = $tmp[2];
			$add = substr($tmp[3],0,15);
			$mob = $tmp[4];
			$email = $tmp[5];
			$pay = $tmp[6];
			$op1 = $tmp[7];
			$op2 = $tmp[8];
			$op3 = $tmp[9];
			$all = $tmp[10];
			$crap = $tmp[11];
		$s++;
			$msg .= "<a href='editmember.php?members=memberedit&id=$id'>($id)$sname, $fname</a><br>";
		
		}
		
			
			
			if(stristr($msg,",")){
				$bgcolor= "#DDBB00";
			}
			else {
			 	$bgcolor= "#cccccc";
			}
			$calendar .= "<td width=150 bgcolor='$bgcolor' align=left valign=top><b>$day</b> $msg<br></td>";
			$ggg = count($sql);
			array_push($graph,"$day|$s");
    	}
		
	}
    if($weekday != 7) $calendar .= '<td width=150 colspan="'.(7-$weekday).'">&nbsp;</td>'; #remaining "empty" days

    return $calendar."</tr>\n</table>\n";
}


$time = time();
$today = date('j',$time);
$days = array($today=>array(NULL,NULL,'<span style="color: red; font-weight: bold; font-size: larger; text-decoration: blink;">'.$today.'</span>'));

echo generate_calendar(date('Y', $time), date('n', $time), $days,3,NULL,0,$pn);

displaygraph();

print count($graph);

include("footer.php");


?>