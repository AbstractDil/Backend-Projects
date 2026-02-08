#include <stdio.h>
void main()
{
int a = 9,b = 4, c;
c = a+b;
printf("a+b = %d \n",c);
c = a-b;
printf("a-b = %d \n",c);
c = a*b;
printf("a*b = %d \n",c);
c=a/b;
printf("a/b = %d \n",c);
c=a%b;
printf("Remainder when a divided by b = %d \n",c);
}

/*
* Output: a=9, b=4, c=0
*/

/*
* Note : If we use void main instead of int main, return 0 statement is not required.
* However, using int main is considered a better practice as it indicates that the program has executed successfully.
*/