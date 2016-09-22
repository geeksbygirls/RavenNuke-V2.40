<?php

/***********************************************************/
/* NukeScripts Network (webmaster@nukescripts.net) 			*/
/* http://www.nukescripts.net 						*/
/* Copyright � 2000-2005 by NukeScripts Network 			*/
/***********************************************************/
/*"I�t�rn�ti�n�liz�ti�n"							*/
/* Project Tracking 					 			*/
/* http://www.ravennuke.com	 						*/
/* Copyright � 2009 by RavenNuke�		 			*/
/* Author: Palbin (matt@phpnuke-guild.org)					*/
/* Description of changes: Made 100% XHTML 1.0 Transitional	*/
/*	Compliant.  Bugs fixes and major code formating changes	*/
/***********************************************************/

if (!defined('ADMIN_FILE')) {
	die ('Access Denied');
}

$pagetitle = ': ' . _PJ_TITLE . ': ' . _PJ_REPORTS . ': ' . _PJ_REPORTLIST;

if(empty($page)) {
	$page = 1;
}

if(empty($per_page)) {
	$per_page = 25;
}

if(empty($column)) {
	$column = 'project_id';
}

if(empty($direction)) {
	$direction = 'desc';
}

include('header.php');

pjadmin_menu(_PJ_REPORTS . ': ' . _PJ_REPORTLIST);
echo '<br />'."\n";

OpenTable();
echo '<table width="100%" border="1" cellspacing="0" cellpadding="2">'."\n";
echo '<tr><td colspan="3" bgcolor="' . $bgcolor2 . '" nowrap="nowrap"><b>' . _PJ_REPORTOPTIONS . '</b></td></tr>'."\n";

$reportrows = $db->sql_numrows($db->sql_query('SELECT report_id FROM ' . $prefix . '_nsnpj_reports'));

$pjimage = pjimage('stats.png', $module_name);
echo '<tr><td><img src="' . $pjimage . '" alt="" title="" /></td><td colspan="2" width="100%" nowrap="nowrap">' . _PJ_TOTALREPORTS . ': <b>' . $reportrows . '</b></td></tr>'."\n";
echo '</table>'."\n";
echo '<br />'."\n";

$total_pages = ($reportrows / $per_page);
$total_pages_quotient = ($reportrows % $per_page);
if($total_pages_quotient != 0) {
	$total_pages = ceil($total_pages);
}

$start_list = ($per_page * ($page-1));
$end_list = $per_page;

echo '<table width="100%" border="1" cellspacing="0" cellpadding="2">'."\n";
echo '<tr><td bgcolor="' . $bgcolor2 . '" width="100%" colspan="2" nowrap="nowrap"><b>' . _PJ_REPORTLIST . '</b></td>'."\n";
echo '<td align="center" bgcolor="' . $bgcolor2 . '"><b>' . _PJ_PROJECT . '</b></td>'."\n";
echo '<td align="center" bgcolor="' . $bgcolor2 . '"><b>' . _PJ_STATUS . '</b></td>'."\n";
echo '<td align="center" bgcolor="' . $bgcolor2 . '"><b>' . _PJ_TYPE . '</b></td>'."\n";
echo '<td align="center" bgcolor="' . $bgcolor2 . '"><b>' . _PJ_FUNCTIONS . '</b></td></tr>'."\n";

