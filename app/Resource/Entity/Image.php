<?php
	namespace Gcs\App\Resource\Entity;

	use Gcs\Framework\Core\Orm\Entity\Entity;

	/**
	 * Class Image
	 * @Table(name="image")
	 * @Form(name="form-image")
	 * @property integer $id
	 * @package Orm\Entity
	 */

	class Image extends Entity {

		/**
		 * @var int
		 * @Column(type="INCREMENT", primary="true")
		 */

		protected $id;
	}