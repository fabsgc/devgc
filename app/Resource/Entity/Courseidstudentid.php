<?php

namespace Gcs\App\Resource\Entity;

use Gcs\Framework\Core\Collection\Collection;
use Gcs\Framework\Core\Orm\Entity\Entity;
use Gcs\Framework\Core\Orm\Entity\Field;
use Gcs\Framework\Core\Orm\Entity\ForeignKey;

/**
 * Class Courseidstudentid
 * @Table(name="courseidstudentid")
 * @Form(name="form-courseidstudentid")
 * @property integer $id
 * @property Student $student_id
 * @property Course $course_id
 * @property int $count
 * @package Orm\Entity
 */
class Courseidstudentid extends Entity {

    /**
     * @var int
     * @Column(type="INCREMENT", primary="true")
     */

    protected $id;

    /**
     * @var Collection
     * @Column(type="INT")
     * @ManyToOne(to="Student.id")
     */

    protected $student_id;

    /**
     * @var Collection
     * @Column(type="INT")
     * @ManyToOne(to="Course.id")
     */

    protected $course_id;

    /**
     * @var int
     * @Column(type="INT")
     */

    protected $count;
}