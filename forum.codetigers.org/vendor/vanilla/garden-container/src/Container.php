<?php
/**
 * @author Todd Burry <todd@vanillaforums.com>
 * @copyright 2009-2017 Vanilla Forums Inc.
 * @license MIT
 */

namespace Garden\Container;

use Psr\Container\ContainerInterface;

/**
 * An inversion of control container.
 */
class Container implements ContainerInterface {
    private $currentRule;
    private $currentRuleName;
    private $instances;
    private $rules;
    private $factories;

    /**
     * Construct a new instance of the {@link Container} class.
     */
    public function __construct() {
        $this->rules = ['*' => ['inherit' => true, 'constructorArgs' => null]];
        $this->instances = [];
        $this->factories = [];

        $this->rule('*');
    }

    /**
     * Deep clone rules.
     */
    public function __clone() {
        $this->rules = $this->arrayClone($this->rules);
        $this->rule($this->currentRuleName);
    }

    /**
     * Clear all instances
     *
     */
    public function clearInstances() {
        $this->instances = [];
    }

    /**
     * Deep clone an array.
     *
     * @param array $array The array to clone.
     * @return array Returns the cloned array.
     * @see http://stackoverflow.com/a/17729234
     */
    private function arrayClone(array $array) {
        return array_map(function ($element) {
            return ((is_array($element))
                ? $this->arrayClone($element)
                : ((is_object($element))
                    ? clone $element
                    : $element
                )
            );
        }, $array);
    }

    /**
     * Normalize a container entry ID.
     *
     * @param string $id The ID to normalize.
     * @return string Returns a normalized ID as a string.
     */
    private function normalizeID($id) {
        return ltrim($id, '\\');
    }

    /**
     * Set the current rule to the default rule.
     *
     * @return $this
     */
    public function defaultRule() {
        return $this->rule('*');
    }

    /**
     * Set the current rule.
     *
     * @param string $id The ID of the rule.
     * @return $this
     */
    public function rule($id) {
        $id = $this->normalizeID($id);

        if (!isset($this->rules[$id])) {
            $this->rules[$id] = [];
        }
        $this->currentRuleName = $id;
        $this->currentRule = &$this->rules[$id];

        return $this;
    }

    /**
     * Get the class name of the current rule.
     *
     * @return string Returns a class name.
     */
    public function getClass() {
        return empty($this->currentRule['class']) ? '' : $this->currentRule['class'];
    }

    /**
     * Set the name of the class for the current rule.
     *
     * @param string $className A valid class name.
     * @return $this
     */
    public function setClass($className) {
        $this->currentRule['class'] = $className;
        return $this;
    }

    /**
     * Get the rule that the current rule references.
     *
     * @return string Returns a reference name or an empty string if there is no reference.
     */
    public function getAliasOf() {
        return empty($this->currentRule['aliasOf']) ? '' : $this->currentRule['aliasOf'];
    }

    /**
     * Set the rule that the current rule is an alias of.
     *
     * @param string $alias The name of an entry in the container to point to.
     * @return $this
     */
    public function setAliasOf($alias) {
        $alias = $this->normalizeID($alias);

        if ($alias === $this->currentRuleName) {
            trigger_error("You cannot set alias '$alias' to itself.", E_USER_NOTICE);
        } else {
            $this->currentRule['aliasOf'] = $alias;
        }
        return $this;
    }

    /**
     * Add an alias of the current rule.
     *
     * Setting an alias to the current rule means that getting an item with the alias' name will be like getting the item
     * with the current rule. If the current rule is shared then the same shared instance will be returned. You can add
     * multiple aliases by passing additional arguments to this method.
     *
     * If {@link Container::addAlias()} is called with an alias that is the same as the current rule then an **E_USER_NOTICE**
     * level error is raised and the alias is not added.
     *
     * @param string ...$alias The alias to set.
     * @return $this
     * @since 1.4 Added the ability to pass multiple aliases.
     */
    public function addAlias(...$alias) {
        foreach ($alias as $name) {
            $name = $this->normalizeID($name);

            if ($name === $this->currentRuleName) {
                trigger_error("Tried to set alias '$name' to self.", E_USER_NOTICE);
            } else {
                $this->rules[$name]['aliasOf'] = $this->currentRuleName;
            }
        }
        return $this;
    }

