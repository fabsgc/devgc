<?php

namespace Gcs\App\Resource\Entity;

use Gcs\Framework\Core\Collection\Collection;
use Gcs\Framework\Core\Orm\Entity\Entity;

/**
 * Class Student
 * @Table(name="student")
 * @Form(name="form-student")
 * @property integer $id
 * @property string $name
 * @property Collection $courses
 * @package Orm\Entity
 */
class Student extends Entity {

    /**
     * @var int
     * @Column(type="INCREMENT", primary="true")
     */

    protected $id;

    /**
     * @var string
     * @Column(type="STRING", size="255")
     */

    protected $name;

    /**
     * @var Collection
     * @ManyToMany(from="Student.id", to="Course.id")
     */

    protected $courses;
}