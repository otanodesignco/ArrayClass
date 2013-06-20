<?php 

class Table 
{ 
    private $type, $table, $DEFAULT_KEY; 
     
    public function __construct($val = "number") 
    { 
        $this->table = array(); 
        $this->DEFAULT_KEY = "item"; 
         
        $val = strtolower($val); 
         
        switch($val) 
        { 
            case "number": 
                $this->type = "number"; 
            break; 
             
            case "mixed": 
                $this->type = "mixed"; 
            break; 
             
            default: 
                $this->type = "number"; 
            break; 
        } 
    } 
     
    public function add($val, $key = null) 
    { 
        if($this->type == "number") 
        { 
            $this->table[] = $val; 
        } 
        else 
        { 
            if(!empty($key)) 
            { 
                $this->table[$key] = $val; 
            } 
            else 
            { 
                $randNum = mt_rand(1,1000000000); 
                $nKey = $this->DEFAULT_KEY . $randNum; 
                 
                if(!array_key_exists($nKey, $this->table)) 
                { 
                    $this->table[$nKey] = $val; 
                } 
                else 
                { 
                    while(array_key_exists($nKey, $this->table)) 
                    { 
                        $randNum = mt_rand(1,1000000000); 
                        $nKey = $this->DEFAULT_KEY . $randNum;     
                         
                        if(!array_key_exists($nKey, $this->table)) 
                        { 
                            $this->table[$nKey] = $val; 
                            break; 
                        } 
                    } 
                } 
            } 
        } 
    } 
     
    public function remove($val) 
    { 
        $k = count($this->table); 
        $i = 0; 
        if($k > 0) 
        { 
            if($this->type == "number") 
            { 
                for($i = 0; $i < $k; $i++) 
                { 
                    if($this->table[$i] == $val) 
                    { 
                        unset($this->table[i]); 
                         
                        $this->table = array_values($this->table); 
                         
                        break; 
                    } 
                } 
            } 
            else 
            { 
                foreach($this->table as $key => $value) 
                { 
                    if($this->table[$key] == $val) 
                    { 
                        unset($this->table[$key]); 
                         
                        $this->table = array_values($this->table); 
                         
                        break; 
                    } 
                } 
            } 
        } 
    } 
     
    public function compress($sep = ", ") 
    { 
        $rtn; 
         
        if(!empty($this->table)) 
        { 
            $rtn = implode($sep,$this->table); 
        } 
        else 
        { 
            $rtn = ""; 
        } 
         
        return $rtn; 
    } 
    public function addFromText($txt,$sep = ", ") 
    { 
        if(!empty($txt)) 
        { 
            if(empty($sep)) 
            { 
                $sep = ", "; 
            } 
             
            $tmp = explode($sep, $txt); 
             
            $k = count($tmp); 
            $i = 0; 
             
            if($this->type == "number") 
            { 
                if($k > 0) 
                { 
                    for($i = 0; $i < $k; $i++) 
                    { 
                        $this->table[] = $tmp[$i]; 
                    } 
                } 
            } 
        } 
    } 
     
    public function type() 
    { 
        return $this->type; 
    } 
     
    public function number() 
    { 
        return (($this->type == "number") ? true : false); 
    } 
     
    public function associative() 
    { 
        return (($this->type == "mixed") ? true : false); 
    } 
     
    public function keys() 
    { 
        $tmp; 
        $rtn; 
        $sep = ", "; 
        $k = count($this->table); 
         
        if($k > 0) 
        { 
            $tmp = array_keys($this->table);     
            $rtn = implode($sep, $tmp); 
        } 
        else 
        { 
            $rtn = ""; 
        } 
         
        return $rtn; 
    } 
     
    public function setDefaultKey($val) 
    { 
        if(!empty($val)) 
        { 
            $this->DEFAULT_KEY = $val; 
        } 
    } 
     
    public function defaultKey() 
    { 
        return $this->DEFAULT_KEY; 
    } 
     
    public function order($rev = false) 
    { 
        if(!$rev) 
        { 
            if($this->number()) 
            { 
                sort($this->table); 
            } 
            else 
            { 
                ksort($this->table); 
            } 
        } 
        else 
        { 
            if($this->number()) 
            { 
                rsort($this->table); 
            } 
            else 
            { 
                krsort($this->table); 
            } 
        } 
    } 
     
    public function values() 
    { 
        return $this->table; 
    } 
} 

?>