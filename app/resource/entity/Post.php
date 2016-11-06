<?php
	namespace Orm\Entity;

	use System\Orm\Entity\Entity;
	use System\Orm\Validation\Element\File;

	/**
	 * Class Post
	 * @Table(name="post")
	 * @Form(name="form-post")
	 * @property integer id
	 * @property string content
	 * @property integer article
	 * @property \System\Orm\Entity\Type\File file
	 */
	class Post extends Entity {

		/**
		 * @var int
		 * @Column(type="INCREMENT", primary="true")
		 */

		protected $id;

		/**
		 * @var string
		 * @Column(type="TEXT", size="65536")
		 */

		protected $content;

		/**
		 * @var Article
		 * @Column(type="INT")
		 * @ManyToOne(to="Article.id")
		 */

		protected $article;

		/**
		 * @var File
		 * @Column(type="FILE")
		 */

		protected $file;

		public function beforeInsert() {
			$this->validation->text('content', 'contenu')
				->equal('content', 'vous devez écrire "content"')
				->custom('title');

			$this->validation->text('article.content', 'content')
				->equal('content', 'vous devez écrire "content"');

			$this->validation->text('article.title', 'article nom')
				->sql([
					'query'      => 'SELECT COUNT(*) FROM article WHERE title = :value',
					'constraint' => '==',
					'value'      => 0,
					'vars'       => []
				],
					'cet article existe déjà')
				->custom('title');

			$this->validation->file('file', 'fichier')
				->accept(['image/png', 'image/jpeg'], 'le fichier doit être une image png')
				->extension(['png', 'jpeg', 'jpg'], 'le fichier n\'a pas la bonne extension');
		}
	}