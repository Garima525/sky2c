<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\I18n\I18n;
use Cake\View\Helper\PaginatorHelper;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
	
	
        public $helpers = ['Form'];	
        	
		public $paginate = [
        'limit' => 8
		];
		
    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
	/**
	* Function for cms pages
	*/ 
	public function initialize()
    {
		
		parent::initialize();
		 $this->Auth->allow(['cms']);
			
		
	}
	
	function cms($url = NULL)
	{
		
		$this->viewBuilder()->layout('inner_cms_pages');
		$CmsPagesModel = TableRegistry::get('CmsPages');
		
		
		$CmsPageData = $CmsPagesModel->find("all",["conditions"=>['CmsPages.pageurl'=> $url]])->first();
		//print_r($CmsPageData); die;
		$this->pageTitle = $CmsPageData->meta_title;
		$this->pageKeyword = $CmsPageData->meta_keywords;
		$this->pageDescription = $CmsPageData->meta_description;
		
		$this->set(array('CmsPageData', 'pageurl'), array($CmsPageData, $url));
	}
		
}
