<?php

require 'word-count.php';

class WordCountTest extends PHPUnit\Framework\TestCase
{
    public function testCountOneWord()
    {
        $this->assertEquals(['word' => 1], wordCount('word'));
    }

    public function testCountTwoWords()
    {
        $this->assertEquals(['two' => 1, 'words' => 1], wordCount('two words'));
    }

    public function testCountOneWordTwice()
    {
        $this->assertEquals(['two' => 2], wordCount('two two'));
    }

    public function testEmptyString()
    {
        $this->assertEquals('', wordCount(''));
    }

    public function testCapitalizedSentence()
    {
        $this->assertEquals(['all' => 1, 'caps' => 1], wordCount('ALL CAPS'));
    }

    public function testOnlySpecialChars()
    {
        $this->assertEquals('', wordCount('!#$#$ #$$!%'));
    }

    public function testFullSentence()
    {
        $this->assertEquals(
            ['a' => 2, 'brown' => 1, 'fox' => 1, 'jumped' => 1, 'over' => 1, 'lousy' => 1, 'ass' => 1, 'dog' => 1],
            wordCount('A brown fox jumped over a lousy ass dog')
        );
    }

    public function testPhraseWithSpecialCharacters()
    {
        $this->assertEquals(['special' => 1, 'characters' => 1], wordCount('sp)(ec%ial chara!@#$$%^&*cters'));
    }
}