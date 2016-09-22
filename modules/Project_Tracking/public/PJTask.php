<?php

/***********************************************************/
/* NukeScripts Network (webmaster@nukescripts.net) 			*/
/* http://www.nukescripts.net 						*/
/* Copyright © 2000-2005 by NukeScripts Network 			*/
/***********************************************************/
/*"Iñtërnâtiônàlizætiøn"							*/
/* Project Tracking 					 			*/
/* http://www.ravennuke.com	 						*/
/* Copyright © 2009 by RavenNuke™		 			*/
/* Author: Palbin (matt@phpnuke-guild.org)					*/
/* Description of changes: Made 100% XHTML 1.0 Transitional	*/
/*	Compliant.  Bugs fixes and major code formating changes	*/
/***********************************************************/

if(!defined('NSNPJ_PUBLIC')) {
	die('Illegal Access Detected!!!');
}

$pagetitle = ': ' . _PJ_TITLE . ': ' . _PJ_VIEWTASK;

include('header.php');

$task_id = intval($task_id);
$task = pjtask_info($task_id);
$project = pjproject_info($task['project_id']);
$taskstatus = pjtaskstatus_info($task['status_id']);
$taskpriority = pjtaskpriority_info($task['priority_id']);

title(_PJ_TITLE . ': ' . _PJ_VIEWTASK . ': ' . $task['task_name']);

OpenTable();

echo '<table align="center" width="100%" border="1" cellspacing="0" cellpadding="2">',"\n";
echo '<tr><td bgcolor="' , $bgcolor2 , '" width="100%" colspan="5" nowrap="nowrap"><b>' , _PJ_PROJECTNAME , '</b></td></tr>',"\n";

$pjimage = pjimage('project.png', $module_name);

echo '<tr><td align="center"><img src="' , $pjimage , '" alt="" title="" /></td>',"\n";
echo '<td width="100%" colspan="4" nowrap="nowrap"><a href="modules.php?name=' , $module_name , '&amp;op=PJProject&amp;project_id=' , $task['project_id'] , '">' , $project['project_name'] , '</a></td></tr>',"\n";
echo '<tr><td bgcolor="' , $bgcolor2 , '" width="100%" colspan="2" nowrap="nowrap"><b>' , _PJ_TASKNAME , ' / ' , _PJ_TASKDETAILS , '</b></td>',"\n";
echo '<td bgcolor="' , $bgcolor2 , '" align="center" nowrap="nowrap"><b>' , _PJ_STATUS , '</b></td>',"\n";
echo '<td bgcolor="' , $bgcolor2 , '" align="center" nowrap="nowrap"><b>' , _PJ_PRIORITY , '</b></td>',"\n";
echo '<td bgcolor="' , $bgcolor2 , '" align="center" nowrap="nowrap"><b>' , _PJ_PROGRESSBAR , '</b></td></tr>',"\n";

$pjimage = pjimage('task.png', $module_name);

echo '<tr><td align="center"><img src="' , $pjimage , '" alt="" title="" /></td><td width="100%" nowrap="nowrap">' , $task['task_name'] , '</td>',"\n";

if($taskstatus['status_name'] == '') {
	$taskstatus['status_name'] = _PJ_NA;
}

echo '<td align="center" nowrap="nowrap">' , $taskstatus['status_name'] , '</td>',"\n";

if($taskpriority['priority_name'] == '') {
	$taskpriority['priority_name'] = _PJ_NA;
}

echo '<td align="center" nowrap="nowrap">' , $taskpriority['priority_name'] , '</td>',"\n";

$wbprogress = pjprogress($task['task_percent']);

echo '<td align="center" nowrap="nowrap">' , $wbprogress , '</td></tr>',"\n";

if($task['task_description'] != '') {
	$pjimage = pjimage('description.png', $module_name);

	echo '<tr><td align="center" valign="top"><img src="' , $pjimage , '" alt="" title="" /></td>',"\n";
	echo '<td width="100%" colspan="4">' , nl2br($task['task_description']) , '</td></tr>',"\n";
}

if($task['date_started'] > 0) {
	$start_date = date($pj_config['task_date_format'], $task['date_started']);
	$pjimage = pjimage('date.png', $module_name);

	echo '<tr><td align="center"><img src="' , $pjimage , '" alt="" title="" /></td>',"\n";
	echo '<td width="100%" colspan="4" nowrap="nowrap">' , _PJ_STARTDATE , ': <b>' , $start_date , '</b></td></tr>',"\n";
}

if($task['date_finished'] > 0) {
	$finish_date = date($pj_config['task_date_format'], $task['date_finished']);
	$pjimage = pjimage('date.png', $module_name);

	echo '<tr><td align="center"><img src="' , $pjimage , '" alt="" title="" /></td>',"\n";
	echo '<td width="100%" colspan="4" nowrap="nowrap">' , _PJ_FINISHDATE , ': <b>' , $finish_date , '</b></td></tr>',"\n";
}

echo '<tr><td bgcolor="' , $bgcolor2 , '" colspan="3" nowrap="nowrap"><b>' , _PJ_TASKMEMBERS , '</b></td>',"\n";
echo '<td bgcolor="' , $bgcolor2 , '" align="center" colspan="2" nowrap="nowrap"><b>' , _PJ_POSITION , '</b></td></tr>',"\n";

$memberresult = $db->sql_query('SELECT member_id, position_id FROM ' . $prefix . '_nsnpj_tasks_members WHERE task_id=' . $task_id . ' ORDER BY member_id');
$member_total = $db->sql_numrows($memberresult);

if($member_total != 0) {
	while(list($member_id, $position_id) = $db->sql_fetchrow($memberresult)) {
		$member = pjmember_info($member_id);
		$position = pjmemberposition_info($position_id);
		$pjimage = pjimage('member.png', $module_name);

		echo '<tr><td><img src="' , $pjimage , '" alt="" title="" /></td><td width="100%" colspan="2"><a href="mailto:' , pjencode_email($member['member_email']) , '">' , $member['member_name'] , '</a></td>',"\n";

		if($position['position_name'] == '') {
			$position['position_name'] = '----------';
		}

		echo '<td align="center" colspan="2" nowrap="nowrap">' , $position['position_name'] , '</td></tr>',"\n";
	}
} else {
	echo '<tr><td colspan="5">' , _PJ_NOTASKMEMBERS , '</td></tr>',"\n";
}

if(is_admin($admin)) {
	echo '<tr><td bgcolor="' , $bgcolor2 , '" colspan="5" width="100%" nowrap="nowrap"><b>' , _PJ_ADMINFUNCTIONS , '</b></td></tr>',"\n";

	$pjimage = pjimage('options.png', $module_name);

	echo '<tr><td align="center"><img src="' , $pjimage , '" alt="" title="" /></td>',"\n";
	echo '<td colspan="4" width="100%" nowrap="nowrap"><a href="' , $admin_file , '.php?op=PJTaskEdit&amp;task_id=' , $task_id , '">' , _PJ_EDITTASK , '</a>';
	echo ', <a href="' , $admin_file , '.php?op=PJTaskRemove&amp;task_id=' , $task_id , '">' , _PJ_DELETETASK , '</a></td></tr>',"\n";
}

echo '</table>',"\n";

CloseTable();

include('footer.php');

?>