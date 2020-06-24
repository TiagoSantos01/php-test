<?php
namespace Live\Collection;

/**
 * File Collection
 * 
 * @package Live\Collection
 */
class FileCollection implements CollectionInterface
{
    /**
     * Collection data
     * 
     * @var src
     * @var File
     * @var array 
     */
    protected $src_arquivo;
    protected $arquivo;
    protected $json;
    /**
     * Constructor
     */
    public function _construct()
    {
        $this->src_arquivo="CollectionFile.json";
        $this->arquivo=fopen($this->src_arquivo,"a+");
        $this->json=json_decode($this->arquivo);
    }

    /**
     * Get the returned Value of the Key
     * 
     */
    public function get(string $index,$defaulValue=null )
    {
        if(!$this->has($index)){
            return $defaulValue;
        }
    
        return $this->json[$index];
    }

    /**
     * Set Values ​​in the Key
     */
    public function set(string $index,$value)
    {
        $this->$json[$index] = $value;

        fwrite($arquivo, array($this->$json));
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
        fwrite($arquivo,array($this->json));
    }
}
?>