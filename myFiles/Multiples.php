<?php
require_once('globals.php');

class Multiples 
{
    public $foo;
    public $bar;
    public $qix;
    public $inf;

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

    public function setInf() {
        $this->inf = $GLOBALS['inf'];
    }

    public function getInf() {
        return $this->inf;
    }

    public function setBarSeparator() {
        $this->bar = $GLOBALS['separator_s1'].$GLOBALS['bar'];
    }

    public function setQixSeparator() {
        if ($GLOBALS['infStatus']) {
            $this->qix = $GLOBALS['separator_s2'].$GLOBALS['qix'];
        } else {
            $this->qix = $GLOBALS['separator_s1'].$GLOBALS['qix'];
        }    
    }
    
    public function setFooSeparator() {
        $this->foo = $GLOBALS['separator_s2'].$GLOBALS['foo'];
    }

    public function checkFoo() {
       if ($GLOBALS['input'] % $GLOBALS['fooDivider'] === 0) {
        $GLOBALS['fooStatus'] = true;
        if ($GLOBALS['infStatus'] || $GLOBALS['qixStatus']) {
            $this->setFooSeparator();
            return $this;
        } else {
            $this->setFoo();
            array_push($GLOBALS['test_array'], $this->getFoo());
            return $this;
        }
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
        if ($GLOBALS['fooStatus'] || $GLOBALS['barStatus'] || $GLOBALS['infStatus']) {
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

    public function checkInf() {
       if ($GLOBALS['input'] % $GLOBALS['infDivider'] === 0) {
        $GLOBALS['infStatus'] = true;
        $this->setInf();
        array_push($GLOBALS['test_array'], $this->getInf());
        return $this;
        } else {
        return $this;
    }
}

};


?>
