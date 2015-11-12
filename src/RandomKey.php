<?php
class RandomKey
{
    const SYMBOLS = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const QUANTITY = '4';
    private function getRandom()
    {
        $lenght = strlen(self::SYMBOLS) - 1;
        $randomSymbol = substr(self::SYMBOLS, rand(0, $lenght), 1);
        return $randomSymbol;
    }
    public function getSymbols()
    {
        $firstSymbol = $this->getRandom();
        for ($i=0; $i<(self::QUANTITY - 1); ++$i) {
            $symbol = $this->getRandom();
            $firstSymbol .= $symbol;
        }
        return $firstSymbol;
    }
}
