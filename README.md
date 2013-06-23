ArrayClass
==========

Array class similar to the Java or C# array class.

##Sample usage:

$ra = new Table(); // defaults to numeric key array

$ra->add("Boo"); // $this->table[0] = "Boo";

$mra = new Table("mixed"); // associate array

$mra->add("Brian","first_name");  // adds key-val, if second param is blank the key is a random number.

##To-do:
*fix some complicated code so it runs faster and change the way some methods work
*change constructor so it is better designed.

##Any advice or methods suggestions let me know