    /**
     * Remove an alias of the current rule.
     *
     * If {@link Container::removeAlias()} is called with an alias that references a different rule then an **E_USER_NOTICE**
     * level error is raised, but the alias is still removed.
     *
     * @param string $alias The alias to remove.
     * @return $this
     */
    public function removeAlias($alias) {
        $alias = $this->normalizeID($alias);

        if (!empty($this->rules[$alias]['aliasOf']) && $this->rules[$alias]['aliasOf'] !== $this->currentRuleName) {
            trigger_error("Alias '$alias' does not point to the current rule.", E_USER_NOTICE);
        }

        unset($this->rules[$alias]['aliasOf']);
        return $this;
    }

    /**
     * Get all of the aliases of the current rule.
     *
     * This method is intended to aid in debugging and should not be used in production as it walks the entire rule array.
     *
     * @return array Returns an array of strings representing aliases.
     */
    public function getAliases() {
        $result = [];

        foreach ($this->rules as $name => $rule) {
            if (!empty($rule['aliasOf']) && $rule['aliasOf'] === $this->currentRuleName) {
                $result[] = $name;
            }
        }

        return $result;
    }

    /**
     * Get the factory callback for the current rule.
     *
     * @return callable|null Returns the rule's factory or **null** if it has none.
     */
    public function getFactory() {
        return isset($this->currentRule['factory']) ? $this->currentRule['factory'] : null;
    }

    /**
     * Set the factory that will be used to create the instance for the current rule.
     *
     * @param callable|null $factory This callback will be called to create the instance for the rule.
     * @return $this
     */
    public function setFactory(callable $factory = null) {
        $this->currentRule['factory'] = $factory;
        return $this;
    }

    /**
     * Whether or not the current rule is shared.
     *
     * @return bool Returns **true** if the rule is shared or **false** otherwise.
     */
    public function isShared() {
        return !empty($this->currentRule['shared']);
    }

    /**
     * Set whether or not the current rule is shared.
     *
     * @param bool $shared Whether or not the current rule is shared.
     * @return $this
     */
    public function setShared($shared) {
        $this->currentRule['shared'] = $shared;
        return $this;
    }

    /**
     * Whether or not the current rule will inherit to subclasses.
     *
     * @return bool Returns **true** if the current rule inherits or **false** otherwise.
     */
    public function getInherit() {
        return !empty($this->currentRule['inherit']);
    }

    /**
     * Set whether or not the current rule extends to subclasses.
     *
     * @param bool $inherit Pass **true** to have subclasses inherit this rule or **false** otherwise.
     * @return $this
     */
    public function setInherit($inherit) {
        $this->currentRule['inherit'] = $inherit;
        return $this;
    }

    /**
     * Get the constructor arguments for the current rule.
     *
     * @return array Returns the constructor arguments for the current rule.
     */
    public function getConstructorArgs() {
        return empty($this->currentRule['constructorArgs']) ? [] : $this->currentRule['constructorArgs'];
    }

    /**
     * Set the constructor arguments for the current rule.
     *
     * @param array $args An array of constructor arguments.
     * @return $this
     */
    public function setConstructorArgs(array $args) {
        $this->currentRule['constructorArgs'] = $args;
        return $this;
    }

    /**
     * Set a specific shared instance into the container.
     *
     * When you set an instance into the container then it will always be returned by subsequent retrievals, even if a
     * rule is configured that says that instances should not be shared.
     *
     * @param string $name The name of the container entry.
     * @param mixed $instance This instance.
     * @return $this
     */
    public function setInstance($name, $instance) {
        $this->instances[$this->normalizeID($name)] = $instance;
        return $this;
    }

