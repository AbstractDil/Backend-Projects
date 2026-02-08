// C Program to demonstrate the working of assignment operators
#include <stdio.h>
int main()
{
int a = 5, c;
c = a;
printf("c = %d \n", c);
c += a; // c = c+a
printf("c = %d \n", c);
c -= a; // c = c-a
printf("c = %d \n", c);
c *= a; // c = c*a
printf("c = %d \n", c);
c /= a; // c = c/a
printf("c = %d \n", c);
c %= a; // c = c%a
printf("c = %d \n", c); // Remainder of c divided by a
return 0;
}

/****************************
* Output: a=5, c=5
*****************************
c = 5 
c = 10 
c = 5 
c = 25 
c = 5 
c = 0 
*/