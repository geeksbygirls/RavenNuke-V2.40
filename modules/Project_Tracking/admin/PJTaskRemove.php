<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright � 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$pagetitle = ": "._PJ_TITLE.": "._PJ_TASKS.": "._PJ_DELETETASK;
include("header.php");
$task = pjtask_info($task_id);
pjadmin_menu(_PJ_TASKS.": "._PJ_DELETETASK);
echo "<br />\n";
OpenTable();
echo "<form method='post' action='".$admin_file.".php'>\n";
echo "<table align='center' border='0' cellpadding='2' cellspacing='2'>\n";
echo "<tr><td align='center'><b>"._PJ_TASKCONFIRMDELETE."</b></td></tr>\n";
echo "<tr><td align='center'><b><i>".$task['task_name'].":</i></b></td></tr>\n";
echo "<tr><td align='center'><i>".$task['task_description']."</i></td></tr>\n";
echo "<tr><td align='center'>\n";
echo "<input type='hidden' name='op' value='PJTaskDelete' />\n";
echo "<input type='hidden' name='task_id' value='$task_id' />\n";
echo "<input type='submit' value='"._PJ_DELETETASK."' />\n";
echo "</td></tr>\n";
echo "</table>\n";
echo "</form>\n";
CloseTable();
pj_copy();
include("footer.php");

?>