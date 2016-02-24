<?php

namespace ProjxIO\Stream;

class AssociativeCallbackService implements CallbackService
{
    /**
     * @var CallbackFactory[]
     */
    private $factories;

    /**
     *
     * @param CallbackFactory[] $factories
     */
    public function __construct($factories = [])
    {
        $this->factories = $factories;
    }

    /**
     * @inheritDoc
     */
    public function next(Stream $parent, $key, array $params = [])
    {
        return new StreamNode($this, $this->factories[$key]->make($params), $parent);
    }
}
