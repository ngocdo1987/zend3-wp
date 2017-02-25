<?php
namespace Cms\Form;

use Zend\Form\Form;

class CategoryForm extends Form
{
	public function __construct($name = null)
	{
		parent::__construct('category');

		$this->add([
			'name' => 'id',
			'type' => 'hidden'
		]);

		$this->add([
			'name' => 'category_name',
			'type' => 'text',
			'options' => [
				'label' => 'Category name'
			] 
		]);

		$this->add([
			'name' => 'category_slug',
			'type' => 'text',
			'options' => [
				'label' => 'Category slug'
			]
		]);

		$this->add(
			'name' => 'category_description',
			'type' => 'text',
			'options' => [
				'label' => 'Category description'
			]
		);

		
	}
}