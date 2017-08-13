<?php

namespace JoshWhatK\Exceptions;

use Exception;
use ReflectionMethod;
use ReflectionParameter;

class TemplatedWrench extends Wrench
{
    protected $code;
    protected $template;
    protected $templateOpener = '{{';
    protected $templateCloser = '}}';

    public function __construct($variables)
    {
        $this->message = $this->template();

        array_walk($variables, function ($value, $key) {
            $this->message = str_replace(
                $this->getTemplateString($key),
                $value,
                $this->message
            );
        });

        parent::__construct();
    }

    protected function getTemplateString($value)
    {
        return $this->getTemplateOpener().$value.$this->getTemplateCloser();
    }

    protected function getTemplateOpener()
    {
        return $this->templateOpener;
    }

    protected function getTemplateCloser()
    {
        return $this->templateCloser;
    }

    protected function template()
    {
        return $this->template;
    }
}

// class MessageNotFound extends TemplatedWrench
// {
//     protected $code = 404;
//     protected $template = 'The message {{message}} could not be {{verb}} in {{file}}';
// }
// $message = '‘howdy’';
// $file = __FILE__;
// $verb = 'arrived at';

// echo new MessageNotFound(compact('message', 'file', 'verb'));
