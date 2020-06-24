<?php
namespace Live\Collection;

/**
 * File Collection
 * @package Live\Collection
 */
class FileCollection implements CollectionInterface
{
    /**
     * Collection data
     * @var src
     * @var File
     * @var array
     * @var time
     */
    protected $src_arquivo;
    protected $arquivo;
    protected $json;
    protected $time;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->time = new Timer();
        $this->src_arquivo="CollectionFile.json";
        $this->arquivo=fopen($this->src_arquivo, "a+");
        $this->json=(array) json_decode(file_get_contents($this->src_arquivo), true);
    }

    /**
     * Get the returned Value of the Key

     */
    public function get(string $index, $defaulValue = null)
    {
        if (!$this->has($index)) {
            return $defaulValue;
        }
        if ($this->json[$index]['tempo'] == null || $this->time->date() <= $this->json[$index]['tempo']) {
            return $this->json[$index]['value'];
        } else {
            return $defaulValue;
        }
    }

    /**
     * Set Values ​​in the Key
     */
    public function set(string $index, $value, $timer = null)
    {
        fwrite($this->arquivo, json_encode(array($index => array('value'=> $value, 'tempo'=> $timer))));
        fwrite($this->arquivo, ",");
        $this->json[$index] =  array('value'=> $value, 'tempo'=> $timer);
    }

    /**
     * Check the Keys
     */
    public function has(string $index)
    {
        return array_key_exists($index, $this->json);
    }

    /**
     * Total Values ​​entered
     */
    public function count(): int
    {
        return count($this->json);
    }

    /**
     * Clear Values
     */
    public function clean()
    {
        $this->json=[];
    }
}
