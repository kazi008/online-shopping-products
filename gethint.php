<?php
// Fill up array with names
$a[]="Abir";
$a[]="Badhon";
$a[]="Cindy";
$a[]="Doris";
$a[]="Emon";
$a[]="Fiona";
$a[]="Galib";
$a[]="Hafiz";
$a[]="Setu";
$a[]="Jishan";
$a[]="Mahir";
$a[]="Irfan";
$a[]="Irteza";
$a[]="Johanna";
$a[]="Kitty";
$a[]="Linda";
$a[]="Naina";
$a[]="Nabil";
$a[]="Ophelia";
$a[]="Petunia";
$a[]="Amanda";
$a[]="Raquel";
$a[]="Qius";
$a[]="Raju";
$a[]="Xitu";
$a[]="Yamin";
$a[]="Zayed";
$a[]="Eve";
$a[]="Evita";
$a[]="Sunniva";
$a[]="Shubashis";
$a[]="Sazid";
$a[]="Shurid";
$a[]="Tarek";
$a[]="Unni";
$a[]="Violet";
$a[]="Liza";
$a[]="Elizabeth";
$a[]="Ellen";
$a[]="Wenche";
$a[]="Vicky";

// get the q parameter from URL
$q=$_REQUEST["q"]; $hint="";

// lookup all hints from array if $q is different from ""
if ($q !== "")
  { $q=strtolower($q); $len=strlen($q);
    foreach($a as $name)
    { if (stristr($q, substr($name,0,$len)))
      { if ($hint==="")
        { $hint=$name; }
        else
        { $hint .= ", $name"; }
      }
    }
  }

// Output "no suggestion" if no hint were found
// or output the correct values
echo $hint==="" ? "no suggestion" : $hint;
?> 