    /**
     * Add a method call to a rule.
     *
     * @param string $method The name of the method to call.
     * @param array $args The arguments to pass to the method.
     * @return $this
     */
    public function addCall($method, array $args = []) {
        $this->currentRule['calls'][] = [$method, $args];

        return $this;
    }

    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param string $id Identifier of the entry to look for.
     * @param array $args Additional arguments to pass to the constructor.
     *
     * @throws NotFoundException No entry was found for this identifier.
     * @throws ContainerException Error while retrieving the entry.
     *
     * @return mixed Entry.
     */
    public function getArgs($id, array $args = []) {
        $id = $this->normalizeID($id);

        if (isset($this->instances[$id])) {
            // A shared instance just gets returned.
            return $this->instances[$id];
        }

        if (isset($this->factories[$id])) {
            // The factory for this object type is already there so call it to create the instance.
            return $this->factories[$id]($args);
        }

        if (!empty($this->rules[$id]['aliasOf'])) {
            // This rule references another rule.
            return $this->getArgs($this->rules[$id]['aliasOf'], $args);
        }

        // The factory or instance isn't registered so do that now.
        // This call also caches the instance or factory fo faster access next time.
        return $this->createInstance($id, $args);
    }

    /**
     * Make a rule based on an ID.
     *
     * @param string $nid A normalized ID.
     * @return array Returns an array representing a rule.
     */
    private function makeRule($nid) {
        $rule = isset($this->rules[$nid]) ? $this->rules[$nid] : [];

        if (class_exists($nid)) {
            for ($class = get_parent_class($nid); !empty($class); $class = get_parent_class($class)) {
                // Don't add the rule if it doesn't say to inherit.
                if (!isset($this->rules[$class]) || (isset($this->rules[$class]['inherit']) && !$this->rules[$class]['inherit'])) {
                    continue;
                }
                $rule += $this->rules[$class];
            }

            // Add the default rule.
            if (!empty($this->rules['*']['inherit'])) {
                $rule += $this->rules['*'];
            }

            // Add interface calls to the rule.
            $interfaces = class_implements($nid);
            foreach ($interfaces as $interface) {
                if (isset($this->rules[$interface])) {
                    $interfaceRule = $this->rules[$interface];

                    if (isset($interfaceRule['inherit']) && $interfaceRule['inherit'] === false) {
                        continue;
                    }

                    if (!isset($rule['shared']) && isset($interfaceRule['shared'])) {
                        $rule['shared'] = $interfaceRule['shared'];
                    }

                    if (!isset($rule['constructorArgs']) && isset($interfaceRule['constructorArgs'])) {
                        $rule['constructorArgs'] = $interfaceRule['constructorArgs'];
                    }

                    if (!empty($interfaceRule['calls'])) {
                        $rule['calls'] = array_merge(
                            isset($rule['calls']) ? $rule['calls'] : [],
                            $interfaceRule['calls']
                        );
                    }
                }
            }
        } elseif (!empty($this->rules['*']['inherit'])) {
            // Add the default rule.
            $rule += $this->rules['*'];
        }

        return $rule;
    }

