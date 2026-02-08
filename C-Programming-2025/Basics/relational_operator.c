#include <stdio.h>
// C program to demonstrate relational operators
int main()
{
int a = 5, b = 5, c = 10;
printf("%d == %d = %d \n", a, b, a == b); // true
printf("%d == %d = %d \n", a, c, a == c); // false
printf("%d > %d = %d \n", a, b, a > b); //false
printf("%d > %d = %d \n", a, c, a > c); //false
printf("%d < %d = %d \n", a, b, a < b); //false
printf("%d < %d = %d \n", a, c, a < c); //true
printf("%d != %d = %d \n", a, b, a != b); //false
printf("%d != %d = %d \n", a, c, a != c); //true
printf("%d >= %d = %d \n", a, b, a >= b); //true
printf("%d >= %d = %d \n", a, c, a >= c); //false
printf("%d <= %d = %d \n", a, b, a <= b); //true
printf("%d <= %d = %d \n", a, c, a <= c); //true
return 0;
}

/*
* Output:
5 == 5 = 1 
5 == 10 = 0 
5 > 5 = 0 
5 > 10 = 0 
5 < 5 = 0 
5 < 10 = 1 
5 != 5 = 0 
5 != 10 = 1 
5 >= 5 = 1 
5 >= 10 = 0 
5 <= 5 = 1 
5 <= 10 = 1
*/