<?php
/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2002 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/
/************************************************************************/
/* HTML Newsletter 1.0 module for PHP-Nuke 6.5 - 7.6                    */
/* By: NukeWorks (webmaster@nukeworks.biz)                              */
/* http://www.nukeworks.com                                             */
/* Copyright � 2004 by NukeWorks                                        */
/* License: GNU/GPL                                                     */
/************************************************************************/
/************************************************************************
* HTML Newsletter 1.1 - 1.2 module for PHP-Nuke 6.5 - 7.6
* By: NukeWorks (mangaman@nukeworks.biz & montego@montegoscripts.com)
* http://www.nukeworks.biz
* Copyright � 2004, 2005 by NukeWorks
* License: GNU/GPL
************************************************************************/
/************************************************************************
* Script:     HTML Newsletter module for PHP-Nuke 6.5 - 7.6
* Version:    01.03.02
* Author:     Rob Herder (aka: montego) of montegoscripts.com
* Contact:    montego@montegoscripts.com
* Copyright:  Copyright � 2006 by Montego Scripts
* License:    GNU/GPL (see provided LICENSE.txt file)
************************************************************************/
/************************************************************************
* Rev Date      Change ID       Description
* -----------   --------------  -----------------------------------------
* 18-MAY-2006   RN_0000185      Make XHTML 1.0 Compliant, plus better use of quotes
************************************************************************/

/************************************************************************
* Funktion: Generelle Definitionen
************************************************************************/

define('_MSNL_COM_LAB_SQL','SQL');
define('_MSNL_COM_LAB_GOBACK','ZUR&Uuml;CK');
define('_MSNL_COM_LAB_ERRMSG','FEHLER MSG');
define('_MSNL_COM_LAB_HELPLEGENDTXT','Bewegen Sie den Mauszeiger &uuml;ber die Icons f&uuml;r eine ausf&uuml;hrlichere '
	.'Hilfe'
	);

define('_MSNL_COM_LNK_GOBACK','Klicken Sie hier um auf die vorherige Seite zu gelangen');

if (!defined('_MSNL_COM_ERR_SQL')) define('_MSNL_COM_ERR_SQL','SQL FEHLER');
define('_MSNL_COM_ERR_MODULE','FEHLER IM MODUL');
define('_MSNL_COM_ERR_VALMSG','DIE FOLGENDEN FELDER SCHEITERTEN EINER &Uuml;BERPR&Uuml;FUNG');
define('_MSNL_COM_ERR_VALWARNMSG','DIE FOLGENDEN FELDER ENTHALTEN WARNUNGEN');
define('_MSNL_COM_ERR_DBGETCFG','Fehler beim auslesen der Modulkonfiguration!');

define('_MSNL_COM_HLP_HELPLEGENDTXT','Ja, so funktioniert es!');

/************************************************************************
* Funktion: Generelle Definitionen zwischen Modul und Block
************************************************************************/

define('_MSNL_NLS_LAB_MORENLS','Mehr Newsletter...');
define('_MSNL_NLS_LAB_HIT','Aufruf');
define('_MSNL_NLS_LAB_HITS','Aufrufe');
define('_MSNL_NLS_LAB_SENTON','verschickt am');
define('_MSNL_NLS_LAB_SENDER','Sender');

define('_MSNL_NLS_LNK_VIEWNL','Zeige Newsletter - evtl. in einem neuen Fenster');
define('_MSNL_NLS_LNK_VIEWNLARCHS','Zeige Newsletter-Archiv');

/************************************************************************
* Funktion: msnl_nls_list
************************************************************************/

define('_MSNL_NLS_LST_LAB_ARCHTITL','Archivierte Newsletter');
define('_MSNL_NLS_LST_LAB_ADMNLS','Administriere Newsletter');

define('_MSNL_NLS_LST_LNK_ADMNLS','Zur Modulkonfiguration');

define('_MSNL_NLS_LST_MSG_NONLS','Keine Newsletter zum anzeigen gefunden');

/************************************************************************
* Funktion: msnl_nls_view
************************************************************************/

define('_MSNL_NLS_VIEW_ERR_DBGETNL','Konnte Newsletter Information nicht finden');
define('_MSNL_NLS_VIEW_ERR_CANNOTFIND','Markierter Newsletter wurde nicht gefunden');
define('_MSNL_NLS_VIEW_ERR_NOTAUTH','Sie haben keine Berechtigung diesen Newsletter einzusehen '
	.'oder es gibt diesen Newletter nicht in unserer Datenbank!');

/************************************************************************
* Funktion: msnl_copyright_view
************************************************************************/

define('_MSNL_CPY_LAB_COPYTITLE','Modul Copyright &copy; und Credits');
define('_MSNL_CPY_LAB_MODULEFOR','Modul f&uuml;r');
define('_MSNL_CPY_LAB_COPY','Copyright Information');
define('_MSNL_CPY_LAB_CREDITS','Credit Information');
define('_MSNL_CPY_LAB_MODNAME','Modulname');
define('_MSNL_CPY_LAB_MODVER','Modulversion');
define('_MSNL_CPY_LAB_MODDESC','Modulbeschreibung');
define('_MSNL_CPY_LAB_LICENSE','Lizenz');
define('_MSNL_CPY_LAB_AUTHORNM','Autorname');
define('_MSNL_CPY_LAB_AUTHOREMAIL','Autor e-Mail');
define('_MSNL_CPY_LAB_AUTHORWEB','Autor Webseite');
define('_MSNL_CPY_LAB_MODDL','Modul Download');
define('_MSNL_CPY_LAB_DOCS','Support/Hilfe Dokumentation');
define('_MSNL_CPY_LAB_ORIGAUTHOR','Original Autor(en)');
define('_MSNL_CPY_LAB_CURRENTAUTHOR','Aktuelle Autor(en)');
define('_MSNL_CPY_LAB_TRANSLATIONS','&Uuml;bersetzungs Autor(en)');
define('_MSNL_CPY_LAB_OTHER','Zus&auml;tzliche Danksagungen');

define('_MSNL_CPY_LNK_VIEWCOPYRIGHT','Zeige Copyright und Credits');
define('_MSNL_CPY_LNK_PHPNUKE','Gehe zur PHP-Nuke Webseite - Sie verlassen diese Seite');
define('_MSNL_CPY_LNK_AUTHORHOME','Gehe zur Autoren Webseite - Sie verlassen diese Seite');
define('_MSNL_CPY_LNK_DOWNLOAD','Gehe zur Download Webseite - Sie verlassen diese Seite');
define('_MSNL_CPY_LNK_DOCS','Gehe zur Dokumentation\'s Webseite - Sie verlassen diese Seite');

?>