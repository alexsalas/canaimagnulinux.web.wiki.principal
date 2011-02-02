<?php
/**
 * MonoBook nouveau
 *
 * Translated from gwicke's previous TAL template version to remove
 * dependency on PHPTAL.
 *
 * @todo document
 * @file
 * @ingroup Skins
 */

if( !defined( 'MEDIAWIKI' ) )
	die( -1 );

/**
 * Inherit main code from SkinTemplate, set the CSS and template filter.
 * @todo document
 * @ingroup Skins
 */
class SkinAponwao extends SkinTemplate {
	/** Using monobook. */
	function initPage( &$out ) {
		SkinTemplate::initPage( $out );
		$this->skinname  = 'aponwao';
		$this->stylename = 'aponwao';
		$this->template  = 'AponwaoTemplate';
		# Bug 14520: skins that just include this file shouldn't load nonexis-
		# tent CSS fix files.
		$this->cssfiles = array( 'IE', 'IE50', 'IE55', 'IE60', 'IE70', 'rtl' );
	}
}

/**
 * @todo document
 * @ingroup Skins
 */
class AponwaoTemplate extends QuickTemplate {
	var $skin;
	/**
	 * Template filter callback for MonoBook skin.
	 * Takes an associative array of data set from a SkinTemplate-based
	 * class, and a wrapper for MediaWiki's localization database, and
	 * outputs a formatted page.
	 *
	 * @access private
	 */
	function execute() {
		global $wgRequest;
		$this->skin = $skin = $this->data['skin'];
		$action = $wgRequest->getText( 'action' );
		
		// Suppress warnings to prevent notices about missing indexes in $this->data
		wfSuppressWarnings();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="<?php $this->text('xhtmldefaultnamespace') ?>" <?php 
	foreach($this->data['xhtmlnamespaces'] as $tag => $ns) {
		?>xmlns:<?php echo "{$tag}=\"{$ns}\" ";
	} ?>xml:lang="<?php $this->text('lang') ?>" lang="<?php $this->text('lang') ?>" dir="<?php $this->text('dir') ?>">
	<head>
		<meta http-equiv="Content-Type" content="<?php $this->text('mimetype') ?>; charset=<?php $this->text('charset') ?>" />
		<?php  $this->html('headlinks') ?>
		<title><?php $this->text('pagetitle') ?></title>
		<style type="text/css" media="screen, projection">/*<![CDATA[*/
			@import "<?php $this->text('stylepath') ?>/common/shared.css?<?php echo $GLOBALS['wgStyleVersion'] ?>";
			@import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/main.css?<?php echo $GLOBALS['wgStyleVersion'] ?>";
		/*]]>*/</style>
                <script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('stylepath' ) ?>/aponwao/jquery.js"></script>
                <script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('stylepath' ) ?>/aponwao/easing.js"></script>
                <script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('stylepath' ) ?>/aponwao/lavalamp.js"></script>

		<link rel="stylesheet" type="text/css" <?php if(empty($this->data['printable']) ) { ?>media="print"<?php } ?> href="<?php $this->text('printcss') ?>?<?php echo $GLOBALS['wgStyleVersion'] ?>" />
		<?php if( in_array( 'IE50', $skin->cssfiles ) ) { ?><!--[if lt IE 5.5000]><style type="text/css">@import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/IE50Fixes.css?<?php echo $GLOBALS['wgStyleVersion'] ?>";</style><![endif]-->
		<?php } if( in_array( 'IE55', $skin->cssfiles ) ) { ?><!--[if IE 5.5000]><style type="text/css">@import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/IE55Fixes.css?<?php echo $GLOBALS['wgStyleVersion'] ?>";</style><![endif]-->
		<?php } if( in_array( 'IE60', $skin->cssfiles ) ) { ?><!--[if IE 6]><style type="text/css">@import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/IE60Fixes.css?<?php echo $GLOBALS['wgStyleVersion'] ?>";</style><![endif]-->
		<?php } if( in_array( 'IE70', $skin->cssfiles ) ) { ?><!--[if IE 7]><style type="text/css">@import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/IE70Fixes.css?<?php echo $GLOBALS['wgStyleVersion'] ?>";</style><![endif]-->
		<?php } ?><!--[if lt IE 7]><?php if( in_array( 'IE', $skin->cssfiles ) ) { ?><script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('stylepath') ?>/common/IEFixes.js?<?php echo $GLOBALS['wgStyleVersion'] ?>"></script>
		<?php } ?><meta http-equiv="imagetoolbar" content="no" /><![endif]-->
		
		<?php print Skin::makeGlobalVariablesScript( $this->data ); ?>
                
		<script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('stylepath' ) ?>/common/wikibits.js?<?php echo $GLOBALS['wgStyleVersion'] ?>"><!-- wikibits js --></script>
		<!-- Head Scripts -->


<?php	if($this->data['jsvarurl']) { ?>
		<script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('jsvarurl') ?>"><!-- site js --></script>
<?php	} ?>
<?php	if($this->data['pagecss']) { ?>
		<style type="text/css"><?php $this->html('pagecss') ?></style>
<?php	}
		if($this->data['usercss']) { ?>
		<style type="text/css"><?php $this->html('usercss') ?></style>
<?php	}
		if($this->data['userjs']) { ?>
		<script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('userjs' ) ?>"></script>
<?php	}
		if($this->data['userjsprev']) { ?>
		<script type="<?php $this->text('jsmimetype') ?>"><?php $this->html('userjsprev') ?></script>
<?php	}
		if($this->data['trackbackhtml']) print $this->data['trackbackhtml']; ?>
	</head>
<body<?php if($this->data['body_ondblclick']) { ?> ondblclick="<?php $this->text('body_ondblclick') ?>"<?php }?>
<?php if($this->data['body_onload']) { ?> onload="<?php $this->text('body_onload') ?>"<?php } ?>
 class="mediawiki <?php $this->text('nsclass') ?> <?php $this->text('dir') ?> <?php $this->text('pageclass') ?>">

	<div id="globalWrapper">
		<div id="column-content">
		<div id="portal-top">
			<ul id="p-personal">
<?php                   foreach($this->data['personal_urls'] as $key => $item) { ?>
                                <li id="<?php echo Sanitizer::escapeId($key) ?>"<?php
                                        if ($item['active']) { ?> class="active"<?php } ?>><a href="<?php
                                echo htmlspecialchars($item['href']) ?>"<?php echo $skin->tooltipAndAccesskey('pt-'.$key) ?><?php
                                if(!empty($item['class'])) { ?> class="<?php
                                echo htmlspecialchars($item['class']) ?>"<?php } ?>><?php
                                echo htmlspecialchars($item['text']) ?></a></li>
<?php                   } ?>
                        </ul>
		</div>
		<div id="portal-searchbox">

        <div id="p-logo">
                <a style="background-image: url(<?php $this->text('logopath') ?>);" href="http://canaima.softwarelibre.gob.ve/"<?php
                        echo $skin->tooltipAndAccesskey('n-mainpage'); ?>></a>
        </div>

<form action="<?php $this->text('searchaction') ?>" id="searchform" style="white-space: nowrap;">
	<div class="LSBox">
	<div id="clock">Introduce un término de búsqueda y presiona enter.</div>
	<label class="hiddenStructure" for="searchGadget">Buscar</label>
	<input id="searchInput" value="Buscar en la enciclopedia" name="search" type="text"<?php echo $this->skin->tooltipAndAccesskey('search');if( isset( $this->data['search'] ) ) { ?> value="<?php $this->text('search') ?>"<?php } ?> onfocus="this.value=(this.value=='Buscar en la enciclopedia') ? '' : this.value;" onblur="this.value=(this.value=='') ? 'Buscar en la enciclopedia' : this.value;"  />
				<input type='submit' name="go" class="searchButton" id="searchGoButton"	value="<?php $this->msg('searcharticle') ?>"<?php echo $this->skin->tooltipAndAccesskey( 'search-go' ); ?> />&nbsp;
				<input type='submit' name="fulltext" class="searchButton" id="mw-searchButton" value="<?php $this->msg('searchbutton') ?>"<?php echo $this->skin->tooltipAndAccesskey( 'search-fulltext' ); ?> />
	<div class="searchSection">
	</div>
	<div id="LSResult" class="LSResult" style="">
	</div>
</div>
</form>

</div>
<img src="<?php $this->text('stylepath' ) ?>/aponwao/banner.jpg" />
<?php $this->toolbox(); ?>
	<div id="content">

        <div id="p-cactions" class="">
                <h5><?php $this->msg('views') ?></h5>

                        <ul>
        <?php           foreach($this->data['content_actions'] as $key => $tab) {
                                        echo '
                                 <li id="ca-' . Sanitizer::escapeId($key).'"';
                                        if( $tab['class'] ) {
                                                echo ' class="'.htmlspecialchars($tab['class']).'"';
                                        }
                                        echo'><a href="'.htmlspecialchars($tab['href']).'"';
                                        # We don't want to give the watch tab an accesskey if the
                                        # page is being edited, because that conflicts with the
                                        # accesskey on the watch checkbox.  We also don't want to
                                        # give the edit tab an accesskey, because that's fairly su-
                                        # perfluous and conflicts with an accesskey (Ctrl-E) often
                                        # used for editing in Safari.
                                        if( in_array( $action, array( 'edit', 'submit' ) )
                                        && in_array( $key, array( 'edit', 'watch', 'unwatch' ))) {
                                                echo $skin->tooltip( "ca-$key" );
                                        } else {
                                                echo $skin->tooltipAndAccesskey( "ca-$key" );
                                        }
                                        echo '>'.htmlspecialchars($tab['text']).'</a></li>';
                                } ?>
                        </ul>
                </div>

		<a name="top" id="top"></a>
		<?php if($this->data['sitenotice']) { ?><div id="siteNotice"><?php $this->html('sitenotice') ?></div><?php } ?>
		<br /><br /><br /><br /><br />
		<h1 class="firstHeading"><?php
	
		 $this->data['displaytitle']!=""?$this->html('title'):$this->text('title') ?></h1>

		<div id="bodyContent">

			<h3 id="siteSub"><?php $this->msg('tagline') ?></h3>
			<div id="contentSub" ><?php $this->html('subtitle') ?></div>
			<?php if($this->data['undelete']) { ?><div id="contentSub2"><?php     $this->html('undelete') ?></div><?php } ?>
			<?php if($this->data['newtalk'] ) { ?><div class="usermessage"><?php $this->html('newtalk')  ?></div><?php } ?>
			<?php if($this->data['showjumplinks']) { ?><div id="jump-to-nav"><?php $this->msg('jumpto') ?> <a href="#column-one"><?php $this->msg('jumptonavigation') ?></a>, <a href="#searchInput"><?php $this->msg('jumptosearch') ?></a></div><?php } ?>
			<!-- start content -->
			<?php $this->html('bodytext') ?>
			<?php if($this->data['catlinks']) { $this->html('catlinks'); } ?>
			<!-- end content -->
			<div class="visualClear"></div>
		</div>
	</div>
		<div id="portal-footer">
		<div id="footer"> 
<?php
		$footerlinks = array(
			'privacy', 'about', 'disclaimer', 'tagline',
		);
		foreach( $footerlinks as $aLink ) {
			if( isset( $this->data[$aLink] ) && $this->data[$aLink] ) {
?>				<?php $this->html($aLink) ?>&nbsp;<?php 		}
		}
?>
		</div>

<?php
                $footerlinks2 = array(
                       'copyright', 'lastmod', 'viewcount',
                );
                foreach( $footerlinks2 as $aLink ) {
                        if( isset( $this->data[$aLink] ) && $this->data[$aLink] ) {
?>                             <div><?php $this->html($aLink) ?></div>
<?php           }
                }
?>

		<?php
                if($this->data['poweredbyico']) { ?>
                                <div id="f-poweredbyico"><?php $this->html('poweredbyico') ?></div>
<?php   }
                if($this->data['copyrightico']) { ?>
                                <div id="f-copyrightico"><?php $this->html('copyrightico') ?></div>
<?php   }

                // Generate additional footer links
?>
	
		</div>
		</div>
	
		<div id="column-one">

	<script type="<?php $this->text('jsmimetype') ?>"> if (window.isMSIE55) fixalpha(); </script>

		</div><!-- end of the left (by default at least) column -->
		<!--<div class="visualClear"></div>-->	
		
<!--</div>-->
<?php $this->html('bottomscripts'); /* JS call to runBodyOnloadHook */ ?>
<?php $this->html('reporttime') ?>
<?php if ( $this->data['debug'] ): ?>
<!-- Debug output:
<?php $this->text( 'debug' ); ?>

-->
<?php endif; ?>
<script type="text/javascript">
$(function() {

$("#menu ul").lavaLamp({

	fx: "easeOutBack",
	speed: 700

});
});
</script>
</body></html>
<?php
	wfRestoreWarnings();
	} // end of execute() method


	/*************************************************************************************************/
	function toolbox() {
?>	
<div id="menu">
   <ul id="portal-globalnav">
<li><a href="<?php print_r($this->data['nav_urls']['mainpage']['href']); ?>">Portada</a></li>
<?php
		if($this->data['notspecialpage']) { ?>
				<li id="t-whatlinkshere"><a href="<?php
				echo htmlspecialchars($this->data['nav_urls']['whatlinkshere']['href'])
				?>"<?php echo $this->skin->tooltipAndAccesskey('t-whatlinkshere') ?>><?php $this->msg('whatlinkshere') ?></a></li>
<?php
			/*if( $this->data['nav_urls']['recentchangeslinked'] ) { ?>
				<li id="t-recentchangeslinked"><a href="<?php
				echo htmlspecialchars($this->data['nav_urls']['recentchangeslinked']['href'])
				?>"<?php echo $this->skin->tooltipAndAccesskey('t-recentchangeslinked') ?>><?php $this->msg('recentchangeslinked') ?></a></li>
<?php 		}*/
		}
		if(isset($this->data['nav_urls']['trackbacklink'])) { ?>
			<li id="t-trackbacklink"><a href="<?php
				echo htmlspecialchars($this->data['nav_urls']['trackbacklink']['href'])
				?>"<?php echo $this->skin->tooltipAndAccesskey('t-trackbacklink') ?>><?php $this->msg('trackbacklink') ?></a></li>
<?php 	}
		if($this->data['feeds']) { ?>
			<?php foreach($this->data['feeds'] as $key => $feed) {
					?><li id="feed-<?php echo Sanitizer::escapeId($key) ?>"><a href="<?php
					echo htmlspecialchars($feed['href']) ?>"<?php echo $this->skin->tooltipAndAccesskey('feed-'.$key) ?>><?php echo htmlspecialchars($feed['text'])?></a></li>
					<?php }
		}

		foreach( array('contributions', 'log', 'blockip', 'emailuser', 'upload', 'specialpages') as $special ) {

			if($this->data['nav_urls'][$special]) {
				?><li id="t-<?php echo $special ?>"><a href="<?php echo htmlspecialchars($this->data['nav_urls'][$special]['href'])
				?>"<?php echo $this->skin->tooltipAndAccesskey('t-'.$special) ?>><?php $this->msg($special) ?></a></li>
<?php		}
		}


		wfRunHooks( 'AponwaoTemplateToolboxEnd', array( &$this ) );
		wfRunHooks( 'SkinTemplateToolboxEnd', array( &$this ) );
?>
<li><a href="<?php print_r($this->data['sidebar']['navigation']['3']['href']); ?>">Cambios Recientes</a></li>

			</ul>
	</div>
<?php
	}

} // end of class


