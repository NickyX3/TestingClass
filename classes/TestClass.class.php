<?php

/**
 * TestClass, typical example for generate some administrative menu for abstract CMS
 * @author nicky
 *
 */
class TestClass {
	
	public	$currentlink	= '';
	public	$rendered		= '';
	
	public	$adminlinks	= array (
		array('link' => '/some/path1/',		'title' => 'Title1'),
		array('link' => '/some/path2/',		'title' => 'Title2'),
		array('link' => '/some/path3/',		'title' => 'Title3'),
		array('link' => '/some/path4/',		'title' => 'Title4'),
		array(
				'link' 		=> '/some/path5/',
				'title' 	=> 'Title5',
				'childs'	=> array(
								array(
									'link' 	=> '/some/path6/',
									'title'	=> 'Title6',
								),
							),
		),
		array('link' => '/some/path7/',		'title' => 'Title7'),
		array('link' => '/some/path8/',		'title' => 'Title4'),
	);
	/**
	 * Contructor
	 */
	public function __construct() {
		$this->currentlink	= '/some/path7/';
	}
	
	public function generateMenu () {
		$nav = array();
		foreach ( $this->adminlinks as $item ) {
			if ( $item['link'] == $this->currentlink ) {
				$item['active'] = 1;
			}
			if ( $item['childs'] ) {
				$childs = array();
				foreach ( $item['childs'] as $child ) {
					if ( $child['link'] == $this->currentlink ) {
						$child['active'] = 1;
						$item['active'] = 1;
					}
					$childs[] = $child;
				}
				$item['childs'] = $childs;
			}
			$nav['list'][] = $item;
		}
		return $nav;
	}
	
}

?>