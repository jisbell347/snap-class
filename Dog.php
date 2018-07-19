<?php

/**
 * An example class for the Deep Dive Bootcamp Snap-Object Challenge
 *
 * @author Joseph Isbell
 * @version 1.0.0
 **/

class Dog {

	/**
	 * Age of the dog
	 */
	private $age;

	/**
	 * Breed of the dog
	 */
	private $breed;

	/**
	 * Construtor method for Dog
	 */
	public function __construct(int $newAge, string $newBreed) {
		$this->setAge($newAge);
		$this->setBreed($newBreed);
	}

	/**
	 * Accessor method for age
	 *
	 * @return int value of age
	 **/
	public function getAge() : int {
		return($this->age);
	}

	/**
	 * Mutator method for age
	 *
	 * @params int $newAge new value of age
	 * @throws \InvalidArgumentException if not a positive number
	 * @throws \TypeError if not an integer
	 **/
	public function setAge(int $newAge) : void {
		if($newAge <= 0) {
			throw (new \InvalidArgumentException("Age cannot be less than or equal to 0"));
		}
		$this->age = $newAge;
	}

	/**
	 * Accessor method for breed
	 *
	 * @return string value of breed
	 */
	public function getBreed() : string {
		return($this->breed);
	}

	/**
	 * Mutator method for breed
	 *
	 * @param string $newBreed new value of breed;
	 * @throws \InvalidArgumentException if string is empty
	 * @throws \TypeError if $newBreed is not a string
	 */

	public function setBreed(string $newBreed) : void {
		$newBreed = trim($newBreed);
		$newBreed = filter_var($newBreed, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

		if(empty($newBreed) === true) {
			throw (new \InvalidArgumentException("Dog breed cannot be empty"));
		}

		$this->breed = $newBreed;
	}

}

$dog = new Dog(4, "Beagle");
$dog = new Dog(5, "Retriever");
$dog = new Dog(8, "Labrador");
$dog = new Dog(1, "Husky");


