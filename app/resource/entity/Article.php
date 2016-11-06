<?php
	namespace Orm\Entity;

	use System\Collection\Collection;
	use System\Orm\Entity\Entity;

	/**
	 * Class Article
	 * @Table(name="article")
	 * @Form(name="form-article")
	 * @property int $id
	 * @property string $title
	 * @property string $content
	 * @property Collection $posts
	 * @package Orm\Entity
	 */

	class Article extends Entity {

		/**
		 * @var int
		 * @Column(type="INCREMENT", primary="true")
		 */

		protected $id;

		/**
		 * @var string
		 * @Column(type="STRING", size="255")
		 */

		protected $title;

		/**
		 * @var string
		 * @Column(type="TEXT", size="65536")
		 */

		protected $content;

		/**
		 * @var Collection
		 * @OneToMany(from="Article.id", to="Post.article", belong="COMPOSITION", join="JOIN_LEFT")
		 */

		protected $posts;
	}