<?php
	namespace Gcs\App\Resource\Entity;

	use Gcs\Framework\Core\Orm\Entity\Entity;

	/**
	 * Class Mydate
	 * @Table(name="mydate")
	 * @Form(name="form-mydate")
	 * @property integer $id
	 * @property \DateTime $date
	 * @package Orm\Entity
	 */

	class Mydate extends Entity {

		/**
		 * @var int
		 * @Column(type="INCREMENT", primary="true")
		 */

		protected $id;

		/**
		 * @var \DateTime
		 * @Column(type="DATETIME")
		 */

		protected $date;
	}