    /**
     * Make a function that creates objects from a rule.
     *
     * @param string $nid The normalized ID of the container item.
     * @param array $rule The resolved rule for the ID.
     * @return \Closure Returns a function that when called will create a new instance of the class.
     * @throws NotFoundException No entry was found for this identifier.
     */
    private function makeFactory($nid, array $rule) {
        $className = empty($rule['class']) ? $nid : $rule['class'];

        if (!empty($rule['factory'])) {
            // The instance is created with a user-supplied factory function.
            $callback = $rule['factory'];
            $function = $this->reflectCallback($callback);

            if ($function->getNumberOfParameters() > 0) {
                $callbackArgs = $this->makeDefaultArgs($function, (array)$rule['constructorArgs']);
                $factory = function ($args) use ($callback, $callbackArgs) {
                    return call_user_func_array($callback, $this->resolveArgs($callbackArgs, $args));
                };
            } else {
                $factory = $callback;
            }

            // If a class is specified then still reflect on it so that calls can be made against it.
            if (class_exists($className)) {
                $class = new \ReflectionClass($className);
            }
        } else {
            // The instance is created by newing up a class.
            if (!class_exists($className)) {
                throw new NotFoundException("Class $className does not exist.", 404);
            }
            $class = new \ReflectionClass($className);
            $constructor = $class->getConstructor();

            if ($constructor && $constructor->getNumberOfParameters() > 0) {
                $constructorArgs = $this->makeDefaultArgs($constructor, (array)$rule['constructorArgs']);

                $factory = function ($args) use ($className, $constructorArgs) {
                    return new $className(...array_values($this->resolveArgs($constructorArgs, $args)));
                };
            } else {
                $factory = function () use ($className) {
                    return new $className;
                };
            }
        }

        // Add calls to the factory.
        if (isset($class) && !empty($rule['calls'])) {
            $calls = [];

            // Generate the calls array.
            foreach ($rule['calls'] as $call) {
                list($methodName, $args) = $call;
                $method = $class->getMethod($methodName);
                $calls[] = [$methodName, $this->makeDefaultArgs($method, $args)];
            }

            // Wrap the factory in one that makes the calls.
            $factory = function ($args) use ($factory, $calls) {
                $instance = $factory($args);

                foreach ($calls as $call) {
                    call_user_func_array(
                        [$instance, $call[0]],
                        $this->resolveArgs($call[1], [], $instance)
                    );
                }

                return $instance;
            };
        }

        return $factory;
    }

    /**
     * Create a shared instance of a class from a rule.
     *
     * This method has the side effect of adding the new instance to the internal instances array of this object.
     *
     * @param string $nid The normalized ID of the container item.
     * @param array $rule The resolved rule for the ID.
     * @param array $args Additional arguments passed during creation.
     * @return object Returns the the new instance.
     * @throws NotFoundException Throws an exception if the class does not exist.
     */
    private function createSharedInstance($nid, array $rule, array $args) {
        if (!empty($rule['factory'])) {
            // The instance is created with a user-supplied factory function.
            $callback = $rule['factory'];
            $function = $this->reflectCallback($callback);

            if ($function->getNumberOfParameters() > 0) {
                $callbackArgs = $this->resolveArgs(
                    $this->makeDefaultArgs($function, (array)$rule['constructorArgs']),
                    $args
                );

                $this->instances[$nid] = null; // prevent cyclic dependency from infinite loop.
                $this->instances[$nid] = $instance = call_user_func_array($callback, $callbackArgs);
            } else {
                $this->instances[$nid] = $instance = $callback();
            }

            // Reflect on the instance so that calls can be made against it.
            if (is_object($instance)) {
                $class = new \ReflectionClass(get_class($instance));
            }
        } else {
            $className = empty($rule['class']) ? $nid : $rule['class'];
            if (!class_exists($className)) {
                throw new NotFoundException("Class $className does not exist.", 404);
            }
            $class = new \ReflectionClass($className);
            $constructor = $class->getConstructor();

            if ($constructor && $constructor->getNumberOfParameters() > 0) {
                // Instantiate the object first so that this instance can be used for cyclic dependencies.
                $this->instances[$nid] = $instance = $class->newInstanceWithoutConstructor();

                $constructorArgs = $this->resolveArgs(
                    $this->makeDefaultArgs($constructor, (array)$rule['constructorArgs'], $rule),
                    $args
                );
                $constructor->invokeArgs($instance, $constructorArgs);
            } else {
                $this->instances[$nid] = $instance = new $class->name;
            }
        }

        // Call subsequent calls on the new object.
        if (isset($class) && !empty($rule['calls'])) {
            foreach ($rule['calls'] as $call) {
                list($methodName, $args) = $call;
                $method = $class->getMethod($methodName);

                $args = $this->resolveArgs(
                    $this->makeDefaultArgs($method, $args, $rule),
                    [],
                    $instance
                );

                $method->invokeArgs($instance, $args);
            }
        }

        return $instance;
    }


