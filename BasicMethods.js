// JavaScript push() method 
// push() method adds one or more elements to the end of an array and returns the new length of the array.
// Syntax: array.push(element1, ..., elementN)
// Parameter: elementN - The elements to add to the end of the array.
// Return value: The new length property of the object upon which the method was called.
// Description: The push() method adds one or more elements to the end of an array and returns the new length of the array.

// EXAMPLE 1:::: Using push() method to add elements to an array
const peoples= ['sushant','rajesh','suresh','ramesh'];
console.log(peoples.length);
console.log(peoples);
const count1=peoples.push("jagu"); // removes the last element from an array and returns that element
// const count=peoples.shift();
// -----"Array.prototype.shift()" -> removes the first element from an array and returns that element.
console.log(count1);
console.log(peoples);

// JavaScript POP() method
// pop() method removes the last element from an array and returns that element.
// Syntax: array.pop()
// Return value: The removed element from the array; undefined if the array is empty.
// Description: The pop() method removes the last element from an array and returns that element. This method changes the length of the array.
// Note: This method will change the original array.

// EXAMPLE 2:::: Using pop() method to remove elements from an array
const person= ['abc','xyz','pqr','lmn'];
console.log(person.length);
console.log(person);
const count2=person.pop('lmn');
console.log(count2);


