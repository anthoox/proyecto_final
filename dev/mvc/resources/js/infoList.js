//Eliminación el ultimo HR
var divisors = document.querySelectorAll('.info__ul__li--hr');
var totalDivisors = divisors.length;
var lastDivisor = divisors[totalDivisors-1]
// console.log(lastDivisor)
lastDivisor.parentNode.removeChild(lastDivisor);