    /**
     * Find the class implemented by an ID.
     *
     * This tries to see if a rule exists for a normalized ID and what class it evaluates to.
     *
     * @param string $nid The normalized ID to look up.
     * @return string|null Returns the name of the class associated with the rule or **null** if one could not be found.
     */
    private function findRuleClass($nid) {
        if (!isset($this->rules[$nid])) {
            return null;
        } elseif (!empty($this->rules[$nid]['aliasOf'])) {
            return $this->findRuleClass($this->rules[$nid]['aliasOf']);
        } elseif (!empty($this->rules[$nid]['class'])) {
            return $this->rules[$nid]['class'];
        }

        return null;
    }

    /**
     * Make an array of default arguments for a given function.
     *
     * @param \ReflectionFunctionAbstract $function The function to make the arguments for.
     * @param array $ruleArgs An array of default arguments specifically for the function.
     * @return array Returns an array in the form `name => defaultValue`.
     * @throws NotFoundException If a non-optional class param is reflected and does not exist.
     */
    private function makeDefaultArgs(\ReflectionFunctionAbstract $function, array $ruleArgs) {
        $ruleArgs = array_change_key_case($ruleArgs);
        $result = [];

        $pos = 0;
        foreach ($function->getParameters() as $i => $param) {
            $name = strtolower($param->name);

            $reflectedClass = null;
            try {
                $reflectedClass = $param->getClass();
            } catch (\ReflectionException $e) {
                // If the class is not found in the autoloader a reflection exception is thrown.
                // Unless the parameter is optional we will want to rethrow.
                if (!$param->isOptional()) {
                    throw new NotFoundException(
                        "Could not find required constructor param $name in the autoloader.",
                        500,
                        $e
                    );
                }
            }

            if (array_key_exists($name, $ruleArgs)) {
                $value = $ruleArgs[$name];
            } elseif ($reflectedClass && isset($ruleArgs[$pos]) &&
                // The argument is a reference that matches the type hint.
                (($ruleArgs[$pos] instanceof Reference && is_a($this->findRuleClass($ruleArgs[$pos]->getName()), $reflectedClass->getName(), true)) ||
                // The argument is an instance that matches the type hint.
                (is_object($ruleArgs[$pos]) && is_a($ruleArgs[$pos], $reflectedClass->name)))
            ) {
                $value = $ruleArgs[$pos];
                $pos++;
            } elseif ($reflectedClass
                && ($reflectedClass->isInstantiable() || isset($this->rules[$reflectedClass->name]) || array_key_exists($reflectedClass->name, $this->instances))
            ) {
                $value = new DefaultReference($this->normalizeID($reflectedClass->name));
            } elseif (array_key_exists($pos, $ruleArgs)) {
                $value = $ruleArgs[$pos];
                $pos++;
            } elseif ($param->isDefaultValueAvailable()) {
                $value = $param->getDefaultValue();
            } elseif ($param->isOptional()) {
                $value = null;
            } else {
                $value = new RequiredParameter($param);
            }

            $result[$name] = $value;
        }

        return $result;
    }

