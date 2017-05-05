<?php

namespace Gcs\App\Resource\Request\Plugin;

/**
 * Trait Captcha
 * @package Gcs\App\Resource\Request\Plugin
 * @property \Gcs\Framework\Core\Form\Validation\Validation $validation
 */
trait Captcha {
    public function captcha() {
        $this->validation->text('captcha', 'captcha')
            ->equal('coucou', 'Le captcha ne correspond pas à l\'image');
    }
}