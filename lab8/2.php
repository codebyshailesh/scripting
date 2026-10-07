
<?php
class Person
{
    protected $name;
    protected $age;


    public function setter($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getter()
    {
        echo "Name: " . $this->name;
        echo "Age : " . $this->age;
    }
}

class students extends Person
{
    private $college;

    public function setter2($name, $age, $college)
    {
        parent::setter($name, $age);
        $this->college = $college;
    }

    public function getter2()
    {
        parent::getter();
        echo "College: " . $this->college;
    }
}

$stud = new Students();
$stud->setter2("ram", 23, "sag college");
$stud->getter2();
