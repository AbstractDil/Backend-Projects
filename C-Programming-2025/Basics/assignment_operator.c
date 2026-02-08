#include <stdio.h>

// C program to demonstrate assignment operators

int main (){

    // variable declaration
    int a,b,c;

   // variable initialization
   a = 5;
   b = 10;
   c = 15;

   // using assignment operators
   a += 5; // equivalent to a = a + 5
   b -= 5; // equivalent to b = b - 5
   c *= 2; // equivalent to c = c * 2
   

   // printing the results
   printf("After assignment operations:\n");
   printf("a = %d\n", a);
   printf("b = %d\n", b);
   printf("c = %d\n", c);

   return 0;
}

/****************************
* Output: a=5, b=10, c=15
*****************************
After assignment operations:
a = 10
b = 5
c = 30
*/