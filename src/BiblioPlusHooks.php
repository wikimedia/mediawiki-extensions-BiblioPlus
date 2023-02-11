<?php

class BiblioPlusHooks {

	public static function onRegistration() {
		// Time To Live; store var in the cache for CACHE_TTL seconds.
		define( 'CACHE_TTL', 3600 * 24 );
	}

	/**
	 * @param OutputPage &$out
	 */
	public static function onBeforePageDisplay( OutputPage &$out ) {
		$out->addModules( 'ext.biblioPlus.qtip.config' );
	}

	/**
	 * @param Parser $parser
	 */
	public static function biblioPlusSetup( Parser $parser ) {
		$biblio = new BiblioPlus;
		$parser->setHook( "cite", [ $biblio, 'biblioRenderCite' ] );
		$parser->setHook( "nocite", [ $biblio, 'biblioRenderNocite' ] );
		$parser->setHook( "biblio", [ $biblio, 'biblioRenderBiblio' ] );
	}
}
