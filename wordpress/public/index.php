<?php

class ProgressieTest
{
    /**
     * Eerste zichtbare waarde van de loop
     *
     * @var int
     */
    protected $_start = 33;

    /**
     * Laatste zichtbare waarde van de loop
     *
     * @var int
     */
    protected $_end = 543;

    public function __construct($start = 0, $end = 0)
    {
        if ( ! empty($start)) {
            $this->_start = $start;
        }
        if ( ! empty($end)) {
            $this->_end = $end;
        }
    }

    /**
     * Ik loop door de getallen heen en
     * bepaal per getal hoe deze weergegeven moet worden
     */
    public function showResult()
    {
        foreach (range(33, 543) as $number) {
            echo $this->laatItemZien($number) . "<br>\n";
        }
    }

    /**
     * Deze functie bepaald of er een tekst of een getal weergegeven moet worden.
     * en of deze bold of normaal weergegeven moet worden.
     *
     * @param $number Integer
     *
     * @return string;
     */
    private function laatItemZien($number = 0)
    {
        /*
         * Ik gebruik een if oplossing omdat het niet mogelijk is met een switch
         * Als $number deelbaar is door een bepaald getal dan geef ik een niet $number terug
         * Het is niet noodzakelijk om een else te gebruiken door de early-return
         */

        # Is het nummer deelbaar door 9 én 5 en blijft er dan géén rest getal over?
        if ((0 == $number % 5) && (0 == $number % 9)) {
            return $this->oddEven('Web', $number);
        }

        # Is het nummer deelbaar door 5 en blijft er dan géén rest getal over?
        if (0 == $number % 5) {
            return $this->oddEven('Software', $number);
        }
        # Is het nummer deelbaar door 9 en blijft er dan géén rest getal over?
        if (0 == $number % 9) {
            return $this->oddEven('Developer', $number);
        }

        # Het is geen 9 en ook geen 5
        return $this->oddEven($number, $number);
    }

    /**
     * @param $item
     * @param $number
     *
     * @return string
     */
    private function oddEven($item, $number)
    {
        /*
         * Nu ik de waarde op sommige plekken vervangen heb ga ik ze wel of niet bold weergeven
         * Hierbij controleer ik of het resultaat van de deling 0 is.
         */
        if (0 == $number % 2) {
            return '<b>' . $item . '</b>';
        }

        return $item;
    }
}


?>
<html>
<head>
    <title>Resultaat</title>
    <style>
        body {
            font-family : Arial, sans-serif;
            padding     : 15px 10%;
        }

        h1 {
            color            : #eee;
            background-color : #333;
            padding          : 5px 25px;
            font-size        : 30px;
        }
    </style>
</head>

<body>
<h1>Resultaat</h1>

<?php

/**
 * Laat het uiteindelijke resultaat zien
 */
$progressie_test = new ProgressieTest();
$progressie_test->showResult();


?>
</body>
</html>