    /**
     * Replace an array of default args with called args.
     *
     * @param array $defaultArgs The default arguments from {@link Container::makeDefaultArgs()}.
     * @param array $args The arguments passed into a creation.
     * @param mixed $instance An object instance if the arguments are being resolved on an already constructed object.
     * @return array Returns an array suitable to be applied to a function call.
     * @throws MissingArgumentException Throws an exception when a required parameter is missing.
     */
    private function resolveArgs(array $defaultArgs, array $args, $instance = null) {
        // First resolve all passed arguments so their types are known.
        $args = array_map(
            function ($arg) use ($instance) {
                return $arg instanceof ReferenceInterface ? $arg->resolve($this, $instance) : $arg;
            },
            array_change_key_case($args)
        );

        $pos = 0;
        foreach ($defaultArgs as $name => &$default) {
            if (array_key_exists($name, $args)) {
                // This is a named arg and should be used.
                $value = $args[$name];
            } elseif (isset($args[$pos]) && (!($default instanceof DefaultReference) || empty($default->getClass()) || is_a($args[$pos], $default->getClass()))) {
                // There is an arg at this position and it's the same type as the default arg or the default arg is typeless.
                $value = $args[$pos];
                $pos++;
            } else {
                // There is no passed arg, so use the default arg.
                $value = $default;
            }

            if ($value instanceof ReferenceInterface) {
                $value = $value->resolve($this, $instance);
            }

            $default = $value;
        }

        return $defaultArgs;
    }

    /**
     * Create an instance of a container item.
     *
     * This method either creates a new instance or returns an already created shared instance.
     *
     * @param string $nid The normalized ID of the container item.
     * @param array $args Additional arguments to pass to the constructor.
     * @return object Returns an object instance.
     */
    private function createInstance($nid, array $args) {
        $rule = $this->makeRule($nid);

        // Cache the instance or its factory for future use.
        if (empty($rule['shared'])) {
            $factory = $this->makeFactory($nid, $rule);
            $instance = $factory($args);
            $this->factories[$nid] = $factory;
        } else {
            $instance = $this->createSharedInstance($nid, $rule, $args);
        }
        return $instance;
    }

    /**
     * Call a callback with argument injection.
     *
     * @param callable $callback The callback to call.
     * @param array $args Additional arguments to pass to the callback.
     * @return mixed Returns the result of the callback.
     * @throws ContainerException Throws an exception if the callback cannot be understood.
     */
    public function call(callable $callback, array $args = []) {
        $instance = null;

        if (is_array($callback)) {
            $function = new \ReflectionMethod($callback[0], $callback[1]);

            if (is_object($callback[0])) {
                $instance = $callback[0];
            }
        } else {
            $function = new \ReflectionFunction($callback);
        }

        $args = $this->resolveArgs($this->makeDefaultArgs($function, $args), [], $instance);

        return call_user_func_array($callback, $args);
    }

    /**
     * Returns true if the container can return an entry for the given identifier. Returns false otherwise.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return boolean
     */
    public function has($id) {
        $id = $this->normalizeID($id);

        return isset($this->instances[$id]) || !empty($this->rules[$id]) || class_exists($id);
    }

    /**
     * Determines whether a rule has been defined at a given ID.
     *
     * @param string $id Identifier of the entry to look for.
     * @return bool Returns **true** if a rule has been defined or **false** otherwise.
     */
    public function hasRule($id) {
        $id = $this->normalizeID($id);
        return !empty($this->rules[$id]);
    }

    /**
     * Returns true if the container already has an instance for the given identifier. Returns false otherwise.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return bool
     */
    public function hasInstance($id) {
        $id = $this->normalizeID($id);

        return isset($this->instances[$id]);
    }

    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @throws NotFoundException  No entry was found for this identifier.
     * @throws ContainerException Error while retrieving the entry.
     *
     * @return mixed Entry.
     */
    public function get($id) {
        return $this->getArgs($id);
    }

    /**
     * Determine the reflection information for a callback.
     *
     * @param callable $callback The callback to reflect.
     * @return \ReflectionFunctionAbstract Returns the reflection function for the callback.
     */
    private function reflectCallback(callable $callback) {
        if (is_array($callback)) {
            return new \ReflectionMethod($callback[0], $callback[1]);
        } else {
            return new \ReflectionFunction($callback);
        }
    }
}
