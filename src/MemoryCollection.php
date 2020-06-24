<?php

namespace Live\Collection;

/**
 * Memory collection
 *
 * @package Live\Collection
 */
class MemoryCollection implements CollectionInterface
{
    /**
     * Collection data
     *
     * @var array
     * @var time
     */
    protected $data;
    protected $time;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->data = [];
        $this->time = new Timer();
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $index, $defaultValue = null)
    {
        if (!$this->has($index)) {
            return $defaultValue;
        }
        if ($this->data[$index]['tempo'] == null || $this->time->date() <= $this->data[$index]['tempo']) {
            return $this->data[$index]['value'];
        } else {
            return $defaulValue;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function set(string $index, $value, $timer = null)
    {
        $this->data[$index] = array('value'=> $value, 'tempo'=> $timer);
    }

    /**
     * {@inheritDoc}
     */
    public function has(string $index)
    {
        return array_key_exists($index, $this->data);
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
        return count($this->data) ;
    }

    /**
     * {@inheritDoc}
     */
    public function clean()
    {
        $this->data = [];
    }
}
