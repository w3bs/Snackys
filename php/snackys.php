<?php
$OmbNDzaNUwBlsny = Shop::DB()->query('SELECT nStatus FROM tplugin WHERE cVerzeichnis=\'km_snackys\'',1); if(!$OmbNDzaNUwBlsny || !isset($OmbNDzaNUwBlsny->nStatus) || $OmbNDzaNUwBlsny->nStatus != 2) die('<html><head><title>Sorry</title><link
href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<style type="text/css">
body {font-family:\'Source Sans Pro\',\'Helvetica Neue\',\'Helvetica\',\'Arial\',sans-serif;}
#box {max-width: 900px; margin: 0 auto;margin-top: 80px;width:80%;}
h2 {background: linear-gradient( 90deg, rgb(255,94,77) 0%, rgb(255,131,77) 0%, rgb(255,154,86) 0%, rgb(248,85,88) 100%); color: #fff;margin:0;padding: 20px 50px;}
p {padding: 50px; background: #f0f0f0;margin:0;}
</style></head><body><div id="box"><h2>Sorry.</h2><p>Plugin::Snackys is missing.</p></div></body></html>'); function loadConfigsSnackysTemplate() { $aiIpflxBHlcqpHp = Shop::DB()->query('SELECT * FROM xplugin_km_snackys_config',2); $kXoCwbiAYwDkguC = array(); foreach($aiIpflxBHlcqpHp as $ZYXMwDBDcZFhocj) $kXoCwbiAYwDkguC[$ZYXMwDBDcZFhocj->nKey] = $ZYXMwDBDcZFhocj->nValue; return $kXoCwbiAYwDkguC; } $smarty->assign('snackyConfig',loadConfigsSnackysTemplate()); if(!isset($smarty->registered_plugins['function']['km_zone'])) { $smarty->registerPlugin('function', 'km_zone', 'km_empty_zone'); } try { $plugin = Plugin::getPluginById('kk_dropper'); if(!empty($plugin) && $plugin->nStatus == 2) $smarty->assign('dropperFound',1); }catch(Exception $e){} function km_empty_zone($rFvTTdWOQDjtOrp,&$smarty){} $smarty->registerPlugin('function', 'getSliderPerDevice', 'getSliderPerDevice'); function getSliderPerDevice($rFvTTdWOQDjtOrp, &$smarty) { $UWmqFqtkEOjCmzp = $smarty->get_template_vars('oSlider'); if(defined("APPLICATION_VERSION") && version_compare(APPLICATION_VERSION, 500) < 0) { $smarty->assign($rFvTTdWOQDjtOrp['cAssign'],$UWmqFqtkEOjCmzp); return false; } if($UWmqFqtkEOjCmzp) { $ksWticiTwnDsBlh = $smarty->get_template_vars('nSeitenTyp'); $BZsXrnSVZqtpzBk = $smarty->get_template_vars('device'); $UNfEDZXfBiIzJTS = (isset($_SESSION['Kunde']->kKundengruppe) && $_SESSION['Kunde']->kKundengruppe > 0) ? $_SESSION['Kunde']->kKundengruppe : $_SESSION['Kundengruppe']->kKundengruppe; $slider_arr = Shop::DB()->query( "SELECT kInitial FROM textensionpoint
					WHERE
					 (kSprache = '".Shop::getLanguage()."' OR kSprache = 0)
						AND
					 (kKundengruppe = '".$UNfEDZXfBiIzJTS."' OR kKundengruppe = 0)
						AND
					 (nSeite = '".$ksWticiTwnDsBlh."' OR nSeite = 0)
						AND
					cClass='Slider'", 2 ); foreach($slider_arr as $PqOWhwAlUGmptWu) { $ksWticiTwnDsBlh = $smarty->get_template_vars('nSeitenTyp'); $jhVkuNhgWpukSaa = Shop::DB()->query('SELECT kSlider FROM tslider WHERE cName NOT LIKE "%#'.(($BZsXrnSVZqtpzBk->isMobile()) ? 'desktop' : 'mobile').'%" AND kSlider='.(int)$PqOWhwAlUGmptWu->kInitial,1); if($jhVkuNhgWpukSaa) { $LMCbyStqtHSGXMz = new Slider(); $LMCbyStqtHSGXMz->init((int)$PqOWhwAlUGmptWu->kInitial); $smarty->assign($rFvTTdWOQDjtOrp['cAssign'],$LMCbyStqtHSGXMz); break; } } } } $smarty->registerPlugin('function', 'loadCSS', 'loadCSS'); $smarty->registerPlugin('function', 'imagePreloadLogo', 'imagePreloadLogo'); $smarty->registerPlugin('function', 'getSizeBySrc', 'getSizeBySrc'); $smarty->registerPlugin('function', 'readJs', 'readJs'); $smarty->registerPlugin('function', 'getZahlungsarten', 'getZahlungsarten'); $smarty->registerPlugin('modifier', 'checkCopyfree', 'checkCopyfree'); $smarty->registerPlugin('modifier', 'optimize', 'optimize'); $smarty->registerPlugin('function', 'checkShowMatrix', 'checkShowMatrix'); $smarty->registerPlugin('function', 'snackys_content', 'snackys_content'); $smarty->registerPlugin('function', 'readSVG', 'readSVG'); function readSVG($rFvTTdWOQDjtOrp,&$smarty) { if(empty($rFvTTdWOQDjtOrp['file'])) { $smarty->trigger_error('Missing file name to read within the template.', E_USER_ERROR); } $HAJJCZvtyFqbIpb = ''; if(file_exists($rFvTTdWOQDjtOrp['file'])) { $HAJJCZvtyFqbIpb = readfile($rFvTTdWOQDjtOrp['file']); } return($HAJJCZvtyFqbIpb); } function snackys_content($rFvTTdWOQDjtOrp,&$smarty) { $VwhialoayXuudho = Shop::Smarty()->get_template_vars('snackyConfig'); if($VwhialoayXuudho['show_content_ids'] == 'Y' && $rFvTTdWOQDjtOrp['id'] == 'html_body_start') echo '<div class="dropper-box">Snackys Selektor: html_head_start<br>Snackys Selektor: html_head_end</div>'; if($VwhialoayXuudho['show_content_ids'] == 'Y' && substr($rFvTTdWOQDjtOrp['id'],0,10) != 'html_head_') echo "<div class=\"dropper-box\"><strong>Content Box ID</strong><br>Snackys Selektor: ".$rFvTTdWOQDjtOrp['id']."<br>Dropper Selector: @snackys.".$rFvTTdWOQDjtOrp['id']."<br>OPC Mount Point: opc_".$rFvTTdWOQDjtOrp['id']."</div>"; $VtTMOeQXWpHDYMK = 'WHERE `nZone`=\''.trim($rFvTTdWOQDjtOrp['id']).'\''; $ksWticiTwnDsBlh = $smarty->get_template_vars('nSeitenTyp'); $BZsXrnSVZqtpzBk = $smarty->get_template_vars('device'); $yQhShhoxvGfbLkD = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; $VtTMOeQXWpHDYMK .= ' AND (nDevice=0 OR nDevice='.( ($BZsXrnSVZqtpzBk->isMobile()) ? 1 : 2).')'; $VtTMOeQXWpHDYMK .= ' AND (nPagetype=0 OR nPagetype='.$ksWticiTwnDsBlh.')'; $VtTMOeQXWpHDYMK .= ' AND (nUrl=\'\' OR nUrl=\''.$yQhShhoxvGfbLkD.'\')'; $SxdCzxWMlRqmVpe = Shop::DB()->query('SELECT nType,nPHPIf,cClass,cContent FROM `xplugin_km_snackys_content` '.$VtTMOeQXWpHDYMK.' ORDER BY nSort ASC,cName ASC',2); if($SxdCzxWMlRqmVpe) { foreach($SxdCzxWMlRqmVpe as $XpsPEXRAQAxLQjt) { $XpomPXHVbChYvuY = true; if(trim($XpsPEXRAQAxLQjt->nPHPIf) != '') { try{ eval('$PwsRXjFeKOjuCMX = function(){'.$XpsPEXRAQAxLQjt->nPHPIf.'};'); $XpomPXHVbChYvuY = $PwsRXjFeKOjuCMX(); } catch(Exception $e){$XpomPXHVbChYvuY = false;} } if($XpomPXHVbChYvuY) { $qrtwJcPqJDKTjck = ''; switch($XpsPEXRAQAxLQjt->nType) { case 1: if($VwhialoayXuudho['optimize_content'] == 'Y') $XpsPEXRAQAxLQjt->cContent = optimize($XpsPEXRAQAxLQjt->cContent); $qrtwJcPqJDKTjck = Shop::Smarty()->fetch('string:'.$XpsPEXRAQAxLQjt->cContent); break; case 2: $pqnulaQCfDGfieY = json_decode($XpsPEXRAQAxLQjt->cContent); if(!isset($UKUujDsewsJOLjn)) $UKUujDsewsJOLjn = Artikel::getDefaultOptions(); if($pqnulaQCfDGfieY) { $xHoaopvdEqeZJGv = explode(";",$pqnulaQCfDGfieY->products); $fJkpDmidWSGuJyC = array(); foreach($xHoaopvdEqeZJGv as $XVWqZRLNCJBKnZr) { $GxUSpFcPCSSxukE = Shop::DB()->query('SELECT kArtikel FROM tartikel WHERE cArtNr=\''.trim($XVWqZRLNCJBKnZr).'\' LIMIT 1',1); if($GxUSpFcPCSSxukE) { $qzkuWSXpkumVaFG = new Artikel(); $qzkuWSXpkumVaFG->fuelleArtikel($GxUSpFcPCSSxukE->kArtikel, $UKUujDsewsJOLjn); $fJkpDmidWSGuJyC[] = $qzkuWSXpkumVaFG; } } $APMWFgchiSvUMlG = $pqnulaQCfDGfieY->title; Shop::Smarty()->assign('tempProducts',$fJkpDmidWSGuJyC); Shop::Smarty()->assign('tempTitle',$APMWFgchiSvUMlG); $qrtwJcPqJDKTjck = '<div class="snackys-content '.$XpsPEXRAQAxLQjt->cClass.'">'.Shop::Smarty()->fetch('string:{include file=\'snippets/product_slider.tpl\' productlist=$VPWWbqzmkZWdznh title=$dsnWNgeuqGHbYuY hideOverlays=true}').'</div>'; } break; default: $qrtwJcPqJDKTjck = '<div class="snackys-content '.$XpsPEXRAQAxLQjt->cClass.'">'.$XpsPEXRAQAxLQjt->cContent.'</div>'; break; } echo $qrtwJcPqJDKTjck; } } } } function checkShowMatrix($rFvTTdWOQDjtOrp,&$smarty) { $NZOibvbFIRzfObU = $smarty->getTemplateVars('showMatrix'); if(isset($rFvTTdWOQDjtOrp['kundengruppen']) && isset($_SESSION['Kunde']) && isset($_SESSION['Kunde']->kKundengruppe) && $_SESSION['Kunde']->kKundengruppe > 0) { $byEeuQzYuTfXrms = explode(';',$rFvTTdWOQDjtOrp['kundengruppen']); foreach($byEeuQzYuTfXrms as $mCotlFhrCtBtVfm) { if(intval(trim($mCotlFhrCtBtVfm)) == $_SESSION['Kunde']->kKundengruppe) $NZOibvbFIRzfObU = true; } } if($NZOibvbFIRzfObU == true) $smarty->assign('showMatrix',true); } function optimize($DPoztnTnfnLKWdi) { $PrVebbNahdPXPeJ = '/\<iframe(.*)>/i'; $DPoztnTnfnLKWdi = preg_replace_callback($PrVebbNahdPXPeJ,function($LAQhWcisSrEmQAd){ if(strpos($LAQhWcisSrEmQAd[0],'data-src')) return $LAQhWcisSrEmQAd[0]; else { $CstjazxIgiUroNI = Shop::Smarty()->get_template_vars('snackyConfig'); return str_replace('src=','src="'.$CstjazxIgiUroNI['preloadImage'].'" data-src=',$LAQhWcisSrEmQAd[0]); } },$DPoztnTnfnLKWdi); $PrVebbNahdPXPeJ = '/\<img(.*)>/i'; $DPoztnTnfnLKWdi = preg_replace_callback($PrVebbNahdPXPeJ,function($LAQhWcisSrEmQAd){ if(strpos($LAQhWcisSrEmQAd[0],'data-src')) return $LAQhWcisSrEmQAd[0]; else { $CstjazxIgiUroNI = Shop::Smarty()->get_template_vars('snackyConfig'); return str_replace('src=','src="'.$CstjazxIgiUroNI['preloadImage'].'" data-src=',$LAQhWcisSrEmQAd[0]); } },$DPoztnTnfnLKWdi); return $DPoztnTnfnLKWdi; } if(file_exists(PFAD_ROOT.'/includes/libs/minify/lib/CSSmin.php')) require_once(PFAD_ROOT.'/includes/libs/minify/lib/CSSmin.php'); function getZahlungsarten($rFvTTdWOQDjtOrp, &$smarty) { if(isset($rFvTTdWOQDjtOrp['cAssign'])) { $lAzeaVzPDPnrGRC = array(); $zQuqgCONKbGWmXX = Shop::DB()->query('SELECT kZahlungsart FROM tversandartzahlungsart GROUP BY kZahlungsart',2); foreach($zQuqgCONKbGWmXX as $HidACEZbkkhrsQA) { $tKJfLUtssmbxhQI = new Zahlungsart(); $tKJfLUtssmbxhQI->load($HidACEZbkkhrsQA->kZahlungsart); $lAzeaVzPDPnrGRC[] = $tKJfLUtssmbxhQI; } $smarty->assign($rFvTTdWOQDjtOrp['cAssign'],$lAzeaVzPDPnrGRC); } return false; } function readJs($rFvTTdWOQDjtOrp, &$smarty) { if(empty($rFvTTdWOQDjtOrp['file'])) { $smarty->trigger_error('Missing file name to read within the template.', E_USER_ERROR); } $HAJJCZvtyFqbIpb = ''; if($smarty->template_exists($rFvTTdWOQDjtOrp['file'])) { if(file_exists($smarty->template_dir['frontend'].$rFvTTdWOQDjtOrp['file'])) $HAJJCZvtyFqbIpb = readfile($smarty->template_dir['frontend'].$rFvTTdWOQDjtOrp['file']); else $HAJJCZvtyFqbIpb = readfile(PFAD_ROOT.'templates/snackys/'.$rFvTTdWOQDjtOrp['file']); } return($HAJJCZvtyFqbIpb); } function checkCopyfree($DPoztnTnfnLKWdi) { return $DPoztnTnfnLKWdi!='XcUxIycWrh5GYSL5vg22WaluNKCiZgDN'; } function loadCSS($rFvTTdWOQDjtOrp, &$smarty) { $yOzWAvZfYeVoypM = array(); if(is_array($rFvTTdWOQDjtOrp['css1'])) $yOzWAvZfYeVoypM = array_merge($yOzWAvZfYeVoypM,$rFvTTdWOQDjtOrp['css1']); if(is_array($rFvTTdWOQDjtOrp['css2'])) $yOzWAvZfYeVoypM = array_merge($yOzWAvZfYeVoypM,$rFvTTdWOQDjtOrp['css2']); if(is_array($rFvTTdWOQDjtOrp['css3'])) $yOzWAvZfYeVoypM = array_merge($yOzWAvZfYeVoypM,$rFvTTdWOQDjtOrp['css3']); elseif(!empty($rFvTTdWOQDjtOrp['css3'])) $yOzWAvZfYeVoypM[] = $rFvTTdWOQDjtOrp['css3']; $TfHigpbKPLpjQgK = $smarty->get_template_vars('currentTemplateDir'); $PZJZodumtgtPkPg = $smarty->get_template_vars('parentTemplateDir'); $VwhialoayXuudho = $smarty->get_template_vars('Einstellungen'); $brVMSYtFTalvyaB = $smarty->get_template_vars('snackyConfig'); $ZUdFbOlgsEPfPiZ = new Template(); $OVDqrrFFlxeCsii = $ZUdFbOlgsEPfPiZ->leseXML(); $rCniGaPcIBzCwox = $OVDqrrFFlxeCsii->CSSPageTypes; if(!$rCniGaPcIBzCwox) { $OVDqrrFFlxeCsii = $ZUdFbOlgsEPfPiZ->leseXML($ZUdFbOlgsEPfPiZ->getFrontendTemplate()); $rCniGaPcIBzCwox = $OVDqrrFFlxeCsii->CSSPageTypes; } foreach($rCniGaPcIBzCwox as $o) foreach($o as $rMDfaJNgNfParip) if($rMDfaJNgNfParip->attributes()->PageType == $rFvTTdWOQDjtOrp['cPageType'] || $rMDfaJNgNfParip->attributes()->PageType == 'all') { $vMrORAXVmgzIsOI = str_replace('##theme##',$VwhialoayXuudho['template']['theme']['theme_default'],$rMDfaJNgNfParip->attributes()->Path); if(substr($vMrORAXVmgzIsOI,0,1) != '/') $vMrORAXVmgzIsOI = '/'.$TfHigpbKPLpjQgK.$vMrORAXVmgzIsOI; $yOzWAvZfYeVoypM[] = $vMrORAXVmgzIsOI; } $oUuosiYhhmFAbmd = array(); foreach($brVMSYtFTalvyaB as $QeNrXMQeMpRCCAN => $oOfbNkzphNFiSUe) { if(substr($QeNrXMQeMpRCCAN,0,4) == 'css_') $oUuosiYhhmFAbmd[substr($QeNrXMQeMpRCCAN,4)] = $oOfbNkzphNFiSUe; } $ksWticiTwnDsBlh = $smarty->get_template_vars('nSeitenTyp'); $XZFcZjqdYrymbAn = array(); $IAEzAzBTagXGvyh = ''; if($ksWticiTwnDsBlh === 1) { $x = $smarty->get_template_vars('Artikel'); if($x && isset($x->FunktionsAttribute)) $XZFcZjqdYrymbAn = $x->FunktionsAttribute; } elseif($ksWticiTwnDsBlh === 2) { $x = $smarty->get_template_vars('AktuelleKategorie'); if($x && isset($x->categoryFunctionAttributes)) $XZFcZjqdYrymbAn = $x->categoryFunctionAttributes; } if(count($XZFcZjqdYrymbAn) > 0) { foreach($XZFcZjqdYrymbAn as $QeNrXMQeMpRCCAN => $oOfbNkzphNFiSUe) if(substr($QeNrXMQeMpRCCAN,0,4) == 'css_') { foreach($oUuosiYhhmFAbmd as $EhuOgOAFaAtoBJf => $GHGbvdcsCGKqEyK) if(strtolower($EhuOgOAFaAtoBJf) == strtolower(substr($QeNrXMQeMpRCCAN,4))) { $oUuosiYhhmFAbmd[$EhuOgOAFaAtoBJf] = $oOfbNkzphNFiSUe; } $IAEzAzBTagXGvyh = substr($QeNrXMQeMpRCCAN,4).'###'.$oOfbNkzphNFiSUe.'|'; } } $bCKpSMffltybtRH = ''; $IAEzAzBTagXGvyh = ($IAEzAzBTagXGvyh == '') ? '' : '_'.crc32($IAEzAzBTagXGvyh); $itlCQIaUubzZjdt = PFAD_ROOT.'templates/snackys/temp/main_inline_css_'.crc32(implode(';',$yOzWAvZfYeVoypM)).$IAEzAzBTagXGvyh.'.css'; if(file_exists($itlCQIaUubzZjdt) && !isset($_REQUEST['rebuildCache'])) $bCKpSMffltybtRH = file_get_contents($itlCQIaUubzZjdt); if($brVMSYtFTalvyaB['debug_mode'] == 'Y') $bCKpSMffltybtRH = ''; if($bCKpSMffltybtRH == '') { $rMDfaJNgNfParip = ''; foreach($yOzWAvZfYeVoypM as $HAJJCZvtyFqbIpb) { $rMDfaJNgNfParip .= file_get_contents(PFAD_ROOT.'/'.$HAJJCZvtyFqbIpb); } $ENnFymCoEfVRHdQ = array(); foreach($oUuosiYhhmFAbmd as $HglEjuKtFdoXsQx => $plvbcVcUbrEeqaD) $ENnFymCoEfVRHdQ['@'.$HglEjuKtFdoXsQx] = $plvbcVcUbrEeqaD; $rMDfaJNgNfParip = str_replace(array_keys($ENnFymCoEfVRHdQ), $ENnFymCoEfVRHdQ, $rMDfaJNgNfParip); if(!class_exists('CSSmin')) $bCKpSMffltybtRH = $rMDfaJNgNfParip; else { $hEewbgdobVYjZhs = new CSSmin; $bCKpSMffltybtRH = @$hEewbgdobVYjZhs->run($rMDfaJNgNfParip); } file_put_contents($itlCQIaUubzZjdt, $bCKpSMffltybtRH); } $rMDfaJNgNfParip = '<style id="maincss">'.$bCKpSMffltybtRH.'</style>'; echo $rMDfaJNgNfParip; } function getSizeBySrc($rFvTTdWOQDjtOrp, &$smarty) { list($sjODphYsibPaNHI, $pZcUBYJrtygkIkw, $vFmRFFJjQmGcIFb, $ykqKQoTVQxwRPJj) = getimagesize($rFvTTdWOQDjtOrp['src']); if(!$sjODphYsibPaNHI) return; if(isset($rFvTTdWOQDjtOrp['cAssign'])) $smarty->assign($rFvTTdWOQDjtOrp['cAssign'], array('width' => $sjODphYsibPaNHI, 'height' => $pZcUBYJrtygkIkw, 'padding' => ($pZcUBYJrtygkIkw / $sjODphYsibPaNHI * 100))); return ; } function imagePreloadLogo($rFvTTdWOQDjtOrp, &$smarty) { if (empty($rFvTTdWOQDjtOrp['src'])) { return ''; } $dHikFoPnYgqdbeb = get_image_size($rFvTTdWOQDjtOrp['src']); $hbXSltWSreofQtk = $rFvTTdWOQDjtOrp['src']; $pbryyxZTlPmkLiB = isset($rFvTTdWOQDjtOrp['id']) ? ' id="' . $rFvTTdWOQDjtOrp['id'] . '"' : ''; $zyunJwqWvmIfSRi = isset($rFvTTdWOQDjtOrp['alt']) ? ' alt="' . truncate($rFvTTdWOQDjtOrp['alt'], 75) . '"' : ''; $TZyDMBNBFSLQPph = isset($rFvTTdWOQDjtOrp['title']) ? ' title="' . truncate($rFvTTdWOQDjtOrp['title'], 75) . '"' : ''; $dLPTEZJNqlwqxyb = isset($rFvTTdWOQDjtOrp['class']) ? ' class="' . truncate($rFvTTdWOQDjtOrp['class'], 75) . '"' : ''; if ($dHikFoPnYgqdbeb !== null && $dHikFoPnYgqdbeb->size->width > 0 && $dHikFoPnYgqdbeb->size->height > 0) { $ggXmVEMflxNWKlf = intval(intval($dHikFoPnYgqdbeb->size->height) / intval($dHikFoPnYgqdbeb->size->width) * 100); if(!isset($rFvTTdWOQDjtOrp['noAdd'])) $QPfRshHnZDIfhgt = '<style type="text/css">#logo .image-content:before{padding-top:'.$ggXmVEMflxNWKlf.'%;}</style>'; return $QPfRshHnZDIfhgt.'<img data-src="' . $hbXSltWSreofQtk . '" width="' . $dHikFoPnYgqdbeb->size->width . '" height="' . $dHikFoPnYgqdbeb->size->height . '"' . $pbryyxZTlPmkLiB . $zyunJwqWvmIfSRi . $TZyDMBNBFSLQPph . $dLPTEZJNqlwqxyb . ' />'; } return '<img src="' . $hbXSltWSreofQtk . '"' . $pbryyxZTlPmkLiB . $zyunJwqWvmIfSRi . $TZyDMBNBFSLQPph . $dLPTEZJNqlwqxyb . ' />'; } ?>