<?php

/**************************************************************************/
/* PHP-NUKE: Advanced Content Management System                           */
/* =======================================================================*/
/*                                                                        */
/* This is the language module with all the system messages               */
/*   File location: language/                                             */
/* If you make a translation, please go to                                */
/* ravenphpscripts.com and post your language translation in the forums   */
/*                                                                        */
/* If you need to use double quotes (') remember to add a backslash (\),  */
/* so your entry will look like: This is \'double quoted\' text.          */
/* And, if you use HTML code, please double check it.                     */
/**************************************************************************/
global $lastusername;
// Used in mainfile.php for RavenNuke(tm)
if(!defined('_RNINSTALLFILESFOUND')) { define('_RNINSTALLFILESFOUND','<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><head><title>RavenNuke&trade; Setup/Configuration Tool</title><meta name="rating" content="general"><meta name="generator" content="PHP Web Host - Quality Web Hosting For All PHP Applications - Copyright (c) 2002-2009 by http://www.ravenphpscripts.com"></head><body><br /><br /><center><a href="http://www.ravenphpscripts.com" title="Raven Web Service: Quality Web Hosting And Web Support"><img src="images/RavenWebServices_Banner.gif" border="0" alt="" /></a>&trade;<br /><br /><table width="75%" border="1"><tr><td align="center" style="color:blue;font-weight:bold;">Se ha detectado el directorio de INSTALACI&Oacute;N - Continuar puede poner en peligro el sitio<br /><br />Puedes borrar o cambiar el nombre de la carpeta de instalaci&oacute;n para proceder.</td></tr></table></center>'); }
// for Anagram, Milo and Karate theme support (header)
if(!defined('_TOPICS')) { define('_TOPICS','T&oacute;picos'); }
if(!defined('_ALLTOPICS')) { define('_ALLTOPICS','Todos los T&oacute;picos'); }
if(!defined('_HELLO')) { define('_HELLO','Hola'); }
// for fisubice
define('_FSIADMINMENU','Men&uacute; de Administraci&oacute;n');
define('_FSIYOURACCOUNT','Tu Cuenta');
//
define('_CHARSET','ISO-8859-1');
define('_MIME','text/html');
define('_ACCESSDENIED', 'Acceso Denegado');
define('_ACTIVEBUTNOTSEE','(Activo pero con enlace invisible)');
define('_ADD','Agregar');
define('_ADDAHOME','Agregar un m&oacute;dulo a la portada');
define('_ADDITIONALYGRP','Adem&aacute;s este m&oacute;dulo pertenece al Grupo de Usuarios');
define('_ADMIN','Administrador:');
define('_ADMNOTSUB','Usuario NO Suscrito');
define('_ADMSUB','Usuario Suscrito!');
define('_ADMSUBEXPIREIN','La Suscripci&oacute;n expira en:');
define('_ALLCATEGORIES','Todas las Categor&iacute;as');
define('_ALLOWEDHTML','HTML Permitido:');
define('_APRIL','Abril');
define('_AREYOUSURE','(Si se incluy&oacute; alguna URL, aseg&uacute;rese que sea v&aacute;lida y compruebe la ortograf&iacute;a.)');
define('_ASREGISTERED','&iquest;A&uacute;n no tienes una cuenta? Puedes <a href="modules.php?name=Your_Account&amp;op=new_user">crearte una</a>. Como usuario registrado tendr&aacute;s algunas ventajas como selector de temas, configurar los comentarios y enviar comentarios con tu nombre.');
define('_ASSOTOPIC','T&oacute;picos Asociados');
define('_AUGUST','Agosto');
define('_BANTHIS','Bloquear esta IP');
define('_BBFORUMS','Foros');
define("_BBFORUM_TOTTHREAD","Thread :: Post ");
define("_BBFORUM_TOTTOPICS","Topics ");
define("_BBFORUM_TOTPOSTS","Posts ");
define("_BBFORUM_TOTVIEWS","Views ");
define("_BBFORUM_TOTREPLIES","Total Replies ");
define("_BBFORUM_TOTMEMBERS","Members ");
define("_BBFORUM_POSTER","Posted by");
define("_BBFORUM_VIEWS","Views");
define("_BBFORUM_REPLIES","Replies");
define("_BBFORUM_LASTPOSTER","Last Post");
define('_BIGSTORY','La historia m&aacute;s le&iacute;da del dia es:');
define('_BLATEST','&Uacute;ltimo(s)');
define('_BLOCKPROBLEM','<center>Actualmente hay un problema con este bloque.</center>');
define('_BLOCKPROBLEM2','<center>Actualmete no hay contenido para este bloque.</center>');
define('_BMEM','Miembros');
define('_BMEMP','Membres&iacute;a');
define('_BON','En L&iacute;nea Ahora');
define('_BOVER','En general');
define('_BPM','Mensajes Privados');
define('_BREAD','Le&iacute;dos');
define('_BREG','Registrarse');
define('_BROADCAST','Mensaje de Difusi&oacute;n');
define('_BROADCASTFROM','Mensaje P&uacute;blico de');
define('_BROKENDOWN','Decsrgas Rotas');
define('_BROKENLINKS','Enlaces Rotos');
define('_BTD','Nuevas Hoy');
define('_BTT','Total');
define('_BUNREAD','Sin Leer');
define('_BVIS','Visitantes');
define('_BVISIT','Gente en L&iacute;nea');
define('_BWEL','Bienvenido(a)');
define('_BY','por');
define('_BYD','Nuevas Ayer');
if (!defined('_CANCEL')) define('_CANCEL','Cancelar');
if (!defined('_CATEGORY')) define('_CATEGORY','Categor&iacute;a');
define('_COMMENTS','comentarios');
define('_CONTRIBUTEDBY','Colaboraci&oacute;n de');
define('_CURRENTLY','Actualmente hay,');
if (!defined('_DATE')) define('_DATE','Fecha');
define('_DATESTRING','%A, %B %d, %Y @ %H:%M:%S %Z');
define('_DATESTRING2','%A, %B %d, %Y');
define('_DECEMBER','Diciembre');
define('_DELETE','Eliminar');
define('_EDIT','Editar');
define('_EXPIREIN','Expira en');
define('_EXPIRELESSHOUR','Expiraci&oacute;n: Menos de 1 hora');
define('_FEBRUARY','Febrero');
define('_FORADMINTESTS','(Para Pruebas)');
define('_GOBACK','[ <a href="javascript:history.go(-1)">Regresar</a> ]');
define('_GOBACK2','Retorna');
define('_GUESTS','invitado(s) y');
define('_HASEXPIRED','ha expirado.');
define('_HERE','aqu&iacute;');
define('_HOME','Portada');
define('_HOMEPROBLEM','Hay un gran problema: no tenemos una p&aacute;gina de inicio!!!');
define('_HOMEPROBLEMUSER','Actualmente hay un problema en la p&aacute;gina de inicio. Por favor, vuelve a intentarlo m&aacute;s tarde.');
define('_HOPESERVED','Esperamos haberle servido con satisfacci&oacute;n...');
define('_HOUR','Hora');
define('_HOURS','Horas');
define('_HREADMORE','leer m&aacute;s...');
define('_HTTPREFERERS','Referentes HTTP');
if (!defined('_SECCODEINCOR')) define('_SECCODEINCOR','C&oacute;digo de Seguridad inv&aacute;lido, por favor regresa y escr&iacute;belo exactamente de la forma mostrada...');
define('_IN','in'); //0000960
define('_INVISIBLEMODULES','M&oacute;dulos Invisibles');
define('_JANUARY','Enero');
define('_JOURNAL','Diario');
define('_JULY','Julio');
define('_JUNE','Junio');
define('_LASTIP','&Uacute;ltima IP del usuario:');
define('_LOGIN','Iniciar Sesi&oacute;n');
define('_LOGOUT','Cerrar Sesi&oacute;n');
define('_MARCH','Marzo');
define('_MAY','Mayo');
define('_MEMBERS','mienbro(s) en l&iacute;nea.');
define('_MENUFOR','Men&uacute; para');
define('_MODREQDOWN','Mod. Descargas');
define('_MODREQLINKS','Mod. Enlaces');
define('_MODULENOTACTIVE','Lo sentimos, este m&oacute;dulo no est&aacute; activo!');
define('_MODULESADMINS', 'Lo sentimos pero esta secci&oacute;n del sitio es para <i>Administradores Solamente.</i><br /><br />');
define('_MODULESSUBSCRIBER','Lo sentimos pero esta secci&oacute;n del sitio es para <i>Usuarios Suscritos Solamente.</i>');
define('_MODULEUSERS', 'Lo sentimos pero esta secci&oacute;n del sitio es para <i>Usuarios Registrados Solamente.</i><br /><br />Puedes registrarte gratuitamente <a href="modules.php?name=Your_Account&amp;op=new_user">AQU&Iacute;</a>, despu&eacute;s vas a poder<br />accesar a esta secci&oacute;n sin restricciones. Gracias.<br /><br />');
define('_MORENEWS','M&aacute;s en la secci&oacute;n de noticias');
define('_MULTILINGUALOFF','Lo sentimos pero no hay traducciones disponibles. Por favor contacte al Webmaster para ayuda adicional.');
define('_MVIEWADMIN','Ver: Administradores Solamente');
define('_MVIEWALL','Ver: Todos los Visitantes');
define('_MVIEWANON','Ver: Usuarios An&oacute;nimos Solamente');
define('_MVIEWSUBUSERS','Ver: Usuarios Suscritos Solamente');
define('_MVIEWUSERS','Ver: Usuarios Registrados Solamente');
define('_NEWPMSG','Nuevos Mensajes Privados');
define('_NICKNAME','Apodo');
define('_NO','No');
define('_NOACTIVEMODULES','M&oacute;dulos Inactivos');
define('_NOBIGSTORY','Todav&iacute;a no hay una gran historia para hoy.');
define('_NONE','Ninguno');
define('_NOTE','Nota');
define('_NOTSUB','No eres un susciptor de');
define('_NOVEMBER','Noviembre');
define('_NOW','ahora!');
define('_OCTOBER','Octubre');
if (!defined('_OF')) define('_OF','de');
define('_OLDERARTICLES','Art&iacute;culos Antiguos');
define('_ON','en');
define('_OR','o');
define('_PAGEGENERATION','P&aacute;gina Generada:');
define('_PAGESVIEWS','impresiones desde');
define('_PAGINATOR_TOTALITEMS','total items');
define('_PAGINATOR_PAGE','P&aacute;gina');
define('_PAGINATOR_PAGES','P&aacute;ginas');
define('_PAGINATOR_GO','Ir');
define('_PAGINATOR_GOTOPAGE','Ir a la P&aacute;gina');
define('_PAGINATOR_GOTONEXT','Ir a la siguiente P&aacute;gina');
define('_PAGINATOR_GOTOPREV','Ir a la P&aacute;gina anterior');
define('_PAGINATOR_GOTOFIRST','Ir a la primera P&aacute;gina');
define('_PAGINATOR_GOTOLAST','Ir a la &uacute;ltima P&aacute;gina');
define('_PASSWORD','Contrase&ntilde;a');
define('_PASTARTICLES','&uacute;ltimos Art&iacute;culos');
define('_PCOMMENTS','Comentarios:');
define('_POLLS','Encuestas');
define('_POSTEDBY','Enviado por');
define('_POSTEDON','Enviado en');
define('_PRIVATEMSG','mensaje(s) privado(s).');
define('_READMYJOURNAL','Leer Mi Diario');
define('_READS','lecturas');
define('_REGISTERED','Registrado');
define('_RESTRICTEDAREA', 'Usted est&aacute; intentando acceder a un &aacute;rea restringida.');
define('_RESULTS','Resultados');
define('_RN_FOOTER_CREDITS','<center><br /><font class="small">:: fisubice phpbb2 style by <a href="http://www.forumimages.com/">Daz</a> :: PHP-Nuke theme by <a href="http://www.nukemods.com">www.nukemods.com</a> ::</font></center>'.'<center><font class="small">:: fisubice Theme Recoded To 100% W3C CSS &amp; HTML 4.01 Transitional &amp; XHTML 1.0 Transitional Compliance by RavenNuke&trade; TEAM :: </font></center>'.'<center><br /><font class="small">:: <a href="http://jigsaw.w3.org/css-validator/" target="_blank" title="W3C CSS Compliance Validation"><img src="themes/fisubice/images/w3c_css.gif" width="62" height="22" border="0" alt="W3C CSS Compliance Validation" /></a> :: <a href="http://validator.w3.org/" title="W3C HTML 4.01 Transitional Compliance Validation"><img src="themes/fisubice/images/w3c_xxx.gif" alt="W3C HTML 4.01 Transitional Compliance Validation" width="62" height="22" border="0" /></a> :: <a href="http://validator.w3.org/" title="W3C XHTML 1.0 Transitional Compliance Validation"><img src="themes/fisubice/images/w3c_xhtml.gif" alt="W3C XHTML 1.0 Transitional Compliance Validation" width="62" height="22" border="0" /></a> ::</font></center>'.'<br />'."\n");
define('_RSSPROBLEM','Actualmente hay un problema con los headlines de este sitio');
define('_SBDAYS','dias');
define('_SBHOURS','horas');
define('_SBMINUTES','minutos');
define('_SBSECONDS','segundos');
define('_SBYEAR','a&ntilde;o');
define('_SBYEARS','a&ntilde;os');
define('_SEARCH','B&uacute;squeda');
define('_SECONDS','Segundos');
if (!defined('_SECURITYCODE')) define('_SECURITYCODE','C&oacute;digo de Seguridad');
define('_SELECTGUILANG','Seleccionar Idioma de la Interfaz:');
define('_SELECTLANGUAGE','Seleccionar Idioma');
define('_SEPTEMBER','Septiembre');
define('_SUBEXPIRED','Su suscripci&oacute;n ha expirado');
define('_SUBEXPIREIN','Su suscripci&oacute;n expirar&aacute; en:');
define('_SUBFROM','Puedes suscribirte desde');
define('_SUBHERE','Puedes suscribirte a nuestros servicios desde <a href="'.$subscription_url.'">aqu&iacute;</a>');
define('_SUBMISSIONS','Peticiones');
define('_SUBRENEW','Si quieres renovar tu suscripci&oacute;n por favor dir&iacute;gete a:');
define('_SUBSCRIBER','suscriptor');
define('_SUBSCRIPTIONAT','Este es un mensaje autom&aacute;tico para dejarte saber que tu suscripci&oacute;n en');
define('_SURVEY','Encuestas');
define('_TOPIC','T&oacute;pico');
define('_TURNOFFMSG','Desactivar Mensajes P&uacute;blicos');
define('_TYPESECCODE','Escribe el C&oacute;digo de Seguridad');
define('_UDOWNLOADS','Descargas');
define('_UMONTH','Mes');
define('_UNLIMITED','Ilimitado');
define('_USERS','Usuarios');
define('_VOTE','Votar');
define('_VOTES','Votos');
define('_WAITINGCONT','Contenido Esperando');
define('_WELCOMETO','Bienvenido(a) a');
define('_WERECEIVED','Hemos recivido');
define('_WLINKS','Enlaces Esperando');
define('_WREVIEWS','Reviews Esperando');
define('_WRITES','escribe');
define('_YEAR','A&ntilde;o');
define('_YES','Si');
define('_YOUARE','Tu Eres');
define('_YOUAREANON','Eres un usuario an&oacute;nimo. Puedes registrarte gratuitamente <a href="modules.php?name=Your_Account&amp;op=new_user">aqu&iacute;</a>');
define('_YOUARELOGGED','Has iniciado sesi&oacute;n como');
define('_YOUHAVE','Tienes');
define('_YOUHAVEONEMSG','Tienes 1 Nuevo Mensaje Privado');
define('_YOUHAVEPOINTS','Puntos acumulados por participar en el contenido de este sitio:');
//// Raven's User Info Block
define('_ALT_CHKPROFILE','Ver el perfil de '.$lastusername);
define('_ALT_SEND','Enviar un mensaje privado r&aacute;pido a ');
define('_BHITS','Impresiones');
define('_GUESTIPS_OPTION','- IP\'s de los Invitados -');
define('_HIDDEN','Oculto');
define('_HIDDEN_ABBREV','(O)');
define('_PASSWORDLOST','&iquest; Perdiste tu contrase&ntilde;a?');
define('_SERDT','Fecha y Hora del Servidor');
define('_TTL_RESENDEMAIL','M&oacute;dulo Resend Email para PHP-Nuke en RavenPHPScripts');
define('_WAITLINK','Esperando');
define('_YOURIP','Tu IP: ');
define('_GCALENDAR_EVENTS', 'Eventos del Calendario');

