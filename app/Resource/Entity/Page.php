<?php
	namespace Gcs\App\Resource\Entity;

	use Gcs\Framework\Core\Orm\Entity\Entity;

	/**
	 * Class Page
	 * @Table(name="page")
	 * @Form(name="form-page")
	 * @property integer $id
	 * @property Image $image_id
	 * @package Orm\Entity
	 */

	class Page extends Entity {

		/**
		 * @var int
		 * @Column(type="INCREMENT", primary="true")
		 */

		protected $id;

		/**
		 * @var Image
		 * @Column(type="INT", primary="true")
		 * @OneToOne(to="Image.id")
		 */

		protected $image_id;
	}