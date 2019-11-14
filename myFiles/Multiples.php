<?php
require_once('globals.php');

class Multiples 
{
    public $foo;
    public $bar;
    public $qix;

    public function setFoo() {
        $this->foo = $GLOBALS['foo'];
    }

    public function getFoo() {
        return $this->foo;
    }

    public function setBar() {
        $this->bar = $GLOBALS['bar'];
    }

    public function getBar() {
        return $this->bar;
    }

    public function setQix() {
        $this->qix = $GLOBALS['qix'];
    }

    public function getQix() {
        return $this->qix;
    }

     public function setBarSeparator() {
        $this->bar = $GLOBALS['separator'].$GLOBALS['bar'];
    }

      public function setQixSeparator() {
        $this->qix = $GLOBALS['separator'].$GLOBALS['qix'];
    }

    public function checkFoo() {
       if ($GLOBALS['input'] % $GLOBALS['fooDivider'] === 0) {
        $GLOBALS['fooStatus'] = true;
        $this->setFoo();
        array_push($GLOBALS['test_array'], $this->getFoo());
        return $this;
        } else {
        return $this;
    }
}

    public function checkBar() {
       if ($GLOBALS['input'] % $GLOBALS['barDivider'] === 0) {
        $GLOBALS['barStatus'] = true;
        if ($GLOBALS['fooStatus']) {
            $this->setBarSeparator();
            return $this;
        } else {
        $this->setBar();
        array_push($GLOBALS['test_array'], $this->getBar());
        return $this;
        }
    } else {
        return $this;
    }
}

    public function checkQix() {
       if ($GLOBALS['input'] % $GLOBALS['qixDivider'] === 0) {
        $GLOBALS['qixStatus'] = true;
        if ($GLOBALS['fooStatus'] || $GLOBALS['barStatus']) {
            $this->setQixSeparator();
            return $this;
        } else {
        $this->setQix();
        array_push($GLOBALS['test_array'], $this->getQix());
        return $this;
        }
    } else {
        return $this;
    }
}

};


?>