define('_RWS_WIW_UNABLECONNECTSERVER','No se puede conectar con el servidor. ');
define('_RWS_WIW_UNABLECONNECTDB','No se puede conectar a la base de datos. ');
define('_RWS_WIW_UNABLETOREMOVE','No se puede remover.');
define('_RWS_WIW_UNABLETOINSERT','No se puede insertar');
define('_RWS_WIW_MYSQLSAID','MySQL dijo');
define('_RWS_WIW_TITLE','Who is Where');
define('_RWS_WIW_GUESTSONLINE','Invitado(s) en L&iacute;nea');
define('_RWS_WIW_GUESTS','invitado(s)');
define('_RWS_WIW_HOME','Portada');
define('_RWS_WIW_USERSONLINE','Usuario(s) en l&iacute;nea');
define('_RWS_WIW_REFRESH','seg. para actualizar');
////
/*****************************************************/
/* Function to translate Datestrings                 */
/*****************************************************/

function translate($phrase) {
	switch($phrase) {
		case 'xdatestring':  $tmp = '%A, %B %d @ %T %Z'; break;
		case 'linksdatestring': $tmp = '%d-%b-%Y'; break;
		case 'xdatestring2': $tmp = '%A, %B %d'; break;
		default:    $tmp = '$phrase'; break;
	}
	return $tmp;
}

?>