if($reportrows > 0) {
	$reviewresult = $db->sql_query('SELECT report_id, report_name, project_id, type_id, status_id FROM ' . $prefix . '_nsnpj_reports ORDER BY ' . $column . ' ' . $direction . ' LIMIT ' . $start_list . ', ' . $end_list);
	while(list($report_id, $report_name, $project_id, $type_id, $status_id) = $db->sql_fetchrow($reviewresult)) {
		$status = pjreportstatus_info($status_id);
		$project = pjproject_info($project_id);
		$type = pjreporttype_info($type_id);
		$members = $db->sql_numrows($db->sql_query('SELECT member_id FROM ' . $prefix . '_nsnpj_reports_members WHERE report_id="' . $report_id . '"'));
		$pjimage = pjimage('report.png', $module_name);

		if($report_name == '') {
			$report_name = "----------";
		}

		echo '<tr><td><img src="' . $pjimage . '" alt="" title="" /></td><td width="100%">' . $report_name . '</td>'."\n";
		echo '<td align="center" nowrap="nowrap"><a href="' . $admin_file . '.php?op=PJProjectList">' . $project['project_name'] . '</a></td>'."\n";

		if($status['status_name'] == '') {
			$status['status_name'] = _PJ_NA;
		}

		echo '<td align="center"><a href="' . $admin_file . '.php?op=PJReportStatusList">' . $status['status_name'] . '</a></td>'."\n";

		if($type['type_name'] == '') {
			$type['type_name'] = _PJ_NA;
		}

		echo '<td align="center" nowrap="nowrap"><a href="' . $admin_file . '.php?op=PJReportTypeList">' . $type['type_name'] . '</a></td>'."\n";
		echo '<td align="center" nowrap="nowrap">[ <a href="' . $admin_file . '.php?op=PJReportEdit&amp;report_id=' . $report_id . '">' . _PJ_EDIT . '</a>';
		echo ' | <a href="' . $admin_file . '.php?op=PJReportRemove&amp;report_id=' . $report_id . '">' . _PJ_DELETE . '</a> ]</td></tr>'."\n";
	}

	echo '<tr><td colspan="6" width="100%" bgcolor="' . $bgcolor2 . '">'."\n";
	echo '<table width="100%"><tr><td bgcolor="' . $bgcolor2 . '">'."\n";
	echo '<form method="post" action="' . $admin_file . '.php">'."\n";
	echo '<input type="hidden" name="op" value="PJReportList" />'."\n";
	echo '<input type="hidden" name="column" value="' . $column . '" />'."\n";
	echo '<input type="hidden" name="direction" value="' . $direction . '" />'."\n";
	echo '<input type="hidden" name="per_page" value="' . $per_page . '" />'."\n";
	echo '<b>' . _PJ_PAGE . '</b> <select name="page" onchange="submit()">'."\n";

	for($i=1; $i<=$total_pages; $i++) {
		if($i==$page) {
			$sel = ' selected="selected"';
		} else {
			$sel = '';
		}

		echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>'."\n";
	}

	echo '</select>'."\n";
	echo '<b>' . _PJ_OF . ' ' . $total_pages . '</b>'."\n";
	echo '</form>'."\n";
	echo '</td>'."\n";
	echo '<td align="right" bgcolor="' . $bgcolor2 . '">'."\n";
	echo '<form method="post" action="' . $admin_file . '.php">'."\n";
	echo '<b>' . _PJ_SORT . ':</b>'."\n";
	echo '<select name="column">'."\n";

	if($column == 'report_id') {
		$selcolumn1 = ' selected="selected"'; 
	} else {
		$selcolumn1 = '';
	}

	echo '<option value="report_id"' . $selcolumn1 . '>' . _PJ_REPORTID . '</option>'."\n";

	if($column == 'project_id') {
		$selcolumn2 = ' selected="selected"';
	} else {
		$selcolumn2 = '';
	}

	echo '<option value="project_id"' . $selcolumn2 . '>' . _PJ_PROJECTID . '</option>'."\n";

	if($column == 'status_id') {
		$selcolumn3 = ' selected="selected"';
	} else {
		$selcolumn3 = '';
	}

	echo '<option value="status_id"' . $selcolumn3 . '>' . _PJ_STATUSID . '</option>'."\n";

	if($column == 'priority_id') {
		$selcolumn4 = ' selected="selected"';
	} else {
		$selcolumn4 = '';
	}

	echo '<option value="type_id"' . $selcolumn4 . '>' . _PJ_TYPEID . '</option>'."\n";
	echo '</select> <select name="direction">'."\n";

	if($direction == 'asc') {
		$seldirection1 = ' selected="selected"';
	} else {
		$seldirection1 = '';
	}

	echo '<option value="asc"' . $seldirection1 . '>' . _PJ_ASC . '</option>'."\n";

	if($direction == 'desc') {
		$seldirection2 = ' selected="selected"'; 
	} else {
		$seldirection2 = '';
	}

	echo '<option value="desc"' . $seldirection2 . '>' . _PJ_DESC . '</option>'."\n";
	echo '</select> <select name="per_page">'."\n";

	if($per_page == 5) {
		$selperpage1 = ' selected="selected"';
	} else {
		$selperpage1 = '';
	}

	echo '<option value="5"' . $selperpage1 . '>5</option>'."\n";

	if($per_page == 10) {
		$selperpage2 = ' selected="selected"'; 
	} else {
		$selperpage2 = '';
	}

	echo '<option value="10"' . $selperpage2 . '>10</option>'."\n";

	if($per_page == 25) {
		$selperpage3 = ' selected="selected"';
	} else {
		$selperpage3 = '';
	}

	echo '<option value="25"' . $selperpage3 . '>25</option>'."\n";

	if($per_page == 50) {
		$selperpage4 = ' selected="selected"'; 
	} else {
		$selperpage4 = '';
	}

	echo '<option value="50"' . $selperpage4 . '>50</option>'."\n";

	if($per_page == 100) {
		$selperpage5 = ' selected="selected"';
	} else {
		$selperpage5 = '';
	}

	echo '<option value="100"' . $selperpage5 . '>100</option>'."\n";

	if($per_page == 200) {
		$selperpage6 = ' selected="selected"';
	} else {
		$selperpage6 = '';
	}

	echo '<option value="200"' . $selperpage6 . '>200</option>'."\n";
	echo '</select>'."\n";
	echo '<input type="hidden" name="op" value="PJReportList" />'."\n";
	echo '<input type="submit" value="' . _PJ_SORT . '" />'."\n";
	echo '</form>'."\n";
	echo '</td>'."\n";
	echo '</tr></table>'."\n";
	echo '</td></tr>'."\n";
} else {
	echo '<tr><td colspan="6" width="100%" align="center">' . _PJ_NOPROJECTREPORTS . '</td></tr>'."\n";
}

echo '</table>'."\n";
CloseTable();

pj_copy();

include('footer.php');

?>