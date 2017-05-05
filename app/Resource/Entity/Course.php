<?php

namespace Gcs\App\Resource\Entity;

use Gcs\Framework\Core\Collection\Collection;
use Gcs\Framework\Core\Orm\Entity\Entity;

/**
 * Class Course
 * @Table(name="course")
 * @Form(name="form-course")
 * @property int $id
 * @property string $name
 * @property Collection $students
 * @package Orm\Entity
 */
class Course extends Entity {

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
     * @ManyToMany(from="Course.id", to="Student.id")
     */

    protected $students;
}