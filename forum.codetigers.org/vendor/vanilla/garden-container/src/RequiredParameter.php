<?php
/**
 * @author Todd Burry <todd@vanillaforums.com>
 * @copyright 2009-2017 Vanilla Forums Inc.
 * @license MIT
 * @internal
 */

namespace Garden\Container;

/**
 * A placeholder for a required parameter.
 */
class RequiredParameter extends DefaultReference {
    private $parameter;
    private $function;

    /**
     * RequiredParameter constructor.
     *
     * @param \ReflectionParameter $param The required parameter.
     */
    public function __construct(\ReflectionParameter $param) {
        parent::__construct($param->getClass() ? $param->getClass()->name : '');

        $this->parameter = $param->name;
        $this->function = ($param->getDeclaringClass() ? $param->getDeclaringClass()->name.'::' : '').
            $param->getDeclaringFunction()->name.'()';
    }


    /**
     * Get the name.
     *
     * @return string Returns the name.
     */
    public function getParameter() {
        return $this->parameter;
    }

    /**
     * Get the function.
     *
     * @return string Returns the function.
     */
    public function getFunction() {
        return $this->function;
    }

    /**
     * {@inheritdoc}
     *
     * @throws MissingArgumentException Always throws an exception.
     */
    public function resolve(Container $container, $_ = null) {
        throw new MissingArgumentException($this->parameter, $this->function);
    }
}
