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
	 * Name of dog
	 */
	private $name;

	/**
	 * Construtor method for Dog
	 *
	 * @param int $newAge value of age
	 * @param string $newBreed value of breed
	 * @param string $newName value of name
	 */
	public function __construct(int $newAge, string $newBreed, string $newName) {
		try {
			$this->setAge($newAge);
			$this->setBreed($newBreed);
			$this->setName($newName);
		}catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw new($exceptionType($exception->getMessage(), 0, $exception));
		}

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
	 * @throws \RangeException if not a positive number
	 * @throws \TypeError if not an integer
	 **/
	public function setAge(int $newAge) : void {
		if($newAge <= 0) {
			throw (new \RangeException("Age cannot be less than or equal to 0"));
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

	/**
	 * Accessor method for name
	 *
	 * @return string value of name
	 */
	public function getName() : string {
		return($this->name);
	}

	/**
	 * Mutator method for name
	 *
	 * @param string $newName new value of name;
	 * @throws \InvalidArgumentException if name is empty or insecure
	 * @throws \TypeError if not a string
	 */
	public function setName(string $newName) : void {
		$newName = trim($newName);
		$newName = filter_var($newName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

		if(empty($newName) === true) {
			throw (new \InvalidArgumentException("Name cannot be empty"));
		}
		$this->name = $newName;
	}
}

$dog = new Dog(4, "Beagle", "Skip");
$dog = new Dog(5, "Retriever", "Rover");
$dog = new Dog(8, "Labrador", "Buddy");
$dog = new Dog(1, "Husky", "Snow");


