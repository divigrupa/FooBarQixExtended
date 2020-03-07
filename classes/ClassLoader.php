<?php
namespace ClassLoader;

class ClassLoader
{
    protected $directories = array();


    public function __construct()
    {
        spl_autoload_register([$this, 'load']);
    }

    public function add($dir)
    {
        $this->directories[] = rtrim($dir, '/\\');
    }

    private function load($class)
    {
        $classPath = sprintf('%s.php', str_replace('\\', '/', $class));

        foreach($this->directories as $dir) {
            $includePath = sprintf('%s/%s', $dir, $classPath);

            if(file_exists($includePath)) {
                require_once $includePath;
                break;
            }
        }
    }
}

$loader = new ClassLoader();
$loader->add(__DIR__);
