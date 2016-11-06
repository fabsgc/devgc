<?php
	namespace Orm\Entity;

	use System\Orm\Entity\Entity;

	/**
	 * Class Book
	 * @Table(name="book")
	 * @Form(name="form-book")
	 * @property int $id
	 * @property string $content
	 * @package Orm\Entity
	 */

	class Book extends Entity {

		/**
		 * @var int
		 * @Column(type="INCREMENT", primary="true")
		 */

		protected $id;

		/**
		 * @var Post
		 * @Column(type="STRING", size="512")
		 */

		protected $content;
	}